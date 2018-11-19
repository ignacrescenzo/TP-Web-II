<?php
	include 'application/model/model_usuario.php';
	include 'application/model/model_comercio.php';
	
class Controller_Login extends Controller{
  
   //funcion que ejecuta por defecto 
    function index(){
        $this->view->generateSt('login_view.php');
    }

    function validarlogin(){
		
        $usuario = new Model_Usuario();
        $nombreUsuario = $_POST['nombreUsuario'];
        $clave = md5($_POST['clave']);
		$rol =  $usuario->validarlogin($nombreUsuario,$clave);
		$_SESSION['rol'] = $rol;
		switch ($rol){
			case "Administrador":
				$_SESSION["login"]="sessionAdmin";
				header("location: /administradorDeSistema/index");
				break;
			case "Cliente":
				$_SESSION["login"]="sessionCliente";
				$_SESSION['id'] = $usuario->obtenerIdCliente($nombreUsuario);
				header("location: /cliente/verComercios");
				break;
			case "Delivery":
				$_SESSION["login"]="sessionDelivery";
				$_SESSION['id'] = $usuario->obtenerIdDelivery($nombreUsuario);
				header("location: /delivery/index");
				break;
			case "OperadorComercio":
				$_SESSION["login"]="sessionOpComercio";
				$comercio = new Model_Comercio();
				$idComercio = $usuario->obtenerIdComercio($nombreUsuario);
				$puntosDeVenta = $comercio->listarPuntosDeVenta($idComercio);
				$_SESSION['idComercio'] = $idComercio;
				header("location: /operadorComercio/index?v=".$idComercio);
				break;
		}
    }

    function cerrarsesion(){
		//$this->model->cerrarsesion();
		$rol = $_SESSION['rol'];
		if ($rol=='Delivery') {
			$id = $_SESSION['id'];
			$delivery = new Model_Usuario();
			$delivery->deliveryInactivo($id);
			$delivery->deliveryDesconectado($id);			
		}
		session_destroy();
    	header("location:/");
    }

   function cambiarContrasena(){
   	$idUsuario = $_GET['u'];
   	$idComercio = $_GET['c'];
   	$this->view->generateSt('formulario_Cambio_Contraseña_view.php',$idComercio,$idUsuario);
   }

	function validarContrasena(){

 		$claveNueva = md5($_POST['claveNueva']);
 		$idComercio = $_POST['idComercio'];
 		$idUsuario = $_POST['idUsuario'];
 		
 		$usuario = new Model_Usuario();
 		
 		$usuario->cambiarContrasenaUsuarioDeComercio($claveNueva,$idComercio,$idUsuario);

 		$this->view->generateSt('agregarUsuariosDelComercio_view.php',$idComercio,$idUsuario);

 		
	}

	function cargarUsuariosDeComercio(){
		$usuario2 = $_POST['NombreUsuario2'];
		$usuario3 = $_POST['NombreUsuario3'];
		$usuario4 = $_POST['NombreUsuario4'];
		$usuario5 = $_POST['NombreUsuario5'];

		$clave2 = md5($_POST['clave2']);
		$clave3 = md5($_POST['clave3']);
		$clave4 = md5($_POST['clave4']);
		$clave5 = md5($_POST['clave5']);

		$idComercio = $_POST['idComercio'];
 		$idUsuario = $_POST['idUsuario'];

 		$usuario = new Model_Usuario();
 		$usuario->cargarUsuariosDeComercio($usuario2,$usuario3,$usuario4,$usuario5,$clave2,$clave3,$clave4,$clave5,$idComercio,$idUsuario);
 		echo "<script>alert('Usuarios agregados correctamente');</script>";
 		
 		$this->view->generateSt('home_view.php');


	}

}
?>