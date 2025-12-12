<?php
require_once('Connections/profest_rep.php');
require_once('Connections/conexion.php'); ?>
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
mysql_query("SET NAMES 'utf8'");
$level = $_SESSION['MM_UserGroup'];
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=index_cierre.php'>";}
			// INICIO informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysql_query($sql);
			$num_resultados = mysql_num_rows($resultado);
			for ($i=0; $i <$num_resultados; $i++)
			{$row = mysql_fetch_array($resultado);
			$nombre = $row["nombre_titular"];
			$ape_pat = stripslashes($row["primer_apellido"]);
			$ape_mat = stripslashes($row["segundo_apellido"]);
			$nombrec = $nombre.' '.$ape_pat.' '.$ape_mat;
			
			//$ningun_acceso_05052019  = $row["ningun_acceso_05052019"];
			
			}
			// FIN informacion para acceso al sistema	
			// INICIO PESTAÑA 'Solicitud'
			$sql_consulta = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_consulta = mysql_query($sql_consulta);
			$num_resultados_solicitud = mysql_num_rows($resultado_consulta);
			for ($j=0; $j <$num_resultados_solicitud; $j++)
			{
				$row_sol = mysql_fetch_array($resultado_consulta);
			
				$nombre_festival = $row_sol["nombre_festival"];
				$numero_ediciones_previas = $row_sol["numero_ediciones_previas"];
				
				/*$disciplina_musica = $row_sol["disciplina_musica"];
				$disciplina_teatro = $row_sol["disciplina_teatro"];
				$disciplina_danza = $row_sol["disciplina_danza"];
				$disciplina_gastronomia = $row_sol["disciplina_gastronomia"];
				$disciplina_artes_visuales = $row_sol["disciplina_artes_visuales"];*/
				
				$disciplina_musica_v2  = $row_sol["disciplina_musica_v2"];
				$disciplina_teatro_v2  = $row_sol["disciplina_teatro_v2"];
				$disciplina_danza_v2  = $row_sol["disciplina_danza_v2"];
				$disciplina_artes_visuales_v2  = $row_sol["disciplina_artes_visuales_v2"];
				$disciplina_gastronomia_v2  = $row_sol["disciplina_gastronomia_v2"];
				$disciplina_literatura_v2  = $row_sol["disciplina_literatura_v2"];

				
				$objetivo_general = $row_sol["objetivo_general"];
				$objetivo_general  	= str_replace("<br>", "\n", $objetivo_general);
				
				$pagina_web_festival = $row_sol["pagina_web_festival"];
				$facebook_festival = $row_sol["facebook_festival"];
				$twitter_festival = $row_sol["twitter_festival"];
				
				$meta_num_presentaciones = $row_sol["meta_num_presentaciones"];
				$meta_num_publico = $row_sol["meta_num_publico"];
				$meta_num_municipio = $row_sol["meta_num_municipio"];
				$meta_num_foros = $row_sol["meta_num_foros"];
				$meta_num_artistas = $row_sol["meta_num_artistas"];
				$meta_cantidad_grupos = $row_sol["meta_cantidad_grupos"];
				$meta_num_actividades_academicas = $row_sol["meta_num_actividades_academicas"];
				$meta_numero_grupos_ind_atender = $row_sol["meta_numero_grupos_ind_atender"];
				
				$alcance_programacion = $row_sol["alcance_programacion"];
				$periodo_realizacion_fecha_inicio = $row_sol["periodo_realizacion_fecha_inicio"];
				$periodo_realizacion_fecha_termino = $row_sol["periodo_realizacion_fecha_termino"];
				
				$Info_financiera_categoria = $row_sol["Info_financiera_categoria"];
				$Infor_finan_apoyo_monto = $row_sol["Infor_finan_apoyo_monto"];
				$Infor_finan_apoyo_costo_total = $row_sol["Infor_finan_apoyo_costo_total"];
				$Infor_finan_costo_monto = $row_sol["Infor_finan_costo_monto"];
				
				$cerrrado  = $row_sol["cerrrado"]; 
				$fecha_hora_cierre_total = $row_sol["fecha_hora_cierre_total"];
			}
			// FIN PESTAÑA 'Solicitud'
						
			if($cerrrado==1 and $fecha_hora_cierre_total!='0000-00-00 00:00:00'){ 
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=finsol_continua_proceso.php'>"; 
				exit; 
			}
			
			
			/*if($ningun_acceso_05052019==1){ 
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>"; 
				exit; 
			}*/
			
				
			// INICIO PESTAÑA 'Proyecto 1er' 
			$sql_consulta_proy = "SELECT * FROM `proyecto` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_consulta_proy = mysql_query($sql_consulta_proy);
			$num_resultados_proyecto = mysql_num_rows($resultado_consulta_proy);
			for ($k=0; $k <$num_resultados_proyecto; $k++)
			{
				$row_proy = mysql_fetch_array($resultado_consulta_proy);
				
				$responsable_op_nombre 						= $row_proy["responsable_op_nombre"];
				$primer_apellido_op 						= $row_proy["primer_apellido_op"];
				$segundo_apellido_op 						= $row_proy["segundo_apellido_op"];
				$cargo_op 									= $row_proy["cargo_op"];
				$lada_op 									= $row_proy["lada_op"];
				$telefono_fijo_op 							= $row_proy["telefono_fijo_op"];
				$extension_op 								= $row_proy["extension_op"];
				$telefono_movil_op 							= $row_proy["telefono_movil_op"];
				$Correo_electronico_op 						= $row_proy["Correo_electronico_op"];
				$responsable_adm_nombre 					= $row_proy["responsable_adm_nombre"];
				$primer_apellido_adm 						= $row_proy["primer_apellido_adm"];
				$segundo_apellido_adm 						= $row_proy["segundo_apellido_adm"];
				$cargo_adm 									= $row_proy["cargo_adm"];
				$lada_adm 									= $row_proy["lada_adm"];
				$telefono_fijo_adm 							= $row_proy["telefono_fijo_adm"];
				$extension_adm 								= $row_proy["extension_adm"];
				$telefono_movil_adm 						= $row_proy["telefono_movil_adm"];
				$correo_electronico_adm 					= $row_proy["correo_electronico_adm"];
				
				$desarrollo_proyecto_antecedente 			= $row_proy["desarrollo_proyecto_antecedente"];
				$desarrollo_proyecto_diagnostico 			= $row_proy["desarrollo_proyecto_diagnostico"];
				$desarrollo_proyecto_justificacion 			= $row_proy["desarrollo_proyecto_justificacion"];
				$desarrollo_proyecto_descripcion 			= $row_proy["desarrollo_proyecto_descripcion"];
				
				$desarrollo_proyecto_objetivos_especificos 	= $row_proy["desarrollo_proyecto_objetivos_especificos"];
				$desarrollo_proyecto_meta_cuantitativa 		= $row_proy["desarrollo_proyecto_meta_cuantitativa"];
				$desarrollo_proyecto_descripcion_impacto 	= $row_proy["desarrollo_proyecto_descripcion_impacto"];
				$desarrollo_proyecto_rebrote_covid			= $row_proy["desarrollo_proyecto_rebrote_covid"];
				
				$desarrollo_proyecto_antecedente  	= str_replace("<br>", "\n", $desarrollo_proyecto_antecedente);
				$desarrollo_proyecto_diagnostico  	= str_replace("<br>", "\n", $desarrollo_proyecto_diagnostico); 
				$desarrollo_proyecto_justificacion  = str_replace("<br>", "\n", $desarrollo_proyecto_justificacion); 
				$desarrollo_proyecto_descripcion  	= str_replace("<br>", "\n", $desarrollo_proyecto_descripcion);
				$desarrollo_proyecto_objetivos_especificos  = str_replace("<br>", "\n", $desarrollo_proyecto_objetivos_especificos); 
				$desarrollo_proyecto_meta_cuantitativa  	= str_replace("<br>", "\n", $desarrollo_proyecto_meta_cuantitativa); 
				$desarrollo_proyecto_descripcion_impacto  	= str_replace("<br>", "\n", $desarrollo_proyecto_descripcion_impacto); 
				$desarrollo_proyecto_rebrote_covid  	= str_replace("<br>", "\n", $desarrollo_proyecto_rebrote_covid);
				
				$estrategias_medios_otros_nombre 	= $row_proy["estrategias_medios_otros_nombre"];
				$estrategias_acciones_dar_conocer 	= $row_proy["estrategias_acciones_dar_conocer"];
				$descripcion_mecanismos_evaluacion 	= $row_proy["descripcion_mecanismos_evaluacion"];
				
				$estrategias_medios_otros_nombre 	= str_replace("<br>", "\n", $estrategias_medios_otros_nombre); 
				$estrategias_acciones_dar_conocer  	= str_replace("<br>", "\n", $estrategias_acciones_dar_conocer); 
				$descripcion_mecanismos_evaluacion  = str_replace("<br>", "\n", $descripcion_mecanismos_evaluacion); 
				
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
				
				$poblacion_especific_otro_nombre 	= $row_proy["poblacion_especific_otro_nombre"];
				$poblacion_especific_otro_cantidad 	= $row_proy["poblacion_especific_otro_cantidad"];
				
				$estrategias_medios_radio 			= $row_proy["estrategias_medios_radio"];
				$estrategias_medios_television 		= $row_proy["estrategias_medios_television"];
				$estrategias_medios_internet 		= $row_proy["estrategias_medios_internet"];
				$estrategias_medios_redes_sociales 	= $row_proy["estrategias_medios_redes_sociales"];
				$estrategias_medios_prensa 			= $row_proy["estrategias_medios_prensa"];
				$estrategias_medios_folletos_posters = $row_proy["estrategias_medios_folletos_posters"];
				$estrategias_medios_espectaculares 	= $row_proy["estrategias_medios_espectaculares"];
				$estrategias_medios_perifoneo 		= $row_proy["estrategias_medios_perifoneo"];
				
				$organigrama_nombre1 	= $row_proy["organigrama_nombre1"];
				$organigrama_cargo1 	= $row_proy["organigrama_cargo1"];
				$organigrama_funciones1 = $row_proy["organigrama_funciones1"];
							
				$organigrama_nombre2 	= $row_proy["organigrama_nombre2"];
				$organigrama_cargo2		= $row_proy["organigrama_cargo2"];
				$organigrama_funciones2 = $row_proy["organigrama_funciones2"];
								
				$organigrama_nombre3 	= $row_proy["organigrama_nombre3"];
				$organigrama_cargo3 	= $row_proy["organigrama_cargo3"];
				$organigrama_funciones3 = $row_proy["organigrama_funciones3"];
								
				$organigrama_nombre4 	= $row_proy["organigrama_nombre4"];
				$organigrama_cargo4 	= $row_proy["organigrama_cargo4"];
				$organigrama_funciones4 = $row_proy["organigrama_funciones4"];
								
				$organigrama_nombre5 	= $row_proy["organigrama_nombre5"];
				$organigrama_cargo5 	= $row_proy["organigrama_cargo5"];
				$organigrama_funciones5 = $row_proy["organigrama_funciones5"];

				$organigrama_nombre6 	= $row_proy["organigrama_nombre6"];
				$organigrama_cargo6 	= $row_proy["organigrama_cargo6"];
				$organigrama_funciones6 = $row_proy["organigrama_funciones6"];
								
				$organigrama_nombre7 	= $row_proy["organigrama_nombre7"];
				$organigrama_cargo7 	= $row_proy["organigrama_cargo7"];
				$organigrama_funciones7 = $row_proy["organigrama_funciones7"];
								
				$organigrama_nombre8 	= $row_proy["organigrama_nombre8"];
				$organigrama_cargo8 	= $row_proy["organigrama_cargo8"];
				$organigrama_funciones8 = $row_proy["organigrama_funciones8"];
				
				$crono_fechaacciones_a	= $row_proy["crono_fechaacciones_a"];
				$crono_acciones_a		= $row_proy["crono_acciones_a"];
				
				$crono_fechaacciones_b	= $row_proy["crono_fechaacciones_b"];
				$crono_acciones_b		= $row_proy["crono_acciones_b"];
				
				$crono_fechaacciones_c	= $row_proy["crono_fechaacciones_c"];
				$crono_acciones_c		= $row_proy["crono_acciones_c"];
				
				$Concepto_gasto_a= $row_proy["Concepto_gasto_a"];
				$Fuente_finan_a	= $row_proy["Fuente_finan_a"];
				$Monto_unidad_a	= $row_proy["Monto_unidad_a"];
				$Porcentaje_a	= $row_proy["Porcentaje_a"];
				
				$Concepto_gasto_b= $row_proy["Concepto_gasto_b"];
				$Fuente_finan_b	= $row_proy["Fuente_finan_b"];
				$Monto_unidad_b	= $row_proy["Monto_unidad_b"];		
				$Porcentaje_b	= $row_proy["Porcentaje_b"];
				
				$Concepto_gasto_c= $row_proy["Concepto_gasto_c"];
				$Fuente_finan_c	= $row_proy["Fuente_finan_c"];
				$Monto_unidad_c	= $row_proy["Monto_unidad_c"];
				$Porcentaje_c	= $row_proy["Porcentaje_c"];
				
				$Nombreforo_a		= $row_proy["Nombreforo_a"];
				$Descripcionlug_a	= $row_proy["Descripcionlug_a"];
				
				$Nombreforo_b		= $row_proy["Nombreforo_b"];
				$Descripcionlug_b	= $row_proy["Descripcionlug_b"];

				$Nombreforo_c		= $row_proy["Nombreforo_c"];
				$Descripcionlug_c	= $row_proy["Descripcionlug_c"];


				$cpforo_a			= $row_proy["cpforo_a"];
				$estadoforo_a		= $row_proy["estadoforo_a"];
				$mun_alcforo_a		= $row_proy["mun_alcforo_a"];
				$coloniaforo_a		= $row_proy["coloniaforo_a"];
				$calleforo_a		= $row_proy["calleforo_a"];
				$no_extforo_a		= $row_proy["no_extforo_a"];
				$no_intforo_a		= $row_proy["no_intforo_a"];
				$cpforo_b			= $row_proy["cpforo_b"];
				$estadoforo_b		= $row_proy["estadoforo_b"];
				$mun_alcforo_b		= $row_proy["mun_alcforo_b"];
				$coloniaforo_b		= $row_proy["coloniaforo_b"];
				$calleforo_b		= $row_proy["calleforo_b"];
				$no_extforo_b		= $row_proy["no_extforo_b"];
				$no_intforo_b		= $row_proy["no_intforo_b"];
				$cpforo_c			= $row_proy["cpforo_c"];
				$estadoforo_c		= $row_proy["estadoforo_c"];
				$mun_alcforo_c		= $row_proy["mun_alcforo_c"];
				$coloniaforo_c		= $row_proy["coloniaforo_c"];
				$calleforo_c		= $row_proy["calleforo_c"];
				$no_extforo_c		= $row_proy["no_extforo_c"];
				$no_intforo_c		= $row_proy["no_intforo_c"];

				$tipo_lugar_a		= $row_proy["tipo_lugar_a"];
				$tipo_lugar_b		= $row_proy["tipo_lugar_b"];
				$tipo_lugar_c		= $row_proy["tipo_lugar_c"];
				
				$crono_fechaacciones_fin_a = $row_proy["crono_fechaacciones_fin_a"];
				$crono_fechaacciones_fin_b = $row_proy["crono_fechaacciones_fin_b"];
				$crono_fechaacciones_fin_c = $row_proy["crono_fechaacciones_fin_c"];
				
				$estrategias_medios_otros= $row_proy["estrategias_medios_otros"];
				
				$suma_invalida = $row_proy["suma_invalida"];
				$suma_porinvalida = $row_proy["suma_porinvalida"];
			}
			// INICIO PESTAÑA 'Proyecto 1er'
			
			
			mysql_select_db($database_automaa, $automaa);
			$query="SELECT * FROM `catalogo_concepto_gastos`";
			$result = mysql_query($query);
				if($result)
					$combobit="";
						while($renglon = mysql_fetch_row($result))
						{	
					   		  $valor=$renglon[0];
							  $imp_texto=$renglon[1];
							  $combobit .= "<option value=".$valor.">".$imp_texto."</option>\n";
						}
				
