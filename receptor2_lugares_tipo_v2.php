<?php require_once('Connections/conexion.php');
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";}

'<?xml version="1.0"?>';
'<root>';
/*echo '<variable>'.$_GET['variable'].'</variable>';
echo '<valor>'.$_GET['valor'].'</valor>';*/

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$navegador = $_GET['navegador'];
if($navegador==4){
$valor=(isset($_GET['valor'])?utf8_encode($_GET['valor']):NULL);
} else {
	$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
	}

if($variable=='tipo_lugar_a'){
	switch ($valor) {
		case 1:
			$borr_medios="";
		break;
		case 2:
		$borr_medios="cpforo_a='', estadoforo_a='', mun_alcforo_a='', coloniaforo_a='', calleforo_a='', no_extforo_a='', no_intforo_a='', ";
			break;
		default:
		$borr_medios="Nombreforo_a='', Descripcionlug_a='', cpforo_a='', estadoforo_a='', mun_alcforo_a='', coloniaforo_a='', calleforo_a='', no_extforo_a='', no_intforo_a='', ";
			break;
	}
}
if($variable=='tipo_lugar_b'){
	switch ($valor) {
		case 1:
			$borr_medios="";
		break;
		case 2:
		$borr_medios="cpforo_b='', estadoforo_b='', mun_alcforo_b='', coloniaforo_b='', calleforo_b='', no_extforo_b='', no_intforo_b='', ";
			break;
			default:
		$borr_medios="Nombreforo_b='', Descripcionlug_b='', cpforo_b='', estadoforo_b='', mun_alcforo_b='', coloniaforo_b='', calleforo_b='', no_extforo_b='', no_intforo_b='', ";
			break;
	}
}
if($variable=='tipo_lugar_c'){
	switch ($valor) {
		case 1:
			$borr_medios="";
		break;
		case 2:
		$borr_medios="cpforo_c='', estadoforo_c='', mun_alcforo_c='', coloniaforo_c='', calleforo_c='', no_extforo_c='', no_intforo_c='', ";
		break;
		default:
			$borr_medios="Nombreforo_c='', Descripcionlug_c='', cpforo_c='', estadoforo_c='', mun_alcforo_c='', coloniaforo_c='', calleforo_c='', no_extforo_c='', no_intforo_c='',";
		break;
	}
}

$resultado="SELECT clave_usuario FROM proyecto WHERE `clave_usuario` = '".$cve_user."' ;";
$row1= mysqli_query($con, $resultado);
$cuantos_id=mysqli_num_rows($row1);
mysqli_set_charset($con, 'utf8');

			if($cuantos_id>=1){				
				$q_modifica="UPDATE `proyecto` SET $variable='$valor', $borr_medios
							fecha_hora_registro=NOW()
							WHERE `clave_usuario` = '".$cve_user."';";
							//mysql_query("SET NAMES 'utf8'");
							$exe_modifica=mysqli_query($con, $q_modifica);
			} else {
				//		echo "----INSERTA REGISTRO----";
				$q_inserta="INSERT INTO `proyecto` (`clave_usuario`,
								`$variable`,`fecha_hora_registro`) 
								VALUES ('$cve_user', '$valor', NOW());";
								//mysql_query("SET NAMES 'utf8'");
								$exe_insert=mysqli_query($con, $q_inserta);
			}
'</root>';




