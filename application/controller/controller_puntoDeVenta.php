<?php
include 'application/model/model_menu.php';
class Controller_PuntoDeVenta extends Controller
{

    public function index(){
        $idPuntoDeVenta = $_GET['c'];
        $menu = new Model_Menu();
        $ofertas = $menu->listarOfertas($idPuntoDeVenta);
        $menus = $menu->listarMenus($idPuntoDeVenta);///LOGICA PARA CARGAR LOS MENUES EN LA VISTA. DESPUES, DEVOLVER LA VISTA CON LOS DATOS
        $this->view->generateSt('comercioHome.php',$menus,$idPuntoDeVenta,$ofertas);
    }

    public function mostrarformulariomenu(){
        $idPuntoDeVenta = $_GET['c'];
        $this->view->generateSt('cargarMenuComercios.php',$idPuntoDeVenta);
    }

    public  function eliminarmenu(){
        $this->view->generateSt('cargarMenuComercios.php');
    }

    public function mostrarformulariomodificarmenu(){
          $menu = new Model_Menu();
          $idPuntoDeVenta = $_GET['c'];
          $rows = $menu->traerParaFormulario(urldecode($_GET["d"]));
          $this->view->generateSt('modificarMenuComercios.php', $rows,$idPuntoDeVenta);
    }

    public function mostrarMenu(){
        $idComercio = $_GET['c'];
        $menu = new Model_Menu();
        $menus = $menu->listarMenus($idComercio);
        $this->view->generateSt('menu_view.php',$menus,$idComercio);
    }

}