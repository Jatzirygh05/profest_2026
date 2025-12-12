<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";}

'<?xml version="1.0"?>';

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);

if($variable=='PostCodRepLeg')
{
	$variable='cp';
} 
if($variable=='EstadoRepLeg')
{
	$variable='estado';
} 
if($variable=='Municipio_AlcRepLeg')
{
	$variable='municio_alcaldia';
} 
if($variable=='ColoniaRepLeg')
{
	$variable='colonia';
} 

if($variable=='tipo_instancia' && $valor!='Organización de la Sociedad Civil'){ 
	$quita_valor_variable_CLUNI="`CLUNI`='',";
} 
if($variale=='' && $valor==''){
	$quita_valor_variables_dir="`estado`='', `municio_alcaldia`='', `colonia`='',";
}

$pon_variable="`$variable`='$valor',";

/*$resultado="SELECT id_usuario FROM usuarios WHERE `clave_usuario` = '".$cve_user."';";
$row1= mysql_query($resultado);
$cuantos_id=mysql_num_rows($row1);*/
		  //if($cuantos_id==1){
					//echo "----MODIFICA REGISTRO----";
					$q_modifica="UPDATE `usuarios` SET $pon_variable $quita_valor_variable_CLUNI $quita_valor_variables_dir 
					fecha_hora_modificacion=NOW()
					WHERE `clave_usuario` = '".$cve_user."';";
					$exe_modifica=mysqli_query($con, $q_modifica);			
				//	} else {
						//echo "----INSERTA REGISTRO----";
						
					//			$q_inserta="INSERT INTO `usuarios` (`id_usuario`,`clave_usuario`,`$variable`, `fecha_hora_registro`) 
						//		VALUES (null, '$cve_user', '$valor', NOW());";
							//	$exe_insert=mysql_query($q_inserta);*/
					//}
'</root>';