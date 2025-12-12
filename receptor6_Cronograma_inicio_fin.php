<?php require_once('Connections/conexion.php');
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];

'<?xml version="1.0"?>';
'<root>';
'<variable>'.$_GET['variable'].'</variable>';
'<valor>'.$_GET['valor'].'</valor>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);

if($valor=='undefined'){
	$valor = '';
	}
$resultado="SELECT clave_usuario FROM proyecto WHERE `clave_usuario` = '".$cve_user."' ;";
$row1= mysqli_query($con, $resultado);
$cuantos_id=mysqli_num_rows($row1);
mysqli_set_charset($con, 'utf8');
			if($cuantos_id==1){
					//echo "---receptor2-MODIFICA REGISTRO----";
					$q_modifica="UPDATE `proyecto` SET $variable='$valor', 
					fecha_hora_registro=NOW() 
					WHERE `clave_usuario` = '".$cve_user."';";
					//mysql_query("SET NAMES 'utf8'");
					$exe_modifica=mysqli_query($con, $q_modifica);
					} else {
						//echo "----INSERTA REGISTRO----";
								$q_inserta="INSERT INTO `proyecto` (`clave_usuario`,
								`$variable`,`fecha_hora_registro`) 
								VALUES ('$cve_user', '$valor', NOW());";
								//mysql_query("SET NAMES 'utf8'");
								$exe_insert=mysqli_query($con, $q_inserta);
						}
'</root>';




