<?php
	session_start();
	require "../Negocio/User.php";
	$_SESSION['btnRegister']=false;
	if(isset($_POST['rol']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])){
		$_SESSION['btnRegister']=true;//boton registro clickeado
		//si email no existe 
		$user=new User();
		$user->setEmail($_POST['email']);
		//$user->existEmail();
		if(strcmp($_POST['password'],$_POST['confirmpassword'])==0 && $user->seekByEmail()==null){
			$user=new User(null,$_POST['rol'],$_POST['name'],$_POST['password'],$_POST['email']);
		  	$user->Insertar();
		  	$_SESSION['isRegister']=true;
		  	header('Location: index.php');
		}else{
			//echo "Las contraseñas no coinciden";
			$_SESSION['isRegister']=false;
			header('Location: register.php');
		}
	  
	}
?>