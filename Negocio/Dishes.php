<?php

require_once "../Datos/DA_Dishes.php";

class Dishes {

    private $id;
    private $name;
    private $calories;
    private $kind;
    private $price;
    private $description;

    public function __construct ($id=null,$name=null, $calories=null, $kind=null, $price=null,$description=null) {
        $this->id=$id;
        $this->name = $name;
        $this->calories = $calories;
        $this->kind = $kind;
        $this->price = $price;
        $this->description=$description;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id=$id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCalories() {
        return $this->calories;
    }

    public function setCalories($calories) {
        $this->calories = $calories;
    }

    public function getKind() {
        return $this->kind;
    }

    public function setKind($kind) {
        $this->kind = $kind;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function Insertar() {
    	$objDataUser = new DataDishes();
        $resultado = $objDataUser->Insertar($this->name,$this->calories,$this->kind,$this->price,$this->description);
	    return $resultado;
    }

    public function Modificar() {
        $objDataUser = new DataDishes();
        $resultado = $objDataUser->Modificar($this->id,$this->name,$this->calories,$this->kind,$this->price,$this->description);
	    return $resultado;
    }

    public function Eliminar(){
        $objDataUser = new DataDishes();
        $resultado = $objDataUser->Eliminar($this->id);
	    return $resultado;
    }

   

    public function ListarDishes() {
        $objDataDishes = new DataDishes();
        $arrayRegistros = $objDataDishes->ListarDishes();
        if (!$arrayRegistros)
            return false;
        else {
            $arrayDishes = array();
            foreach ($arrayRegistros as $registro) {
                $objDishes = new Dishes($registro['id'],$registro['name'] ,$registro['calories'] ,$registro['kind'],$registro['price'],$registro['description']);
                $arrayDishes[]=$objDishes;//add
            }
            return $arrayDishes;
        } 
    }

    public function getDish(){
        $objDataDishes = new DataDishes();
        $arrayRegistros = $objDataDishes->getDish($this->id);
        //Convertimos a objeto
        $objetoDish=new Dishes($arrayRegistros['id'],$arrayRegistros['name'],$arrayRegistros['calories'],$arrayRegistros['kind'],$arrayRegistros['price'],$arrayRegistros['description']);
        return $objetoDish;
        
    }

    public function getKindDishes() {
        $objDataDishes = new DataDishes();
        $arrayRegistros = $objDataDishes->getKindDishes($this->kind);
        if (!$arrayRegistros)
            return false;
        else {
            $arrayDishes = array();
            foreach ($arrayRegistros as $registro) {
                $objDishes = new Dishes($registro['id'],$registro['name'] ,$registro['calories'] ,$registro['kind'],$registro['price'],$registro['description']);
                $arrayDishes[]=$objDishes;//add
            }
            return $arrayDishes;
        } 

    }  

    //Metodo que devuelve de un array de objetos tipo dishes de un tipo(primero, segundo, postre)
    public function getDishesByKind($objectDish,$kind){
        $dishes=array();
        $i=0; 
        foreach ($objectDish as $dish) {
            if($dish->getKind()==$kind){
                $dishes[$i]=new Dishes($dish->getId(),$dish->getName(),$dish->getCalories(),$dish->getKind(),$dish->getPrice(),$dish->getDescription());
                $i++;
            }
        }
        return $dishes;
    }
    
}

?>