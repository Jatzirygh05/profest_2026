<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";}

'<?xml version="1.0"?>';
'<root>';
'<Infor_finan_costo_monto>'.$_GET['Infor_finan_costo_monto'].'</Infor_finan_costo_monto>';
'<Infor_finan_apoyo_monto>'.$_GET['Infor_finan_apoyo_monto'].'</Infor_finan_apoyo_monto>';
'<Infor_finan_apoyo_costo_total_paso>'.$_GET['Infor_finan_apoyo_costo_total_paso'].'</Infor_finan_apoyo_costo_total_paso>';
'<monto_coinversion>'.$_GET['monto_coinversion'].'</monto_coinversion>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);

/*if($_GET['navegador']==4){
$valor=(isset($_GET['valor'])?utf8_encode($_GET['valor']):NULL);
} else {
	$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
	}*/

$Infor_finan_costo_monto=(isset($_GET['Infor_finan_costo_monto'])?$_GET['Infor_finan_costo_monto']:NULL);
$Infor_finan_apoyo_monto=(isset($_GET['Infor_finan_apoyo_monto'])?$_GET['Infor_finan_apoyo_monto']:NULL);
$Infor_finan_apoyo_costo_total=$_GET['Infor_finan_apoyo_costo_total_paso'];

$monto_coinversion=$Infor_finan_costo_monto-$Infor_finan_apoyo_monto;

/*
if($Infor_finan_apoyo_costo_total==0){
	$Infor_finan_apoyo_costo_total = '0';
	} else {
		$imprime = "`Infor_finan_apoyo_costo_total`='$Infor_finan_apoyo_costo_total',";
		}*/
if($variable==''){
	 $pon_variable='';
	} else {
		$pon_variable="`$variable`='$valor',";
	}

$resultado="SELECT id_solicitud FROM solicitud WHERE `clave_usuario` = '".$cve_user."';";
$row1= mysqli_query($con, $resultado);
$cuantos_id=mysqli_num_rows($row1);

		  if($cuantos_id==1){
					//echo "----MODIFICA REGISTRO----";
					$q_modifica="UPDATE `solicitud` SET $pon_variable `Infor_finan_costo_monto`='$Infor_finan_costo_monto', `Infor_finan_apoyo_monto`='$Infor_finan_apoyo_monto', 
					`Infor_finan_apoyo_costo_total`='$Infor_finan_apoyo_costo_total', `monto_coinversion`='$monto_coinversion', 
					fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					$exe_modifica=mysqli_query($con, $q_modifica);
					} else {
						//echo "----INSERTA REGISTRO----";
						if($variable==''){
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`, `Infor_finan_costo_monto`, `Infor_finan_apoyo_monto`, `fecha_hora_registro`, 
								`Infor_finan_apoyo_costo_total`, `monto_coinversion`) 
								VALUES (null, '$cve_user', '$Infor_finan_costo_monto','$Infor_finan_apoyo_monto', NOW(), '$Infor_finan_apoyo_costo_total', '$monto_coinversion');";
								$exe_insert=mysqli_query($con, $q_inserta);
						} else {
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`,`$variable`, `Infor_finan_costo_monto`, `Infor_finan_apoyo_monto`, `fecha_hora_registro`) 
								VALUES (null, '$cve_user', '$Infor_finan_costo_monto','$valor', '$Infor_finan_apoyo_monto', NOW());";
								$exe_insert=mysqli_query($con, $q_inserta);
						}
					}
'</root>';