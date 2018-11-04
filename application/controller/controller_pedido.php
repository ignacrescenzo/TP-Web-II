<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';


class Controller_Pedido extends Controller{

	public function nuevoPedido(){
		$id = $this->model->cargarPedidoABd($_GET['c'],$_SESSION['id']);

		$this->mostrarDatos($id);
	 }
	 
	 public function mostrarDatos($id){
		 $pedido = $this->model->traerDatosParaDelivery($id);
		 //EN $pedido tengo el inner join con comercio y cliente asi tengo las dos direcciones. domicilio es la del cliente, direccion es la del comercio
		echo $pedido['domicilio']." - ".$pedido['direccion'];

	 }
	 public function pedidoRetirado(){
		$retiro = $this->model->retirarPedido($_GET['id']);
		header("location:/delivaryHome.php");
	 }
}