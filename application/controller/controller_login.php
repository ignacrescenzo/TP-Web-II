<?php
	include 'application/model/model_usuario.php';
class Controller_Login extends Controller{
  
   //funcion que ejecuta por defecto 
    function index(){
        $this->view->generateSt('login_view.php');
    }

    function validarlogin(){
		
        $usuario = new Model_Usuario();
        $nombreUsuario = $_POST['nombreUsuario'];
        $clave = $_POST['clave'];
        $rol =  $usuario->validarlogin($nombreUsuario,$clave);
		
		switch ($rol){
			case "Administrador":
				$_SESSION["login"]="sessionAdmin";
				$this->view->generateSt('adminHome.php');
				break;
			case "Cliente":
				$_SESSION["login"]="sessionCliente";
				$this->view->generateSt('comercios.php');
				break;
			case "Delivery":
				$_SESSION["login"]="sessionDelivery";
				//$this->view->generateSt('.php');
				break;
			case "OperadorComercio":
				$_SESSION["login"]="sessionOpComercio";
				$this->view->generateSt('comercioHome.php');
				break;
		}
    }
}
?>