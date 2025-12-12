<?php 
	$this->Ln(50);
	$this->Cell(5);
	$this->SetFont('Arial','B',9);	
	$this->Ln(55);
	$this->Cell(4);
	$this->MultiCell(100,4,utf8_decode('Nota: Para su evaluacíón este anexo deberá contener la totalidad de la información requerida. El incumplimiento podría ser causa de descarte.'),0,'L');
	$this->Ln(-8);
	$this->Cell(90);
	$this->Cell(101,4,'ANEXO B',0,0,'R');
	$this->Ln(4);
	$this->Cell(92);
	$this->Cell(103,4,'   HOJA: '.$this->PageNo().' DE {nb}',0,0,'R');
?>