<?php require_once('../Connections/conexion.php'); 

// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects2=array(
"Municipio_AlcRepLeg"=>"codigos_postales",
"ColoniaRepLeg"=>"codigos_postales"
);

$listadoSelects2_dos=array(
	"Municipio_AlcaldiaEspCult"=>"codigos_postales",
	"ColoniaEspCult"=>"codigos_postales"
);

function validaSelect2($selectDestino2)
{
	if($selectDestino2 == "ColoniaRepLeg"){
		global $listadoSelects2;
		if(isset($listadoSelects2[$selectDestino2])) return true;
		else return false;
	}
	else{
		global $listadoSelects2_dos;
		if(isset($listadoSelects2_dos[$selectDestino2])) return true;
		else return false;
	}
}

//mysql_query("SET NAMES 'utf8'");
mysqli_set_charset($con, 'utf8');

$selectDestino2=$_GET["select2"]; 
$opcionSeleccionada2=$_GET["opcion2"];

if(stristr($selectDestino2, "Colonia") != null){ 
	$num=2;
	$nuevoCampo="Colonia";
	if(stristr($selectDestino2,"ColoniaRepLeg")){
		$mensaje="errColoniaRepLeg";
		$asterisco="errColoniaRepLegAs";
	} else {
		$mensaje="errColoniaEspCult";
		$asterisco="errColoniaEspCultAs";
	}
}//fin de if externo

$cp_pasa = $_GET['cp_pasa'];

if(!empty($cp_pasa)){
$muestra_con_cp="&& cp='$cp_pasa'";
} else {
	$muestra_con_cp;
	}

$EstadoRepLeg_pasa = $_GET['EstadoRepLeg_pasa'];

if(!empty($EstadoRepLeg_pasa)){
$muestra_con_estado="&& c_estado='$EstadoRepLeg_pasa'";
} else {
	$muestra_con_estado;
	}

if($opcionSeleccionada2 != ''){
if($selectDestino2 == "ColoniaRepLeg"){
	if(validaSelect2($selectDestino2))
	{
		$tabla2=$listadoSelects2[$selectDestino2];
	   
	    $consulta_p2="SELECT id_asenta_cpcons, d_asenta, cp FROM codigos_postales WHERE c_mnpio='$opcionSeleccionada2' $muestra_con_cp $muestra_con_estado group by d_asenta order by d_asenta";
		$consulta2=mysqli_query($con, $consulta_p2);
		//or die(mysql_error());
		
		// Comienzo a imprimir el select
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";	
		echo "<select name='".$selectDestino2."' id='".$selectDestino2."' class='ns_ form-control info_inst_reg' onChange='cargaContenido3(this.id);guardarestado(this.id)'>";
		echo "<option value=''>Selecciona opción</option>";
		while($registro2=mysqli_fetch_array($consulta2, MYSQLI_ASSOC))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			$registro2['d_asenta']=$registro2['d_asenta'];
			// Imprimo las opciones del select .$registro2[0].'-'
			echo "<option value='".$registro2['id_asenta_cpcons']."'>".$registro2['d_asenta']."</option>";
		}			
		echo "</select>";
		echo "<small id=".$mensaje." name=".$mensaje." class='form-text form-text-error' style='display:none'>Este campo es obligatorio</small>";
	}
}//fin del if principal
else{
	if(validaSelect2($selectDestino2))
	{
		$tabla=$listadoSelects2_dos[$selectDestino2];

		$consulta_p="SELECT id_asenta_cpcons, d_asenta,cp FROM codigos_postales WHERE c_mnpio='$opcionSeleccionada2' group by d_asenta order by d_asenta";
		$consulta=mysqli_query($con, $consulta_p);
		//or die(mysql_error());
	
		// Comienzo a imprimir el select
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";
		echo "<select name='ColoniaEspCult' id='ColoniaEspCult' class='ns_ form-control info_inst_reg' onChange='cargaContenido3(this.id);guardarestado(this.id)'>";
		echo "<option value=''>Selecciona opción</option>";
		while($registro=mysqli_fetch_row($consulta, MYSQLI_ASSOC))
		{
			// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
			$registro['d_asenta']=$registro['d_asenta'];
			// Imprimo las opciones del select
			echo "<option value='".$registro['cp']."'>".$registro2['id_asenta_cpcons'].'--con cp--'.$registro['d_asenta']."</option>";
		}			
		echo "</select>";
		echo "<small id=".$mensaje." name=".$mensaje." class='form-text form-text-error' style='display:none'>Este campo es obligatorio</small>";
	}
}
}
?>