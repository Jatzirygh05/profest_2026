<?php
  ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  
require_once('Connections/profest_rep.php');
/*//initialize the session
if (!isset($_SESSION)) {
  session_start();
}*/

$cve_user = 'jatziry30';
//$cve_user = $_SESSION['MM_Username'];
//header('Content-Type: text/html; charset=ISO-8859-1');
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-master/tcpdf.php');

		//creo mi objeto pdf y le doy valores generales
		$pdf = new TCPDF('L', PDF_UNIT, 'LETTER', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Secretaría de Cultura');
		$pdf->SetTitle('Formato Proyecto');
		$pdf->SetFont('times', '', 9);
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
		$img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_1.jpg';
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
		$estado=utf8_encode($row['estado']);
		$municio_alcaldia=utf8_encode($row['municio_alcaldia']);
		$colonia=utf8_encode($row['colonia']);
		
		
          $consulta_p2="SELECT cp, c_estado, d_estado, c_mnpio, D_mnpio, d_asenta FROM codigos_postales 
		  WHERE cp='$cp' and c_estado='$estado' and c_mnpio='$municio_alcaldia';";
		  $consulta2=mysql_query($consulta_p2);

		  $registro=mysql_fetch_array($consulta2,MYSQLI_ASSOC);
                
				
					$D_mnpio	=	utf8_encode($registro['D_mnpio']); 
					$d_asenta	=	utf8_encode($registro['d_asenta']);
					$estado_imp =	utf8_encode($registro['d_estado']);

			$consulta_p3="SELECT * FROM proyecto 
			WHERE clave_usuario='".$cve_user."';";
			$consulta3=mysql_query($consulta_p3);

			$registro3=mysql_fetch_array($consulta3,MYSQLI_ASSOC);

			//inicio datos administrativo
  			$nombre3_adm	=	utf8_encode($registro3['responsable_adm_nombre'])." ".utf8_encode($registro3['primer_apellido_adm']);
  			$segundo_apellido_adm=utf8_encode($registro3['segundo_apellido_adm']);
  			$cargo_adm				=	utf8_encode($registro3['cargo_adm']);
  			$lada_adm				=	utf8_encode($registro3['lada_adm']);
  			$telefono_fijo_adm		=	utf8_encode($registro3['telefono_fijo_adm']);
  			$extension_adm			=	utf8_encode($registro3['extension_adm']);
  			$telefono_movil_adm		=	utf8_encode($registro3['telefono_movil_adm']);
  			$correo_electronico_adm	=	utf8_encode($registro3['correo_electronico_adm']);
  			//fin datos administrativos

            //inicio datos operativo    
			$nombre3_op	=	utf8_encode($registro3['responsable_op_nombre'])." ".utf8_encode($registro3['primer_apellido_op']);
			$segundo_apellido_op=utf8_encode($registro3['segundo_apellido_op']);

			
			$cargo_op	=	utf8_encode($registro3['cargo_op']);
			$lada_op	=	utf8_encode($registro3['lada_op']);
			$telefono_fijo_op	=	utf8_encode($registro3['telefono_fijo_op']);
			$extension_op			=	utf8_encode($registro3['extension_op']);
 			$telefono_movil_op		=	utf8_encode($registro3['telefono_movil_op']);
  			$Correo_electronico_op	=	utf8_encode($registro3['Correo_electronico_op']);
  			//fin datos operativo

  			//desarrollo del proyecto

  			$desarrollo_proyecto_antecedente =  utf8_encode($registro3['desarrollo_proyecto_antecedente']);
  			$desarrollo_proyecto_diagnostico =  utf8_encode($registro3['desarrollo_proyecto_diagnostico']);
  			$desarrollo_proyecto_justificacion =  utf8_encode($registro3['desarrollo_proyecto_justificacion']);
  			$desarrollo_proyecto_descripcion =  utf8_encode($registro3['desarrollo_proyecto_descripcion']);
  			$desarrollo_proyecto_objetivos_especificos =  utf8_encode($registro3['desarrollo_proyecto_objetivos_especificos']);
  			$desarrollo_proyecto_meta_cuantitativa =  utf8_encode($registro3['desarrollo_proyecto_meta_cuantitativa']);
  			$desarrollo_proyecto_descripcion_impacto =  utf8_encode($registro3['desarrollo_proyecto_descripcion_impacto']);

  			//Población objetivos

  			$poblacion_genero_hombre=  $registro3['poblacion_genero_hombre'];
  			$poblacion_genero_mujer =  $registro3['poblacion_genero_mujer'];
  			$poblacion_edad_0_12    =  $registro3['poblacion_edad_0_12'];
  			$poblacion_edad_13_17   =  $registro3['poblacion_edad_13_17'];
  			$poblacion_edad_18_29   =  $registro3['poblacion_edad_18_29'];
  			$poblacion_edad_30_59   =  $registro3['poblacion_edad_30_59'];
  			$poblacion_edad_60 		=  $registro3['poblacion_edad_60'];
			
			$poblacion_nivel_sin_escolaridad = $registro3['poblacion_nivel_sin_escolaridad'];
			$poblacion_nivel_educ_basica 	 = $registro3['poblacion_nivel_educ_basica'];
			$poblacion_nivel_educ_media 	 = $registro3['poblacion_nivel_educ_media'];
			$poblacion_especific_reclusion 	 = $registro3['poblacion_especific_reclusion'];
			$poblacion_nivel_educ_superior   = $registro3['poblacion_nivel_educ_superior'];
			$poblacion_especific_migrantes   = $registro3['poblacion_especific_migrantes'];
			$poblacion_especific_indigenas   = $registro3['poblacion_especific_indigenas'];
			$poblacion_especific_con_discapacidad = $registro3['poblacion_especific_con_discapacidad'];
			$poblacion_especific_otros 			  = $registro3['poblacion_especific_otros'];	
		
  			//Organigrama operativo

  			$organigrama_nombre1  =  utf8_encode($registro3['organigrama_nombre1']);
  			$organigrama_cargo1   =  utf8_encode($registro3['organigrama_cargo1']);
  			$organigrama_funciones1   =  utf8_encode($registro3['organigrama_funciones1']);

  			$organigrama_nombre2  =  utf8_encode($registro3['organigrama_nombre2']);
  			$organigrama_cargo2  =  utf8_encode($registro3['organigrama_cargo2']);
  			$organigrama_funciones2   =  utf8_encode($registro3['organigrama_funciones2']);

  			$organigrama_nombre3  =  utf8_encode($registro3['organigrama_nombre3']);
  			$organigrama_cargo3   =  utf8_encode($registro3['organigrama_cargo3']);
  			$organigrama_funciones3   =  utf8_encode($registro3['organigrama_funciones3']);

  			$organigrama_nombre4  =  utf8_encode($registro3['organigrama_nombre4']);
  			$organigrama_cargo4   =  utf8_encode($registro3['organigrama_cargo4']);
  			$organigrama_funciones4   =  utf8_encode($registro3['organigrama_funciones4']);

  			$organigrama_nombre5  =  utf8_encode($registro3['organigrama_nombre5']);
  			$organigrama_cargo5   =  utf8_encode($registro3['organigrama_cargo5']);
  			$organigrama_funciones5   =  utf8_encode($registro3['organigrama_funciones5']);

  			$organigrama_nombre6  =  utf8_encode($registro3['organigrama_nombre6']);
  			$organigrama_cargo6   =  utf8_encode($registro3['organigrama_cargo6']);
  			$organigrama_funciones6   =  utf8_encode($registro3['organigrama_funciones6']);

  			$organigrama_nombre7  =  utf8_encode($registro3['organigrama_nombre7']);
  			$organigrama_cargo7   =  utf8_encode($registro3['organigrama_cargo7']);
  			$organigrama_funciones7   =  utf8_encode($registro3['organigrama_funciones7']);

  			$organigrama_nombre8  =  utf8_encode($registro3['organigrama_nombre8']);
  			$organigrama_cargo8   =  utf8_encode($registro3['organigrama_cargo8']);
  			$organigrama_funciones8   =  utf8_encode($registro3['organigrama_funciones8']);

  			//pagina 9
  			//estrategias de difusion del festival

  			$estrategias_medio_radio = utf8_encode($registro3['estrategias_medio_radio']);
  			$estrategias_medio_television = utf8_encode($registro3['estrategias_medio_television']);
  			$estrategias_medio_internet = utf8_encode($registro3['estrategias_medio_internet']);
  			$estrategias_medio_redes_sociales = utf8_encode($registro3['estrategias_medio_redes_sociales']);
  			$estrategias_medio_prensa = utf8_encode($registro3['estrategias_medio_prensa']);
  			$estrategias_medio_folletos_posters = utf8_encode($registro3['estrategias_medio_folletos_posters']);
  			$estrategias_medio_espetaculares = utf8_encode($registro3['estrategias_medio_espetaculares']);
  			$estrategias_medio_perifoneo = utf8_encode($registro3['estrategias_medio_perifoneo']);
  			$estrategias_medio_otros_nombre = utf8_encode($registro3['estrategias_medio_otros_nombre']);
  			$estrategias_acciones_dar_conocer = utf8_encode($registro3['estrategias_acciones_dar_conocer']);
  			
  			//esta pregunta falta en la imagen 9
  			//Que acciones se llevan a cabo para dar a conocer el festival 

			
			//INICIO consulta tabla solicitud 2. Características generales del festival
  		    $consulta_p4="SELECT * FROM solicitud 
			WHERE clave_usuario='".$cve_user."';";
			$consulta4=mysql_query($consulta_p4);

			$registro4=mysql_fetch_array($consulta4,MYSQLI_ASSOC);

			
  			$nombre_festival		=	utf8_encode($registro4['nombre_festival']);
  			$numero_ediciones_previas	=	$registro4['numero_ediciones_previas'];
  			$disciplina				=	utf8_encode($registro4['disciplina']);
  			$objetivo_general		=	utf8_encode($registro4['objetivo_general']);
  			$pagina_web_festival	=	utf8_encode($registro4['pagina_web_festival']);
  			$facebook_festival		=	utf8_encode($registro4['facebook_festival']);
  			$twitter_festival		=	utf8_encode($registro4['twitter_festival']);

  			$meta_num_presentaciones	=	$registro4['meta_num_presentaciones'];
  			$meta_num_publico			=	$registro4['meta_num_publico'];
  			$meta_num_municipio			=	$registro4['meta_num_municipio'];
  			$meta_num_foros				=	$registro4['meta_num_foros'];
  			$meta_num_artistas			=	$registro4['meta_num_artistas'];
  			$meta_cantidad_grupos		=	$registro4['meta_cantidad_grupos'];

  			$alcance_programacion = $registro4['alcance_programacion'];

  			$periodo_realizacion_fecha_inicio	= $registro4['periodo_realizacion_fecha_inicio'];
  			$periodo_realizacion_fecha_termino	= $registro4['periodo_realizacion_fecha_termino'];

  			$Info_financiera_categoria	= $registro4['Info_financiera_categoria'];
  			$Infor_finan_costo_monto	= $registro4['Infor_finan_costo_monto'];
  			$Infor_finan_apoyo_monto	= $registro4['Infor_finan_apoyo_monto'];
  			$Infor_finan_apoyo_costo_total	= $registro4['Infor_finan_apoyo_costo_total'];

			//FIN consulta tabla solicitud 2. Características generales del festival

  			//fin datos administrativos

  							
		$pdf->SetY(50);
		$pdf->SetX(75);
		$pdf->writeHTMLCell(0, 0, '', '','nombre_festival='.$nombre_festival, 0, 0, 0, true, 'L', false);						
					

		$pdf->SetY(68);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','nombre3_op='.$nombre3_op, 0, 0, 0, true, 'L', false);


		$pdf->SetY(73);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','segundo_apellido_op='.$segundo_apellido_op, 0, 0, 0, true, 'L', false);


		$pdf->SetY(87);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','cargo_op='.$cargo_op, 0, 0, 0, true, 'L', false);
				
		$pdf->SetY(100);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','('.$lada_op.') &nbsp;<strong>Teléfono fijo:</strong>&nbsp;&nbsp;'.$telefono_fijo_op.'&nbsp;&nbsp;<strong>Extensión</strong>&nbsp;&nbsp;'.$extension_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(105);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Teléfono móvil:</strong>&nbsp;&nbsp;'.$telefono_movil_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(120);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','Correo_electronico_op='.$Correo_electronico_op, 0, 0, 0, true, 'L', false);
        

        $pdf->SetY(133);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','nombre3_adm='.$nombre3_adm, 0, 0, 0, true, 'L', false);

		$pdf->SetY(138);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','segundo_apellido_adm='.$segundo_apellido_adm, 0, 0, 0, true, 'L', false);


        $pdf->SetY(153);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','cargo_adm='.$cargo_adm, 0, 0, 0, true, 'L', false);


		$pdf->SetY(165);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','('.$lada_adm.') &nbsp;<strong>Teléfono fijo:</strong>&nbsp;&nbsp;'.$telefono_fijo_adm.'&nbsp;&nbsp;<strong>Extensión</strong>&nbsp;&nbsp;'.$extension_adm, 0, 0, 0, true, 'L', false);

		$pdf->SetY(170);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>Teléfono móvil:</strong>&nbsp;&nbsp;'.$telefono_movil_adm, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(185);
		$pdf->SetX(113);
		$pdf->writeHTMLCell(0, 0, '', '','Correo_electronico_adm='.$correo_electronico_adm, 0, 0, 0, true, 'L', false);
		
		//Se sigue llenando con las variables que hemos recogido.
                //Si el trámite tiene más de unoa hoja se usa lo siguiente

                //add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_2.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                //vuelvo a "imprimir" las variables en la coordenada deseada

                $pdf->SetY(65);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_antecedente='.$desarrollo_proyecto_antecedente, 0, 0, 0, true, 'L', false);

				$pdf->SetY(98);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_diagnostico='.$desarrollo_proyecto_diagnostico, 0, 0, 0, true, 'L', false);
                
                $pdf->SetY(137);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_justificacion='.$desarrollo_proyecto_justificacion, 0, 0, 0, true, 'L', false);

				$pdf->SetY(173);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_descripcion='.$desarrollo_proyecto_descripcion, 0, 0, 0, true, 'L', false);


				$pdf->SetY(206);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','objetivo_general='.$objetivo_general, 0, 0, 0, true, 'L', false);



				//add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_3.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                //vuelvo a "imprimir" las variables en la coordenada deseada

                $pdf->SetY(50);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_objetivos_especificos='.$desarrollo_proyecto_objetivos_especificos, 0, 0, 0, true, 'L', false);

                $pdf->SetY(93);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_meta_cuantitativa='.$desarrollo_proyecto_meta_cuantitativa, 0, 0, 0, true, 'L', false);

				$pdf->SetY(133);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','desarrollo_proyecto_descripcion_impacto='.$desarrollo_proyecto_descripcion_impacto, 0, 0, 0, true, 'L', false);

				//población hombres

				$pdf->SetY(172);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Género</strong>', 0, 0, 0, true, 'L', false);
				
				$pdf->SetY(177);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Número de hombres:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_genero_hombre, 0, 0, 0, true, 'L', false);
				
				$pdf->SetY(181);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Número de mujeres:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_genero_mujer, 0, 0, 0, true, 'L', false);

				$pdf->SetY(186);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Edad</strong>', 0, 0, 0, true, 'L', false);

				$pdf->SetY(190);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>0-12:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_edad_0_12, 0, 0, 0, true, 'L', false);

				$pdf->SetY(195);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>13-17:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_edad_13_17, 0, 0, 0, true, 'L', false);

				$pdf->SetY(200);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>18-29:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_edad_18_29, 0, 0, 0, true, 'L', false);

				$pdf->SetY(205);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>30-59:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_edad_30_59, 0, 0, 0, true, 'L', false);

				$pdf->SetY(210);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>60 en adelante:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_edad_60, 0, 0, 0, true, 'L', false);
		
		
		
				$pdf->SetY(215);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Nivel académico</strong>', 0, 0, 0, true, 'L', false);

				$pdf->SetY(220);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Sin escolaridad:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_nivel_sin_escolaridad, 0, 0, 0, true, 'L', false);

				$pdf->SetY(225);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Educación Básica:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_nivel_educ_basica, 0, 0, 0, true, 'L', false);

				$pdf->SetY(230);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Educación Media:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_nivel_educ_media, 0, 0, 0, true, 'L', false);

				$pdf->SetY(235);
				$pdf->SetX(45);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Educación Superior:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_nivel_educ_superior, 0, 0, 0, true, 'L', false);
		
				
				
				$pdf->SetY(172);
				$pdf->SetX(90);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Específicos</strong>', 0, 0, 0, true, 'L', false);
				
				$pdf->SetY(177);
				$pdf->SetX(90);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Reclusión:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_especific_reclusion, 0, 0, 0, true, 'L', false);

				$pdf->SetY(181);
				$pdf->SetX(90);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Migrantes:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_especific_migrantes, 0, 0, 0, true, 'L', false);

				$pdf->SetY(186);
				$pdf->SetX(90);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Indígenas:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_especific_indigenas, 0, 0, 0, true, 'L', false);

				$pdf->SetY(190);
				$pdf->SetX(90);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Con discapacidad:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_especific_con_discapacidad, 0, 0, 0, true, 'L', false);

				$pdf->SetY(195);
				$pdf->SetX(90);
				$pdf->writeHTMLCell(0, 0, '', '','<strong>Otros:</strong>&nbsp;&nbsp;&nbsp;'.$poblacion_especific_otros, 0, 0, 0, true, 'L', false);

				//organigrama operativo

				//add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_4.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                $pdf->SetY(67);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre1='.$organigrama_nombre1, 0, 0, 0, true, 'L', false);

				$pdf->SetY(67);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo1='.$organigrama_cargo1, 0, 0, 0, true, 'L', false);

				$pdf->SetY(67);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones1='.$organigrama_funciones1, 0, 0, 0, true, 'L', false);

				$pdf->SetY(74);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre2='.$organigrama_nombre2, 0, 0, 0, true, 'L', false);

				$pdf->SetY(74);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo2='.$organigrama_cargo2, 0, 0, 0, true, 'L', false);

				$pdf->SetY(74);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones2='.$organigrama_funciones2, 0, 0, 0, true, 'L', false);

				$pdf->SetY(81);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre3='.$organigrama_nombre3, 0, 0, 0, true, 'L', false);

				$pdf->SetY(81);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo3='.$organigrama_cargo3, 0, 0, 0, true, 'L', false);

				$pdf->SetY(81);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones3='.$organigrama_funciones3, 0, 0, 0, true, 'L', false);

				$pdf->SetY(88);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre4='.$organigrama_nombre4, 0, 0, 0, true, 'L', false);

				$pdf->SetY(88);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo4='.$organigrama_cargo4, 0, 0, 0, true, 'L', false);

				$pdf->SetY(88);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones4='.$organigrama_funciones4, 0, 0, 0, true, 'L', false);

				$pdf->SetY(95);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre5='.$organigrama_nombre5, 0, 0, 0, true, 'L', false);

				$pdf->SetY(95);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo5='.$organigrama_cargo5, 0, 0, 0, true, 'L', false);

				$pdf->SetY(95);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones5='.$organigrama_funciones5, 0, 0, 0, true, 'L', false);

				$pdf->SetY(102);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre6='.$organigrama_nombre6, 0, 0, 0, true, 'L', false);

				$pdf->SetY(102);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo6='.$organigrama_cargo6, 0, 0, 0, true, 'L', false);

				$pdf->SetY(102);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones6='.$organigrama_funciones6, 0, 0, 0, true, 'L', false);

				$pdf->SetY(109);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre7='.$organigrama_nombre7, 0, 0, 0, true, 'L', false);

				$pdf->SetY(109);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo7='.$organigrama_cargo7, 0, 0, 0, true, 'L', false);

				$pdf->SetY(109);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones7='.$organigrama_funciones7, 0, 0, 0, true, 'L', false);

				$pdf->SetY(116);
				$pdf->SetX(37);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_nombre8='.$organigrama_nombre8, 0, 0, 0, true, 'L', false);

				$pdf->SetY(116);
				$pdf->SetX(80);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_cargo8='.$organigrama_cargo8, 0, 0, 0, true, 'L', false);

				$pdf->SetY(116);
				$pdf->SetX(129);
				$pdf->writeHTMLCell(0, 0, '', '','organigrama_funciones8='.$organigrama_funciones8, 0, 0, 0, true, 'L', false);


				//add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_5.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

 				
				
				//INICIO CRONOGRAMA
				$pdf->SetY(69);
				$pdf->SetX(40);
				
				
                $consulta_rep_crono="SELECT * FROM cronograma_acciones_ejecucion_festival where clave_usuario='".$cve_user."';";
		        $exe_consulta_crono=mysql_query($consulta_rep_crono);
				$cuantos_crono=mysql_num_rows($exe_consulta_crono);
				
				$j=0;
				
					for($i = 0; $i <= 23; $i++) {
    				$row_crono=mysql_fetch_array($exe_consulta_crono);
					$id_cronograma_acciones = $row_crono['id_cronograma_acciones'];
					$fechaacciones=utf8_encode($row_crono['fechaacciones']);
					$acciones=utf8_encode($row_crono['acciones']);
					
					$j=$j+7;
								
					$pdf->writeHTMLCell(0, 0, '', '',$fechaacciones, 0, 0, 0, true, 'L', false);
									
					$pdf->SetY(69+$j);
					$pdf->SetX(40);
					
					}
				
				
				if($cuantos_crono>23){
					
				//add a page
                $pdf->AddPage();		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
               $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_5.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                $pdf->SetY(69);
				$pdf->SetX(40);
								
				for($i2 = 24; $i2 <= 50; $i2++) {
    				$row_crono=mysql_fetch_array($exe_consulta_crono);
					$id_cronograma_acciones = $row_crono['id_cronograma_acciones'];
					$fechaacciones=utf8_encode($row_crono['fechaacciones']);
					$acciones=utf8_encode($row_crono['acciones']);
					
					$j2=$j2+7;
								
					$pdf->writeHTMLCell(0, 0, '', '',$fechaacciones, 0, 0, 0, true, 'L', false);
									
					$pdf->SetY(69+$j2);
					$pdf->SetX(40);
					
					}
					
					
				}
				//FIN CRONOGRAMA
			


				//lugares realizacion de actividades
				//add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_6.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                //monto solicitado

                //add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_7.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                $pdf->SetY(70);
				$pdf->SetX(100);
				$pdf->writeHTMLCell(0, 0, '', '','Infor_finan_apoyo_monto='.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'L', false);

				$pdf->SetY(78);
				$pdf->SetX(100);
				$pdf->writeHTMLCell(0, 0, '', '','Infor_finan_apoyo_costo_total='.$Infor_finan_apoyo_costo_total, 0, 0, 0, true, 'L', false);

				//financiamiento/presupuesto

                //add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_8.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                $pdf->SetY(70);
				$pdf->SetX(100);
				$pdf->writeHTMLCell(0, 0, '', '','Infor_finan_apoyo_monto='.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'L', false);



				//add a page
                $pdf->AddPage();
		

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                //Le paso la ruta de la nueva imagen que se usará de fondo en la segundo (enésima) hoja
                $img_file = 'formatos_para_descarga_general/para_PDF/Formato_proyecto_Pagina_9.jpg';
                $pdf->Image($img_file, 10, 10, 198, 263, '', '', '', false, 1200, '', false, false, 0);

                $pdf->SetY(70);
				$pdf->SetX(100);
				$pdf->writeHTMLCell(0, 0, '', '','Infor_finan_apoyo_monto='.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'L', false);


                $nombre_completo=$row['NombreRepLeg'].' '.$row['PrimApellidoRepLeg'].' '.$row['SegApellidoRepLeg'];
                $nombre_caracteres=strlen($nombre_completo);
                //29
                //42

                if($nombre_caracteres<=29) $numero=91; else $numero=78;

                //otro renglon
                $pdf->SetY(100);
                $pdf->SetX(100);

                $pdf->writeHTMLCell(0, 0, '', '',$row['NombreRepLeg'].' '.$row['PrimApellidoRepLeg'].' '.$row['SegApellidoRepLeg'], 0, 0, 0, true, 'L', false);
          



                //para terminar e mostrar el pdf completo:
                }
                   
		//$pdf->Output('Formato_proyecto.pdf');
		$pdf->Output('Formato_proyecto.pdf');
		//descargar el PDF
		//$pdf->Output('Solicitud.pdf', 'D');
?>