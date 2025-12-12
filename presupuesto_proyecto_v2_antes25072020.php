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

//aqui lo tendriamos que cambiar por fecha de apertura
mysqli_query("SET NAMES 'utf8'");
$level = $_SESSION['MM_UserGroup'];
//if($level=="op"){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>";}
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=index_cierre.php'>";}

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
	  <script type="text/javascript" src="js/Validacion_presupuesto.js"></script>
    <script type="text/javascript" src="js/evita_comas.js"></script>

<script type="text/javascript">
function sumaVerticalmonto(id, cuantos, Infor_finan_costo_monto){
	
var Infor_finan_costo_monto = Infor_finan_costo_monto
var m1_fuente = Infor_finan_costo_monto
var sumaT=0;
var cuantos = 50
	for(var i=1;i<=cuantos;i++){
				
                var campov=eval ('document.formul.Monto_unidad'+i+'.value');
				
				if(campov.length==0 ){ 
					campov = 0 
				} else { 
					campov = parseFloat(campov.replace(/[$,\s]/g, ''));
				}
				
				sumaT=sumaT+campov;
	}
				if(sumaT<=m1_fuente)
				{
                var obtsuma= document.formul.pres_anual_tot_2010;
                obtsuma.value=sumaT;
				} else {
					var campov=eval ('document.formul.Monto_unidad'+id+'.value');
					var dos=sumaT-parseInt(campov,10);
					var obtsuma= eval('document.formul.pres_anual_tot_2010');
                	obtsuma.value=dos;
					
					var campov_limpia = eval ('document.formul.Monto_unidad'+id);
				    campov_limpia.value = 0;
					
					sumaVerticalporcentajes(id, cuantos)
					
					alert('Verifica los montos');
					}
}

function sumaVerticalporcentajes(id, cuantos){
	
var sumaT=0;
var cuantos = 50

	for(var i=1;i<=cuantos;i++){
	
				var porcentv = eval ('document.formul.Porcentaje'+i+'.value');
			
				if(porcentv.length==0) porcentv = 0
				
				sumaT=sumaT+parseFloat(porcentv);								
	}              			
				var obtsuma_porcentaje= eval('document.formul.ene_suma');
                //obtsuma_porcentaje.value=parseInt(sumaT,10)
				obtsuma_porcentaje.value=Math.round(sumaT);
}

function obtenporcentaje(id, Infor_finan_costo_monto){

var Infor_finan_costo_monto = Infor_finan_costo_monto
var m1_fuente = Infor_finan_costo_monto

                var campov=eval ('document.formul.Monto_unidad'+id+'.value');
			
				if(campov.length==0){ 
					campov = '' 
					var porcent_v =   eval ('document.formul.Porcentaje'+id);
					porcent_v.value = campov;
				} else { 
					campov = parseFloat(campov.replace(/[$,\s]/g, ''));
 
					var subt_varios = 100 * campov / m1_fuente; 
					var porcent_v =   eval ('document.formul.Porcentaje'+id);
					porcent_v.value = subt_varios;
				}
}

function calc_presup(id, Infor_finan_apoyo_monto){

var Infor_finan_apoyo_monto = Infor_finan_apoyo_monto
var m2_fuente = parseFloat(Infor_finan_apoyo_monto)

var sumaT=0;
var cuantos = 50
for(var i=1;i<=cuantos;i++){
		
	var fuente_finan = eval('document.formul.Fuente_finan'+i+'.value');
	var fuente_finan_nombre = 'Fuente_finan'+i;
				
				var calcula_monto_profest_sin = eval ('document.formul.Monto_unidad'+i+'.value');
				
				if(calcula_monto_profest_sin.length==0 ){ 
					calcula_monto_profest = 0 
				} else { 
					calcula_monto_profest = parseFloat(calcula_monto_profest_sin.replace(/[$,\s]/g, ''));
				}
				if(fuente_finan == "3"){
				sumaT=sumaT+calcula_monto_profest;				
				if(sumaT>m2_fuente){
					document.getElementById(fuente_finan_nombre).selectedIndex = "0";
					alert ("Verifica los montos ingresados para la fuente de financiamiento Institucional PROFEST");
				}
		}        
	}
}
</script>
</head>

