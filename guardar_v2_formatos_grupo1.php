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

echo $clave1;
echo $clave2;
echo $clave3;
echo $clave4;
echo $clave5;
echo $clave6;
echo $clave7;
echo $clave9;

///// INICIO 1

	$elim_uno="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '1'";
	$elim1=mysqli_query($con, $elim_uno);

	for($f=1;$f<=30;$f++){
		$concepto = ${'concepto'.$f};
		$unidad = ${'unidad'.$f};
		$dias_a_utilizar = ${'dias_a_utilizar'.$f};
		$costo_unitario_imp_incluidos = ${'costo_unitario_imp_incluidos'.$f};
		$monto_tot_imp_incluidos = ${'monto_tot_imp_incluidos'.$f};
		
		if($concepto!='' && $unidad!='' && $dias_a_utilizar!='' && $costo_unitario_imp_incluidos!='' && $monto_tot_imp_incluidos!='')
		{
			$query = "INSERT INTO reque_v2_1_2 
			(id, clave_usuario, concepto, unidad, dias_a_utilizar, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
			VALUES
			(NULL, '$cve_user', '$concepto', '$unidad', '$dias_a_utilizar', '$costo_unitario_imp_incluidos', '$monto_tot_imp_incluidos', '$total_esp_mue_inmue_n', 1, NOW());";
			$mod_1a = mysqli_query($con, $query);
		}
	}
//echo "<br>";
///// INICIO 2

	$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '2'";
	$elim2=mysqli_query($con, $elim);

	for($k=1;$k<=30;$k++){
		$conceptoa = ${'conceptoa'.$k};
		$unidada = ${'unidada'.$k};
		$dias_a_utilizara=${'dias_a_utilizara'.$k};
		$costo_unitario_imp_incluidosa=${'costo_unitario_imp_incluidosa'.$k};
		$monto_tot_imp_incluidosa=${'monto_tot_imp_incluidosa'.$k};
		
		if($conceptoa!='' && $unidada!='' && $dias_a_utilizara!='' && $costo_unitario_imp_incluidosa!='' && $monto_tot_imp_incluidosa!='')
		{
			$query = "INSERT INTO reque_v2_1_2 
			(id, clave_usuario, concepto, unidad, dias_a_utilizar, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
			VALUES
			(NULL, '$cve_user', '$conceptoa', '$unidada', '$dias_a_utilizara', '$costo_unitario_imp_incluidosa', '$monto_tot_imp_incluidosa', '$total_esp_mue_inmuea', 2, NOW());";
			$mod_2a = mysqli_query($con, $query);
		}
	}

///// FIN 2

///// INICIO 3
//echo "<br>";
	$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '3'";
	$elim3=mysqli_query($con, $elim);
	
		for($m=1;$m<=30;$m++){
			$conceptob = ${'conceptob'.$m};
			$unidadb = ${'unidadb'.$m};
			$costo_unitario_imp_incluidosb=${'costo_unitario_imp_incluidosb'.$m};
			$monto_tot_imp_incluidosb=${'monto_tot_imp_incluidosb'.$m};
			
			if($conceptob!='' && $unidadb!='' && $costo_unitario_imp_incluidosb!='' && $monto_tot_imp_incluidosb!='')
			{
				$query = "INSERT INTO reque_v2_1_2 
				(id, clave_usuario, concepto, unidad, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
				VALUES
				(NULL, '$cve_user', '$conceptob', '$unidadb', '$costo_unitario_imp_incluidosb', '$monto_tot_imp_incluidosb', '$total_esp_mue_inmueb', 3, NOW());";
				$mod_3a = mysqli_query($con, $query);
			}
		}
///// FIN 3

///// INICIO 4
	$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '4'";
	$elim4=mysqli_query($con, $elim);

		for($p=1;$p<=30;$p++){
		$idc = ${'idc'.$p};
		$conceptoc = ${'conceptoc'.$p};
		$unidadc = ${'unidadc'.$p};
		$costo_unitario_imp_incluidosc=${'costo_unitario_imp_incluidosc'.$p};
		$monto_tot_imp_incluidosc=${'monto_tot_imp_incluidosc'.$p};
	
		if($conceptoc!='' && $unidadc!='' && $costo_unitario_imp_incluidosc!='' && $monto_tot_imp_incluidosc!='')
			{
				$query = "INSERT INTO reque_v2_1_2 
				(id, clave_usuario, concepto, unidad, costo_unitario_imp_incluidos, 
				monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
				VALUES
				(NULL, '$cve_user', '$conceptoc', '$unidadc', '$costo_unitario_imp_incluidosc',
				'$monto_tot_imp_incluidosc', '$total_esp_mue_inmuec', 4, NOW());";
				$mod_4a = mysqli_query($con, $query);
			}
		}

///// FIN 4

///// INICIO 5
		$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '5'";
		$elim5=mysqli_query($con, $elim);

		for($r=1;$r<=30;$r++){
			$idd	=	${'idd'.$r};
			$nombre_participantes  = ${'nombre_participantes'.$r};
			$origen_destino_origen = ${'origen_destino_origen'.$r};
		    $monto_tot_imp_incluidosd =	${'monto_tot_imp_incluidosd'.$r};

			if($nombre_participantes!='' && $origen_destino_origen!='' && $monto_tot_imp_incluidosd!='')
			{
				$query = "INSERT INTO reque_v2_1_2 
				(id, clave_usuario, nombre_participantes, origen_destino_origen, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
				VALUES
				(NULL, '$cve_user', '$nombre_participantes', '$origen_destino_origen', '$monto_tot_imp_incluidosd', '$total_esp_mue_inmued', 5, NOW());";
				$mod_5a = mysqli_query($con, $query);
			}
		}
///// FIN 5

///// INICIO 6
	$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '6'";
	$elim6=mysqli_query($con, $elim);

	for($r=1;$r<=30;$r++){
	    $ids	=	${'ids'.$r};
	    $conceptoe	=	${'conceptoe'.$r};
		$unidade 	=	${'unidade'.$r};
		$costo_unitario_imp_incluidose = ${'costo_unitario_imp_incluidose'.$r};
		$monto_tot_imp_incluidos_dos =	${'monto_tot_imp_incluidos_dos'.$r};

		if($conceptoe!='' && $unidade!='' && $costo_unitario_imp_incluidose!='' && $monto_tot_imp_incluidos_dos!='')
		{
			$query = "INSERT INTO reque_v2_1_2 
			(id, clave_usuario, concepto, unidad, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
			VALUES
			(NULL, '$cve_user', '$conceptoe', '$unidade', '$costo_unitario_imp_incluidose', '$monto_tot_imp_incluidos_dos', '$total_esp_mue_inmuee', 6, NOW());";
			$mod_6a = mysqli_query($con, $query);
		}
	}
///// FIN 6

///// INICIO 7
	$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '7'";
	$elim7=mysqli_query($con, $elim);

for($r=1;$r<=30;$r++){
    $ids	=	${'ids'.$r};
    $conceptog	=	${'conceptog'.$r};
	$unidadg 	=	${'unidadg'.$r};
	$costo_unitario_imp_incluidosg = ${'costo_unitario_imp_incluidosg'.$r};
	$monto_tot_imp_incluidosg =	${'monto_tot_imp_incluidosg'.$r};

	if($conceptog!='' && $unidadg!='' && $costo_unitario_imp_incluidosg!='' && $monto_tot_imp_incluidosg!='')
	{
		echo $query = "INSERT INTO reque_v2_1_2 
		(id, clave_usuario, concepto, unidad, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
		VALUES
		(NULL, '$cve_user', '$conceptog', '$unidadg', '$costo_unitario_imp_incluidosg', '$monto_tot_imp_incluidosg', '$total_esp_mue_inmuee', 7, NOW());";
		$mod_7a = mysqli_query($con, $query);
	}
}
///// FIN 7
///// INICIO 9
	$elim="DELETE FROM reque_v2_1_2 WHERE clave_usuario LIKE '".$cve_user."' && tipo = '9'";
	$elim9=mysqli_query($con, $elim);

for($z=1;$z<=30;$z++){
    $idz	   = ${'idz'.$z};
    $conceptoz = ${'conceptoz'.$z};
	$unidadz   = ${'unidadz'.$z};
	$costo_unitario_imp_incluidosz = ${'costo_unitario_imp_incluidosz'.$z};
	$monto_tot_imp_incluidosz =	${'monto_tot_imp_incluidosz'.$z};

	if($conceptoz!='' && $unidadz!='' && $costo_unitario_imp_incluidosz!='' && $monto_tot_imp_incluidosz!='')
	{
		$suma_montos=$suma_montos+$monto_tot_imp_incluidosz;
		$query = "INSERT INTO reque_v2_1_2 
		(id, clave_usuario, concepto, unidad, costo_unitario_imp_incluidos, monto_tot_imp_incluidos, total_esp_mue_inmue, tipo, fecha_hora_registro)
		VALUES
		(NULL, '$cve_user', '$conceptoz', '$unidadz', '$costo_unitario_imp_incluidosz', '$monto_tot_imp_incluidosz', '$suma_montos', 9, NOW());";
		$mod_9a = mysqli_query($con, $query); 
	}
}
///// FIN 9

if($mod_1a or $mod_2a or $mod_3a or $mod_4a or $mod_5a or $mod_6a or $mod_7a or $mod_9a){
	//echo "REGISTROS GUARDADOS";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=guardar_solicitud.php'>";
	//echo "se guardo correctamente";
}
	
?>