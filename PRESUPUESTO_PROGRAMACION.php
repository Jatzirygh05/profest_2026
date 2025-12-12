<?php
/*
  ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  */
require_once('./Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
//$cve_user = "jghernandez20*1709";
//$cve_user = "edgarzayas720*1987";
	//============================================================+
	// File name   : example_001.php
	// Begin       : 2008-03-04
	// Last Update : 2013-05-14
	//
	// Description : Example 001 for TCPDF class
	//               Default Header and Footer
	//
	// Author: Nicola Asuni
	//
	// (c) Copyright:
	//               Nicola Asuni
	//               Tecnick.com LTD
	//               www.tecnick.com
	//               info@tecnick.com
	//============================================================+
	
	/**
	 * Creates an example PDF TEST document using TCPDF
	 * @package com.tecnick.tcpdf
	 * @abstract TCPDF - Example: Default Header and Footer
	 * @author Nicola Asuni
	 * @since 2008-03-04
	 */
	
	// Include the main TCPDF library (search for installation path).
	require_once('TCPDF-master/tcpdf.php');

	// create new PDF document
	$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
	// set document information
	/*$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle('TCPDF Example 001');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');]*/
	
	// set default header data
	//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	$pdf->setFooterData(array(0,64,0), array(0,64,128));
	
	// set header and footer fonts
	//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	
	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}
	
	// ---------------------------------------------------------
	
	// set default font subsetting mode
	$pdf->setFontSubsetting(true);
	
	// Set font
	// dejavusans is a UTF-8 Unicode font, if you only need to
	// print standard ASCII chars, you can use core fonts like
	// helvetica or times to reduce file size.
	$pdf->SetFont('', '', 9, '', true);

	// Add a page
	// This method has several options, check the source code documentation for more information.
	$pdf->AddPage();
	
	// set text shadow effect
	$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
	
	// Set some content to print
	$query1 = "SELECT * FROM solicitud WHERE clave_usuario='".$cve_user."';";                          
	$exe_query1 =  mysqli_query($con, $query1);
	$fila1=mysqli_fetch_array($exe_query1);
	$nombre_festival = $fila1['nombre_festival'];
	$nombre_festival = utf8_encode($fila1['nombre_festival']);
    
	$table = '<table border="0" style="width: 1100px;" cellpadding="1" cellspacing="1">
  <tr>
    <td><img src="imagenes/logo_cultura_2022.png" width="210px"></td>
    <td width="350">&nbsp;</td>
    <td width="230" align="right">PRESUPUESTO CONVOCATORIA APOYO A 
	FESTIVALES CULTURALES Y ARTÍSTICOS 
	PROFEST 2022
	</td>
  </tr>
  	<tr>
  		<td colspan="3"></td>
	</tr>
  	<tr>
  		<td colspan="3"><strong>Nombre del Festival:           </strong>&nbsp;<u>'.$nombre_festival.'</u></td>
	</tr>
	<tr>
  		<td colspan="3"></td>
	</tr>
</table>	
	<table border="1" style="width: 950px;" cellspacing="0"><tr>
	<td align=center>No</td>
	<td align=center>Confirmado /Tentativo</td><td align=center>Disciplina</td>
	<td align=center>Nombre del participante o prestador del servicio profesional</td>
	<td align=center>Estado/País origen</td>
	<td align=center>Nombre de la presentación o del servicio</td>
	<td align=center>Lugar de presentación</td>
	<td align=center>Fecha presentación (dd/mm/aaaa)</td>
	<td align=center>Horario (HH:MM:SS a.m/p.m)</td>
	<td align=center>#Participantes</td>
	<td align=center>#Mujeres</td>
	<td align=center>#Hombres</td>
	<td align=center>Duración del espectáculo propuesto</td>
	<td align=center>Monto de honorarios con impuestos incluidos (M.N.)</td></tr>
	%s</table>';
$tr = '<tr>
        <td style=border: 1px solid #000000;> %s</td>
        <td style=border: 1px solid #000000;> %s</td>
        <td style=border: 1px solid #000000; text-align:center>%s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> $%s</td>
    </tr>';
$tr2 = '<table border="0" style="width: 950px;"><tr>
		<td><div align="right">Total General $%s</div></td>
		</tr>
		<tr>
        <td><div align="right">Progrmación confirmada %s &#37;</div></td>
		</tr>
		</table>';
