<?php

include 'modelo_conexion_base_de_datos.php';


class Model_Usuario extends Model{

  private $db;
  private $usuario;
  private $clave;

  public function __construct(){
   require_once 'modelo_conexion_base_de_datos.php';
   $db=BaseDeDatos::conectarBD();
 }

   public function validarlogin($u,$c){
   $db=BaseDeDatos::conectarBD();
 
    $sql= 'select * from Usuario where nombreUsuario="'.$u.'" and clave="'.$c.'" ';
    
    $result=mysqli_query($db,$sql);

    if (mysqli_num_rows($result)==1) {
      return true;
      }else{
        echo "Error al buscar el usuario";
      }

   }

}