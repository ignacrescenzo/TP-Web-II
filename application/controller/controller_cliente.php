<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
class Controller_Cliente extends Controller{
    public function agregarAlCarrito(){
        $menu = new Model_Menu();
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto($descripcion);      	
        $carrito = new Model_Carrito();
        $carrito->add($array);
        $this->view->generateSt('menu_view.php');
    }

    public function verCarrito(){
        $carrito = new Model_Carrito();
        $carro = $carrito->get_content();
        $this->view->generateSt('ver-carrito_view.php',$carro);
    }

    public function eliminarCarrito(){
        $carrito = new Model_Carrito();
        $carrito->destroy();
        $this->view->generateSt('menu_view.php');
    }
	public function eliminarProducto(){
        $carrito = new Model_Carrito();
		$id = md5($_GET["id"]);
		$carrito->remove_producto($id);
		$this->view->generateSt('ver-carrito_view.php',$carrito->get_content());
    }
	public function sumarProducto(){
        $carrito = new Model_Carrito();
		$id = md5($_GET["id"]);
		$carrito->aumentarCantidad($id);
		$this->view->generateSt('ver-carrito_view.php',$carrito->get_content());
	}
	public function restarProducto(){
        $carrito = new Model_Carrito();
		$id = md5($_GET["id"]);
		$this->view->generateSt('ver-carrito_view.php',$carrito->get_content());
	}
}