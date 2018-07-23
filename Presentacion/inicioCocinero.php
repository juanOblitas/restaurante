<?php
    error_reporting(0);//Desactiva la notificación de error
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio cocinero</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="js/custom.js"></script>
</head>
<body onload="nobackbutton();">
    <?php
        if($_SESSION['isUser']){
            if(strcmp($_SESSION['rol'], 'cocinero')==0){
            require "../Negocio/Dishes.php";
            $dishes=new Dishes();
    ?>
    <!--Inicio Cabecera-->
    <header>
        <nav class="navbar navbar-expand-sm navbar-light row text-center">
            <div class="col-5">
              <img src="img/logoRestaurant.png" alt="logo">
              <h1 class="navbar-brand">GoodFood</h1>
            </div>
            <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mx-auto col-12 col-lg-2 collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav text-right">
                <li class="nav-item">
                  <div class="btn-group">
                    <p type="text" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Platos
                    </p>
                    <div class="dropdown-menu text-right">
                        <form method="post">
                            <input type="submit" class="dropdown-item" name="primeros" value="Primeros">
                            <input type="submit" class="dropdown-item" name="segundos" value="Segundos">
                            <input type="submit" class="dropdown-item" name="postres" value="Postres">
                            <div class="dropdown-divider"></div>
                            <input type="submit" class="dropdown-item" name="todo" value="Todo">
                        </form>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="btn-group">
                    <p type="text" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Usuario
                    </p>
                    <div class="dropdown-menu text-right">
                      <a class="dropdown-item" href="prueba2.html">Datos</a>
                      <form action="salir.php" method="post">
                          <input type="submit" class="dropdown-item" value="Salir" name="salir">
                      </form>
                      <!-- <a class="dropdown-item" href="index.php">Salir</a> -->
                    </div>
                  </div>
                </li>
              </ul>
            </div>
        </nav>
    </header>
    <!--Fin Cabecera-->
    <!-- <a href="index.php" class="btn btn-success">Salir</a> -->
    <div class="d-flex row"><!-- El row hara que el contenido de la derecha caiga -->
        <div class="col-lg-5">
            
            <h3>Añadir Plato</h3>
            <hr/>
            <form action="insert.php" method="post" >
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required />
                <label for="calories">Calorias:</label>
                <input type="text" id="calories" name="calories" class="form-control" required/>
                <label for="kind">Tipo:</label>
                <select name="kind" id="kind" class="form-control" required>
                    <option value="">Elige tu tipo</option>
                    <option value="primero">Primero</option>
                    <option value="segundo">Segundo</option>
                    <option value="postre">Postre</option>
                </select>
                <label for="price">Precio:</label>
                <input type="text" id="price" name="price" class="form-control" required/>
                <label for="description">Descripcion:</label>
                <input type="text" id="description" name="description" class="form-control" required/><br>
                <input type="submit" value="insertar" class="btn btn-success" name="insert" />
            </form>
        </div>

        <div class="col-lg-7">
            <h3>Platos</h3>
            <hr>
            <section class="usuario" >
	
            <?php
                $myDishes=$dishes->ListarDishes();
                if(isset($_POST['primeros'])){
                    $dishes->setKind("primero");
                    $myDishes=$dishes->getKindDishes();
                }elseif(isset($_POST['segundos'])){
                    $dishes->setKind("segundo");
                    $myDishes=$dishes->getKindDishes();
                }elseif(isset($_POST['postres'])){
                    $dishes->setKind("postre");
                    $myDishes=$dishes->getKindDishes();
                }elseif(isset($_POST['todo'])){
                    $myDishes=$dishes->ListarDishes();
                }
                foreach ($myDishes as $dish) {
            ?>
                    <div class='tusabras'>
                    <p>
                    <?php   
                        echo $dish->getId()."-";
                        echo $dish->getName()."-";
                        echo $dish->getCalories()."-";
                        echo $dish->getKind()."-";
                        echo $dish->getPrice()."-";
                        echo $dish->getDescription();
                    ?>
                    </p>
                    <div class="right">
                        <a href="update.php?id=<?php echo $dish->getId(); ?>" class="btn btn-success">Actualizar</a>
                        <a href="delete.php?id=<?php echo $dish->getId(); ?>" class="btn btn-danger">Borrar</a>
                    </div>
                    </div><!-- Cerramos el div con class='tusabras' -->
                    <?php 
                        }
                    ?>
            </section>
    </div>

    
    </div>
        <?php
            }else{
        ?>
        <p>No puedes ver esta pagina porque tienes una sesion iniciada con el rol Maitre</p><br>
        <a href="inicioMaitre.php">Volver a la pagina de inicio del Maitre</a>
    <?php
        }
        }else{

    ?>
    <p>No puedes ver esta pagina porque no eres usuario capullo</p><br>
    <a href="index.php">Volver a la pagina de inicio</a>
    <?php
        }
    ?>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>