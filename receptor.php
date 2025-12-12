<?php require_once('Connections/profest_rep.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

echo '<?xml version="1.0"?>';
echo '<root>';
echo '<variable>'.$_GET['variable'].'</variable>';
echo '<valor>'.$_GET['valor'].'</valor>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);

mysql_select_db($database_automaa, $automaa);
$resultado="SELECT id_solicitud FROM solicitud WHERE `clave_usuario` = '".$cve_user."' ;";
$row1= mysql_query($resultado);
$cuantos_id=mysql_num_rows($row1);

			if($cuantos_id==1){
					//echo "----MODIFICA REGISTRO----";
					$q_modifica="UPDATE `solicitud` SET $variable='$valor', fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					$exe_modifica=mysql_query($q_modifica);
		
					} else {
						//echo "----INSERTA REGISTRO----";
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`,
								`$variable`,`fecha_hora_registro`) 
								VALUES (null, '$cve_user', '$valor', NOW());";
								$exe_insert=mysql_query($q_inserta);
						}
echo '</root>';




