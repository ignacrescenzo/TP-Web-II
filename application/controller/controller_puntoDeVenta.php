<?php
include 'application/model/model_menu.php';
include 'application/model/model_comercio.php';
class Controller_PuntoDeVenta extends Controller
{
    public function index()
    {
        $idPuntoDeVenta = $_GET['c'];
        $idComercio = $_GET['v'];
        $menu = new Model_Menu();
        $comercio = new Model_Comercio();
        $banner = $comercio->obtenerBanner($idComercio);
        $ofertas = $menu->listarOfertas($idPuntoDeVenta, $idComercio);
        $menus = $menu->listarMenus($idPuntoDeVenta, $idComercio);///LOGICA PARA CARGAR LOS MENUES EN LA VISTA. DESPUES, DEVOLVER LA VISTA CON LOS DATOS
        $this->view->generateSt('comercioHome.php', $menus, $idPuntoDeVenta, $ofertas, $banner);
    }

    public function mostrarformulariomenu()
    {
        $idPuntoDeVenta = $_GET['c'];
        $this->view->generateSt('cargarMenuComercios.php', $idPuntoDeVenta);
    }

    public function eliminarmenu()
    {
        $this->view->generateSt('cargarMenuComercios.php');
    }

    public function mostrarformulariomodificarmenu()
    {
        $menu = new Model_Menu();
        $idPuntoDeVenta = $_GET['c'];
        $rows = $menu->traerParaFormulario(urldecode($_GET["d"]), $idPuntoDeVenta);
        $this->view->generateSt('modificarMenuComercios.php', $rows, $idPuntoDeVenta);
    }

    public function mostrarMenu()
    {
        $idComercio = $_GET['c'];
        $menu = new Model_Menu();
        $comercio = new Model_Comercio();
        $menus = $menu->listarMenusCliente($idComercio);
        $banner = $comercio->obtenerBanner($idComercio);
        $ofertas = $menu->listarOfertasCliente($idComercio);
        $this->view->generateSt('menu_view.php', $menus, $idComercio, $ofertas, $banner);
    }

    public function mostrarMenuPdv()
    {
        $idComercio = $_GET['c'];
        $idPuntoDeVenta = $_GET['v'];
        $menu = new Model_Menu();
        $comercio = new Model_Comercio();
        $menus = $menu->listarMenusPdvCliente($idComercio, $idPuntoDeVenta);
        $banner = $comercio->obtenerBanner($idComercio);
        $ofertas = $menu->listarOfertasCliente($idComercio);
        $this->view->generateSt('menu_view.php', $menus, $idComercio, $ofertas, $banner);
    }
}
