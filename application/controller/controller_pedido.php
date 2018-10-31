<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';
include 'application/model/model_pedido.php';


class Controller_Pedido extends Controller{

	public function nuevoPedido(){
	
	$pedido = new Model_Pedido();


	$carrito = new Model_Carrito();
    $carrito->destroy();
	header("location:/puntoDeVenta/mostrarMenu");    

 }

}
