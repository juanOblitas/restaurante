<?php
    error_reporting(0);//Desactiva la notificación de error
	session_start();
    //$_SESSION['isUser']=true;//Para que sepa que es usuario y no entre a esta pagina sin registrarse

	$_SESSION["id"]=$_GET['id'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar</title>
	<link rel="stylesheet" href="css/style2.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
    <?php
        if($_SESSION['isUser']){
            if(strcmp($_SESSION['rol'], 'cocinero')==0){
    ?>
	<?php
	 	require "../Negocio/Dishes.php";
		$dish=new Dishes();
    	$dish->setId($_GET['id']);
    	$myDish=$dish->getDish();
 	?>

 	<form action="updateDish.php" method="post" class="col-lg-5">
        <h3>Actualizar Plato</h3>
        <hr/>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $myDish->getName(); ?>" required />
        <label for="calories">Calorias:</label>
        <input type="text" id="calories" name="calories" class="form-control" value="<?php echo $myDish->getCalories(); ?>" required/>
        <label for="kind">Tipo:</label>
        <select name="kind" id="kind" class="form-control" required>
        	<?php
    			if($myDish->getKind()=="primero"){
    		?>
            <option value="<?php echo $myDish->getKind(); ?>" selected><?php echo $myDish->getKind(); ?></option>
            <option value="segundo">Segundo</option>
            <option value="postre">Postre</option>
            <?php
            	}elseif($myDish->getKind()=="segundo"){
            ?>
            <option value="primero">Primero</option>
            <option value="<?php echo $myDish->getKind(); ?>" selected><?php echo $myDish->getKind(); ?></option>
            <option value="postre">Postre</option>
			<?php
            	}elseif($myDish->getKind()=="postre"){
            ?>
            <option value="primero">Primero</option>
            <option value="segundo">Segundo</option>
            <option value="<?php echo $myDish->getKind(); ?>" selected><?php echo $myDish->getKind(); ?></option>
            <?php
            	}
            ?>
        </select>
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" class="form-control" value="<?php echo $myDish->getPrice(); ?>" required/>
        <label for="description">Descripcion:</label>
        <input type="text" id="description" name="description" class="form-control" value="<?php echo $myDish->getDescription(); ?>" required/><br>
        <input type="submit" value="Actualizar" class="btn btn-success" name="update" />
    </form>
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
	
</body>
</html>
