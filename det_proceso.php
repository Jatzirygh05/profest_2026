<?php header('Content-Type: text/html; charset=iso-8859-1'); 
require_once('Connections/profest_rep.php'); 
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

$maxRows_instancias = 10;
$pageNum_instancias = 0;
if (isset($_GET['pageNum_instancias'])) {
  $pageNum_instancias = $_GET['pageNum_instancias'];
}
$startRow_instancias = $pageNum_instancias * $maxRows_instancias;

mysql_select_db($database_automaa, $automaa);
$query_instancias = "SELECT * FROM instancias_proyecto";
$query_limit_instancias = sprintf("%s LIMIT %d, %d", $query_instancias, $startRow_instancias, $maxRows_instancias);
$instancias = mysql_query($query_limit_instancias, $automaa) or die(mysql_error());
$row_instancias = mysql_fetch_assoc($instancias);

if (isset($_GET['totalRows_instancias'])) {
  $totalRows_instancias = $_GET['totalRows_instancias'];
} else {
  $all_instancias = mysql_query($query_instancias);
  $totalRows_instancias = mysql_num_rows($all_instancias);
}
$totalPages_instancias = ceil($totalRows_instancias/$maxRows_instancias)-1;

mysql_select_db($database_automaa, $automaa);
$query_procesos = "SELECT * FROM procesos ORDER BY `procesos`.`clave_proceso` ASC";
$procesos = mysql_query($query_procesos, $automaa) or die(mysql_error());
$row_procesos = mysql_fetch_assoc($procesos);
$totalRows_procesos = mysql_num_rows($procesos);

?>
<?php
$cve_user = $_SESSION['MM_Username'];
$level = $_SESSION['MM_UserGroup'];
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
	</head>
<body>

<?php			
			// informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysql_query($sql);
			$num_resultados = mysql_num_rows($resultado);
			for ($i=0; $i <$num_resultados; $i++)
			{$row = mysql_fetch_array($resultado);
			$nombre = stripslashes($row["nombre"]);
			$ape_pat = stripslashes($row["apellido_paterno"]);
			$ape_mat = stripslashes($row["apellido_materno"]);
			$nombrec = $nombre." ".$ape_pat." ".$ape_mat;
			}
						
			if($level=="op"){ 
				echo "<br>Espere un momento por favor..."; 
				echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>"; 
				exit; 
			}
			?>
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
                  <span class="user-credencials__name"><?php echo $nombrec; ?></span><a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a>
                </li>
                <li>Informaci&oacute;n adicional</li>
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
              <h2>Proyecto</h2>
              <hr class="red">
            </div>
          </div>
        
        <div class="row bottom-buffer">
          <div class="col-sm-12">
            
            
            <?php
            
$maxRows_instancias = 10;
$pageNum_instancias = 0;
if (isset($_GET['pageNum_instancias'])) {
  $pageNum_instancias = $_GET['pageNum_instancias'];
}
$startRow_instancias = $pageNum_instancias * $maxRows_instancias;

mysql_select_db($database_automaa, $automaa);
$query_instancias = "SELECT * FROM instancias_proyecto";
$query_limit_instancias = sprintf("%s LIMIT %d, %d", $query_instancias, $startRow_instancias, $maxRows_instancias);
$instancias = mysql_query($query_limit_instancias, $automaa) or die(mysql_error());
$row_instancias = mysql_fetch_assoc($instancias);

if (isset($_GET['totalRows_instancias'])) {
  $totalRows_instancias = $_GET['totalRows_instancias'];
} else {
  $all_instancias = mysql_query($query_instancias);
  $totalRows_instancias = mysql_num_rows($all_instancias);
}
$totalPages_instancias = ceil($totalRows_instancias/$maxRows_instancias)-1;

	$cve_proceso= $_POST['cve_proceso'];
	$cve_proceso_real= $_POST['cve_proceso_real'];

	$action;
	$action= $_POST['action'];
			
		
			
mysql_select_db($database_automaa, $automaa); 

