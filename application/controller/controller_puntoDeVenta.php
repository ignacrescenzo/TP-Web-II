<?php
include 'application/model/model_menu.php';
class Controller_PuntoDeVenta extends Controller
{

    function index(){
        ///LOGICA PARA CARGAR LOS MENUES EN LA VISTA. DESPUES, DEVOLVER LA VISTA CON LOS DATOS
        $this->view->generateSt('comercioHome.php');
    }
    function mostrarformulariomenu(){
        $this->view->generateSt('cargarMenuComercios.php');
    }

    function eliminarmenu(){
        $this->view->generateSt('cargarMenuComercios.php');
    }

      function mostrarformulariomodificarmenu(){
          $menu = new Model_Menu();
          $rows = $menu->traerParaFormulario(urldecode($_GET["d"]));
          $this->view->generateSt('modificarMenuComercios.php', $rows);
    }
}