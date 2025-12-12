<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];

echo '<?xml version="1.0"?>';

$estrategias_medios_otros_nombre = $_GET['estrategias_medios_otros_nombre'];

mysql_select_db($database_automaa, $automaa);

$resultado="SELECT clave_usuario FROM proyecto WHERE `clave_usuario` = '".$cve_user."' ;";
$row1= mysqli_query($con, $resultado);
$cuantos_id=mysqli_num_rows($row1);
mysqli_set_charset($con, 'utf8');
			if($cuantos_id==1){
					//echo "----MODIFICA REGISTRO----";
					//poblacion_especific_otro_nombre+'&
					$q_modifica="UPDATE `proyecto` SET 
					estrategias_medios_otros_nombre='$estrategias_medios_otros_nombre', fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					//mysql_query("SET NAMES 'utf8'");
					//$exe_modifica=mysql_query($q_modifica);
		
					} else {
						//echo "----INSERTA REGISTRO----";
								$q_inserta="INSERT INTO `proyecto` (`clave_usuario`,
								`estrategias_medios_otros_nombre`,`fecha_hora_registro`) 
								VALUES ('$cve_user', '$estrategias_medios_otros_nombre', NOW());";
								//mysql_query("SET NAMES 'utf8'");
								//$exe_insert=mysql_query($q_inserta);
						}
echo '</root>';




