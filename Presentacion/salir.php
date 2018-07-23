<?php
	session_start();
	if(isset($_POST['salir'])){
		$_SESSION['isUser']=false;
		$_SESSION['rol']='';
		header('Location: index.php');
	}
?>