$query_conf = "SELECT id FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."' and confirmado_tentativo='Confirmado';";                          
$exe_query_conf =  mysqli_query($con, $query_conf);
$cuantos_conf = mysqli_num_rows($exe_query_conf);

	$query = "SELECT * FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."';";                          
        $exe_query =  mysqli_query($con, $query);
        $cuantos = mysqli_num_rows($exe_query);
        $i = 0;
        $total_general = 0;
        $prog_confirmada = 0;
        while($fila=mysqli_fetch_array($exe_query, MYSQLI_ASSOC)){
            $i=$i+1;
        	$monto_honorarios = $fila['monto_honorarios_con_impuestos_incluidos_mn'];
			$monto_honorario_con_formatos = number_format($monto_honorarios,2,'.',',');

            $total_general = $total_general + $monto_honorarios;
			$total_general_imp_form = number_format($total_general,2,'.',',');

			$nombre_present_o_servicio = $fila['nombre_present_o_servicio'];
			switch($fila['disciplina']){
                case 'Musica':
                    $nomb_disc="M&uacute;sica";
                break;
                case 'Diseno':
                    $nomb_disc="Dise&ntilde;o";
                break;
                case 'Cinematografia':
                    $nomb_disc="Cinematograf&iacute;a";
                break;
                default:
					$nomb_disc=$fila['disciplina'];
              }
			  $nomb_disc = $nomb_disc;
			  $lugar_sel=utf8_encode($fila['lugar_sel']);

			//(INICIO) muestre las opciones si quiere elegir otra
			$query="SELECT id_lugares, Nombreforo FROM `mas_lugares` where clave_usuario='".$cve_user."'";
			$result = mysqli_query($con, $query);
				  while($renglon = mysqli_fetch_array($result))
				  { 
						$valor=$renglon['id_lugares'];
						$imp_texto=utf8_encode($renglon['Nombreforo']);
					 if($lugar_sel==$valor){ $imp_foro_ultimo = $imp_texto; }
				 }
			  //(INICIO) imprime los valoes de la tabla de 'proyecto'
				   //A (INICIO) 
					 $query_lug="SELECT Nombreforo_a 
					 FROM `proyecto` where clave_usuario='".$cve_user."'";
					 $result_lug = mysqli_query($con, $query_lug);
					 $renglon_luga = mysqli_fetch_array($result_lug);
							$Nombreforo_a=utf8_encode($renglon_luga["Nombreforo_a"]);
					   
						if (!empty($Nombreforo_a)){
						  if ($lugar_sel==100){ $imp_foro_ultimo = $Nombreforo_a;  }
					   }
					   //A (FIN)
					   
					   //B (INICIO)
					   $query_lugb="SELECT Nombreforo_b
					   FROM `proyecto` where clave_usuario='".$cve_user."'";
					   $result_lugb = mysqli_query($con, $query_lugb);
					   $renglon_lugb = mysqli_fetch_array($result_lugb);
							$Nombreforo_b=utf8_encode($renglon_lugb["Nombreforo_b"]);
						if (!empty($Nombreforo_b)){
							
							 if ($lugar_sel==200){ $imp_foro_ultimo = $Nombreforo_b; } 
					   }
					   //B (FIN)

					   //C (INICIO)
					   $query_lugc="SELECT Nombreforo_c
					   FROM `proyecto` where clave_usuario='".$cve_user."'";
					   $result_lugc = mysqli_query($con, $query_lugc);
					   $renglon_lugc = mysqli_fetch_array($result_lugc);
							$Nombreforo_c=utf8_encode($renglon_lugc["Nombreforo_c"]);
					 
					  if (!empty($Nombreforo_c)){
					   if ($lugar_sel==300){ $imp_foro_ultimo = $Nombreforo_c;  }
							 }
					   //C (FIN)
		   //(FIN) muestre las opciones si quiere elegir otra               
		   //(FIN) imprime los valoes de la tabla de 'proyecto'
			if ($lugar_sel==500){ $imp_foro_ultimo = "En todas las anteriores"; }
			$ver_todos_lugares = $imp_foro_ultimo;

			if ($fila['duracion_espectaculo_propuesto']=='mas 2 semanas'){
				$duracion_imp_rep = '+ 2 semanas';
			  } else {
				$duracion_imp_rep = $fila['duracion_espectaculo_propuesto'];
			  }
			  
			$nombre_artista_grupo = $fila['nombre_artista_grupo'];
			$estado_origen_artista_grupo = $fila['estado_origen_artista_grupo'];


	$trs[] = sprintf($tr, $i, $fila['confirmado_tentativo'], $nomb_disc, $nombre_artista_grupo, $estado_origen_artista_grupo, $nombre_present_o_servicio, $ver_todos_lugares, $fila['fecha_presentacion'], $fila['horario'], $fila['num_participantes_por_grupo'], $fila['num_Mujeres'], $fila['num_Hombres'], $duracion_imp_rep, $monto_honorario_con_formatos);
}

