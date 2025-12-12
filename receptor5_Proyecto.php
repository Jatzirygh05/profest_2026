<?php require_once('Connections/profest_rep.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

echo '<?xml version="1.0"?>';
echo '<root>';
echo '<variable>'.$_GET['variable'].'</variable>';
echo '<valor>'.$valor=$_GET['valor'].'</valor>';


$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);

$suma_invalida = $_GET['suma_invalida']; 
$suma_porinvalida = $_GET['suma_porinvalida'];

$porcent_a = $_GET['porcent_a'];
$porcent_b = $_GET['porcent_b'];
$porcent_c = $_GET['porcent_c'];

$id_registro = $_GET['id_registro'];

$porcentaje_varios_guardar = $_GET['porcentaje_varios_guardar'];
	 

mysql_select_db($database_automaa, $automaa);

		if(empty($id_registro))
					{
					//echo "---receptor2-MODIFICA REGISTRO----";
					$q_modifica="UPDATE `proyecto` SET  $variable='$valor',
					suma_invalida='$suma_invalida',
					suma_porinvalida='$suma_porinvalida', 
					Porcentaje_a = '$porcent_a',
					Porcentaje_b = '$porcent_b',
					Porcentaje_c = '$porcent_c',
					fecha_hora_registro=NOW() 
					WHERE `clave_usuario` = '".$cve_user."';";
					mysql_query("SET NAMES 'utf8'");
					//$exe_modifica=mysql_query($q_modifica);
					
					} else {
					
						$q_modifica2="UPDATE mas_presupuesto SET Monto_unidad='$valor',
						Porcentaje = '$porcentaje_varios_guardar',
						fecha_hora_registro='NOW()' 
						WHERE id_presupuesto = $id_registro;";
						mysql_query("SET NAMES 'utf8'");
						//$exe_modifica2=mysql_query($q_modifica2);		
						
							$q_modifica3="UPDATE `proyecto` SET 
							suma_invalida='$suma_invalida',
							suma_porinvalida='$suma_porinvalida', 
							fecha_hora_registro=NOW() 
							WHERE `clave_usuario` = '".$cve_user."';";
							//$exe_modifica3=mysql_query($q_modifica3);			
					}
		
					
echo '</root>';




