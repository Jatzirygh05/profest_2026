<?php require_once('Connections/profest_rep.php'); ?>
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
	
			// informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysql_query($sql);
			$num_resultados = mysql_num_rows($resultado);
			for ($i=0; $i <$num_resultados; $i++)
			{$row = mysql_fetch_array($resultado);
			$nombre = $row["nombre_titular"];
			$ape_pat = stripslashes($row["apellido_paterno"]);
			$ape_mat = stripslashes($row["apellido_materno"]);
			$nombrec = $nombre;
			}
?>
<!DOCTYPE html>
  <html lang="es">
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositorio Profest</title>


    <!-- CSS -->
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     
			<script type="text/javascript">
            function MM_validateForm() { //v4.0
              if (document.getElementById){
                var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
                for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
                  if (val) { nm=val.name; if ((val=val.value)!="") {
                    if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
                      if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
                    } else if (test!='R') { num = parseFloat(val);
                      if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
                      if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
                        min=test.substring(8,p); max=test.substring(p+1);
                        if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
                  } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
                } if (errors) alert('Todos los campos son obligatorios');
                document.MM_returnValue = (errors == '');
            } }
            </script>
            
	</head>
<body>
      <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
              <span class="sr-only">Interruptor de Navegaci&oacute;n</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Dependencia</a>
          </div>
          <div class="collapse navbar-collapse" id="subenlaces">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Enlace 1</a></li>
              <li><a href="#">Enlace 2</a></li>
            </ul>
          </div>
        </div>
      </nav>
      
     <div class="container top-buffer-submenu">
        <div class="row">
          <div class="col-sm-8">
            <ol class="breadcrumb">
              <li><a href="#"><i class="icon icon-home"></i></a></li>
              <li><a href="https://www.gob.mx">Inicio</a></li>
              <li><a href="/guias/grafica">Gr&aacute;fica base</a></li>
              <li class="active">Formulario b&aacute;sico</li>
            </ol>
          </div>
          <div class="col-sm-4">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li>
                  <span class="user-credencials__name"><?php echo $nombrec; ?></span>
                </li>
                <li>Informaci&oacute;n adicional<a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>
 		<div class="row">
          <div class="col-sm-8">
            <h1>Repositorio Profest</h1>
          </div>
        </div>
        
         <div class="row">
            <div class="col-sm-12">
              <h2>Modifica Usuario</h2>
              <hr class="red">
            </div>
          </div>
        
        
<form action="guardar_cuentas_usuario.php" onSubmit="MM_validateForm('nombre','','R','ap','','R','am','','R','clave_usuario','','R','contrasena_usuario','','R','cargo','','R','administrador','','R');return document.MM_returnValue"  method="post" target="_self">
	 <?php 
	  $numero=$_GET['numero'];
	  $query_usu="select * from usuarios where id_usuario=$numero;";
      $exe_query_usu=mysql_query($query_usu);
      //desconectar();
    
      while($row=mysql_fetch_array($exe_query_usu))
      {
            $id_usuario=$row["id_usuario"];
            $nivel_usu=$row["level"];
            $administrador=$row["administrador"];
            $j=$j+1;
    ?>
    
   
 <section>
          <div class="bottom-buffer">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nombre">Nombre(s)<span class="form-text">*</span>:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $row["nombre_titular"]; ?>" placeholder="Ingresa el nombre">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ap">Primer apellido<span class="form-text">*</span>:</label>
                    <input type="text" name="ap" id="ap" class="form-control" value="<?php echo $row["primer_apellido"]; ?>" placeholder="Ingresa el primer apellido">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="am">Segundo apellido<span class="form-text">*</span>:</label>
                    <input type="text" name="am" id="am" class="form-control" value="<?php echo $row["segundo_apellido"]; ?>" placeholder="Ingresa el segundo apellido">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="clave_usuario">Usuario<span class="form-text">*</span>:</label>
                      <input type="text" name="clave_usuario" id="clave_usuario" class="form-control" value="<?php echo $row["clave_usuario"]?>" placeholder="Ingresa el usuario">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for"contrasena_usuario">Contrase&ntilde;a<span class="form-text">*</span>:</label>
                    <input type="text" name="contrasena_usuario" id="contrasena_usuario" class="form-control" value="<?php echo $row["contrasena_usuario"]?>" placeholder="Ingresa la contraseña">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for"mail">Correo electr&oacute;nico newww<span class="form-text">*</span>:</label>
                    <input type="email" id="mail" class="form-control" placeholder="ejemplo@dominio.com">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="puesto">Puesto<span class="form-text">*</span>:</label>
                      <input type="text" name="cargo" id="cargo" class="form-control" value="<?php echo $row["cargo"]?>" placeholder="Ingresa el puesto">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for"administrador">Nivel<span class="form-text">*</span>:</label>
                    <select name="administrador" class="form-control">
                        <option value="0" <?php if($administrador==0) echo "SELECTED"; ?>>Operativo</option>
                        <option value="1" <?php if($administrador==1) echo "SELECTED"; ?>>Administrador</option>
                    </select>
                  </div>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-4 col-md-offset-8">
                  <hr>
                </div>
              </div>

              <div class="clearfix">
                <div class="pull-left text-muted text-vertical-align-button">
                  * Campos obligatorios
                </div>

                <div class="pull-right">
                	  <input name="no" type="hidden" value="<?php echo $id_usuario?>" />
                      <button class="btn btn-default" type="button" onClick="javascript:history.back(1)">Regresar</button>
                      <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div><?php } ?>
           
          </div>
        
                    
                 
        </section>

</form> 
</div>

	<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>