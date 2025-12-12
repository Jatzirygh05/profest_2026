<?php
require('../fpdf181/fpdf.php');

class PDF extends FPDF
{
}
$pdf = new PDF();
//Disable automatic page break 
$pdf->SetAutoPageBreak(true); 
$pdf->SetFont('Arial','',13);
$pdf->AddPage();
$pdf->SetAuthor('Nicolás Valdés Arismendi');
$pdf->SetTitle('Global');


$pdf->SetFont('Arial','',11.5);
$pdf->Cell(25,5,'Entrega',1);
$pdf->Cell(120,5,' *1* ',1,0,'L');                              /* 1 */
$pdf->Ln();

$pdf->Cell(25,5,'Bodega',1);
$pdf->Cell(120,5,' *2* ',1,0,'L');                              /* 2 */

$pdf->Ln(); 
$pdf->Cell(190,4,'',0);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,'Cod',1,0,'C');
$pdf->Cell(65,5,'Producto',1,0,'C');
$pdf->Cell(15,5,'Total',1,0,'C');
$pdf->Cell(10,5,'',0);
$pdf->Cell(10,5,'Cod',1,0,'C');
$pdf->Cell(65,5,'Producto',1,0,'C');
$pdf->Cell(15,5,'Total',1,0,'C');
$i=0;
$x=10;
$y=29.2;
$paginas=1;
$columnas=1;
$filas=0;



while ($i<54){

if($i<55){
$x=10;$y+5;
$pdf->SetXY($x,$y);
$pdf->Cell(10,5,'dfhgjkdsfhgkjhsdkfghkjsdfhgkhsdkfghdsfg',1);
$pdf->Cell(65,5,'',1);
$pdf->Cell(15,5,'',1);
}

if($i<55){ 
if($columnas==1) $columna=2; else($columna=1);
if($columnas==2);

$x=110;$y+5;
$pdf->SetXY($x,$y);
$pdf->Cell(10,5,'',1);
$pdf->Cell(65,5,'',1);
$pdf->Cell(15,5,'',1);}

$i++;
$y+=5;
$filas++;
$columnas++;
$paginas++; 
}

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,'Cod',1,0,'C');
$pdf->Cell(65,5,'Producto',1,0,'C');
$pdf->Cell(15,5,'Total',1,0,'C');
$pdf->Cell(10,5,'',0);
$pdf->Cell(10,5,'Cod',1,0,'C');
$pdf->Cell(65,5,'Producto',1,0,'C');
$pdf->Cell(15,5,'Total',1,0,'C');

$pdf->Output();

?>