$query_anexos = "SELECT * FROM anexos WHERE `clave_proceso` =".$cve_proceso.";";
$anexos = mysql_query($query_anexos, $automaa) or die(mysql_error());
$row_anexos = mysql_fetch_assoc($anexos);
$totalRows_anexos = mysql_num_rows($anexos);
?>
<?php $cve_user = $_SESSION['MM_Username'];

			$cve_proceso= $_POST['cve_proceso'];
			$action= $_POST['action'];
			
		if($action=="modifica_proc"){
			$cve_proceso = $_POST['cve_proceso'];
			$nombre_proceso = $_POST['nombre_proceso'];
			
			$folio_veri = $_POST['folio_veri'];
			$folio_dueno = $_POST['folio_dueno'];
			$nombre_proceso_1 = $_POST['nombre_proceso_1'];
			$nombre_proceso_2 = $_POST['nombre_proceso_2'];
			$nombre_proceso_3 = $_POST['nombre_proceso_3'];
		
							$query = 'UPDATE `procesos` SET '
						. ' `nombre_proceso` = \''.$nombre_proceso.'\','
						. ' `folio_veri` = \''.$folio_veri.'\','
						. ' `folio_dueno` = \''.$folio_dueno.'\','
						. ' `proceso_previo_1` = \''.$nombre_proceso_1.'\','
						. ' `proceso_previo_2` = \''.$nombre_proceso_2.'\','
						. ' `proceso_previo_3` = \''.$nombre_proceso_3.'\' WHERE `clave_proceso` = \''.$cve_proceso.'\' '
						. ' ';
				$result= mysql_query($query);
				if (!$result)
							{
							//echo "<strong>Error:</strong> No se ha podido modificar la instancia. <br>Favor de contactar al administrador";
							}
							else
							{
							//echo "Instancia modificada.<br>";
							//echo "Espere un momento porfavor... <META HTTP-EQUIV='Refresh' CONTENT='4;URL=consul_instancias.php'>";
					}
		} // cierra modificacion proceso


						
			
			// informacion para generar cve_instancia
			$sql_proc = "SELECT * FROM `procesos` WHERE `clave_proceso` LIKE '".$cve_proceso."' "; 
			$resultado_proc = mysql_query($sql_proc);
			$num_resultados_proc = mysql_num_rows($resultado_proc);
			for ($i_proc=0; $i_proc <$num_resultados_proc; $i_proc++)
			{$row_proc = mysql_fetch_array($resultado_proc);
			$nombre_proceso = stripslashes($row_proc["nombre_proceso"]);
			$folio_veri = stripslashes($row_proc["folio_veri"]);
								
			$fecha_hora_captura = stripslashes($row_proc["fecha_hora_captura"]);
			$anio = stripslashes($row_proc["anio"]);
			$usuario_captura = stripslashes($row_proc["usuario_captura"]);
			$no_anexos_totales = stripslashes($row_proc["no_anexos_totales"]);
			
			
			}
$clave_instancia;
		$new_clave_inst = $clave_instancia + 1;

?>
                 
                 <div class="bottom-buffer">
        <form name="form1" method="post" class="clearfix" action="det_proceso_dueno.php">
             
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Clave de proyecto<span class="form-text">*</span>:</label>
                    <input class="form-control" type="text" value="<?php echo $cve_proceso; ?>" readonly>
                  </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Nombre del proyecto<span class="form-text">*</span>:</label>
                    <textarea name="nombre_proceso" class="form-control" id="nombre_proceso"><?php echo $nombre_proceso; ?></textarea>
                  </div>
                </div>
             </div>
            
             <div class="form-group">
                 <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                      <hr>
                    </div>
                  </div>
              </div>
              
             <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9" align="right">
                  <button class="btn btn-primary" type="submit">Modificar proyecto</button>
                  <input name="cve_proceso" type="hidden" id="cve_proceso" value="<?php echo $cve_proceso; ?>">
                  <input name='action' type='hidden' id='action' value='modifica_proc' />
              </div>
             </div>     
             </form>
                 
                 
                 
           <div class="row">
            <div class="col-sm-12">
              <h2>Anexo adjuntos</h2>
              <hr class="red">
            </div>
          </div>
                 
                 
          <div class="row">
            <div class="col-sm-12">  
                 
                  <table class="table table-bordered">
                  	 <thead>
                      <tr>
                        <th>Clave del anexo</th>
                        <th>Nombre del formato</th>
                        <th>Dato captura</th>
                        <th>Adjunto</th>
                  	 </tr>
                    </thead>  
                
                   <?php do { ?>
                 
                   
                   
                   <tbody>
                  <tr>
                    <td>
							<?php 
                            echo $clave_anexo = $row_anexos['clave_anexo'];    
                            	 $clave_id = $row_anexos['clave_id']; 
						    ?>
                    </td>
                    <td><?php echo $nombre_formato = $row_anexos['nombre_formato']; ?></td>
                    <td><?php echo $fecha_hora_captura = $row_anexos['fecha_hora_captura']; ?></td>
                    <td>
                      <a href="anexos/<?php echo $row_anexos['archivo_adjunto']; ?>" target="_blank"><?php echo $row_anexos['archivo_adjunto']; ?></a>
                      <input name="actionfile" type="hidden" class="casilla" id="actionfile" value="upload" /></td>
                    
                 <?php } while ($row_anexos = mysql_fetch_assoc($anexos)); ?>
				 </tr>
              </table>
             <form class="form-horizontal ns_" role="form" method="post" action="login.php">
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9" align="right">
                    <button class="btn btn btn-default" type="submit">Regresar</button>
                  </div>
                </div>
              </form>
              
              </div>           
<?php
mysql_free_result($instancias);

mysql_free_result($anexos);
?>
            
            
            
            
            
            </div></div>
            
            </div>
            
              </div>
              </div>
            </div>
        </div>
        

    </div>
  </div> 
</div>



       </div> 
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/data/encuesta_v1.0/encuestas.js"> </script>
       
            
        <!-- Begin DAx cs.js import -->
        <script type="text/javascript" src="https://sb.scorecardresearch.com/c2/17183199/ct.js"></script>
        <!-- End DAx cs.js import -->

<!-- End Digital Analytix Tag 1.1302.13 -->

  </body>
</html>