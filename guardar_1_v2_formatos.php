<?php require_once('Connections/conexion.php');
//initialize the session
//if (!isset($_SESSION)) {
  //session_start();
//}
//$cve_user = $_SESSION['MM_Username'];

$cve_user="jatziry30";

'<?xml version="1.0"?>';
'<root>';

$id=(isset($_GET['id'])?$_GET['id']:NULL);
$concepto=(isset($_GET['concepto'])?$_GET['concepto']:NULL);
$unidad=(isset($_GET['unidad'])?$_GET['unidad']:NULL);
$dias_a_utilizar=(isset($_GET['dias_a_utilizar'])?$_GET['dias_a_utilizar']:NULL);
$costo_unitario_imp_incluidos=(isset($_GET['costo_unitario_imp_incluidos'])?$_GET['costo_unitario_imp_incluidos']:NULL);
$monto_tot_imp_incluidos=(isset($_GET['monto_tot_imp_incluidos'])?$_GET['monto_tot_imp_incluidos']:NULL);
$total_esp_mue_inmue=(isset($_GET['total_esp_mue_inmue'])?$_GET['total_esp_mue_inmue']:NULL);

///// INICIO 1	
$query_user1="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 1;";                          
$res_user1 =  mysqli_query($con, $query_user1);
$cuantos=mysqli_num_rows($res_user1);
if($cuantos>0){
	$query_b="UPDATE reque_v2_1_2 SET 
	clave_usuario='$cve_user', 
	concepto='$concepto', 
	unidad='$unidad', 
	dias_a_utilizar='$dias_a_utilizar', 
	costo_unitario_imp_incluidos='$costo_unitario_imp_incluidos', 
	monto_tot_imp_incluidos='$monto_tot_imp_incluidos', 
	total_esp_mue_inmue='$total_esp_mue_inmue', 
	tipo=1, 
	fecha_hora_registro=NOW()
	WHERE clave_usuario LIKE '".$cve_user."' && id = '".$id."';";
	$mod=mysqli_query($con, $query_b);
} else {

				echo $query = "INSERT INTO reque_v2_1_2 
					(id, clave_usuario, concepto, unidad, dias_a_utilizar, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
					VALUES
					(NULL, '$cve_user', '$concepto', '$unidad', '$dias_a_utilizar', '$costo_unitario_imp_incluidos', '$monto_tot_imp_incluidos', '$total_esp_mue_inmue', 1, NOW());";
				$mod_a = mysqli_query($con, $query);
}		
///// FIN 1

if($mod or $mod_a){
	//echo "REGISTROS GUARDADOS";
	//echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=guardar_solicitud.php'>";
	echo "se guardo correctamente";
}
'</root>';
	
?>