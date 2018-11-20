<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';
require_once ('sdk-php-master\lib\mercadopago.php');

class Controller_Pedido extends Controller{

	public function nuevoPedido(){
		$carrito = new Model_Carrito();
		$carrito->destroy();
		$id = $this->model->cargarPedidoABd($_GET['c'],$_SESSION['id'],$_GET['t']);
		$horaPedido = $this->model->cargarHoraDeGenerado($_GET['c'],$_SESSION['id']);
		header("location:/cliente/mostrarPedidos");
	 }
	 public function pagar(){
		$carrito = new Model_Carrito();
		$this->mercadoPago($carrito,$_GET['d']);
	 }
	 public function mostrarDatos($id){
		 $pedido = $this->model->traerDatosParaDelivery($id);
		 //EN $pedido tengo el inner join con comercio y cliente asi tengo las dos direcciones. domicilio es la del cliente, direccion es la del comercio
		echo $pedido['domicilio']." - ".$pedido['direccion'];

	 }

	 public function mercadoPago($carrito,$descripcion){
		$mp = new MP('1315814148248831', 'ahYkijG3yTLHeVf1HEbqAPtNe6cdMgYj');
		$preference_data = array(
			"items" => array(
				array(
					"title" => urldecode($descripcion),
					"quantity" => $carrito->articulos_total(),
					"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
					"unit_price" => $carrito->precio_total()
				)
			)
			
		);
		$preference = $mp->create_preference($preference_data);
		 echo "<script> window.location.href = '".$preference['response']['init_point']."'; </script>";
	 }
}