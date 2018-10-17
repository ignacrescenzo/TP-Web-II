<?php

class Model_Usuario extends Model{
    private $usuario;
    private $contrasenia;
    private $rol;

    public function __construct(){
        $this->usuario = "admin";
        $this->contrasenia = "admin";
    }
    public function validarlogin($u,$c)
    {
          if($u==$this->usuario&&$c==$this->contrasenia) {
              return true;
          }
    }
}