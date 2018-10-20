<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
include 'application/model/model_precio.php';
class Controller_Menu extends Controller
{
    function nuevo(){
        $precio = new Model_Precio();
        $precio->crearPrecio($_POST['precio']);
        $precio->cargarABd();
        //$precio->cargarId();
        if(isset($_POST['descripcion'])&&isset($_POST['foto'])&&isset($_POST['precio'])) {
            $this->model->crearMenu($_POST['descripcion'], $_POST['foto'], $_POST['precio']);
        }
        $this->model->cargarABd();
    }

    function modificar()
    {   
  
    $this->model->grabarModificacionMenu();
    
    }

    function eliminar()
    {
        $_POST['id'];
        //$this->model->eliminar();
    }
}