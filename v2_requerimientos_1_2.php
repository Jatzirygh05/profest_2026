<?php require_once('Connections/conexion.php'); ?>
<?php
//initialize the session
/********************************if (!isset($_SESSION)) {
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
********************************/
//aqui lo tendriamos que cambiar por fecha de apertura
mysqli_query("SET NAMES 'utf8'");
//*******************************$level = $_SESSION['MM_UserGroup'];
//if($level=="op"){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>";}
			
			// INICIO informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysqli_query($con, $sql);
			$num_resultados = mysqli_num_rows($resultado);
				for ($i=0; $i <$num_resultados; $i++)
				{
					$row = mysqli_fetch_array($resultado);
					$nombre = utf8_encode($row["nombre_titular"]);
					$ape_pat = utf8_encode($row["primer_apellido"]);
					$ape_mat = utf8_encode($row["segundo_apellido"]);
					$nombrec = $nombre.' '.$ape_pat.' '.$ape_mat;
				}
			// FIN informacion para acceso al sistema	
			
			
			// INICIO informacion para acceso al sistema
			$sql_dat = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_dat = mysqli_query($con, $sql_dat);
			$num_resultados_dat = mysqli_num_rows($resultado_dat);
				for ($y=0; $y <$num_resultados_dat; $y++)
				{
					$row_dat = mysqli_fetch_array($resultado_dat);
					$Infor_finan_costo_monto = $row_dat["Infor_finan_costo_monto"];
					$Infor_finan_apoyo_monto = $row_dat["Infor_finan_apoyo_monto"];
				}
			// FIN informacion para acceso al sistema					
?>
<!DOCTYPE html>
  <html lang="es">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria PROFEST 2020</title>
    <!-- CSS -->
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  <script type="text/javascript" src="js/Validacion_req_1_2_v2.js"></script>

<script type="text/javascript">
function obtenmonto(id){
                var unidadv=eval('document.formul.unidad'+id+'.value');
				var diasv=eval('document.formul.dias_a_utilizar'+id+'.value');
				var costov=eval('document.formul.costo_unitario_imp_incluidos'+id+'.value');
						
				if(unidadv.length==0 || diasv.length==0 || costov.lenght==0){
					var monto_v = eval('document.formul.monto_tot_imp_incluidos'+id);
					monto_v.value = '';					
				} else { 
					var monto_total_op = unidadv * diasv * costov;
					
					var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidos'+id);
					
					monto_total_renglon.value = monto_total_op.toFixed(2);
				}
}

function suma_vertical(id){
	var sumaT=0;
	var cuantos = 50
	
	for(var i=1;i<=cuantos;i++){
		
		var campov=eval ('document.formul.monto_tot_imp_incluidos'+i+'.value');
			if(campov.length==0){ 
		   		var calcula_total = 0 
			} else { 
		   		var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
		   		sumaT=sumaT+calcula_total;
			} 
	}
			  var obtsuma= document.formul.total_esp_mue_inmue;
                obtsuma.value=sumaT; 
}
</script>
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
                <li>Informaci&oacute;n adicional<a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>      
 		<div class="row">
          <div class="col-sm-8">
            <h1>Convocatoria PROFEST 2020</h1>
          </div>
        </div>
<div class="row top-buffer"></div>
<div class="alert alert-warning"><div id="countdown"></div></div>
        <div class="row " id="rowError" name="rowError" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada</div>
            </div>
        </div>
        
<form name="formul" action="guardar_v2_requerimientos_1_2.php" method="post">
<div class="row">
   <div class="col-md-12"> 
      <?php
	  $caso = 1;
      switch($caso){
		  case 1:
		  	$titulo="Arrendamiento de espacios, muebles e inmuebles";
		  break;
		  case 2:
		  	$titulo="Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general";
		  break;
		  }	  
	  ?>
      <h3><?php echo $titulo; ?></h3>
   </div>
   <div class="col-md-12"><hr class="red small-margin"></div>  
