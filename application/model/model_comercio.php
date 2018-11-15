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

    public function listarComercioEspecifico($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from Comercio where idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function traerComercioPorNombre($nombreComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select idComercio from comercio where nombre = '".$nombreComercio."';";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['idComercio'];
        return $id;
    }

    public function agregarIdComercioAOperador($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "upgrade usuario set Comercio_idComercio =".$idComercio." WHERE idUsuario=9;
";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    
    public function listarPuntosDeVenta($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from puntodeventa where Comercio_idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
        return $result;
    }


    public function insertarComercio($nombreComercio,$email,$direccion,$ciudad,$telefono){
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into comercio (nombre,email,direccion,ciudad,banner,telefono, habilitado) values ('".$nombreComercio."','".$email."','".$direccion."','".$ciudad."', null, '".$telefono."',0 );";

        $result = mysqli_query($conn,$sql);   
    }

    public function insertarUsuarioDeComercio($NombreUsuario1,$clave1,$idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into usuario (nombreUsuario, clave, Rol_idRol, habilitado, Comercio_idComercio) values ('".$NombreUsuario1."', '".$clave1."', 4, 0,".$idComercio.")";
        $result = mysqli_query($conn,$sql);   
    }


        

    public function listarComerciosEnEspera(){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select c.idComercio as idComercio, c.nombre as nombreComercio, c.email as emailComercio, c.direccion as direccionComercio, c.ciudad as ciudadComercio, c.telefono as telefonoComercio, c.habilitado as habilitadoComercio, u.idUsuario as idUsuario
from comercio as c
inner join usuario as u on c.idComercio = u.Comercio_idComercio
where c.habilitado = 0;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    
}