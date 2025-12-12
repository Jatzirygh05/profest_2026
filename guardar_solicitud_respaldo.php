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

$level = $_SESSION['MM_UserGroup'];
//if($level=="op"){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>";}
			
			// INICIO informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysql_query($sql);
			$num_resultados = mysql_num_rows($resultado);
			for ($i=0; $i <$num_resultados; $i++)
			{$row = mysql_fetch_array($resultado);
			$nombre = stripslashes($row["nombre_titular"]);
			/*$ape_pat = stripslashes($row["apellido_paterno"]);
			$ape_mat = stripslashes($row["apellido_materno"]);*/
			$nombrec = utf8_encode($nombre);
			}
			// FIN informacion para acceso al sistema	

			$sql_consulta = "UPDATE `solicitud` SET captura_concluida = 1, 
			fecha_hora_captura_concluida=NOW()			
			WHERE `clave_usuario` = '".$cve_user."' "; 
			$resultado_consulta = mysql_query($sql_consulta);
					
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
      <script type="text/javascript" src="js/Validacion_cierre.js"></script>
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
            <h1>Convocatoria PROFEST 2019</h1>
          </div>
        </div>

<div class="row top-buffer"></div>
        

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
                
                
                <!-- INICIO PESTAÑA "Adjuntos" tab-06 -->
           
                <div class="row">
                    <div class="col-md-8"> 
                        <h3>Documentos a adjuntar</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                
			<div class="row">
            <div class="col-md-12">
              <?php
			  $action= $_POST['action'];
			  
			if($action=="nuevo_anexo"){
				
			$num = 8;	
		
			$nombre_formato1= $_POST['nombre_formato1'];		  
			$nombre_formato2= $_POST['nombre_formato2'];		  
			$nombre_formato3= $_POST['nombre_formato3'];		  
			$nombre_formato4= $_POST['nombre_formato4'];		  
			$nombre_formato5= $_POST['nombre_formato5'];		  
			$nombre_formato6= $_POST['nombre_formato6'];		  
			$nombre_formato7= $_POST['nombre_formato7'];		  
			$nombre_formato8= $_POST['nombre_formato8'];		  
			
			$archivo1= $_FILES['archivo1']['name'];
			$archivo2= $_FILES['archivo2']['name'];		  
			$archivo3= $_FILES['archivo3']['name'];		  
			$archivo4= $_FILES['archivo4']['name'];		  
			$archivo5= $_FILES['archivo5']['name'];		  
			$archivo6= $_FILES['archivo6']['name'];		  
			$archivo7= $_FILES['archivo7']['name'];		  
			$archivo8= $_FILES['archivo8']['name'];		  
			
			$tipo1= $_FILES['archivo1']['type'];
			$tipo2= $_FILES['archivo2']['type'];		  
			$tipo3= $_FILES['archivo3']['type'];		  
			$tipo4= $_FILES['archivo4']['type'];		  
			$tipo5= $_FILES['archivo5']['type'];		  
			$tipo6= $_FILES['archivo6']['type'];		  
			$tipo7= $_FILES['archivo7']['type'];		  
			$tipo8= $_FILES['archivo8']['type'];		  
			
			$tamano1= $_FILES['archivo1']['size'];
			$tamano2= $_FILES['archivo2']['size'];		  
			$tamano3= $_FILES['archivo3']['size'];		  
			$tamano4= $_FILES['archivo4']['size'];		  
			$tamano5= $_FILES['archivo5']['size'];		  
			$tamano6= $_FILES['archivo6']['size'];		  
			$tamano7= $_FILES['archivo7']['size'];		  
			$tamano8= $_FILES['archivo8']['size'];		  
			   
			$fecha_hora_captura = date("Y-m-d H:i:s");
			$anio = date("Y");
			
			
		
			for($id=1;$id<=$num;$id++)
			{	
				$nombre_formato = ${'nombre_formato'.$id}; 
				$archivo =  ${'archivo'.$id}; 
				$tipo =  ${'tipo'.$id}; 	
				
												
						if ($_POST["actionfile"] == "upload") {
									// obtenemos los datos del archivo 
									if ($archivo != "") {
										
												
										// guardamos el archivo a la carpeta files
										
										//comprobamos si existe un directorio para subir el archivo
    									//si no es así, lo creamos
										if(!is_dir("anexos/".$cve_user."/")) 
    									mkdir("anexos/".$cve_user."/", 0777);
										
										$name_archivo = $archivo;
										
										$destino =  "anexos/".$cve_user."/".$name_archivo;
										
										//echo "$tipo";
										// || $_FILES['archivo'.$id.'']['type']=="image/png" || $_FILES['archivo'.$id.'']['type']=="image/jpeg"
										
								if($_FILES['archivo'.$id.'']['type']=="application/pdf" || $_FILES['archivo'.$id.'']['type']=="application/vnd.ms-excel")
										{
											//echo "si es PDF o excel<BR>";
										// INICIO es del tipo y se guardará correctamente
												if (copy($_FILES['archivo'.$id.'']['tmp_name'],$destino)) {
													$status = "Anexo enviado con nombre: <b>".$archivo."</b>";
													
													mysql_select_db($database_automaa, $automaa);

													$query="INSERT INTO `anexos` (
																`clave_id` ,
																`nombre_formato` ,
																`fecha_hora_captura` ,
																`clave_usuario` ,
																`anio` ,
																`archivo_adjunto` ,
																`tipo_formato`
																)
																VALUES (
																NULL, '".$nombre_formato."', NOW(), '".$cve_user."', 
																'".$anio."', '".$archivo."', '".$tipo."');";
														$result= mysql_query($query);
												
														if (!$result)
																	{
																	echo "<strong>Error:</strong> No se ha podido guardar la información. <br>Favor de contactar al administrador";
																	
																	//exit;
																	}
																	else
																	{
																	//echo "Anexo registrado correctamente.<br>";
																	
																	// sube archivo
																	}
															
														} else {
															$status = "Error al subir el archivo <b>".$archivo."</b>";
														}
												} else {
													$status = "Error al subir archivo";
												}
									// FIN es del tipo y se guardará correctamente
									
										} else { 
										
										echo "El archivo <b>".$archivo."</b> no cuenta con el formato correcto."; 
										
										}
								}
					////////
			}
			$action="";
			
			} // cierra condicional nuevo anexo
              
			  ?>
              
              
  <form action="guardar_solicitud.php" method="post" enctype="multipart/form-data" name="form2">
 
  <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descripci&oacute;n documento</th>
                    <th>Adjuntar documento/Documento adjunto</th>
                  </tr>
                </thead>
        <?php 
			  $ctext_total=8;
			  $nombre_archivos = array('','<a href=Solicitud.php target=blank>Solicitud de apoyo para festivales culturales y artísticos PROFEST</a>', 
			  '<a href=reporte/Formato_proyecto.php target=_new>Formato de proyecto para festivales culturales y artísticos PROFEST</a>', 
			  '<a href=formatos_para_descarga_general/anexo_C.xlsx target=blank>Formato de cronograma, presupuesto y programación PROFEST</a>', 
			  '<a href=formatos_para_descarga_general/anexo_D.xlsx target=blank>Formato de semblanza artística PROFEST</a>', 
			  '<a href=formatos_para_descarga_general/Modelo_Carta_no_gestion_otros_recursos_federales.docx target=blank>Modelo Carta de no gestión de otros recursos federales</a>', 
			  '<a href=formatos_para_descarga_general/Modelo_Carta_compromiso_financiamiento.docx target=blank>Modelo de Carta compromiso de financiamiento(en caso de que sea expedida por la institución postulante)</a>', 
			  '<a href=formatos_para_descarga_general/Modelo_Carta_Derechos_autor.docx target=blank>Modelo Carta Derechos de autor</a>', 
			  '<a href=formatos_para_descarga_general/Modelo_Carta_compromiso_gestion.docx target=blank>Modelo Carta compromiso gestión</a>');
			
			  $solo_nombre_archivos = array('','Solicitud de apoyo para festivales culturales y artísticos PROFEST', 
			  'Formato de proyecto para festivales culturales y artísticos PROFEST', 
			  'Formato de cronograma, presupuesto y programación PROFEST', 
			  'Formato de semblanza artística PROFEST', 
			  'Modelo Carta de no gestión de otros recursos federales', 
			  'Modelo de Carta compromiso de financiamiento(en caso de que sea expedida por la institución postulante)', 
			  'Modelo Carta Derechos de autor', 
			  'Modelo Carta compromiso gestión');
			
 		for($id=1;$id<=$ctext_total;$id++){ 
			  
		?>
      <tbody>
                  <tr>
                    <th scope="row"><?php echo $id; ?>*
                    </td>
      				<td><?=$nombre_archivos[$id]?>
                    <input name="nombre_formato<?php echo $id; ?>" type="hidden" id="nombre_formato<?php echo $id; ?>" value="<?=$solo_nombre_archivos[$id]?>" /></td>
      <?php  
	  $sql_anexos = "SELECT * FROM `anexos` WHERE `clave_usuario` LIKE '".$cve_user."' and nombre_formato='".$solo_nombre_archivos[$id]."' and tipo_formato!=''"; 
	  $resultado_anexos = mysql_query($sql_anexos);
	  $archivo_cargado = mysql_num_rows($resultado_anexos);
	  
	  $row_anexo = mysql_fetch_array($resultado_anexos);
	  
	  $archivo_adjunto = $row_anexo['archivo_adjunto'];
	  $clave_id = $row_anexo['clave_id'];
	  
		if($archivo_cargado==0) { ?>
      <td>
        <input name="archivo<?php echo $id; ?>" type="file" class="casilla" id="archivo<?php echo $id; ?>" />
        <input name="actionfile" type="hidden" value="upload" class="casilla" />
      </td>
      <?php } else { ?>
      <td>
        <?php 
		 $ruta_desc="anexos/".$cve_user."/$archivo_adjunto";
		?>
        <a href="<?=$ruta_desc?>" target="_blank">archivo</a>
      </td>
      <?php } ?>   
      </tr>
	  <?php } ?>
    </table>    
      	<div class="row top-buffer bottom-buffer">
            <div class="col-md-12">
                <div class="form-group clearfix">	
    				    <div class="pull-right">
    				           <input name='action' type='hidden' id='action' value='nuevo_anexo' />
                               
                               <?php 
							    $sql_anexos_cuantos = "SELECT * FROM `anexos` WHERE `clave_usuario` LIKE '".$cve_user."' and tipo_formato!=''";
								$resultado_anexos_cuantos = mysql_query($sql_anexos_cuantos);
								$cuantos_boton = mysql_num_rows($resultado_anexos_cuantos);
								
								if($cuantos_boton<8){
							   ?>
      						   <input name="button2" type="submit" class="btn btn-primary" id="button2" value="Agregar nuevo anexo">
                               <?php } else { ?>
                               <input name="button2" type="button" class="btn btn-primary" id="button2" value="Concluir registro" >
                               <?php } ?>
    			        </div>
                	</div>
            	</div> 
			</div>  
  </form> 
	</div>
   </div> 
</div>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
       
		    </body>
</html>