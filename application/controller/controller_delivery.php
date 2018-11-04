<?php
include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';

class Controller_Delivery extends Controller{
	
	public function pedidoRetirado(){
		$delivery = new Model_usuario();
		$retira = $delivery->retirarPedidoDelivery($_GET['id']);
		header("location:/deliveryEstadoPedidos.php");
	 }
	 public function pedidoEntregado(){
		$delivery = new Model_usuario();
		$entrega = $delivery->entregarPedidDeliveryo($_GET['id']);
		header("location:/deliveryEstadoPedidos.php");
	 }
	 public function pedidosEnCurso(){
		$id = $_SESSION['id'];
		$delivery = new Model_usuario();
        $pedidos = $delivery->listarPedidosEnCursoDelivery($id);
        $this->view->generateSt('deliveryEstadoPedidos.php',$pedidos);
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
		//header("location:/deliveryEstadoPedidos.php"); falta recargar la pagina
	 }
	 
}