?>
  <html>
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
      <script type="text/javascript" src="js/agregar_mas_opciones.js"></script>
	  <script type="text/javascript" src="js/imprimir_mismo_valor_en_diferentes_lugares.js"></script>
      <script src="https://code.jquery.com/jquery-1.0.4.js"></script>
	  <script type="text/javascript" src="js/Validacion_solicitud.js"></script>
	  <script type="text/javascript" src="js/Validacion_email.js"></script>
	  <script type="text/javascript" src="js/Validacion_email2.js"></script>
      <script type="text/javascript" src="js/calcula_informacion_financiera_v2.js"></script>
      <script type="text/javascript" src="js/evita_comas.js"></script>
      <script type="text/javascript" src="js/formato_montos.js"></script>
      <script type="text/javascript" src="js/lugares_foros_medios.js"></script>

      <script>
	  function soloNumeros(e) 
		{ 
		var key = window.Event ? e.which : e.keyCode 
		return ((key >= 48 && key <= 57) || (key==8)) 
		}
      </script>
      
 
		<style>
			.segunampo{
			}
			.proyectocampo{
			}
			.calc_poblacion{
			}
			.checkcampo{
			}
			.checar_disc{
			}
			.obten_porcentaje{
			}
			.proyectocampo_varios_presupuesto{
			}
			.cat_categoria{
			}
			.validafecha{
			}
			.guardar_campostext{
			}
		</style>
		
		<style type="text/css">
			/*INICIO CODIGO PARA ADJUNTAR */
			.messages{
				float: left;
				font-family: sans-serif;
				display: none;
			}
			.info{
				padding: 10px;
				border-radius: 10px;
				background: orange;
				color: #fff;
				font-size: 18px;
				text-align: center;
			}
			.before{
				padding: 10px;
				border-radius: 10px;
				background: blue;
				color: #fff;
				font-size: 18px;
				text-align: center;
			}
			.success{
				padding: 10px;
				border-radius: 10px;
				background: green;
				color: #fff;
				font-size: 18px;
				text-align: center;
			}
			.error{
				padding: 10px;
				border-radius: 10px;
				background: red;
				color: #fff;
				font-size: 18px;
				text-align: center;
			}
			/*FIN CODIGO PARA ADJUNTAR */
		</style>
	</head>
<body>
    <main role="main">

     <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <ol class="breadcrumb">
              <li><a href="#"><i class="icon icon-home"></i></a></li>
              <li><a href="login_op.php">Inicio</a></li>
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
            <h1>Convocatoria PROFEST 2020<?php //print_r($_SESSION); ?></h1>
          </div>
        </div>

        <div class="alert alert-warning"><div id="countdown"></div></div>
          

<div class="row"></div>
 <a href="#" class="scroll"></a>
        
