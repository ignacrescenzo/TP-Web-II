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

    public function insertarPuntoDeVenta($direccion,$telefono,$idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql="insert into PuntoDeVenta (direccion, telefono, Comercio_idComercio) values ('".$direccion."','".$telefono."',".$idComercio.")";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            echo "Se inserto correctamente el punto de venta...";
        }else{
            echo "no se pudo registrra el punto de ventas...";
        }


    }
}