<?php
class Model_Menu extends Model
{
    private $idMenu;
    private $descripcion;
    private $foto;
    private $idPrecio;

    public function crearMenu($desc,$foto,$precio)
    {
        $this->descripcion = $desc;
        $this->foto = $foto;
        $objetoPrecio = new Model_Precio();
        $objetoPrecio->crearPrecio($precio);
        $this->precio = $objetoPrecio;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function cargarABd(){
        $conn = mysqli_connect("localhost","root","","tpweb2db");
        $sql="select * from menu where descripcion='$this->descripcion';";
        $result = mysqli_query($conn,$sql);
        $numeroFilas=mysqli_num_rows($result);
        if($numeroFilas==0)
        {
            $sql = "insert into menu (foto,descripcion,Precio_idPrecio) values('$this->foto','$this->descripcion','$this->$precio->consultarId()');";

            header("location:/comercio");
            mysqli_query($conn,$sql);
        }
        else{

            echo "<div style='text-align:center;margin-top:150px;'><h1>YA EXISTE ESE MENU!</h1><br>";
            echo "<a href='/comercio'>VOLVER</a></div>";
        }
    }

    public function eliminar(){
        ///LOGICA PARA ELIMINAR DE LA BD
    }

}

?>