<!-- *********************PRIMERA PARTE********************* -->
        <!-- Ventana emergente -->
        <?php //div class="alert alert-warning"><div id="countdown"></div></div>  ---alerta para indicar que la convocatoria a cerrado?>
        
        <div class="row" id="rowError" name="rowError" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar los campos obligatorios.</div>
            </div>
        </div>
        
        <div class="row" id="rowErrordisciplina" name="rowErrordisciplina" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar la disciplina.</div>
            </div>
        </div>
        
        <div class="row" id="errperiodo_realizacion" name="errperiodo_realizacion" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> El periodo de realización del proyecto deberá encontrarse entre el 06 de abril y el 15 de diciembre del 2020.</div>
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

		<div class="row" id="rowError_poblacion" name="rowError_poblacion" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verificar los datos del inciso i) Población objetivo del festival.</div>
            </div>
        </div>
        
        <div class="row" id="rowError_cronograma" name="rowError_cronograma" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verificar las fechas del inciso k) Cronograma de acciones para la ejecución del festival.</div>
            </div>
        </div>

        <div class="row" id="rowError_estra_difusion" name="rowError_estra_difusion" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verificar los datos del inciso p) Estrategias de difusión del festival.</div>
            </div>
        </div>
        
        <?php //$abre_tab = $_GET['abre_tab']; ?>
        <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li <?php //if(empty($abre_tab)){?> class="active"<?php //} ?>><a data-toggle="tab" href="#tab-01">Solicitud</a></li>
			  <li><a data-toggle="tab" href="#tab-07">Metas numéricas</a></li><!-- Solicitud -->
              <li><a data-toggle="tab" href="#tab-02">Proyecto</a></li><!-- Proyecto -->
              <li <?php /*if($abre_tab==1){?> class="active"<?php }*/ ?>><a data-toggle="tab" href="#tab-03">Cronograma de acciones</a></li><!-- Proyecto -->
              <li><a data-toggle="tab" href="#tab-04">Lugares de realización</a></li><!-- Proyecto -->
              <?php /*li><a data-toggle="tab" href="#tab-05">Presupuesto</a></li><!-- Proyecto ---*/?>
            </ul>

            <!-- INICIO PESTAÑAS -->
            <div class="tab-content"> 
			<!-- INICIO PESTAÑA "Solicitud" -->
              <div class="tab-pane <?php /*if(empty($abre_tab)){?>active<?php } */ ?>active" id="tab-01">
                 <!-- presupuesto_proyecto.php , esta página es a la que se iba de presupuesto -->	
                 <!-- guardar_solicitud.ph , esta página es a la que se iba hacer por etapas y solo adjuntarian archivos -->	
				     <form METHOD="POST" id="apInf" name="apInf" action="presupuesto_proyecto.php">
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
                        <label> Nombre del festival<samp id="errnombre_festivalAs" name="errnombre_festivalAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="El nombre que se registre, en caso de ser aprobado, será con el que se realizarán todas las actividades sin posibilidad de cambio. Utilizar may&uacute;sculas y min&uacute;sculas, incluir n&uacute;mero de emisión actual, y no cambiar nombre en caso de existir ediciones anteriores."></span></label><input type="text" id="nombre_festival" name="nombre_festival" class="form-control segunampo" value="<?=$nombre_festival?>" placeholder="Ingresa el nombre del festival" maxlength="96"><small id="errnombre_festival" name="errnombre_festival" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
				
                <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Número de ediciones previas<samp id="errnumero_ediciones_previasAs" name="errnumero_ediciones_previasAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="N&uacute;mero de ediciones previas comprobables que han mantenido el mismo nombre."></span></label><input name="numero_ediciones_previas" type="text" class="form-control segunampo" id="numero_ediciones_previas" value="<?=$numero_ediciones_previas?>" placeholder="N&uacute;mero de ediciones previas" onKeyPress="return soloNumeros(event)"><small id="errnumero_ediciones_previas" name="errnumero_ediciones_previas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <?php /*small id="rowError_num_ediciones" name="rowError_num_ediciones" class="form-text form-text-error" style="display:none">De acuerdo a la convocatoria solo podrán participar festivales de segunda emisión en adelante.</small*/?>
                    </div>
                </div>
                
                 
             </div>      
                    <?php //------------INICIO CAMBIO campo disciplina--(11032019)---------- ?>
                    
                
                    
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> Disciplina<samp id="errdisciplinaAs" name="errdisciplinaAs" class="control-label">*</samp>:</label>
                
               <div class="row">
               <div class="col-md-4">
               <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="disciplina_musica_v2" id="disciplina_musica_v2" class="checar_disc"
                    <?php if($disciplina_musica_v2==1){ ?> checked <?php } ?>> Música
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="disciplina_teatro_v2" id="disciplina_teatro_v2" class="checar_disc" 
					<?php if($disciplina_teatro_v2==1){ ?> checked <?php } ?>> Teatro
                  </label>
               </div>
               <div class="checkbox"> 
                 <label>
                    <input type="checkbox" value="1" name="disciplina_danza_v2" id="disciplina_danza_v2" class="checar_disc" 
					<?php if($disciplina_danza_v2==1){ ?> checked <?php } ?>> Danza
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="disciplina_artes_visuales_v2" id="disciplina_artes_visuales_v2" class="checar_disc" 
					<?php if($disciplina_artes_visuales_v2==1){ ?> checked <?php } ?>> Artes visuales y Diseño
                  </label>
                </div>                 
               
               <div class="checkbox">  
                 <label>
                    <input type="checkbox" value="1" name="disciplina_gastronomia_v2" id="disciplina_gastronomia_v2" class="checar_disc" 
					<?php if($disciplina_gastronomia_v2==1){ ?> checked <?php } ?>> Gastronomia
                  </label>
               </div>
               
               <?php /* respaldo_17092019
			   <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="disciplina_musica" id="disciplina_musica" class="checar_disc"
                    <?php if($disciplina_musica==1){ ?> checked <?php } ?>> Artes escénicas
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="disciplina_teatro" id="disciplina_teatro" class="checar_disc" 
					<?php if($disciplina_teatro==1){ ?> checked <?php } ?>> Artes Visuales
                  </label>
               </div>
               <div class="checkbox"> 
                 <label>
                    <input type="checkbox" value="1" name="disciplina_danza" id="disciplina_danza" class="checar_disc" 
					<?php if($disciplina_danza==1){ ?> checked <?php } ?>> Cinematografía
                  </label>
               </div>
               <div class="checkbox">  
                  <label>
                    <input type="checkbox" value="1" name="disciplina_gastronomia" id="disciplina_gastronomia" class="checar_disc" 
					<?php if($disciplina_gastronomia==1){ ?> checked <?php } ?>> Gastronomía
                  </label>
                </div>                 
                */ ?>
               <div class="checkbox">  
                 <label>
                    <input type="checkbox" value="1" name="disciplina_literatura_v2" id="disciplina_literatura_v2" class="checar_disc" 
					<?php if($disciplina_literatura_v2==1){ ?> checked <?php } ?>> Literatura
                  </label>
               </div>
			  
               
              </div>
			  </div> 
			  
			   <div class="row">    
               <div class="col-md-4">
			  		<small id="errmuestra_disc_error" name="errmuestra_disc_error" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
				</div>
				</div>
            </div>
           </div>
          </div>
                    <?php //------------FIN CAMBIO campo disciplina--(11032019)----------?>
              <div class="row">
               <!-- Campo Nombre de la o el Titular -->
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label> Objetivo general del festival<samp id="errobjetivo_generalAs" name="errobjetivo_generalAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar la finalidad del proyecto de forma clara y concisa: ¿Qué?, ¿Como?, ¿Dónde?, ¿Para qué?. Máximo 300 caracteres."></span></label> <small>Máximo 400 caracteres</small>
                        <textarea id="objetivo_general" name="objetivo_general" class="form-control objetivo_gen_texto" placeholder="Ingresa el objetivo general" rows="10" maxlength="400"><?=$objetivo_general?></textarea>
                        <small id="errobjetivo_general" name="errobjetivo_general" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
            </div>
            
             <div class="row">  
        <div class="col-md-4">
                <div class="form-group">
                    <label>Página Web del festival:</label><input type="text" id="pagina_web_festival" name="pagina_web_festival" class="form-control segunampo" value="<?=$pagina_web_festival?>" placeholder="Ingresa la página web">
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label>Facebook del festival:</label><input type="text" id="facebook_festival" name="facebook_festival" class="form-control segunampo" value="<?=$facebook_festival?>" placeholder="Ingresa el facebook del festival">
                </div>
            </div>
            
             <div class="col-md-4">
                <div class="form-group">
                    <label>Twitter del festival:</label><input type="text" id="twitter_festival" name="twitter_festival" class="form-control segunampo" value="<?=$twitter_festival?>" placeholder="Ingresa el twitter del festival">
                </div>
            </div>
            
            </div>
      

         <div class="row">   
            <div class="col-md-4">
                    <div class="form-group"> 
                    <label> Alcance de la programación<samp id="erralcance_programacionAs" name="erralcance_programacionAs" class="control-label">*</samp>:</label>
                    <select id="alcance_programacion" name="alcance_programacion" class="form-control segunampo">
                    	<option value="" <?php if(empty($alcance_programacion)){ ?> selected="selected"<?php } ?>>Selecciona una opción</option>
                        <option value="Local" <?php if($alcance_programacion=="Local"){ ?> selected="selected" <?php } ?>>Local</option>
                        <option value="Regional" <?php if($alcance_programacion=="Regional"){ ?> selected="selected" <?php } ?>>Regional</option>
                        <option value="Estatal" <?php if($alcance_programacion=="Estatal"){ ?> selected="selected" <?php } ?>>Estatal</option>
                        <option value="Nacional" <?php if($alcance_programacion=="Nacional"){ ?> selected="selected" <?php } ?>>Nacional</option>
                    </select>
                 <small id="erralcance_programacion" name="erralcance_programacion" class="form-text form-text-error" style="display:none;">Este campo es obligatorio</small>
                    </div>
                </div>
           </div>
           
           
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Periodo de realización de festival</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group datepicker-group">
                    <label class="control-label" for="calendar">Fecha de inicio<samp id="errperiodo_realizacion_fecha_inicioAs" name="errperiodo_realizacion_fecha_inicioAs" class="control-label">*</samp>:</label>
                    <input name="periodo_realizacion_fecha_inicio" type="text" class="form-control segunampo" id="periodo_realizacion_fecha_inicio" value="<?=$periodo_realizacion_fecha_inicio?>" placeholder="Ingresa la fecha de inicio">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <small id="errperiodo_realizacion_fecha_inicio" name="errperiodo_realizacion_fecha_inicio" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           <div class="col-md-4">
                  <div class="form-group datepicker-group">
                    <label class="control-label" for="calendar">Fecha de término<samp id="errperiodo_realizacion_fecha_terminoAs" name="errperiodo_realizacion_fecha_terminoAs" class="control-label">*</samp>:</label>
                    <input name="periodo_realizacion_fecha_termino" type="text" class="form-control segunampo" id="periodo_realizacion_fecha_termino" value="<?=$periodo_realizacion_fecha_termino?>" placeholder="Ingresa la fecha de término">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <small id="errperiodo_realizacion_fecha_termino" name="errperiodo_realizacion_fecha_termino" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
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
                       <label> Categoría en la que participa<samp id="errinfo_financiera_categoriaAs" name="errinfo_financiera_categoriaAs" class="control-label">*</samp>:</label>
                        <?php /*select id="info_financiera_categoria" name="info_financiera_categoria" class="form-control cat_categoria">
                            <option value="" selected="selected">Selecciona una opción</option>
                            <option value="3" <?php if($Info_financiera_categoria=="3"){ ?> selected="selected" <?php } ?>>De primera a tercera edición hasta 500,000 pesos M.N., con una coinversión mínima del 10%</option>
                            <option value="5" <?php if($Info_financiera_categoria=="5"){ ?> selected="selected" <?php } ?>>De cuarta a sexta edición hasta 5 millones de pesos M.N., con una coinversión mínima del 40%</option>
                            <option value="10" <?php if($Info_financiera_categoria=="10"){ ?> selected="selected" <?php } ?>>De la séptima edición en adelante hasta 10 millones de pesos M.N., con una coinversión mínima del 50%</option>
                    	</select*/?>
                        
                        <select id="info_financiera_categoria" name="info_financiera_categoria" class="form-control cat_categoria">
                            <option value="" selected="selected">Selecciona una opción</option>
                            <option value="A" <?php if($Info_financiera_categoria=="A"){ ?> selected="selected" <?php } ?>>A) Festivales de segunda y tercera emisión, hasta $500,000.00 (quinientos mil pesos 00/100 M.N.).</option>
                            <option value="B" <?php if($Info_financiera_categoria=="B"){ ?> selected="selected" <?php } ?>>B) Festivales de cuarta a séptima emisión, hasta $700,000.00 (setecientos mil pesos 00/100 M.N.).</option>
                            <option value="C" <?php if($Info_financiera_categoria=="C"){ ?> selected="selected" <?php } ?>>C) Festivales de octava a decimoprimera emisión, hasta $1,250,000.00 (un millón doscientos cincuenta mil pesos 00/100 M.N.).</option>
                            <option value="D" <?php if($Info_financiera_categoria=="D"){ ?> selected="selected" <?php } ?>>D) Festivales de decimosegunda emisión en adelante, hasta $2,500,000.00 (dos millones quinientos mil pesos 00/100 M.N.).</option>
                    	</select>
                     <small id="errinfo_financiera_categoria" name="errinfo_financiera_categoria" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
			</div>
            
            
           <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label>Costo total de realización del festival<samp id="errInfor_finan_costo_montoAs" name="errInfor_finan_costo_montoAs" class="control-label">*</samp>:</label>
                  <input class="form-control" id="Infor_finan_costo_monto" name="Infor_finan_costo_monto" placeholder="Costo total de realización del festival" type="text" onblur="suma_cantidades()" onKeyPress="return evita_comas(event)" value="<?=$Infor_finan_costo_monto?>">
                  <small id="errInfor_finan_costo_monto" name="errInfor_finan_costo_monto" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                 </div>
            </div>
        </div>
			
			<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                        <label>Apoyo financiero solicitado a la Secretaría de Cultura<samp id="errInfor_finan_apoyo_montoAs" name="errInfor_finan_apoyo_montoAs" class="control-label">*</samp>:</label>
                        <input class="form-control" type="text" id="Infor_finan_apoyo_monto" name="Infor_finan_apoyo_monto" placeholder="Apoyo financiero solicitado a la SC" onblur="suma_cantidades();"  onKeyPress="return evita_comas(event)" value="<?=$Infor_finan_apoyo_monto?>"><small id="errCosto_mayor3" name="errCosto_mayor3" class="form-text form-text-error" style="display:none">El monto capturado no coincide con la categoría seleccionada</small>
                        <small id="errInfor_finan_apoyo_monto" name="errInfor_finan_apoyo_monto" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
        </div>
        
        <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
           <label>% de apoyo financiero sobre el costo total del Proyecto<samp id="errInfor_finan_apoyo_costo_totalAs" name="errInfor_finan_apoyo_costo_totalAs" class="control-label">*</samp>:</label>
                        <input type="text" id="Infor_finan_apoyo_costo_total" name="Infor_finan_apoyo_costo_total" value="<?php echo $Infor_finan_apoyo_costo_total; ?>" class="form-control" placeholder="Apoyo financiero % Costo total del proyecto" readonly>
           <small id="errInfor_finan_apoyo_costo_total" name="errInfor_finan_apoyo_costo_total" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
                </div>
        </div>
		   
		   <div class="row">
			<div class="col-md-4">
				<div class="form-group"> 
				<label> % del costo total del proyecto:</label>
			   </div>
		   </div>
		   </div>
           <div class="row">
			<div class="col-md-4">
				<div class="form-group"> 
				100%
			   </div>
		   </div>
		   </div>
            
           <div class="row">
           		<div class="col-md-4"></div>
                <div class="col-md-8">
                    <hr/>
                </div>
            </div>
         
            
           <div class="row">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
            				<a class="btn btn-primary btnNext" >Siguiente</a>
                        </div>
                    </div>
             </div>
           </div>
           
            
          <!--div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <hr/>
                </div>
            </div>

        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group clearfix">	
    			     <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
    				    <div class="pull-right">
    				        <input class="btn btn-primary" type="button" value="Finalizar" id="submit1" name="submit1" onClick="tab-01" >
                            
    			        </div>
                	</div>
            	</div> 
			</div-->
        
        
      </div>
      <!-- FIN PESTAÑA "Solicitud" -->  
	  
	    <!-- INICIO PESTAÑA "Solicitud Metas numéricas" -->
             <div class="tab-pane" id="tab-07">
                             
                <div class="row">
                    <div class="col-md-8"> 
                    </div>
				</div>	
                 <div class="row">
                <div class="col-md-12"> 
                        <h3>Metas numéricas</h3>
                        <p>Anotar de manera cuantitativa las metas del festival</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                    </div>
					
		<div class="row">
        	<div class="col-md-4">
                <div class="form-group">
       			  <label>Total de público a atender<samp id="errmeta_num_publicoAs" name="errmeta_num_publicoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Considerando el público general y públicos específicos."></span></label>
        			<input type="text" id="meta_num_publico" name="meta_num_publico" class="form-control segunampo" value="<?=$meta_num_publico?>" placeholder="Ingresa el total de público a atender" onKeyPress="return soloNumeros(event)">
        			<small id="errmeta_num_publico" name="errmeta_num_publico" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        	   </div>
        	</div>
           
            
            
             <div class="col-md-4">
        			<div class="form-group">
        				<label>Número de localidades a atender<samp id="errmeta_num_municipioAs" name="errmeta_num_municipioAs" class="control-label">*</samp>:</label>
        				<input name="meta_num_municipio" type="text" class="form-control segunampo" id="meta_num_municipio" value="<?=$meta_num_municipio?>" placeholder="Ingresa n&uacute;mero de localidades a atender" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_num_municipio" name="errmeta_num_municipio" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        			</div>
        	 </div>
        </div>
        <div class="row"> 
        <div class="col-md-4">
        		<div class="form-group">
        				<label>Número de foros o medios que se utilizarán<samp id="errmeta_num_forosAs" name="errmeta_num_forosAs" class="control-label">*</samp>:</label>
        				<input type="text" id="meta_num_foros" name="meta_num_foros" class="form-control segunampo" value="<?=$meta_num_foros?>" placeholder="Ingresa n&uacute;mero de foros o medios que se utilizar&aacute;n" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_num_foros" name="errmeta_num_foros" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>             
       
        	<div class="col-md-4">
        		<div class="form-group">
        				<label>Número de presentaciones artísticas<samp id="errmeta_num_presentacionesAs" name="errmeta_num_presentacionesCAs" class="control-label">*</samp>:</label>
        				<input type="text" id="meta_num_presentaciones" name="meta_num_presentaciones" class="form-control segunampo" value="<?=$meta_num_presentaciones?>" placeholder="Ingresa n&uacute;mero de presentaciones" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_num_presentaciones" name="errmeta_num_presentaciones" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>
            
            	<div class="col-md-4">
        			<div class="form-group">
        				<label>Número de comunidades indígenas a atender<samp id="errmeta_numero_grupos_ind_atenderAs" name="errmeta_numero_grupos_ind_atenderAs" class="control-label">*</samp>:</label>
        				<input type="text" id="meta_numero_grupos_ind_atender" name="meta_numero_grupos_ind_atender" class="form-control segunampo" value="<?=$meta_numero_grupos_ind_atender?>" placeholder="Ingresa el número de comunidades indígenas a atender" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_numero_grupos_ind_atender" name="errmeta_numero_grupos_ind_atender" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
        		</div>
        	</div>
        		<?php /*div class="form-group">
        				<label>Número de artistas participantes y/o invitados especiales<samp id="errmeta_num_artistasAs" name="errmeta_num_artistasAs" class="control-label">*</samp>:</label>
        				<input type="text" id="meta_num_artistas" name="meta_num_artistas" class="form-control segunampo" value="<?=$meta_num_artistas?>" placeholder="Ingresa el n&uacute;mero de artistas participantes" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_num_artistas" name="errmeta_num_artistas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div*/?>
        	<div class="row">
  			<div class="col-md-4">
        		<div class="form-group">
        				<label>Número de grupos artísticos participantes<samp id="errmeta_cantidad_gruposAs" name="errmeta_cantidad_gruposAs" class="control-label">*</samp>:</label>
        				<input type="text" id="meta_cantidad_grupos" name="meta_cantidad_grupos" class="form-control segunampo" value="<?=$meta_cantidad_grupos?>" placeholder="Ingresa el número de grupos artísticos participantes" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_cantidad_grupos" name="errmeta_cantidad_grupos" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>
        	 </div>
        	<div class="row">
            <div class="col-md-4">
        			<div class="form-group">
        				<label>Conferencias, talleres, ponencias, clases magistrales, cursos y mesas de debate<samp id="errmeta_num_actividades_academicasAs" name="errmeta_num_actividades_academicasAs" class="control-label">*</samp>:</label>
        				<input type="text" id="meta_num_actividades_academicas" name="meta_num_actividades_academicas" class="form-control segunampo" value="<?=$meta_num_actividades_academicas?>" placeholder="Ingresa el número conferencias, talleres, ponencias, clases magistrales, cursos y mesas de debate" onKeyPress="return soloNumeros(event)">
        				<small id="errmeta_num_actividades_academicas" name="errmeta_num_actividades_academicas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
           </div>
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
                
                 <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <small id="errCALCULO" name="errCALCULO" class="form-text form-text-error" style="display:none">Verifica los montos ya que no corresponden</small>
                            </div>
                        </div>
                 </div>
                        
                
                <div id="total_cont_all3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="totalcont3">
                            <?php require_once('catalogo_metas_numericas.php'); ?>
							<!--<div id="totalcont">    
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="para_Trabajar3">
                            <!--Para trabajar-->
                        </div>
                    </div>
                    
                </div>
				
               
               
           <div class="row">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
                            <a class="btn btn-primary btnPrevious" >Anterior</a>
                            <a class="btn btn-primary btnNext" >Siguiente</a>
                        </div>
                    </div>
              </div>
           </div>
                    
                  </div>
                </div>
              </div>
		   
		   
		</div>
	    <!-- FIN Pestaña "Solicitud Metas numéricas"-->          
  
              <!-- INICIO PESTAÑA "Proyecto" -->
              <div class="tab-pane" id="tab-02">
                             
                <div class="row">
                    <div class="col-md-8"> 
                        <h3>Datos del responsable operativo del festival</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
           
                <div class="row">    
               <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Nombre(s)<samp id="errresponsable_op_nombreAs" name="errresponsable_op_nombreAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="responsable_op_nombre" name="responsable_op_nombre" value="<?=$responsable_op_nombre?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
                        <small id="errresponsable_op_nombre" name="errresponsable_op_nombre" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Primer apellido<samp id="errprimer_apellido_opAs" name="errprimer_apellido_opAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="primer_apellido_op" name="primer_apellido_op" value="<?=$primer_apellido_op?>" class="form-control proyectocampo" placeholder="Ingresa el primer apellido">
                        <small id="errprimer_apellido_op" name="errprimer_apellido_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Segundo apellido:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="segundo_apellido_op" name="segundo_apellido_op" value="<?=$segundo_apellido_op?>" class="form-control proyectocampo" placeholder="Ingresa el segundo apellido">
                        </div>
                </div>
                
                </div>
       
        <!-- Tercera fila -->
        <div class="row">  
            <!-- Numero de telefono con lada -->
           <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Cargo<samp id="errcargo_opAs" name="errcargo_opAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el responsable operativo del festival"></span></label>
                        <input type="text" id="cargo_op" name="cargo_op" value="<?=$cargo_op?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
                        <small id="errcargo_op" name="errcargo_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <!-- Lada -->
                  <?php /*div class="form-control-lada">
                    <label for="lada">Lada<samp id="errlada_opAs" name="errlada_opAs" class="control-label">*</samp>:</label>
                    <input type="text" id="lada_op" name="lada_op" value="<?=$lada_op?>" class="form-control proyectocampo" placeholder="Lada">   
                    <small id="errlada_op" name="errlada_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div*/?>
                  <!-- Telefono -->
	                    <label>Teléfono fijo (10 dígitos)<samp id="errtelefono_fijo_opAs" name="errtelefono_fijo_opAs" class="control-label">*</samp>:</label>
	                    <input type="text" id="telefono_fijo_op" name="telefono_fijo_op" value="<?=$telefono_fijo_op?>" class="form-control proyectocampo" placeholder="Ingresa el teléfono fijo" maxlength="10">
	                    <small id="errtelefono_fijo_op" name="errtelefono_fijo_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
               <!-- Extensión -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Extensión:</label><input type="text" id="extension_op" name="extension_op" value="<?=$extension_op?>" class="form-control proyectocampo" placeholder="Ingresa la extensión">
                </div>
            </div>
            </div>
             <div class="row">  
          <div class="col-md-4">
                <div class="form-group">
                    <label>Teléfono móvil:</label><input type="text" id="telefono_movil_op" name="telefono_movil_op" value="<?=$telefono_movil_op?>" class="form-control proyectocampo" placeholder="Ingresa el teléfono móvil" maxlength="10">
                </div>
            </div>
          	   <!-- Correo electronico -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Correo electrónico<samp id="errCorreo_electronico_opAs" name="errCorreo_electronico_opAs" class="control-label">*</samp>:</label><input type="text" id="Correo_electronico_op" name="Correo_electronico_op" value="<?=$Correo_electronico_op?>" class="form-control proyectocampo" placeholder="ejemplo@dominio.com" onBlur="validarEmail(this.id);">
                    <small id="errCorreo_electronico_op" name="errCorreo_electronico_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    <small id="emailOK"></small>
                </div>
            </div>
            </div>
            
            <div class="row">
                    <div class="col-md-8"> 
                        <h3>Datos del responsable administrativo del festival</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
            
                <div class="row">    
               <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Nombre(s)<samp id="errresponsable_adm_nombreAs" name="errresponsable_adm_nombreAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el responsable administrativo del festival"></span></label>
                        <input type="text" id="responsable_adm_nombre" name="responsable_adm_nombre" value="<?=$responsable_adm_nombre?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
                        <small id="errresponsable_adm_nombre" name="errresponsable_adm_nombre" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Primer apellido<samp id="errprimer_apellido_admAs" name="errprimer_apellido_admAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el responsable administrativo del festival"></span></label>
                        <input type="text" id="primer_apellido_adm" name="primer_apellido_adm" value="<?=$primer_apellido_adm?>" class="form-control proyectocampo" placeholder="Ingresa el primer apellido">
                        <small id="errprimer_apellido_adm" name="errprimer_apellido_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Segundo apellido:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el responsable administrativo del festival"></span></label>
                        <input type="text" id="segundo_apellido_adm" name="segundo_apellido_adm" value="<?=$segundo_apellido_adm?>" class="form-control proyectocampo" placeholder="Ingresa el segundo apellido">
                    </div>
                </div>
                
                </div>
       
        <!-- Tercera fila -->
        <div class="row">  
            <!-- Numero de telefono con lada -->
           <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Cargo<samp id="errcargo_admAs" name="errcargo_admAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el responsable administrativo del festival"></span></label>
                        <input type="text" id="cargo_adm" name="cargo_adm" value="<?=$cargo_adm?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
                        <small id="errcargo_adm" name="errcargo_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <!-- Lada -->
                  <?php /*div class="form-control-lada">
                    <label for="lada">Lada<samp id="errlada_admAs" name="errlada_admAs" class="control-label">*</samp>:</label>
                    <input type="text" id="lada_adm" name="lada_adm" value="<?=$lada_adm?>" class="form-control proyectocampo" placeholder="Lada">   
                    <small id="errlada_adm" name="errlada_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div*/?>
                  <!-- Telefono -->
                    <label>Teléfono fijo (10 dígitos)<samp id="errtelefono_fijo_admAs" name="errtelefono_fijo_admAs" class="control-label">*</samp>:</label>
                    <input type="text" id="telefono_fijo_adm" name="telefono_fijo_adm" value="<?=$telefono_fijo_adm?>" class="form-control proyectocampo" placeholder="Teléfono fijo" maxlength="10">
                    <small id="errtelefono_fijo_adm" name="errtelefono_fijo_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
               <!-- Extensión -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Extensión:</label><input type="text" id="extension_adm" name="extension_adm" value="<?=$extension_adm?>" class="form-control proyectocampo" placeholder="Ingresa la extensión">
                </div>
            </div>
            </div>
             <div class="row">  
          <div class="col-md-4">
                <div class="form-group">
                    <label>Teléfono móvil:</label><input type="text" id="telefono_movil_adm" name="telefono_movil_adm" value="<?=$telefono_movil_adm?>" class="form-control proyectocampo" placeholder="Teléfono móvil">
                </div>
            </div>
          	   <!-- Correo electronico -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Correo electrónico<samp id="errcorreo_electronico_admAs" name="errcorreo_electronico_admAs" class="control-label">*</samp>:</label>
                    <input type="text" id="correo_electronico_adm" name="correo_electronico_adm" class="form-control proyectocampo" value="<?=$correo_electronico_adm?>" placeholder="ejemplo@dominio.com" onBlur="validarEmail2(this.id);">
                    <small id="errcorreo_electronico_adm" name="errcorreo_electronico_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    <small id="emailOK2"></small>
                </div>
            </div>
        </div>
               <div class="row">
                    <div class="col-md-8"> 
                        <h3>Desarrollo del proyecto</h3>
                        <p>Se recomienda tomar en cuenta los criterios de selección del apartado <strong>Elegibilidad</strong> que se encuentran en la Convocatoria</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
             <!-- INICIO a) Antecedentes del festival -->    
             <div class="row">  
               <div class="col-md-12">
                    <div class="form-group">
                        <label> a) Antecedentes del festival<samp id="errdesarrollo_proyecto_antecedenteAs" name="errdesarrollo_proyecto_antecedenteAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Reseña el contexto que dio origen a la creación del festival y los logros más relevantes, así como relacionar las ediciones y en caso de suspensión(es) explicar motivos. Máximo 2,500 caracteres"></span></label>
                        <small>Máximo 2,500 caracteres</small>
                        <textarea id="desarrollo_proyecto_antecedente" name="desarrollo_proyecto_antecedente" class="form-control guardar_campostext" placeholder="Ingresa los antecedentes del festival" rows="10" maxlength="2500"><?=$desarrollo_proyecto_antecedente?></textarea>
                        <small id="errdesarrollo_proyecto_antecedente" name="errdesarrollo_proyecto_antecedente" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
               </div>
             <!-- FIN a) Antecedentes del festival --> 
                <!-- INICIO b) Diagnóstico del festival -->
              <div class="row">    
               <div class="col-md-12">
                    <div class="form-group"> 
                        <label> b) Diagnóstico del festival<samp id="errdesarrollo_proyecto_diagnosticoAs" name="errdesarrollo_proyecto_diagnosticoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Presentar el análisis de la situación del entorno social que atenderá el Festival, por ejemplo, la brecha de desigualdad entre hombres y mujeres; las características y tipo de población, el consumo cultural de su población, la infraestructura cultural, posibilidad de que las actividades artísticas atiendan la problemática social de violencia, drogadicción, delincuencia o discriminación, recursos de formación artística en su comunidad, etc."></span></label> <small>Máximo 2,500 caracteres</small>
                        <textarea id="desarrollo_proyecto_diagnostico" name="desarrollo_proyecto_diagnostico" class="form-control guardar_campostext" placeholder="Ingresa el diagnóstico del festival" rows="10" maxlength="25000"><?=$desarrollo_proyecto_diagnostico?></textarea>
                        <small id="errdesarrollo_proyecto_diagnostico" name="errdesarrollo_proyecto_diagnostico" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
             </div>
          	</div>
             <!-- INICIO b) Diagnóstico del festival -->   
                
             <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> c) Justificación del festival<samp id="errdesarrollo_proyecto_justificacionAs" name="errdesarrollo_proyecto_justificacionAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Exponer las razones que sustentan la realización del Festival y sus actividades, con base en el diagnóstico."></span></label> <small>Máximo 2,500 caracteres</small>
                        <textarea id="desarrollo_proyecto_justificacion" name="desarrollo_proyecto_justificacion" class="form-control guardar_campostext" placeholder="Ingresa la justificación del festival" rows="10" maxlength="2500"><?=$desarrollo_proyecto_justificacion?></textarea>
                        <small id="errdesarrollo_proyecto_justificacion" name="errdesarrollo_proyecto_justificacion" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> d) Descripción del proyecto<samp id="errdesarrollo_proyecto_descripcionAs" name="errdesarrollo_proyecto_descripcionAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar de manera detallada y ordenada, las características del Festival y acciones que se llevarán a cabo en la realización."></span></label> <small>Máximo 2,500 caracteres</small>
                        <textarea name="desarrollo_proyecto_descripcion" id="desarrollo_proyecto_descripcion" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la Descripción del proyecto" maxlength="2500"><?=$desarrollo_proyecto_descripcion?></textarea>
                        <small id="errdesarrollo_proyecto_descripcion" name="errdesarrollo_proyecto_descripcion" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              <?php /*div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> e) Objetivo general del festival:</label>
                        <textarea id="Objetivo_genereral_proyecto" name="Objetivo_genereral_proyecto" class="form-control proyectocampo" placeholder="Ingresa el objetivo general del festival" rows="3" readonly>"Este campo ha sido capturado en la anterior pestaña, gracias"</textarea>
                  </div>
                </div>
              </div*/?>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> f) Objetivos específicos del festival<samp id="errdesarrollo_proyecto_objetivos_especificosAs" name="errdesarrollo_proyecto_objetivos_especificosAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar las acciones concretas y detalladas que se alcanzarán con el proyecto. Deben ser alcanzables y congruentes con el objetivo general."></span></label> <small>Máximo 2,500 caracteres</small>
                        <textarea id="desarrollo_proyecto_objetivos_especificos" name="desarrollo_proyecto_objetivos_especificos" class="form-control guardar_campostext" placeholder="Ingresa los objetivos específicos del festival" rows="10" maxlength="2500"><?=$desarrollo_proyecto_objetivos_especificos?></textarea>
                        <small id="errdesarrollo_proyecto_objetivos_especificos" name="errdesarrollo_proyecto_objetivos_especificos" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
              
              <?php /*div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> g) Metas cuantitativas del festival:</label>
                        <textarea id="desarrollo_proyecto_meta_cuantitativa" name="desarrollo_proyecto_meta_cuantitativa" class="form-control proyectocampo" placeholder="Ingresa las metas cuantitativas del festival (incluir el n&uacute;mero de días que dura el festival)" rows="3" readonly>"Este campo ha sido capturado en la anterior pestaña, gracias"</textarea>
                  </div>
                </div>
              </div*/?>
              
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> h) Descripción del impacto sociocultural del proyecto<samp id="errdesarrollo_proyecto_descripcion_impactoAs" name="errdesarrollo_proyecto_descripcion_impactoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Explicar los efectos que tendrá el proyecto en la comunidad de realización, así como en el sector artístico. Será necesario atender a los criterios de Evaluación y Selección de la Convocatoria."></span></label> <small>Máximo 2,500 caracteres</small>
                        <textarea id="desarrollo_proyecto_descripcion_impacto" name="desarrollo_proyecto_descripcion_impacto" class="form-control guardar_campostext" placeholder="Ingresa la descripción del impacto socio-cultural del proyecto" rows="10" maxlength="2500"><?=$desarrollo_proyecto_descripcion_impacto?></textarea>
                        <small id="errdesarrollo_proyecto_descripcion_impacto" name="errdesarrollo_proyecto_descripcion_impacto" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
                        
          
          
          <!-- INICIO i)Problación objetivo del festival-->
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">i) Población objetivo del festival</label></div>
           </div>
           
                     
           <div class="row">
           	<div class="col-md-4"><label class="control-label" for="calendar">Género</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label>N&uacute;mero de hombres<samp id="errpoblacion_genero_hombreAs" name="errpoblacion_genero_hombreAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_genero_hombre" type="text" class="form-control calc_poblacion" id="poblacion_genero_hombre" value="<?=$poblacion_genero_hombre?>" placeholder="Ingresa el n&uacute;mero de hombres" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_genero_hombre" name="errpoblacion_genero_hombre" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    
                    <small id="errpoblacion_suma" name="errpoblacion_suma" class="form-text form-text-error" style="display:none">El número ingresado de hombres y mujeres debe coincidir con la meta de cantidad de público a beneficiar </small>

 					<small id="errpoblacion_Sobrepasa_suma" name="errpoblacion_Sobrepasa_suma" class="form-text form-text-error" style="display:none">El número ingresado de hombres y mujeres no debe rebasar la meta de total de público a atender</small>

                  </div>
            </div>
           <div class="col-md-4">
                  <div class="form-group">
                    <label>N&uacute;mero de mujeres<samp id="errpoblacion_genero_mujerAs" name="errpoblacion_genero_mujerAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_genero_mujer" type="text" class="form-control calc_poblacion" id="poblacion_genero_mujer" value="<?=$poblacion_genero_mujer?>" placeholder="Ingresa el n&uacute;mero de mujeres" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_genero_mujer" name="errpoblacion_genero_mujer" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           
           
           
            <div class="row">
           	<div class="col-md-4"><label>Edad<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="indicar cantidada por rango de edad."></span></label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label" for="calendar">0-12<samp id="errpoblacion_edad_0_12As" name="errpoblacion_edad_0_12As" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_0_12" type="text" class="form-control calc_poblacion" id="poblacion_edad_0_12" value="<?=$poblacion_edad_0_12?>" placeholder="Ingresa el n&uacute;mero de 0-12 de edad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_edad_0_12" name="errpoblacion_edad_0_12" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
           	<div class="col-md-4">
                  <div class="form-group">
                    <label>13-17<samp id="errpoblacion_edad_13_17As" name="errpoblacion_edad_13_17As" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_13_17" type="text" class="form-control calc_poblacion" id="poblacion_edad_13_17" value="<?=$poblacion_edad_13_17?>" placeholder="Ingresa el n&uacute;mero de 13-17 de edad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_edad_13_17" name="errpoblacion_edad_13_17" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
            </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>18-29<samp id="errpoblacion_edad_18_29As" name="errpoblacion_edad_18_29As" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_18_29" type="text" class="form-control calc_poblacion" id="poblacion_edad_18_29" value="<?=$poblacion_edad_18_29?>" placeholder="Ingresa el n&uacute;mero de 18-29 de edad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_edad_18_29" name="errpoblacion_edad_18_29" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>30-59<samp id="errpoblacion_edad_30_59As" name="errpoblacion_edad_30_59As" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_30_59" type="text" class="form-control calc_poblacion" id="poblacion_edad_30_59" value="<?=$poblacion_edad_30_59?>" placeholder="Ingresa el n&uacute;mero de 30-59 de edad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_edad_30_59" name="errpoblacion_edad_30_59" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>60 en adelante<samp id="errpoblacion_edad_60As" name="errpoblacion_edad_60As" class="control-label">*</samp>:</label>
                    <input name="poblacion_edad_60" type="text" class="form-control calc_poblacion" id="poblacion_edad_60" value="<?=$poblacion_edad_60?>" placeholder="Ingresa el n&uacute;mero de 60 en adelante de edad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_edad_60" name="errpoblacion_edad_60" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    
                    <small id="errpoblacion_edad" name="errpoblacion_edad" class="form-text form-text-error" style="display:none">Debes ingresar el mismo número de personas (hombre - mujer) </small>

                  </div>
            </div>
           </div>
           

           
           <div class="row">
           	<div class="col-md-4"><label>Nivel académico</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label>Sin escolaridad<samp id="errpoblacion_nivel_sin_escolaridadAs" name="errpoblacion_nivel_sin_escolaridadAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_sin_escolaridad" type="text" class="form-control calc_poblacion" id="poblacion_nivel_sin_escolaridad" value="<?=$poblacion_nivel_sin_escolaridad?>" placeholder="Ingresa el n&uacute;mero sin escolaridad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_nivel_sin_escolaridad" name="errpoblacion_nivel_sin_escolaridad" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
           	<div class="col-md-4">
                  <div class="form-group">
                    <label>Educación Básica<samp id="errpoblacion_nivel_educ_basicaAs" name="errpoblacion_nivel_educ_basicaAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_educ_basica" type="text" class="form-control calc_poblacion" id="poblacion_nivel_educ_basica" value="<?=$poblacion_nivel_educ_basica?>" placeholder="Ingresa el n&uacute;mero de educación básica" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_nivel_educ_basica" name="errpoblacion_nivel_educ_basica" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
            </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>Educación Media<samp id="errpoblacion_nivel_educ_mediaAs" name="errpoblacion_nivel_educ_mediaAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_educ_media" type="text" class="form-control calc_poblacion" id="poblacion_nivel_educ_media" value="<?=$poblacion_nivel_educ_media?>" placeholder="Ingresa el n&uacute;mero de educación media" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_nivel_educ_media" name="errpoblacion_nivel_educ_media" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>Educación Superior<samp id="errpoblacion_nivel_educ_superiorAs" name="errpoblacion_nivel_educ_superiorAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_nivel_educ_superior" type="text" class="form-control calc_poblacion" id="poblacion_nivel_educ_superior" value="<?=$poblacion_nivel_educ_superior?>" placeholder="Ingresa el n&uacute;mero de educación superior" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_nivel_educ_superior" name="errpoblacion_nivel_educ_superior" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  
                    <small id="errpoblacion_nivel" name="errpoblacion_nivel" class="form-text form-text-error" style="display:none">Debes ingresar el mismo número de personas (hombre - mujer) </small>

                  </div>
            </div>
           </div>
           
           <div class="row">
           	<div class="col-md-4"><label>Específicos</label></div>
           </div>
           
           <div class="row">
           	<div class="col-md-4">
                  <div class="form-group">
                    <label>Reclusión<samp id="errpoblacion_especific_reclusionAs" name="errpoblacion_especific_reclusionAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_reclusion" type="text" class="form-control proyectocampo" id="poblacion_especific_reclusion" value="<?=$poblacion_especific_reclusion?>" placeholder="Ingresa el n&uacute;mero de reclusión" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_especific_reclusion" name="errpoblacion_especific_reclusion" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row"> 
           	<div class="col-md-4">
                  <div class="form-group">
                    <label>Migrantes<samp id="errpoblacion_especific_migrantesAs" name="errpoblacion_especific_migrantesAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_migrantes" type="text" class="form-control proyectocampo" id="poblacion_especific_migrantes" value="<?=$poblacion_especific_migrantes?>" placeholder="Ingresa el n&uacute;mero de migrantes" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_especific_migrantes" name="errpoblacion_especific_migrantes" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
            </div>
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>Indígenas<samp id="errpoblacion_especific_indigenasAs" name="errpoblacion_especific_indigenasAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_indigenas" type="text" class="form-control proyectocampo" id="poblacion_especific_indigenas" value="<?=$poblacion_especific_indigenas?>" placeholder="Ingresa el n&uacute;mero de indígenas" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_especific_indigenas" name="errpoblacion_especific_indigenas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>   
           <div class="row"> 
            <div class="col-md-4">
                  <div class="form-group">
                    <label>Con discapacidad<samp id="errpoblacion_especific_con_discapacidadAs" name="errpoblacion_especific_con_discapacidadAs" class="control-label">*</samp>:</label>
                    <input name="poblacion_especific_con_discapacidad" type="text" class="form-control proyectocampo" id="poblacion_especific_con_discapacidad" value="<?=$poblacion_especific_con_discapacidad?>" placeholder="Ingresa el n&uacute;mero con discapacidad" onKeyPress="return soloNumeros(event)">
                    <small id="errpoblacion_especific_con_discapacidad" name="errpoblacion_especific_con_discapacidad" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
            </div>
           </div>
           <div class="row">
        	<div class="col-md-4"> 
            	<div class="checkbox">
                    <label>
                      <input type="checkbox" name="poblacion_especific_otros" id="poblacion_especific_otros" value="1" onClick="habilitar()" class="checkcampo" <?php if($poblacion_especific_otros==1){?> checked<?php } ?>>
                      <strong>Otros</strong>
                    </label>
                </div>
           </div>
           </div>
          
           
           <div class="row">
            <div class="col-md-4"> 
        		<div class="form-group"><label>Nombre:</label>
            <input name="poblacion_especific_otro_nombre" type="text" class="form-control proyectocampo" id="poblacion_especific_otro_nombre" placeholder="Ingresa el nombre de otra población objetivo" value="<?=$poblacion_especific_otro_nombre?>" maxlength="150" <?php if(empty($poblacion_especific_otros)){?> disabled <?php } ?>>
            	</div>
            </div>
            <div class="col-md-4"> 
        		<div class="form-group"><label>Número:</label>
            <input name="poblacion_especific_otro_cantidad" type="text" class="form-control proyectocampo" id="poblacion_especific_otro_cantidad" placeholder="Ingresa la cantidad" value="<?=$poblacion_especific_otro_cantidad?>" <?php if(empty($poblacion_especific_otros)){?> disabled <?php } ?> onKeyPress="return soloNumeros(event)">
            	</div>
            </div>
         </div> 
         
         <div class="row">
          <div class="col-md-4">
          	<div class="form-group">
			<small id="errpoblacion_especific" name="errpoblacion_especific" class="form-text form-text-error" style="display:none">Debes ingresar el mismo número de personas (hombre - mujer) </small>
            </div>
          </div>
         </div>
                         
            <!-- FIN i)Problación objetivo del festival-->   
              
              <!-- inicio del iniciso j -->
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> j) Organigrama operativo para la producción del festival<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label cuartocampo">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Detallar la estructura organizativa del Festival en el tipo de esquema propuesto. Incluir nombres de los responsables y área o actividad a operar."></span></label>
                        <p>Usar mayúsculas y minúsculas en los nombres, cargos y funciones.</p>
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
								
								if($f<=3){ ?><samp id="errorganigrama_nombre<?=$f?>As" name="errorganigrama_nombre<?=$f?>As" class="control-label">*</samp><?php } ?></th>
                                <td>
                                	<input type="text" id="organigrama_nombre<?=$f?>" name="organigrama_nombre<?=$f?>" value="<?=$organigrama_nombre_a?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
                                    <small id="errorganigrama_nombre<?=$f?>" name="errorganigrama_nombre<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                                </td>
                                <td><?php if($f<=3){ ?><samp id="errorganigrama_cargo<?=$f?>As" name="errorganigrama_cargo<?=$f?>As" class="control-label" style="display:none">*</samp><?php } ?>
                                	 <input type="text" id="organigrama_cargo<?=$f?>" name="organigrama_cargo<?=$f?>" value="<?=$organigrama_cargo_a?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
                                    <small id="errorganigrama_cargo<?=$f?>" name="errorganigrama_cargo<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                                </td>
                                <td><?php if($f<=3){ ?><samp id="errorganigrama_funciones<?=$f?>As" name="errorganigrama_funciones<?=$f?>As" class="control-label" style="display:none">*</samp><?php } ?>
                                	<input type="text" id="organigrama_funciones<?=$f?>" name="organigrama_funciones<?=$f?>" value="<?=$organigrama_funciones_a?>" class="form-control proyectocampo" placeholder="Ingresa la(s) funcione(s)">
                                    <small id="errorganigrama_funciones<?=$f?>" name="errorganigrama_funciones<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                                    </td>
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
                        <label> m) Costo total del festival y n) Monto solicitado a la Secretaría de Cultura:
                        </label>
                       <div class="row">
                        <!-- Código postal -->
                        <div class="col-md-12">
                        
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Descripción</th>
                                <th>Monto</th>
                                <th>Porcentaje</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Costo total de realización del festival</th>
                                <td><input type="text" id="Infor_finan_costo_monto_paso" name="Infor_finan_costo_monto_paso" class="form-control" value="<?=$Infor_finan_costo_monto?>" placeholder="Costo total de realización del festival" readonly></td>
                                <td><input type="text" id="cien" name="cien" class="form-control proyectocampo" value="100%" readonly></td>
                              </tr>
                              <tr>
                                <th scope="row">Apoyo financiero solicitado a la Secretaría de Cultura</th>
                                <td><input type="text" id="Infor_finan_apoyo_monto_paso" name="Infor_finan_apoyo_monto_paso" class="form-control" value="<?=$Infor_finan_apoyo_monto?>" placeholder="Apoyo financiero solicitado a la SC" readonly></td>
                                <td>
								<input type="text" id="Infor_finan_apoyo_costo_total_paso" name="Infor_finan_apoyo_costo_total_paso" class="form-control" value="<?=$Infor_finan_apoyo_costo_total?>" placeholder="Apoyo financiero % Costo total del proyecto"></td>
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
                        <label> p) Estrategias de difusión del festival<samp id="err_est_difucionAs" name="errnombre_titularAs" class="control-label">*</samp>:
                        </label>
                  
              
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
               <div class="col-md-4">
			  		<small id="errmuestra_error" name="errmuestra_error" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
				</div>
				</div>
			
            
            <div class="row">
        	<div class="col-md-4"> 
            	<div class="checkbox">
                    <label>
                      <input type="checkbox" name="estrategias_medios_otros" id="estrategias_medios_otros" value="1" onClick="habilitarV()" class="checkcampo" <?php if($estrategias_medios_otros==1){?> checked<?php } ?>>
                      <strong>Otros medios en que se dará difusión al festival</strong>
                    </label>
                </div>
           </div>
           </div>
         
           <div class="row">
            <div class="col-md-4"> 
        		<div class="form-group"><label>Nombre:</label>
            <input name="estrategias_medios_otros_nombre" type="text" class="form-control proyectocampo" id="estrategias_medios_otros_nombre" placeholder="Ingresa otro medio de difusión del festival" value="<?=$estrategias_medios_otros_nombre?>" maxlength="150" <?php if(empty($estrategias_medios_otros_nombre)){?> disabled <?php } ?>>
            	</div>
            </div>
            </div>  
             
            </div>

			<div class="row">
            	<div class="col-md-12">
                    <div class="form-group">
                        <label> q) Estrategia para adecuar las actividades programadas del festival en caso de rebrote por SARS-CoV-2 (COVID-19)<samp id="errdesarrollo_proyecto_rebrote_covidAs" name="errdesarrollo_proyecto_rebrote_covidAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Máximo 2,500 caracteres"></span></label>
                        <small>Máximo 2,500 caracteres</small>
                        <textarea id="desarrollo_proyecto_rebrote_covid" name="desarrollo_proyecto_rebrote_covid" class="form-control guardar_campostext" placeholder="Ingresa de las actividades programadas del festival en caso de rebrote por SARS-CoV-2" rows="10" maxlength="2500"><?php echo $desarrollo_proyecto_rebrote_covid; ?></textarea>
                        <small id="errdesarrollo_proyecto_rebrote_covid" name="errdesarrollo_proyecto_rebrote_covid" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            </div>
            </div>
            </div>
              
              <?php /*div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> Otros medios de en que se dará difusión al festival:</label>
                        <textarea id="estrategias_medios_otros_nombre" name="estrategias_medios_otros_nombre" class="form-control proyectocampo" placeholder="Ingresa otro medio de difusión del festival" rows="3"><?=$estrategias_medios_otros_nombre?></textarea>
                  </div>
                </div>
              </div*/?>
              
            
              
               <!-- FIN Estratégias de difusion-->
             
               <div class="row">
               <!-- Campo Nombre de la o el Titular -->
                <div class="col-md-12">
                    <div class="form-group"> 
                        <label> ¿Qué acciones se llevarán a cabo para dar a conocer el festival?<samp id="errestrategias_acciones_dar_conocerAs" name="errestrategias_acciones_dar_conocerAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="A fin de captar un gran n&uacute;mero de p&uacute;blico"></span></label>
                        <textarea id="estrategias_acciones_dar_conocer" name="estrategias_acciones_dar_conocer" class="form-control guardar_campostext" placeholder="Ingresa qué acciones se llevarán a cabo para dar a conocer el festival a fin de captar un gran n&uacute;mero de p&uacute;blico" rows="10"><?=$estrategias_acciones_dar_conocer?></textarea>
                        <small id="errestrategias_acciones_dar_conocer" name="errestrategias_acciones_dar_conocer" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
            </div>	
			
               
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                        <label> r) Descripción de los mecanismos de evaluación del festival<samp id="errdescripcion_mecanismos_evaluacionAs" name="errdescripcion_mecanismos_evaluacionAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Anotar las herramientas o procedimientos que permitan verificar que los objetivos y metas sean alcanzados."></span>
                        </label>
                        <textarea id="descripcion_mecanismos_evaluacion" name="descripcion_mecanismos_evaluacion" class="form-control guardar_campostext" placeholder="Ingresa la descripción de los mecanismos de evaluación del festival" rows="10"><?=$descripcion_mecanismos_evaluacion?></textarea>
                        <small id="errdescripcion_mecanismos_evaluacion" name="errdescripcion_mecanismos_evaluacion" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
              </div>
            
            
            
           <div class="row">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
                            <a class="btn btn-primary btnPrevious" >Anterior</a>
                            <a class="btn btn-primary btnNext" >Siguiente</a>                            
                        </div>
                    </div>
             </div>
           </div>
            
           </div>
           <!-- FIN PESTAÑA "Proyecto" -->
              
             <!-- INICIO PESTAÑA "Cronograma de acciones para la ejecución del festival" -->
             <div class="tab-pane <?php /*if($abre_tab==1){?>active<?php } */?>" id="tab-03">
                <!-- inicio del iniciso k -->
                
                 <div class="row">
                    <div class="col-md-12"> 
                       <h3> k) Cronograma de acciones para la ejecución del festival</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                
                <div class="row">
                	<div class="col-md-4">
                     <div class="form-group datepicker-group"> 
                    	<label class="control-label" for="calendar">Fecha inicio<samp id="errcrono_fechaacciones_aAs" name="errcrono_fechaacciones_aAs" class="control-label">*</samp>:</label>
						<input class='form-control validafecha' type='text' name='crono_fechaacciones_a' id='crono_fechaacciones_a' value='<?=$crono_fechaacciones_a?>' placeholder='dd/mm/aaaa'><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <small id="errcrono_fechaacciones_a" name="errcrono_fechaacciones_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="errfechacrono" name="errfechacrono" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                     <div class="form-group datepicker-group"> 
                    	<label class="control-label" for="calendar">Fecha fin<samp id="errcrono_fechaacciones_fin_aAs" name="errcrono_fechaacciones_fin_aAs" class="control-label">*</samp>:</label>
						<input class='form-control validafecha_fina' type='text' name='crono_fechaacciones_fin_a' id='crono_fechaacciones_fin_a' value='<?=$crono_fechaacciones_fin_a?>' placeholder='dd/mm/aaaa'><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <small id="errcrono_fechaacciones_fin_a" name="errcrono_fechaacciones_fin_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="errfechacrono_fin_a" name="errfechacrono_fin_a" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    	<div class="form-group"> 
                            <label>Acciones<samp id="errcrono_acciones_aAs" name="errcrono_acciones_aAs" class="control-label">*</samp>:</label>
                            <input class='form-control proyectocampo' type='text' name='crono_acciones_a' id='crono_acciones_a' value='<?=$crono_acciones_a?>'>
                            <small id="errcrono_acciones_a" name="errcrono_acciones_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>

                        </div>
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-4">
                     <div class="form-group datepicker-group"> 
                    	<label class="control-label" for="calendar">Fecha inicio<samp id="errcrono_fechaacciones_bAs" name="errcrono_fechaacciones_bAs" class="control-label">*</samp>:</label>
			<input class='form-control validafechab' type='text' name='crono_fechaacciones_b' id='crono_fechaacciones_b' value='<?=$crono_fechaacciones_b?>' placeholder='dd/mm/aaaa'>
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <small id="errcrono_fechaacciones_b" name="errcrono_fechaacciones_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="errfechacrono_b" name="errfechacrono_b" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                     <div class="form-group datepicker-group"> 
                    	<label class="control-label" for="calendar">Fecha fin<samp id="errcrono_fechaacciones_fin_bAs" name="errcrono_fechaacciones_fin_bAs" class="control-label">*</samp>:</label>
			<input class='form-control validafecha_finb' type='text' name='crono_fechaacciones_fin_b' id='crono_fechaacciones_fin_b' value='<?=$crono_fechaacciones_fin_b?>' placeholder='dd/mm/aaaa'>
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <small id="errcrono_fechaacciones_fin_b" name="errcrono_fechaacciones_fin_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="errfechacrono_fin_b" name="errfechacrono_fin_b" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    	<div class="form-group"> 
                            <label>Acciones<samp id="errcrono_acciones_bAs" name="errcrono_acciones_bAs" class="control-label">*</samp>:</label>
                            <input class='form-control proyectocampo' type='text' name='crono_acciones_b' id='crono_acciones_b' value='<?=$crono_acciones_b?>'>
                            <small id="errcrono_acciones_b" name="errcrono_acciones_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                	<div class="col-md-4">
                     <div class="form-group datepicker-group"> 
                    <label class="control-label" for="calendar">Fecha inicio<samp id="errcrono_fechaacciones_cAs" name="errcrono_fechaacciones_cAs" class="control-label">*</samp>:</label>
			<input class='form-control validafechac' type='text' name='crono_fechaacciones_c' id='crono_fechaacciones_c' value='<?=$crono_fechaacciones_c?>' placeholder='dd/mm/aaaa'>
			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <small id="errcrono_fechaacciones_c" name="errcrono_fechaacciones_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="errfechacrono_c" name="errfechacrono_c" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                     <div class="form-group datepicker-group"> 
                    	<label class="control-label" for="calendar">Fecha fin<samp id="errcrono_fechaacciones_fin_cAs" name="errcrono_fechaacciones_fin_cAs" class="control-label">*</samp>:</label>
			<input class='form-control validafecha_finc' type='text' name='crono_fechaacciones_fin_c' id='crono_fechaacciones_fin_c' value='<?=$crono_fechaacciones_fin_c?>' placeholder='dd/mm/aaaa'>
			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <small id="errcrono_fechaacciones_fin_c" name="errcrono_fechaacciones_fin_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="errfechacronos_fin_c" name="errfechacronos_fin_c" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    	<div class="form-group"> 
                            <label>Acciones<samp id="errcrono_acciones_cAs" name="errcrono_acciones_cAs" class="control-label">*</samp>:</label>
                            <input class='form-control proyectocampo' type='text' name='crono_acciones_c' id='crono_acciones_c' value='<?=$crono_acciones_c?>'>
                            <small id="errcrono_acciones_c" name="errcrono_acciones_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </div>
                    </div>
                </div>
                              
                         
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="contenedorModalalert">
                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" id="alertModal2">
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
                                            <div class="modal-body" id="mensaje_BODY_alert2">
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
                
                <div id="total_cont_all4">
                                      
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="totalcont4">
                            <?php require_once('catalogo_cronograma.php'); ?>
							<!--<div id="totalcont4">    
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="para_Trabajar4">
                            <!--Para trabajar-->
                        </div>
                    </div>
                    
                </div>
				
              
           <div class="row">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
                            <a class="btn btn-primary btnPrevious" >Anterior</a>
                            <a class="btn btn-primary btnNext" >Siguiente</a>                            
                        </div>
                    </div>
             </div>
           </div>
            
            <!-- fin del iniciso k -->
          </div>
            <!-- FIN PESTAÑA "Cronograma de acciones para la ejecución del festival" -->  
              
              
            <!-- INICIO PESTAÑA "lugares" -->
            <div class="tab-pane" id="tab-04">
              <!-- inicio del iniciso l -->
                <div class="row">
                    <div class="col-md-12"> 
                  <h3> l) Lugares de realización o medios de transmisión de las actividades artísticas programada</h3>
                   <p>Utiliza este espacio para enlistar y describir cada uno de los foros que se utilizarán para las presentaciones o los medios mediante los cuales se transmitirán las actividades programadas en el marco del festival.</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
               	<!----- INICIO a ------------->
				  <div class="row">   
            			<div class="col-md-4">
                    <div class="form-group"> 
					<label>Tipo de lugar<samp id="errtipo_lugar_aAs" name="errtipo_lugar_aAs" class="control-label">*</samp>:</label>
					    <select name="tipo_lugar_a" id="tipo_lugar_a" class="form-control tipolugcampo">
							<option value="" selected>Selecciona una opción</option>
					        <option value=1 <?php if($tipo_lugar_a==1){ ?> selected="selected" <?php } ?>>Foro</option>
					        <option value=2 <?php if($tipo_lugar_a==2){ ?> selected="selected" <?php } ?>>Medio de transmisión</option>
					    </select>
					    <small id="errtipo_lugar_a" name="errtipo_lugar_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
					    </div>
					</div>
				</div>
            	<div class="row">
                	<div class="col-md-4">
                     <div class="form-group"> 
                    	<label>Nombre de foro o medio de transmisión<samp id="errNombreforo_aAs" name="errNombreforo_aAs" class="control-label">*</samp>:</label>
			<input class='form-control proyectocampo' type='text' name='Nombreforo_a' id='Nombreforo_a' value='<?=$Nombreforo_a?>' placeholder='Ingresa el nombre de foro o medio de transmisión'> 
                        <small id="errNombreforo_a" name="errNombreforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                     </div>
                	</div>
                	<div class="col-md-4"> 
                       <div class="form-group">
                         <label class="control-label" for="Descripcionlug_a">Descripci&oacute;n y link de acceso, en su caso<samp id="errDescripcionlug_aAs" name="errDescripcionlug_aAs" class="control-label">*</samp>:</label>
                         <input class="form-control proyectocampo" id="Descripcionlug_a" name="Descripcionlug_a" value="<?=$Descripcionlug_a?>" placeholder="Descripci&oacute;n y link de acceso, en su caso" type="text">
                        <small id="errDescripcionlug_a" name="errDescripcionlug_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
               </div>
               <div class="row"> 
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="cpforo_a">Código Postal<samp id="errcpforo_aAs" name="errcpforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="cpforo_a" name="cpforo_a" placeholder="Ingresa el Código Postal" value="<?=$cpforo_a?>" type="text" onKeyPress="return evita_comas(event)" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errcpforo_a" name="errcpforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="estadoforo_a">Estado<samp id="errestadoforo_aAs" name="errestadoforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="estadoforo_a" name="estadoforo_a" placeholder="Ingresa el Estado" value="<?=$estadoforo_a?>" type="text" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errestadoforo_a" name="errestadoforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                  <label class="control-label" for="mun_alcforo_a">Municipio o Alcaldía<samp id="errmun_alcforo_aAs" name="errmun_alcforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="mun_alcforo_a" name="mun_alcforo_a" placeholder="Ingresa el Municipio o Alcaldía" value="<?=$mun_alcforo_a?>" type="text" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errmun_alcforo_a" name="errmun_alcforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="coloniaforo_a">Colonia<samp id="errcoloniaforo_aAs" name="errcoloniaforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="coloniaforo_a" name="coloniaforo_a" placeholder="Ingresa la colonia" value="<?=$coloniaforo_a?>" type="text" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errcoloniaforo_a" name="errcoloniaforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="calleforo_a">Calle<samp id="errcalleforo_aAs" name="errcalleforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="calleforo_a" name="calleforo_a" placeholder="Ingresa la calle" value="<?=$calleforo_a?>" type="text" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errcalleforo_a" name="errcalleforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="no_extforo_a">No. exterior<samp id="errno_extforo_aAs" name="errno_extforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="no_extforo_a" name="no_extforo_a" placeholder="Ingresa el número externo" value="<?=$no_extforo_a?>" type="text" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errno_extforo_a" name="errno_extforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="no_intforo_a">No. interior<samp id="errno_intforo_aAs" name="errno_intforo_aAs" class="control-label">*</samp>:</label>
                        <input class="form-control proyectocampo" id="no_intforo_a" name="no_intforo_a" placeholder="Ingresa el número interno" value="<?=$no_intforo_a?>" type="text" <?php if($tipo_lugar_a==2){ ?> disabled <?php } ?>>
                        <small id="errno_intforo_a" name="errno_intforo_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <?php /*div class="col-md-4"> 
				        <div class="form-group">
				            <label class="control-label" for="Linklug_a">Link de acceso<samp id="errLinklug_aAs" name="errLinklug_aAs" class="control-label">*</samp>:</label>
				            <input class="form-control proyectocampo" id="Linklug_a" name="Linklug_a" value="<?=$Linklug_a?>" placeholder="Ingresa el Link de acceso" type="text" <?php if($tipo_lugar_a==1){ ?> disabled <?php } ?>>
				            <small id="errLinklug_a" name="errLinklug_a" value="<?=$Linklug_a?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
				        </div>
				    </*/ ?>
             	</div>
             <!--	//----------------fin a ////////-->
             <!-- --	// inicio b /////////-->
             <div class="row">
                <div class="col-md-4">
					<label>Tipo de lugar:</label>
					    <select name="tipo_lugar_b" id="tipo_lugar_b" class="form-control tipolugcampo">
							<option value="" selected>Selecciona una opción</option>
					        <option value=1 <?php if($tipo_lugar_b==1){ ?> selected="selected" <?php } ?>>Foro</option>
					        <option value=2 <?php if($tipo_lugar_b==2){ ?> selected="selected" <?php } ?>>Medio de transmisión</option>
					    </select>
				</div>
			</div>
            <div class="row">
                <div class="col-md-4"> 
                   <div class="form-group">
                    <label class="control-label" for="Nombreforo_b">Nombre de foro o medio de transmisión:</label>
                    <input class="form-control proyectocampo" id="Nombreforo_b" name="Nombreforo_b" placeholder="Ingresa el nombre de foro o medio de transmisión" value="<?=$Nombreforo_b?>" type="text">
                    <small id="errNombreforo_b" name="errNombreforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                   </div>
                </div>
                <div class="col-md-4"> 
	                   <div class="form-group">
	                 		<label class="control-label" for="Descripcionlug_b">Descripci&oacute;n y link de acceso, en su caso:</label>
	                    	<input class="form-control proyectocampo" id="Descripcionlug_b" name="Descripcionlug_b" value="<?=$Descripcionlug_b?>" placeholder="Ingresa la Descripci&oacute;n y link de acceso, en su caso" type="text">
	                   </div>
	               </div>
            </div>
            <div class="row"> 
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="cpforo_b">Código Postal:</label>
                        <input class="form-control proyectocampo" id="cpforo_b" name="cpforo_b" placeholder="Ingresa el Codigo Postal" value="<?=$cpforo_b?>" type="text" onKeyPress="return evita_comas(event)" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errcpforo_b" name="errcpforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="estadoforo_b">Estado:</label>
                        <input class="form-control proyectocampo" id="estadoforo_b" name="estadoforo_b" placeholder="Ingresa el Estado" value="<?=$estadoforo_b?>" type="text" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errestadoforo_b" name="errestadoforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                  		<label class="control-label" for="mun_alcforo_b">Municipio o Alcaldía:</label>
                        <input class="form-control proyectocampo" id="mun_alcforo_b" name="mun_alcforo_b" placeholder="Ingresa el Municipio o Alcaldía" value="<?=$mun_alcforo_b?>" type="text" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errmun_alcforo_b" name="errmun_alcforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                </div>
            	<div class="row">
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="coloniaforo_b">Colonia:</label>
                        <input class="form-control proyectocampo" id="coloniaforo_b" name="coloniaforo_b" placeholder="Ingresa la colonia" value="<?=$coloniaforo_b?>" type="text" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errcoloniaforo_b" name="errcoloniaforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="calleforo_b">Calle:</label>
                        <input class="form-control proyectocampo" id="calleforo_b" name="calleforo_b" placeholder="Ingresa la calle" value="<?=$calleforo_b?>" type="text" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errcalleforo_b" name="errcalleforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="no_extforo_b">No. exterior:</label>
                        <input class="form-control proyectocampo" id="no_extforo_b" name="no_extforo_b" placeholder="Ingresa el número exterior" value="<?=$no_extforo_b?>" type="text" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errno_extforo_b" name="errno_extforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                </div>
            	<div class="row">
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="no_intforo_b">No. interior:</label>
                        <input class="form-control proyectocampo" id="no_intforo_b" name="no_intforo_b" placeholder="Ingresa el número interior" value="<?=$no_intforo_b?>" type="text" <?php if($tipo_lugar_b==2){ ?> disabled <?php } ?>>
                        <small id="errno_intforo_b" name="errno_intforo_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
	               
	               <?php /*div class="col-md-4"> 
				        <div class="form-group">
				            <label class="control-label" for="Linklug_b">Link de acceso:</label>
				            <input class="form-control proyectocampo" id="Linklug_b" name="Linklug_b" value="<?=$Linklug_b?>" placeholder="Ingresa el Link de acceso" type="text" <?php if($tipo_lugar_b==1){ ?> disabled <?php } ?>>
				            <small id="errLinklug_b" name="errLinklug_b" value="<?=$Linklug_b?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
				        </div>
				    </div*/?>
				</div>
            <!--///din lugar b --->
            <!----- inicio lugar c ----->
            <div class="row">
                <div class="col-md-4">
					<label>Tipo de lugar:</label>
					    <select name="tipo_lugar_c" id="tipo_lugar_c" class="form-control tipolugcampo">
							<option value="" selected>Selecciona una opción</option>
					        <option value=1 <?php if($tipo_lugar_c==1){ ?> selected="selected" <?php } ?>>Foro</option>
					        <option value=2 <?php if($tipo_lugar_c==2){ ?> selected="selected" <?php } ?>>Medio de transmisión</option>
					    </select>
				</div>
			</div>
			<div class="row">	
	            <div class="col-md-4"> 
                    <div class="form-group">
    	                <label class="control-label" for="Nombreforo_c">Nombre de foro o medio de transmisión:</label>
        	            <input class="form-control proyectocampo" id="Nombreforo_c" name="Nombreforo_c" placeholder="Ingresa el nombre de foro o medio de transmisión" value="<?=$Nombreforo_c?>" type="text">
                    </div>
                </div>
                <div class="col-md-4"> 
                    	<div class="form-group">
                 			<label class="control-label" for="Descripcionlug_c">Descripci&oacute;n y link de acceso, en su caso:</label>
                        	<input class="form-control proyectocampo" id="Descripcionlug_c" name="Descripcionlug_c" value="<?=$Descripcionlug_c?>" placeholder="Ingresa la Descripci&oacute;n y link de acceso, en su caso" type="text">
                   		</div>
               	 </div>
            </div>
            <div class="row">
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="cpforo_c">Código Postal:</label>
                        <input class="form-control proyectocampo" id="cpforo_c" name="cpforo_c" placeholder="Ingresa el Código Postal" value="<?=$cpforo_c?>" type="text" onKeyPress="return evita_comas(event)" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errcpforo_c" name="errcpforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="estadoforo_c">Estado:</label>
                        <input class="form-control proyectocampo" id="estadoforo_c" name="estadoforo_c" placeholder="Ingresa el Estado" value="<?=$estadoforo_c?>" type="text" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errestadoforo_c" name="errestadoforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                  		<label class="control-label" for="mun_alcforo_c">Municipio o Alcaldía:</label>
                        <input class="form-control proyectocampo" id="mun_alcforo_c" name="mun_alcforo_c" placeholder="Ingresa el Municipio o Alcaldía" value="<?=$mun_alcforo_c?>" type="text" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errmun_alcforo_c" name="errmun_alcforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="coloniaforo_c">Colonia:</label>
                        <input class="form-control proyectocampo" id="coloniaforo_c" name="coloniaforo_c" placeholder="Ingresa la colonia" value="<?=$coloniaforo_c?>" type="text" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errcoloniaforo_c" name="errcoloniaforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>            
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="calleforo_c">Calle:</label>
                        <input class="form-control proyectocampo" id="calleforo_c" name="calleforo_c" placeholder="Ingresa la calle" value="<?=$calleforo_c?>" type="text" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errcalleforo_c" name="errcalleforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="no_extforo_c">No. exterior:</label>
                        <input class="form-control proyectocampo" id="no_extforo_c" name="no_extforo_c" placeholder="Ingresa el número exterior" value="<?=$no_extforo_c?>" type="text" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errno_extforo_c" name="errno_extforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-4"> 
                       <div class="form-group">
                        <label class="control-label" for="no_intforo_c">No. interior:</label>
                        <input class="form-control proyectocampo" id="no_intforo_c" name="no_intforo_c" placeholder="Ingresa el número interior" value="<?=$no_intforo_c?>" type="text" <?php if($tipo_lugar_c==2){ ?> disabled <?php } ?>>
                        <small id="errno_intforo_c" name="errno_intforo_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </div>
                    </div>
                	
               	 <?php /* class="col-md-4"> 
				        <div class="form-group">
				            <label class="control-label" for="Linklug_c">Link de acceso:</label>
				            <input class="form-control proyectocampo" id="Linklug_c" name="Linklug_c" value="<?=$Linklug_c?>" placeholder="Ingresa el Link de acceso" type="text" <?php if($tipo_lugar_c==1){ ?> disabled <?php } ?>>
				            <small id="errLinklug_c" name="errLinklug_c" value="<?=$Linklug_c?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
				        </div*/?>
            </div>
            <!--FIn lugar c -->
              <div class="row">    
               <div class="col-md-12">
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="contenedorModalalert">
                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" id="alertModal">
                                <div class="modal-dialog" role="document">
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
                <div id="total_cont_all">                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="totalcont">
                            <?php require_once('catalogo_lugares.php'); ?>
								<!--<div id="totalcont"></div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="para_Trabajar">
                            <!--Para trabajar-->
                        </div>
                    </div>
                </div>			
           <div class="row">
           	 <div class="col-md-12">
               		<div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
                                <a class="btn btn-primary btnPrevious" >Anterior</a>
                                <?php //a class="btn btn-primary btnNext" >Siguiente</a?>
                                <input class="btn btn-primary" type="button" value="Siguiente" id="submit1" name="submit1" onClick="return validarEnvio();" >
                        </div>
            		</div>
            	</div>
            </div> 
                  </div>
                </div>
              </div>
              <!-- FIN del iniciso l -->
            </div>  
            <!-- FIN PESTAÑA "lugares" -->
              
           <!-- INICIO PESTAÑA "Presupuesto" tab-05 -->
            <?php /*div class="tab-pane" id="tab-05">
                <!-- INICIO del iniciso o -->
                <div class="row">
                    <div class="col-md-12"> 
                        <h3> o) Resumen presupuestal</h3>
                        <p><strong>Use este espacio para registrar un resumen presupuestal, usando al menos los conceptos de gasto que se enlistan en el combo al seleccionar el campo. 
                        Al finalizar el registro del proyecto podrá descargar el formato de presupuesto donde desglosará detalladamente los conceptos de gasto.</strong></p>
                        <p>En el caso de la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival que se proponen pagar con recursos del PROFEST, 
                        se deberá adjuntar una cotización por cada servicio o arrendamiento al finalizar el registro, en el apartado de adjuntar y descargar documentos, excepto en el caso de la contratación de servicios artísticos profesionales.</p>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                </div>
                

				<div class="row">
                    <div class="col-md-12">
                    	<div id="errinfoFinan_Costo_Apoyo" name="errinfoFinan_Costo_Apoyo" class="alert alert-danger" style="display:none"><strong>¡Atención!</strong> Los montos no coinciden con los ingresados en la pestaña de solicitud.</div>
                    </div>
        		</div>
              
                <!-- INICIO 3 obligatorios de Presupuesto -->
                    <!-- INICIO uno presupuesto -->
                    <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label>Concepto de gasto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</label>
                            <select class='form-control proyectocampo' name='Concepto_gasto_a' id='Concepto_gasto_a'>
                            	<?php
                                	$query="SELECT * FROM `catalogo_concepto_gastos` where id_gasto=$Concepto_gasto_a";
                                    $result = mysql_query($query);
                                                while($renglon = mysql_fetch_row($result))
                                                {	
                                                      $valor=$renglon[0];
                                                      $imp_texto=$renglon[1];
                                                      $combobit .= "<option value=".$valor." selected>".$imp_texto."</option>\n";
                                                }
								?>
								<?php echo $combobit; ?>
                            </select>
                           <small id="errConcepto_gasto_a" name="errConcepto_gasto_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                         </div>
                       </div>
                     
                     <div class="col-md-4">
                         <div class="form-group">
                            <label>Fuente de financiamiento<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</label>
                               <select class='form-control proyectocampo' name='Fuente_finan_a' id='Fuente_finan_a' onBlur="obten_porcentaje_tratado()">
                                <option value="" selected="selected">Selecciona opci&oacute;n</option>
                                <option value='Institucional Estatal' <?php if($Fuente_finan_a=='Institucional Estatal'){ ?> selected <?php } ?>>Institucional Estatal</option>
                                <option value='Institucional Municipal' <?php if($Fuente_finan_a=='Institucional Municipal'){ ?> selected <?php } ?>>Institucional Municipal</option>
                                <option value='Institucional Federal PROFEST' <?php if($Fuente_finan_a=='Institucional Federal PROFEST'){ ?> selected <?php } ?>>Institucional Federal PROFEST</option>
                                <option value='Institucional Educación Superior' <?php if($Fuente_finan_a=='Institucional Educación Superior'){ ?> selected <?php } ?>>Institucional Educación Superior</option>
                                <option value='Privada' <?php if($Fuente_finan_a=='Privada'){ ?> selected <?php } ?>>Privada</option>
                               </select>
                               <small id="errFuente_finan_a" name="errFuente_finan_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                        </div>
                     </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Monto/unidad<samp id="errMonto_unidad_aAs" name="errMonto_unidad_aAs" class="control-label">*</samp>:</label>
                            <input class="form-control obten_porcentaje" id="Monto_unidad_a" name="Monto_unidad_a" value="<?=$Monto_unidad_a?>" placeholder="0.00" type="text">
                            <small id="errMonto_unidad_a" name="errMonto_unidad_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                        </div>
                    </div>
                 </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Porcentaje<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</label>
                                <input class="form-control" id="Porcentaje_a" name="Porcentaje_a" value="<?=$Porcentaje_a?>" placeholder="0.00" type="text" readonly>
                                <small id="errPorcentaje_a" name="errPorcentaje_a" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	

                            </div>
                        </div>
                   </div> 
                   <!-- FIN uno presupuesto -->
                   
                   <!-- INICIO dos presupuesto -->
                    <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label>Concepto de gasto<samp id="errConcepto_gasto_bAs" name="errConcepto_gasto_bAs" class="control-label">*</samp>:</label>
                            <select class='form-control proyectocampo' name='Concepto_gasto_b' id='Concepto_gasto_b'>
                            	<?php
                                	$query="SELECT * FROM `catalogo_concepto_gastos` where id_gasto=$Concepto_gasto_b";
                                    $result = mysql_query($query);
                                                while($renglon = mysql_fetch_row($result))
                                                {	
                                                      $valor=$renglon[0];
                                                      $imp_texto=$renglon[1];
                                                      $combobit .= "<option value=".$valor." selected>".$imp_texto."</option>\n";
                                                }
								?>
                            	<?php echo $combobit; ?>
                            </select>
                           <small id="errConcepto_gasto_b" name="errConcepto_gasto_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                         </div>
                       </div>
                     
                     <div class="col-md-4">
                         <div class="form-group">
                            <label>Fuente de financiamiento<samp id="errFuente_finan_bAs" name="errFuente_finan_bAs" class="control-label">*</samp>:</label>
                               <select class='form-control proyectocampo' name='Fuente_finan_b' id='Fuente_finan_b' onBlur="obten_porcentaje_tratado()">
                                <option value="" selected="selected">Selecciona opci&oacute;n</option>
                                 <option value='Institucional Estatal' <?php if($Fuente_finan_b=='Institucional Estatal'){ ?> selected <?php } ?>>Institucional Estatal</option>
                                <option value='Institucional Municipal' <?php if($Fuente_finan_b=='Institucional Municipal'){ ?> selected <?php } ?>>Institucional Municipal</option>
                                <option value='Institucional Federal PROFEST' <?php if($Fuente_finan_b=='Institucional Federal PROFEST'){ ?> selected <?php } ?>>Institucional Federal PROFEST</option>
                                <option value='Institucional Educación Superior' <?php if($Fuente_finan_b=='Institucional Educación Superior'){ ?> selected <?php } ?>>Institucional Educación Superior</option>
                                <option value='Privada' <?php if($Fuente_finan_b=='Privada'){ ?> selected <?php } ?>>Privada</option>
                               </select>
                               <small id="errFuente_finan_b" name="errFuente_finan_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                        </div>
                     </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Monto/unidad<samp id="errMonto_unidad_bAs" name="errMonto_unidad_bAs" class="control-label">*</samp>:</label>
                            <input class="form-control obten_porcentaje" id="Monto_unidad_b" name="Monto_unidad_b" value="<?=$Monto_unidad_b?>" placeholder="0.00" type="text">
                            <small id="errMonto_unidad_b" name="errMonto_unidad_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                        </div>
                    </div>
                 </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Porcentaje<samp id="errPorcentaje_bAs" name="errPorcentaje_bAs" class="control-label">*</samp>:</label>
                                <input class="form-control" id="Porcentaje_b" name="Porcentaje_b" value="<?=$Porcentaje_b?>" placeholder="0.00" type="text" readonly>
                                <small id="errPorcentaje_b" name="errPorcentaje_b" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                            </div>
                        </div>
                   </div> 
                 <!-- FIN dos presupuesto -->
                 <!-- INICIO dos presupuesto -->
                    <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label>Concepto de gasto<samp id="errConcepto_gasto_cAs" name="errConcepto_gasto_cAs" class="control-label">*</samp>:</label>
                            <select class='form-control proyectocampo' name='Concepto_gasto_c' id='Concepto_gasto_c'>
                            	<?php
                                	echo $query="SELECT * FROM `catalogo_concepto_gastos` where id_gasto=$Concepto_gasto_c";
                                    $result = mysql_query($query);
                                                while($renglon = mysql_fetch_row($result))
                                                {	
                                                      $valor=$renglon[0];
                                                      $imp_texto=$renglon[1];
                                                      $combobit .= "<option value=".$valor." selected>".$imp_texto."</option>\n";
                                                }
								?>
                            	<?php echo $combobit; ?>
                            </select>
                           <small id="errConcepto_gasto_c" name="errConcepto_gasto_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                         </div>
                       </div>
                     
                     <div class="col-md-4">
                         <div class="form-group">
                            <label>Fuente de financiamiento<samp id="errFuente_finan_cAs" name="errFuente_finan_cAs" class="control-label">*</samp>:</label>
                               <select class='form-control proyectocampo' name='Fuente_finan_c' id='Fuente_finan_c' onBlur="obten_porcentaje_tratado()">
                                <option value="" selected="selected">Selecciona opci&oacute;n</option>
                                <option value='Institucional Estatal' <?php if($Fuente_finan_c=='Institucional Estatal'){ ?> selected <?php } ?>>Institucional Estatal</option>
                                <option value='Institucional Municipal' <?php if($Fuente_finan_c=='Institucional Municipal'){ ?> selected <?php } ?>>Institucional Municipal</option>
                                <option value='Institucional Federal PROFEST' <?php if($Fuente_finan_c=='Institucional Federal PROFEST'){ ?> selected <?php } ?>>Institucional Federal PROFEST</option>
                                <option value='Institucional Educación Superior' <?php if($Fuente_finan_c=='Institucional Educación Superior'){ ?> selected <?php } ?>>Institucional Educación Superior</option>
                                <option value='Privada' <?php if($Fuente_finan_c=='Privada'){ ?> selected <?php } ?>>Privada</option>
                               </select>

                               <small id="errFuente_finan_c" name="errFuente_finan_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                        </div>
                     </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Monto/unidad<samp id="errMonto_unidad_cAs" name="errMonto_unidad_cAs" class="control-label">*</samp>:</label>
							<input class="form-control obten_porcentaje" id="Monto_unidad_c" name="Monto_unidad_c" value="<?=$Monto_unidad_c?>" placeholder="0.00" type="text">
                            <small id="errMonto_unidad_c" name="errMonto_unidad_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                        </div>
                    </div>
                 </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Porcentaje<samp id="errPorcentaje_cAs" name="errPorcentaje_cAs" class="control-label">*</samp>:</label>
                                <input class="form-control" id="Porcentaje_c" name="Porcentaje_c" value="<?=$Porcentaje_c?>" placeholder="0.00" type="text" readonly>
                                <small id="errPorcentaje_c" name="errPorcentaje_c" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>	
                            </div>
                        </div>
                   </div> 
                 <!-- FIN tres presupuesto -->
                   
           		<!-- FIN 3 obligatorios de Presupuesto -->
                
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="contenedorModalalert">
                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" id="alertModal2">
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
                                            <div class="modal-body" id="mensaje_BODY_alert2">
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
                
                <div id="total_cont_all2">
                                      
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="totalcont2">
                            <?php require_once('catalogo_presupuesto.php'); ?>
							<!--<div id="totalcont2">    
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="para_Trabajar2">
                            <!--Para trabajar-->
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="Muestra_de_Sumas">
                            <table class="table table-striped" id = "tabla_sum_total">
  								<thread>
  									<tr>
  										<th></th>
  										<th><label>Monto Total ingresado</label></th>
  										<th><label>Porcentaje Total</label></th>
  									</tr>
  								</thread>
                                <tbody>
  									<th width="56%"><center>Total</center></th>
  									<th> <input name="suma_invalida" id="suma_invalida"  value="<?=$suma_invalida?>" class="form-control" size="7" readonly>  </th>
  									<th> <input name="suma_porinvalida" id="suma_porinvalida" value="<?=$suma_porinvalida?>" class="form-control" size="7" readonly> </th>	
  								</tbody>
							</table>
                        </div>
                    </div>
                    
                </div>
		
       <!-- INICIO Botones anterior siguiente -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group clearfix">	
    			     	<div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                        <div class="pull-right">
                        	<a class="btn btn-primary btnPrevious" >Anterior</a>
                            <input class="btn btn-primary" type="button" value="Finalizar" id="submit1" name="submit1" onClick="return validarEnvio();" >
								<?php
                                
                                $sel_cuantos="SELECT * FROM mas_presupuesto WHERE clave_usuario='".$cve_user."'";
                                $exe_res_total=  mysqli_query($con, $sel_cuantos);
                                $Nro_desh_boton = mysqli_num_rows($exe_res_total);
                                
                                ?>
                                
                                <input type="hidden" name="Nro_desh_boton" id="Nro_desh_boton" value="<?=$Nro_desh_boton?>">
                        </div>
               </div>
            </div>
        </div>
        <!-- FIN Botones anterior siguiente -->
              
         
              
             <!-- FIN del iniciso o -->  
			
            </div*/ ?>
            <!-- FIN  PESTAÑA "Presupuesto" -->   
             </form>
          </div>
         </div>
        </div> 
                           
                <div class="form-group clearfix top-buffer">
                    <div class="alert alert-info">
                                <p><strong>Aviso de privacidad simplificado del Sistema de datos personales de los formularios de la convocatoria para el otorgamiento de 
                                subsidios en coinversión a festivales culturales y artísticos PROFEST</strong></p>
                                <p>La Secretaría de Cultura, a través de la Dirección General de Promoción y Festivales Culturales, con domicilio en Avenida Paseo de la Reforma No. 175, Alcaldía Cuauhtémoc, Colonia Cuauhtémoc, Código Postal 06500, Ciudad de México, es la responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
            Los datos personales serán tratados con la finalidad de llevar un registro de las postulaciones, para poder realizar las notificaciones del fallo de la Comisión Dictaminadora y en caso de ser aprobados, dar continuidad a los trámites jurídicos y administrativos, hasta la conclusión de los proyectos
            De manera adicional, los datos recabados se utilizarán para generar estadísticas e informes, la información, no estará asociados con la persona titular de los datos personales, por lo que no será posible identificarla.
            Al momento de dar a conocer el aviso de privacidad, el titular de los datos manifiesta tácitamente su conformidad con el mismo y otorga su consentimiento para que dichos datos sean utilizados por el responsable, para las finalidades señaladas.
            Los datos personales que se recaban no podrán ser transferidos, salvo que se actualice alguna de las excepciones previstas en el artículo 22 la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, o cuando, previamente, se haya obtenido su consentimiento expreso por escrito o por un medio de autenticación similar.
                                </p>
                                <p>
                                Si deseas conocer nuestro aviso de privacidad integral, lo podrás consultar en el portal <a href="formatos_para_descarga_general/AVISO DE PRIVACIDAD INTEGRAL_PROFEST.pdf" target="_blank">Aviso de Privacidad Integral</a>
                                </p>
                    </div>
                </div>
    </div>
        
        
	</div>
   </div>
