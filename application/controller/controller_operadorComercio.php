<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
include 'application/model/model_comercio.php';
include 'application/model/model_usuario.php';
class Controller_OperadorComercio extends Controller
{
    public function mostrarformularioregistro(){
        $comercio = new Model_Comercio();
        $comercios = $comercio->listarComercios();
        $this->view->generateSt('registrar-operador_view.php',$comercios);
    }

    public function validarOperadorComercio(){
        $usuario = new Model_Usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $comercioId = $_POST['comercio'];
        $usuario->insertarOperadorComercio($username,$password,$comercioId);
        header("location:/login");
    }

    public function mostrarPedidos(){
        $id = $_GET['c'];
        $operador = new Model_usuario();
        $pedidos = $operador->mostrarPedidosOperador($id);
        $this->view->generateSt('pedidosOperador.php',$pedidos, $id);
    }

    public function index(){
        $comercio = new Model_Comercio();
        $idComercio = $_GET['v'];
        $puntosDeVenta = $comercio->listarPuntosDeVenta($idComercio);
        $this->view->generateSt('puntosDeVenta.php', $puntosDeVenta);
    }

    public function crearPuntoDeVenta(){
        $idComercio=$_GET['idComercio'];
        $this->view->generateSt('registrar-puntoDeVenta_view.php',$idComercio);
    }

    public function registrarPuntoDeVenta(){
        $comercio= new Model_comercio();
        $idComercio=$_POST['idComercio'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $comercio->insertarPuntoDeVenta($direccion,$telefono,$idComercio);
        //header("location:/OperadorComercio"); 
    }
}