<?php
require_once 'modelo_conexion_base_de_datos.php';
class Model_Comercio extends Model{
    public function __construct() {
        
    }
    public function listarComercios(){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from Comercio;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function listarPuntosDeVenta($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from puntodeventa where Comercio_idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
        return $result;
    }


    public function insertarComercio($nombreComercio,$email,$direccion,$ciudad,$telefono,$NombreUsuario1,$clave1){
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into comercio (nombre,email,direccion,ciudad,banner,telefono) values ('".$nombreComercio."','".$email."','".$direccion."','".$ciudad."', null, '".$telefono."' );";

        $sql2 = "insert into usuario (nombreUsuario, clave, Rol_idRol, habilitado) values ('".$NombreUsuario1."', '".$clave1."', 4, 0)";
        
        $result = mysqli_query($conn,$sql);
        
        $result2 = mysqli_query($conn,$sql2);
           
    }
   
}