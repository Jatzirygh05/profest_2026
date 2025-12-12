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
      <script type="text/javascript" src="js/Validacion_req_1_v2.js"></script>
      <script type="text/javascript" src="js/Validacion_req_2_v2.js"></script>
      <script type="text/javascript" src="js/Validacion_req_3_v2.js"></script>
     
      
      <script type="text/javascript">
		////// INICIO 1
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
			var cuantos = 30
			
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
		////// FIN 1
		////// INICIO 2 
		function obtenmontoa(id){
						var unidadava=eval('document.formula.unidada'+id+'.value');
						var diasva=eval('document.formula.dias_a_utilizara'+id+'.value');
						var costova=eval('document.formula.costo_unitario_imp_incluidosa'+id+'.value');
								
						if(unidadava.length==0 || diasva.length==0 || costova.lenght==0){
							var monto_v = eval('document.formula.monto_tot_imp_incluidosa'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadava * diasva * costova;
							
							var monto_total_renglon = eval('document.formula.monto_tot_imp_incluidosa'+id);
							
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		
		function suma_verticala(id){
			var sumaTa=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formula.monto_tot_imp_incluidosa'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTa=sumaTa+calcula_total;
					} 
			}
					  var obtsumaa= document.formula.total_esp_mue_inmuea;
						obtsumaa.value=sumaTa; 
		}
		///// FIN 2
		///// INICIO 3
		function obtenmontob(id){
						var unidadbvb=eval('document.formulb.unidadb'+id+'.value');
						var costovb=eval('document.formulb.costo_unitario_imp_incluidosb'+id+'.value');
								
						if(unidadbvb.length==0 || costovb.lenght==0){
							var monto_v = eval('document.formulb.monto_tot_imp_incluidos'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadbvb * costovb;
							
							var monto_total_renglon = eval('document.formulb.monto_tot_imp_incluidosb'+id);
							
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		
		function suma_verticalb(id){
			var sumaTb=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formulb.monto_tot_imp_incluidosb'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTb=sumaTb+calcula_total;
					} 
			}
					  var obtsumab= document.formulb.total_esp_mue_inmueb;
						obtsumab.value=sumaTb; 
		}
		///// FIN 3
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

		<div class="row " id="rowError1" name="rowError1" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada en 1. Arrendamiento de espacios, muebles e inmuebles,<br>
                * Todos los campos son obligatorios.<br>
                * El total de las sumas de cada formato de ser igual a el Apoyo financiero solicitado a la Secretaría de Cultura.</div>
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
                * Todos los campos son obligatorios.<br>
                * El total de las sumas de cada formato de ser igual a el Apoyo financiero solicitado a la Secretaría de Cultura.</div>
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
                * Todos los campos son obligatorios.<br>
                * El total de las sumas de cada formato de ser igual a el Apoyo financiero solicitado a la Secretaría de Cultura.</div>
            </div>
        </div>
        <div class="row " id="rowBien3" name="rowBien3" style="display:none">
            <div class="col-md-12">
              <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta del 3. Derechos en general.</div>
            </div>
        </div>
      
      <?php $total_proyecto=720; //Apoyo financiero solicitado a la Secretaría de Cultura ?>
      <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
      <strong>Apoyo financiero solicitado a la Secretaría de Cultura:</strong>
      </div>
      <div class="col-sm-4">
      <input type="text" class="form-control" name="apoyo_fin_sol_sc" id="apoyo_fin_sol_sc" value="<?php echo $total_proyecto; ?>" readonly>
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
				$variable_guarda;
				
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
              <?php if($clave6!=""){ ?> <li><a data-toggle="tab" href="#tab-06">6. Servicios de subtitulaje y traducción.</a></li><?php } ?>
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
                      </div>
                     <form name="formul" action="poner_pagina.php" method="post">
                          <div class="row">
                             <div class="col-md-12">
                               <table class="table-responsive">
                                <tr>
								 <td>#</td>
                                 <td>Concepto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td>
                                 <td>Unidad<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</td>
								 <td>Días a utilizar<samp id="errMonto_unidad_aAs" name="errMonto_unidad_aAs" class="control-label">*</samp>:</td>
								 <td>Costo unitario con impuestos incluidos (M.N)<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</td>
								 <td>Monto total con impuestos incluidos (M.N.):</td>
							    </tr>
                                <tr>
                                  <?php
                                    $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 1;";                          
                                    $res_user2 =  mysqli_query($con, $query_user2);
                                    $cuantos=mysqli_num_rows($res_user2);
                                    $h=0;
                                    $Concepto_gasto=0;
                                    	while($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
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
								 for($i=$cuantos;$i<=30;$i++){
								 ?>
								<tr>
								 <td><?php echo $i; ?></td>
								 <td><input class='form-control' name='concepto<?php echo $i?>' id='concepto<?php echo $i?>'></td>
								 <td><input class='form-control' name='unidad<?php echo $i?>' id='unidad<?php echo $i?>' type="number" onChange="obtenmonto(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_vertical(<?php echo $i; ?>);">
                                  </td>
								 <td><input class="form-control" id="dias_a_utilizar<?php echo $i?>" name="dias_a_utilizar<?php echo $i?>" type="number" onChange="obtenmonto(<?php echo $i; ?>);suma_vertical(<?php echo $i; ?>);"></td>
								 <td><input class="form-control" id="costo_unitario_imp_incluidos<?php echo $i?>" name="costo_unitario_imp_incluidos<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmonto(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_vertical(<?php echo $i; ?>);"></td>
								 <td><input class="form-control" id="monto_tot_imp_incluidos<?php echo $i?>" name="monto_tot_imp_incluidos<?php echo $i?>" placeholder="0.00" type="text" readonly>
								 </td>
								</tr>
                                <?php } ?>
								<tr>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td><div align="center"><strong>Total:</strong></div></td>
								 <td><input type="text" class="form-control" name="total_esp_mue_inmue" id="total_esp_mue_inmue" placeholder="0.00" readonly></td>
								</tr>
							  </table>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group clearfix">	
                                <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                                  <div class="pull-right">
                                   <input type="hidden" name="total_proyecto" id="total_proyecto" value="<?=$total_proyecto?>">
                        		   <input class="btn btn-primary" type="button" value="Revisar información" id="submit1" name="submit1" onClick="return validarEnvio_presup(<?php echo $total_proyecto; ?>, <?php echo $total_esp_mue_inmue; ?>);" >
                                  </div>
                               </div>
                             </div>
           				   </div>
						</form>
                 		</div> 
                      <?php } ?>
				<!-- FIN PESTAÑA "1" -->
				<!-- INICIO PESTAÑA "2" -->
                  <?php if($clave2!=""){ ?><div class="tab-pane" id="tab-02">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>2. Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                             <form name="formula" action="poner_pagina.php" method="post">
                          <div class="row">
                             <div class="col-md-12">
                               <table class="table-responsive">
                                <tr>
								 <td>#</td>
                                 <td>Concepto<samp id="errconceptoa_gasto_aAs" name="errconceptoa_gasto_aAs" class="control-label">*</samp>:</td>
                                 <td>Unidad<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</td>
								 <td>Días a utilizar<samp id="errMonto_unidada_aAs" name="errMonto_unidada_aAs" class="control-label">*</samp>:</td>
								 <td>Costo unitario con impuestos incluidos (M.N)<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</td>
								 <td>Monto total con impuestos incluidos (M.N.):</td>
							    </tr>
                                <tr>
                                  <?php
                                    $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 2;";                          
                                    $res_user2 =  mysqli_query($con, $query_user2);
                                    $cuantos=mysqli_num_rows($res_user2);
                                    $h=0;
                                    $conceptoa_gasto=0;
                                    	while($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                                    		$h=$h+1;
                                    		$id			=	$fila2['id'];
                                    		$conceptoa	=	$fila2['concepto'];
                                    		$unidada		=	$fila2['unidad'];
                                    		$dias_a_utilizara =	$fila2['dias_a_utilizar'];
                                    		$costo_unitario_imp_incluidosa =	$fila2['costo_unitario_imp_incluidos'];
                                    		$monto_tot_imp_incluidosa	=	$fila2['monto_tot_imp_incluidos'];                            
								?>
								 <td><?php echo $h; ?><input type="hidden" name="id<?=$h?>" id="id<?=$h?>" value="<?=$id?>">
                                 <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
								 </td>
								 <td>
								 <input class='form-control' name='conceptoa<?php echo $h?>' id='conceptoa<?php echo $h?>'>
								 </td>
								 <td> 
								 <input class='form-control' name='unidada<?=$h?>' id='unidada<?=$h?>'>
								 </td>
								 <td><input class='form-control' name='dias_a_utilizara<?php echo $h?>' id='dias_a_utilizara<?php echo $h?>' type="number">
								 </td>
								 <td>
								 <input class="form-control" id="costo_unitario_imp_incluidosa<?=$h?>" name="costo_unitario_imp_incluidosa<?=$h?>" value="<?=$costo_unitario_imp_incluidosa?>" type="number">
								 </td>
								 <td>
								 <input class="form-control" id="monto_tot_imp_incluidosa<?=$h?>" name="monto_tot_imp_incluidosa<?=$h?>" value="<?=$monto_tot_imp_incluidosa?>" placeholder="0.00" type="text">
								 </td>
								</tr>
								 <?php
										}
								 $cuantos = $cuantos+1;
								 for($i=$cuantos;$i<=30;$i++){
								 ?>
								<tr>
								 <td><?php echo $i; ?></td>
								 <td><input class='form-control' name='conceptoa<?php echo $i?>' id='conceptoa<?php echo $i?>'></td>
								 <td><input class='form-control' name='unidada<?php echo $i?>' id='unidada<?php echo $i?>' type="number" onChange="obtenmontoa(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_verticala(<?php echo $i; ?>);">
                                  </td>
								 <td><input class="form-control" id="dias_a_utilizara<?php echo $i?>" name="dias_a_utilizara<?php echo $i?>" type="number" onChange="obtenmontoa(<?php echo $i; ?>);suma_verticala(<?php echo $i; ?>);"></td>
								 <td><input class="form-control" id="costo_unitario_imp_incluidosa<?php echo $i?>" name="costo_unitario_imp_incluidosa<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontoa(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_verticala(<?php echo $i; ?>);"></td>
								 <td><input class="form-control" id="monto_tot_imp_incluidosa<?php echo $i?>" name="monto_tot_imp_incluidosa<?php echo $i?>" placeholder="0.00" type="text" readonly>
								 </td>
								</tr>
                                <?php } ?>
								<tr>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td><div align="center"><strong>Total:</strong></div></td>
								 <td><input type="text" class="form-control" name="total_esp_mue_inmuea" id="total_esp_mue_inmuea" placeholder="0.00" readonly></td>
								</tr>
							  </table>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group clearfix">	
                                <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                                  <div class="pull-right">
                                   <input type="hidden" name="total_proyecto" id="total_proyecto" value="<?=$total_proyecto?>">
                        		   <input class="btn btn-primary" type="button" value="Revisar información" id="submit1" name="submit1" onClick="return validarEnvio_presupa(<?php echo $total_proyecto; ?>, <?php echo $total_esp_mue_inmuea; ?>);" >
                                  </div>
                               </div>
                             </div>
           				   </div>
						</form>
                      </div>
                  </div> 
                  <?php } ?>
				<!-- FIN PESTAÑA "2" -->
                <!-- INICIO PESTAÑA "3" -->
                  <?php if($clave3!=""){ ?><div class="tab-pane" id="tab-03">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>3. Derechos en general</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                            <form name="formulb" action="poner_pagina.php" method="post">
                          <div class="row">
                             <div class="col-md-12">
                               <table class="table-responsive">
                                <tr>
								 <td>#</td>
                                 <td>Concepto<samp id="errconceptoa_gasto_aAs" name="errconceptoa_gasto_aAs" class="control-label">*</samp>:</td>
                                 <td>Unidad<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</td>
								 <td>Costo unitario con impuestos incluidos (M.N)<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</td>
								 <td>Monto total con impuestos incluidos (M.N.):</td>
							    </tr>
                                <tr>
                                  <?php
                                    $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' and tipo = 3;";                          
                                    $res_user2 =  mysqli_query($con, $query_user2);
                                    $cuantos=mysqli_num_rows($res_user2);
                                    $h=0;
                                    $conceptoa_gasto=0;
                                    	while($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                                    		$h=$h+1;
                                    		$id			=	$fila2['id'];
                                    		$conceptob	=	$fila2['concepto'];
                                    		$unidadb		=	$fila2['unidad'];
                                    		$dias_a_utilizarb =	$fila2['dias_a_utilizar'];
                                    		$costo_unitario_imp_incluidosb =	$fila2['costo_unitario_imp_incluidos'];
                                    		$monto_tot_imp_incluidosb	=	$fila2['monto_tot_imp_incluidos'];                            
								?>
								 <td><?php echo $h; ?><input type="hidden" name="id<?=$h?>" id="id<?=$h?>" value="<?=$id?>">
                                 <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
								 </td>
								 <td>
								 <input class='form-control' name='conceptob<?php echo $h?>' id='conceptob<?php echo $h?>'>
								 </td>
								 <td> 
								 <input class='form-control' name='unidadb<?=$h?>' id='unidadb<?=$h?>'>
								 </td>
								 <td>
								 <input class="form-control" id="costo_unitario_imp_incluidosb<?=$h?>" name="costo_unitario_imp_incluidosb<?=$h?>" value="<?=$costo_unitario_imp_incluidosa?>" type="number">
								 </td>
								 <td>
								 <input class="form-control" id="monto_tot_imp_incluidosb<?=$h?>" name="monto_tot_imp_incluidosb<?=$h?>" value="<?=$monto_tot_imp_incluidosb?>" placeholder="0.00" type="text">
								 </td>
								</tr>
								 <?php
										}
								 $cuantos = $cuantos+1;
								 for($i=$cuantos;$i<=30;$i++){
								 ?>
								<tr>
								 <td><?php echo $i; ?></td>
								 <td><input class='form-control' name='conceptob<?php echo $i?>' id='conceptob<?php echo $i?>'></td>
								 <td><input class='form-control' name='unidadb<?php echo $i?>' id='unidadb<?php echo $i?>' type="number" onChange="obtenmontob(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_verticalb(<?php echo $i; ?>);">
                                  </td>
								 <td><input class="form-control" id="costo_unitario_imp_incluidosb<?php echo $i?>" name="costo_unitario_imp_incluidosb<?php echo $i?>" placeholder="0.00" type="text" onChange="obtenmontob(<?php echo $i; ?>, <?php echo $total_proyecto; ?>);suma_verticalb(<?php echo $i; ?>);"></td>
								 <td><input class="form-control" id="monto_tot_imp_incluidosb<?php echo $i?>" name="monto_tot_imp_incluidosb<?php echo $i?>" placeholder="0.00" type="text" readonly>
								 </td>
								</tr>
                                <?php } ?>
								<tr>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td><div align="center"><strong>Total:</strong></div></td>
								 <td><input type="text" class="form-control" name="total_esp_mue_inmueb" id="total_esp_mue_inmueb" placeholder="0.00" readonly></td>
								</tr>
							  </table>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group clearfix">	
                                <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                                  <div class="pull-right">
                                   <input type="hidden" name="total_proyecto" id="total_proyecto" value="<?=$total_proyecto?>">
                        		   <input class="btn btn-primary" type="button" value="Revisar información" id="submit1" name="submit1" onClick="return validarEnvio_presupb(<?php echo $total_proyecto; ?>, <?php echo $total_esp_mue_inmueb; ?>);" >
                                  </div>
                               </div>
                             </div>
           				   </div>
						</form>
                      </div>
                  </div> 
                  <?php } ?>
				<!-- FIN PESTAÑA "3" -->
                <!-- INICIO PESTAÑA "4" -->
                  <?php if($clave4!=""){ ?><div class="tab-pane" id="tab-04">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>4</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                      </div>
                  </div>
                  <?php } ?> 
				<!-- FIN PESTAÑA "4" -->
                <!-- INICIO PESTAÑA "5" -->
                  <?php if($clave5!=""){ ?><div class="tab-pane" id="tab-05">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>5</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                      </div>
                  </div>
                  <?php } ?>
				<!-- FIN PESTAÑA "5" -->
                <!-- INICIO PESTAÑA "6" -->
                  <?php if($clave6!=""){ ?><div class="tab-pane" id="tab-06">
                      <div class="row">
                            <div class="col-md-8"> 
                                <h3>6</h3>
                            </div>
                            <div class="col-md-12"><hr class="red small-margin"></div>
                      </div>
                  </div>
				  <?php } ?>
				<!-- FIN PESTAÑA "6" -->

			   <div class="row">    
                    <div class="col-md-4">
                        <small id="errmuestra_disc_error" name="errmuestra_disc_error" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
				</div>
            </div>
           </div>
          </div>
		<div class="bottom-buffer"></div>
</div>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
<script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
</body>
</html>
