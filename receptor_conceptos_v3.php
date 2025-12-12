<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";}

'<?xml version="1.0"?>';
'<root>';
//'<Infor_finan_costo_monto>'.$_GET['Infor_finan_costo_monto'].'</Infor_finan_costo_monto>';
//'<Infor_finan_apoyo_monto>'.$_GET['Infor_finan_apoyo_monto'].'</Infor_finan_apoyo_monto>';
//'<Infor_finan_apoyo_costo_total_paso>'.$_GET['Infor_finan_apoyo_costo_total_paso'].'</Infor_finan_apoyo_costo_total_paso>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
//$tipo=$_GET['tipo_concepto'];

$sep_variable = explode("__", $variable);

$variable = $sep_variable[0];
$var_id = $sep_variable[1];
$var_id_mod = $sep_variable[2];


if($variable=='monto_tot'){

	$variable = "monto_tot_imp_incluidos";

} else {
	$variable = $variable;
}


/*$Infor_finan_costo_monto=(isset($_GET['Infor_finan_costo_monto'])?$_GET['Infor_finan_costo_monto']:NULL);
$Infor_finan_apoyo_monto=(isset($_GET['Infor_finan_apoyo_monto'])?$_GET['Infor_finan_apoyo_monto']:NULL);
$Infor_finan_apoyo_costo_total=$_GET['Infor_finan_apoyo_costo_total_paso'];*/

$navegador = $_GET['navegador'];
if($navegador==4){
$valor=(isset($_GET['valor'])?utf8_encode($_GET['valor']):NULL);
} else {
	$valor=(isset($_GET['valor'])?($_GET['valor']):NULL);
	}

if($variable==''){
	 $pon_variable='';
	} else {
		$pon_variable="`$variable`='$valor',";
	}

if($var_id_mod<>''){
	$var_id_mod_verif = "and id='$var_id_mod'";
	//echo "----MODIFICA REGISTRO 1 ----";
	$q_modifica="UPDATE `reque_v2_1_2` SET $pon_variable 
					fecha_hora_registro=NOW()
					WHERE consec=$var_id_mod and `clave_usuario` = '".$cve_user."';";
		$exe_modifica=mysqli_query($con, $q_modifica);
} else {
	$var_id_mod_verif = "";
	//echo "----INSERTA REGISTRO 1 ----";
	$resultado="SELECT consec FROM reque_v2_1_2 WHERE `clave_usuario` = '".$cve_user."' and `consec`=$var_id;";
	$row1= mysqli_query($con, $resultado);
	$cuantos_id=mysqli_num_rows($row1);
		while($fila10=mysqli_fetch_array($row1, MYSQLI_ASSOC)){
                $id_registro_modificar = +$fila10['consec'];
               }

		if($cuantos_id==1){
			//echo "----MODIFICA REGISTRO 2 ----";
			$q_modifica="UPDATE `reque_v2_1_2` SET $pon_variable 
								fecha_hora_registro=NOW()
								WHERE `consec`=$id_registro_modificar and `clave_usuario` = '".$cve_user."';";
								$exe_modifica=mysqli_query($con, $q_modifica);
		} else {
			//echo "----INSERTA REGISTRO 2 ----";
			$q_inserta="INSERT INTO `reque_v2_1_2` (`id`,`clave_usuario`,`$variable`, `fecha_hora_registro`, `consec`) VALUES (null, '$cve_user', '$valor', NOW(), '$var_id');";
			$exe_insert=mysqli_query($con, $q_inserta);
		}
}		
'</root>';