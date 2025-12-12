<?php 
  ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  
require_once('./Connections/conexion.php');

/*//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
//$cve_user = "jghernandez20*1709";*/
$cve_user = $_GET['cve_user_imp'];
$id_solicitud = $_GET['id_solicitud'];

header('Content-Type: text/html; charset=ISO-8859-1');
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-master/tcpdf.php');
$var = 1;
		//creo mi objeto pdf y le doy valores generales
		$pdf = new TCPDF('L', PDF_UNIT, 'LETTER', true, 'UTF-8', false);

		for($j = 0; $j < $var; $j++){
			if($j == 0){

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Secretaría de Cultura');
		$pdf->SetTitle('Formato Solicitud');
		$pdf->SetFont('times', '', 7);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->AddPage('P', 'LETTER');
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->Write(0, '', '', 0, 'P', true, 0, false, false, 0);
		
		//background
		// get the current page break margin
		$bMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		
		// Le paso la ruta de la imagen que se usará de fondo
		$img_file = 'formatos_para_descarga_general/para_PDF/Solicitud_Pagina_1.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, -7, -10, 232, 300, '', '', '', false, 500, '', false, false, 0);
		
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();
		
        $consulta_rep="SELECT * FROM usuarios where clave_usuario='".$cve_user."';";
        $exe_consulta=mysqli_query($con, $consulta_rep);
		
		while($row=mysqli_fetch_array($exe_consulta, MYSQLI_ASSOC)){
				$cp=$row['cp'];
				$estado=$row['estado'];
				$municio_alcaldia=$row['municio_alcaldia'];
				$colonia=$row['colonia'];
				$nombre_titular = $row['nombre_titular'];
				$primer_apellido = $row['primer_apellido'];
				$segundo_apellido = $row['segundo_apellido'];
				$nombre_grado_academico = $row['grado_academico'];
				$nombre_instancia_postulante_imp = $row['nombre_instancia_postulante'];
				$CLUNI = $row['CLUNI'];
				$tipo_instancia=$row['tipo_instancia'];
		// ******************************(INICIO)validar grado academico******************************
		if($grado_academico=="Doctor" || $grado_academico=="DOCTOR" || $grado_academico=="Dr."){
			$nombre_grado_academico = "Dr.";
		}
		if($grado_academico=="Dra." || $grado_academico=="Doctora" || $grado_academico=="DOCTORA"){
			$nombre_grado_academico = "Dra.";
		}
		if($grado_academico=="Maestro" || $grado_academico=="Profesor" || $grado_academico=="MAESTRO" || $grado_academico=="Mtro."){
			$nombre_grado_academico = "Mtro.";
		}
		if($grado_academico=="Maestra" || $grado_academico=="MAESTRA" || $grado_academico=="Mtra."){
			$nombre_grado_academico = "Mtra.";
		}
		if($grado_academico=="C.P." || $grado_academico=="lic" || $grado_academico=="Lic en Pedagogía" || 
		$grado_academico=="Licenciada" || $grado_academico=="Licenciada en Arquitectura" || $grado_academico=="Licenciado" || $grado_academico=="Licenciado en Economía"
		|| $grado_academico=="Licenciado en Informatica" || $grado_academico=="Licenciatura" || $grado_academico=="LICENCIATURA EN CIENCIAS DE LA EDUCACION" 
		|| $grado_academico=="LICENCIATURA EN DISEÑO PARA LA COMUNICACIÓN GRÁFICA" || $grado_academico=="Licenciaturas" || $grado_academico=="Lic en Pedagogía" 
		|| $grado_academico=="licenciado" || $grado_academico=="LICENCIADO" || $grado_academico=="LICENCIATURA" || $grado_academico=="Licenciatura" || $grado_academico=="C.P." || $grado_academico=="Lic."){
			$nombre_grado_academico = "Lic.";
		}
		if($grado_academico=="Ingeneniero" || $grado_academico=="INGENIERÍA" || $grado_academico=="Ingeniero" || 
		$grado_academico=="INGENIERO EN SISTEMAS" || $grado_academico=="INGENIERO INDUSTRIAL" || $grado_academico=="INGENIERIA" || $grado_academico=="Ing."){

			$nombre_grado_academico = "Ing.";
		}
		
		if($grado_academico=="Bachillerato" || $grado_academico=="CARRERA TECNICA" || $grado_academico=="Ciudadano" || $grado_academico=="ciudadano" ||
		$grado_academico=="MEDIO SUPERIOR" || $grado_academico=="Preparatoria" || $grado_academico=="Secundaria" || 
		$grado_academico=="Técnico" || $grado_academico=="Universitario" || $grado_academico=="Preparatoria" || $grado_academico=="EGRESADO" || $grado_academico=="C."){
			$nombre_grado_academico = "C.";
		}
		// ******************************(FIN)validar grado academico******************************	
		
		$cargo = $row['cargo'];
		$telefono_fijo = $row['telefono_fijo'];
		$lada = $row['lada'];
		$extension = $row['extension'];	
		
          $consulta_p2="SELECT cp, c_estado, d_estado, c_mnpio, D_mnpio, d_asenta FROM codigos_postales 
		  WHERE cp='$cp' and c_estado='$estado' and c_mnpio='$municio_alcaldia' and id_asenta_cpcons='$colonia';";
		  $consulta2=mysqli_query($con, $consulta_p2);

		  while($registro=mysqli_fetch_array($consulta2,MYSQLI_ASSOC)){
                $c_estado	=	$registro['c_estado'];
				$cp	=	$registro['cp'];
				$c_mnpio	=	$registro['c_mnpio'];
				$D_mnpio	=	$registro['D_mnpio'];
				$estado_imp =	$registro['d_estado'];
					
				if($cp=='85000' && $c_estado=='26' && $c_mnpio=='018' && $colonia=="0858"){	
					$d_asenta	= "Ciudad Obregón Centro (Fundo Legal)";
				} else {
					$d_asenta	=	$registro['d_asenta'];
				}	
		  }
			$consulta_p3="SELECT * FROM proyecto 
			WHERE clave_usuario='".$cve_user."';";
			$consulta3=mysqli_query($con, $consulta_p3);
			
			$registro3=mysqli_fetch_array($consulta3,MYSQLI_ASSOC);

			//inicio datos administrativo
  			$nombre3_adm	=	$registro3['responsable_adm_nombre']." ".$registro3['primer_apellido_adm']." ".$registro3['segundo_apellido_adm'];
  			$cargo_adm				=	$registro3['cargo_adm'];
  			$lada_adm				=	$registro3['lada_adm'];
  			$telefono_fijo_adm		=	$registro3['telefono_fijo_adm'];
  			$extension_adm			=	$registro3['extension_adm'];
  			$telefono_movil_adm		=	$registro3['telefono_movil_adm'];
  			$correo_electronico_adm	=	$registro3['correo_electronico_adm'];
  			//fin datos administrativos

            //inicio datos operativo    
			$nombre3_op	=	$registro3['responsable_op_nombre']." ".$registro3['primer_apellido_op']." ". $registro3['segundo_apellido_op'];
			
			$cargo_op	=	$registro3['cargo_op'];
			$lada_op	=	$registro3['lada_op'];
			$telefono_fijo_op	=	$registro3['telefono_fijo_op'];
			$extension_op			=	$registro3['extension_op'];
 			$telefono_movil_op		=	$registro3['telefono_movil_op'];
  			$Correo_electronico_op	=	$registro3['Correo_electronico_op'];
  			//fin datos operativo

			
			//INICIO consulta tabla solicitud 2. Características generales del festival
  			$consulta_p4="SELECT * FROM solicitud 
			WHERE clave_usuario='".$cve_user."';";
			$consulta4=mysqli_query($con, $consulta_p4);

			$registro4=mysqli_fetch_array($consulta4,MYSQLI_ASSOC);
			$id_solicitud			= 	$registro4['id_solicitud'];
  			$nombre_festival		=	$registro4["nombre_festival"];
  			$numero_ediciones_previas	=	$registro4['numero_ediciones_previas'];
		/*$disciplina_musica_v2  		= $registro4["disciplina_musica_v2"];
  			$disciplina_gastronomia_v2  = $registro4["disciplina_gastronomia_v2"];
  			$disciplina_danza_v2 		= $registro4["disciplina_danza_v2"];
			$disciplina_teatro_v2 		= $registro4["disciplina_teatro_v2"];
			$disciplina_literatura_v2  = $registro4["disciplina_literatura_v2"];
			$disciplina_artes_visuales_v2  = $registro4["disciplina_artes_visuales_v2"];
			$disciplina_cinematografia_v3  = $registro4["disciplina_cinematografia_v3"];
			$disciplina_multidisciplina_v3  = $registro4["disciplina_multidisciplina_v3"];*/

  			$objetivo_general		=	$registro4['objetivo_general'];
  			$pagina_web_festival	=	$registro4['pagina_web_festival'];
  			$facebook_festival		=	$registro4['facebook_festival'];
  			$twitter_festival		=	$registro4['twitter_festival'];

  			$meta_num_presentaciones	=	$registro4['meta_num_presentaciones'];
  			$meta_num_publico			=	$registro4['meta_num_publico'];
  			$meta_num_municipio			=	$registro4['meta_num_municipio'];
  			$meta_num_foros				=	$registro4['meta_num_foros'];
  			$meta_num_artistas			=	$registro4['meta_num_artistas'];
  			$meta_cantidad_grupos		=	$registro4['meta_cantidad_grupos'];
			
			$meta_num_actividades_academicas = $registro4["meta_num_actividades_academicas"];
			$meta_numero_grupos_ind_atender = $registro4["meta_numero_grupos_ind_atender"];
			$meta_act_creadores_num_cine_mex = $registro4["meta_act_creadores_num_cine_mex"];

  			$alcance_programacion = $registro4['alcance_programacion'];

  			$periodo_realizacion_fecha_inicio	= $registro4['periodo_realizacion_fecha_inicio'];
  			$periodo_realizacion_fecha_termino	= $registro4['periodo_realizacion_fecha_termino'];

  			$Info_financiera_categoria	= $registro4['Info_financiera_categoria'];
  			$Infor_finan_costo_monto	= $registro4['Infor_finan_costo_monto'];
  			$Infor_finan_apoyo_monto	= $registro4['Infor_finan_apoyo_monto'];
  			$Infor_finan_apoyo_costo_total	= $registro4['Infor_finan_apoyo_costo_total'];
			
			$Infor_finan_costo_monto = number_format($Infor_finan_costo_monto, 2, '.', ',');
			$Infor_finan_apoyo_monto = number_format($Infor_finan_apoyo_monto, 2, '.', ',');
			
			$fecha_hora_captura_concluida	= $registro4['fecha_hora_captura_concluida'];
			$disciplina_2022	= $registro4['disciplina_2022'];
			
			//FIN consulta tabla solicitud 2. Características generales del festival

  			//fin datos administrativos  							
		$pdf->SetY(38);
		$pdf->SetX(163);
		$pdf->writeHTMLCell(0, 0, '', '',$id_solicitud, 0, 0, 0, true, 'L', false);	
		
		$pdf->SetY(46);
		$pdf->SetX(163);
		$pdf->writeHTMLCell(0, 0, '', '',$fecha_hora_captura_concluida, 0, 0, 0, true, 'L', false);	
		
		$pdf->SetY(68);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_instancia_postulante_imp, 0, 0, 0, true, 'L', false);

		$pdf->SetY(75);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'L', false);
	
		$pdf->SetY(81.5);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo, 0, 0, 0, true, 'L', false);

		$pdf->SetY(88);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$row['telefono_fijo'].'&nbsp;&nbsp;&nbsp;&nbsp; <strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$row['extension'], 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(94);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$row['correo_electronico'], 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(101);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Código Postal</strong>&nbsp;&nbsp;&nbsp;".$cp."&nbsp;&nbsp;&nbsp;<strong>Estado</strong>&nbsp;&nbsp;&nbsp;".utf8_encode($estado_imp), 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(104);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Municipio o Alcaldía</strong>&nbsp;&nbsp;&nbsp;".utf8_encode($D_mnpio), 0, 0, 0, true, 'L', false);
                
		$pdf->SetY(107);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Colonia</strong>&nbsp;&nbsp; ".utf8_encode($d_asenta), 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(110);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Calle</strong>&nbsp;&nbsp;&nbsp;".utf8_encode($row['calle']), 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(113);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>No. exterior</strong>&nbsp;&nbsp;&nbsp;".$row['no_ext']."&nbsp;&nbsp;&nbsp;<strong>No. interior</strong>&nbsp;&nbsp;&nbsp;".$row['no_int'], 0, 0, 0, true, 'L', false);
  
		//INICIO DATOS TABLA PROYECTO

		//INICIO Datos Responsable administrativo 
		
		$pdf->SetY(121);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($nombre3_adm), 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(127.5);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($cargo_adm), 0, 0, 0, true, 'L', false);

		$pdf->SetY(134);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_adm.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp; '.$telefono_movil_adm.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_adm, 0, 0, 0, true, 'L', false);

		$pdf->SetY(140.5);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$correo_electronico_adm, 0, 0, 0, true, 'L', false);	

		//FIN Datos Responsable administrativo 

	 	//INICIO Datos Responsable operativa
		
		$pdf->SetY(147.5);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($nombre3_op), 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(154);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($cargo_op), 0, 0, 0, true, 'L', false);

		$pdf->SetY(160.5);
		$pdf->SetX(106);	
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_op.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp;&nbsp; '.$telefono_movil_op.'&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(167.5);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$Correo_electronico_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(174);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$CLUNI, 0, 0, 0, true, 'L', false);
		//FIN Datos Responsable operativa 

		//INICIO Características generales del festival
		$pdf->SetY(184);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($nombre_festival), 0, 0, 0, true, 'L', false);

		$pdf->SetY(190.5);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$numero_ediciones_previas, 0, 0, 0, true, 'L', false);

		/*1. Música
		2. Teatro
		3. Danza
		4. Artes visuales y diseño
		5. Cultura Alimentaria
		6. Literatura
		7. Cine
		8. Multidisciplina*/

		if($disciplina_2022=='1'){
			$pdf->SetY(197);
			$pdf->SetX(106.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='2'){
			$pdf->SetY(197);
			$pdf->SetX(124.1);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='3'){
			$pdf->SetY(197);
			$pdf->SetX(144.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='6'){
			$pdf->SetY(197);
			$pdf->SetX(164.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='7'){
			$pdf->SetY(197);
			$pdf->SetX(187.9);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='4'){
			$pdf->SetY(203.5);
			$pdf->SetX(106.8);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='5'){
			$pdf->SetY(203.5);
			$pdf->SetX(148);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='8'){
			$pdf->SetY(203.5);
			$pdf->SetX(182.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		
		$pdf->SetY(209);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(100, 1, '', '',utf8_encode($objetivo_general), 0, 0, 0, true, 'L', false);
				
	}
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Secretaría de Cultura');
		$pdf->SetTitle('Formato Solicitud');
		$pdf->SetFont('times', '', 7);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->AddPage('P', 'LETTER');
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->Write(0, '', '', 0, 'P', true, 0, false, false, 0);
		
		//background
		// get the current page break margin
		$bMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		
		// Le paso la ruta de la imagen que se usará de fondo
		$img_file = 'formatos_para_descarga_general/para_PDF/Solicitud_Pagina_2.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, -7, -10, 232, 300, '', '', '', false, 500, '', false, false, 0);
		
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();
	
		$pdf->SetY(40);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>1. Número de presentaciones artísticas/ Número de títulos, cortometrajes, largometrajes, entre otros:</strong>&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_presentaciones, 0, 0, 0, true, 'L', false);

		$pdf->SetY(46);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>2. Cantidad de público a beneficiar:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_publico, 0, 0, 0, true, 'L', false);

		$pdf->SetY(49);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>3. Número de municipios/alcaldias a beneficiar:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_municipio, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(52);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>4. Número de foros, sedes o medios de transmisión que se utilizarán:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_foros, 0, 0, 0, true, 'L', false);

		$pdf->SetY(55);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>5. Número de artistas, creadores, conferencistas, académicos, curadores, programadores, especialistas y participantes en general:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_artistas, 0, 0, 0, true, 'L', false);

		$pdf->SetY(61);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>6. Cantidad de grupos artísticos / Secciones o categorías de participación para exhibición de películas, cortometrajes, entre otros:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_cantidad_grupos, 0, 0, 0, true, 'L', false);

		$pdf->SetY(68);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>7. Número de actividades académicas:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_actividades_academicas, 0, 0, 0, true, 'L', false);

		$pdf->SetY(72);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>8. Número de actividades a cargo de creadores locales/ Número de títulos de cine mexicano:</strong>&nbsp;&nbsp;&nbsp;'.$meta_act_creadores_num_cine_mex, 0, 0, 0, true, 'L', false);

		$pdf->SetY(80);
		$pdf->SetX(175);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_inicio, 0, 0, 0, true, 'L', false);

		$pdf->SetY(86);
		$pdf->SetX(175);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_termino, 0, 0, 0, true, 'L', false);
	
		$pdf->SetY(102);
		$pdf->SetX(119);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'C', false);

		$pdf->SetY(102);
		$pdf->SetX(168);
		$pdf->writeHTMLCell(40, 0, '', '',number_format($Infor_finan_apoyo_costo_total,0,'','').'%', 0, 0, 0, true, 'C', false);

		$pdf->SetY(108);
		$pdf->SetX(119);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_costo_monto, 0, 0, 0, true, 'C', false);

		$pdf->SetFont('times', '', 9);
		$cad_compromisos1="<strong>1.	Certifico que el festival postulado en esta convocatoria, no se encuentra gestionando o recibirá otros apoyos de origen federal.
		<br><br>
		2.	Nos comprometemos a salvaguardar la ley de derechos de autor vigente para todas las obras a presentar en el marco de la realización del proyecto.
		<br><br>
		3.	Si soy Institución Pública nos comprometemos a realizar la gestión correspondiente ante la Secretaría de Finanzas Estatal o su similar, para el envío de la documentación requerida por la Secretaría de Cultura, en caso de ser beneficiarios.
		<br><br>
		4.	Certifico que toda la información proporcionada a través de la Plataforma PROFEST, es verídica y útil para el llenado de los formatos de Proyecto Cultural y Presupuesto y Programación, para su análisis y eventual evaluación de las Comisiones Dictaminadoras.</strong>";
		
		$cad_compromisos2="<strong>1.	Certifico que el festival postulado en esta convocatoria, no se encuentra gestionando o recibirá otros apoyos de origen federal.
		<br><br>
		2.	Nos comprometemos a salvaguardar la ley de derechos de autor vigente para todas las obras a presentar en el marco de la realización del proyecto.
		<br><br>
		3.	Certifico que toda la información proporcionada a través de la Plataforma PROFEST, es verídica y útil para el llenado de los formatos de Proyecto Cultural y Presupuesto y Programación, para su análisis y eventual evaluación de las Comisiones Dictaminadoras.</strong>";
		
		if($tipo_instancia==5) $cad_imp_compromisos2=$cad_compromisos2; else $cad_imp_compromisos2=$cad_compromisos1;

		$pdf->SetY(120);
		$pdf->SetX(11);
		$pdf->writeHTMLCell(175, 0, '', '',$cad_imp_compromisos2, 0, 0, 0, true, 'L', false);
		
		//INICIO ocultar etapa 1 v2
		$pdf->SetY(189);
		$pdf->SetX(65);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'C', false);

	
