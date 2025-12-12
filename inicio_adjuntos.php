<?php
require_once('Connections/profest_rep.php');
require_once('Connections/conexion.php'); ?>
<?php
/*//initialize the session
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
*/
$cve_user = "jatziry30";

mysql_select_db($database_automaa, $automaa);
mysql_query("SET NAMES 'utf8'");

//aqui lo tendriamos que cambiar por fecha de apertura

			
?>

<!DOCTYPE html>
  <html lang="es">
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria PROFEST 2019</title>


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
      <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
	  
  
	</head>
<body>

     <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <ol class="breadcrumb">
              <li><a href="#"><i class="icon icon-home"></i></a></li>
              <li><a href="index.php">Inicio</a></li>
              <li class="active">Registro solicitud</li>
            </ol>
          </div>
          <div class="col-sm-4">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li>
                  <span class="user-credencials__name"><?php echo $nombrec; ?></span>
                </li>
                <li>Información adicional<a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>
        
 		<div class="row">
          <div class="col-sm-8">
            <h1>Convocatoria PROFEST 2019</h1>
          </div>
        </div>

<div class="row top-buffer"></div>
 <a href="#" class="scroll"></a>
        
<!-- *********************PRIMERA PARTE********************* -->
        <!-- Ventana emergente -->
        <div class="row" id="rowError" name="rowError" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar los campos obligatorios.</div>
            </div>
        </div>

        <!-- Registro completado -->
        <div class="row" id="rowCompletado" name="rowCompletado" style="display:none">
            <div class="col-md-12">
                <div id="datos_correctos" class="alert alert-success"><strong>¡Felicidades!</strong> Has completado con éxito el formulario 
                   <?php /*input class="btn btn-primary" type="button" value="Imprimir solicitud" id="Imprimir solicitud" name="Imprimir solicitud" onClick="enviar();" */?>
                
                </div>
            </div>
        </div>

		


        
        <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              
              <li class="active"><a data-toggle="tab" href="#tab-06">Adjuntos</a></li><!-- Proyecto -->
              <li><a data-toggle="tab" href="#tab-07">Dos</a></li><!-- Proyecto -->
              
            </ul>
            
            
            
            <!-- INICIO PESTAÑAS -->
            <div class="tab-content"> 
<!-- INICIO PESTAÑA "Solicitud" -->
              <div class="tab-pane <?php if(empty($_GET['abre_tab'])){?>active<?php } ?>" id="tab-01">
                 
				     <form METHOD="POST" id="apInf" name="apInf" action="Guardar_nuevo_archivo.php" enctype="multipart/form-data">
                
                 
                 <!-- adjuntos -->
                 
                  <div class="tab-pane" id="tab-06">
              <!-- inicio del iniciso l -->
                                     
                    <div class="row">
                    <div class="col-md-12"> 
                  <h3> Archivos</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        
						<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="contenedorModalalert">
                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" id="alertModal">
                                <div class="modal-dialog" role="document">
                                    <!--<div class="modal-dialog" role="document" style="margin-top: 181px;">
                                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" id="exampleModal">
                                    si le ponngo la clase fade aqui ya no jala con el display:none
                                    -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Alerta</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body" id="mensaje_BODY_alert">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar_mensaje">Cancelar</button>
                                            <button type="button" class="btn btn-success" id="aceptar_alert">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="total_cont_all">
                   
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="totalcont">
                            <?php require_once('catalogo_archivos.php'); ?>
                            
                             

            
<!--                            <div id="totalcont">    
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="para_Trabajar">
                            <!--Para trabajar-->
                        </div>
                    </div>
            
                          
                <div class="space_bottom clearfix vertical-buffer"></div>
                   
              
              <!-- FIN del iniciso o -->
              
              
            </div>
            <!-- FIN  PESTAÑA "Presupuesto" -->   
             
          </div>
         </div>
        </div> 
            <!-- FIN PESTAÑA "Cronograma de acciones para la ejecución del festival" -->   
                 </form>
       
         <script type="text/javascript" src="js/Gu_Mo_El_archvo.js"></script> <!-- este es del código de archivos -->
        
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> <!-- este es del código de lugares -->
       
        
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
        

       

  </body>
</html>