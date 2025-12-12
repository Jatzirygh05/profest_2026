<?php header('Content-Type: text/html; charset=iso-8859-1'); 
require_once('Connections/profest_rep.php'); ?>
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


$cve_user = $_SESSION['MM_Username'];

mysql_select_db($database_automaa, $automaa);

//aqui lo tendriamos que cambiar por fecha de apertura

$cve_user = $_SESSION['MM_Username'];
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
			$nombrec = $nombre;
			}
			// FIN informacion para acceso al sistema	
			
			
			// INICIO PESTAÑA 'Solicitud'
			$sql_consulta = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_consulta = mysql_query($sql_consulta);
			$num_resultados_solicitud = mysql_num_rows($resultado_consulta);
			for ($j=0; $j <$num_resultados_solicitud; $j++)
			{
				$row_sol = mysql_fetch_array($resultado_consulta);
			
				$nombre_festival = stripslashes($row_sol["nombre_festival"]);
				$numero_ediciones_previas = stripslashes($row_sol["numero_ediciones_previas"]);
				$disciplina = stripslashes($row_sol["disciplina"]);
				$objetivo_general = stripslashes($row_sol["objetivo_general"]);
				$pagina_web_festival = stripslashes($row_sol["pagina_web_festival"]);
				$facebook_festival = stripslashes($row_sol["facebook_festival"]);
				$twitter_festival = stripslashes($row_sol["twitter_festival"]);
				$meta_num_presentaciones = $row_sol["meta_num_presentaciones"];
				$meta_num_publico = $row_sol["meta_num_publico"];
				$meta_num_municipio = $row_sol["meta_num_municipio"];
				$meta_num_foros = $row_sol["meta_num_foros"];
				$meta_num_artistas = $row_sol["meta_num_artistas"];
				$meta_cantidad_grupos = $row_sol["meta_cantidad_grupos"];
				$alcance_programacion = $row_sol["alcance_programacion"];
				$periodo_realizacion_fecha_inicio = $row_sol["periodo_realizacion_fecha_inicio"];
				$periodo_realizacion_fecha_termino = $row_sol["periodo_realizacion_fecha_termino"];
				$Info_financiera_categoria = $row_sol["Info_financiera_categoria"];
				$Infor_finan_apoyo_monto = $row_sol["Infor_finan_apoyo_monto"];
				$Infor_finan_apoyo_costo_total = $row_sol["Infor_finan_apoyo_costo_total"];
				$Infor_finan_costo_monto = $row_sol["Infor_finan_costo_monto"];
			}
			// FIN PESTAÑA 'Solicitud'
			
			// INICIO PESTAÑA 'Proyecto 1er' 
			$sql_consulta_proy = "SELECT * FROM `proyecto` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_consulta_proy = mysql_query($sql_consulta_proy);
			$num_resultados_proyecto = mysql_num_rows($resultado_consulta_proy);
			for ($k=0; $k <$num_resultados_proyecto; $k++)
			{
				$row_proy = mysql_fetch_array($resultado_consulta_proy);
				
				$responsable_op_nombre 						= stripslashes($row_proy["responsable_op_nombre"]);
				$primer_apellido_op 						= stripslashes($row_proy["primer_apellido_op"]);
				$segundo_apellido_op 						= stripslashes($row_proy["segundo_apellido_op"]);
				$cargo_op 									= stripslashes($row_proy["cargo_op"]);
				$lada_op 									= stripslashes($row_proy["lada_op"]);
				$telefono_fijo_op 							= stripslashes($row_proy["telefono_fijo_op"]);
				$extension_op 								= stripslashes($row_proy["extension_op"]);
				$telefono_movil_op 							= stripslashes($row_proy["telefono_movil_op"]);
				$Correo_electronico_op 						= stripslashes($row_proy["Correo_electronico_op"]);
				$responsable_adm_nombre 					= stripslashes($row_proy["responsable_adm_nombre"]);
				$primer_apellido_adm 						= stripslashes($row_proy["primer_apellido_adm"]);
				$segundo_apellido_adm 						= stripslashes($row_proy["segundo_apellido_adm"]);
				$cargo_adm 									= stripslashes($row_proy["cargo_adm"]);
				$lada_adm 									= $row_proy["lada_adm"];
				$telefono_fijo_adm 							= stripslashes($row_proy["telefono_fijo_adm"]);
				$extension_adm 								= stripslashes($row_proy["extension_adm"]);
				$telefono_movil_adm 						= stripslashes($row_proy["telefono_movil_adm"]);
				$correo_electronico_adm 					= stripslashes($row_proy["correo_electronico_adm"]);
				$desarrollo_proyecto_antecedente 			= stripslashes($row_proy["desarrollo_proyecto_antecedente"]);
				$desarrollo_proyecto_diagnostico 			= stripslashes($row_proy["desarrollo_proyecto_diagnostico"]);
				$desarrollo_proyecto_justificacion 			= stripslashes($row_proy["desarrollo_proyecto_justificacion"]);
				$desarrollo_proyecto_descripcion 			= stripslashes($row_proy["desarrollo_proyecto_descripcion"]);
				$desarrollo_proyecto_objetivos_especificos 	= stripslashes($row_proy["desarrollo_proyecto_objetivos_especificos"]);
				$desarrollo_proyecto_meta_cuantitativa 		= stripslashes($row_proy["desarrollo_proyecto_meta_cuantitativa"]);
				$desarrollo_proyecto_descripcion_impacto 	= stripslashes($row_proy["desarrollo_proyecto_descripcion_impacto"]);
				$poblacion_genero_hombre 			= $row_proy["poblacion_genero_hombre"];
				$poblacion_genero_mujer 			= $row_proy["poblacion_genero_mujer"];
				$poblacion_edad_0_12 				= $row_proy["poblacion_edad_0_12"];
				$poblacion_edad_13_17 				= $row_proy["poblacion_edad_13_17"];
				$poblacion_edad_18_29 				= $row_proy["poblacion_edad_18_29"];
				$poblacion_edad_30_59 				= $row_proy["poblacion_edad_30_59"];
				$poblacion_edad_60 					= $row_proy["poblacion_edad_60"];
				$poblacion_nivel_sin_escolaridad 	= $row_proy["poblacion_nivel_sin_escolaridad"];
				$poblacion_nivel_educ_basica 		= $row_proy["poblacion_nivel_educ_basica"];
				$poblacion_nivel_educ_media 		= $row_proy["poblacion_nivel_educ_media"];
				$poblacion_nivel_educ_superior 		= $row_proy["poblacion_nivel_educ_superior"];
				$poblacion_especific_reclusion 		= $row_proy["poblacion_especific_reclusion"];
				$poblacion_especific_migrantes 		= $row_proy["poblacion_especific_migrantes"];
				$poblacion_especific_indigenas 		= $row_proy["poblacion_especific_indigenas"];
				$poblacion_especific_con_discapacidad = $row_proy["poblacion_especific_con_discapacidad"];
				$poblacion_especific_otros 			= $row_proy["poblacion_especific_otros"];
				$estrategias_medios_radio 			= $row_proy["estrategias_medios_radio"];
				$estrategias_medios_television 		= $row_proy["estrategias_medios_television"];
				$estrategias_medios_internet 		= $row_proy["estrategias_medios_internet"];
				$estrategias_medios_redes_sociales 	= $row_proy["estrategias_medios_redes_sociales"];
				$estrategias_medios_prensa 			= $row_proy["estrategias_medios_prensa"];
				$estrategias_medios_folletos_posters = $row_proy["estrategias_medios_folletos_posters"];
				$estrategias_medios_espectaculares 	= $row_proy["estrategias_medios_espectaculares"];
				$estrategias_medios_perifoneo 		= $row_proy["estrategias_medios_perifoneo"];
				$estrategias_medios_otros 			= $row_proy["estrategias_medios_otros"];
				$estrategias_medios_otros_nombre 	= stripslashes($row_proy["estrategias_medios_otros_nombre"]);
				$estrategias_acciones_dar_conocer 	= stripslashes($row_proy["estrategias_acciones_dar_conocer"]);
				$descripcion_mecanismos_evaluacion 	= stripslashes($row_proy["descripcion_mecanismos_evaluacion"]);
				$organigrama_nombre1 	= stripslashes($row_proy["organigrama_nombre1"]);
				$organigrama_cargo1 	= stripslashes($row_proy["organigrama_cargo1"]);
				$organigrama_funciones1 = stripslashes($row_proy["organigrama_funciones1"]);
				
				
				$organigrama_nombre2 	= stripslashes($row_proy["organigrama_nombre2"]);
				$organigrama_cargo2		= stripslashes($row_proy["organigrama_cargo2"]);
				$organigrama_funciones2 = stripslashes($row_proy["organigrama_funciones2"]);
				
				
				$organigrama_nombre3 	= stripslashes($row_proy["organigrama_nombre3"]);
				$organigrama_cargo3 	= stripslashes($row_proy["organigrama_cargo3"]);
				$organigrama_funciones3 = stripslashes($row_proy["organigrama_funciones3"]);
				
				
				$organigrama_nombre4 	= stripslashes($row_proy["organigrama_nombre4"]);
				$organigrama_cargo4 	= stripslashes($row_proy["organigrama_cargo4"]);
				$organigrama_funciones4 = stripslashes($row_proy["organigrama_funciones4"]);
				
				
				$organigrama_nombre5 	= stripslashes($row_proy["organigrama_nombre5"]);
				$organigrama_cargo5 	= stripslashes($row_proy["organigrama_cargo5"]);
				$organigrama_funciones5 = stripslashes($row_proy["organigrama_funciones5"]);

				$organigrama_nombre6 	= stripslashes($row_proy["organigrama_nombre6"]);
				$organigrama_cargo6 	= stripslashes($row_proy["organigrama_cargo6"]);
				$organigrama_funciones6 = stripslashes($row_proy["organigrama_funciones6"]);
				
				
				$organigrama_nombre7 	= stripslashes($row_proy["organigrama_nombre7"]);
				$organigrama_cargo7 	= stripslashes($row_proy["organigrama_cargo7"]);
				$organigrama_funciones7 = stripslashes($row_proy["organigrama_funciones7"]);
				
				
				$organigrama_nombre8 	= stripslashes($row_proy["organigrama_nombre8"]);
				$organigrama_cargo8 	= stripslashes($row_proy["organigrama_cargo8"]);
				$organigrama_funciones8 = stripslashes($row_proy["organigrama_funciones8"]);
			
				
			}
			// INICIO PESTAÑA 'Proyecto 1er'
			
