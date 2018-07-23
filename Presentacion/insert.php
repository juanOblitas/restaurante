<?php
	require "../Negocio/Dishes.php";
	//Inicio insert platos
	if(isset($_POST['name']) && isset($_POST['calories']) && isset($_POST['kind']) && isset($_POST['price'])
	    && isset($_POST['description']) && isset($_POST['insert'])){

	    $dish=new Dishes(null,$_POST['name'],$_POST['calories'],$_POST['kind'],$_POST['price'],$_POST['description']);
	    $dish->Insertar();
	    header('Location:inicioCocinero.php');
	}
	//Fin insert platos
?>