<?php require_once('Connections/conexion.php');
	foreach($_POST as $k => $v)
	{
		${$k}=$_POST[$k];
	}

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

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

//******* 1
if($opcion1==""){
		  $query_user1="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=1;";                          			 
		  $resultado = mysqli_query($con, $query_user1);
		  $cuantos1=mysqli_num_rows($resultado);
		   if($cuantos1==1){
		  	//echo "borrar uno<br>";
		  	$query_1 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=1;";
		  	$insert_1 = mysqli_query($con, $query_1);
		   }
} else {
		 $query_user1="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=1;";                          			 
		 $resultado = mysqli_query($con, $query_user1);
		 $cuantos1=mysqli_num_rows($resultado);
		   if($cuantos1==0){
			  //echo "inserta uno<br>";
			  $query_1 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 1,NOW());";
			  $insert_1 = mysqli_query($con, $query_1);
		   }
}
//******* 2
if($opcion2==""){
		  $query_user2="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=2;";                          			 
		  $resultado = mysqli_query($con, $query_user2);
		  $cuantos2=mysqli_num_rows($resultado);
		   if($cuantos2==1){
		  	//echo "borrar 2<br>";
		  	$query_2 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=2;";
		  	$insert_2 = mysqli_query($con, $query_2);
		   }
} else {
		 $query_user2="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=2;";                          			 
		 $resultado = mysqli_query($con, $query_user2);
		 $cuantos2=mysqli_num_rows($resultado);
		   if($cuantos2==0){
			  //echo "inserta 2<br>";
			  $query_2 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 2,NOW());";
			  $insert_2 = mysqli_query($con, $query_2);
		   }
}
//******* 3
if($opcion3==""){
		  $query_user3="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=3;";                          			 
		  $resultado = mysqli_query($con, $query_user3);
		  $cuantos3=mysqli_num_rows($resultado);
		   if($cuantos3==1){
		  	//echo "borrar 3<br>";
		  	$query_3 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=3;";
		  	$insert_3 = mysqli_query($con, $query_3);
		   }
} else {
		 $query_user3="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=3;";                          			 
		 $resultado = mysqli_query($con, $query_user3);
		 $cuantos3=mysqli_num_rows($resultado);
		 
		   if($cuantos3==0){
			  //echo "inserta 3<br>";
			  $query_3 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 3,NOW());";
			  $insert_3 = mysqli_query($con, $query_3);
		   }
}
//******* 4
if($opcion4==""){
		  $query_user4="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=4;";                          			 
		  $resultado = mysqli_query($con, $query_user4);
		  $cuantos4=mysqli_num_rows($resultado);
		   if($cuantos4==1){
		  	//echo "borrar 4<br>";
		  	$query_4 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=4;";
		  	$insert_4 = mysqli_query($con, $query_4);
		   }
} else {
		 $query_user4="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=4;";                          			 
		 $resultado = mysqli_query($con, $query_user4);
		 $cuantos4=mysqli_num_rows($resultado);
		   if($cuantos4==0){
			  //echo "inserta 4<br>";
			  $query_4 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 4,NOW());";
			  $insert_4 = mysqli_query($con, $query_4);
		   }
}
//******* 5
if($opcion5==""){
		  $query_user5="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=5;";                          			 
		  $resultado = mysqli_query($con, $query_user5);
		  $cuantos5=mysqli_num_rows($resultado);
		   if($cuantos5==1){
		  	//echo "borrar 5<br>";
		  	$query_5 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=5;";
		  	$insert_5 = mysqli_query($con, $query_5);
		   }
} else {
		 $query_user5="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=5;";                          			 
		 $resultado = mysqli_query($con, $query_user5);
		 $cuantos5=mysqli_num_rows($resultado);
		   if($cuantos5==0){
			 //echo "inserta 5<br>";
			  $query_5 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 5,NOW());";
			  $insert_5 = mysqli_query($con, $query_5);
		   }
}
//******* 6
if($opcion6==""){
		  $query_user6="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=6;";                          			 
		  $resultado = mysqli_query($con, $query_user6);
		  $cuantos6=mysqli_num_rows($resultado);
		   if($cuantos6==1){
		  	//echo "borrar 6<br>";
		  	$query_6 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=6;";
		  	$insert_6 = mysqli_query($con, $query_6);
		   }
} else {
		 $query_user6="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=6;";                          			 
		 $resultado = mysqli_query($con, $query_user6);
		 $cuantos6=mysqli_num_rows($resultado);
		   if($cuantos6==0){
			  //echo "inserta 6<br>";
			  $query_6 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 6,NOW());";
			  $insert_6 = mysqli_query($con, $query_6);
		   }
}
//******* 7
if($opcion7==""){
		  $query_user7="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=7;";                          			 
		  $resultado = mysqli_query($con, $query_user7);
		  $cuantos7=mysqli_num_rows($resultado);
		   if($cuantos7==1){
		  	//echo "borrar 7<br>";
		  	$query_7 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=7;";
		  	$insert_7 = mysqli_query($con, $query_7);
		   }
} else {
		 $query_user7="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=7;";                          			 
		 $resultado = mysqli_query($con, $query_user7);
		 $cuantos7=mysqli_num_rows($resultado);
		   if($cuantos7==0){
			  //echo "inserta 7<br>";
			  $query_7 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 7,NOW());";
			  $insert_7 = mysqli_query($con, $query_7);
		   }
}
//******* 8 Corresponde ahora a Honorarios artísticos y académicos
if($opcion8==""){
		  $query_user8="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=8;";                          			 
		  $resultado = mysqli_query($con, $query_user8);
		  $cuantos8=mysqli_num_rows($resultado);
		   if($cuantos8==1){
		  	//echo "borrar 8<br>";
		  	$query_8 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=8;";
		  	$insert_8 = mysqli_query($con, $query_8);
		   }
} else {
		 $query_user8="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=8;";                          			 
		 $resultado = mysqli_query($con, $query_user8);
		 $cuantos8=mysqli_num_rows($resultado);
		   if($cuantos8==0){
			  //echo "inserta 8<br>";
			  $query_8 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 8,NOW());";
			  $insert_8 = mysqli_query($con, $query_8);
		   }
}
//******* 9
if($opcion9==""){
		  $query_user9="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=9;";                          			 
		  $resultado = mysqli_query($con, $query_user9);
		  $cuantos9=mysqli_num_rows($resultado);
		   if($cuantos9==1){
		  	//echo "borrar 9<br>";
		  	$query_9 = "DELETE FROM v2_requerimientos_elegidos WHERE clave_usuario='$cve_user' and tipo=9;";
		  	$insert_9 = mysqli_query($con, $query_9);
		   }
} else {
		 $query_user9="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."' and tipo=9;";                          			 
		 $resultado = mysqli_query($con, $query_user9);
		 $cuantos9=mysqli_num_rows($resultado);
		   if($cuantos9==0){
			  //echo "inserta 9<br>";
			  $query_9 = "INSERT INTO v2_requerimientos_elegidos(clave_usuario, tipo, fecha_hora_registro) VALUES ('$cve_user', 9,NOW());";
			  $insert_9 = mysqli_query($con, $query_9);
		   }
}

if($opcion8==8){
//echo "REGISTROS GUARDADOS honorarios";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=v2_honorarios_artisticos_academicos.php'>";

	} else {
		if($opcion1 or $opcion2 or $opcion3 or $opcion4 or $opcion5 or $opcion6 or $opcion7 or $opcion9){
			//echo "REGISTROS GUARDADOS pestañas";
			//echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=v2_requerimientos_todos.php'>"; vamos a dirigirlo al grupo 1 ya con correcciones de todas las pastañas
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=v2_requerimientos_grupo1.php'>";
		}
}
	
?>