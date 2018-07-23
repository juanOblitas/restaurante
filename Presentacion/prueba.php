<?php
 	require "../Negocio/User.php";
 	$user=new User();
 	$user->setEmail("juan@gmail.com");
 	print_r($user->seekByEmail());
 	if($user->seekByEmail()==null){
 		echo "no estas en la base de datos";
 	}else{
 		echo "estas en la base de datos";
 	}
?>

