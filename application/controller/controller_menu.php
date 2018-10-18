<?php
class Controller_Menu extends Controller
{
    function index(){

    }

    function nuevomenu(){
        if(isset($_POST['descripcion'])&&isset($_POST['foto'])&&isset($_POST['precio'])) {
            $this->model->crearMenu($_POST['descripcion'], $_POST['foto'], $_POST['precio']);
        }
        $this->model->precio->cargarABd();///CARGAR PRECIO ANTES A LA BASE DE DATOS
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