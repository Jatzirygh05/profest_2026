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
?>
<?php

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
    <title>Convocatoria PROFEST 2023</title>


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
   
      <script src="https://code.jquery.com/jquery-1.0.4.js"></script>
    
    <style>
      .cumple_reque{
      }
    </style>
	</head>
<body>
 <div class="container">
<?php			
			// informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysqli_query($con,$sql);
			$num_resultados = mysqli_num_rows($resultado);
			for ($i=0; $i <$num_resultados; $i++)
			{$row = mysqli_fetch_array($resultado);
			$nombre = $row["nombre_titular"];
			$ape_pat = stripslashes($row["primer_apellido"]);
			$ape_mat = stripslashes($row["segundo_apellido"]);
			$nombrec = $nombre." ".$ape_pat." ".$ape_mat;
			}
						
			if($level=="op"){ 
				echo "<br>Espere un momento por favor..."; 
				echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>"; 
				exit; 
			}
			?>

  
        <div class="row">
          <div class="col-sm-8">
            <ol class="breadcrumb">
              <li><a href="#"><i class="icon icon-home"></i></a></li>
              <li><a href="http://172.17.175.167/profest/">Inicio</a></li>
              <li class="active">Administrar</li>
            </ol>
          </div>
          <div class="col-sm-4">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li>
                  <span class="user-credencials__name"><?php echo utf8_encode($nombrec); ?></span>
                </li>
                <li>Informaci&oacute;n adicional<a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>
 		<div class="row">
          <div class="col-sm-8">
            <h1>Convocatoria PROFEST 2023</h1>
          </div>
        </div>
<?php        
$paso_usu_selec = $_GET['paso_usu_selec'];

$query_usu_ver="select nombre_titular,primer_apellido,segundo_apellido,clave_usuario from usuarios WHERE clave_usuario='".$paso_usu_selec."';";
$exe_query_usu_ver=mysqli_query($con, $query_usu_ver); 
$row_ver_ini=mysqli_fetch_array($exe_query_usu_ver);   

$usuario_solicitante = $row_ver_ini["clave_usuario"]; 

$nombre_ver_completo = $row_ver_ini["nombre_titular"].' '.$row_vrow_ver_inier["primer_apellido"].' '.$row_ver_ini["segundo_apellido"].' ('.$row_ver_ini["clave_usuario"].')';

?>
<div class="row top-buffer">
   <div class="col-md-12"> 
       <h3>Anexos solicitantes</h3>
   </div>
   <div class="col-md-12"><hr class="red small-margin"></div>

    <div class="col-md-12">
        <h3><strong>Usuario:</strong> <?php echo $nombre_ver_completo; ?></h3></td>
    </div>
    
</div>
<div class="row">
      <div class="col-md-12">
<?php
$sel_cuantos="SELECT clave_usuario FROM anexos WHERE clave_usuario='".$paso_usu_selec."'";
$exe_res_total=  mysqli_query($con, $sel_cuantos);
$Nro_desh_boton = mysqli_num_rows($exe_res_total);

