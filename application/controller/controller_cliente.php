<?php

include 'application/model/model_menu.php';
include 'application/model/model_carrito.php';
include 'application/model/model_usuario.php';
include 'application/model/model_pedido.php';
include 'application/model/model_comercio.php';

class Controller_Cliente extends Controller{
	
    public function agregarAlCarrito(){
        
        $menu = new Model_Menu();
        $idComercio = $_GET['c'];
        $menus = $menu->listarMenus($idComercio);
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto(urldecode($descripcion));      	
        $carrito = new Model_Carrito();
        $carrito->add($array);
        $this->view->generateSt('menu_view.php',$menus,$idComercio); 
       }
    public function verComercios(){
        $comercio = new Model_Comercio();
        $comercios = $comercio->listarComercios();
		$filtroZona = $comercio->listarPorZona();
        $this->view->generateSt('comercios.php',$comercios,$filtroZona);
    }
	
	public function listarComerciosPorZona(){
		$idLocalidad = $_GET['idLocalidad'];
		$comercio = new Model_Comercio();
		$comercios =$comercio->listarComerciosfiltrados($idLocalidad);
		$filtroZona = $comercio->listarPorZona();
        $this->view->generateSt('comercios.php',$comercios,$filtroZona);
	}
    public function verCarrito(){
        $carrito = new Model_Carrito();
        $carro = $carrito->get_content();
        $idComercio = $_GET['c'];
        $this->view->generateSt('ver-carrito_view.php',$carro,$idComercio);
    }

    public function eliminarCarrito(){
        $carrito = new Model_Carrito();
        $menu = new Model_Menu();
        $carrito->destroy();
        $idComercio = $_GET['c'];
        // $menus = $menu->listarMenus($idComercio);
        // $this->view->generateSt('menu_view.php',$menus);
        header("location:/puntoDeVenta/mostrarMenu?c=".$idComercio."");
    }
	public function eliminarProducto(){
        $carrito = new Model_Carrito();
		$id = md5($_GET["id"]);
        $carrito->remove_producto($id);
        $this->verCarrito();
    }
	public function sumarProducto(){
        $menu = new Model_Menu();
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto(urldecode($descripcion));      	
        $carrito = new Model_Carrito();
        $carrito->add($array);
        $this->verCarrito();
	}
	public function restarProducto(){
        $menu = new Model_Menu();
        $descripcion = $_GET["d"];
        $array = $menu->obtenerArrayProducto(urldecode($descripcion));      	
        $carrito = new Model_Carrito();
        $carrito->restar($array);
        $this->verCarrito();
    }
    public function registrar(){
		$cliente = new Model_Usuario();
		$listaLocalidades=$cliente->listarLocalidadesCliente();
        $this->view->generateSt("registrar-cliente_view.php",$listaLocalidades);
    }
    public function validarCliente(){
        $usuario = new Model_Usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $email = $_POST['email'];
        $name = $_POST['nombre'];
        $surname = $_POST['apellido'];
        $direccion = $_POST['direccion'];
		$idLocalidad=$_POST['idLocalidad'];
        $tel = $_POST['telefono'];
        $usuario->insertarCliente($username,$password,$email,$name,$surname,$direccion,$tel,$idLocalidad);
        header("location:/login");
    }
	public function mostrarPedidos(){
		$id = $_SESSION['id'];
		$cliente = new Model_usuario();
		$pedidos = $cliente->mostrarPedidosCliente($id);
        $this->view->generateSt('pedidosCliente.php',$pedidos);
	}

    public function pedidoCancelado(){
        $id = $_GET["id"];
        $pedido = new Model_pedido();
        $cancela = $pedido->borrarPedido($id);

        $comercio = new Model_comercio();
        $comercios = $comercio->listarComercios();
        $this->view->generateSt('comercios.php',$comercios);

    }
}