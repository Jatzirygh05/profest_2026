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
//mysqli_query("SET NAMES 'utf8'");
//*******************************$level = $_SESSION['MM_UserGroup'];
//if($level=="op"){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>";}
			
	/*		// INICIO informacion para acceso al sistema
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
			// FIN informacion para acceso al sistema*/					
?>
  <html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria PROFEST 2020</title>
    <!-- CSS -->
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script type="text/javascript" src="js/Validacion_req_total_v2.js"></script>
      <?php /*script type="text/javascript" src="js/Validacion_req_1_v2.js"></script>
      <script type="text/javascript" src="js/Validacion_req_2_v2.js"></script>
      <script type="text/javascript" src="js/Validacion_req_3_v2.js"></script*/ ?>
     
      <script type="text/javascript" src="js/calculo_nuevos_formatos_v2.js"></script>
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
		    <div class="row " id="rowError1" name="rowError1" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 1. Arrendamiento de espacios, muebles e inmuebles,<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien1" name="rowBien1" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 1. Arrendamiento de espacios, muebles e inmuebles.</div>
            </div>
        </div>
        
        <div class="row " id="rowError2" name="rowError2" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 2. Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general,<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien2" name="rowBien2" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 2. Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general.</div>
            </div>
        </div>
        
        <div class="row " id="rowError3" name="rowError3" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 3. Derechos en general,<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien3" name="rowBien3" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 3. Derechos en general.</div>
            </div>
        </div>
        
        <div class="row " id="rowError4" name="rowError4" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 4. Seguridad (incluye gastos médicos, traslados de obra, instrumentos, etc.),<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien4" name="rowBien4" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 4. Seguridad (incluye gastos médicos, traslados de obra, instrumentos, etc.).</div>
            </div>
        </div>
        
        <div class="row " id="rowError5" name="rowError5" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 5. Transportación aérea de las/os participantes(No se cubren pérdidas de boletos, cambios de itinerarios, exceso de equipaje, ni acompañantes),<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien5" name="rowBien5" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 5. Transportación aérea de las/os participantes(No se cubren pérdidas de boletos, cambios de itinerarios, exceso de equipaje, ni acompañantes).</div>
            </div>
        </div>

        <div class="row " id="rowError6" name="rowError6" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 6. Servicios de subtitulaje y traducción,<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien6" name="rowBien6" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 6. Servicios de subtitulaje y traducción.</div>
            </div>
        </div>

        <div class="row " id="rowError7" name="rowError7" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 7. Insumos para actividades gastronómicas (Se sugiere el uso de artículos biodegradables),<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien7" name="rowBien7" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 7. Insumos para actividades gastronómicas (Se sugiere el uso de artículos biodegradables).</div>
            </div>
        </div>

        <div class="row " id="rowError8" name="rowError8" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 8. Servicios de paquetería,<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien8" name="rowBien8" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 8. Servicios de paquetería.</div>
            </div>
        </div>

        <div class="row " id="rowError9" name="rowError9" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 9. Corte vinil para stands de exposición y/o foros,<br>
                * Todos los campos son obligatorios.</div>
            </div>
        </div>
        <div class="row " id="rowBien9" name="rowBien9" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 9. Corte vinil para stands de exposición y/o foros.</div>
            </div>
        </div>

      <div class="row">
      	<div class="col-sm-12">
        	La suma de todos los rubros deberá ser igual a la cantidad registrada en el apartado Apoyo solicitado a la Secretaría de Cultura.
        </div>
      </div>
      <br>
      <?php $total_proyecto=720; //Apoyo financiero solicitado a la Secretaría de Cultura ?>
      <div class="row">
      <div class="col-sm-4">
      <strong>Apoyo financiero solicitado a la Secretaría de Cultura:</strong>
      </div>
      <div class="col-sm-4">
      <input type="text" class="form-control" name="apoyo_fin_sol_sc" id="apoyo_fin_sol_sc" value="<?php echo '$'.$total_proyecto; ?>" readonly>
      </div>
      </div>
      
      <?php
      $cve_user = 'jatziry30';
       $query_user1="SELECT * FROM v2_requerimientos_elegidos WHERE clave_usuario='".$cve_user."';";                          			 
			 $resultado = mysqli_query($con, $query_user1);
			 $cuantos = mysqli_num_rows($resultado);
			
				for ($i=0; $i <$cuantos; $i++)
				{
					$row_tipo = mysqli_fetch_array($resultado);
					$nombre_tipo = $row_tipo["tipo"];
					
					$variable_guarda= $variable_guarda.','.$nombre_tipo;
				}
				
				$separa = explode(",",$variable_guarda);
							
				$clave1 = array_search('1', $separa);
				$clave2 = array_search('2', $separa);
				$clave3 = array_search('3', $separa);
				$clave4 = array_search('4', $separa);
				$clave5 = array_search('5', $separa);
				$clave6 = array_search('6', $separa);
				$clave7 = array_search('7', $separa);
				$clave8 = array_search('8', $separa);
				$clave9 = array_search('9', $separa);
	  ?>
      <form name="formul" action="guardar_v2_formatos.php" method="post">
      <br>
       <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <?php if($clave1!=""){ ?> <li <?php if(empty($_GET['abre_tab'])){?> class="active"<?php } ?>>
              <a data-toggle="tab" href="#tab-01">1. Arrendamiento de espacios, muebles e inmuebles</a></li><?php } ?>
			        <?php if($clave2!=""){ ?> <li>
              <a data-toggle="tab" href="#tab-02">2. Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general</a></li><?php } ?>
              <?php if($clave3!=""){ ?> <li><a data-toggle="tab" href="#tab-03">3. Derechos en general</a></li><?php } ?>
              <?php if($clave4!=""){ ?> <li><a data-toggle="tab" href="#tab-04">4. Seguridad</a></li><?php } ?>
              <?php if($clave5!=""){ ?> <li><a data-toggle="tab" href="#tab-05">5. Transportación aérea de las/os participantes</a></li><?php } ?>
              <?php if($clave6!=""){ ?> <li><a data-toggle="tab" href="#tab-06">6. Servicios de subtitulaje y traducción</a></li><?php } ?>
              <?php if($clave7!=""){ ?> <li><a data-toggle="tab" href="#tab-07">7. Insumos para actividades gastronómicas</a></li><?php } ?>
              <?php if($clave8!=""){ ?> <li><a data-toggle="tab" href="#tab-08">8. Servicios de paquetería</a></li><?php } ?>
              <?php if($clave9!=""){ ?> <li><a data-toggle="tab" href="#tab-09">9. Corte vinil para stands de exposición y/o foros</a></li><?php } ?>
            </ul>
            <!-- INICIO PESTAÑAS -->
            <div class="tab-content"> 
				<!-- INICIO PESTAÑA "1" -->
                  <?php if($clave1!=""){ ?> 
                    <div class="tab-pane <?php if(empty($_GET['abre_tab'])){?>active<?php } ?>" id="tab-01">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>1. Arrendamiento de espacios, muebles e inmuebles</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <div class="row">
                             <div class="col-md-12">
                               <table class="table-responsive">
                                <tr>
                                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                                 <td>Días a utilizar*:</td>
                                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                                </tr>
                                <tr>
                                  <?php
                                    $query_user1="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 1;";                          
                                    $res_user1 =  mysqli_query($con, $query_user1);
                                    $cuantos=mysqli_num_rows($res_user1);
                                 ?>
                                  <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?php echo $cuantos; ?>">
                                 <?php 
                                 $h=0;
                                        while($fila1=mysqli_fetch_array($res_user1, MYSQLI_ASSOC)){
                                            $h=$h+1; 
                                            $total_esp_mue_inmue_n=$fila1['total_esp_mue_inmue'];                                  
                                ?>
                                 <td><?php echo $h; ?><input type="hidden" name="id<?php echo $h; ?>" id="id<?php echo $h; ?>" value="<?php echo $fila1['id']; ?>"></td>
                                 <td>
                                 <input class='form-control' name='concepto<?php echo $h; ?>' id='concepto<?php echo $h; ?>' value="<?php echo $fila1['concepto']; ?>">
                                 </td>
                                 <td> 
                                 <input class='form-control' name='unidad<?php echo $h; ?>' id='unidad<?php echo $h; ?>' value="<?php echo $fila1['unidad']; ?>" type="number" onChange="obtenmonto(<?php echo $h; ?>);suma_vertical(<?php echo $h; ?>);">
                                 </td>
                                 <td><input class='form-control' name='dias_a_utilizar<?php echo $h; ?>' id='dias_a_utilizar<?php echo $h; ?>' value="<?php echo $fila1['dias_a_utilizar']; ?>" type="number" onChange="obtenmonto(<?php echo $h; ?>);suma_vertical(<?php echo $h; ?>);">
                                 </td>
                                 <td>
                                 <input class="form-control" id="costo_unitario_imp_incluidos<?php echo $h?>" name="costo_unitario_imp_incluidos<?php echo $h?>" value="<?php echo $fila1['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmonto(<?php echo $h; ?>);suma_vertical(<?php echo $h; ?>);">
                                 </td>
                                 <td>
                                 <input class="form-control" id="monto_tot_imp_incluidos<?php echo $h?>" name="monto_tot_imp_incluidos<?php echo $h?>" value="<?php echo $fila1['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text">
                                 </td>
                                </tr>
                                 <?php
                                        }
                                 $cuantos = $cuantos+1;
                                 for($i=$cuantos;$i<=30;$i++){
                                 ?>
                                <tr>
                                 <td><?php echo $i;?></td>
                                 <td><input class='form-control' name='concepto<?php echo $i?>' id='concepto<?php echo $i?>'></td>
                                 <td><input class='form-control' name='unidad<?php echo $i?>' id='unidad<?php echo $i?>' type="number" onChange="obtenmonto(<?php echo $i; ?>);suma_vertical(<?php echo $i; ?>);">
                                  </td>
                                 <td><input class="form-control" id="dias_a_utilizar<?php echo $i?>" name="dias_a_utilizar<?php echo $i?>" type="number" onChange="obtenmonto(<?php echo $i; ?>);suma_vertical(<?php echo $i; ?>);"></td>
                                 <td><input class="form-control" id="costo_unitario_imp_incluidos<?php echo $i?>" name="costo_unitario_imp_incluidos<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmonto(<?php echo $i; ?>);suma_vertical(<?php echo $i; ?>);"></td>
                                 <td><input class="form-control" id="monto_tot_imp_incluidos<?php echo $i?>" name="monto_tot_imp_incluidos<?php echo $i?>" placeholder="0.00" type="text" readonly>
                                 </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td><div align="right"><strong>Total:</strong></div></td>
                                 <td><input type="text" class="form-control" name="total_esp_mue_inmue_n" id="total_esp_mue_inmue_n" placeholder="0.00" value="<?php echo $total_esp_mue_inmue_n; ?>" readonly></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                      </div>
                     </div>  
                      <?php } ?>
        <!-- FIN PESTAÑA "1" -->
        <!-- INICIO PESTAÑA "2" -->
                  <?php if($clave2!=""){ ?>
                  <div class="tab-pane" id="tab-02">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>2. Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <div class="row">
                             <div class="col-md-12">
                               <table class="table-responsive">
                                <tr>
                                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                                 <td>Días a utilizar*:</td>
                                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                                </tr>
                                <tr>
                                  <?php
                                    $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 2;";                          
                                    $res_user2 =  mysqli_query($con, $query_user2);
                                    $cuantos2=mysqli_num_rows($res_user2);
                                 ?>
                                 <input type="hidden" name="cuantos_INSERT2" id="cuantos_INSERT2" value="<?php echo $cuantos2; ?>">
                                 <?php
                                    $h=0;
                                        while($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                                            $h=$h+1;
                                            $total_esp_mue_inmuea = $fila2['total_esp_mue_inmue'];                         
                                ?>
                                 <td><?php echo $h; ?><input type="hidden" name="ida<?php echo $h; ?>" id="ida<?php echo $h; ?>" value="<?php echo $fila2['id']; ?>"></td>
                                 <td>
                                 <input class='form-control' name='conceptoa<?php echo $h; ?>' id='conceptoa<?php echo $h; ?>' value="<?php echo $fila2['concepto']; ?>">
                                 </td>
                                 <td> 
                                 <input class='form-control' name='unidada<?php echo $h; ?>' id='unidada<?php echo $h; ?>' onChange="obtenmontoa(<?php echo $h; ?>);suma_verticala(<?php echo $h; ?>);" value="<?php echo $fila2['unidad']; ?>">
                                 </td>
                                 <td><input class='form-control' name='dias_a_utilizara<?php echo $h; ?>' id='dias_a_utilizara<?php echo $h; ?>' type="number" onChange="obtenmontoa(<?php echo $h; ?>);suma_verticala(<?php echo $h; ?>);" value="<?php echo $fila2['dias_a_utilizar']; ?>">
                                 </td>
                                 <td>
                                 <input class="form-control" id="costo_unitario_imp_incluidosa<?php echo $h?>" name="costo_unitario_imp_incluidosa<?php echo $h?>" type="number" onChange="obtenmontoa(<?php echo $h; ?>);suma_verticala(<?php echo $h; ?>);" value="<?php echo $fila2['costo_unitario_imp_incluidos']; ?>">
                                 </td>
                                 <td>
                                 <input class="form-control" id="monto_tot_imp_incluidosa<?php echo $h?>" name="monto_tot_imp_incluidosa<?php echo $h?>" value="<?php echo $fila2['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text">
                                 </td>
                                </tr>
                                 <?php
                                        }
                                 $cuantos2 = $cuantos2+1;
                                 for($i=$cuantos2;$i<=30;$i++){
                                 ?>
                                <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><input class='form-control' name='conceptoa<?php echo $i?>' id='conceptoa<?php echo $i?>'></td>
                                 <td>
 <input class='form-control' name='unidada<?php echo $i?>' id='unidada<?php echo $i?>' type="number" onChange="obtenmontoa(<?php echo $i; ?>);suma_verticala(<?php echo $i; ?>);">
                                  </td>
                                 <td><input class="form-control" id="dias_a_utilizara<?php echo $i?>" name="dias_a_utilizara<?php echo $i?>" type="number" onChange="obtenmontoa(<?php echo $i; ?>);suma_verticala(<?php echo $i; ?>);"></td>
                                 <td><input class="form-control" id="costo_unitario_imp_incluidosa<?php echo $i?>" name="costo_unitario_imp_incluidosa<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontoa(<?php echo $i; ?>);suma_verticala(<?php echo $i; ?>);"></td>
                                 <td><input class="form-control" id="monto_tot_imp_incluidosa<?php echo $i?>" name="monto_tot_imp_incluidosa<?php echo $i?>" placeholder="0.00" type="text" readonly>
                                 </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td><div align="right"><strong>Total:</strong></div></td>
                                 <td>
           <input type="text" class="form-control" name="total_esp_mue_inmuea" id="total_esp_mue_inmuea" placeholder="0.00" value="<?php echo $total_esp_mue_inmuea; ?>" readonly>
           </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                     </div>
                  </div>
                  <?php } ?>
        <!-- FIN PESTAÑA "2" -->
        <!-- INICIO PESTAÑA "3" -->
                  <?php if($clave3!=""){ ?>
                  <div class="tab-pane" id="tab-03">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>3. Derechos en general</h3>
                            </div>
                          <div class="col-md-12"><hr class="red small-margin"></div>
                          <div class="row">
                             <div class="col-md-12">
                               <table class="table-responsive">
                                <tr>
                                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                                </tr>
                                <tr>
                                 <?php
                                    $query_user3="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 3;";                          
                                    $res_user3 =  mysqli_query($con, $query_user3);
                                    $cuantos3=mysqli_num_rows($res_user3);
                                                ?>
                                <input type="hidden" name="cuantos_INSERT3" id="cuantos_INSERT3" value="<?php echo $cuantos3; ?>">
                                 <?php
                                    $h=0;
                                        while($fila3=mysqli_fetch_array($res_user3, MYSQLI_ASSOC)){
                                            $h=$h+1;  
                                            $total_esp_mue_inmueb = $fila3['total_esp_mue_inmue'];                             
                                 ?>
                                 <td><?php echo $h; ?><input type="hidden" name="idb<?php echo $h; ?>" id="idb<?php echo $h; ?>" value="<?php echo $fila3['id']; ?>"></td>
                                 <td>
                                 <input class='form-control' name='conceptob<?php echo $h; ?>' id='conceptob<?php echo $h; ?>' value="<?php echo $fila3['concepto']; ?>">
                                 </td>
                                 <td> 
                                 <input class='form-control' name='unidadb<?php echo $h; ?>' id='unidadb<?php echo $h; ?>' onChange="obtenmontob(<?php echo $h; ?>);suma_verticalb(<?php echo $h; ?>);" value="<?php echo $fila3['unidad']; ?>">
                                 </td>
                                 <td>
                                 <input class="form-control" id="costo_unitario_imp_incluidosb<?php echo $h; ?>" name="costo_unitario_imp_incluidosb<?php echo $h; ?>" value="<?php echo $fila3['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmontob(<?php echo $h; ?>);suma_verticalb(<?php echo $h; ?>);">
                                 </td>
                                 <td>
                                 <input class="form-control" id="monto_tot_imp_incluidosb<?php echo $h?>" name="monto_tot_imp_incluidosb<?php echo $h?>" value="<?php echo $fila3['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="obtenmontob(<?php echo $h; ?>);suma_verticalb(<?php echo $h; ?>);">
                                 </td>
                                </tr>
                                 <?php
                                        }
                                 $cuantos3 = $cuantos3+1;
                                 for($i=$cuantos3;$i<=30;$i++){
                                 ?>
                                <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><input class='form-control' name='conceptob<?php echo $i?>' id='conceptob<?php echo $i?>'></td>
                                 <td><input class='form-control' name='unidadb<?php echo $i?>' id='unidadb<?php echo $i?>' type="number" onChange="obtenmontob(<?php echo $i; ?>);suma_verticalb(<?php echo $i; ?>);">
                                  </td>
                                 <td><input class="form-control" id="costo_unitario_imp_incluidosb<?php echo $i; ?>" name="costo_unitario_imp_incluidosb<?php echo $i; ?>" placeholder="0.00" type="text" onChange="obtenmontob(<?php echo $i; ?>);suma_verticalb(<?php echo $i; ?>);"></td>
                                 <td><input class="form-control" id="monto_tot_imp_incluidosb<?php echo $i; ?>" name="monto_tot_imp_incluidosb<?php echo $i; ?>" placeholder="0.00" type="text" readonly>
                                 </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td><div align="right"><strong>Total:</strong></div></td>
                                 <td>
              <input type="text" class="form-control" name="total_esp_mue_inmueb" id="total_esp_mue_inmueb" placeholder="0.00" value="<?php echo $total_esp_mue_inmueb; ?>" readonly></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                      </div> 
                  </div>
                 <?php } ?>
        <!-- FIN PESTAÑA "3" -->
        <!-- INICIO PESTAÑA "4" -->
                  <?php if($clave4!=""){ ?>
                  <div class="tab-pane" id="tab-04">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>4. Seguridad (incluye gastos médicos, traslados de obra, instrumentos, etc.)</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <table class="table-responsive">
                                <tr>
                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                  </tr>
                                <tr>
                                  <?php
                                    $query_user4="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 4;";                          
                                    $res_user4 =  mysqli_query($con, $query_user4);
                                    $cuantos4=mysqli_num_rows($res_user4);
                                ?>
                                   <input type="hidden" name="cuantos_INSERT4" id="cuantos_INSERT4" value="<?php echo $cuantos4; ?>">
                                  <?php
                                    $h=0;
                                    $conceptoa_gasto=0;
                                      while($fila4=mysqli_fetch_array($res_user4, MYSQLI_ASSOC)){
                                        $h=$h+1;      
                                        $total_esp_mue_inmuec = $fila4['total_esp_mue_inmue'];        
                ?>
                 <td><?php echo $h; ?><input type="hidden" name="idc<?php echo $h; ?>" id="idc<?php echo $h; ?>" value="<?php echo $fila4['id']; ?>"></td>
                 <td>
                 <input class='form-control' name='conceptoc<?php echo $h; ?>' id='conceptoc<?php echo $h; ?>' value="<?php echo $fila4['concepto']; ?>">
                 </td>
                 <td> 
                 <input class='form-control' name='unidadc<?php echo $h; ?>' id='unidadc<?php echo $h; ?>' onChange="obtenmontoc(<?php echo $h; ?>);suma_verticalc(<?php echo $h; ?>);" value="<?php echo $fila4['unidad']; ?>">
                 </td>
                 <td>
                 <input class="form-control" id="costo_unitario_imp_incluidosc<?php echo $h?>" name="costo_unitario_imp_incluidosc<?php echo $h?>" value="<?php echo  $fila4['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmontoc(<?php echo $h; ?>);suma_verticalc(<?php echo $h; ?>);">
                 </td>
                 <td>
                 <input class="form-control" id="monto_tot_imp_incluidosc<?php echo $h?>" name="monto_tot_imp_incluidosc<?php echo $h?>" value="<?php echo $fila4['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="obtenmontoc(<?php echo $h; ?>);suma_verticalc(<?php echo $h; ?>);">
                 </td>
                </tr>
                 <?php
                    }
                 $cuantos4 = $cuantos4+1;
                 for($i=$cuantos4;$i<=30;$i++){
                 ?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><input class='form-control' name='conceptoc<?php echo $i?>' id='conceptoc<?php echo $i?>'></td>
                 <td>
                  <input class='form-control' name='unidadc<?php echo $i?>' id='unidadc<?php echo $i?>' type="number" onChange="obtenmontoc(<?php echo $i; ?>);suma_verticalc(<?php echo $i; ?>);">
                 </td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidosc<?php echo $i?>" name="costo_unitario_imp_incluidosc<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontoc(<?php echo $i; ?>);suma_verticalc(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="monto_tot_imp_incluidosc<?php echo $i?>" name="monto_tot_imp_incluidosc<?php echo $i?>" placeholder="0.00" type="text" readonly>
                 </td>
                </tr>
                 <?php } ?>
                <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td><div align="right"><strong>Total:</strong></div></td>
                 <td>
              <input type="text" class="form-control" name="total_esp_mue_inmuec" id="total_esp_mue_inmuec" placeholder="0.00" value="<?php echo $total_esp_mue_inmuec; ?>" readonly></td>
                </tr>
                </table>
                      </div>
                  </div> 
                  <?php } ?>
        <!-- FIN PESTAÑA "4" -->
        <!-- INICIO PESTAÑA "5" -->
                  <?php if($clave5!=""){ ?>
                  <div class="tab-pane" id="tab-05">
                      <div class="row">
                            <div class="col-md-8"> 
                              <h3>5. Transportación aérea de las/os participantes(No se cubren pérdidas de boletos, cambios de itinerarios, exceso de equipaje, ni acompañantes)</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <table class="table-responsive">
                                <tr>
                 <td>#</td>
                                 <td>Nombre del (los) participante(s)*:</td>
                                 <td>Origen-Destino-Origen*:</td>
                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                 </tr>
                 <tr>
                           <?php
                                    $query_user5="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 5;";                          
                                    $res_user5 =  mysqli_query($con, $query_user5);
                                    $cuantos5=mysqli_num_rows($res_user5);
                           ?>
                                   <input type="hidden" name="cuantos_INSERT5" id="cuantos_INSERT5" value="<?php echo $cuantos5; ?>">
                                 <?php
                                    $h=0;
                                      while($fila5=mysqli_fetch_array($res_user5, MYSQLI_ASSOC)){
                                        $h  = $h+1;
                                        $total_esp_mue_inmued = $fila5['total_esp_mue_inmue'];
                           ?>
                 <td><?php echo $h; ?><input type="hidden" name="idd<?php echo $h; ?>" id="idd<?php echo $h; ?>" value="<?php echo $fila5['id']; ?>"></td>
                 <td>
          <input class='form-control' name='nombre_participantes<?php echo $h; ?>' id='nombre_participantes<?php echo $h; ?>' value="<?php echo $fila5['nombre_participantes']; ?>">
                 </td>
                                 <td>
                    <input class='form-control' name='origen_destino_origen<?php echo $h; ?>' id='origen_destino_origen<?php echo $h; ?>' value="<?php echo $fila5['origen_destino_origen']; ?>">
                               </td>
                 <td>
                 <input class="form-control" id="monto_tot_imp_incluidosd<?php echo $h; ?>" name="monto_tot_imp_incluidosd<?php echo $h?>" value="<?php echo $fila5['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="suma_verticald(<?php echo $h; ?>);">
                 </td>
                </tr>
                 <?php
                    }
                 $cuantos5 = $cuantos5+1;
                 for($i=$cuantos5;$i<=30;$i++){
                 ?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><input class='form-control' name='nombre_participantes<?php echo $i?>' id='nombre_participantes<?php echo $i?>'></td>
                                 <td><input class='form-control' name='origen_destino_origen<?php echo $i?>' id='origen_destino_origen<?php echo $i?>'></td>
                 <td>
                 <input class="form-control" id="monto_tot_imp_incluidosd<?php echo $i?>" name="monto_tot_imp_incluidosd<?php echo $i?>" type="text" onChange="suma_verticald(<?php echo $h; ?>);">
                 </td>
                </tr>
                                <?php } ?>
                <tr>
                 <td colspan="2">&nbsp;</td>
                 <td><div align="right"><strong>Total:</strong></div></td>
                 <td>
              <input type="text" class="form-control" name="total_esp_mue_inmued" id="total_esp_mue_inmued" placeholder="0.00" value="<?php echo $total_esp_mue_inmued; ?>" readonly>
              </td>
                         </tr>
                 </table>                            
                      </div>
                     </div>
                  <?php } ?>
        <!-- FIN PESTAÑA 5" -->
        <!-- INICIO PESTAÑA "6" -->
                  <?php if($clave6!=""){ ?>
                  <div class="tab-pane" id="tab-06">
                      <div class="row">
                            <div class="col-md-8"> 
                              <h3>6. Servicios de subtitulaje y traducción</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <table class="table-responsive">
                                <tr>
                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                  </tr>
                                <tr>
                                  <?php
                                    $query_user6="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 6;";                          
                                    $res_user6 =  mysqli_query($con, $query_user6);
                                    $cuantos6=mysqli_num_rows($res_user6);
                            ?>
                                   <input type="hidden" name="cuantos_INSERT6" id="cuantos_INSERT6" value="<?php echo $cuantos6; ?>">
                                 <?php
                                    $h=0;
                                      while($fila6=mysqli_fetch_array($res_user6, MYSQLI_ASSOC)){
                                        $h  = $h+1;
                                        $total_esp_mue_inmues = $fila6['total_esp_mue_inmue'];       
                        ?>
                 <td><?php echo $h; ?><input type="hidden" name="ids<?php echo $h;?>" id="ids<?php echo $h; ?>" value="<?php echo $fila6['id']; ?>"></td>
                 <td><input class='form-control' name='conceptoe<?php echo $h; ?>' id='conceptoe<?php echo $h; ?>' value="<?php echo $fila6['concepto']; ?>"></td>
                 <td><input class='form-control' name='unidade<?php echo $h; ?>' id='unidade<?php echo $h; ?>' onChange="obtenmontoe(<?php echo $h; ?>);" value="<?php echo $fila6['unidad']; ?>"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidose<?php echo $h?>" name="costo_unitario_imp_incluidose<?php echo $h?>" value="<?php echo $fila6['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmontoe(<?php echo $h; ?>);suma_verticale(<?php echo $h; ?>);">
                </td>
                 <td><input class="form-control" id="monto_tot_imp_incluidos_dos<?php echo $h?>" name="monto_tot_imp_incluidos_dos<?php echo $h?>" value="<?php echo $fila6['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="obtenmontoe(<?php echo $h; ?>);suma_verticale(<?php echo $h; ?>);">
                 </td>
                </tr>
                 <?php
                    }
                 $cuantos6 = $cuantos6+1;
                 for($i=$cuantos6;$i<=30;$i++){
                 ?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><input class='form-control' name='conceptoe<?php echo $i?>' id='conceptoe<?php echo $i?>'></td>
                 <td><input class='form-control' name='unidade<?php echo $i?>' id='unidade<?php echo $i?>' type="number" onChange="obtenmontoe(<?php echo $i; ?>);suma_verticale(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidose<?php echo $i?>" name="costo_unitario_imp_incluidose<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontoe(<?php echo $i; ?>);suma_verticale(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="monto_tot_imp_incluidos_dos<?php echo $i?>" name="monto_tot_imp_incluidos_dos<?php echo $i?>" placeholder="0.00" type="text" readonly>
                 </td>
                </tr>
                                <?php } ?>
                <tr>
                 <td colspan="3">&nbsp;</td>
                         <td><div align="right"><strong>Total:</strong></div></td>
                 <td><input type="text" class="form-control" name="total_esp_mue_inmuee" id="total_esp_mue_inmuee" placeholder="0.00" value="<?php echo $total_esp_mue_inmues; ?>" readonly></td>
                </tr>
                 </table>                            
                      </div>
                     </div>
                  <?php } ?>
        <!-- FIN PESTAÑA 6" -->
        <!-- INICIO PESTAÑA "7" -->
                  <?php if($clave7!=""){ ?>
                  <div class="tab-pane" id="tab-07">
                      <div class="row">
                            <div class="col-md-8"> 
                              <h3>7. Insumos para actividades gastronómicas (Se sugiere el uso de artículos biodegradables)</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <table class="table-responsive">
                                <tr>
                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                  </tr>
                                <tr>
                                  <?php
                                    $query_user7="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 7;";                          
                                    $res_user7 =  mysqli_query($con, $query_user7);
                                    $cuantos7=mysqli_num_rows($res_user7);
                  ?>
                                   <input type="hidden" name="cuantos_INSERT7" id="cuantos_INSERT7" value="<?php echo $cuantos7; ?>">
                                 <?php
                                    $h=0;
                                      while($fila7=mysqli_fetch_array($res_user7, MYSQLI_ASSOC)){
                                        $h  = $h+1;
                                        $total_esp_mue_inmueg = $fila7['total_esp_mue_inmue'];
                ?>
                 <td><?php echo $h; ?><input type="hidden" name="idg<?php echo $h; ?>" id="idg<?php echo $h; ?>" value="<?php echo $fila7['id']; ?>"></td>
                 <td><input class='form-control' name='conceptog<?php echo $h; ?>' id='conceptog<?php echo $h; ?>' value="<?php echo $fila7['concepto']; ?>"></td>
                 <td><input class='form-control' name='unidadg<?php echo $h; ?>' id='unidadg<?php echo $h; ?>' onChange="obtenmontog(<?php echo $h; ?>);" value="<?php echo $fila7['unidad']; ?>"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidosg<?php echo $h?>" name="costo_unitario_imp_incluidosg<?php echo $h?>" value="<?php echo $fila7['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmontog(<?php echo $h; ?>);suma_verticalg(<?php echo $h; ?>);">
                </td>
                 <td><input class="form-control" id="monto_tot_imp_incluidosg<?php echo $h?>" name="monto_tot_imp_incluidosg<?php echo $h?>" value="<?php echo $fila7['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="obtenmontog(<?php echo $h; ?>);suma_verticalg(<?php echo $h; ?>);">
                 </td>
                </tr>
                 <?php
                    }
                 $cuantos7 = $cuantos7+1;
                 for($i=$cuantos7;$i<=30;$i++){
                 ?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><input class='form-control' name='conceptog<?php echo $i?>' id='conceptog<?php echo $i?>'></td>
                 <td><input class='form-control' name='unidadg<?php echo $i?>' id='unidadg<?php echo $i?>' type="number" onChange="obtenmontog(<?php echo $i; ?>);suma_verticalg(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidosg<?php echo $i?>" name="costo_unitario_imp_incluidosg<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontog(<?php echo $i; ?>);suma_verticalg(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="monto_tot_imp_incluidosg<?php echo $i?>" name="monto_tot_imp_incluidosg<?php echo $i?>" placeholder="0.00" type="text" readonly>
                 </td>
                </tr>
                                <?php } ?>
                <tr>
                 <td colspan="3">&nbsp;</td>
                         <td><div align="right"><strong>Total:</strong></div></td>
                 <td><input type="text" class="form-control" name="total_esp_mue_inmueg" id="total_esp_mue_inmueg" placeholder="0.00" value="<?php echo $total_esp_mue_inmueg; ?>" readonly></td>
                </tr>
                 </table>                            
                      </div>
                     </div>
                  <?php } ?>
        <!-- FIN PESTAÑA 7" -->
        <!-- INICIO PESTAÑA "8" -->
                  <?php if($clave8!=""){ ?>
                  <div class="tab-pane" id="tab-08">
                      <div class="row">
                            <div class="col-md-8"> 
                              <h3>8. Servicios de paquetería</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <table class="table-responsive">
                                <tr>
                 <td>#</td>
                                 <td>Concepto*:</td>
                                 <td>Unidad*:</td>
                 <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                 <td>Monto total con impuestos incluidos (M.N.)*:</td>
                  </tr>
                  <tr>
                    <?php
                      $query_user8="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 8;";                          
                      $res_user8 =  mysqli_query($con, $query_user8);
                      $cuantos8=mysqli_num_rows($res_user8);
                    ?>
                    <input type="hidden" name="cuantos_INSERT8" id="cuantos_INSERT8" value="<?php echo $cuantos8; ?>">
                       <?php
                         $h=0;
                         while($fila8=mysqli_fetch_array($res_user8, MYSQLI_ASSOC)){
                            $h  = $h+1;
                            $total_esp_mue_inmueh = $fila8['total_esp_mue_inmue'];
                ?>
                 <td><?php echo $h; ?><input type="hidden" name="idh<?php echo $h; ?>" id="idh<?php echo $h; ?>" value="<?php echo $fila8['id']; ?>"></td>
                 <td><input class='form-control' name='conceptoh<?php echo $h; ?>' id='conceptoh<?php echo $h; ?>' value="<?php echo $fila8['concepto']; ?>"></td>
                 <td><input class='form-control' name='unidadh<?php echo $h; ?>' id='unidadh<?php echo $h; ?>' onChange="obtenmontog(<?php echo $h; ?>);" value="<?php echo $fila8['unidad']; ?>"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidosh<?php echo $h?>" name="costo_unitario_imp_incluidosh<?php echo $h?>" value="<?php echo $fila8['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmontoh(<?php echo $h; ?>);suma_verticalh(<?php echo $h; ?>);">
                </td>
                 <td><input class="form-control" id="monto_tot_imp_incluidosh<?php echo $h?>" name="monto_tot_imp_incluidosh<?php echo $h?>" value="<?php echo $fila8['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="obtenmontoh(<?php echo $h; ?>);suma_verticalh(<?php echo $h; ?>);">
                 </td>
                </tr>
                 <?php
                    }
                 $cuantos8 = $cuantos8+1;
                 for($i=$cuantos8;$i<=30;$i++){
                 ?>
                    <tr>
                     <td><?php echo $i; ?></td>
                     <td><input class='form-control' name='conceptoh<?php echo $i?>' id='conceptoh<?php echo $i?>'></td>
                     <td><input class='form-control' name='unidadh<?php echo $i?>' id='unidadh<?php echo $i?>' type="number" onChange="obtenmontoh(<?php echo $i; ?>);suma_verticalh(<?php echo $i; ?>);"></td>
                     <td><input class="form-control" id="costo_unitario_imp_incluidosh<?php echo $i?>" name="costo_unitario_imp_incluidosh<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontoh(<?php echo $i; ?>);suma_verticalh(<?php echo $i; ?>);"></td>
                     <td><input class="form-control" id="monto_tot_imp_incluidosh<?php echo $i?>" name="monto_tot_imp_incluidosh<?php echo $i?>" placeholder="0.00" type="text" readonly>
                     </td>
                    </tr>
                <?php } ?>
                <tr>
                 <td colspan="3">&nbsp;</td>
                         <td><div align="right"><strong>Total:</strong></div></td>
                 <td><input type="text" class="form-control" name="total_esp_mue_inmueh" id="total_esp_mue_inmueh" placeholder="0.00" value="<?php echo $total_esp_mue_inmueh; ?>" readonly></td>
                </tr>
                 </table>                            
                      </div>
                     </div>
                  <?php } ?>
        <!-- FIN PESTAÑA 8" -->
        <!-- INICIO PESTAÑA "9" -->
            <?php if($clave9!=""){ ?>
                  <div class="tab-pane" id="tab-09">
                      <div class="row">
                            <div class="col-md-9"> 
                              <h3>9. Corte vinil para stands de exposición y/o foros</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                <table class="table-responsive">
                <tr>
                   <td>#</td>
                   <td>Concepto*:</td>
                   <td>Unidad*:</td>
                   <td>Costo unitario con impuestos incluidos (M.N)*:</td>
                   <td>Monto total con impuestos incluidos (M.N.)*:</td>
                </tr>
                <tr>
                  <?php
                      $query_user9="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 9;";                          
                      $res_user9 =  mysqli_query($con, $query_user9);
                      $cuantos9=mysqli_num_rows($res_user9);
                  ?>
                 <input type="hidden" name="cuantos_INSERT9" id="cuantos_INSERT9" value="<?php echo $cuantos9; ?>">
                 <?php
                            $h=0;
                            while($fila9=mysqli_fetch_array($res_user9, MYSQLI_ASSOC)){
                                $h = $h+1;
                                $total_esp_mue_inmuez = $fila9['total_esp_mue_inmue'];
                  ?>
                 <td><?php echo $h; ?><input type="hidden" name="idz<?php echo $h; ?>" id="idz<?php echo $h; ?>" value="<?php echo $fila9['id']; ?>"></td>
                 <td><input class='form-control' name='conceptoz<?php echo $h; ?>' id='conceptoz<?php echo $h; ?>' value="<?php echo $fila9['concepto']; ?>"></td>
                 <td><input class='form-control' name='unidadz<?php echo $h; ?>' id='unidadz<?php echo $h; ?>' onChange="obtenmontog(<?php echo $h; ?>);" value="<?php echo $fila9['unidad']; ?>"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidosz<?php echo $h; ?>" name="costo_unitario_imp_incluidosz<?php echo $h; ?>" value="<?php echo $fila9['costo_unitario_imp_incluidos']; ?>" type="number" onChange="obtenmontoi(<?php echo $h; ?>);suma_verticali(<?php echo $h; ?>);"></td>
                 <td>
                  <input class="form-control" id="monto_tot_imp_incluidosz<?php echo $h; ?>" name="monto_tot_imp_incluidosz<?php echo $h; ?>" value="<?php echo $fila9['monto_tot_imp_incluidos']; ?>" placeholder="0.00" type="text" onChange="obtenmontoi(<?php echo $h; ?>);suma_verticali(<?php echo $h; ?>);">
                 </td>
                </tr>
                 <?php
                    }
                 $cuantos9 = $cuantos9+1;
                 for($i=$cuantos9;$i<=30;$i++){
                 ?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><input class='form-control' name='conceptoz<?php echo $i; ?>' id='conceptoz<?php echo $i; ?>'></td>
                <td><input class='form-control' name='unidadz<?php echo $i; ?>' id='unidadz<?php echo $i; ?>' type="number" onChange="obtenmontoi(<?php echo $i; ?>);suma_verticali(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="costo_unitario_imp_incluidosz<?php echo $i; ?>" name="costo_unitario_imp_incluidosz<?php echo $i; ?>" placeholder="0.00" type="text" onChange="obtenmontoi(<?php echo $i; ?>);suma_verticali(<?php echo $i; ?>);"></td>
                 <td><input class="form-control" id="monto_tot_imp_incluidosz<?php echo $i; ?>" name="monto_tot_imp_incluidosz<?php echo $i; ?>" placeholder="0.00" type="text" readonly>
                 </td>
                </tr>
                                <?php } ?>
                <tr>
                 <td colspan="3">&nbsp;</td>
                         <td><div align="right"><strong>Total:</strong></div></td>
                 <td><input type="text" class="form-control" name="total_esp_mue_inmuez" id="total_esp_mue_inmuez" placeholder="0.00" value="<?php echo $total_esp_mue_inmue; ?>" readonly>
                 </td>
                </tr>
                 </table>                            
              </div>
            </div>
          <?php } ?>
        <!-- FIN PESTAÑA 9" -->
        <div class="row top-buffer">
					<div class="col-md-12">
						<div class="form-group clearfix">	
							<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
								<div class="pull-right">
                  <?php echo $total_proyecto; ?>
                                   <input type="hidden" name="total_proyecto" id="total_proyecto" value="<?php echo $total_proyecto; ?>">

    <input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return validarEnvio_presup(<?php echo $total_proyecto; ?>);">
								</div>
                           </div>
                        </div>
          			</div>
           </div>
		<div class="bottom-buffer"></div>
	</div>
    </div>
</form>

<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
<script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
</body>
</html>