</div>
 </form>
</main>

        <script type="text/javascript" src="js/funciones_load_cronograma.js"></script> <!-- este es del código de metas -->
        <script type="text/javascript" src="js/Gu_Mo_El_cronograma.js"></script> <!-- este es del código de metas -->
        
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> <!-- este es del código de lugares -->
        <script type="text/javascript" src="js/funciones_load.js"></script> <!-- este es del código de lugares -->
        <script type="text/javascript" src="js/Gu_Mo_El_Serv_p.js"></script> <!-- este es del código de lugares -->
		
		<script type="text/javascript" src="js/funciones_load_presupuesto.js"></script> <!-- este es del código de presupuesto -->
        <script type="text/javascript" src="js/Gu_Mo_El_Presup.js"></script> <!-- este es del código de presupuesto -->
		
		<script type="text/javascript" src="js/funciones_load_meta.js"></script> <!-- este es del código de metas -->
        <script type="text/javascript" src="js/Gu_Mo_El_meta.js"></script> <!-- este es del código de metas -->
        
        
        
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>

        
        <script>
		$gmx(document).ready(function() {
		  
		  $('#periodo_realizacion_fecha_inicio').datepicker();
		  $('#periodo_realizacion_fecha_termino').datepicker();
		  
		  $('#crono_fechaacciones_a').datepicker();
		  $('#crono_fechaacciones_b').datepicker();
		  $('#crono_fechaacciones_c').datepicker();
		  $('#crono_fechaacciones_fin_a').datepicker();
		  $('#crono_fechaacciones_fin_b').datepicker();
		  $('#crono_fechaacciones_fin_c').datepicker();
		    
		});
		</script>
        

		<script type="text/javascript" src="js/hacer_peticion_y_altera.js"></script>

        <script>
          //INICIO .segunampo Alta y Modificación Solicitud
		  var http_request = false;
		  
		   /////// INICIO funcion cat_categoria
		  var set_pcat = document.querySelectorAll(".cat_categoria");
			
		  for (var c = 0; c < set_pcat.length; c++) {
			   set_pcat[c].onchange = function () {
				   						
					document.getElementById('Infor_finan_costo_monto').value = '';
					document.getElementById('Infor_finan_apoyo_monto').value = '';
					document.getElementById('Infor_finan_apoyo_costo_total').value = '';
					
					document.getElementById('Infor_finan_apoyo_monto_paso').value = '';
					document.getElementById('Infor_finan_apoyo_costo_total_paso').value = '';
					document.getElementById('Infor_finan_costo_monto_paso').value = '';

					document.getElementById('Infor_finan_apoyo_costo_total').value = '';
					
					var m1 = parseFloat(document.getElementById("Infor_finan_costo_monto").value);
					var m2 = parseFloat(document.getElementById("Infor_finan_apoyo_monto").value);
					var m_total = parseFloat(document.getElementById("Infor_finan_apoyo_costo_total").value);

					
					if(m1==''){
						m1 = '';
						} else {
							m1 = m1;
							}
					
					if(m2==''){
						m2 = '';
						} else {
							m2 = m2;
							}
							
					if(m_total==''){
						m_total = '';
						} else {
							m_total = m_total;
							}
			   
				 var url_zcat='receptor_categoria.php?variable='+this.name+'&valor='+this.value+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total='+m_total;
					
				 hacerPeticion(url_zcat);
			  }
		  }
		   /////// INICIO funcion cat_categoria
		  	  
		  
		  var set_pc = document.querySelectorAll(".segunampo");
			
		  for (var i = 0; i < set_pc.length; i++) {
			   set_pc[i].onchange = function () {
				   
				var seleccion_categoria=this.name;


				/*var cuantas_ediciones=this.value
				if(seleccion_categoria=='numero_ediciones_previas' && cuantas_ediciones==0){
					document.getElementById('numero_ediciones_previas').value = '';
					document.getElementById("rowError_num_ediciones").style.display = 'block';
				}*/

				
				//if(seleccion_categoria=='info_financiera_categoria'){		
					
					/*document.getElementById('Infor_finan_costo_monto').value = '';
					document.getElementById('Infor_finan_apoyo_monto').value = '';
					document.getElementById('Infor_finan_apoyo_costo_total').value = '';*/
					
					var m1 = parseFloat(document.getElementById("Infor_finan_costo_monto").value);
					var m2 = parseFloat(document.getElementById("Infor_finan_apoyo_monto").value);
					var m_total = parseFloat(document.getElementById("Infor_finan_apoyo_costo_total").value);
					
					//console.log('----------------------------entra----------------------------------');
				//}	
				
				
				////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documentMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					 
					 
					 //console.log(this.name);
					 //console.log(this.value);
					 
					////////////FIN VERIFICAR EL NAVEGADOR	
			
					
					var url_z='receptor_segcampo.php?variable='+this.name+'&valor='+this.value+'&navegador='+navegador;
					
					hacerPeticion(url_z);
					
			/*var campos_text_area=this.name;
			   var datos_campos_text_area=this.value;
				   
				   if(campos_text_area=='objetivo_general'){
					   
					var valor1=datos_campos_text_area.replace(new RegExp("	","g"), " ");
					var valor2=valor1.replace(new RegExp("	","g"), "- ");
					var valor=valor2.replace(new RegExp("\n","g"), "<br>");

					} else {
						valor=this.value;
						}
				
									 
				var url='receptor.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
					//fetch(url)	
					hacerPeticion(url);*/
			  }
          }
		  
		  //FIN .segunampo Alta y Modificación Solicitud
		  
		  /////////////***********************************
		  
		  var set_pc_obj_gen = document.querySelectorAll(".objetivo_gen_texto");
			
		  for (var ii = 0; ii < set_pc_obj_gen.length; ii++) {
			   set_pc_obj_gen[ii].onchange = function () {
			
				////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documentMode;
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 var navegador;
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					////////////FIN VERIFICAR EL NAVEGADOR	
			   var campos_text_area=this.name;
			   var datos_campos_text_area=this.value;
			   
					var valor1=datos_campos_text_area.replace(new RegExp("	","g"), " ");
					var valor2=valor1.replace(new RegExp("	","g"), "- ");
					var valor=valor2.replace(new RegExp("\n","g"), "<br>");
					
	 
				var url_obj_gen='receptor_obj_gen.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
					//fetch(url)	
					hacerPeticion(url_obj_gen);
			  }
          }
		  ////////////************************************		  
		   
		  
		  //INICIO .proyectocampo Alta y Modificación Proyecto 1er. pestaña
		  var set_pcX = document.querySelectorAll(".proyectocampo");
		
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
			  				   
				 var valor=this.value;
						
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documenttMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					 
					////////////FIN VERIFICAR EL NAVEGADOR	
				var url_X='receptor2_Proyecto.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				
				hacerPeticion(url_X);
				
			  }
          }		  
		  //FIN .proyectocampo Alta y Modificación Proyecto 1er. pestaña
			  
		  //INICIO ¿Por qué medios se dará difusión al festival?
		  var set_pcz = document.querySelectorAll(".checkcampo");
			
		  for (var i = 0; i < set_pcz.length; i++) {
			   set_pcz[i].onchange = function () {
				
				if(this.checked == true ){
					//console.log(`Checado ${this.name}`)
					var seleccion_medio=this.value;
				}else{
					//console.log(`No checado ${this.name}`)
					var seleccion_medio=contenido=0;
				}
			   	 
				//console.log(`valor final= ${seleccion_medio}`)
				 
				var url_z='receptor2_Proyecto.php?variable='+this.name+'&valor='+seleccion_medio;
				
				hacerPeticion(url_z);
			  }
          }
		  //FIN ¿Por qué medios se dará difusión al festival?


