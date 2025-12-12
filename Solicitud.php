<?php 
  ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  
require_once('./Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
//$cve_user = "jghernandez20*1709";

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
		$pdf->SetFont('times', '', 10);
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
		$img_file = 'formatos_para_descarga_general/conv2025/version2_hoja1_2025.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, 2, 3, 218, 280, '', '', '', false, 500, '', false, false, 0);
		
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

			//inicio entidades tabla proyecto
			$entidades_a1	=	$registro3['entidades_a1'];
			$entidades_a2	=	$registro3['entidades_a2'];
			$entidades_a3	=	$registro3['entidades_a3'];
			$entidades_a4	=	$registro3['entidades_a4'];
			$entidades_a5	=	$registro3['entidades_a5'];
			$entidades_a6	=	$registro3['entidades_a6'];
			$entidades_a7	=	$registro3['entidades_a7'];
			$entidades_a8	=	$registro3['entidades_a8'];
			$entidades_a9	=	$registro3['entidades_a9'];
			$entidades_a10	=	$registro3['entidades_a10'];
			//fin entidades
			 			
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
			$monto_coinversion= $registro4['monto_coinversion'];
			//FIN consulta tabla solicitud 2. Características generales del festival

  		//fin datos administrativos  							
		$pdf->SetY(75.3);
		$pdf->SetX(172);
		$pdf->writeHTMLCell(0, 0, '', '',$id_solicitud, 0, 0, 0, true, 'L', false);	
			  
		$pdf->SetY(78.9);
		$pdf->SetX(172);
		$pdf->writeHTMLCell(36, 0, '', '',$fecha_hora_captura_concluida, 0, 0, 0, true, 'L', false);	
			  
		$pdf->SetY(105);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_instancia_postulante_imp, 0, 0, 0, true, 'L', false);

		$pdf->SetY(111);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'L', false);
	
		$pdf->SetY(118);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo, 0, 0, 0, true, 'L', false);

		$pdf->SetY(124);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$row['telefono_fijo'].'&nbsp;&nbsp;&nbsp;&nbsp; <strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$row['extension'], 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(130);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$row['Correo_tit'], 0, 0, 0, true, 'L', false);

		
		$pdf->SetY(135);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Código Postal</strong>&nbsp;&nbsp;&nbsp;".$cp."&nbsp;&nbsp;&nbsp;<strong>Estado</strong>&nbsp;&nbsp;&nbsp;".$estado_imp, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(138.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Municipio o Alcaldía</strong>&nbsp;&nbsp;&nbsp;".$D_mnpio, 0, 0, 0, true, 'L', false);
                
		$pdf->SetY(142);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Colonia</strong>&nbsp;&nbsp; ".$d_asenta, 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(145);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Calle</strong>&nbsp;&nbsp;&nbsp;".$row['calle'], 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(148);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>No. exterior</strong>&nbsp;&nbsp;&nbsp;".$row['no_ext']."&nbsp;&nbsp;&nbsp;<strong>No. interior</strong>&nbsp;&nbsp;&nbsp;".$row['no_int'], 0, 0, 0, true, 'L', false);

		$pdf->SetY(152.7);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$CLUNI, 0, 0, 0, true, 'L', false);

		
		
		$consulta_p3_sol="SELECT * FROM proyecto_parte2 
		WHERE clave_usuario='".$cve_user."';";
		$consulta_p3_sol2=mysqli_query($con, $consulta_p3_sol);
		
		$registro3_sol3=mysqli_fetch_array($consulta_p3_sol2,MYSQLI_ASSOC);

	  $nombre_dir			=	$registro3_sol3['nombre_dir'];
	  $primer_apellido_dir	=	$registro3_sol3['primer_apellido_dir'];
	  $segundo_apellido_dir	=	$registro3_sol3['segundo_apellido_dir'];
	  $telefono_fijo_dir	=	$registro3_sol3['telefono_fijo_dir'];
	  $extension_dir		=	$registro3_sol3['extension_dir'];
	  $telefono_movil_dir	=	$registro3_sol3['telefono_movil_dir'];
		$pdf->SetY(159);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_dir.' '.$primer_apellido_dir.' '.$segundo_apellido_dir, 0, 0, 0, true, 'L', false);
		$pdf->SetY(166.7);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_dir.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp; '.$telefono_movil_dir.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_dir, 0, 0, 0, true, 'L', false);



		//INICIO DATOS TABLA PROYECTO

		//INICIO Datos Responsable administrativo 
		
		$pdf->SetY(174);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre3_adm, 0, 0, 0, true, 'L', false);
		
		/*$pdf->SetY(186.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo_adm, 0, 0, 0, true, 'L', false);*/

		$pdf->SetY(183);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_adm.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp; '.$telefono_movil_adm.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_adm, 0, 0, 0, true, 'L', false);
 
		$pdf->SetY(189.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$correo_electronico_adm, 0, 0, 0, true, 'L', false);	

		//FIN Datos Responsable administrativo 

	 	//INICIO Datos Responsable operativa
		
		$pdf->SetY(198.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre3_op, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(208);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(215.8);
		$pdf->SetX(88);	
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_op.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp;&nbsp; '.$telefono_movil_op.'&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(222.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$Correo_electronico_op, 0, 0, 0, true, 'L', false);

		
		//FIN Datos Responsable operativa 

		//INICIO Características generales del festival
		$pdf->SetY(236.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_festival, 0, 0, 0, true, 'L', false);

				
		/*
		$pdf->SetY(209);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(95, 1, '', '',$objetivo_general, 0, 0, 0, true, 'L', false);
				*/
	}
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Secretaría de Cultura');
		$pdf->SetTitle('Formato Solicitud');
		$pdf->SetFont('times', '', 10);
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
		$img_file = 'formatos_para_descarga_general/conv2025/version2_hoja2_2025.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, -7, -10, 232, 300, '', '', '', false, 500, '', false, false, 0);
		
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();


	
function imprmirentidades($var_ent, $con) {
		$cons_enti="SELECT * FROM entidades where id_entidad_proyecto=$var_ent;";
		$query_enti2=mysqli_query($con, $cons_enti);
		if (!$query_enti2) {
			die('Consulta no válida: ' . mysqli_error());
		}
		$cuantos_id=mysqli_num_rows($query_enti2);
		while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
		$id_entidad_proyecto 			=	$r_enti2['id_entidad_proyecto'];
		$nombre_entidad_proyecto	=	$r_enti2['nombre_entidad_proyecto'];
		}
		return $nombre_entidad_proycto_imp = $nombre_entidad_proyecto;
	}

		$pdf->SetY(50);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','1: '.imprmirentidades($entidades_a1, $con), 0, 0, 0, true, 'L', false);
		if($entidades_a2!=''){  
		$pdf->SetY(54);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','2: '.imprmirentidades($entidades_a2, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a3!=''){  
		$pdf->SetY(58);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','3: '.imprmirentidades($entidades_a3, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a4!=''){  
		$pdf->SetY(62);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','4: '.imprmirentidades($entidades_a4, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a5!=''){  
		$pdf->SetY(66);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','5: '.imprmirentidades($entidades_a5, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a6!=''){  
		$pdf->SetY(70);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','6: '.imprmirentidades($entidades_a6, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a7!=''){ 
		$pdf->SetY(74);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','7: '.imprmirentidades($entidades_a7, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a8!=''){ 
		$pdf->SetY(78);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','8: '.imprmirentidades($entidades_a8, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a9!=''){ 
		$pdf->SetY(82);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','9: '.imprmirentidades($entidades_a9, $con), 0, 0, 0, true, 'L', false);
		}
		if($entidades_a10!=''){ 
		$pdf->SetY(86);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '','10: '.imprmirentidades($entidades_a10, $con), 0, 0, 0, true, 'L', false);
		}
		$pdf->SetY(93);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$numero_ediciones_previas, 0, 0, 0, true, 'L', false);


		/*
		2023
		1. Música
		2. Teatro
		3. Danza
		7. Cine
		6. Literatura
		4. Artes visuales y diseño
		5. Cultura Alimentaria
		8. Multidisciplina
		*/

		if($disciplina_2022=='1'){//Música
			$pdf->SetY(99.7);
			$pdf->SetX(101);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='3'){//Danza
			$pdf->SetY(99.7);
			$pdf->SetX(118.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='2'){//Teatro
			$pdf->SetY(99.7);
			$pdf->SetX(135);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}		
		if($disciplina_2022=='7'){//Cine
			$pdf->SetY(99.7);
			$pdf->SetX(152);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='8'){//Multidisciplina
			$pdf->SetY(99.7);
			$pdf->SetX(164.2);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='6'){//Literatura
			$pdf->SetY(103.5);
			$pdf->SetX(94.4);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='4'){//Artes visuales y diseño
			$pdf->SetY(103.5);
			$pdf->SetX(117.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='5'){//Cultura Alimentaria
			$pdf->SetY(103.5);
			$pdf->SetX(162.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}

		$pdf->SetY(109);
		$pdf->SetX(140);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_inicio, 0, 0, 0, true, 'L', false);

		$pdf->SetY(114);
		$pdf->SetX(140);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_termino, 0, 0, 0, true, 'L', false);
	
		switch($Info_financiera_categoria){
			case "A":
			$nombre_Info_financiera_categoria="a)	$300,000.00 (con puntaje <br>mínimo de 170 puntos).";
			$monto_solo='$300,000.00';
			break;
			case "B":
			$nombre_Info_financiera_categoria="b)	$500,000.00 (con puntaje <br>mínimo de 175 puntos).";
			$monto_solo='$500,000.00';
			break;
            case "C":
			$nombre_Info_financiera_categoria="c)	$1,000,000.00 (con puntaje <br>mínimo de 180 puntos).";
			$monto_solo='$1,000,000.00';
			break;
			case "D":
			$nombre_Info_financiera_categoria="d)	$1,500,000.00 (con puntaje <br>mínimo de 185 puntos).";
			$monto_solo='$1,500,000.00';
			break;
            case "E":
			$nombre_Info_financiera_categoria="e)	$2,000,000.00 (con puntaje <br>mínimo de 195 puntos).";
			$monto_solo='$2,000,000.00';
			break;         
		}

		$pdf->SetY(127);
		$pdf->SetX(85);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_Info_financiera_categoria, 0, 0, 0, true, 'L', false);

		$pdf->SetY(132);//Apoyo financiero solicitado a la Secretaría de Cultura - % COSTO TOTAL DEL PROYECTO
		$pdf->SetX(128.5);
		$pdf->writeHTMLCell(40, 0, '', '',$monto_solo, 0, 0, 0, true, 'C', false);

		$pdf->SetY(132);//Apoyo financiero solicitado a la Secretaría de Cultura - % COSTO TOTAL DEL PROYECTO
		$pdf->SetX(171);
		$pdf->writeHTMLCell(40, 0, '', '',number_format($Infor_finan_apoyo_costo_total,0,'','').'%', 0, 0, 0, true, 'C', false);

		$pdf->SetY(139.5);//Costo total de realización del Festival - MONTO
		$pdf->SetX(76);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_costo_monto, 0, 0, 0, true, 'C', false);

		$pdf->SetY(147.3);
		$pdf->SetX(86);
		$pdf->writeHTMLCell(0, 0, '', '','$'.$monto_coinversion, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(223);
		$pdf->SetX(10);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'C', false);
		$pdf->SetY(226);
		$pdf->SetX(11);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo, 0, 0, 0, true, 'C', false);
	
		
	
	
	/*
		$pdf->SetY(25);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>1. Número de actividades artísticas y/o culturales/ Número de títulos, cortometrajes, largometrajes, entre otros:</strong>&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_presentaciones, 0, 0, 0, true, 'L', false);

		$pdf->SetY(32);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>2. Total de público:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_publico, 0, 0, 0, true, 'L', false);

		$pdf->SetY(36);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>3. Número de municipios/alcaldias a beneficiar:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_municipio, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(40);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>4. Número de foros, sedes o medios de transmisión que se utilizarán:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_foros, 0, 0, 0, true, 'L', false);

		$pdf->SetY(44);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>5. Número total de participantes:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_artistas, 0, 0, 0, true, 'L', false);

		$pdf->SetY(49);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>6. Cantidad de grupos artísticos / Secciones o categorías de participación para &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exhibición de películas, cortometrajes, entre otros:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_cantidad_grupos, 0, 0, 0, true, 'L', false);

		$pdf->SetY(56);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>7. Número de actividades académicas:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_actividades_academicas, 0, 0, 0, true, 'L', false);

		$pdf->SetY(60);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>8. Número de actividades a cargo de participantes locales/ Número de títulos de cine mexicano:</strong>&nbsp;&nbsp;&nbsp;'.$meta_act_creadores_num_cine_mex, 0, 0, 0, true, 'L', false);

		
		$pdf->SetY(105.5);//Apoyo financiero solicitado a la Secretaría de Cultura - MONTO
		$pdf->SetX(112);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'C', false);

			

		$pdf->SetFont('times', '', 9);
		$cad_compromisos1="<strong>1. Certifico que el festival postulado en esta convocatoria, no se encuentra gestionando o recibirá otros recursos del Programa de Apoyos a la Cultura S268.
		<br><br>
		2.	Nos comprometemos a salvaguardar la ley de derechos de autor vigente para todas las actividades artísticas y/o culturales a realizar en el marco del proyecto.
		<br><br>
		3.	Certifico que toda la información proporcionada a través de la Plataforma PROFEST, es verídica y útil para el llenado de los
formatos de Proyecto Cultural y Presupuesto y Programación, para su análisis y eventual evaluación de las Comisiones Dictaminadoras.
		<br><br>
		4. Si soy Institución Pública nos comprometemos a realizar la gestión correspondiente ante la Secretaría de Finanzas Estatal o su similar, para el envío de la documentación requerida por la Secretaría de Cultura, en caso de ser beneficiarios.
		<br><br>
	5. En caso de presentar programación a cargo de participantes extranjeros, nos comprometemos y responsabilizamos de llevar a cabo las gestiones correspondientes ante el Instituto Nacional de Migración para la internación de artistas y toda la demás normatividad aplicable.</strong>";
		
		///se borro 29012023 convocatoria 2022 $cad_compromisos2="<strong>1. Certifico que el festival postulado en esta convocatoria, no se encuentra gestionando o recibirá otros apoyos de origen federal.
		//<br><br>
		//2.	Nos comprometemos a salvaguardar la ley de derechos de autor vigente para todas las actividades artísticas y/o culturales a realizar en el marco del proyecto.
		//<br><br>
		//3.	Certifico que toda la información proporcionada a través de la Plataforma PROFEST, es verídica y útil para el llenado de los
//formatos de Proyecto Cultural y Presupuesto y Programación, para su análisis y eventual evaluación de las Comisiones Dictaminadoras..</strong>";
		
		//if($tipo_instancia==5) $cad_imp_compromisos2=$cad_compromisos2; else $cad_imp_compromisos2=$cad_compromisos1;

		$pdf->SetY(125);
		$pdf->SetX(15);
		$pdf->writeHTMLCell(175, 0, '', '',$cad_compromisos1, 0, 0, 0, true, 'L', false);
		
	*/
		//FIN Características generales del festival		
		//para terminar e mostrar el pdf completo:
	}
}

        //ver desde el navegador 
		$pdf->Output('Solicitud_PROFEST.pdf');
		//descargar el PDF
		//$pdf->Output('Solicitud_PROFEST.pdf', 'D');
?>