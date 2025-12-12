<?php
require('Connections/conexion.php'); 
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {
  /*Global variable $con is necessary, because it is not known inside the function and you need it for mysqli_real_escape_string($con, $theValue); the Variable $con ist defined as mysqli_connect("localhost","user","password", "database") with an include-script.*/
    Global $con;
  
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }
  
    $theValue = mysqli_real_escape_string($con, $theValue);
  
    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;   
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

// Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "anio.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  	
  $LoginRS__query=sprintf("SELECT Clave_usuario, Contrasena_usuario, level FROM usuarios WHERE Clave_usuario=%s AND Contrasena_usuario=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($con, $LoginRS__query) or die(mysqli_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    //$loginStrGroup  = mysql_result($LoginRS,0,'level');
    $row = mysqli_fetch_assoc($LoginRS);
    $loginStrGroup  = $row['level'];
   
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria Profest 2025</title>
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
	</head>
<body>
  <div class="container bottom-buffer">
      <ol class="breadcrumb">
        <li><a href="https://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="https://profest.cultura.gob.mx/" class="active">Inicio</a></li>
      </ol>
      <div class="row">
        <div class="col-md-8">
          <div>
            <h1>Bienvenidos</h1>
            <h1>al Plataforma PROFEST</h1>
            	<div id="error_forma"></div>
            <h2 id="objetivo">Iniciar sesión</h2>
          </div>
          <div class="alert alert-warning"><div id="countdown"></div></div>
          <form class="form-horizontal ns_" role="form" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
            <div id="correo_label" class="form-group">
              <label class="col-sm-4 control-label" for="usuario">Usuario:</label>
              <div class="col-sm-8" id="usuario_div">
                <input class="form-control ns_" id="usuario" name="usuario" placeholder="Ingresa tu usuario" type="text">
              </div>
            </div>
            <div id="inputPassword_label" class="form-group">
              <label class="col-sm-4 control-label" for="contrasena">Contraseña:</label>
              <div class="col-sm-8" id="contrasena_div">
                <input class="form-control ns_" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" type="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9" align="right">
                <a href='formatos_para_descarga_general/Manual_de_llenado_Plataforma_PROFEST_2024.pdf' target="_blank">Descarga Manual de llenado Plataforma PROFEST 2025</a> <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
              </div>
            </div>
            <!--div class="form-group">
              <div class="col-sm-offset-3 col-sm-9" align="right">
                <a href='formatos_para_descarga_general/triptico_PROFEST.pdf' target="_blank">Acerca del PROFEST</a><span class="glyphicon glyphicon-share" aria-hidden="true"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9" align="right">
                <a href='https://conaculta-my.sharepoint.com/:v:/g/personal/profest_cultura_gob_mx/EYcTIznm6RhEpihuhr7CBdIBaQA5zz5R14C77kh0uECnnA?e=4%3aVyj4QL&at=9' target="_blank">Video tutorial PROFEST</a><span class="glyphicon glyphicon-share" aria-hidden="true"></span>
              </div>
            </div-->
            <!--div class="form-group">
              <div class="col-sm-offset-3 col-sm-9" align="right">
                <button class="btn btn-default" type="button" onclick="window.location='registrate_aqui.php'">Regístrate aquí</button>
                <button class="btn btn-primary" type="submit" name="Enviar" value="Enviar">Enviar</button>
              </div>
            </div-->
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
      <hr>
      <div class="form-group clearfix">
        <div class="alert alert-info">
          <p><strong>Aviso de privacidad simplificado del Sistema de datos personales de los formularios de la convocatoria para el otorgamiento de 
                     subsidios en coinversión a festivales culturales y artísticos PROFEST</strong></p>
                    <p>La Secretaría de Cultura, a través de la Dirección General de Promoción y Festivales Culturales, con domicilio en Avenida Paseo de la Reforma No. 175, Alcaldía Cuauhtémoc, Colonia Cuauhtémoc, Código Postal 06500, Ciudad de México, es la responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
                    Los datos personales serán tratados con la finalidad de llevar un registro de las postulaciones, para poder realizar las notificaciones del fallo de la Comisión Dictaminadora y en caso de ser aprobados, dar continuidad a los trámites jurídicos y administrativos, hasta la conclusión de los proyectos
                    De manera adicional, los datos recabados se utilizarán para generar estadísticas e informes, la información, no estará asociados con la persona titular de los datos personales, por lo que no será posible identificarla.
                    Al momento de dar a conocer el aviso de privacidad, el titular de los datos manifiesta tácitamente su conformidad con el mismo y otorga su consentimiento para que dichos datos sean utilizados por el responsable, para las finalidades señaladas.
                    Los datos personales que se recaban no podrán ser transferidos, salvo que se actualice alguna de las excepciones previstas en el artículo 22 la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, o cuando, previamente, se haya obtenido su consentimiento expreso por escrito o por un medio de autenticación similar.
          </p>
          <p>Si deseas conocer nuestro aviso de privacidad integral, lo podrás consultar en el portal <a href="formatos_para_descarga_general/AVISO DE PRIVACIDAD INTEGRAL_PROFEST.pdf" target="_blank">Aviso de Privacidad Integral</a></p>
        </div>
      </div> 
    </div>
  </div>
  <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
</body>
</html>