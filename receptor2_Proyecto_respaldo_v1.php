<?php require_once('Connections/profest_rep.php');
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

echo '<?xml version="1.0"?>';
echo '<root>';
/*echo '<variable>'.$_GET['variable'].'</variable>';
echo '<valor>'.$_GET['valor'].'</valor>';*/

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$navegador = $_GET['navegador'];
if($navegador==4){
$valor=(isset($_GET['valor'])?utf8_encode($_GET['valor']):NULL);
} else {
	$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
	}

mysql_select_db($database_automaa, $automaa);

$resultado="SELECT clave_usuario FROM proyecto WHERE `clave_usuario` = '".$cve_user."' ;";
$row1= mysql_query($resultado);
$cuantos_id=mysql_num_rows($row1);

			if($cuantos_id>=1){
					//echo "---receptor2-MODIFICA REGISTRO RECEPTOR 2 PROYECTO----";
					$q_modifica="UPDATE `proyecto` SET $variable='$valor', 
					fecha_hora_registro=NOW() 
					WHERE `clave_usuario` = '".$cve_user."';";
					mysql_query("SET NAMES 'utf8'");
					$exe_modifica=mysql_query($q_modifica);
		
					} else {
						//echo "----INSERTA REGISTRO----";
								$q_inserta="INSERT INTO `proyecto` (`clave_usuario`,
								`$variable`,`fecha_hora_registro`) 
								VALUES ('$cve_user', '$valor', NOW());";
								mysql_query("SET NAMES 'utf8'");
								$exe_insert=mysql_query($q_inserta);
						}
echo '</root>';




