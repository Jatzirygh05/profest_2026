<?php require_once('Connections/profest_rep.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
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
  //$MM_redirectLoginSuccess = "login.php";
  $MM_redirectLoginSuccess = "anio.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_automaa, $automaa);
  	
  $LoginRS__query=sprintf("SELECT Clave_usuario, Contrasena_usuario, level FROM usuarios WHERE Clave_usuario=%s AND Contrasena_usuario=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $automaa) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    
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
  <html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	</head>
<body>


<div class="container bottom-buffer">
  <ol class="breadcrumb">
    <li><a href="https://www.gob.mx" onclick="uid_call('gobmx', 'clickout')"><i class="icon icon-home"></i></a></li>
    <li><a href="//pro.librosmexico.mx/inicio" onclick="uid_call('inicio', 'clickin')" class="active">Inicio</a></li>
  </ol>
  <div class="row">
    <div class="col-md-8">
      <div>
        <h1>Bienvenidos </h1>
        <h1>al Repositorio Profest </h1>
        <?php /*p>Queremos escribir un nuevo párrafo en la industria editorial de nuestro país, por eso dotamos herramientas de vanguardia a los profesionales del libro, impulsando la comercialización y fungiendo como un canal de negocios que protege el conocimiento cultural mexicano ante las nuevas tendencias globales.</p>
        <p>
        <a href='//pro.librosmexico.mx/inicio/mas-info' onclick="uid_call('inicio.mas_informacion', 'clickin')">Más información</a> <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
        </p */?>
        	<div id="error_forma"></div>
        <h2 id="objetivo">Iniciar sesión</h2>
      </div>

	  <div class="bottom-buffer"></div>

      
      
      <form class="form-horizontal ns_" role="form" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
        <div id="correo_label" class="form-group">
          <label class="col-sm-4 control-label" for="usuario">Correo electrónico:</label>
          <div class="col-sm-8" id="usuario_div">
            <input class="form-control ns_" id="usuario" name="usuario" placeholder="Ingresa tu correo electrónico" type="text">
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
            <a href='//pro.librosmexico.mx/inicio/recuperar' onclick="uid_call('inicio.recuperar_clave', 'clickin')">Olvidé mi contraseña</a>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9" align="right">
            <button class="btn btn-default" type="button" onclick="window.location='registrate_aqui.php'">Regístrate aquí</button>
            <button class="btn btn-primary" type="submit" onclick="uid_call('inicio.enviar', 'clickin')">Enviar</button>
          </div>
        </div>
      </form>
      
      
    </div>
    
    <div class="col-md-4">
    </div>
  </div>
  <hr>
  <div class="alert alert-info" aria-live="polite" style="word-wrap: break-word;"><p><strong>Aviso de privacidad simplificado de Profest</strong></p><p>texto. </p></div>

            
  </div>
</div>

    </main>

        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>