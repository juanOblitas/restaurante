<?php
	session_start();

	require "../Negocio/Dishes.php";
	//$sele=$_SESSION['select'];
	$primero=$_SESSION['primero'];
	$segundo=$_SESSION['segundo'];
	$postre=$_SESSION['postre'];
	require 'fpdf/fpdf.php';
	$pdf=new FPDF();
	$pdf->AddPage();
	//$pdf->Image(../../css/fondo_restaurante.jpg,'0','0','200','300','JPG');
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,20,'MENU',0,1,'C');
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(0,10,'Primeros',0,1,'C');
	$pdf->SetFont('Arial','',15);
	foreach ($primero as $first) {
		$pdf->Cell(0,10,$first->getName()."..........".$first->getPrice(),0,1,'C');
	}
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(0,10,'Segundos',0,1,'C');
	$pdf->SetFont('Arial','',15);
	foreach ($segundo as $second) {
		$pdf->Cell(0,10,$second->getName()."..........".$second->getPrice(),0,1,'C');
	}
	$pdf->SetFont('Arial','U',15);
	$pdf->Cell(0,10,'Postres',0,1,'C');
	$pdf->SetFont('Arial','',15);
	foreach ($postre as $dessert) {
		$pdf->Cell(0,10,$dessert->getName()."..........".$dessert->getPrice(),0,1,'C');
	}
	$pdf->Output();
?>