<?php require_once('Connections/conexion.php'); ?>
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

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

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

foreach($_POST as $k => $v)
	{
		${$k}=$_POST[$k];
	}

  /*echo "<pre>";
  print_r($_POST);
  echo "</pre>";*/

$cuantos_mod = $cuantos_INSERT;

for($i=1;$i<=$cuantos_mod;$i++){
	$id_presupuesto_a=${'id_presupuesto'.$i};
	$Concepto_gasto_a=${'Concepto_gasto'.$i};
  $Fuente_finan_a=${'Fuente_finan'.$i};
  $Monto_unidad_a=${'Monto_unidad'.$i};
	$Porcentaje_a=${'Porcentaje'.$i};
	
	$query_b="UPDATE mas_presupuesto SET 
			Concepto_gasto	=	'$Concepto_gasto_a',
			Fuente_finan	=	'$Fuente_finan_a',
			Monto_unidad	=	'$Monto_unidad_a',
			Porcentaje		=	'$Porcentaje_a',
			monto_unidad_total = '$texto',
			porcentaje_total = '$textod',
			fecha_hora_registro=NOW()
			WHERE clave_usuario LIKE '".$cve_user."' && id_presupuesto = '".$id_presupuesto_a."';";
	$mod=mysqli_query($con, $query_b);
}
$cuantos_agrega=$cuantos_mod+1;
for($a=$cuantos_agrega;$a<=50;$a++){
	$Concepto_gasto_b=${'Concepto_gasto'.$a};
    $Fuente_finan_b=${'Fuente_finan'.$a};
    $Monto_unidad_b=${'Monto_unidad'.$a};
	$Porcentaje_b=${'Porcentaje'.$a};
	
	if($Concepto_gasto_b!='' && $Fuente_finan_b!='' && $Monto_unidad_b!='' && $Porcentaje_b!='')
	{
		$query_c = "INSERT INTO mas_presupuesto 
		(id_presupuesto, clave_usuario, Concepto_gasto, Fuente_finan, Monto_unidad, Porcentaje, monto_unidad_total, porcentaje_total, fecha_hora_registro)
		VALUES
		(NULL, '$cve_user', '$Concepto_gasto_b', '$Fuente_finan_b', '$Monto_unidad_b', '$Porcentaje_b', '$texto', '$textod',NOW());";
		$mod_c = mysqli_query($con, $query_c);
	}
}	
if($mod or $mod_c){
	//echo "REGISTROS GUARDADOS";
	//echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=guardar_solicitud.php'>"; -comente para agregar este apartado en el de menu de los nuevos modulos

  //antes se iba a la pantalla para seleccionar los conceptos(v2_requerimientos_1_2_menu_check.php) pero ya solo hara honorarios 
 /*version buena que se uso en la convocatoria del 2020
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=v2_honorarios_artisticos_academicos.php'>";*/


  //ahorita la regreso 07/01/2022 echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=v2_honorarios_artisticos_academicos_v2021_conformacion.php'>";
}


?>