<?php
	session_start();
	$_SESSION['btnRegister']=true;
	header('Location: register.php');
?>