//16/07/2020 INICIO

//INICIO Alta y Modificación lugares por tipo 
		  var set_pcX = document.querySelectorAll(".tipolugcampo");
		
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
			  				   
				 var valor=this.value;
						
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documenttMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					 
					////////////FIN VERIFICAR EL NAVEGADOR	
				var url_X='receptor2_lugares_tipo_v2.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				
				hacerPeticion(url_X);
				
			  }
          }	
//FIN Alta y Modificación lugares por tipo 
//16/07/2020 FIN
		  
		  
		  //INICIO Disciplina
		  var set_pczx = document.querySelectorAll(".checar_disc");
			
		  for (var i = 0; i < set_pczx.length; i++) {
			   set_pczx[i].onchange = function () {
				
				if(this.checked == true ){
					//console.log(`Checado ${this.name}`)
					var seleccion_disc=this.value;
				}else{
					//console.log(`No checado ${this.name}`)
					var seleccion_disc=contenido=0;
				}
			   	 
				//console.log(`valor final= ${seleccion_disc}`)
				 
				var url_zx='receptor.php?variable='+this.name+'&valor='+seleccion_disc;
				
				hacerPeticion(url_zx);
			  }
          }
		  //FIN Disciplina
		  
		  
		  
		     //INICIO .calc_poblacion
		  var set_pcXz = document.querySelectorAll(".calc_poblacion");
			
		  for (var i = 0; i < set_pcXz.length; i++) {
			   set_pcXz[i].onchange = function () {
				   
			   //(INICIO) CALCULO Población
			  	var sumTot = parseInt(document.getElementById("poblacion_genero_mujer").value) +  parseInt(document.getElementById("poblacion_genero_hombre").value); 
			  	
			  	var sumaEdad = parseInt(document.getElementById("poblacion_edad_0_12").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_13_17").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_18_29").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_30_59").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_60").value);
			    
			    var sumaNivAca = parseInt(document.getElementById("poblacion_nivel_sin_escolaridad").value) + 
			    		   parseInt(document.getElementById("poblacion_nivel_educ_basica").value) + 
			    		   parseInt(document.getElementById("poblacion_nivel_educ_media").value)	+ 
			    		   parseInt(document.getElementById("poblacion_nivel_educ_superior").value);
			    
			   /* var especificosReclusion = parseInt(document.getElementById("poblacion_especific_reclusion").value) + 
			    		   parseInt(document.getElementById("poblacion_especific_indigenas").value) + 
			    		   parseInt(document.getElementById("poblacion_especific_migrantes").value) + 
			    		   parseInt(document.getElementById("poblacion_especific_con_discapacidad").value) + 
						   parseInt(document.getElementById("poblacion_especific_otro_cantidad").value);	*/
						   
			    var poblacionObjetivo = true;

			    var pubABenefic = parseInt(document.getElementById("meta_num_publico").value);

			    if(sumTot != pubABenefic){
			    	document.getElementById("errpoblacion_suma").style.display = 'block';
			    	poblacionObjetivo_edad = false;
			    }else{
			    	document.getElementById("errpoblacion_suma").style.display = 'none';
			    	poblacionObjetivo_edad = true;
			    }

			    if(sumTot > pubABenefic){
			    	document.getElementById("errpoblacion_Sobrepasa_suma").style.display = 'block';
			    	document.getElementById("errpoblacion_suma").style.display = 'none';
			    	poblacionObjetivo_edad = false;
			    	document.getElementById("poblacion_genero_mujer").value  = 0;
			    	document.getElementById("poblacion_genero_hombre").value  = 0;
			    }else{
			    	document.getElementById("errpoblacion_Sobrepasa_suma").style.display = 'none';
			    	poblacionObjetivo_edad = true;
			    }
				
			    if(sumTot != sumaEdad){
			    	document.getElementById("errpoblacion_edad").style.display = 'block';
			    	poblacionObjetivo_edad = false;
			    }else{
			    	document.getElementById("errpoblacion_edad").style.display = 'none';
			    	poblacionObjetivo_edad = true;
			    }

			    if(sumTot != sumaNivAca){
			    	document.getElementById("errpoblacion_nivel").style.display = 'block';
			    	poblacionObjetivo_nivel = false;
			    }else{
			    	document.getElementById("errpoblacion_nivel").style.display = 'none';
			    	poblacionObjetivo_nivel = true;
			    }

			   /* if(sumTot != especificosReclusion) {
			    	document.getElementById("errpoblacion_especific").style.display = 'block';
			    	poblacionObjetivo_especific = false;
					var valor = 0;
			    }else{
			    	document.getElementById("errpoblacion_especific").style.display = 'none';
			    	poblacionObjetivo_especific = true;
			    }*/
				//(FIN) CALCULO Población	   
				
				var url_X='receptor2_Proyecto.php?variable='+this.name+'&valor='+this.value;
	
				hacerPeticion(url_X);
			  }
          }
		  //FIN .calc_poblacion
		  
		  
		  
		  
		       //INICIO fecha cronograma 3 obligatorios
		  var set_pdate = document.querySelectorAll(".validafecha");
			
		  for (var i = 0; i < set_pdate.length; i++) {
			   set_pdate[i].onchange = function () {
				   
			//console.log(this.name, this.value);
				   
			   var fecha_inicial = this.value.split('/');
 			   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
			
			   var fecha_final = document.getElementById("crono_fechaacciones_fin_a").value.split('/');
			   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
				   
				   var nombre_a='crono_fechaacciones_a'; 
			
					if(document.getElementById("crono_fechaacciones_a").value!='' && document.getElementById("crono_fechaacciones_fin_a").value!='')
					{
						if(new Date(fecha_ini).getTime() <= new Date(fecha_fin).getTime())
						{
							document.getElementById("errfechacrono").style.display = 'none';
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono").style.display = 'block';
							//console.log('Fecha A mal');	
							document.getElementById("crono_fechaacciones_a").value = '';
							var valor_fech = '';
						}	
				   } else {
					   //ument.getElementById("errfechacrono").style.display = 'block';
							//console.log('Fecha A mal vacio');	
							document.getElementById("crono_fechaacciones_a").value = this.value;
							var valor_fech = this.value;
					   }				   
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_a+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }	  
		  
		  
		  var set_pdateb = document.querySelectorAll(".validafechab");
			
		  for (var i = 0; i < set_pdateb.length; i++) {
			   set_pdateb[i].onchange = function () {
				//console.log('entro a crono_fechaacciones_b');

				   var fecha_inicial_b = this.value.split('/');
				   var fecha_ini_b = fecha_inicial_b[2] + '/' + fecha_inicial_b[1] + '/' + fecha_inicial_b[0];
				   
				   var fecha_final_a = document.getElementById("crono_fechaacciones_fin_a").value.split('/');
				   var fecha_fin_a = fecha_final_a[2] + '/' + fecha_final_a[1] + '/' + fecha_final_a[0];

				   var fecha_inicio_antecede_a = document.getElementById("crono_fechaacciones_a").value.split('/');
				   var fecha_inicio_antecede_a_val = fecha_inicio_antecede_a[2] + '/' + fecha_inicio_antecede_a[1] + '/' + fecha_inicio_antecede_a[0];
				   
				   var nombre_b='crono_fechaacciones_b'; 	

				   if(document.getElementById("crono_fechaacciones_b").value!='' && document.getElementById("crono_fechaacciones_fin_a").value!='')
					{
						//console.log(fecha_ini_b);
						//console.log(fecha_inicio_antecede_a_val);

						//if(new Date(fecha_fin_a).getTime() <= new Date(fecha_ini_b).getTime())
						if(new Date(fecha_ini_b).getTime() >= new Date(fecha_inicio_antecede_a_val).getTime())//cambio el 18/03/2020 version 2
						{
							//console.log('si las esta pasando como fechas ');	
							document.getElementById("errfechacrono_b").style.display = 'none';
							//console.log('Fecha B bien');	
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono_b").style.display = 'block';	
							//console.log('Fecha B mal');	
							document.getElementById("crono_fechaacciones_b").value = '';
							var valor_fech = this.value;
						}	
				   } else {
					   //document.getElementById("errfechacrono_b").style.display = 'block';
							//console.log('Fecha A mal vacio');	
							document.getElementById("crono_fechaacciones_b").value = this.value;
							var valor_fech = this.value;
					   }	
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_b+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }
		  
		  var set_pdatec = document.querySelectorAll(".validafechac");
			
		  for (var i = 0; i < set_pdatec.length; i++) {
			   set_pdatec[i].onchange = function () {

				   var fecha_inicial_c = this.value.split('/');
				   var fecha_ini_c = fecha_inicial_c[2] + '/' + fecha_inicial_c[1] + '/' + fecha_inicial_c[0];
				   
				   var fecha_final_b = document.getElementById("crono_fechaacciones_fin_b").value.split('/');
				   var fecha_fin_b = fecha_final_b[2] + '/' + fecha_final_b[1] + '/' + fecha_final_b[0];

 			    var fecha_inicio_antecede_b = document.getElementById("crono_fechaacciones_b").value.split('/');
				var fecha_inicio_antecede_b_val = fecha_inicio_antecede_b[2] + '/' + fecha_inicio_antecede_b[1] + '/' + fecha_inicio_antecede_b[0];
				   
				   var nombre_c='crono_fechaacciones_c'; 
				   
				   if(document.getElementById("crono_fechaacciones_c").value!='' && document.getElementById("crono_fechaacciones_fin_b").value!='')
					{
						//if(new Date(fecha_fin_b).getTime() <= new Date(fecha_ini_c).getTime())
						if(new Date(fecha_ini_c).getTime() >= new Date(fecha_inicio_antecede_b_val).getTime())//cambio el 18/03/2020 version 2
						{							
							document.getElementById("errfechacrono_c").style.display = 'none';
							var valor_fech = this.value;	
						} else {
							document.getElementById("errfechacrono_c").style.display = 'block';	
							//console.log('Fecha C mal');	
							document.getElementById("crono_fechaacciones_c").value = '';
							var valor_fech = '';
						}	
				   } else {
					  // document.getElementById("errfechacrono_c").style.display = 'block';
							//console.log('Fecha A mal vacio');	
							document.getElementById("crono_fechaacciones_c").value = this.value;
							var valor_fech = this.value;
					   }	
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_c+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }
		  
		  
		  var set_pdatefa = document.querySelectorAll(".validafecha_fina");
			
		  for (var i = 0; i < set_pdatefa.length; i++) {
			   set_pdatefa[i].onchange = function () {
				   
			   var fecha_final = this.value.split('/');
 			   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
			   			
			   var fecha_inicial = document.getElementById("crono_fechaacciones_a").value.split('/');
			   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
			   
			   var nombre_a='crono_fechaacciones_fin_a'; 
			
					if(document.getElementById("crono_fechaacciones_fin_a").value!='')
					{
						//console.log(crono_fechaacciones_fin_a)
						//undefined
						
						if(this.name=="crono_fechaacciones_fin_a" && new Date(fecha_ini).getTime() <= new Date(fecha_fin).getTime())
						{
							document.getElementById("errfechacrono_fin_a").style.display = 'none';
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono_fin_a").style.display = 'block';
							//console.log('Fecha A mal');	
							document.getElementById("crono_fechaacciones_fin_a").value = '';
							var valor_fech = '';
						}
				   }
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_a+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }	  
		  
		  var set_pdatefb = document.querySelectorAll(".validafecha_finb");
			
		  for (var i = 0; i < set_pdatefb.length; i++) {
			   set_pdatefb[i].onchange = function () {
				   
			   var fecha_final_b = this.value.split('/');
 			   var fecha_fin_b = fecha_final_b[2] + '/' + fecha_final_b[1] + '/' + fecha_final_b[0];
			   			
			   var fecha_inicial_b = document.getElementById("crono_fechaacciones_b").value.split('/');
			   var fecha_ini_b = fecha_inicial_b[2] + '/' + fecha_inicial_b[1] + '/' + fecha_inicial_b[0];
			   
			   var nombre_b='crono_fechaacciones_fin_b'; 
			
					if(document.getElementById("crono_fechaacciones_fin_b").value!='')
					{
						//console.log('entro')
						if(this.name=="crono_fechaacciones_fin_b" && new Date(fecha_ini_b).getTime() <= new Date(fecha_fin_b).getTime())
						{
							document.getElementById("errfechacrono_fin_b").style.display = 'none';
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono_fin_b").style.display = 'block';
							//console.log('Fecha B mal');	
							document.getElementById("crono_fechaacciones_fin_b").value = '';
							var valor_fech = '';
						}
				   }
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_b+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }	  
		  
		  var set_pdatefc = document.querySelectorAll(".validafecha_finc");
			
		  for (var i = 0; i < set_pdatefc.length; i++) {
			   set_pdatefc[i].onchange = function () {
			
			   var fecha_final_c = this.value.split('/');
 			   var fecha_fin_c = fecha_final_c[2] + '/' + fecha_final_c[1] + '/' + fecha_final_c[0];
			   
			   var fecha_inicial_c = document.getElementById("crono_fechaacciones_c").value.split('/');
			   var fecha_ini_c = fecha_inicial_c[2] + '/' + fecha_inicial_c[1] + '/' + fecha_inicial_c[0];
			   
			   var nombre_c='crono_fechaacciones_fin_c'; 
			   
					if(document.getElementById("crono_fechaacciones_fin_c").value!='')
					{
						if(document.getElementById("fechaacciones_P1")){
							/*var fechaacciones_P1 = document.getElementById("fechaacciones_P1").value.split('/');
			   				var fechaacciones_PUNO = fechaacciones_P1[2] + '/' + fechaacciones_P1[1] + '/' + fechaacciones_P1[0];
							//&& new Date(fechaacciones_PUNO).getTime() >= new Date(fecha_fin_c).getTime()*/

							if(this.name=="crono_fechaacciones_fin_c" && new Date(fecha_ini_c).getTime() <= new Date(fecha_fin_c).getTime())								
							{
								document.getElementById("errfechacronos_fin_c").style.display = 'none';
								var valor_fech = this.value;
							
							} else {
								document.getElementById("errfechacronos_fin_c").style.display = 'block';
								//console.log('Fecha C mal');	
								document.getElementById("crono_fechaacciones_fin_c").value = '';							
								var valor_fech = '';
							}
						} else {

							//console.log("no hay nuevos registros");
							if(this.name=="crono_fechaacciones_fin_c" && new Date(fecha_ini_c).getTime() <= new Date(fecha_fin_c).getTime())
							{
								document.getElementById("errfechacrono_c").style.display = 'none';
								var valor_fech = this.value;
							
							} else {
								document.getElementById("errfechacrono_c").style.display = 'block';
								//console.log('Fecha C mal');	
								document.getElementById("crono_fechaacciones_fin_c").value = '';
								
								var valor_fech = '';
							}
						}
				   }
				  
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_c+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }
		  ///// FIN cronograma 3 obligatorios
		  
		  
		  
		  //////////////////***************************INICIO Solo textarea
		  
		  //INICIO .proyectocampo Alta y Modificación Proyecto 1er. pestaña
		  var set_pcX = document.querySelectorAll(".guardar_campostext");
		
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
				   
			   var campos_text_area=this.name;
			   var datos_campos_text_area=this.value;
			   
					var valor1=datos_campos_text_area.replace(new RegExp("	","g"), " ");
					var valor2=valor1.replace(new RegExp("	","g"), "- ");
					var valor=valor2.replace(new RegExp("\n","g"), "<br>");
					
					//console.log(datos_campos_text_area);			
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.umentMode;
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					    var navegador;
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					////////////FIN VERIFICAR EL NAVEGADOR							
				var url_Xy='receptor7_textarea.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				hacerPeticion(url_Xy);
			  }
          }		  		  
		  //////////////////***************************FIN Solo textarea
		</script> 
	<script>	
	function habilitar(form)
	{
		 if($("#poblacion_especific_otros:checked").val()==1) {
			document.getElementById("poblacion_especific_otro_nombre").disabled=false;
			document.getElementById("poblacion_especific_otro_cantidad").disabled=false;
		}
		else {
			document.getElementById("poblacion_especific_otro_nombre").disabled=true;
			document.getElementById("poblacion_especific_otro_cantidad").disabled=true;
			poblacion_especific_otro_nombre.value = "";
			poblacion_especific_otro_cantidad.value = "";

			var uno_poblacion_especific_otro_nombre="";
			var uno_poblacion_especific_otro_cantidad = "";
			 
				var url_z2='receptor2_check.php?poblacion_especific_otro_nombre='+uno_poblacion_especific_otro_nombre+'&poblacion_especific_otro_cantidad='+uno_poblacion_especific_otro_cantidad;
							
				hacerPeticion(url_z2);
		}
	}
	
	function habilitarV(form)
	{
		if($("#estrategias_medios_otros:checked").val()==1) {
			document.getElementById("estrategias_medios_otros_nombre").disabled=false;
		}
		else {
			document.getElementById("estrategias_medios_otros_nombre").disabled=true;
			estrategias_medios_otros_nombre.value = "";
			
				var uno_poblacion_especific_otro_nombre = "";
			 
				var url_z2='receptor3_check.php?estrategias_medios_otros_nombre='+uno_poblacion_especific_otro_nombre;
							
				hacerPeticion(url_z2);
			
		}
	}
 </script>
        <script>

		$('.btnNext').click(function(){
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
		window.scrollTo(300, 0);
		});
		
		  $('.btnPrevious').click(function(){
		  $('.nav-tabs > .active').prev('li').find('a').trigger('click');    
		  window.scrollTo(300, 0);	    	
		});
		
		</script> 
        <script type="text/javascript" src="js/obten_porcentaje.js"></script>
        <script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
  </body>
</html>