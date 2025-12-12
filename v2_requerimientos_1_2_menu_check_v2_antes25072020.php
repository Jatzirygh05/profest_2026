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
//*******************************$level = $_SESSION['MM_UserGroup'];
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

//inicio nuevo codigo de guardar solicitud 20/01/2020
      $sql_consulta_entra = "Select * from `solicitud` WHERE `clave_usuario` = '".$cve_user."' and cerrrado='0' and fecha_hora_cierre_total='0000-00-00 00:00:00'"; 
      $resultado_consulta_entra = mysqli_query($con, $sql_consulta_entra);
      $cuantos_cierre = mysqli_num_rows($resultado_consulta_entra);
      
      if($cuantos_cierre==0){ 
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>"; 
      exit; 
      } 
      
      $sql_consulta = "UPDATE `solicitud` SET captura_concluida = 1, 
      fecha_hora_captura_concluida=NOW()      
      WHERE `clave_usuario` = '".$cve_user."' "; 
      $resultado_consulta = mysqli_query($con, $sql_consulta);
//fin nuevo codigo de guardar solicitud 20/01/2020
						
			// INICIO informacion para acceso al sistema
			$sql_dat = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_dat = mysqli_query($con, $sql_dat);
			$num_resultados_dat = mysqli_num_rows($resultado_dat);
				for ($y=0; $y <$num_resultados_dat; $y++)
				{
					$row_dat = mysqli_fetch_array($resultado_dat);
					$Infor_finan_costo_monto = $row_dat["Infor_finan_costo_monto"];
					$Infor_finan_apoyo_monto = $row_dat["Infor_finan_apoyo_monto"];
          $disciplina_musica_v2 = $row_dat["disciplina_musica_v2"];
          $disciplina_teatro_v2 = $row_dat["disciplina_teatro_v2"];
          $disciplina_danza_v2 = $row_dat["disciplina_danza_v2"];
          $disciplina_artes_visuales_v2 = $row_dat["disciplina_artes_visuales_v2"];
          $disciplina_gastronomia_v2 = $row_dat["disciplina_gastronomia_v2"];
          $disciplina_literatura_v2 = $row_dat["disciplina_literatura_v2"];
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
      <script type="text/javascript" src="js/v2_validacion_un_check.js"></script>
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
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Selecciona uno de los formatos para llenar.</div>
            </div>
        </div>
<form METHOD="POST" id="apInf" name="apInf" action="guardar_v2_requerimientos_1_2_check.php">
<div class="row">
   <div class="col-md-12"> 
     <h3>Selecciona los conceptos de gasto en los que será destinado el recurso PROFEST </h3>
   </div>
   <div class="col-md-12"><hr class="red small-margin"></div>  
</div>
  <div class="row">
  	<?php
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
     <div class="col-md-4">
      <div class="checkbox">
          <label>
            <input type="checkbox" name="opcion8" id="opcion8" onclick="javascript:validar(this);" <?php if($clave8!=""){ ?> checked <?php } ?> value="8"> 8. Honorarios artísticos y académicos
          </label>
      </div>
      <?php //if($disciplina_artes_visuales_v2==1 || $disciplina_literatura_v2==1){?>
       	<div class="checkbox">
          <label>
             <input type="checkbox" name="opcion1" id="opcion1" onclick="javascript:validar(this);" <?php if($clave1!=""){ ?> checked <?php } ?> value="1"> 1. Arrendamiento de espacios, muebles e inmuebles
          </label>
        </div>
      <?php //} ?>
      
      <div class="checkbox">
        <label>
          <input type="checkbox" name="opcion2" id="opcion2" onclick="javascript:validar(this);" <?php if($clave2!=""){ ?> checked <?php } ?>  value="2"> 2. Arrendamiento de escenarios, iluminación, audio y requerimientos técnicos en general
        </label>
      </div>
      <div class="checkbox">
        <label>
            <input type="checkbox" name="opcion3" id="opcion3" onclick="javascript:validar(this);" <?php if($clave3!=""){ ?> checked <?php } ?> value="3"> 3. Derechos en general
        </label>
      </div>
      <div class="checkbox">
        <label>
        <input type="checkbox" name="opcion4" id="opcion4" onclick="javascript:validar(this);" <?php if($clave4!=""){ ?> checked <?php } ?> value="4"> 4. Seguridad (incluye gastos médicos, traslados de obra, instrumentos, etc.)
        </label>
      </div>

      <?php //if($disciplina_musica_v2==1 || $disciplina_teatro_v2==1 || $disciplina_danza_v2==1 || $disciplina_gastronomia_v2==1){?>
        <div class="checkbox">
          <label>
          <input type="checkbox" name="opcion5" id="opcion5" onclick="javascript:validar(this);" <?php if($clave5!=""){ ?> checked <?php } ?> value="5"> 5. Transportación aérea de las/os participantes (No se cubren pérdidas de boletos, cambios de itinerarios, exceso de equipaje, ni acompañantes)
          </label>
        </div>
      <?php //} ?>

      <div class="checkbox">
        <label>
          <input type="checkbox" name="opcion6" id="opcion6" onclick="javascript:validar(this);" <?php if($clave6!=""){ ?> checked <?php } ?>  value="6"> 6. Servicios de subtitulaje y traducción
        </label>
      </div>
      
      <?php if($disciplina_gastronomia_v2==1){?>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="opcion7" id="opcion7" onclick="javascript:validar(this);" <?php if($clave7!=""){ ?> checked <?php } ?>  value="7"> 7. Insumos para actividades gastronómicas (Se sugiere el uso de artículos biodegradables)
          </label>
        </div>
      <?php } ?>

      <?php if($disciplina_artes_visuales_v2==1 || $disciplina_literatura_v2==1){?>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="opcion9" id="opcion9" onclick="javascript:validar(this);" <?php if($clave9!=""){ ?> checked <?php } ?>  value="9"> 9. Corte vinil para stands de exposición y/o foros 
          </label>
        </div>
      <?php } ?>
    </div>
  </div>
	<div class="row top-buffer">
    <div class="col-md-12">
    	<div class="form-group clearfix">	
       	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
          <div class="pull-right">
            <input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return valida_un_check();" >
          </div>
      </div>
    </div>
  </div>

<script>
function validar(obj){
  if(obj.checked==true){
    //alert("si");
  }else{
    alert("¡Alerta! Si anteriormente habías guardado información referente a este concepto, al momento de quitar la selección de este campo tu información será eliminada por completo.");
  }
}
</script>
</form>
		<div class="bottom-buffer"></div>
</div>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
<script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
</body>
</html>
