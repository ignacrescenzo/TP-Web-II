<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
include 'application/model/model_precio.php';
class Controller_Menu extends Controller
{
    function nuevo(){
        $precio = new Model_Precio();
        $precio->crearPrecio($_POST['precio']);
        $precio->cargarABd($_POST['idPuntoDeVenta']);
        //$precio->cargarId();
        if(isset($_POST['descripcion'])&&isset($_POST['precio'])&&isset($_FILES["file"]["name"])) {
            $this->model->crearMenu($_POST['descripcion'], $_FILES["file"], $_POST['precio'],$_POST['idPuntoDeVenta']);
        }
        $this->model->cargarABd();
        header("location:/puntoDeVenta/index?c=".$_POST['idPuntoDeVenta']."&v=".$_SESSION['idComercio']);
    }

    function modificar()
    {
        $precio = new Model_Precio();
        $idPuntoDeVenta = $_POST['idPuntoDeVenta'];
        $precio->crearPrecio($_POST['precio']);
        $precio->cargarABd($idPuntoDeVenta);
        $this->model->grabarModificacionMenu($_POST['idMenu'],$_FILES["file"],$_POST['descripcion'],$precio->consultarId(),$idPuntoDeVenta);
        $precio->eliminarSiEsNecesario();
        header("location:/puntoDeVenta/index?c=".$idPuntoDeVenta."&v=".$_SESSION['idComercio']);
    }

    function eliminar()
    {
        $this->model->eliminarMenu($_GET['c'],urldecode($_GET['variable']));
        header("location:/puntoDeVenta/index?c=".$_GET['c']."&v=".$_SESSION['idComercio']); 
    }
    function mostrarParaOfertar(){
        $idPuntoDeVenta = $_GET['c'];
        $descripcion = urldecode($_GET['variable']);
        $menu = $this->model->traerParaFormulario($descripcion);
        $this->view->generateSt("mostrarPeticionOferta.php",$menu,$idPuntoDeVenta);
    }

    public function ofertar(){
        $precio = new Model_Precio();
        $idPuntoDeVenta = $_POST['idPuntoDeVenta'];
        $idMenu = $_POST['idMenu'];
        $idPrecioAnterior = $precio->consultarIdPrecioAnterior($idPuntoDeVenta,$idMenu);
        $precio->crearPrecio($_POST['precio']);
        $precio->cargarABd($idPuntoDeVenta);
        $this->model->grabarOferta($idMenu,$precio->consultarId(),$idPuntoDeVenta,$idPrecioAnterior);
        header("location:/puntoDeVenta/index?c=".$idPuntoDeVenta."&v=".$_SESSION['idComercio']);
    }
    function eliminarOferta(){
        $idPuntoDeVenta = $_GET['c'];
        $descripcion = urldecode($_GET['variable']);
        $this->model->eliminarOferta($idPuntoDeVenta,$descripcion);
        header("location:/puntoDeVenta/index?c=".$idPuntoDeVenta."&v=".$_SESSION['idComercio']); 
    }
}