<?php
class Model_Precio extends Model
{
 private $idPrecio;
 private $monto;
 private $porcentajeDescuento;
 public function __construct(){

 }
 public function crearPrecio($cantidad){
     $this->monto = $cantidad;
 }
 public function cargarABd(){
     $conn = mysqli_connect("localhost","root","","tpweb2db");
     $sql="select * from precio where monto='$this->monto';";
     $result = mysqli_query($conn,$sql);
     $numeroFilas=mysqli_num_rows($result);
     if($numeroFilas==0)
     {
         $sql = "insert into precio (monto,porcDesc) values($this->monto,0);";
         mysqli_query($conn,$sql);
         $this->cargarId();
     }
     else{
         $precio = mysqli_fetch_assoc($result);
         $this->idPrecio = $precio['idPrecio'];
     }

 }
 public function consultarId(){
     return $this->idPrecio;
 }
    public function cargarId(){
        $conn = mysqli_connect("localhost","root","","tpweb2db");
        $sql = "SELECT MAX(idPrecio) FROM precio";
        $id = mysqli_query($conn,$sql);
        $this->idPrecio =  $id;
    }
}