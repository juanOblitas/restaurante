<?php
    error_reporting(0);//Desactiva la notificación de error
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio Maitre</title>
    <link rel="stylesheet" href="css/style2.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body onload="nobackbutton();">
    <?php
        if($_SESSION['isUser']){
            if(strcmp($_SESSION['rol'], 'maitre')==0){
    ?>
    <header class="text-center container">
        <h1>Pidalo con Rima</h1>
        <p>Debes seleccionar 3 de cada uno</p>
    </header>

    
    <main>
        <form method="post" action="dishesSelects.php">
            <div class="container divintres">
                <section class="space">
                    <h2 class="title">Primero</h2>
                    <?php
                        require "../Negocio/Dishes.php";
                        $dishes=new Dishes();
                        $dishes->setKind('primero');
                        $myKindDish=$dishes->getKindDishes();
                        
                        foreach ($myKindDish as $dish) {
                    ?>
                            <input type="checkbox" name="<?php echo $dish->getId(); ?>"><?php echo $dish->getName(); ?><br>
                    <?php
                        }
                    ?>
                </section>
                <section class="space">
                    <h2 class="title">Segundo</h2>
                    <?php
                        $dishes->setKind('segundo');
                        $myKindDish=$dishes->getKindDishes();
                        
                        foreach ($myKindDish as $dish) {
                    ?>
                            <input type="checkbox" name="<?php echo $dish->getId(); ?>"><?php echo $dish->getName(); ?><br>

                        <?php
                        }
                        ?>
                </section>
            
                <section class="space">
                    <h2 class="title">Postre</h2>
                    <?php
                        $dishes->setKind('postre');
                        $myKindDish=$dishes->getKindDishes();
                        
                        foreach ($myKindDish as $dish) {
                    ?>
                        <input type="checkbox" name="<?php echo $dish->getId(); ?>"><?php echo $dish->getName(); ?><br>
                    <?php
                        }
                    ?>
                </section>  
            </div>
            <center>
                <input type="submit" value="agregar" name="btnIn" class="btn btn-primary">

        </form> 
                <!-- <a href="index.php"><button type="button" class="btn btn-primary" name="btnSalir">Salir</button></a> -->
                <form action="salir.php" method="post">
                    <input type="submit" class="btn btn-primary" value="Salir" name="salir">
                </form>
            </center>
            
    </main>
        <?php
            }else{
        ?>
        <p>No puedes ver esta pagina porque tienes una sesion iniciada con el rol cocinero</p><br>
        <a href="inicioCocinero.php">Volver a la pagina de inicio del cocinero</a>
    <?php 
        }        
        }else{
    ?>
    <p>No puedes ver esta pagina porque no eres usuario capullo</p><br>
    <a href="index.php">Volver a la pagina de inicio</a>
    <?php
        }
    ?>
</body>
</html>