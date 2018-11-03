<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
include 'application/model/model_comercio.php';
include 'application/model/model_usuario.php';
class Controller_OperadorComercio extends Controller
{
    public function mostrarformularioregistro(){
        $comercio = new Model_Comercio();
        $comercios = $comercio->listarComercios();
        $this->view->generateSt('registrar-operador_view.php',$comercios);
    }

    public function validarOperadorComercio(){
        $usuario = new Model_Usuario();
        $username = $_POST['nombreUsuario'];
        $password = md5($_POST['clave']);
        $comercioId = $_POST['comercio'];
        $usuario->insertarOperadorComercio($username,$password,$comercioId);
        header("location:/login");
    }

}