<?php

include 'application/model/model_usuario.php';
include 'application/model/model_pedido.php';
include 'application/model/model_comercio.php';
include 'application/model/model_estadisticas.php';

class Controller_AdministradorDeSistema extends Controller
{
    public function index()
    {
        $admin = new Model_Usuario();
        $delivery = new Model_Usuario();
        $pedido = new Model_Pedido();
        $result = null;
        if (mysqli_num_rows($pedido->buscarPedidosDemorados()) >= 1) {
            if (mysqli_num_rows($admin->verificarPenalizaciones()) >= 1) {
                $result = $admin->verificarPenalizaciones();
                $admin->penalizarDeliverys($result);
                $result = $admin->verificarPenalizaciones();
            }
        }
        $this->view->generateSt('adminHome.php', $result);
    }

    public function peticionDeDeliverys()
    {
        $this->view->generateSt('adminHomeDeliverys.php');
    }


    public function peticionDeComercios()
    {
        $comercio = new Model_Comercio();
        $listaComerciosEnEspera = $comercio->listarComerciosEnEspera();
        $this->view->generateSt('adminHomeComercios.php', $listaComerciosEnEspera);
    }

    

    public function listarDeliverys()
    {
        $delivery = new Model_Usuario();
        $estado=$_POST['estado'];
        if ($estado==2) {
            $listar=$delivery->listarDeliverys($estado);
            $this->view->generateSt('listarDeliverysNoHabilitados.php', $listar);
        } elseif ($estado==1) {
            $listar=$delivery->listarDeliverys($estado);
            $this->view->generateSt('listarDeliverysHabilitados.php', $listar);
        } elseif ($estado==0) {
            $listar=$delivery->listarDeliverysEnEsperaDeAprobacion();
            $this->view->generateSt('listarDeliverysEnEsperaDeAprobacion.php', $listar);
        }
    }

    public function habilitarDelivery()
    {
        $delivery = new Model_Usuario();
        if (isset($_GET['idUsuario'])) {
            $idUsuario=$_GET['idUsuario'];
            $habilitar=$delivery->habilitarDelivery($idUsuario);
            header("location: /administradorDeSistema/index");  
        }
    }

    public function deshabilitarDelivery()
    {
        $delivery = new Model_Usuario();
        if (isset($_GET['idUsuario'])) {
            $idUsuario=$_GET['idUsuario'];
            $habilitar=$delivery->deshabilitarDelivery($idUsuario);
            header("location: /administradorDeSistema/index");
        }
   }  

    public function eliminarDelivery()
    {
        $delivery = new Model_Usuario();
        if (isset($_GET['idUsuario'])) {
            $idUsuario=$_GET['idUsuario'];
            $habilitar=$delivery->eliminarDelivery($idUsuario);
            header("location: /administradorDeSistema/index");
        }
    }

    public function habilitarComercio()
    {
        $usuario = new Model_Usuario();
        $comercio = new Model_Comercio();
        $idUsuario =  $_GET['idUsuario'];
        $usuarioParaEmail =  $usuario->obtenerUsuario($idUsuario);
      
        $comercio->enviarEmailDeConfirmacion($usuarioParaEmail);
        $comercio->activarComercio($usuarioParaEmail);

        $listaComerciosEnEspera = $comercio->listarComerciosEnEspera();
        $this->view->generateSt('adminHomeComercios.php', $listaComerciosEnEspera);
    }

    public function eliminarComercio()
    {
        $comercio = new Model_Comercio();
        $idComercio = $_GET['idComercio'];

        $comercio->eliminarUsuarioDeComercio($idComercio);
        $comercio->eliminarComercioPorId($idComercio);
        
        $listaComerciosEnEspera = $comercio->listarComerciosEnEspera();
        $this->view->generateSt('adminHomeComercios.php', $listaComerciosEnEspera);
    }

    public function estadisticas()
    {
        $this->view->generateSt('adminEstadisticasHome_view.php');
    }

    public function estadisticasDatos()
    {
        $estadisticas = new Model_Estadisticas();
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];

        $totalGanancias = $estadisticas->totalGanancias($desde, $hasta);
        $entregasMensuales = $estadisticas->entregasMensuales($desde, $hasta);
        $topRankingComercios = $estadisticas->topRankingComercios($desde, $hasta);
        $topRankingDeliverys = $estadisticas->topRankingDeliverys($desde, $hasta);

        $this->view->generateSt('adminEstadisticas_view.php', $totalGanancias, $entregasMensuales, $topRankingComercios, $topRankingDeliverys);
    }

    public function liquidar()
    {
        $administrador = new Model_Usuario();
        $listaLiquidaciones = $administrador->listarLiquidacionesAdministrador();
        $liquidaciones = null;
        $desde = null;
        $hasta = null;
        $this->view->generateSt('adminLiquidacionHome_view.php', $liquidaciones, $desde, $hasta, $listaLiquidaciones);
    }
    public function liquidarPeriodo()
    {
        $desde = $_GET['d'];
        $hasta = $_GET['h'];
        $administrador = new Model_Usuario();
        $administrador->liquidarDatos($desde, $hasta);
        header("location: /administradorDeSistema/index");
    }

    public function verMovimientos()
    {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $administrador = new Model_Usuario();
        $liquidaciones = $administrador->mostrarDatosDeLiquidacion($desde, $hasta);
        $listaLiquidaciones = $administrador->listarLiquidacionesAdministrador();
        $this->view->generateSt('adminLiquidacionHome_view.php', $liquidaciones, $desde, $hasta, $listaLiquidaciones);
    }
    
    public function liquidacionesAdministrador()
    {
        $administrador = new Model_Usuario();
        $listaLiquidaciones = $administrador->listarLiquidacionesAdministrador();
        $this->view->generateSt("adminLiquidacionHome_view.php", $listaLiquidaciones);
    }
      
    public function verLiquidacionSelecionadaAdministrador()
    {
        $administrador = new Model_Usuario();
        $fechaLiquidado = $_POST['fechaLiquidado'];
        $liquidacionSeleccionada = $administrador->verLiquidacionSelecionadaAdministrador($fechaLiquidado);
        $listaLiquidaciones = $administrador->listarLiquidacionesAdministrador();
        $liquidaciones = null;
        $desde = null;
        $hasta = null;
        $this->view->generateSt("adminLiquidacionHome_view.php", $liquidaciones, $desde, $hasta, $listaLiquidaciones, $liquidacionSeleccionada);
    }
}
