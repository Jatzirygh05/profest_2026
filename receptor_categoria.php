<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
'<?xml version="1.0"?>';
'<root>';
/*echo '<variable>'.$_GET['variable'].'</variable>';
echo '<valor>'.$_GET['valor'].'</valor>';*/

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);

$Infor_finan_costo_monto=(isset($_GET['Infor_finan_costo_monto'])?$_GET['Infor_finan_costo_monto']:NULL);
$Infor_finan_apoyo_monto=(isset($_GET['Infor_finan_apoyo_monto'])?$_GET['Infor_finan_apoyo_monto']:NULL);
$Infor_finan_apoyo_costo_total=(isset($_GET['Infor_finan_apoyo_costo_total'])?$_GET['Infor_finan_apoyo_costo_total']:NULL);

/*if($Infor_finan_apoyo_costo_total==0){
	$Infor_finan_apoyo_costo_total = '';
	} else {
		$imprime = $Infor_finan_apoyo_costo_total;
		}*/		
		
if($Infor_finan_costo_monto==0){
	$Infor_finan_costo_monto = '';
	} else {
		$Infor_finan_costo_monto = $Infor_finan_costo_monto;
		}


/*18/12/2024 if($Infor_finan_apoyo_monto==0){
	$Infor_finan_apoyo_monto = '';
	} else {
		$Infor_finan_apoyo_monto = $Infor_finan_apoyo_monto;
		}*/

		switch ($valor){
			case 'A':
			  $apoyo_monto='300000';                                
			break;
			case 'B':
			  $apoyo_monto='500000';
			break;
			case 'C':
			  $apoyo_monto='1000000';
			break;
			case 'D': 
			  $apoyo_monto='1500000';
			break;
			case 'E': 
			  $apoyo_monto='2000000';
			break;
		  }
$resultado="SELECT id_solicitud FROM solicitud WHERE `clave_usuario` = '".$cve_user."';";
$row1= mysqli_query($con, $resultado);
$cuantos_id=mysqli_num_rows($row1);

			if($cuantos_id>=1){
					//echo "----MODIFICA REGISTRO----";
					 $q_modifica="UPDATE `solicitud` SET `".$variable."`='$valor', `Infor_finan_costo_monto`='$Infor_finan_costo_monto', `Infor_finan_apoyo_monto`='$apoyo_monto',
					`Infor_finan_apoyo_costo_total`='$Infor_finan_apoyo_costo_total',
					fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					$exe_modifica=mysqli_query($con, $q_modifica);
					} else {
					//echo "----INSERTA REGISTRO----";
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`,`$variable`,`Infor_finan_costo_monto`, `Infor_finan_apoyo_monto`,`Infor_finan_apoyo_costo_total`,`fecha_hora_registro`) 
								VALUES (null, '$cve_user', '$valor','$Infor_finan_costo_monto','$Infor_finan_apoyo_monto', '$Infor_finan_apoyo_costo_total', NOW());";
								$exe_insert=mysqli_query($con, $q_inserta);
						}
'</root>';