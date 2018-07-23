<?php
	session_start();

	//GENERA PDF
	
	define('FPDF_FONTPATH','font/');
	require('pdf/fpdf/fpdf.php');
	class PDF extends FPDF
	{
		function fondo(){
			$this->Image('img/fondoPDFRestaurant4.jpg','0','0','300','300','JPG');	//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)

		}

		function title(){
			$this->SetFont('Arial','B',50);
			$this->SetTextColor(205, 92, 92);
			$this->Cell(0,70,'MENU',0,1,'C');
		}
		function first($primero){
			
			$this->SetTextColor(205, 92, 92);
			$this->SetFont('Arial','U',15);
			$this->Cell(0,10,'Primeros',0,1,'C');
			$this->SetFont('Arial','',15);
			$this->SetTextColor(25, 111, 61);
			foreach ($primero as $first) {
				$this->Cell(0,10,$first->getName()."..........".$first->getPrice()."$",0,1,'C');
			}
		}
		function second($segundo){

			$this->SetTextColor(205, 92, 92);
			$this->SetFont('Arial','U',15);
			$this->Cell(0,10,'Segundos',0,1,'C');
			$this->SetFont('Arial','',15);
			$this->SetTextColor(25, 111, 61);
			foreach ($segundo as $second) {
				$this->Cell(0,10,$second->getName()."..........".$second->getPrice()."$",0,1,'C');
			}
		}
		function dessert($postre){

			$this->SetTextColor(205, 92, 92);
			$this->SetFont('Arial','U',15);
			$this->Cell(0,10,'Postres',0,1,'C');
			$this->SetFont('Arial','',15);
			$this->SetTextColor(25, 111, 61);
			foreach ($postre as $dessert) {
				$this->Cell(0,10,$dessert->getName()."..........".$dessert->getPrice()."$",0,1,'C');
			}
		}
		
	}
	if($_SESSION['isUser']){
        if(strcmp($_SESSION['rol'], 'maitre')==0){
			require "../Negocio/Dishes.php";
			$primero=unserialize($_SESSION['primero']);
			$segundo=unserialize($_SESSION['segundo']);
			$postre=unserialize($_SESSION['postre']);

			$pdf=new PDF();

			$pdf->AddPage();
			$pdf->fondo();
			$pdf->title();
			$pdf->first($primero);
			$pdf->second($segundo);
			$pdf->dessert($postre);
			$pdf->Output();
    	}else{
?>
        <p>No puedes ver esta pagina porque tienes una sesion iniciada con el rol cocinero</p><br>
        <a href="inicioCocinero.php">Volver a la pagina de inicio del cocinero</a>
    <?php
        }
    }else{
    ?>
    <p>No puedes ver esta pagina porque no eres usuario capullo</p><br>
    <a href="index.php">Volver a la pagina de inicio</a>
    <?php
    	}
    ?>