if($Nro_desh_boton>0){
    $return .= '<div class="table-responsive">
	<table class="table">';
    $return .= "<tr>
      <td><strong>C&oacute;digo</strong></td>
      <td><strong>Nombre del documento</strong></td>
  	  <td><strong>Archivo adjunto</strong></td>
      <td><strong>Si</strong></td>
      <td><strong>No</strong></td>
      <td><strong>Observaciones</strong></td>
    </tr>";
   $conteo=1;
    $query_user="SELECT * FROM anexos
        where clave_usuario='".$paso_usu_selec."'";
    $res_user =  mysqli_query($con,$query_user);
    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
        $clave_id=$fila['clave_id'];
        $nombre_formato=$fila['nombre_formato'];
    		$archivo_adjunto=$fila['archivo_adjunto'];
    		$liga_anexo=$fila['liga_anexo'];
        $cumple=$fila['cumple'];
        $observaciones=$fila['observaciones'];
        $estatus_proyecto=$fila['estatus'];
        $reviso=$fila['reviso'];

        $nomb_id="'cumple_$clave_id'";
		
		$destino =  "anexos/".$paso_usu_selec."/".$archivo_adjunto;
		
		$query_doc="SELECT * FROM nombre_formatos where id_docto = $nombre_formato";
     	$res_doc =  mysqli_query($con,$query_doc);
    	$fila_doc=mysqli_fetch_array($res_doc, MYSQLI_ASSOC);
		  $nombre_formato_convert=$fila_doc['nombre_documento'];
     
		
		if(!empty($liga_anexo)){
			$imp_variable = "<a href=".$liga_anexo." target='_new'>".$liga_anexo."</a>";
		} else {
			$imp_variable = "<a href='".$destino."' border='0' target='_new'><span class='glyphicon glyphicon-file' aria-hidden='true'></span></a><br>";
		}	

    if($cumple=='Si'){
      $imp_variable_cumple_si = "<input type='radio' id=".$nomb_id." name=".$nomb_id." value='Si' class='cumple_reque' checked>";
    } else {
      $imp_variable_cumple_si = "<input type='radio' id=".$nomb_id." name=".$nomb_id." value='Si' class='cumple_reque'>";
    } 

    if($cumple=='No'){
      $imp_variable_cumple_no = "<input type='radio' id=".$nomb_id." name=".$nomb_id." class='cumple_reque' value='No' checked>";
    } else {
      $imp_variable_cumple_no = "<input type='radio' id=".$nomb_id." name=".$nomb_id." value='No' class='cumple_reque'>";
    } 

    switch($estatus_proyecto){
      case 'Completo':
          $imp_estatus_c = 'selected';
      break;
      case 'Con observaciones':
          $imp_estatus_c_ob = 'selected';
      break;
      case 'Incompleto':
          $imp_estatus_i = 'selected';
      break;
      default:
         $imp_estatus_sin_d = 'selected';
      } 


    $estatus_imp="<select name='estatus' id='estatus' class='form-control cumple_reque'>
                        <option value='' $imp_estatus_sin_d>Selecciona una opción</option>
                        <option value='Completo' $imp_estatus_c>Completo</option>
                        <option value='Con observaciones' $imp_estatus_c_ob>Con observaciones</option>
                        <option value='Incompleto' $imp_estatus_i>Incompleto</option>
                       </select>";

        $return .= "<tr>
        <td> <strong>".$conteo."</strong> </td>
        <td>
		<div class='form-group'>".$nombre_formato_convert."</div>
		</td>
        <td>".$imp_variable."</td>
        <td>".$imp_variable_cumple_si."</td>
        <td>".$imp_variable_cumple_no."</td>
        <td><textarea id='observaciones_$clave_id' name='observaciones_$clave_id' class='form-control cumple_reque'>".$observaciones."</textarea></td>
        </tr>
        ";
        $conteo++;
    }
    $return .= "</table></div>
      <div class='row'>
          <div class='col-sm-4'>Estatus: $estatus_imp</div>
        </div>
         <div class='row'>
          <div class='col-sm-4'>Revisó: <input type='text' id='reviso' name='reviso' value='$reviso' class='form-control cumple_reque'></div>
        </div>
        <br>
        ";
    echo $return;

    ?>
</div>
</div>	
<?php } else { ?>
    <div class="row">
    	<div class="col-md-12">
        	<div class="alert alert-info">El usuario no tiene archivos adjuntos</div>
        </div>
    </div>
<?php } ?>
      <div class="row">
        <div class="col-md-11">
          <div class="form-group clearfix"> 
            <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
              <div class="pull-right">
                <form action="/reporte/dompdf/formato_evaluacion_proyecto_2021.php?solicitante=<?=$paso_usu_selec?>" target="_blank">
                  <button type="action" class="btn btn-primary">
                   Descargar ficha de revisión
                  </button>
              </div>
              <div class='row top-buffer bottom-buffer'>
            </div>
          </div>
      </div>

<input type="hidden" name="solicitante" id="solicitante" value="<?php echo $usuario_solicitante; ?>" class="row">

  <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
  <script type="text/javascript" src="js/hacer_peticion_y_altera.js"></script>
  <script>
      var http_request = false;
      
      var set_pcX = document.querySelectorAll(".cumple_reque");
 
      var solicitante = document.getElementById("solicitante").value;

      for (var i = 0; i < set_pcX.length; i++) {
         set_pcX[i].onchange = function () {
                   
          var navegador;
        ////////////INICIO VERIFICAR EL NAVEGADOR 
            var es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
            if(es_chrome){
                      navegador = 6;
            }
            var es_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
            if(es_firefox){
                      navegador = 2;
            }
            var es_opera = navigator.userAgent.toLowerCase().indexOf('opera');
            if(es_opera){
                      navegador = 1;
            }
            var es_ie = navigator.userAgent.indexOf("MSIE") > -1 ;
            if(es_ie){
                      navegador = 4;
            }

            console.log(this.name);

        var url='receptor_REVISION_ANEXO_v4.php?variable='+this.name+'&valor='+this.value+'&navegador='+navegador+'&solicitante='+solicitante;
        
        hacerPeticion(url);
        
        }
      }    
    </script> 

  
