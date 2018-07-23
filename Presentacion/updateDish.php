<?php
	session_start();
	require "../Negocio/Dishes.php";
 	if(isset($_POST['name']) && isset($_POST['calories']) && isset($_POST['kind']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['update'])){
 		//Actualizamos
 		$dishToUpdate=new Dishes($_SESSION["id"],$_POST['name'],$_POST['calories'],$_POST['kind'], $_POST['price'],$_POST['description']);
        $dishToUpdate->Modificar();
        
 		header('Location: inicioCocinero.php');
 	}
?>
