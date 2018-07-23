<?php

require_once "../Datos/DA_User.php";

class User {

    private $id;
    private $rol;
    private $name;
    private $password;
    private $email;


    public function __construct ($id=null, $rol=null, $name=null, $password=null, $email=null) {
        $this->id = $id;
        $this->rol = $rol;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function Insertar() {
    	$objDataUser = new DataUser();
        $resultado = $objDataUser->Insertar($this->rol,$this->name,$this->password,$this->email);
	    return $resultado;
    }

    public function Modificar() {
        $objDataUser = new DataUser();
        $resultado = $objDataUser->Modificar($this->id,$this->rol,$this->name,$this->password,$this->email);
	    return $resultado;
    }

    public function Eliminar(){
        $objDataUser = new DataUser();
        $resultado = $objDataUser->Eliminar($this->email);
	    return $resultado;
    }

    public function isUser($email,$password){
        $objDataUser = new DataUser();
        $registro = $objDataUser->isUser($email,$password);
        return $registro;
    }

    public function showRol(){
        $objDataUser = new DataUser();
        $registro = $objDataUser->showRol($this->email,$this->password);
        return $registro;
    }

    public function seekByEmail(){
        $objDataUser = new DataUser();
        $registro = $objDataUser->seekByEmail($this->email);
        if($registro!=null){
            $objetoUser=new User($registro['id'],$registro['rol'],$registro['name'],$registro['password'],$registro['email']);
            return $objetoUser;
        }
        return $registro;
    }

}

?>