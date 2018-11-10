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
		switch ($rol){
			case "Administrador":
				$_SESSION["login"]="sessionAdmin";
    			$this->view->generateSt('adminHome.php');
				break;
			case "Cliente":
				$_SESSION["login"]="sessionCliente";
				$_SESSION['id'] = $usuario->obtenerIdCliente($nombreUsuario);
				$this->iracomercios();
				break;
			case "Delivery":
				$_SESSION["login"]="sessionDelivery";
				$_SESSION['id'] = $usuario->obtenerIdCliente($nombreUsuario);
				$this->view->generateSt('deliveryHome.php');
				break;
			case "OperadorComercio":
				$_SESSION["login"]="sessionOpComercio";
				$comercio = new Model_Comercio();
				$idComercio = $usuario->obtenerIdComercio($nombreUsuario);
				$puntosDeVenta = $comercio->listarPuntosDeVenta($idComercio);
				$_SESSION['idComercio'] = $idComercio;
				$this->view->generateSt('puntosDeVenta.php',$puntosDeVenta);
				//$this->view->generateSt('comercioHome.php',$idComercio);
				break;
		}
    }

    function cerrarsesion(){
		//$this->model->cerrarsesion();
		include 'core/helpers/cerrarSesion.php';
    	$this->view->generateSt('home_view.php');
    }
   
   function iracomercios(){
	$comercio = new Model_Comercio();
	$comercios = $comercio->listarComercios();
	$this->view->generateSt('comercios.php',$comercios);
   }

}
?>