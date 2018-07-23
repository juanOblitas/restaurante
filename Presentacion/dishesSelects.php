<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
        if($_SESSION['isUser']){
            if(strcmp($_SESSION['rol'], 'maitre')==0){
        require "../Negocio/Dishes.php";
        $dishes=new Dishes();
        $myKindDish=$dishes->ListarDishes(); 
        $objectDish = array();
        $i=0;             
        foreach ($myKindDish as $dish) {
            if(isset($_POST[$dish->getId()])){
                //Obtenermos los id seleccionados del checkbox y obtenemos los objetos
                $objectDish[$i]=new Dishes($dish->getId(),$dish->getName(),$dish->getCalories(),$dish->getKind(),$dish->getPrice(),$dish->getDescription());
                $i++;
            }
        }
        $primero=$dishes->getDishesByKind($objectDish,'primero');
        $segundo=$dishes->getDishesByKind($objectDish,'segundo');
        $postre=$dishes->getDishesByKind($objectDish,'postre');

        $_SESSION['primero']=serialize($primero);
        $_SESSION['segundo']=serialize($segundo);
        $_SESSION['postre']=serialize($postre);
        
    ?>
    <h1>Menu</h1>
    <section>
        <h2>Primero</h2>
        <ul>
            <?php
                foreach ($primero as $first) {
            ?>
                <li>
            <?php

                echo $first->getName()."..........".$first->getPrice()."€";
            ?>            
                </li>
            <?php
                }
            ?>

        </ul>
    </section>
    
    <section>
        <h2>Segundo</h2>
        <ul>
            <?php
                foreach ($segundo as $second) {
            ?>
                <li>
            <?php
                echo $second->getName()."..........".$second->getPrice()."€";
            ?>            
                </li>
            <?php
                }
            ?>

        </ul>
    </section>

    <section>
        <h2>Postre</h2>
        <ul>
            <?php
                foreach ($postre as $dessert) {
            ?>
                <li>
            <?php
                echo $dessert->getName()."..........".$dessert->getPrice()."€";
            ?>            
                </li>
            <?php
                }
            ?>

        </ul>
    </section>
    <a href="generaPDF.php" target="_blank"><button type="button" class="btn btn-primary">Generar pdf</button></a>
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