<?php require_once('Connections/profest_rep.php'); ?>
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
mysql_select_db($database_automaa, $automaa);
//aqui lo tendriamos que cambiar por fecha de apertura
mysql_query("SET NAMES 'utf8'");
$level = $_SESSION['MM_UserGroup'];
//if($level=="op"){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>";}
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=index_cierre.php'>";}
			
			// INICIO informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysql_query($sql);
			$num_resultados = mysql_num_rows($resultado);
			for ($i=0; $i <$num_resultados; $i++)
			{$row = mysql_fetch_array($resultado);
			$nombre = $row["nombre_titular"];
			$ape_pat = $row["primer_apellido"];
			$ape_mat = $row["segundo_apellido"];
			$nombrec = $nombre.' '.$ape_pat.' '.$ape_mat;
			}
			// FIN informacion para acceso al sistema	
			/*INICIO comente para agregar este apartado en el de menu de los nuevos modulos
      $sql_consulta_entra = "Select * from `solicitud` WHERE `clave_usuario` = '".$cve_user."' and cerrrado=0 and fecha_hora_cierre_total='0000-00-00 00:00:00'"; 
			$resultado_consulta_entra = mysql_query($sql_consulta_entra);
			$cuantos_cierre = mysql_num_rows($resultado_consulta_entra);
			
			if($cuantos_cierre==0){ 
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>"; 
			exit; 
			}	
			
			$sql_consulta = "UPDATE `solicitud` SET captura_concluida = 1, 
			fecha_hora_captura_concluida=NOW()			
			WHERE `clave_usuario` = '".$cve_user."' "; 
			$resultado_consulta = mysql_query($sql_consulta);
      FIN comente para agregar este apartado en el de menu de los nuevos modulos*/
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
    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script type="text/javascript" src="js/Validacion_cierre.js"></script>
      <script>
      // Función sobre aviso 
		// Se llamaría del link como: 
		// <a href="pagina.htm" " onclick='return le_parece(this);'> </a>
		function la_final(formObj,total_entre_losdos, cuantos_doctos_cargo) { 
		//console.log("entro");
			if(total_entre_losdos==cuantos_doctos_cargo){
				var errperiodo_realizacion= document.getElementById('errperiodo_realizacion');
				errperiodo_realizacion.style.display = 'none';	
				if(confirm("¿Desea concluir tu registro?")) { 
					   if(confirm("¿Estás seguro?  \n\n Una vez concluido ya no podrás agregar o modificar información.")){
						   var url = 'finsol_continua_proceso.php'
							document.location.target = "_self";
							document.location.href=url;
						   return false;
					   } else {
						  return false;
						 }   
				  }
			} else {
				var errperiodo_realizacion= document.getElementById('errperiodo_realizacion');
				errperiodo_realizacion.style.display = 'block';	
				window.scrollTo(300, 0);
				}
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

        <div class="row top-buffer" id="errperiodo_realizacion" name="errperiodo_realizacion" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario registrar todos los documentos.</div>
            </div>
        </div>
        
     <?php 
	 $p_msn=$_GET["p_msn"]; 
	 if($p_msn==1){ ?>
     	<div class="row top-buffer" id="errp_archivo" name="errp_archivo" style="display:display">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Ya existe un archivo con ese nombre.</div>
            </div>
        </div>
     <?php } ?>
        
        <div class="row">
		<!-- *********************PRIMERA PARTE********************* -->
       <?php
			if(!$resultado_consulta){
				//echo "No se guardo";
		?>	
        <div class="row" id="rowError" name="rowError" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atenci&oacute;n!</strong> Es necesario capturar los campos obligatorios.</div>
            </div>
        </div>
		<?php }else{
				//echo "Si se guardo";
			?>
        <!-- Registro completado -->
        <div class="row" id="rowCompletado" name="rowCompletado" style="display:none">
            <div class="col-md-12">
                <div id="datos_correctos" class="alert alert-success"><strong>¡Felicidades!</strong> Has completado la captura de la información, 
                es obligatorio que nos adjuntes tus documentos para concluir el registro.                 
                </div>
            </div>
        </div>
		<?php } ?>
     <?php for($id=1;$id<=20;$id++){ ?>
                      <p>
                      <div style="display:none" id="div<?php echo $id?>"> 
<table width="100%" border="0" align="center">
                <tr>
                <td width="20"><div align="center"><strong>No.</strong></div></td>
                <td width="100"><div align="center"><strong>Clave formato</strong></div></td>
                <td width="100"><div align="center"><strong>Nombre del formato</strong></div></td>
                <td width="100"><div align="center"><strong>Descripción</strong></div></td>
                <td width="111"><div align="center"><strong>Tipo de archivo</strong></div></td>
                <td width="111"><div align="center"><strong>Archivo anexo</strong></div></td>
                <td width="111"><div align="center"><strong>Fecha propuesta</strong></div></td>
                </tr>
                  <tr>
                   
                    <td><?php echo $id; ?>
                      </td>
                    <td width="110"><div align="center">
                      <input name="clave_anexo<?php echo $id; ?>" type="text" id="clave_anexo<?php echo $id; ?>" size="20" maxlength="150" class="Estilo1"/> 
                    </div></td>
                    <td width="113"><div align="center">
                      <input name="nombre_formato<?php echo $id; ?>" type="text" id="nombre_formato<?php echo $id; ?>" size="60" maxlength="150" class="Estilo1" />
                    </div></td>
                    <td width="98"><div align="center">
                      <textarea name="descripcion<?php echo $id; ?>" cols="30" class="Estilo1" id="descripcion<?php echo $id; ?>"></textarea>
                    </div></td>
                    <td width="98"><div align="center">
                    <input name="archivo<?php echo $id; ?>" type="file" class="casilla" id="archivo<?php echo $id; ?>" size="35" />
                    <input name="actionfile" type="hidden" value="upload" class="casilla" />
                    </div></td>
                    <td>
                    <select name="tipo_anexo<?php echo $id; ?>" class="casilla" id="tipo_anexo<?php echo $id; ?>">
                        <option value="u">Usuarios</option>
                        <option value="p">solo Proceso</option>
                      </select>
                    </td>
                    <td width="113"><div align="center">
         <?php /*input name="fecha_propuesta<?php echo $id; ?>" type="text" id="fecha_propuesta <?php echo $id; ?>" size="20" maxlength="150" class="Estilo1" /*/?>
                      
<input name="fecha_propuesta<?php echo $id; ?>" type="text" id="fecha_propuesta <?php echo $id; ?>" size="20" maxlength="150" class="Estilo1" onkeyup = "this.value=formateafecha(this.value);" />
                    </div></td>
                    
                  </tr>
                </table>                </div>
                              
                <?php } ?>
                
                </div>
                <!-- INICIO PESTAÑA "Adjuntos" tab-06 -->
           
                <div class="row">
                    <div class="col-md-12"> 
                        <h3>Documentos a adjuntar</h3>
                        	<p>En este espacio deberá descargar los anexos solicitados en la convocatoria, asimismo, podrá cargar los documentos firmados en formato PDF 
                            y la documentación jurídica necesaria para concluir el registro. Selecciona el botón de Descarga y adjunta documentos para comenzar.</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                
			<div class="row">
            <div class="col-md-12">
              <form METHOD="POST" id="apInf" name="apInf" action="Guardar_nuevo_archivo.php" enctype="multipart/form-data">
              <?php require_once('catalogo_archivos.php'); ?>  
                    <div class="alert alert-warning"><strong>¡Precaución!</strong>
                    Una vez concluida la solicitud, no podrá hacer cambios o modificaciones a la información registrada.
                    </div>
                    <?php
					         /*$sql_num_ed = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
										$resultado_sql_num_ed = mysqli_query($con, $sql_num_ed);
										$num_resultado_sql_num_ed = mysqli_num_rows($resultado_sql_num_ed);
										for ($j=0; $j <$num_resultado_sql_num_ed; $j++)
										{
											$row_ed = mysqli_fetch_array($resultado_sql_num_ed);
											$numero_ediciones_previas = $row_ed["numero_ediciones_previas"];
										}
										
										if($numero_ediciones_previas>35){
										$vat_tope=35;
										} else {
											$vat_tope=$numero_ediciones_previas;
											}*/
											
										$sql = "SELECT usuarios.tipo_instancia, cat_instancias.id_instancia, cat_instancias.nombre_instancia 
										FROM usuarios,cat_instancias 
										WHERE usuarios.clave_usuario LIKE '".$cve_user."' and cat_instancias.nombre_instancia = usuarios.tipo_instancia"; 
										$resultado = mysqli_query($con, $sql);
										$num_resultados = mysqli_num_rows($resultado);
										for ($i=0; $i <$num_resultados; $i++)
										{
										$row = mysqli_fetch_array($resultado);
										$id_instancia	= $row["id_instancia"];
										}
										
                    //inicio validación de la categoria para saber si se solicito 4ta. categoria				
                    $sql_num_ed = "SELECT Info_financiera_categoria FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
                    $resultado_sql_num_ed = mysqli_query($con, $sql_num_ed);
                    $row_ed = mysqli_fetch_array($resultado_sql_num_ed);
                    $Info_financiera_categoria = $row_ed["Info_financiera_categoria"];

                    if($Info_financiera_categoria=="D"){
                      $validacion_cat = "(0,'".$id_instancia."', 6)";
                    } else {
                      $validacion_cat =  "(0,'".$id_instancia."')";
                    }

									$query_doctos="SELECT * from nombre_formatos where id_instancia in $validacion_cat;";										
													$res_doctos =  mysqli_query($con,$query_doctos);
													$cuantos_doctos =  mysqli_num_rows($res_doctos);
										      $total_entre_losdos=$cuantos_doctos+$vat_tope;
										 
                  $query_doctos_cargo="SELECT * FROM anexos WHERE clave_usuario = '".$cve_user."' "; 
													$res_doctos_cargo =  mysqli_query($con,$query_doctos_cargo);
										      $cuantos_doctos_cargo =  mysqli_num_rows($res_doctos_cargo);
						?>
                            <div class="form-group clearfix bottom-buffer">
                                    <div class="pull-right">
                                        <input class="btn btn-primary" type="button" value="Concluir registro" id="submit1" name="submit1" onclick="return la_final(this,<?=$total_entre_losdos?>, <?=$cuantos_doctos_cargo?>);">   
                                    </div>
                            </div>
              </form> 
	</div>
   </div> 
</div>
<script type="text/javascript" src="js/Gu_Mo_El_archvo.js"></script> <!-- este es del código de archivos -->
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
        <script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
       
		    </body>
</html>