<?php
include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';
include 'application/model/model_comercio.php';

class Controller_Delivery extends Controller{
	public function index(){
		$this->view->generateSt('deliveryHome.php');
	}
	public function pedidoRetirado(){
		$delivery = new Model_usuario();
		$retira = $delivery->retirarPedidoDelivery($_GET['id']);
		$this->pedidosEnCurso();
	 }
	 
	 public function pedidoCancelado(){
		$delivery = new Model_usuario();
		$cancela = $delivery->cancelarPedidoDelivery($_GET['id'],$_SESSION['id']);
		$this->pedidosEnCurso();
	 }
	 public function pedidoEntregado(){
		$delivery = new Model_usuario();
		$admin = new Model_usuario();
		$pdv = new Model_comercio();
		$total = $_GET['t'];
		$entrega = $delivery->entregarPedidoDelivery($_GET['id'],$_SESSION['id']);
		$idComercio = $pdv -> obtenerIdComercio($_GET['p']);
		$admin->cobrarAlCliente($_GET['id'],$total);
		$admin->pagarAlComercio($idComercio,$total);
		$admin->cobrarComisiones($idComercio,$_SESSION['id'],$total);
		$tardoMucho = $admin->verificarTardanza($_GET['id']);
		if($tardoMucho){
			$admin->bonificarAlCliente($_GET['id'],$total);
			$admin->cobrarAlDelivery($_SESSION['id'],$_GET['id'],$total);
		}
		$this->pedidosEnCurso();
	}
	 public function pedidosEnCurso(){
		$id = $_SESSION['id'];
		$delivery = new Model_Usuario();
        $pedidos = $delivery->listarPedidosEnCursoDelivery($id);
        $this->view->generateSt('deliveryEstadoPedidos.php',$pedidos);
	 }
	 public function pedidosDisponibles(){
		$id = $_SESSION['id'];
		$delivery = new Model_Usuario();
        $pedidos = $delivery->listarPedidosDisponibles();
        $delivery->deliveryActivo($id);
        $delivery->deliveryHoraActivo($id);
        $this->view->generateSt('pedidosDisponibles.php',$pedidos);	
	 }
	  public function pedidosRealizados(){
		$id = $_SESSION['id'];
		$delivery = new Model_usuario();
        $pedidos = $delivery->listarPedidosRealizadosDelivery($id);
        $this->view->generateSt('deliveryEstadoPedidos.php',$pedidos);
	 }
	 
	 public function pedidoAceptado(){
		$delivery = new Model_usuario();
		$habilitado = $delivery->getHabilitado($_SESSION['id']);
		if($habilitado == 2){
			$verificar = $delivery->chequearTiempoPenalizacion($_SESSION['id']);
			if($verificar == $_SESSION['id']){
				$delivery->despenalizar($_SESSION['id']);
				$delivery->aceptarPedidoDelivery($_GET['id'],$_SESSION['id']);
				header("location:/delivery/pedidosEnCurso"); 
			}else{
				echo "SE ENCUENTRA DESHABILITADO";
			}
			

		}
		if($habilitado == 1){
			$delivery->aceptarPedidoDelivery($_GET['id'],$_SESSION['id']);
			header("location:/delivery/pedidosEnCurso"); 
		}
		
	 }
	 
	 public function registrar(){
        $this->view->generateSt("registrar-delivery_view.php");
    }
    
    
    public function validarDelivery(){
        $usuario = new Model_Usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $email = $_POST['email'];
        $name = $_POST['nombre'];
        $surname = $_POST['apellido'];
        $tel = $_POST['telefono'];
        $usuario->insertarDelivery($username,$password,$email,$name,$surname,$tel);
        header("location:/login");
    }
    
    public function peticionNewDelivery(){
    	$delivery = new Model_usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $email = $_POST['email'];
        $name = $_POST['nombre'];
        $surname = $_POST['apellido'];
        $tel = $_POST['telefono'];
        $delivery->insertarDelivery($username,$password,$email,$name,$surname,$tel);
        header("location:/login");	
    }

	 public function deliveryInactivo(){
	 	$id = $_SESSION['id'];
		$delivery = new Model_Usuario();
		$delivery->deliverySePoneInactivo($id);
		header("location: /delivery/index");
	 }
	 
	 public function liquidaciones(){
		$idDelivery = $_SESSION['id'];
		$delivery = new Model_Usuario();
		$listaLiquidaciones = $delivery->listarLiquidaciones($idDelivery);
		$liquidaciones = null;
		$this->view->generateSt("liquidacionesDelivery_view.php",$liquidaciones,$listaLiquidaciones);
	 }
	 
	 
	 public function verMovimientosSinLiquidar(){
		$desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
		$idDelivery= $_SESSION['id'];
        $delivery = new Model_Usuario();
		$listaLiquidaciones = $delivery->listarLiquidaciones($idDelivery);
        $liquidaciones = $delivery->verMovimientosSinLiquidar($desde,$hasta,$idDelivery);
		$this->view->generateSt('liquidacionesDelivery_view.php',$liquidaciones,$listaLiquidaciones); 
	 }
	 
	 public function verLiquidacionSelecionada(){
		$idDelivery= $_SESSION['id'];
		$fechaLiquidado = $_POST['fechaLiquidado'];
		$delivery = new Model_Usuario();
		$liquidacionSeleccionada = $delivery->verLiquidacionSelecionada($idDelivery,$fechaLiquidado);
		$listaLiquidaciones = $delivery->listarLiquidaciones($idDelivery);
		$liquidaciones = null;
		$this->view->generateSt("liquidacionesDelivery_view.php",$liquidaciones,$listaLiquidaciones,$liquidacionSeleccionada);
	 }
	 
}