<?php
$query="SELECT * FROM `catalogo_concepto_gastos` order by concepto_gasto";
			$result = mysqli_query($con,$query);
				if($result)
					$combobit="";
						while($renglon = mysqli_fetch_row($result))
						{	
					   		  $valor=$renglon[0];
							  $imp_texto=$renglon[1];
							  $combobit .= "<option value=".$valor.">".utf8_encode($imp_texto)."</option>\n";
						}
						
$query_dos="SELECT * FROM `catalogo_concepto_gastos` order by concepto_gasto";
			$result_dos = mysqli_query($con,$query_dos);
				if($result_dos)
					$combobitdos="";
						while($renglon_dos = mysqli_fetch_row($result_dos))
						{	
					   		  $valor_dos=$renglon_dos[0];
							  $imp_texto_dos=$renglon_dos[1];
							  $combobitdos .= "<option value=".$valor_dos.">".utf8_encode($imp_texto_dos)."</option>\n";
						}						
?>
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
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica tu captura.</div>
            </div>
        </div>
        
<form name="formul" action="guardar_presupuesto.php" method="post">
<div class="row">
                    <div class="col-md-12"> 
                        <h3> o) Resumen presupuestal</h3>
                        <p><strong>Use este espacio para registrar un resumen presupuestal, usando al menos 3 conceptos de gasto que se enlistan en el combo al seleccionar el campo. 
                        En la siguiente sección se desglozará detalladamente los conceptos de gasto en los que se pretende emplear el recurso PROFEST. </strong></p>
                        <p>En el caso de la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival que se proponen pagar con recursos del PROFEST, 
                        se deberá adjuntar una cotización por cada servicio o arrendamiento al finalizar el registro, en el apartado de adjuntar y descargar documentos, excepto en el caso de la contratación de servicios artísticos profesionales.</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
  <div class="row">
     <div class="col-md-12"> 
                      <table class="table-responsive">
                      <tr>
                        <td>#</td>
                        <td>Concepto de gasto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td>
                        <td>Fuente de financiamiento<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp></td>
                        <td>Monto/unidad<samp id="errMonto_unidad_aAs" name="errMonto_unidad_aAs" class="control-label">*</samp></td>
                        <td>Porcentaje<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp></td>
                      </tr>
                      <tr>
                      <?php
                        $query_user2="SELECT * FROM mas_presupuesto WHERE clave_usuario='".$cve_user."';";
                          
                        $res_user2 =  mysqli_query($con, $query_user2);
                        $cuantos=mysqli_num_rows($res_user2);
                        $h=0;
                        $Concepto_gasto=0;
                        while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                            $h=$h+1;
                            $id_presupuesto=$fila2['id_presupuesto'];
                            $Concepto_gasto=$fila2['Concepto_gasto'];
                            $Fuente_finan=utf8_encode($fila2['Fuente_finan']);
                            $Monto_unidad=$fila2['Monto_unidad'];
                            $Porcentaje=$fila2['Porcentaje'];
                            
                            $monto_unidad_total=$fila2['monto_unidad_total'];
                            $porcentaje_total=$fila2['porcentaje_total'];
                    	?>
                        <td><?php echo $h; ?><input type="hidden" name="id_presupuesto<?=$h?>" id="id_presupuesto<?=$h?>" value="<?=$id_presupuesto?>">
                        <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
                        <td> 
                        <select class='form-control proyectocampo' name='Concepto_gasto<?=$h?>' id='Concepto_gasto<?=$h?>'>
                          <option value="" selected="selected">Selecciona opci&oacute;n</option>
                              <?php 
                              $query="SELECT * FROM `catalogo_concepto_gastos` order by concepto_gasto";
                                $result = mysqli_query($con,$query);
                                    if($result)
                                            while($renglon = mysqli_fetch_row($result))
                                            {	
                                                  $valor=$renglon[0];
                                                  $imp_texto=$renglon[1];
                                ?>
                                                <option value='<?=$valor?>' <?php if($valor==$Concepto_gasto){ ?> selected <?php } ?> ><?=utf8_encode($imp_texto)?></option>
                                <?php } ?>
                        </select>
                        </td>
                        <td><select class='form-control' name='Fuente_finan<?php echo $h?>' id='Fuente_finan<?php echo $h?>' onChange="calc_presup(<?php echo $h?>, <?=$Infor_finan_apoyo_monto?>)">
                          <option value="" selected="selected">Selecciona opci&oacute;n</option>
                          <option value="1" <?php if($Fuente_finan=='1'){ ?> selected <?php } ?>>Institucional Estatal</option>
                          <option value="2" <?php if($Fuente_finan=='2'){ ?> selected <?php } ?>>Institucional Municipal</option>
                          <option value="3" <?php if($Fuente_finan=='3'){ ?> selected <?php } ?>>Institucional Federal PROFEST</option>
                          <option value="4" <?php if($Fuente_finan=='4'){ ?> selected <?php } ?>>Institucional Educación Superior</option>
                          <option value="5" <?php if($Fuente_finan=='5'){ ?> selected <?php } ?>>Privada</option>
                        </select>
                        </td>
                        <td>
                          <input class="form-control obten_porcentaje" id="Monto_unidad<?=$h?>" name="Monto_unidad<?=$h?>" value="<?=$Monto_unidad?>" placeholder="0.00" type="text" onChange="sumaVerticalmonto(<?=$h?>, <?=$cuantos?>, <?=$Infor_finan_costo_monto?>);obtenporcentaje(<?=$h?>, <?=$Infor_finan_costo_monto?>);sumaVerticalporcentajes(<?=$h?>, <?=$cuantos?>);calc_presup(<?=$h?>, <?=$Infor_finan_apoyo_monto?>)" onKeyPress="return evita_comas(event)">
                        </td>
                        <td>
                        <input class="form-control" id="Porcentaje<?=$h?>" name="Porcentaje<?=$h?>" value="<?=$Porcentaje?>" placeholder="0.00" type="text" readonly="readonly">
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
                            <select class='form-control proyectocampo' name='Concepto_gasto<?php echo $i?>' id='Concepto_gasto<?php echo $i?>'>
                              <option value="" selected="selected">Selecciona opci&oacute;n</option>
                              <?php echo $combobitdos; ?>
                            </select>
                        </td>
                        <td><select class='form-control' name='Fuente_finan<?php echo $i?>' id='Fuente_finan<?php echo $i?>' onChange="calc_presup(<?php echo $h?>, <?=$Infor_finan_apoyo_monto?>)">
                          <option value="" selected="selected">Selecciona opci&oacute;n</option>
                          <option value="1">Institucional Estatal</option>
                          <option value="2">Institucional Municipal</option>
                          <option value="3">Institucional Federal PROFEST</option>
                          <option value="4">Institucional Educación Superior</option>
                          <option value="5">Privada</option>
                        </select>
                        </td>
                        <td>
                          <input class="form-control obten_porcentaje" id="Monto_unidad<?php echo $i?>" name="Monto_unidad<?php echo $i?>" placeholder="0.00" type="text" onChange="sumaVerticalmonto(<?=$i?>, <?=$cuantos?>, <?=$Infor_finan_costo_monto?>);obtenporcentaje(<?=$i?>, <?=$Infor_finan_costo_monto?>);sumaVerticalporcentajes(<?=$i?>, <?=$cuantos?>);calc_presup(<?=$i?>, <?=$Infor_finan_apoyo_monto?>)" onKeyPress="return evita_comas(event)">
                        </td>
                        <td>
                        <input class="form-control" id="Porcentaje<?php echo $i?>" name="Porcentaje<?php echo $i?>" placeholder="0.00" type="text" readonly>
                        </td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="form-control" name="pres_anual_tot_2010" id="pres_anual_tot_2010" value="<?=$monto_unidad_total?>" readonly></td>
                        <td><input type="text" class="form-control" name="ene_suma" id="ene_suma" value="<?=$porcentaje_total?>" readonly></td>
                      </tr>
                    </table>
        </div>
      </div>
		<div class="row top-buffer">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
            				<input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return validarEnvio_presup(<?=$Infor_finan_costo_monto?>, <?=$Infor_finan_apoyo_monto?>);" >
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
