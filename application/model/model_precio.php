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
         $this->cargarId($conn);
     }
     else{
         $precio = mysqli_fetch_assoc($result);
         $this->idPrecio = $precio['idPrecio'];
     }

 }
 public function consultarId(){
     return $this->idPrecio;
 }
    public function cargarId($conn){
        $sql = "SELECT MAX(idPrecio) FROM precio";
        $res = mysqli_query($conn,$sql);
        $id = mysqli_fetch_assoc($res);
        $this->idPrecio =  current($id);
    }

    public function eliminarSiEsNecesario(){
        $conn = mysqli_connect("localhost","root","","tpweb2db");
        $query = "delete from precio where idPrecio not in 
          (select Precio_idPrecio from menu);";
        $result = mysqli_query($conn,$query);
    }
}