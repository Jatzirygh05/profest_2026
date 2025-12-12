<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";}

'<?xml version="1.0"?>';
$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
$pon_variable="`$variable`='$valor',";

mysqli_set_charset($con, 'utf8');

$resultado="SELECT id_solicitud FROM solicitud WHERE `clave_usuario` = '".$cve_user."';";
$row1= mysqli_query($con, $resultado);
$cuantos_id=mysqli_num_rows($row1);

		  if($cuantos_id==1){					
					//echo "----MODIFICA REGISTRO----";
					$q_modifica="UPDATE `solicitud` SET $pon_variable 
					fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					$exe_modifica=mysqli_query($con, $q_modifica);
					} else {
						//echo "----INSERTA REGISTRO----";
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`,`$variable`, `fecha_hora_registro`) 
								VALUES (null, '$cve_user', '$valor', NOW());";
								$exe_insert=mysqli_query($con, $q_inserta);
					}
'</root>';