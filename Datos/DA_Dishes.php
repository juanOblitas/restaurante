<?php

require_once 'Conexion.php';

class DataDishes {

	const TABLA = 'dishes';

	public function Insertar($name, $calories, $kind,$price,$description) {
    	$conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' VALUES(null, :name,:calories,:kind,:price,:description)');
		
		$consulta->bindParam(':name', $name);
        $consulta->bindParam(':calories', $calories);
        $consulta->bindParam(':kind', $kind);
        $consulta->bindParam(':price', $price);
        $consulta->bindParam(':description', $description);
        
        $resultado = $consulta->execute();
        $conexion = null;//cierra la conexion
	    return $resultado;
    }

    public function Modificar($id,$name, $calories, $kind,$price,$description) {

        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET name = :name, calories=:calories, kind=:kind,price=:price,description=:description WHERE id=:id');

        $consulta->bindParam(':name', $name);
        $consulta->bindParam(':calories', $calories);
        $consulta->bindParam(':kind', $kind);
        $consulta->bindParam(':price', $price);
        $consulta->bindParam(':description', $description);
        $consulta->bindParam(':id', $id);

        $resultado= $consulta->execute();
		$conexion = null;

		return $resultado;
    }

    public function Eliminar($id){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $resultado=$consulta->execute();
        $conexion = null;

        return $resultado;
    }
    
    public function ListarDishes() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
        $consulta->execute();
        $arrayRegistros = $consulta->fetchAll();
        $conexion = null;
        return $arrayRegistros;
    }

    public function getDish($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA. ' WHERE id=:id');
        $consulta->bindParam(':id', $id);
        $resultado=$consulta->execute();
        $arrayRegistros = $consulta->fetch();
        $conexion = null;
        return $arrayRegistros;
    }

    public function getKindDishes($kind) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA. ' WHERE kind=:kind');
        $consulta->bindParam(':kind', $kind);
        $resultado=$consulta->execute();
        $arrayRegistros = $consulta->fetchAll();
        $conexion = null;
        return $arrayRegistros;
    }

    
}




?>