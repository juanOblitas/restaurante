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
	?>
	
	<div class="text-center container">
        <h1 id="nomRestaurante">Pidalo con Rima</h1>
        <h3>Se le enviara un enlace para cambiar el password</h3>
        <form method="post" action="verifyEmail.php">
          <div class="input">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
          </div>
          <input type="submit" class="btn btn-primary" value="enviar"></input>
        </form>
    </div>
    <?php
        }else{ ?>
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
