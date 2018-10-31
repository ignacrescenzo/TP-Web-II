<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
require_once 'modelo_conexion_base_de_datos.php';

class Model_Pedido extends Model
{

	private $idPedido;
	private $numero;
	private $fechaHoraEntrega;
	private $fechaHoraRetiro;
	private $Usuario_idCliente;
	private $Usuario_idDelivery;
	private $PuntoDeVenta_idPuntoDeVenta;



 }