<?php
class Controller_Comercio extends Controller
{

    function index(){
        ///LOGICA PARA CARGAR LOS MENUES EN LA VISTA. DESPUES, DEVOLVER LA VISTA CON LOS DATOS
        $this->view->generateSt('comercioHome.php');
    }
    function mostrarformulariomenu(){
        $this->view->generateSt('comercioHome.php');
    }
}