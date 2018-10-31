<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';

class Controller_Pedido extends Controller{

	public function nuevoPedido(){
	
	$pedido = new Model_Pedido();

	header("location:/puntoDeVenta/mostrarMenu");    

 }

}
