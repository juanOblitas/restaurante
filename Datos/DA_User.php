<?php

require_once 'Conexion.php';

class DataUser {

	const TABLA = 'user';

	public function Insertar($rol, $name, $password,$email) {
    	$conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' VALUES(null, :rol,:name,:password,:email)');
		
		$consulta->bindParam(':rol', $rol);
        $consulta->bindParam(':name', $name);
        $consulta->bindParam(':password', $password);
        $consulta->bindParam(':email', $email);
        
        $resultado = $consulta->execute();
        $conexion = null;//cierra la conexion

	    return $resultado;
    }

    public function Modificar($id,$rol, $name, $password,$email) {

        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET rol = :rol, name=:name, password=:password, email=:email
            WHERE id=:id');

        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':rol', $rol);
        $consulta->bindParam(':name', $name);
        $consulta->bindParam(':password', $password);
        $consulta->bindParam(':email', $email);

        $resultado= $consulta->execute();

		$conexion = null;

		return $resultado;
    }

    public function Eliminar($email){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE email = :email');
        $consulta->bindParam(':email', $email);
        $resultado=$consulta->execute();
        $conexion = null;

        return $resultado;
    }
    
    //Metodo que verifica si es usuario o no.
    public function isUser($email,$password){
    	$conexion = new Conexion();
    	$consulta=$conexion->prepare('SELECT COUNT(*) FROM '. self::TABLA . ' WHERE email=:email AND password=:password');

        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':password', $password);

        $consulta->execute();

        $registro = $consulta->fetch();
        $conexion=null;

        foreach ($registro as $value) {
        	if($value[0]==1)
        		return 1;
		}
        return 0;

    }

    public function showRol($email,$password){
    	$conexion = new Conexion();
    	$consulta=$conexion->prepare('SELECT rol FROM '. self::TABLA . ' WHERE email=:email AND password=:password');

        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':password', $password);

        $consulta->execute();

        $registro = $consulta->fetch();
        $conexion=null;
        return $registro['rol'];
    }

    public function seekByEmail($email){
        $conexion = new Conexion();
        $consulta=$conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE email=:email');
        $consulta->bindParam(':email', $email);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion=null;
        return $registro;
    }


}

?>