<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
class Model_Menu extends Model
{
    private $idMenu;
    private $descripcion;
    private $foto;
    private $idPrecio;

    function obtenerIdSegunPrecio($precio){
        $conn = mysqli_connect("localhost","root","","tpweb2db");
        $sql="select * from precio where monto='$precio';";
        $result = mysqli_query($conn,$sql);
        $precio = mysqli_fetch_assoc($result);
        $id = $precio['idPrecio'];
        return $id;
    }

    public function crearMenu($desc,$foto,$precio)
    {
        $this->descripcion = $desc;
        $this->foto = $foto;
        $this->idPrecio = $this->obtenerIdSegunPrecio($precio);
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
            $sql = "insert into menu (foto,descripcion,Precio_idPrecio) values('$this->foto','$this->descripcion',$this->idPrecio);";
            mysqli_query($conn,$sql);
            header("location:/puntoDeVenta");

        }
    }
    public function eliminar(){
        ///LOGICA PARA ELIMINAR DE LA BD
    }
    public function mostrarMenu(){
        echo $this->descripcion;
    }

}

?>