/*
		$pdf->SetY(157);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$pagina_web_festival, 0, 0, 0, true, 'L', false);

		$pdf->SetY(160.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($facebook_festival), 0, 0, 0, true, 'L', false);

		$pdf->SetY(164);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',utf8_encode($twitter_festival), 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(77);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '',$alcance_programacion, 0, 0, 0, true, 'L', false);
		
		$pdf->MultiCell(90,4,utf8_encode($nombre_titular.' '.$primer_apellido.' '.$segundo_apellido),0,'C');
		
		$y2 = $pdf->GetY();
		
		$pdf->SetY($y2);
		
		$pdf->Line(150, $y2, 65, $y2);
		$pdf->Cell(50);
		//Nombre y firma de la o el Títular de la Instancia Postulante
		$pdf->Cell(90,4,utf8_decode('Nombre y firma del Representante Legal de la Instancia'),0,0,'C');
		//FIN ocultar etapa 1 v2 
*/
		//FIN Características generales del festival		
		//para terminar e mostrar el pdf completo:
	}
}

        //ver desde el navegador 
		$nombre_archivo = 'Solicitud_PROFEST_'.$id_solicitud.'.pdf';
		$pdf->Output($nombre_archivo);
		//descargar el PDF
		//$pdf->Output('Solicitud_PROFEST.pdf', 'D');
?>