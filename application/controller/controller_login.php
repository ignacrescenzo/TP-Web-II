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
        $res =  $usuario->validarlogin($nombreUsuario,$clave);


        if($res==true)
            $this->view->generateSt('home_view.php');
    }
}