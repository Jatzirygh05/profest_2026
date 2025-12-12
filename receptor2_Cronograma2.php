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

	
	$variable_sep = explode('_',$variable);
	
	$variable = $variable_sep[0];
	
	$variable_id = $variable_sep[1];
	
	
$resultado="SELECT clave_usuario FROM cronograma_acciones_ejecucion_festival WHERE `clave_usuario` = '".$cve_user."' and id_cronograma_acciones='".$variable_id."';";
$row1= mysql_query($resultado);
$cuantos_id=mysql_num_rows($row1);

			if($cuantos_id==1){
				//echo "----MODIFICA REGISTRO----";
					echo $q_modifica="UPDATE `cronograma_acciones_ejecucion_festival` SET `$variable` = '".$valor."', fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."' and id_cronograma_acciones='".$variable_id."';";
					//$exe_modifica=mysql_query($q_modifica);
		
					} else {
						//echo "----INSERTA REGISTRO----";
								echo $q_inserta="INSERT INTO `cronograma_acciones_ejecucion_festival` (`id_cronograma_acciones`, `clave_usuario`,
								`$variable`,`fecha_hora_registro`) 
								VALUES ('$variable_id', '$cve_user', '$valor', NOW());";
								//$exe_insert=mysql_query($q_inserta);
						}
	
echo '</root>';