?>

<!DOCTYPE html>
  <html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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
      <script type="text/javascript" src="js/agregar_mas_opciones.js"></script>
	  <script type="text/javascript" src="js/imprimir_mismo_valor_en_diferentes_lugares.js"></script>
      <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
    <style>
		.segundocampo{
		}
		.proyectocampo{
		}
		.checkcampo{
		}
		
    </style>
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
            <h1>Repositorio Profest</h1>
          </div>
        </div>


<div class="row top-buffer"></div>
        
        <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab-01">Solicitud</a></li>
              <li><a data-toggle="tab" href="#tab-02">Proyecto</a></li>
              <li><a data-toggle="tab" href="#tab-03">Proyecto-Cronograma de acciones</a></li>
              <li><a data-toggle="tab" href="#tab-04">Proyecto-Lugares de realización</a></li>
              <li><a data-toggle="tab" href="#tab-05">Proyecto-Presupuesto</a></li>
              <li><a data-toggle="tab" href="#tab-0XXX">Adjuntos</a></li>
            </ul>
            
            
            
            <!-- INICIO PESTAÑAS -->
            <div class="tab-content"> 
<!-- INICIO PESTAÑA "Solicitud" -->
              <div class="tab-pane active" id="tab-01">
                  <form name="formulario">
                  
                  <div class="row">
                        <div class="col-md-8"> 
                            <h3>Características generales del festival</h3>
                        </div>
                        <div class="col-md-12"><hr class="red small-margin"></div>
                  </div>
                  <!-- Primera Fila -->
       			
                
                <div class="row">
            <!-- Campo Nombre de la Instancia Postulante -->
                <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Nombre del festival<samp id="errNombre_InstAs" name="errNombre_InstAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Utilizar mayúsculas y minúsculas, incluir número de emisión actual, y no cambiar nombre en caso de existir ediciones anteriores."></span></label>
                        <input type="text" id="nombre_festival" name="nombre_festival" class="form-control segundocampo" value="<?=$nombre_festival?>" placeholder="Ingresa el nombre del festival">
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Número de ediciones previas<samp id="errNombre_InstAs" name="errNombre_InstAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Número de ediciones previas comprobables que han mantenido el mismo nombre, en caso de ser primera edición anotar 0."></span></label>
                        <input name="numero_ediciones_previas" type="text" class="form-control segundocampo" id="numero_ediciones_previas" value="<?=$numero_ediciones_previas?>" placeholder="Número de ediciones previas">
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="form-group"> 
                    <label> Disciplina<samp id="errNombre_InstAs" name="errNombre_InstAs" class="control-label">*</samp>:</label>
                	<select id="disciplina" name="disciplina" class="form-control segundocampo">
                    	<option value="" <?php if(empty($disciplina)){ ?> selected="selected"<?php } ?>>Selecciona una opción</option>
                        <option value="Artes escénicas" <?php if($disciplina=="Artes escénicas"){ ?> selected="selected" <?php } ?>>Artes escénicas</option>
                        <option value="Artes plásticas" <?php if($disciplina=="Artes plásticas"){ ?> selected="selected" <?php } ?>>Artes plásticas</option>
                        <option value="Cinematografía" <?php if($disciplina=="Cinematografía"){ ?> selected="selected" <?php } ?>>Cinematografía</option>
                        <option value="Gastronomía" <?php if($disciplina=="Gastronomía"){ ?> selected="selected" <?php } ?>>Gastronomía</option>
                        <option value="Literatura" <?php if($disciplina=="Literatura"){ ?> selected="selected" <?php } ?>>Literatura</option>
                    </select>
                </div>
                </div>
                
             </div>     
              <div class="row">
               <!-- Campo Nombre de la o el Títular -->
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label> Objetivo general del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar la finalidad del proyecto de forma clara y concisa: ¿Qué?, ¿Como?, ¿Dónde?, ¿Para qué?."></span></label>
                        <textarea id="objetivo_general" name="objetivo_general" class="form-control segundocampo" placeholder="Ingresa el objetivo general" rows="3"><?=$objetivo_general?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
            </div>
            
             <div class="row">  
        <div class="col-md-4">
                <div class="form-group">
                    <label>Página Web del festival:</label><input type="text" id="pagina_web_festival" name="pagina_web_festival" class="form-control segundocampo" value=<?=$pagina_web_festival?> placeholder="Ingresa la página web">
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label>Facebook del festival:</label><input type="text" id="facebook_festival" name="facebook_festival" class="form-control segundocampo" value=<?=$facebook_festival?> placeholder="Ingresa el facebook del festival">
                </div>
            </div>
            
             <div class="col-md-4">
                <div class="form-group">
                    <label>Twitter del festival:</label><input type="text" id="twitter_festival" name="twitter_festival" class="form-control segundocampo" value=<?=$twitter_festival?>  placeholder="Ingresa el twitter del festival">
                </div>
            </div>
            
            </div>
      
      
      <!-- INICIO Campo "Metas numéricas" -->         
            <div class="row">
        	<div class="col-md-8">
        		<h3> Metas numéricas </h3>
                <p>Anotar de manera cuantitativa las metas del</p>
        	</div>
        </div>
        
        <div class="row">
        	<div class="col-md-4">
        		<div class="form-group">
        				<label>Número de presentaciones<samp id="errEntidadFCAs" name="errEntidadFCAs" class="control-label">*</samp>:</label>
        				<input type="number" id="meta_num_presentaciones" name="meta_num_presentaciones" class="form-control segundocampo" value="<?=$meta_num_presentaciones?>" placeholder="Ingresa número de presentaciones">
        				<small id="errEntidadFC" name="errEntidadFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>
        
        	<div class="col-md-4">
        		<div class="form-group">
       			  <label>Cantidad de público a beneficiar<samp id="errMunicipio_AlcaldiaFCAs" name="errMunicipio_AlcaldiaFCAs" class="control-label">*</samp>:</label>
        			<input type="number" id="meta_num_publico" name="meta_num_publico" class="form-control segundocampo" value="<?=$meta_num_presentaciones?>" placeholder="Ingresa cantidad de público a beneficiar">
        			<small id="errMunicipio_AlcaldiaFC" name="errMunicipio_AlcaldiaFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        	   </div>
        	</div>
             <div class="col-md-4">
        			<div class="form-group">
        				<label>Número de municipios beneficiados:</label>
        				<input name="meta_num_municipio" type="number" class="form-control segundocampo" id="meta_num_municipio" value="<?=$meta_num_municipio?>" placeholder="Ingresa número de municipios beneficiados">
        				<small id="errIniciativaPrivFC" name="errIniciativaPrivFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        			</div>
        	 </div>
          </div>
                
          <div class="row">
  			<div class="col-md-4">
        		<div class="form-group">
        				<label>Número de foros que se utilizarán<samp id="errIniciativaPrivFCAs" name="errIniciativaPrivFCAs" class="control-label">*</samp>:</label>
        				<input type="number" id="meta_num_foros" name="meta_num_foros" class="form-control segundocampo" value="<?=$meta_num_foros?>" placeholder="Ingresa número de foros">
        				<small id="errIniciativaPrivFC" name="errIniciativaPrivFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>
		  	<div class="col-md-4">
        		<div class="form-group">
        				<label>Número de artístas participantes<samp id="errIniciativaPrivFCAs" name="errIniciativaPrivFCAs" class="control-label">*</samp>:</label>
        				<input type="number" id="meta_num_artistas" name="meta_num_artistas" class="form-control segundocampo" value="<?=$meta_num_artistas?>" placeholder="Ingresa el número de artistas participantes">
        				<small id="errIniciativaPrivFC" name="errIniciativaPrivFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>
		   	<div class="col-md-4">
        		<div class="form-group">
        				<label>Cantidad de grupos a beneficiar<samp id="errIniciativaPrivFCAs" name="errIniciativaPrivFCAs" class="control-label">*</samp>:</label>
        				<input type="number" id="meta_cantidad_grupos" name="meta_cantidad_grupos" class="form-control segundocampo" value="<?=$meta_cantidad_grupos?>" placeholder="Ingresa la cantidad de grupos a beneficiar">
        				<small id="errIniciativaPrivFC" name="errIniciativaPrivFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
               <div class="form-group">
                            <label>Indica el número de metas númericas (otras) para agregar:</label>
                            <!--input name="num" type="number" id="num" onkeyup="ctext(this.value)" class="form-control" placeholder="Indica el número de metas númericas (otras) para agregar" /-->
                            
                    <select id="num" name="num" class="form-control" onChange="ctext(this.value)">
                    	<option value="">Selecciona una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        
                        <option value="10">10</option>
                    </select>
                            
               </div>
                
             </div>
             </div>
             
        <?php for($i=1;$i<=10;$i++){ ?>	  
      <div style="display:none" id="div<?=$i?>">
  		<div class="row">
          <div class="col-md-4">
            <div class="form-group">
        		<label>Nombre de meta númerca(<?=$i?>)</label>
                <input name="nombre_ext<?=$i?>" type="text" class="form-control" placeholder="Ingresa el nombre de la meta numérica" id="nombre_ext<?=$i?>" />
        	</div>
       	  </div>
        <div class="col-md-4">
            <div class="form-group">
        		<label>Cantidad(<?=$i?>)</label>
                <input name="puesto_ext<?=$i?>" type="number" class="form-control" placeholder="Ingresa la cantidad de la meta numérica" id="puesto_ext<?=$i?>"  />
        	</div>
          </div>
		</div>
        </div>
		<?php } ?>    
       
        <!-- FIN Campo "Metas numéricas" -->

         <div class="row">   
            <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Alcance de la programación<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <select id="alcance_programacion" name="alcance_programacion" class="form-control segundocampo">
                    	<option value="" <?php if(empty($alcance_programacion)){ ?> selected="selected"<?php } ?>>Selecciona una opción</option>
                        <option value="Local" <?php if($alcance_programacion=="Local"){ ?> selected="selected" <?php } ?>>Local</option>
                        <option value="Regional" <?php if($alcance_programacion=="Regional"){ ?> selected="selected" <?php } ?>>Regional</option>
                        <option value="Nacional" <?php if($alcance_programacion=="Nacional"){ ?> selected="selected" <?php } ?>>Nacional</option>
                    </select>
                     <small id="errIniciativaPrivFC" name="errIniciativaPrivFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
           </div>
           
           
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Periodo de realización de festival</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group datepicker-group">
                    <label class="control-label" for="calendar">Fecha de inicio<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="periodo_realizacion_fecha_inicio" type="text" class="form-control segundocampo" id="periodo_realizacion_fecha_inicio" value="<?=$periodo_realizacion_fecha_inicio?>" placeholder="Ingresa la fecha de inicio">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           <div class="col-md-4">
                  <div class="form-group datepicker-group">
                    <label class="control-label" for="calendar">Fecha de término<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="periodo_realizacion_fecha_termino" type="text" class="form-control segundocampo" id="periodo_realizacion_fecha_termino" value="<?=$periodo_realizacion_fecha_termino?>" placeholder="Ingresa la fecha de término">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>      
               
              
        <div class="row">
        	<div class="col-md-8">
        		<h3> Información financiera </h3>
        	</div>
        </div>
                            
             
             <div class="row">   
            <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Categoría en la que participa<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                        <select id="info_financiera_categoria" name="info_financiera_categoria" class="form-control segundocampo">
                    	<option value="" <?php if(empty($Info_financiera_categoria)){ ?> selected="selected"<?php } ?>>Selecciona una opción</option>
                        <option value="5" <?php if($Info_financiera_categoria=="5"){ ?> selected="selected" <?php } ?>>Hasta 5 millones de pesos mexicanos, representando no más del 70% del total del festival</option>
                        <option value="10" <?php if($Info_financiera_categoria=="10"){ ?> selected="selected" <?php } ?>>Hasta 10 millones de pesos mexicanos, representando no más del 50% del costo total del festival</option>
                    </select>
                     <small id="errIniciativaPrivFC" name="errIniciativaPrivFC" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
           </div>
            
             <div class="row">
            <!-- Código postal -->
            <div class="col-md-12">
            
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>% Costo total del proyecto</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Costo total de realización del festival<samp id="errnombre_titularAs2" name="errnombre_titularAs" class="control-label">*</samp></th>
                    <td><input type="text" id="Infor_finan_costo_monto" name="Infor_finan_costo_monto" class="form-control segundocampo" value="<?=$Infor_finan_costo_monto?>" placeholder="Ingresa el monto">1
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                    <td><input type="text" id="cien" name="cien" class="form-control" value="100%" readonly>
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                  </tr>
                  <tr>
                    <th scope="row">Apoyo financiero solicitado a la Secretar&iacute;a de Cultura<samp id="errnombre_titularAs3" name="errnombre_titularAs" class="control-label">*</samp></th>
                    <td><input type="text" id="Infor_finan_apoyo_monto" name="Infor_finan_apoyo_monto" class="form-control segundocampo" value="<?=$Infor_finan_apoyo_monto?>" placeholder="Ingresa el monto">2
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                    <td><input type="text" id="Infor_finan_apoyo_costo_total" name="Infor_finan_apoyo_costo_total" class="form-control segundocampo" value="<?=$Infor_finan_apoyo_costo_total?>" placeholder="Ingresa el % costo total">3
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                  </tr>
                </tbody>
              </table>
            
            </div>
           </div>
           
           

        <div class="row">
            <div class="col-md-12">
                <div class="form-group clearfix">	

    			     <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
    				    <div class="pull-right">
    
    				        <input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return validarEnvio();" >
    
    
    			        </div>
                        
                	</div>
            </div> 
            </form>
         </div>
      </div>
      <!-- FIN PESTAÑA "Solicitud" -->              
  
              <!-- INICIO PESTAÑA "Proyecto" -->
              <div class="tab-pane" id="tab-02">
                             
                <div class="row">
                    <div class="col-md-8"> 
                        <h3>Datos del Responsable operativo del festival</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
           
                <div class="row">    
               <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Nombre(s)<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="responsable_op_nombre" name="responsable_op_nombre" value="<?=$responsable_op_nombre?>" class="form-control proyectocampo" placeholder="Ingresa el nombre de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Primer apellido<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="primer_apellido_op" name="primer_apellido_op" value="<?=$primer_apellido_op?>" class="form-control proyectocampo" placeholder="Ingresa el primer apellido de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Segundo apellido<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="segundo_apellido_op" name="segundo_apellido_op" value="<?=$segundo_apellido_op?>" class="form-control proyectocampo" placeholder="Ingresa el segundo apellido de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                
                </div>
       
        <!-- Tercera fila -->
        <div class="row">  
            <!-- Numero de telefono con lada -->
           <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Cargo<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="cargo_op" name="cargo_op" value="<?=$cargo_op?>" class="form-control proyectocampo" placeholder="Ingresa el cargo de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group clearfix">
                  
                  <!-- Lada -->
                  <div class="form-control-lada">
                    <label for="lada">Lada<samp id="errLadaRepLegAs" name="errLadaRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="lada_op" name="lada_op" value="<?=$lada_op?>" class="form-control proyectocampo" placeholder="Lada">   
                    <small id="errLadaRepLeg" name="errLadaRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                  <!-- Telefono -->
                  <div class="form-control-phone">
                    <label for="phone">Teléfono fijo<samp id="errTelefonoRepLegAs" name="errTelefonoRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="telefono_fijo_op" name="telefono_fijo_op" value="<?=$telefono_fijo_op?>" class="form-control proyectocampo" placeholder="Telefono fijo">
                    <small id="errTelefonoRepLeg" name="errTelefonoRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
            </div>
            
               <!-- Extensión -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Extensión:</label><input type="text" id="extension_op" name="extension_op" value="<?=$extension_op?>" class="form-control proyectocampo" placeholder="Ingresa la extensión">
                    <small id="errEmailRepLeg" name="errEmailRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            </div>
             <div class="row">  
          <div class="col-md-4">
                <div class="form-group">
                    <label>Teléfono móvil:</label><input type="text" id="telefono_movil_op" name="telefono_movil_op" value="<?=$telefono_movil_op?>" class="form-control proyectocampo" placeholder="Teléfono móvil">
                    <small id="errEmailRepLeg" name="errEmailRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
          	   <!-- Correo electronico -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Correo electrónico<samp id="errCorreoAs" name="errCorreoAs" class="control-label">*</samp>:</label><input type="text" id="Correo_electronico_op" name="Correo_electronico_op" value="<?=$Correo_electronico_op?>" class="form-control proyectocampo" placeholder="ejemplo@dominio.com" onBlur="validarEmail(this.id);">
                    <small id="errCorreo" name="errCorreo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    <small id="emailOK"></small>
                </div>
            </div>
            </div>
            
            <div class="row">
                    <div class="col-md-8"> 
                        <h3>Datos del Responsable administrativa del festival</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
            
                <div class="row">    
               <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Nombre(s)<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el responsable administrativa del festival"></span></label>
                        <input type="text" id="responsable_adm_nombre" name="responsable_adm_nombre" value="<?=$responsable_adm_nombre?>" class="form-control proyectocampo" placeholder="Ingresa el nombre de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Primer apellido<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el responsable administrativa del festival"></span></label>
                        <input type="text" id="primer_apellido_adm" name="primer_apellido_adm" value="<?=$primer_apellido_adm?>" class="form-control proyectocampo" placeholder="Ingresa el primer apellido de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Segundo apellido<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el responsable administrativa del festival"></span></label>
                        <input type="text" id="segundo_apellido_adm" name="segundo_apellido_adm" value="<?=$segundo_apellido_adm?>" class="form-control proyectocampo" placeholder="Ingresa el segundo apellido de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                
                </div>
       
        <!-- Tercera fila -->
        <div class="row">  
            <!-- Numero de telefono con lada -->
           <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Cargo<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el responsable administrativa del festival"></span></label>
                        <input type="text" id="cargo_adm" name="cargo_adm" value="<?=$cargo_adm?>" class="form-control proyectocampo" placeholder="Ingresa el cargo de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group clearfix">
                  
                  <!-- Lada -->
                  <div class="form-control-lada">
                    <label for="lada">Lada<samp id="errLadaRepLegAs" name="errLadaRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="lada_adm" name="lada_adm" value="<?=$lada_adm?>" class="form-control proyectocampo" placeholder="Lada">   
                    <small id="errLadaRepLeg" name="errLadaRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                  <!-- Telefono -->
                  <div class="form-control-phone">
                    <label for="phone">Teléfono fijo<samp id="errTelefonoRepLegAs" name="errTelefonoRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="telefono_fijo_adm" name="telefono_fijo_adm" value="<?=$telefono_fijo_adm?>" class="form-control proyectocampo" placeholder="Telefono fijo">
                    <small id="errTelefonoRepLeg" name="errTelefonoRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
            </div>
            
               <!-- Extensión -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Extensión:</label><input type="text" id="extension_adm" name="extension_adm" value="<?=$extension_adm?>" class="form-control proyectocampo" placeholder="Ingresa la extensión">
                    <small id="errEmailRepLeg" name="errEmailRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            </div>
             <div class="row">  
          <div class="col-md-4">
                <div class="form-group">
                    <label>Teléfono móvil:</label><input type="text" id="telefono_movil_adm" name="telefono_movil_adm" value="<?=$telefono_movil_adm?>" class="form-control proyectocampo" placeholder="Teléfono móvil">
                    <small id="errEmailRepLeg" name="errEmailRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
          	   <!-- Correo electronico -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Correo electrónico<samp id="errCorreoAs" name="errCorreoAs" class="control-label">*</samp>:</label><input type="text" id="correo_electronico_adm" name="correo_electronico_adm" class="form-control proyectocampo" value="<?=$correo_electronico_adm?>" placeholder="ejemplo@dominio.com" onBlur="validarEmail(this.id);">
                    <small id="errCorreo" name="errCorreo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    <small id="emailOK"></small>
                </div>
            </div>
            
        </div>
       
              
               <div class="row">
                    <div class="col-md-8"> 
                        <h3>Desarrollo del proyecto</h3>
                        <p>Se recomienda considerar los puntos de Evaluación y Selección de la Convocatoria</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
            
                <div class="row">    
               <div class="col-md-12">
                    <div class="form-group"> 
                        <label> a) Antecedentes del festival<samp id="errgradoAs" name="errgradoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Reseña el contexto que dio origen a la creación del festival y los logros más relevantes, así como relacionar las ediciones y en caso de suspensión(es) explicar motivos."></span></label>
                        <textarea id="desarrollo_proyecto_antecedente" name="desarrollo_proyecto_antecedente" class="form-control proyectocampo" placeholder="Ingresa los antecedentes del festival" rows="3"><?=$desarrollo_proyecto_antecedente?></textarea>
                        <small id="errgrado" name="errgrado" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                    
             <!-- INICIO a) Antecedentes del festival -->        
           <div class="row">
           	<div class="col-md-4">
             <div class="form-group">
               <label>Indica número de anexos para agregar:</label>
                            <input name="num4" type="number" id="num4" onkeyup="ctext4(this.value)" class="form-control proyectocampo" placeholder="Indica número de anexos para agregar" />
             </div>
            </div>
           </div>
             
                     <?php for($s=1;$s<=10;$s++){ ?>	  
                      <div style="display:none" id="div_b_<?=$s?>">
                        <div class="row">         	
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Archivo(<?=$s?>)</label>                              
                              <input name="archivo<?=$s?>" type="file" class="casilla" id="archivo<?=$s?>" size="35" />
                    		  <input name="actionfile" type="hidden" value="upload" class="casilla" />
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                </div>
                </div>
                <!-- FIN a) Antecedentes del festival --> 
                <!-- INICIO b) Diagnóstico del festival -->
              <div class="row">    
               <div class="col-md-12">
                    <div class="form-group"> 
                        <label> b) Diagnóstico del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Presentar el análisis de la situación del entorno social que atenderá el Festival, por ejemplo, la brecha de desigualdad entre hombres y mujeres; las características y tipo de población, el consumo cultural de su población, la infraestructura cultural, posibilidad de que las actividades artísticas atiendan la problemática social de violencia, drogadicción, delincuencia o discriminación, recursos de formación artística en su comunidad, etc."></span></label>
                        <textarea id="desarrollo_proyecto_diagnostico" name="desarrollo_proyecto_diagnostico" class="form-control proyectocampo" placeholder="Ingresa el diagnóstico del festival" rows="3"><?=$desarrollo_proyecto_diagnostico?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
             </div>
          	</div>
             <!-- INICIO b) Diagnóstico del festival -->   
                
             <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> c) Justificación del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Exponer las razones que sustentan la realización del Festival y sus actividades, con base en el diagnóstico."></span></label>
                        <textarea id="desarrollo_proyecto_justificacion" name="desarrollo_proyecto_justificacion" class="form-control proyectocampo" placeholder="Ingresa la justificación del festival" rows="3"><?=$desarrollo_proyecto_justificacion?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> d) Descripción del proyecto<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar de manera detallada y ordenada, las características del Festival y acciones que se llevarán a cabo en la realización."></span></label>
                        <textarea name="desarrollo_proyecto_descripcion" id="desarrollo_proyecto_descripcion" rows="3" class="form-control proyectocampo" placeholder="Ingresa la Descripción del proyecto"><?=$desarrollo_proyecto_descripcion?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> e) Objetivo general del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar de forma clara y precisa la finalidad del proyecto. Se recomienda que la redacción incluya respuestas a las preguntas ¿Qué?, ¿Cómo?, ¿Dónde? y ¿Para qué? (lo cual deberá ser verificable a la conclusión de las actividades)"></span></label>
                        <textarea id="Objetivo_genereral_proyecto" name="Objetivo_genereral_proyecto" class="form-control proyectocampo" placeholder="Ingresa el objetivo general del festival" rows="3" readonly><?=$objetivo_general?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> f) Objetivos específicos del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar las acciones concretas y detalladas que se alcanzarán con el proyecto. Deben ser alcanzables y congruentes con el objetivo general."></span></label>
                        <textarea id="desarrollo_proyecto_objetivos_especificos" name="desarrollo_proyecto_objetivos_especificos" class="form-control proyectocampo" placeholder="Ingresa los objetivos específicos del festival" rows="3"><?=$desarrollo_proyecto_objetivos_especificos?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> g) Metas cuantitativas del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Incluir el número de días que dura el festival"></span></label>
                        <textarea id="desarrollo_proyecto_meta_cuantitativa" name="desarrollo_proyecto_meta_cuantitativa" class="form-control proyectocampo" placeholder="Ingresa las metas cuantitativas del festival (incluir el número de días que dura el festival)" rows="3"><?=$desarrollo_proyecto_meta_cuantitativa?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> h) Descripción del impacto sociocultural del proyecto<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar los efectos que tendrá el proyecto en la comunidad de realización, así como en el sector artístico. Será necesario atender a los criterios de Evaluación y Selección de la Convocatoria."></span></label>
                        <textarea id="desarrollo_proyecto_descripcion_impacto" name="desarrollo_proyecto_descripcion_impacto" class="form-control proyectocampo" placeholder="Ingresa la descripción del impacto socio-cultural del proyecto" rows="3"><?=$desarrollo_proyecto_descripcion_impacto?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
                        
          
          
          <!-- INICIO i)Problación objetivo del festival-->
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">i) Población objetivo del festival</label></div>
           </div>
           
                     
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Genero</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group datepicker-group">
                    <label class="control-label" for="calendar">Número de hombres<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_genero_hombre" type="number" class="form-control proyectocampo" id="poblacion_genero_hombre" value="<?=$poblacion_genero_hombre?>" placeholder="Ingresa el número de hombres">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           <div class="col-md-4">
                  <div class="form-group datepicker-group">
                    <label class="control-label" for="calendar">Número de mujeres<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_genero_mujer" type="number" class="form-control proyectocampo" id="poblacion_genero_mujer" value="<?=$poblacion_genero_mujer?>" placeholder="Ingresa el número de mujeres">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           
           
           
            <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Edad<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="indicar cantidada por rango de edad."></span></label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">0-12<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_0_12" type="number" class="form-control proyectocampo" id="poblacion_edad_0_12" value="<?=$poblacion_edad_0_12?>" placeholder="Ingresa el número de 0-12 de edad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">13-17<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_13_17" type="number" class="form-control proyectocampo" id="poblacion_edad_13_17" value="<?=$poblacion_edad_13_17?>" placeholder="Ingresa el número de 13-17 de edad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
            </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">18-29<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_18_29" type="number" class="form-control proyectocampo" id="poblacion_edad_18_29" value="<?=$poblacion_edad_18_29?>" placeholder="Ingresa el número de 18-29 de edad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">30-59<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_30_59" type="number" class="form-control proyectocampo" id="poblacion_edad_30_59" value="<?=$poblacion_edad_30_59?>" placeholder="Ingresa el número de 30-59 de edad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">60 en adelante<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_60" type="number" class="form-control proyectocampo" id="poblacion_edad_60" value="<?=$poblacion_edad_60?>" placeholder="Ingresa el número de 60 en adelante de edad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           
           
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Nivel académico</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Sin escolaridad<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_sin_escolaridad" type="number" class="form-control proyectocampo" id="poblacion_nivel_sin_escolaridad" value="<?=$poblacion_nivel_sin_escolaridad?>" placeholder="Ingresa el número sin escolaridad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Educación Básica<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_educ_basica" type="number" class="form-control proyectocampo" id="poblacion_nivel_educ_basica" value="<?=$poblacion_nivel_educ_basica?>" placeholder="Ingresa el número de educación básica">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
            </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Educación Media<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_educ_media" type="number" class="form-control proyectocampo" id="poblacion_nivel_educ_media" value="<?=$poblacion_nivel_educ_media?>" placeholder="Ingresa el número de educación media">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Educación Superior<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_educ_superior" type="number" class="form-control proyectocampo" id="poblacion_nivel_educ_superior" value="<?=$poblacion_nivel_educ_superior?>" placeholder="Ingresa el número de educación superior">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           
           
           
           
           
           
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Específicos</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Reclusión<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_reclusion" type="number" class="form-control proyectocampo" id="poblacion_especific_reclusion" value="<?=$poblacion_especific_reclusion?>" placeholder="Ingresa el número de reclusión">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Migrantes<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_migrantes" type="number" class="form-control proyectocampo" id="poblacion_especific_migrantes" value="<?=$poblacion_especific_migrantes?>" placeholder="Ingresa el número de migrantes">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
            </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Indígenas<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_indigenas" type="number" class="form-control proyectocampo" id="poblacion_especific_indigenas" value="<?=$poblacion_especific_indigenas?>" placeholder="Ingresa el número de indígenas">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Con discapacidad<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_con_discapacidad" type="number" class="form-control proyectocampo" id="poblacion_especific_con_discapacidad" value="<?=$poblacion_especific_con_discapacidad?>" placeholder="Ingresa el número con discapacidad">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">Otros<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_otros" type="number" class="form-control proyectocampo" id="poblacion_especific_otros" value="<?=$poblacion_especific_otros?>" placeholder="Ingresa el número de otros">
                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
              
            <!-- FIN i)Problación objetivo del festival-->   
              
              <!-- inicio del iniciso j -->
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> j) Organigrama operativo para la producción del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label cuartocampo">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Detallar la estructura organizativa del Festival en el tipo de esquema propuesto. Incluir nombres de los responsables y área o actividad a operar."></span></label>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Funciones</th>
                              </tr>
                            </thead>
                            <?php for($f=1;$f<=8;$f++){ ?>
                            <tbody>
                              <tr>
                                <th scope="row">
                                <?php 
								echo $f;
								
								$organigrama_nombre_a=${'organigrama_nombre'.$f};
								$organigrama_cargo_a=${'organigrama_cargo'.$f};
								$organigrama_funciones_a=${'organigrama_funciones'.$f};
								
								if($f<=3){ ?><samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp><?php } ?></th>
                                <td><input type="text" id="organigrama_nombre<?=$f?>" name="organigrama_nombre<?=$f?>" value="<?=$organigrama_nombre_a?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="organigrama_cargo<?=$f?>" name="organigrama_cargo<?=$f?>" value="<?=$organigrama_cargo_a?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="organigrama_funciones<?=$f?>" name="organigrama_funciones<?=$f?>" value="<?=$organigrama_funciones_a?>" class="form-control proyectocampo" placeholder="Ingresa la(s) funcione(s)">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                            </tbody>
                            <?php } ?>
                          </table>
                        
                  </div>
                </div>
              </div>
              <!-- fin del iniciso j -->
              
              
               <!-- INICIO del iniciso o -->
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> m) Monto solicitado a la Secretaría de Cultura y n) Costo total del festival:
                        </label>
                       <div class="row">
                        <!-- Código postal -->
                        <div class="col-md-12">
                        
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Descripción</th>
                                <th>Monto</th>
                                <th>% Costo total del proyecto</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Costo total de realización del festival<samp id="errnombre_titularAs2" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Infor_finan_costo_monto2" name="Infor_finan_costo_monto2" class="form-control proyectocampo" placeholder="Ingresa el monto" value="<?=$Infor_finan_costo_monto?>" readonly>
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="cien" name="cien" class="form-control proyectocampo" value="100%" readonly>
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              <tr>
                                <th scope="row">Apoyo financiero solicitado a la Secretar&iacute;a de Cultura<samp id="errnombre_titularAs3" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Infor_finan_apoyo_monto2" name="Infor_finan_apoyo_monto2" class="form-control proyectocampo" placeholder="Ingresa el monto" value="<?=$Infor_finan_apoyo_monto?>" readonly>
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Infor_finan_apoyo_costo_total2" name="Infor_finan_apoyo_costo_total2" class="form-control proyectocampo" value="<?=$Infor_finan_apoyo_costo_total?>" placeholder="Ingresa el % costo total" readonly>
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                            </tbody>
                          </table>
                        
                        </div>
                       </div>
                       
                  </div>
                </div>
              </div>
              <!-- FIN del iniciso o -->
              
               <!-- INICIO Estratégias de difusion-->
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> p) Estrategias de difusión del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:
                        </label>
                  </div>
                </div>
              </div>
              
               <div class="row">
                <div class="col-md-8"><label class="control-label" for="medios">¿Por qué medios se dará difusión al festival?</label></div>
               </div>
              
               <div class="row">
               <div class="col-md-4">
               <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="estrategias_medios_radio" id="estrategias_medios_radio" class="checkcampo"
                    <?php if($estrategias_medios_radio==1){ ?> checked <?php } ?>> Radio
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="estrategias_medios_television" id="estrategias_medios_television" class="checkcampo" 
					<?php if($estrategias_medios_television==1){ ?> checked <?php } ?>> Televisión
                  </label>
               </div>
               <div class="checkbox"> 
                 <label>
                    <input type="checkbox" value="1" name="estrategias_medios_internet" id="estrategias_medios_internet" class="checkcampo" <?php if($estrategias_medios_internet==1){ ?> checked <?php } ?>> Internet
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="estrategias_medios_redes_sociales" id="estrategias_medios_redes_sociales" class="checkcampo" <?php if($estrategias_medios_redes_sociales==1){ ?> checked <?php } ?>> Redes sociales
                  </label>
                </div>                 
               
               <div class="checkbox">  
                 <label>
                    <input type="checkbox" value="1" name="estrategias_medios_prensa" id="estrategias_medios_prensa" class="checkcampo" <?php if($estrategias_medios_prensa==1){ ?> checked <?php } ?>> Prensa (periódicos, revistas, etc.)
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="estrategias_medios_folletos_posters" id="estrategias_medios_folletos_posters" class="checkcampo" <?php if($estrategias_medios_folletos_posters==1){ ?> checked <?php } ?>> Folletos y/o posters
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="estrategias_medios_espectaculares" id="estrategias_medios_espectaculares" class="checkcampo" <?php if($estrategias_medios_espectaculares==1){ ?> checked <?php } ?>> Espectaculares
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="estrategias_medios_perifoneo" id="estrategias_medios_perifoneo" class="checkcampo" <?php if($estrategias_medios_perifoneo==1){ ?> checked <?php } ?>> Perifoneo
                  </label>
               </div>
              </div>
              </div>
              
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> Otros medios de en que se dará difusión al festival:</label>
                        <textarea id="estrategias_medios_otros_nombre" name="estrategias_medios_otros_nombre" class="form-control proyectocampo" placeholder="Ingresa otro medio de difusión del festival" rows="3"><?=$estrategias_medios_otros_nombre?></textarea>
                  </div>
                </div>
              </div>
               
              
               <!-- FIN Estratégias de difusion-->
             
               <div class="row">
               <!-- Campo Nombre de la o el Títular -->
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label> ¿Qué acciones se llevarán a cabo para dar a conocer el festival?<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="A fin de captar un gran número de público"></span></label>
                        <textarea id="estrategias_acciones_dar_conocer" name="estrategias_acciones_dar_conocer" class="form-control proyectocampo" placeholder="Ingresa qué acciones se llevarán a cabo para dar a conocer el festival a fin de captar un gran número de público" rows="3"><?=$estrategias_acciones_dar_conocer?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
            </div>
               
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> q) Descripción de los mecanismos de evaluación del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Anotar las herramientas o procedimientos que permitan verificar que los objetivos y metas sean alcanzados."></span>
                        </label>
                        <textarea id="descripcion_mecanismos_evaluacion" name="descripcion_mecanismos_evaluacion" class="form-control proyectocampo" placeholder="Ingresa la descripción de los mecanismos de evaluación del festival" rows="3"><?=$descripcion_mecanismos_evaluacion?></textarea>
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
           </div>
           <!-- FIN PESTAÑA "Proyecto" -->
              
             <!-- INICIO PESTAÑA "Cronograma de acciones para la ejecución del festival" -->
             <div class="tab-pane" id="tab-03">
                <!-- inicio del iniciso k -->
                
                 <div class="row">
                    <div class="col-md-12"> 
                        <h3> k) Cronograma de acciones para la ejecución del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                         
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Agregar opción
                                        </button>		
                                    </div>
                                </div>
                                
                                <div class='clearfix'></div>
                                <hr>
                                <div id="loader"></div><!-- Carga de datos ajax aqui -->
                                <div id="resultados"></div><!-- Carga de datos ajax aqui -->
                                <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
                            
                            <!-- Edit Modal HTML -->
                            <?php include("html/modal_add.php");?>
                            <!-- Edit Modal HTML -->
                            <?php include("html/modal_edit.php");?>
                            <!-- Delete Modal HTML -->
                            <?php include("html/modal_delete.php");?>
       
            <!-- fin del iniciso k -->
          </div>
            <!-- FIN PESTAÑA "Cronograma de acciones para la ejecución del festival" -->  
              
              
            <!-- INICIO PESTAÑA "Cronograma de acciones para la ejecución del festival" -->
            <div class="tab-pane" id="tab-04">
              <!-- inicio del iniciso l -->
              <div class="row">
                    <div class="col-md-12"> 
                        <h3> l) Lugares de realización de las actividades artísticas del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
              
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nombre del foro</th>
                                <th>Domicilio <span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Código Postal, Estado, 	Municipio o Alcaldía, Colonia, Calle, Número exterior, Número interior, Entre qué calles(tipo y nombre)"></span></th>
                                <th>Descripción <span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Espacio abierto o cerrado, medidas, aforo, características escenotécnicas, etc)"></span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Nombreforo_1" name="Nombreforo_1" class="form-control proyectocampo" value="<?=$Nombreforo_1?>" placeholder="Ingresa el nombre del foro">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Domicilioforo_1" name="Domicilioforo_1" class="form-control proyectocampo" value="<?=$Domicilioforo_1?>" placeholder="Ingresa el domicilio">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Descripespacio_1" name="Descripespacio_1" class="form-control proyectocampo" value="<?=$Descripespacio_1?>" placeholder="Ingresa la descripción">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              <tr>
                                <th scope="row">2<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Nombreforo_2" name="Nombreforo_2" class="form-control proyectocampo" value="<?=$Nombreforo_2?>" placeholder="Ingresa el nombre del foro">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Domicilioforo_2" name="Domicilioforo_2" class="form-control proyectocampo" value="<?=$Domicilioforo_2?>" placeholder="Ingresa el domicilio">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Descripespacio_2" name="Descripespacio_2" class="form-control proyectocampo" value="<?=$Descripespacio_2?>" placeholder="Ingresa la descripción">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              <tr>
                                <th scope="row">3<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Nombreforo_3" name="Nombreforo_3" class="form-control proyectocampo" value="<?=$Nombreforo_3?>" placeholder="Ingresa el nombre del foro">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Domicilioforo_3" name="Domicilioforo_3" class="form-control proyectocampo" value="<?=$Domicilioforo_3?>" placeholder="Ingresa el domicilio">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Descripespacio_3" name="Descripespacio_3" class="form-control proyectocampo" value="<?=$Descripespacio_3?>" placeholder="Ingresa la descripción">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              
                            </tbody>
                          </table>
                          
                         
                        
                  </div>
                </div>
              </div>
              <!-- FIN del iniciso l -->
            </div>  
            <!-- FIN PESTAÑA "Cronograma de acciones para la ejecución del festival" -->   
              
           <!-- INICIO PESTAÑA "Presupuesto" -->
            <div class="tab-pane" id="tab-05">
                <!-- INICIO del iniciso o -->
                <div class="row">
                    <div class="col-md-12"> 
                        <h3> o) Presupuesto<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></h3>
                        <p>En el caso de la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival que se proponen pagar con recursos del PROFEST, se deberá adjuntar una cotización por cada servicio o arrendamiento, excepto en el caso de la contratación de servicios artísticos profesionales.</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                              <th colspan="5">Financiamiento/Presupuesto del costo total del festival</th>
                              </tr>
                              <tr>
                                <th>#</th>
                                <th>Concepto de gasto<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Desglosar los conceptos del presupuesto general del proyecto."></span></th>
                                <th>Fuente de financiamiento<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Procedencia del recurso (institucional, social o privada)."></span></th>
                                <th>Monto/unidad<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cantidad de aportación (puede ser monetaria o en especie)."></span></th>
                                <th>Porcentaje<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Porcentaje que representa el gasto referido dentro del presupuesto global."></span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              <tr>
                                <th scope="row">2<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              <tr>
                                <th scope="row">3<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp></th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                                 <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje">
                                    <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">4</th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto"></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento"></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad"></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje"></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">5</th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto"></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento"></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad"></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje"></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">6</th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto"></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento"></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad"></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje"></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">7</th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto"></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento"></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad"></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje"></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">8</th>
                                <td><input type="text" id="Conceoto_gasto_1" name="Conceoto_gasto_1" class="form-control" placeholder="Ingresa el concepto de gasto"></td>
                                <td><input type="text" id="Fuente_financiamiento_1" name="Fuente_financiamiento_1" class="form-control" placeholder="Ingresa la fuente de financiamiento"></td>
                                <td><input type="text" id="Monto_unidad_1" name="Monto_unidad_1" class="form-control" placeholder="Ingresa el monto/unidad"></td>
                                <td><input type="text" id="Porcentaje_1" name="Porcentaje_1" class="form-control" placeholder="Ingresa el porcentaje"></td>
                              </tr>
                              
                              
                              <tr>
                              <th colspan="3">Total</th>
                             
                                <th><input type="text" id="Monto_unidad_total" name="Monto_unidad_total" class="form-control" placeholder="$"></th>
                                <th><input type="text" id="Porcentaje_total" name="Porcentaje_total" class="form-control" placeholder="100%"></th>
                              </tr>
                            </tbody>
                          </table>
                  </div>
                </div>
              </div>
              
              <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                            <label>Indica los financiamiento/presupuesto para agregar:</label>
                                            <input name="num5" type="number" id="num5" onkeyup="ctext5(this.value)" class="form-control" />
                               </div>
                                
                             </div>
                             </div>
                             
                    <?php for($g=1;$g<=50;$g++){ ?>	  
                      <div style="display:none" id="div_c_<?=$g?>">
                        <div class="row">         	
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Concepto de gasto(<?=$g?>)</label>
                              <input name="Nombre_foro_<?=$g?>" type="text" class="form-control" placeholder="Ingresa el nombre del foro" id="Nombre_foro_<?=$g?>" />
                            </div>
                          </div>
                         <div class="col-md-4">
                            <div class="form-group">
                             <label>Fuente de financiamiento(<?=$g?>)</label>
                         <input name="Domicilio_foro_<?=$g?>" type="text" class="form-control" placeholder="Ingresa el domicilio" id="Domicilio_foro_<?=$g?>"  />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                             <label>Monto/unidad(<?=$g?>)</label>
                 		<input name="actividad_acciones_<?=$g?>" type="text" class="form-control" placeholder="Ingresa la descripción" id="actividad_acciones_<?=$g?>"  />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                             <label>Porcentaje(<?=$g?>)</label>
                 		<input name="actividad_acciones_<?=$g?>" type="text" class="form-control" placeholder="Ingresa la descripción" id="actividad_acciones_<?=$g?>"  />
                            </div>
                          </div>
                        </div>
                        </div>
                    <?php } ?>    
              
              <!-- FIN del iniciso o -->
              
              
            </div>
            <!-- FIN  PESTAÑA "Presupuesto" -->   
              
              
              
              
            <!-- INICIO PESTAÑA "Adjuntos" -->
            <div class="tab-pane" id="tab-0XXX">
                <div class="row">
                    <div class="col-md-8"> 
                        <h3>Documentos a adjuntar</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                
                <div class="row">
                </div>
                
            </div>
            <!-- FIN  PESTAÑA "Adjuntos" -->
           
           
           
          </div>
         </div>
        </div>      
            
       
        
         <div class="row">
			<div class="col-md-12 top-buffer">					
		 </div>
	</div>

       
      </div> 
    </div>
    
       
        <script src="js/script.js"></script>
        
        
         <script src="script_lugar.js"></script>
         
         
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
        
        <script>
		$gmx(document).ready(function() {
		  $('#periodo_realizacion_fecha_inicio').datepicker();
		  $('#periodo_realizacion_fecha_termino').datepicker();
		});
		</script>
        
        
		<script type="text/javascript" src="js/hacer_peticion_y_altera.js"></script>

        <script>
          //INICIO .segundocampo Alta y Modificación Solicitud
		  var http_request = false;
		  var set_pc = document.querySelectorAll(".segundocampo");
			
		  for (var i = 0; i < set_pc.length; i++) {
			   set_pc[i].onchange = function () {
									 
				var url='receptor.php?variable='+this.name+'&valor='+this.value;
					//fetch(url)	
					hacerPeticion(url);
			  }
          }
		  //FIN .segundocampo Alta y Modificación Solicitud
		  
		  //INICIO .proyectocampo Alta y Modificación Proyecto 1er. pestaña
		  var set_pcX = document.querySelectorAll(".proyectocampo");
			
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
			   	 
				var url_X='receptor2_Proyecto.php?variable='+this.name+'&valor='+this.value;
	
				hacerPeticion(url_X);
			  }
          }
		  //FIN .proyectocampo Alta y Modificación Proyecto 1er. pestaña
		  
		  
		  
		  //INICIO ¿Por qué medios se dará difusión al festival?
		  var set_pcz = document.querySelectorAll(".checkcampo");
			
		  for (var i = 0; i < set_pcz.length; i++) {
			   set_pcz[i].onchange = function () {
				
				if(this.checked == true ){
					console.log(`Checado ${this.name}`)
					var seleccion_medio=this.value;
				}else{
					console.log(`No checado ${this.name}`)
					var seleccion_medio=contenido=0;
				}
			   	 
				console.log(`valor final= ${seleccion_medio}`)
				 
				var url_z='receptor2_Proyecto.php?variable='+this.name+'&valor='+seleccion_medio;
				
				hacerPeticion(url_z);
			  }
          }
		  //FIN ¿Por qué medios se dará difusión al festival?
		  
		  
		  /*//INICIO .mas_cronogramaactividades
		  var set_pcm = document.querySelectorAll(".mas_cronogramaactividades");
			
		  for (var i = 0; i < set_pcm.length; i++) {
			   set_pcm[i].onchange = function () {
				   
			   var cuantos_cronograma = document.getElementById("num2").value;
			
				var url_m='receptor2_Cronograma.php?variable='+this.name+'&valor='+this.value+'&cuantos_cronograma='+cuantos_cronograma;
	
				hacerPeticion(url_m);
			  }
          }
		  //FIN .mas_cronogramaactividades
		  
		  
		  //INICIO .mas_cronogramaactividades guardados
		  var set_pcma = document.querySelectorAll(".mas_cronograma_guardados");
			
		  for (var i = 0; i < set_pcma.length; i++) {
			   set_pcma[i].onchange = function () {
				
				var url_ma='receptor2_Cronograma2.php?variable='+this.name+'&valor='+this.value;
	
				hacerPeticion(url_ma);
			  }
          }
		  //FIN .mas_cronogramaactividades guardados
		  
		  //INICIO .mas_lugares
		  var set_pcj = document.querySelectorAll(".mas_lugares");
			
		  for (var i = 0; i < set_pcj.length; i++) {
			   set_pcj[i].onchange = function () {
				   
			   var cuantos_lugares = document.getElementById("num3").value; 
         	   				 
				var url_j='receptor2_Lugares.php?variable='+this.name+'&valor='+this.value+'&cuantos_lugares='+cuantos_lugares;
	
				hacerPeticion(url_j);
			  }
          }
		  //FIN .mas_lugares
		  */
		  
		</script>


  </body>
</html>