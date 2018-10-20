<?php
session_start();

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/router.php';
require_once 'core/helpers/Path.php';

$path = Path::getInstance("application/config/path.ini");

$router = new Router($_SERVER['REQUEST_URI']);
$router->start();


/*CONEXION A LA BASE DATOS*/
require_once 'application/model/modelo_conexion_base_de_datos.php';
$revisarConexion= new BaseDeDatos;
$revisarConexion->conectarBD();


?>
