<?php
	session_start();
	require "../Negocio/User.php";
	if(isset($_POST['email']) && isset($_POST['password'])){
		$user=new User();
		$user->setEmail($_POST['email']);
		$user->setPassword($_POST['password']);
		$showRol=$user->showRol();
		
	  	if(strcmp($showRol, "cocinero")==0){
	  		$_SESSION['isUser']=true;
	  		$_SESSION['rol']='cocinero';
	    	header('Location: inicioCocinero.php');
		}elseif(strcmp($showRol, "maitre")==0){
		    $_SESSION['isUser']=true;
		    $_SESSION['rol']='maitre';
		    header('Location: inicioMaitre.php');
		}elseif(strcmp($showRol, "")==0){
		    $_SESSION['isUser']=false;
		    $_SESSION['messageNoUser']=true;
		    $_SESSION['rol']='';
		  	header('Location: index.php');
		 }
	}
    
?>
		


	

