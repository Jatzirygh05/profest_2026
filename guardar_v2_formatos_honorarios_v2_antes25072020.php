<?php
require_once('Connections/profest_rep.php');
require_once('Connections/conexion.php'); 
foreach($_POST as $k => $v)
	{
		${$k}=$_POST[$k];
	}

	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php

if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "admin,op";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}


?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$cve_user = $_SESSION['MM_Username'];
mysql_select_db($database_automaa, $automaa);
//aqui lo tendriamos que cambiar por fecha de apertura
mysql_query("SET NAMES 'utf8'");

?>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Convocatoria PROFEST 2020</title>
	</head>
<body>

	<?php

	    $elim1a="DELETE FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario LIKE '".$cve_user."'";
		$elim1=mysql_query($elim1a);

	for($a=1;$a<=150;$a++){
		$nombre_artista_grupo = addslashes(${'nombre_artista_grupo'.$a});
		$estado_origen_artista_grupo = addslashes(${'estado_origen_artista_grupo'.$a});
		$mun_origen_artista_grupo =	addslashes(${'mun_origen_artista_grupo'.$a});
		$num_tel_artista_grupo = addslashes(${'num_tel_artista_grupo'.$a});
		$email_artista_grupo = addslashes(${'email_artista_grupo'.$a});
		$reconoc_import_art_grupo = addslashes(${'reconoc_import_art_grupo'.$a});
		$paginaweb_redessoc_artista_grupo = addslashes(${'paginaweb_redessoc_artista_grupo'.$a});
		$alcance_Artista = addslashes(${'alcance_Artista'.$a});
		$anio_experiencia_comprobables = ${'anio_experiencia_comprobables'.$a};
		$nombre_rep_fis_artista_grupo = addslashes(${'nombre_rep_fis_artista_grupo'.$a});
		$num_tel_rep_fis_artista_grupo = addslashes(${'num_tel_rep_fis_artista_grupo'.$a});
		$email_rep_fis_artista_grupo = addslashes(${'email_rep_fis_artista_grupo'.$a});
		$nombre_presentacion = addslashes(${'nombre_presentacion'.$a});
		$fecha_presentacion = ${'fecha_presentacion'.$a};
		$horario = ${'horario'.$a};
		$num_par_por_grupo = ${'num_par_por_grupo'.$a};
		$num_Mujeres = ${'num_Mujeres'.$a};
		$num_Hombres = ${'num_Hombres'.$a};
		$duracion_espec_prop = ${'duracion_espec_prop'.$a};
		$nombre_foro = addslashes(${'nombre_foro'.$a});
		$estado_foro = addslashes(${'estado_foro'.$a});
		$mun_alcaldia_foro = addslashes(${'mun_alcaldia_foro'.$a});
		$localidad_foro = addslashes(${'localidad_foro'.$a});
		$publico_dir_prop_art = ${'publico_dir_prop_art'.$a};
		$impacto_socio_cultural_esp = addslashes(${'impacto_socio_cultural_esp'.$a});
		$sinopsis = addslashes(${'sinopsis'.$a});
		$links_mat_videograf_prop = addslashes(${'links_mat_videograf_prop'.$a});
		$monto_honorarios_imp_inc_mn = (${'monto_honorarios_imp_inc_mn'.$a});
		$confirmado_tentativo = ${'confirmado_tentativo'.$a};
		$disciplina = ${'disciplina'.$a};
		$categoria = ${'categoria'.$a};
		$artista_cuenta_con_CFDI = ${'artista_cuenta_con_CFDI'.$a};
		$rep_fis_cuenta_con_CFDI = ${'rep_fis_cuenta_con_CFDI'.$a};
		$espacio_requerido = ${'espacio_requerido'.$a};
		$cuenta_actualmente_con_apoyo_FONCA = addslashes(${'cuenta_actualmente_con_apoyo_FONCA'.$a});

	if($nombre_artista_grupo!='' && $estado_origen_artista_grupo!='' &&  $mun_origen_artista_grupo!='' &&  $num_tel_artista_grupo!='' &&  $email_artista_grupo!='' &&    
		$reconoc_import_art_grupo!='' && $paginaweb_redessoc_artista_grupo!='' && $alcance_Artista!=''  && $anio_experiencia_comprobables!='' && $nombre_rep_fis_artista_grupo!='' 
		&& $num_tel_rep_fis_artista_grupo!='' && $email_rep_fis_artista_grupo!='' && $nombre_presentacion!='' && $fecha_presentacion!='' && $horario!='' && $num_par_por_grupo!='' 
		&& $num_Mujeres!='' &&  $num_Hombres!='' &&  $duracion_espec_prop!='' &&  $nombre_foro!='' && $estado_foro!='' && $mun_alcaldia_foro!='' && $localidad_foro!='' && 
		$publico_dir_prop_art!='' && $impacto_socio_cultural_esp!='' && $sinopsis!='' && $links_mat_videograf_prop!='' && $monto_honorarios_imp_inc_mn!='' && $confirmado_tentativo!='' 
		&& $disciplina!='' && $categoria!='' && $artista_cuenta_con_CFDI!='' && $rep_fis_cuenta_con_CFDI!='' && $espacio_requerido!='' && $cuenta_actualmente_con_apoyo_FONCA!='')
		{

		$query = "INSERT INTO honorarios_artisticos_academicos_v2 
				(`id`, `clave_usuario`, `confirmado_tentativo`, `disciplina`, `nombre_artista_grupo`, `municipio_origen_artista_grupo`, `estado_origen_artista_grupo`, 
				`nombre_presentacion`, `nombre_foro`, `localidad_foro`, `estado_foro`, `municipio_alcaldia_foro`, `fecha_presentacion`, `horario`, `num_participantes_por_grupo`, 
				`num_Mujeres`, `num_Hombres`, `nombre_representante_fiscal_artista_grupo`, `links_material_videografico_propuesta`, `duracion_espectaculo_propuesto`, 
				`monto_honorarios_con_impuestos_incluidos_mn`, `alcance_Artista`, `artista_cuenta_con_CFDI`, `cuenta_actualmente_con_apoyo_FONCA`, `correo_electronico_artista_grupo`, 
				`correo_electronico_representante_fiscal_artista_grupo`, `num_telefonico_artista_grupo`, `num_telefonico_representante_fiscal_artista_grupo`, 
				`representante_fiscal_cuenta_con_CFDI`, `reconocimientos_importantes_artista_grupo`, `paginaweb_redessociales_artista_grupo`, `anio_experiencia_comprobables`, 
				`categoria`, `publico_va_dirigida_propuesta_artistica`, `espacio_requerido`, `impacto_socio_cultural_espectaculo`, `sinopsis`, `fecha_hora_registro`)
				VALUES
				(NULL, '$cve_user', '$confirmado_tentativo', '$disciplina', '$nombre_artista_grupo', '$mun_origen_artista_grupo', '$estado_origen_artista_grupo', 
				'$nombre_presentacion', '$nombre_foro', '$localidad_foro', '$estado_foro', '$mun_alcaldia_foro', '$fecha_presentacion', '$horario', '$num_par_por_grupo', 
				'$num_Mujeres', '$num_Hombres', '$nombre_rep_fis_artista_grupo', '$links_mat_videograf_prop', '$duracion_espec_prop', 
				'$monto_honorarios_imp_inc_mn', '$alcance_Artista', '$artista_cuenta_con_CFDI', '$cuenta_actualmente_con_apoyo_FONCA', '$email_artista_grupo', 
				'$email_rep_fis_artista_grupo', '$num_tel_artista_grupo', '$num_tel_rep_fis_artista_grupo', 
				'$rep_fis_cuenta_con_CFDI', '$reconoc_import_art_grupo', '$paginaweb_redessoc_artista_grupo', '$anio_experiencia_comprobables', 
				'$categoria', '$publico_dir_prop_art', '$espacio_requerido', '$impacto_socio_cultural_esp', '$sinopsis', NOW());";
			$mod_a = mysql_query($query);
		}
	}

	if($mod_a){
		echo "REGISTROS GUARDADOS";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=v2_requerimientos_grupo1.php'>";
	}	

	?>
   
    <script>
          //INICIO .segunampo Alta y Modificación Solicitud
		  
 	</script>
   
  </body>
</html>