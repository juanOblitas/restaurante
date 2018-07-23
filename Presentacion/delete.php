<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	 	require "../Negocio/Dishes.php";
	 	$dishes=new Dishes();
	 	$dishes->setId($_GET['id']);
	 	$dishes->Eliminar();
	 	header('Location: inicioCocinero.php');
	?>
</body>
</html>