</div>
  <div class="row">
     <div class="col-md-12">
      <?php $total_proyecto=720; //Apoyo financiero solicitado a la Secretaría de Cultura ?>
                      <table class="table-responsive">
                       <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>Apoyo financiero solicitado a la Secretaría de Cultura:</strong></td>
                        <td><input type="text" class="form-control" name="apoyo_fin_sol_sc" id="apoyo_fin_sol_sc" value="<?php echo $total_proyecto; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td>#</td>
                        <td>Concepto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td>
                        <td>Unidad<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</td>
                        <td>Días a utilizar<samp id="errMonto_unidad_aAs" name="errMonto_unidad_aAs" class="control-label">*</samp>:</td>
                        <td>Costo unitario con impuestos incluidos (M.N)
<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</td>
<td>Monto total con impuestos incluidos (M.N.):</td>
                      </tr>
                      <tr>
                      <?php
                        $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = $caso;";                          
                        $res_user2 =  mysqli_query($con, $query_user2);
                        $cuantos=mysqli_num_rows($res_user2);
                        $h=0;
                        $Concepto_gasto=0;
                        while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                            $h=$h+1;
                            $id			=	$fila2['id'];
                            $concepto	=	$fila2['concepto'];
                            $unidad		=	$fila2['unidad'];
                            $dias_a_utilizar =	$fila2['dias_a_utilizar'];
                            $costo_unitario_imp_incluidos =	$fila2['costo_unitario_imp_incluidos'];
                            $monto_tot_imp_incluidos	=	$fila2['monto_tot_imp_incluidos'];                            
                    	?>
                        <td><?php echo $h; ?><input type="hidden" name="id<?=$h?>" id="id<?=$h?>" value="<?=$id?>">
                        <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
                        </td>
                        <td>
                            <input class='form-control' name='concepto<?php echo $h?>' id='concepto<?php echo $h?>'>
                        </td>
                        <td> 
                        	<input class='form-control' name='unidad<?=$h?>' id='unidad<?=$h?>'>
                        </td>
                        <td><input class='form-control' name='dias_a_utilizar<?php echo $h?>' id='dias_a_utilizar<?php echo $h?>' type="number">
                        </td>
                        <td>
      <input class="form-control" id="costo_unitario_imp_incluidos<?=$h?>" name="costo_unitario_imp_incluidos<?=$h?>" value="<?=$costo_unitario_imp_incluidos?>" type="number">
                        </td>
                        <td>
      <input class="form-control" id="monto_tot_imp_incluidos<?=$h?>" name="monto_tot_imp_incluidos<?=$h?>" value="<?=$monto_tot_imp_incluidos?>" placeholder="0.00" type="text">
                        </td>
                      </tr>
                    <?php
                           }
                    $cuantos = $cuantos+1;
                     for($i=$cuantos;$i<=50;$i++){
                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <input class='form-control' name='concepto<?php echo $i?>' id='concepto<?php echo $i?>'>
                        </td>
                        <td><input class='form-control' name='unidad<?php echo $i?>' id='unidad<?php echo $i?>' type="number" onChange="obtenmonto(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_vertical(<?php echo $i; ?>);">
                        </td>
                        <td>
                          <input class="form-control" id="dias_a_utilizar<?php echo $i?>" name="dias_a_utilizar<?php echo $i?>" type="number" onChange="obtenmonto(<?php echo $i; ?>);suma_vertical(<?php echo $i; ?>);"></td>
                        <td><input class="form-control" id="costo_unitario_imp_incluidos<?php echo $i?>" name="costo_unitario_imp_incluidos<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmonto(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_vertical(<?php echo $i; ?>);"></td>
                        <td>
                        <input class="form-control" id="monto_tot_imp_incluidos<?php echo $i?>" name="monto_tot_imp_incluidos<?php echo $i?>" placeholder="0.00" type="text" readonly>
                        </td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="form-control" name="total_esp_mue_inmue" id="total_esp_mue_inmue" placeholder="0.00" readonly></td>
                      </tr>
                    </table>
        </div>
      </div>
		<div class="row top-buffer">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
                        <input type="hidden" name="total_proyecto" id="total_proyecto" value="<?=$total_proyecto?>">
<input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return validarEnvio_presup(<?php echo $total_proyecto; ?>, <?php echo $total_esp_mue_inmue; ?>);" >
                        </div>
                    </div>
             </div>
           </div>
</form>
		<div class="bottom-buffer"></div>
</div>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
<script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
</body>
</html>
