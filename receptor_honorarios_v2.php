<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);
 
		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );
 
		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );
 
		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );
 
		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );
 
		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}


$cve_user = $_SESSION['MM_Username'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";}

'<?xml version="1.0"?>';
'<root>';
//'<Infor_finan_costo_monto>'.$_GET['Infor_finan_costo_monto'].'</Infor_finan_costo_monto>';
//'<Infor_finan_apoyo_monto>'.$_GET['Infor_finan_apoyo_monto'].'</Infor_finan_apoyo_monto>';
//'<Infor_finan_apoyo_costo_total_paso>'.$_GET['Infor_finan_apoyo_costo_total_paso'].'</Infor_finan_apoyo_costo_total_paso>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);

$sep_variable = explode("__", $variable);

$variable = $sep_variable[0];
$var_id = $sep_variable[1];
$var_id_mod = $sep_variable[2];

/*$Infor_finan_costo_monto=(isset($_GET['Infor_finan_costo_monto'])?$_GET['Infor_finan_costo_monto']:NULL);
$Infor_finan_apoyo_monto=(isset($_GET['Infor_finan_apoyo_monto'])?$_GET['Infor_finan_apoyo_monto']:NULL);
$Infor_finan_apoyo_costo_total=$_GET['Infor_finan_apoyo_costo_total_paso'];*/

$navegador = $_GET['navegador'];

if($navegador==4){
	$valor=(isset($_GET['valor'])?utf8_encode($_GET['valor']):NULL);
} else {
	$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
	}

if($variable=="links_material_videografico_propuesta"){
//echo "solo si links-------------";
     $valor=utf8_encode(eliminar_acentos($_GET['valor']));
}


if($variable==''){
	 $pon_variable='';
	} else {
		$pon_variable="`$variable`='$valor',";
	}

if($var_id_mod<>''){
	$var_id_mod_verif = "and id='$var_id_mod'";
	//echo "----MODIFICA REGISTRO 1 ----";
		$q_modifica="UPDATE `honorarios_artisticos_academicos_v2` SET $pon_variable 
					fecha_hora_registro=NOW()
					WHERE `consec`=$var_id and id=$var_id_mod and `clave_usuario` = '".$cve_user."';";
		$exe_modifica=mysqli_query($con, $q_modifica);
} else {
	$var_id_mod_verif = "";
	//echo "----INSERTA REGISTRO 1 ----";
	$resultado="SELECT id FROM honorarios_artisticos_academicos_v2 WHERE `clave_usuario` = '".$cve_user."' and `consec`=$var_id;";
	$row1= mysqli_query($con, $resultado);
	$cuantos_id=mysqli_num_rows($row1);
		while($fila10=mysqli_fetch_array($row1, MYSQLI_ASSOC)){
                $id_registro_modificar = +$fila10['id'];
               }

		if($cuantos_id==1){
			//echo "----MODIFICA REGISTRO 2 ----";
			$q_modifica="UPDATE `honorarios_artisticos_academicos_v2` SET $pon_variable 
								fecha_hora_registro=NOW()
								WHERE `id`=$id_registro_modificar and `clave_usuario` = '".$cve_user."';";
								$exe_modifica=mysqli_query($con, $q_modifica);
		} else {
			//echo "----INSERTA REGISTRO 2 ----";
			$q_inserta="INSERT INTO `honorarios_artisticos_academicos_v2` (`id`,`clave_usuario`,`$variable`, `fecha_hora_registro`, `consec`) VALUES (null, '$cve_user', '$valor', NOW(), '$var_id');";
			$exe_insert=mysqli_query($con, $q_inserta);			
		}
}		
'</root>';