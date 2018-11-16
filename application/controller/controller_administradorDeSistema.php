<?php

include 'application/model/model_usuario.php';
include 'application/model/model_pedido.php';
include 'application/model/model_comercio.php';

class Controller_AdministradorDeSistema extends Controller{

    public function index(){
        $admin = new Model_Usuario();       
        $delivery = new Model_Usuario();
        $pedido = new Model_Pedido();
        $result = null;
        if(mysqli_num_rows($pedido->buscarPedidosDemorados()) >= 1){
            if(mysqli_num_rows($admin->verificarPenalizaciones()) >= 1){
                $result = $admin->verificarPenalizaciones();
                $admin->penalizarDeliverys($result);
                $result = $admin->verificarPenalizaciones();
            }
        }
        $this->view->generateSt('adminHome.php',$result);


    }

    function peticionDeDeliverys(){
        $this->view->generateSt('adminHomeDeliverys.php');
    }


    function peticionDeComercios(){
        $comercio = new Model_Comercio();
        $listaComerciosEnEspera = $comercio->listarComerciosEnEspera();
        $this->view->generateSt('adminHomeComercios.php',$listaComerciosEnEspera);
    }

    

	public function listarDeliverys(){
        $delivery = new Model_Usuario();       
        $estado=$_POST['estado'];
        if ($estado==0) {
            $listar=$delivery->listarDeliverys($estado);      
            $this->view->generateSt('listarDeliverysNoHabilitados.php',$listar); 
        }else if ($estado==1) {
            $listar=$delivery->listarDeliverys($estado);      
            $this->view->generateSt('listarDeliverysHabilitados.php',$listar); 
        }else if ($estado==2) {
            $listar=$delivery->listarDeliverysEnEsperaDeAprobacion();      
            $this->view->generateSt('listarDeliverysEnEsperaDeAprobacion.php',$listar); 
        }  
    
    } 

    public function habilitarDelivery(){
        $delivery = new Model_Usuario();
        if (isset($_GET['idUsuario'])) {
            $idUsuario=$_GET['idUsuario'];
            $habilitar=$delivery->habilitarDelivery($idUsuario);         
        }
    }

     public function deshabilitarDelivery(){
        $delivery = new Model_Usuario();
        if (isset($_GET['idUsuario'])) {
            $idUsuario=$_GET['idUsuario'];
            $habilitar=$delivery->deshabilitarDelivery($idUsuario);         
        }
    }

    public function eliminarDelivery(){
        $delivery = new Model_Usuario();
         if (isset($_GET['idUsuario'])) {
            $idUsuario=$_GET['idUsuario'];
            $habilitar=$delivery->eliminarDelivery($idUsuario);
        }
    }

    public function habilitarComercio(){
      $usuario = new Model_Usuario();
      $comercio = new Model_Comercio();
      $idUsuario =  $_GET['idUsuario'];
      $usuarioParaEmail =  $usuario->obtenerUsuario($idUsuario);
      
      $comercio->enviarEmailDeConfirmacion($usuarioParaEmail);
      $comercio->activarComercio($usuarioParaEmail);

      $listaComerciosEnEspera = $comercio->listarComerciosEnEspera();
      $this->view->generateSt('adminHomeComercios.php',$listaComerciosEnEspera);
    

    }
}

?>