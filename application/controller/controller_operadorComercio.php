<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
include 'application/model/model_comercio.php';
include 'application/model/model_usuario.php';
class Controller_OperadorComercio extends Controller
{
    public function mostrarformularioregistro()
    {
        $comercio = new Model_Comercio();
        $comercios = $comercio->listarComercios();
        $this->view->generateSt('registrar-operador_view.php', $comercios);
    }

    public function validarOperadorComercio()
    {
        $usuario = new Model_Usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $comercioId = $_POST['comercio'];
        $usuario->insertarOperadorComercio($username, $password, $comercioId);
        header("location:/login");
    }

    public function mostrarPedidos()
    {
        $id = $_GET['c'];
        $operador = new Model_usuario();
        $pedidos = $operador->mostrarPedidosOperador($id);
        $this->view->generateSt('pedidosOperador.php', $pedidos, $id);
    }

    public function index()
    {
        $comercio = new Model_Comercio();
        $idComercio = $_GET['v'];
        $banner = $comercio->obtenerBanner($idComercio);
        $puntosDeVenta = $comercio->listarPuntosDeVenta($idComercio);

        $this->view->generateSt('puntosDeVenta.php', $puntosDeVenta, $idComercio, $banner);
    }

    public function crearPuntoDeVenta()
    {
        $idComercio=$_GET['idComercio'];
        $comercio = new Model_Comercio();
        $listaLocalidades=$comercio->listarLocalidades();
        $this->view->generateSt('registrar-puntoDeVenta_view.php', $idComercio, $listaLocalidades);
    }

    public function registrarPuntoDeVenta()
    {
        $comercio= new Model_comercio();
        $idComercio=$_POST['idComercio'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $idLocalidad=$_POST['idLocalidad'];
        $comercio->insertarPuntoDeVenta($direccion, $telefono, $idComercio, $idLocalidad);
        header("location:/OperadorComercio/index?v=".$idComercio);
    }

    public function registrarComercio()
    {
        $this->view->generateSt('registrarComercio_view.php');
    }

    public function peticionNuevoComercio()
    {
        $comercio = new Model_Comercio();

        $nombreComercio = $_POST['nombre'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $NombreUsuario1 = $_POST['NombreUsuario1'];
        $clave1 = substr(md5(microtime()), 1, 8);
        
        
        $comercio->insertarComercio($nombreComercio, $email, $direccion, $telefono, $_FILES["file"]);
        $idComercio = $comercio->traerComercioPorNombre($nombreComercio);
        $comercio->insertarUsuarioDeComercio($NombreUsuario1, $clave1, $idComercio);
        echo "<script>alert('Recibira un correo si su Comercio es aceptado');</script>";
        $this->view->generateSt('home_view.php');
    }

    public function eliminarPuntoDeVenta()
    {
        $idPuntoDeVenta = $_GET['c'];
        $idComercio = $_GET['v'];
        $comercio = new Model_Comercio();
        $comercio->eliminarPuntoDeVenta($idPuntoDeVenta, $idComercio);
        header('location:/OperadorComercio?v='.$idComercio);
    }

    public function modificarPuntoDeVenta()
    {
        $comercio= new Model_comercio();
        $idPuntoDeVenta = $_GET['c'];
        $idComercio = $_GET['v'];
        $listaLocalidades=$comercio->listarLocalidades();
        $this->view->generateSt('modificarPuntoDeVenta.php', $idPuntoDeVenta, $idComercio, $listaLocalidades);
    }

    public function updatePuntoDeVenta()
    {
        $comercio = new Model_Comercio();
        $idComercio = $_GET['v'];
        $idPuntoDeVenta=$_POST['idPuntoDeVenta'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $idLocalidad=$_POST['idLocalidad'];
        $comercio->updatePuntoDeVenta($idPuntoDeVenta, $telefono, $direccion, $idLocalidad);
        header('location:/OperadorComercio?v='.$idComercio);
    }

    public function estadisticas()
    {
        $idComercio=$_GET['idComercio'];
        $this->view->generateSt('estadisticasComercio.php', $idComercio, $_SESSION['idComercio']);
    }

    public function mostrarEstadisticas()
    {
        $idComercio=$_GET['idComercio'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $comercio = new Model_Comercio();
        $ganancias=$comercio->ganancias($idComercio, $desde, $hasta);
        $cobradoPorSistema=$comercio->cobradoPorSistema($idComercio, $desde, $hasta);
        $cobradoADelivery=$comercio->cobradoADelivery($idComercio, $desde, $hasta);
        $this->view->generateSt('mostrarEstadisticasComercio_view.php', $idComercio, $ganancias, $cobradoPorSistema, $cobradoADelivery);
    }

    public function cambiarBanner()
    {
        $comercio = new Model_Comercio();
        $idComercio = $_GET['v'];
        $banner = $comercio->cambiarBanner($_FILES["file"], $idComercio);
        header("location:/operadorComercio/index?v=".$idComercio."&b=".$banner);
    }
    
    public function liquidacionesComercio()
    {
        $idComercio= $_SESSION['idComercio'];
        $comercio = new Model_Comercio();
        $listaLiquidaciones = $comercio->listarLiquidacionesComercio($idComercio);
        $liquidaciones = null;
        $liquidacionSeleccionada=null;
        $banner = $comercio->obtenerBanner($idComercio);
        $this->view->generateSt("liquidacionesComercio_view.php", $liquidaciones, $listaLiquidaciones, $liquidacionSeleccionada, $banner);
    }
     
     
    public function verMovimientosSinLiquidarComercio()
    {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $idComercio= $_SESSION['idComercio'];
        $comercio = new Model_Comercio();
        $listaLiquidaciones = $comercio->listarLiquidacionesComercio($idComercio);
        $liquidaciones = $comercio->verMovimientosSinLiquidarComercio($desde, $hasta, $idComercio);
        $liquidacionSeleccionada=null;
        $banner = $comercio->obtenerBanner($idComercio);
        $this->view->generateSt('liquidacionesComercio_view.php', $liquidaciones, $listaLiquidaciones, $liquidacionSeleccionada, $banner);
    }
     
    public function verLiquidacionSelecionadaComercio()
    {
        $idComercio= $_SESSION['idComercio'];
        $fechaLiquidado = $_POST['fechaLiquidado'];
        $comercio = new Model_Comercio();
        $liquidacionSeleccionada = $comercio->verLiquidacionSelecionadaComercio($idComercio, $fechaLiquidado);
        $listaLiquidaciones = $comercio->listarLiquidacionesComercio($idComercio);
        $liquidaciones = null;
        $banner = $comercio->obtenerBanner($idComercio);
        $this->view->generateSt("liquidacionesComercio_view.php", $liquidaciones, $listaLiquidaciones, $liquidacionSeleccionada, $banner);
    }
}
