<?php require_once('Connections/profest_rep.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

'<?xml version="1.0"?>';
'<root>';
'<Infor_finan_costo_monto>'.$_GET['Infor_finan_costo_monto'].'</Infor_finan_costo_monto>';
'<Infor_finan_apoyo_monto>'.$_GET['Infor_finan_apoyo_monto'].'</Infor_finan_apoyo_monto>';
'<Infor_finan_apoyo_costo_total_paso>'.$_GET['Infor_finan_apoyo_costo_total_paso'].'</Infor_finan_apoyo_costo_total_paso>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);

$navegador = $_GET['navegador'];
if($navegador==4){
$valor=(isset($_GET['valor'])?utf8_encode($_GET['valor']):NULL);
} else {
	$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
	}

$Infor_finan_costo_monto=(isset($_GET['Infor_finan_costo_monto'])?$_GET['Infor_finan_costo_monto']:NULL);
$Infor_finan_apoyo_monto=(isset($_GET['Infor_finan_apoyo_monto'])?$_GET['Infor_finan_apoyo_monto']:NULL);
$Infor_finan_apoyo_costo_total=$_GET['Infor_finan_apoyo_costo_total_paso'];
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

mysql_select_db($database_automaa, $automaa);

$resultado="SELECT id_solicitud FROM solicitud WHERE `clave_usuario` = '".$cve_user."';";
$row1= mysql_query($resultado);
$cuantos_id=mysql_num_rows($row1);

		  if($cuantos_id==1){
					
					//echo "----MODIFICA REGISTRO----";
					$q_modifica="UPDATE `solicitud` SET $pon_variable `Infor_finan_costo_monto`='$Infor_finan_costo_monto', `Infor_finan_apoyo_monto`='$Infor_finan_apoyo_monto', 
					`Infor_finan_apoyo_costo_total`='$Infor_finan_apoyo_costo_total',
					fecha_hora_registro=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					$exe_modifica=mysql_query($q_modifica);
		
					} else {
						//echo "----INSERTA REGISTRO----";
						if($variable==''){
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`, `Infor_finan_costo_monto`, `Infor_finan_apoyo_monto`, `fecha_hora_registro`, 
								`Infor_finan_apoyo_costo_total`) 
								VALUES (null, '$cve_user', '$Infor_finan_costo_monto','$Infor_finan_apoyo_monto', '$Infor_finan_apoyo_costo_total', NOW());";
								$exe_insert=mysql_query($q_inserta);
						} else {
								$q_inserta="INSERT INTO `solicitud` (`id_solicitud`,`clave_usuario`,`$variable`, `Infor_finan_costo_monto`, `Infor_finan_apoyo_monto`, `fecha_hora_registro`) 
								VALUES (null, '$cve_user', '$Infor_finan_costo_monto','$valor', '$Infor_finan_apoyo_monto', NOW());";
								$exe_insert=mysql_query($q_inserta);

						}
					}
'</root>';