<?php require_once('../Connections/conexion.php');
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects4=array(
"PostCodRepLeg"=>"codigos_postales",
"EstadoRepLeg"=>"codigos_postales"
);

$listadoSelects4_dos=array(
"Codigo_postalEspCult"=>"codigos_postales",
"EstadoEspCult"=>"codigos_postales"
);

function validaSelect($selectDestino)
{
	if($selectDestino =="EstadoRepLeg"){
		// Se valida que el select enviado via GET exista
		global $listadoSelects4;
		if(isset($listadoSelects4[$selectDestino])) return true;
		else return false;
	}
	else{
		global $listadoSelects4_dos;
		if(isset($listadoSelects4_dos[$selectDestino])) return true;
		else return false;
	}
}

//mysql_query("SET NAMES 'utf8'");
mysqli_set_charset($con, 'utf8');

$selectDestino4=$_GET["select4"]; //EstadoRepLeg en este caso
$opcionSeleccionada4=$_GET["opcion4"]; //El codigo postal escrito

if(stristr($selectDestino4, "Estado") != null){ 
	$num=2;
	$nuevoCampo="Estado";
	if(stristr($selectDestino4,"EstadoRepLeg")){
		$mensaje="errEstadoRepLeg";
		$asterisco="errEstadoRepLegAs";
	} else {
		$mensaje="errEstadoEspCult";
		$asterisco="errEstadoEspCultAs";
	}
}//fin de if externo

if($selectDestino4 == "EstadoRepLeg"){
	if(validaSelect($selectDestino4)){
		
		if($opcionSeleccionada4<>''){
		$consulta_p4="SELECT c_estado, d_estado FROM codigos_postales WHERE cp='$opcionSeleccionada4'  group by c_estado order by d_estado";
		}else{
		$consulta_p4="SELECT c_estado, d_estado FROM codigos_postales group by c_estado order by d_estado";
		}
		$consulta4=mysqli_query($con, $consulta_p4);
		//or die(mysql_error());
	
		// Comienzo a imprimir el select
		//echo "<h1>$selectDestino4</h1>";
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";

		echo "<select name='".$selectDestino4."' id='".$selectDestino4."' class='ns_ form-control info_inst_reg' onChange='cargaContenido(this.id)'>";
		echo "<option value=''>Selecciona una opción</option>";
		while($registro4=mysqli_fetch_array($consulta4, MYSQLI_ASSOC))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			$registro4['d_estado']=$registro4['d_estado'];
			// Imprimo las opciones del select
			echo "<option value='".$registro4['c_estado']."'>".$registro4['d_estado']."</option>";
		}
		echo "</select>";
		echo "<small id=".$mensaje." name=".$mensaje." class=".'form-text form-text-error'." style=".'display:none'.">Este campo es obligatorio</small>";
	}
}//fin del if externo
else{
	if(validaSelect($selectDestino4)){
		/*$consulta_p4="SELECT c_estado, d_estado FROM codigos_postales WHERE cp='$opcionSeleccionada4' group by c_estado order by d_estado";*/

		if($opcionSeleccionada4<>''){
		$consulta_p4="SELECT c_estado, d_estado FROM codigos_postales WHERE cp='$opcionSeleccionada4' group by c_estado order by d_estado";
		}else{
		$consulta_p4="SELECT c_estado, d_estado FROM codigos_postales group by c_estado order by d_estado";
		}

		$consulta4=mysqli_query($con, $consulta_p4);
		//or die(mysql_error());

		// Comienzo a imprimir el select
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";
		echo "<select name='".$selectDestino4."' id='".$selectDestino4."' class='ns_ form-control' onChange='cargaContenido(this.id)'>";
		echo "<option value=''>Selecciona</option>";

		while($registro4=mysqli_fetch_array($consulta4, MYSQLI_ASSOC))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			$registro4['d_estado']=$registro4['d_estado'];
			// Imprimo las opciones del select
			echo "<option value='".$registro4['c_estado']."'>".$registro4['d_estado']."</option>";
		}
		echo "</select>";
		echo "<small id=".$mensaje." name=".$mensaje." class=".'form-text form-text-error'." style=".'display:none'.">Este campo es obligatorio</small>";
	}
}
?>