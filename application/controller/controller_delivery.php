<?php
include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';

class Controller_Delivery extends Controller{
	
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
		$entrega = $delivery->entregarPedidoDelivery($_GET['id'],$_SESSION['id']);
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
}