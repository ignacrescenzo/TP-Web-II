<?php
include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';

class Controller_Delivery extends Controller{
	
	public function pedidoRetirado(){
		$delivery = new Model_usuario();
		$retira = $delivery->retirarPedidoDelivery($_GET['id']);
		$this->view->generateSt('deliveryEstadoPedidos.php');
		
	 }
	 public function pedidoEntregado(){
		$delivery = new Model_usuario();
		$entrega = $delivery->entregarPedidoDelivery($_GET['id']);
		$this->pedidosEnCurso();
	}
	 public function pedidosEnCurso(){
		$id = $_SESSION['id'];
		$delivery = new Model_Usuario();
        $pedidos = $delivery->listarPedidosEnCursoDelivery($id);
        $this->view->generateSt('deliveryEstadoPedidos.php',$pedidos);
	 }
	 public function pedidosDisponibles(){
		//$id = $_SESSION['id'];
		$delivery = new Model_Usuario();
        $pedidos = $delivery->listarPedidosDisponibles();
        $this->view->generateSt('deliveryHome.php',$pedidos);
	 }
	  public function pedidosRealizados(){
		$id = $_SESSION['id'];
		$delivery = new Model_usuario();
        $pedidos = $delivery->listarPedidosRealizadosDelivery($id);
        $this->view->generateSt('deliveryEstadoPedidos.php',$pedidos);
	 }
	 
	 public function pedidoAceptado(){
		$delivery = new Model_usuario();
		$delivery->aceptarPedidoDelivery($_GET['id'],$_SESSION['id']);
		$this->view->generateSt('deliveryEstadoPedidos.php');
		//header("location:/deliveryEstadoPedidos.php"); 
	 }
	 
}