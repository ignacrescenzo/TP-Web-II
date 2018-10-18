<?php
include 'application/model/model_precio.php';
class Controller_Menu extends Controller
{
    function nuevo(){
        $precio = new Model_Precio();
        $precio->crearPrecio($_POST['precio']);
        $precio->cargarABd();
        if(isset($_POST['descripcion'])&&isset($_POST['foto'])&&isset($_POST['precio'])) {
            $this->model->crearMenu($_POST['descripcion'], $_POST['foto'], $_POST['precio']);
        }
        $this->model->cargarABd();
        $this->view->generateSt("main_view.php");
    }
    function modificarmenu()
    {
        $this->model->modificarMenu();
        $this->model->cargarABd();
    }
    function eliminarmenu()
    {
        $this->model->eliminar();
    }
}