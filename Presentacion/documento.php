<?php
	
	session_start();
	$sele=substr($_SESSION['select'], 0,-1);
	$id = explode(",", $sele);
	echo "los id:<br>".$sele."<br>";
	require "../Negocio/Dishes.php";
	$dish=new Dishes();
	

	/*
	echo "<center>";
	echo "<h1>Menu</h1>";
	echo "<font style='text-decoration: underline;'><h2>Primeros</h2></font>";
	Muestra todos los elementos menos el ultimo
	for($i=0;$i<count($porciones)-1;$i++){
		echo $porciones[$i]."<br>";
	}
	
	for($i=0;$i<3;$i++){
		echo $porciones[$i]."<br><br>";
	}
	echo "<font style='text-decoration: underline;'><h2>Segundos</h2></font>";
	for($i=3;$i<6;$i++){
		echo $porciones[$i]."<br><br>";
	}
	echo "<font style='text-decoration: underline;'><h2>Postres</h2></font>";
	for($i=6;$i<9;$i++){
		echo $porciones[$i]."<br><br>";
	}
	echo "<form method='post' action='pdf'>";
	echo "<input type='submit' name='pdf' value='Generar pdf'></input>";
	echo "</form>";
	echo "</center>";*/
?>
