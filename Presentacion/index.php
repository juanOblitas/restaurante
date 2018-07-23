<?php
  error_reporting(0);//Desactiva la notificación de error /*Lo hacemos porque no tenemos iniciadas las sessiones que vienen abajo*/
  session_start();

  $_SESSION['btnRegister']=false;

  if($_SESSION['isRegister']){
    echo '<script language="javascript">';
    echo 'alert("registrado correctamente")';
    echo '</script>';
    $_SESSION['isRegister']=false;//Las contraseñas no coinciden (hay que crear otra variable de session)
  }
  
  if($_SESSION['messageNoUser']){
    echo '<script language="javascript">';
    echo 'alert("no eres usuario")';
    echo '</script>';
    $_SESSION['messageNoUser']=false;//Importante para que cuando actulizemos la pagina no me mande el alert, debe hacerlo solo cuando me logeo mal.
  }
  if(!$_SESSION['isUser']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

    <div class="text-center container">
        <h1 id="nomRestaurante">Pidalo con Rima</h1>
        <form method="post" action="verifyUser.php">
          <div class="login">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="password">
            <label for="passwordInput">Password</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password" required>
            <small id="passwordHelp" class="form-text text-muted">Your Password</small>
          </div>
          <p id='message'></p>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="enviarEmail.php">Lost your password?</a>
          <a href="register.php" name="register">Registrate</a>
        </form>
    </div>
    <?php }else{ ?>
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
    <script src="jquery-2.1.4.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="js/noUser.js"></script>
    
</body>
</html>