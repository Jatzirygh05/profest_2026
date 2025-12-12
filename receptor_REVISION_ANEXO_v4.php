<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

'<?xml version="1.0"?>';
'<root>';
'<variable>'.$_GET['variable'].'</variable>';
'<valor>'.$_GET['valor'].'</valor>';
'<solicitante>'.$_GET['solicitante'].'</solicitante>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
$solicitante=(isset($_GET['solicitante'])?utf8_encode($_GET['solicitante']):NULL);
$navegador = $_GET['navegador'];

$sep_variable = explode("_", $variable);

$variable = $sep_variable[0];
$var_id = $sep_variable[1];

if($variable==''){
	 $pon_variable='';
	} else {
		$pon_variable="`$variable`='$valor',";
	}

if($variable=='estatus' || $variable=='reviso'){
	 $define_id=' group by clave_usuario';
	 $define_id2='';
	} else {
		$define_id="and `clave_id`='".$var_id."'";
		$define_id2="`clave_id`='".$var_id."' and";
	}

	$resultado="SELECT clave_id FROM anexos WHERE `clave_usuario` = '".$solicitante."' $define_id ;";
	$row1= mysqli_query($con, $resultado);
	$cuantos_id=mysqli_num_rows($row1);

		if($cuantos_id==1){
			//echo "----MODIFICA REGISTRO 2 ----";
			$q_modifica="UPDATE `anexos` SET $pon_variable 
								fecha_hora_captura=NOW()
								WHERE $define_id2 `clave_usuario` = '".$solicitante."';";
								$exe_modifica=mysqli_query($con, $q_modifica);
		}
	
'</root>';