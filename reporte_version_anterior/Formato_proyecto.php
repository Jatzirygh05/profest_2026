<?php require('../fpdf181/fpdf.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];


//$v_emp=$_REQUEST["v_emp"];
//$v_emp=$_GET['v_emp'];
//echo $v_emp;
/*echo "<script type=\"text/javascript\">alert('Ocurrió un problema, vuelve a intentar por favor.'".$v_emp.");</script>";*/
//header('Content-Type: text/html; charset=ISO-8859-1');
class PDF extends FPDF
{
//Cabecera de página

	function Header()
	{
	include ("header.php");
	}
	function Footer()
	{
	$this->SetY(-121);
	include ("footer.php");
	}
}

//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(12,5,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);	
include ('body.php');

$pdf->Output();
?>