$prog_confirmada = 100*($cuantos_conf/$cuantos);
$prog_confirmada_imp_form = number_format($prog_confirmada,0,'','');

//INICIO PARA IMPRIR EL CONTENIDO DE LA TABLE DE HONORARIOS
$tbl = sprintf($table, implode($trs));
$pdf->writeHTML($tbl, true, false, false, false, '');

//INICIO PARA IMPRIMIR EL CONTENIDO DE LOS TOTALES DE HONORARIOS
$trs2[] = sprintf($tr2, $total_general_imp_form, $prog_confirmada_imp_form);

$tb2 = sprintf(implode($trs2));
$pdf->writeHTML($tb2, true, false, false, false, '');
	
//---------------------------------------------------
$query_user6 = "SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."';";                          
$res_user_6 =  mysqli_query($con, $query_user6);
$seleccionado_6 = mysqli_num_rows($res_user_6);

if($seleccionado_6>0){
	$pdf->AddPage();
	
	// Set some content to print  
	$table2 = '<table border="0" style="width: 1100px;" cellpadding="1" cellspacing="1">
	<tr>
	  <td><img src="imagenes/logo_cultura_2022.png" width="210px"></td>
	  <td width="350">&nbsp;</td>
	  <td width="230" align="right">PRESUPUESTO CONVOCATORIA APOYO A 
	  FESTIVALES CULTURALES Y ARTÍSTICOS 
	  PROFEST 2022
	  </td>
	</tr>
		<tr>
			<td colspan="3"></td>
	  </tr>
		<tr>
			<td colspan="3"><strong>Nombre del Festival:           </strong>&nbsp;<u>'.$nombre_festival.'</u></td>
	  </tr>
	  <tr>
			<td colspan="3"></td>
	  </tr>
  </table>
  <table border="1" style="width: 950px;" cellspacing="0"><tr>
	<td align=center>No.</td>
	<td align=center>Tipo de gasto</td>
	<td align=center>Concepto</td>
	<td align=center>Unidad</td>
	<td align=center>Costo unitario con IVA incluidos(M.N.)</td>
	<td align=center>Monto total impuestos incluidos(M.N.)</td></tr>
	%s</table>';
$tr3 = '<tr>
        <td style=border: 1px solid #000000;> %s</td>
        <td style=border: 1px solid #000000;> %s</td>
        <td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
        <td style=border: 1px solid #000000;> %s</td>
		<td style=border: 1px solid #000000;> %s</td>
    </tr>';
$tr4 = '<table border="0" style="width: 950px;"><tr>
		<td><div align="right">Total $%s</div></td>
		</tr>
		</table>';
		$h=0;
		while($fila2=mysqli_fetch_array($res_user_6, MYSQLI_ASSOC)){
			$h=$h+1; 
			$unidad = $fila2['unidad'];
			$costo_unitario_imp_incluidos = $fila2['costo_unitario_imp_incluidos'];
            $imp_incluidos1 =  $unidad * $costo_unitario_imp_incluidos;
            $monto_tot_imp_incluidos  =  number_format($imp_incluidos1, 2, '.', '');

            $total_esp_mue_inmue1  =  $imp_incluidos1 + $total_esp_mue_inmue1;
            $total_esp_tra_1  =  number_format($total_esp_mue_inmue1, 2, '.', '');
            
			$tipogasto = $fila2['tipogasto'];
			$concepto = $fila2['concepto'];
	$trs3[] = sprintf($tr3, $h, $tipogasto, $concepto, $unidad, $costo_unitario_imp_incluidos, $monto_tot_imp_incluidos);
}

//INICIO PARA IMPRIR EL CONTENIDO DE LA TABLE DE HONORARIOS
$tb3 = sprintf($table2, implode($trs3));
$pdf->writeHTML($tb3, true, false, false, false, '');

//INICIO PARA IMPRIMIR EL CONTENIDO DE LOS TOTALES DE HONORARIOS
$trs4[] = sprintf($tr4, $total_esp_tra_1);

$tb4 = sprintf(implode($trs4));
$pdf->writeHTML($tb4, true, false, false, false, '');
}
	
	// Close and output PDF document
	// This method has several options, check the source code documentation for more information.
	$pdf->Output('PRESUPUESTO_PROGRAMACION.pdf', 'I');
	
	//============================================================+
	// END OF FILE
	//============================================================+
