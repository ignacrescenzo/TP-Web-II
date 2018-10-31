<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';
class Controller_Cliente extends Controller{
    public function agregarAlCarrito(){
        $menu = new Model_Menu();
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto($descripcion);      	
        $carrito = new Model_Carrito();
        $carrito->add($array);
        header("location:/puntoDeVenta/mostrarMenu");
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
        header("location:/cliente/verCarrito");
    }
	public function sumarProducto(){
        $menu = new Model_Menu();
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto($descripcion);      	
        $carrito = new Model_Carrito();
        $carrito->add($array);
        header("location:/cliente/verCarrito");
	}
	public function restarProducto(){
        $menu = new Model_Menu();
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto($descripcion);      	
        $carrito = new Model_Carrito();
        $carrito->restar($array);
        header("location:/cliente/verCarrito");
    }
    public function registrar(){
        $this->view->generateSt("registrar-cliente_view.php");
    }
    public function validarCliente(){
        $usuario = new Model_Usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $email = $_POST['email'];
        $name = $_POST['nombre'];
        $surname = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $tel = $_POST['telefono'];
        $usuario->insertarCliente($username,$password,$email,$name,$surname,$direccion,$tel);
        header("location:/login");
    }
}