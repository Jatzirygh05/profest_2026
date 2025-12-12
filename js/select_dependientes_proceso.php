<?php require_once('../Connections/conexion.php');
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects_uno=array(
"EstadoRepLeg"=>"codigos_postales",
"Municipio_AlcRepLeg"=>"codigos_postales"
);

$listadoSelects_dos=array(
"EstadoEspCult"=>"codigos_postales",
"Municipio_AlcaldiaEspCult"=>"codigos_postales"
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista}
	if($selectDestino == "Municipio_AlcRepLeg"){
		global $listadoSelects_uno;
		if(isset($listadoSelects_uno[$selectDestino])) return true;
		else return false;
	}else{
		global $listadoSelects_dos;
		if(isset($listadoSelects_dos[$selectDestino])) return true;
		else return false;
	}
}
//mysql_query("SET NAMES 'utf8'");
mysqli_set_charset($con, 'utf8');

$selectDestino=$_GET["select"]; 
$opcionSeleccionada=$_GET["opcion"];

$cp_pasa = $_GET['cp_pasa'];

if(!empty($cp_pasa)){
$muestra_con_cp="&& cp='$cp_pasa'";
} else {
	$muestra_con_cp;
	}

if(stristr($selectDestino,"Municipio") != null){
	$num=4;
	$nuevoCampo="Municipio o Alcaldía";
	if(stristr($selectDestino,"Municipio_AlcRepLeg")){
		$mensaje="errMunicipio_AlcRepLeg";
		$asterisco="errMunicipio_AlcRepLegAs";
	} else {
		$mensaje="errMunicipio_AlcaldiaEspCult";
		$asterisco="errMunicipio_AlcaldiaEspCultAs";
	}
}//fin de if externo

if($selectDestino == "Municipio_AlcRepLeg"){

	if(validaSelect($selectDestino))
	{
		$tabla=$listadoSelects_uno[$selectDestino];

		$consulta_p="SELECT c_mnpio, D_mnpio FROM codigos_postales WHERE c_estado='$opcionSeleccionada' $muestra_con_cp group by D_mnpio order by D_mnpio";
		$consulta=mysqli_query($con,$consulta_p);
		//or die(mysql_error());
	
		// Comienzo a imprimir el select
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";	
		echo "<select name='".$selectDestino."' id='".$selectDestino."' class='ns_ form-control' onChange='cargaContenido2(this.id);guardarestado(this.id)'>";
		echo "<option value=''>Selecciona opción</option>";
		while($registro=mysqli_fetch_row($consulta))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			$registro[1]=$registro[1];
			// Imprimo las opciones del select
			echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
		}			
		echo "</select>";
		/*echo "<small id=".$mensaje." name=".$mensaje." class=".'form-text form-text-error'." style=".'display:none'.">Este campo es obligatorio hola</small>";*/
		echo "<small id=".$mensaje." name=".$mensaje." class='form-text form-text-error' style='display:none'>Este campo es obligatorio</small>";
	}
}//fin del if principal
else{
	if(validaSelect($selectDestino))
	{
		$tabla=$listadoSelects_dos[$selectDestino];

		$consulta_p="SELECT c_mnpio, D_mnpio FROM codigos_postales WHERE c_estado='$opcionSeleccionada' group by D_mnpio order by D_mnpio";
		$consulta=mysqli_query($con,$consulta_p);
		//or die(mysql_error());
	
		// Comienzo a imprimir el select
		/*echo "<label>Estado".'errMunicipio_AlcaldiaEspCult'."<samp id='Municipio_AlcaldiaEspCult' name='Municipio_AlcaldiaEspCult' class='control-label'>*</samp>:</label>";*/
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";	
		echo "<select name='".$selectDestino."' id='".$selectDestino."' class='ns_ form-control' onChange='cargaContenido2(this.id);guardarestado(this.id)'>";
		echo "<option value=''>Selecciona opción2</option>";
		while($registro=mysqli_fetch_array($consulta))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			$registro['D_mnpio']=$registro['D_mnpio'];
			// Imprimo las opciones del select
			echo "<option value='".$registro['c_mnpio']."'>".$registro['D_mnpio']."</option>";
		}			
		echo "</select>";
		echo "<small id=".$mensaje." name=".$mensaje." class='form-text form-text-error' style='display:none'>Este campo es obligatorio</small>";
	}
}
?>