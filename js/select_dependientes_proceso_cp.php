<?php require_once('../Connections/conexion.php');
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];

// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects3=array(
"ColoniaRepLeg"=>"codigos_postales",
"PostCodRepLeg"=>"codigos_postales"
);

$listadoSelects3_dos=array(
"ColoniaEspCult"=>"codigos_postales",
"Codigo_postalEspCult"=>"codigos_postales"
);

function validaSelect3($selectDestino3)
{
	if($selectDestino3 == "PostCodRepLeg"){
		global $listadoSelects3;
		if(isset($listadoSelects3[$selectDestino3])) return true;
		else return false;
	}
	else{
		global $listadoSelects3_dos;
		if(isset($listadoSelects3_dos[$selectDestino3])) return true;
		else return false;
	}
}

$selectDestino3=$_GET["select3"]; 
$opcionSeleccionada3=$_GET["opcion3"];
$cp_pasa=$_GET["cp_pasa"];
$EstadoRepLeg_pasa=$_GET["EstadoRepLeg_pasa"];
$Municipio_AlcRepLeg_pasa=$_GET["Municipio_AlcRepLeg_pasa"];

if($cp_pasa!='')
{
  $t_cp = "and cp='$cp_pasa'";
} else {
  $t_cp = "";
}

$t_est_mun = "c_estado = '$EstadoRepLeg_pasa' and c_mnpio='$Municipio_AlcRepLeg_pasa'";
$t_est_mun_update = "estado = '$EstadoRepLeg_pasa', municio_alcaldia='$Municipio_AlcRepLeg_pasa'";
if(stristr($selectDestino3, "post") != null){ 
	$num=2;
	$nuevoCampo="Código Postal";
	
	if(stristr($selectDestino3,"PostCodRepLeg")){
		$mensaje="errPostCodRepLeg";
		$asterisco="errPostCodRepLegAs";
	} else {
		$mensaje="errCodigo_postalEspCult";
		$asterisco="errCodigo_postalEspCultAs";
	}
}//fin de if externo

if($opcionSeleccionada3 != ''){
if($selectDestino3 == "PostCodRepLeg"){
	if(validaSelect3($selectDestino3))
	{
		$tabla3=$listadoSelects3[$selectDestino3];
		$consulta_p3="SELECT cp FROM codigos_postales WHERE id_asenta_cpcons='$opcionSeleccionada3' and $t_est_mun $t_cp";
		$consulta3=mysqli_query($con, $consulta_p3);
		//or die(mysql_error());
		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";
		
		while($registro3=mysqli_fetch_array($consulta3, MYSQLI_ASSOC))
		{
			$cp_muestra=$registro3['cp'];
		}
		
		echo "<input type=number name='".$selectDestino3."' id='".$selectDestino3."' class='ns_ form-control info_inst_reg' onblur='cargaContenido4(this.id)' value='".$cp_muestra."'>";
		echo "<small id=".$mensaje." name=".$mensaje." class=".'form-text form-text-error'." style=".'display:none'.">Este campo es obligatorio</small>";

	$q_modifica="UPDATE `usuarios` SET cp='$cp_muestra', $t_est_mun_update, fecha_hora_modificacion=NOW() WHERE `clave_usuario` = '".$cve_user."';";
	$exe_modifica=mysqli_query($con, $q_modifica);
	}
}//fin de if externo
else{
	if(validaSelect3($selectDestino3)){
		$consulta_p3="SELECT cp FROM codigos_postales WHERE id_asenta_cpcons='$opcionSeleccionada3' and $t_est_mun";
		$consulta3=mysqli_query($con, $consulta_p3);
		//or die(mysql_error());

		echo "<label>".$nuevoCampo."<samp id=".$asterisco." name=".$asterisco." class=".'control-label'.">*</samp>:</label>";
		
		while($registro3=mysqli_fetch_array($consulta3, MYSQLI_ASSOC))
		{
			$cp_muestra=$registro3['cp'];
		}
		echo "<input type=number name='".$selectDestino3."' id='".$selectDestino3."' class='ns_ form-control info_inst_reg' onblur='cargaContenido4(this.id)' value='".$cp_muestra."'>";
		echo "<small id=".$mensaje." name=".$mensaje." class=".'form-text form-text-error'." style=".'display:none'.">Este campo es obligatorio</small>";

		$q_modifica="UPDATE `usuarios` SET cp='$cp_muestra', fecha_hora_modificacion=NOW() WHERE `clave_usuario` = '".$cve_user."';";
		$exe_modifica=mysqli_query($con, $q_modifica);
	}
}
}
?>