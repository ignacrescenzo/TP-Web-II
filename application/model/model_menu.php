<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
require_once 'modelo_conexion_base_de_datos.php';
class Model_Menu extends Model
{
    private $idMenu;
    private $descripcion;
    private $foto;
    private $idPrecio;
    private $idPuntoDeVenta;
	
    function obtenerIdSegunPrecio($precio){
        $conn =BaseDeDatos::conectarBD();
        $sql="select * from precio where monto='$precio';";
        $result = mysqli_query($conn,$sql);
        $precio = mysqli_fetch_assoc($result);
        $id = $precio['idPrecio'];
        return $id;
    }

    public function crearMenu($desc,$foto,$precio,$idPuntoDeVenta)
    {
        $this->descripcion = $desc;
        $this->idPuntoDeVenta = $idPuntoDeVenta;
        if(file_exists("application/resources/upload/" . $foto["name"]))
            {
            echo $foto["name"] . " ya existe. ";
            }
            else
            {
            move_uploaded_file($foto["tmp_name"],
            "application/resources/upload/".$foto["name"]);
            $this->foto=$foto["name"];
            echo "Almacenado en: "."application/resources/upload/" . $foto["name"];
            }

        $this->idPrecio = $this->obtenerIdSegunPrecio($precio);
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function cargarABd(){
        $conn =BaseDeDatos::conectarBD();
        $sql="select * from menu where descripcion='$this->descripcion';";
        $result = mysqli_query($conn,$sql);
        $numeroFilas=mysqli_num_rows($result);
        if($numeroFilas==0)
        {
            $sql = "insert into menu (foto,descripcion,Precio_idPrecio,idPuntoDeVenta,ofertado) values('$this->foto','$this->descripcion',$this->idPrecio,$this->idPuntoDeVenta,0);";
            mysqli_query($conn,$sql);
        }
    }
    public function mostrarMenu(){
    }

    public function grabarModificacionMenu($id,$foto,$descripcion,$idPrecio,$idPuntoDeVenta){
        $conn =BaseDeDatos::conectarBD();

        if(file_exists("application/resources/upload/" . $foto["name"]))
            {
            echo $foto["name"] . " ya existe. ";
            }
            else
            {
            move_uploaded_file($foto["tmp_name"],
            "application/resources/upload/" . $foto["name"]);
            $this->foto=$foto["name"];
            echo "Almacenado en: " . "application/resources/upload/" . $foto["name"];
        }
        $grabar = "update menu
                   set  foto ='".$foto["name"]."', descripcion ='$descripcion', Precio_idPrecio=$idPrecio 
                   where idMenu =$id and idPuntoDeVenta =$idPuntoDeVenta;";
        mysqli_query($conn,$grabar);
        
        
    }

    public function traerParaFormulario($desc){
        $conn =BaseDeDatos::conectarBD();
        $sql="SELECT * FROM menu m inner join precio p on m.Precio_idPrecio=p.idPrecio WHERE m.descripcion = '$desc'";
        $result= mysqli_query($conn,$sql);
        $rows= mysqli_fetch_assoc($result);
        return $rows;
    }

    public function obtenerArrayProducto($descripcion){
        $conn =BaseDeDatos::conectarBD();
        $sql="SELECT * FROM menu m inner join precio p on m.Precio_idPrecio=p.idPrecio WHERE m.descripcion = '$descripcion'";
        $result= mysqli_query($conn,$sql);
        $rows= mysqli_fetch_assoc($result);
        $array = array(
            "id" => $rows['idMenu'],
            "cantidad" => 1,
            "precio" => $rows['monto'],
            "descripcion" => $rows['descripcion']
        );

        return $array;
    }

    public function listarMenus($idPuntoDeVenta,$idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from menu m 
        inner join precio p on p.idPrecio = m.Precio_idPrecio
        inner join puntodeventa pdv on pdv.idPuntoDeVenta = m.idPuntoDeVenta
        inner join comercio c on c.idComercio = pdv.Comercio_idComercio
        where c.idComercio = ".$idComercio." and pdv.idPuntoDeVenta = $idPuntoDeVenta;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function listarMenusCliente($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from menu m 
        inner join precio p on p.idPrecio = m.Precio_idPrecio
        inner join puntodeventa pdv on pdv.idPuntoDeVenta = m.idPuntoDeVenta
        inner join comercio c on c.idComercio = pdv.Comercio_idComercio
        where c.idComercio = ".$idComercio.";";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function eliminarMenu($idPuntoDeVenta,$descripcion){
        $conn =BaseDeDatos::conectarBD();
        $queryPrecio = "select * from menu where descripcion='$descripcion' and idPuntoDeVenta = '$idPuntoDeVenta'";
        $result = mysqli_query($conn,$queryPrecio);
        $precio = mysqli_fetch_assoc($result);
        $idPrecio = $precio['Precio_idPrecio'];
        //HAGO LA QUERY PARA DESPUES PREGUNTAR CUANTOS MENUES HAY CON ESE PRECIO
        $queryMenuesConEsePrecio = "select idMenu from menu where Precio_idPrecio = $idPrecio and idPuntoDeVenta = '$idPuntoDeVenta'";
        $result = mysqli_query($conn,$queryMenuesConEsePrecio);
        $numeroFilas=mysqli_num_rows($result);
        ////BORRO PRIMERO EL MENU PARA QUE NO DE ERROR
        $query = "delete from menu where descripcion='$descripcion' and idPuntoDeVenta = '$idPuntoDeVenta';";
        $resultado = mysqli_query($conn, $query);
        ////
        /// ///AHORA PREGUNTO CUANTOS MENUES TIENEN ESE PRECIO PARA SABER SI BORRARLO O NO
        if($numeroFilas==1) {
            //Logica: tiene que eliminar de la tabla de precio si el menu que voy a borrar es el unico que tiene ese precio. Por eso $numeroFilas==1
            $queryBorrarPrecio = "delete from precio where idPrecio = $idPrecio; and idPuntoDeVenta = '$idPuntoDeVenta'";
            $result = mysqli_query($conn, $queryBorrarPrecio);
        }
    }

    public function grabarOferta($idMenu,$idPrecio,$idPuntoDeVenta,$idPrecioAnterior){
        $conn =BaseDeDatos::conectarBD();
        $grabar = "update menu
        set  Precio_idPrecio=$idPrecio, ofertado = 1,Precio_idPrecioAnterior = $idPrecioAnterior
        where idMenu =$idMenu and idPuntoDeVenta = $idPuntoDeVenta;";
        mysqli_query($conn,$grabar);
        
    }

    public function listarOfertas($idPuntoDeVenta,$idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from menu m inner join precio p on p.idPrecio = m.Precio_idPrecio inner join puntodeventa pdv on pdv.idPuntoDeVenta=m.idPuntoDeVenta inner join comercio c on c.idComercio = pdv.Comercio_idComercio where ofertado = 1 and pdv.idPuntoDeVenta = ".$idPuntoDeVenta." and c.idComercio =".$idComercio.";";
        $resultado = mysqli_query($conn, $sql);
        return $resultado;
    }

    public function listarOfertasCliente($idComercio){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from menu m inner join precio p on p.idPrecio = m.Precio_idPrecio inner join puntodeventa pdv on pdv.idPuntoDeVenta=m.idPuntoDeVenta inner join comercio c on c.idComercio = pdv.Comercio_idComercio where ofertado = 1 and c.idComercio =".$idComercio.";";
        $resultado = mysqli_query($conn, $sql);
        return $resultado;
    }

    public function eliminarOferta($idPuntoDeVenta,$descripcion){
        $conn = BaseDeDatos::conectarBD();
        //busco id precio anterior
        $sql = "select Precio_idPrecioAnterior from menu where idPuntoDeVenta = 1
        and descripcion = '$descripcion'";
        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);
        $idPrecioAnterior = $row['Precio_idPrecioAnterior'];
        $grabar = "update menu
        set  Precio_idPrecio= $idPrecioAnterior, ofertado = 0
        where descripcion ='$descripcion' and idPuntoDeVenta = $idPuntoDeVenta;";
        $result = mysqli_query($conn, $grabar);
    }

}

?>