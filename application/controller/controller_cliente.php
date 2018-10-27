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
        
    }

    public function verCarrito(){
        $carrito = new Model_Carrito();
        $carro = $carrito->get_content();
        $this->view->generateSt('ver-carrito_view.php',$carro);
    }


}