<?php
include 'application/model/model_menu.php';
class Controller_PuntoDeVenta extends Controller
{

    function index(){
        ///LOGICA PARA CARGAR LOS MENUES EN LA VISTA. DESPUES, DEVOLVER LA VISTA CON LOS DATOS
        $this->view->generateSt('comercioHome.php');
    }
    function mostrarformulariomenu(){
        $idComercio = $_GET['c'];
        $this->view->generateSt('cargarMenuComercios.php',$idComercio);
    }

    function eliminarmenu(){
        $this->view->generateSt('cargarMenuComercios.php');
    }

    function mostrarformulariomodificarmenu(){
          $menu = new Model_Menu();
          $rows = $menu->traerParaFormulario(urldecode($_GET["d"]));
          $this->view->generateSt('modificarMenuComercios.php', $rows);
    }

    function mostrarMenu(){
        $idComercio = $_GET['c'];
        $menu = new Model_Menu();
        $menus = $menu->listarMenus($idComercio);
        $this->view->generateSt('menu_view.php',$menus,$idComercio);
    }
}