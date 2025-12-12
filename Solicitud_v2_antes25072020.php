<?php 
  ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  
require_once('Connections/profest_rep.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
//$cve_user = "jatziry30";

//header('Content-Type: text/html; charset=ISO-8859-1');
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-master/tcpdf.php');

		//creo mi objeto pdf y le doy valores generales
		$pdf = new TCPDF('L', PDF_UNIT, 'LETTER', true, 'UTF-8', false);
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
		$img_file = 'formatos_para_descarga_general/para_PDF/Solicitud8_v2.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 500, '', false, false, 0);
		
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();
				
		mysql_select_db($database_automaa,$automaa);
		
        $consulta_rep="SELECT * FROM usuarios where clave_usuario='".$cve_user."';";
        $exe_consulta=mysql_query($consulta_rep);
		
		while($row=mysql_fetch_array($exe_consulta)){
				$cp=$row['cp'];
				$estado=$row['estado'];
				$municio_alcaldia=$row['municio_alcaldia'];
				$colonia=$row['colonia'];
			
				$nombre_titular = $row['nombre_titular'];
				$primer_apellido = $row['primer_apellido'];
				$segundo_apellido = $row['segundo_apellido'];
						
				$nombre_grado_academico = $row['grado_academico'];
		
		// ******************************(INICIO)validar grado academico******************************
		/*if($grado_academico=="Doctor" || $grado_academico=="DOCTOR" || $grado_academico=="Dr."){
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
		}*/
		// ******************************(FIN)validar grado academico******************************	
		
		$nombre_instancia_postulante = $row['nombre_instancia_postulante'];
		$cargo = $row['cargo'];
		
		$telefono_fijo = $row['telefono_fijo'];
		$lada = $row['lada'];
		$extension = $row['extension'];	
		
          $consulta_p2="SELECT cp, c_estado, d_estado, c_mnpio, D_mnpio, d_asenta FROM codigos_postales 
		  WHERE cp='$cp' and c_estado='$estado' and c_mnpio='$municio_alcaldia';";
		  $consulta2=mysql_query($consulta_p2);

		  while($registro=mysql_fetch_array($consulta2,MYSQLI_ASSOC)){
                
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
			$consulta3=mysql_query($consulta_p3);
			
			$registro3=mysql_fetch_array($consulta3,MYSQLI_ASSOC);

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
			$consulta4=mysql_query($consulta_p4);

			$registro4=mysql_fetch_array($consulta4,MYSQLI_ASSOC);

			$id_solicitud			= 	$registro4['id_solicitud'];
  			$nombre_festival		=	$registro4["nombre_festival"];
  			$numero_ediciones_previas	=	$registro4['numero_ediciones_previas'];
  			
  			/*$disciplina_artes_escenicas	=	$registro4['disciplina_artes_escenicas'];
  			$disciplina_artes_plasticas = $registro4['disciplina_artes_plasticas'];
  			$disciplina_cinematografia = $registro4['disciplina_cinematografia'];
  			$disciplina_gastronomia = $registro4['disciplina_gastronomia'];
  			$disciplina_literatura = $registro4['disciplina_literatura'];*/

  			$disciplina_musica_v2  		= $registro4["disciplina_musica_v2"];
  			$disciplina_gastronomia_v2  = $registro4["disciplina_gastronomia_v2"];
  			$disciplina_danza_v2 		= $registro4["disciplina_danza_v2"];
			$disciplina_teatro_v2 		= $registro4["disciplina_teatro_v2"];
			$disciplina_literatura_v2  = $registro4["disciplina_literatura_v2"];
			$disciplina_artes_visuales_v2  = $registro4["disciplina_artes_visuales_v2"];

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
			
			//FIN consulta tabla solicitud 2. Características generales del festival

  			//fin datos administrativos

  							
		$pdf->SetY(35.5);
		$pdf->SetX(164);
		$pdf->writeHTMLCell(0, 0, '', '',$id_solicitud, 0, 0, 0, true, 'L', false);	
		
		$pdf->SetY(41);
		$pdf->SetX(164);
		$pdf->writeHTMLCell(0, 0, '', '',$fecha_hora_captura_concluida, 0, 0, 0, true, 'L', false);	
		
		$pdf->SetY(66);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_instancia_postulante, 0, 0, 0, true, 'L', false);
				
		$pdf->SetY(69);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'L', false);		
		/*
		INICIO etapa 1 v2
		$pdf->SetY(65.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'L', false);
		
		
		$pdf->SetY(69);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo, 0, 0, 0, true, 'L', false);
		FIN etapa 1 v2*/

		$pdf->SetY(72.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','('.$row['lada'].') '.$row['telefono_fijo'].'&nbsp;&nbsp;&nbsp;&nbsp; <strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$row['extension'], 0, 0, 0, true, 'L', false);
		
		
		$pdf->SetY(75.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$row['correo_electronico'], 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(79);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Código Postal</strong>&nbsp;&nbsp;&nbsp; $cp &nbsp;&nbsp;&nbsp;<strong>Estado</strong>&nbsp;&nbsp;" .$estado_imp, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(82);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Municipio o Alcaldía</strong>&nbsp;&nbsp;&nbsp; $D_mnpio", 0, 0, 0, true, 'L', false);
                
		$pdf->SetY(84.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Colonia</strong>&nbsp;&nbsp; $d_asenta", 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(87.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Calle</strong>&nbsp;&nbsp;&nbsp;".$row['calle'], 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(90);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>No. exterior</strong>&nbsp;&nbsp;&nbsp;".$row['no_ext']."&nbsp;&nbsp;&nbsp;<strong>No. interior</strong>&nbsp;&nbsp;&nbsp;".$row['no_int'], 0, 0, 0, true, 'L', false);
                
            
		
		//INICIO DATOS TABLA PROYECTO

		//INICIO Datos Responsable administrativo 
		
		$pdf->SetY(93.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"$nombre3_adm", 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(97);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"$cargo_adm", 0, 0, 0, true, 'L', false);

		$pdf->SetY(100.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','('.$lada_adm.') '.$telefono_fijo_adm.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp;&nbsp; '.$telefono_movil_adm.' <strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_adm, 0, 0, 0, true, 'L', false);

		$pdf->SetY(104);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$correo_electronico_adm, 0, 0, 0, true, 'L', false);	

		//FIN Datos Responsable administrativo 

		//INICIO Datos Responsable operativa
		
		$pdf->SetY(107.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"$nombre3_op", 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(111);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',"$cargo_op", 0, 0, 0, true, 'L', false);

		$pdf->SetY(114.5);
		$pdf->SetX(103);	
		$pdf->writeHTMLCell(0, 0, '', '','('.$lada_op.') '.$telefono_fijo_op.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp;&nbsp; '.$telefono_movil_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(118);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(123);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$Correo_electronico_op, 0, 0, 0, true, 'L', false);

		
		//FIN Datos Responsable operativa 

		//INICIO Características generales del festival
		$pdf->SetY(131.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_festival, 0, 0, 0, true, 'L', false);

		$pdf->SetY(140.2);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$numero_ediciones_previas, 0, 0, 0, true, 'L', false);

		if($disciplina_musica_v2=='1'){
			$pdf->SetY(144);
			$pdf->SetX(104.3);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_gastronomia_v2=='1'){
			$pdf->SetY(144);
			$pdf->SetX(124.6);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_danza_v2=='1'){
			$pdf->SetY(144);
			$pdf->SetX(152.3);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_teatro_v2=='1'){
			$pdf->SetY(144);
			$pdf->SetX(171.9);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_literatura_v2=='1'){
			$pdf->SetY(146.7);
			$pdf->SetX(119.9);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}	
		if($disciplina_artes_visuales_v2=='1'){
			$pdf->SetY(146.7);
			$pdf->SetX(143.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}		

		$pdf->SetY(150.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$pagina_web_festival, 0, 0, 0, true, 'L', false);

		$pdf->SetY(154);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$facebook_festival, 0, 0, 0, true, 'L', false);

		$pdf->SetY(157);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$twitter_festival, 0, 0, 0, true, 'L', false);


		$pdf->SetY(161);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(94, 1, '', '',$objetivo_general, 0, 0, 0, true, 'L', false);

		/* INICIO ocultar etapa 1 v2
		$pdf->SetY(184.8);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Número de presentaciones:</strong>&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_presentaciones.'&nbsp;&nbsp;&nbsp;<strong>Cantidad de público a beneficiar:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_publico, 0, 0, 0, true, 'L', false);

		$pdf->SetY(187.2);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Municipios:</strong>&nbsp;&nbsp;'.$meta_num_municipio.'&nbsp;&nbsp;<strong>Foros:</strong>&nbsp;&nbsp;'.$meta_num_foros.'&nbsp;&nbsp;<strong>Artístas:</strong>&nbsp;&nbsp;'.$meta_num_artistas.'&nbsp;&nbsp;&nbsp;<strong>Grupos a beneficiar:</strong>&nbsp;&nbsp;&nbsp;'.$meta_cantidad_grupos, 0, 0, 0, true, 'L', false);

		$pdf->SetY(189.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Número de actividades académicas:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_actividades_academicas, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(192);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Número de grupos indígenas a atender:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_numero_grupos_ind_atender, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(195.5);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(0, 0, '', '',$alcance_programacion, 0, 0, 0, true, 'L', false);
		FIN ocultar etapa 1 v2*/

		$pdf->SetY(185.5);
		$pdf->SetX(145);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_inicio, 0, 0, 0, true, 'L', false);

		$pdf->SetY(189);
		$pdf->SetX(145);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_termino, 0, 0, 0, true, 'L', false);

		$pdf->SetY(199);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'C', false);

		$pdf->SetY(199);
		$pdf->SetX(150);
		$pdf->writeHTMLCell(40, 0, '', '',$Infor_finan_apoyo_costo_total.'%', 0, 0, 0, true, 'C', false);

		$pdf->SetY(202.3);
		$pdf->SetX(103);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_costo_monto, 0, 0, 0, true, 'C', false);

		/*INICIO ocultar etapa 1 v2
		$pdf->SetY(246);
		$pdf->SetX(100);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'C', false);
		FINI ocultar etapa 1 v2*/
		//FIN Características generales del festival		

		//para terminar e mostrar el pdf completo:
		}
                //ver desde el navegador 
				$pdf->Output('Solicitud_PROFEST.pdf');
		//descargar el PDF
		//$pdf->Output('Solicitud_PROFEST.pdf', 'D');
?>