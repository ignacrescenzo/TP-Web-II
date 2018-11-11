<?php

include 'application/model/model_usuario.php';

class Controller_AdministradorDeSistema extends Controller{

    function peticionDeDeliverys(){
        $this->view->generateSt('adminHomeDeliverys.php');
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

}

?>