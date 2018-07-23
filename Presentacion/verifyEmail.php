<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enviar email</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css" />
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	<?php
	if(!$_SESSION['isUser']){
	 	require "../Negocio/User.php";
	 	//Método con str_shuffle() 
		function generateRandomString($length = 10) { 
		    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
		}
	 	if(isset($_POST['email'])){
	 		$user=new User();
	 		$user->setEmail($_POST['email']);
	 		$newUser=$user->seekByEmail();
	 		if($newUser!=null){
	 			
	 			$newUser->setPassword(generateRandomString());
	 			$cabeceras = 'From: jcoblitas86@gmail.com' . "\r\n" .
			    'Reply-To: jcoblitas86@gmail.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
	 			mail($newUser->getEmail(),"Nueva contraseña:","Hola ".$newUser->getName()." tu contrasenya nueva es: ".$newUser->getPassword(),$cabeceras);
	 			$newUser->Modificar();
	?>
				<p>Se le acaba de enviar un correo con la nueva contraseña a 
			<?php
	 			echo " ".$newUser->getEmail();
	 		?>
			</p>
			<a href="index.php">Volver a la pagina de inicio</a>
			<?php
	 		}else{
	 		?>
	 		<p>El correo no existe</p>
	 		
	 		<?php

	 		}
	 		
	 	}
	}else{
	?>
	<p>No puedes ver esta pagina porque eres usuario y no saliste correctamente</p><br>
    <?php
        if(strcmp($_SESSION['rol'],'cocinero')==0){
    ?>
    <a href="inicioCocinero.php">Volver a la pagina para que salgas correctamente</a>
    <?php }elseif(strcmp($_SESSION['rol'],'maitre')==0){ ?>
    <a href="inicioMaitre.php">Volver a la pagina para que salgas correctamente</a>
    <?php } ?>
    <?php
        }
    ?>
</body>
</html>

