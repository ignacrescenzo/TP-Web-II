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
}