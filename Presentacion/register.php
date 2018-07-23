<?php
  error_reporting(0);//Desactiva la notificación de error /*Lo hacemos porque no tenemos iniciadas las dos sessiones que vienen abajo*/
  session_start();
  if(!$_SESSION['isRegister'] && $_SESSION['btnRegister']){
    //echo "no coinciden las contraseñas";
    echo '<script language="javascript">';
    echo 'alert("el email ya existe o no coinciden las contraseñas")';
    echo '</script>';
    $_SESSION['btnRegister']=false;//Para que al actualizar no se reenvie los datos.
  }
  if(!$_SESSION['isUser']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css" />
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	<div class="text-center container" >
        <h1 id="nomRestaurante">Pidalo con Rima</h1>
        <form method="post" action="registerUser.php">
          <div class="input">
            <label for="rol">Rol:</label>
            <select name="rol" id="rol" class="form-control" required>
                <option value="">Selecciona el rol</option>
                <option value="cocinero">Cocinero</option>
                <option value="maitre">Maitre</option>
            </select>
          </div>
          <div class="input">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
          </div>
          <div class="input">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
          </div>
          <div class="input">
            <label for="passwordInput">Password</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password" required>
          </div>
          <div class="input">
            <label for="passwordConfirm">Confirmar Password</label>
            <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm Password" name="confirmpassword" required>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
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