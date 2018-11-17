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
        header("location:/OperadorComercio/index?v=".$idComercio);
    }

    public function registrarComercio(){
        $this->view->generateSt('registrarComercio_view.php');
    }

    public function peticionNuevoComercio(){
        $comercio = new Model_Comercio();

        $nombreComercio = $_POST['nombre'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $NombreUsuario1 = $_POST['NombreUsuario1'];
        $clave1 = substr( md5(microtime()), 1, 8);
        
        
        $comercio->insertarComercio($nombreComercio,$email,$direccion,$ciudad,$telefono);
        $idComercio = $comercio->traerComercioPorNombre($nombreComercio);
        $comercio->insertarUsuarioDeComercio($NombreUsuario1,$clave1,$idComercio);
        echo "<script>alert('Recibira un correo si su Comercio es aceptado');</script>";
       $this->view->generateSt('home_view.php');
            
    }

    public function eliminarPuntoDeVenta(){
        $idPuntoDeVenta = $_GET['c'];
        $comercio = new Model_Comercio();
        $comercio->eliminarPuntoDeVenta($idPuntoDeVenta);  
        header('location:/OperadorComercio');
    }

     public function modificarPuntoDeVenta(){
        $idPuntoDeVenta = $_GET['c'];
        $this->view->generateSt('modificarPuntoDeVenta.php',$idPuntoDeVenta);
    }

    public function updatePuntoDeVenta(){
        $comercio = new Model_Comercio();
        $idPuntoDeVenta=$_POST['idPuntoDeVenta'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $comercio->updatePuntoDeVenta($idPuntoDeVenta,$telefono,$direccion);
        header('location:/OperadorComercio');
    }
}