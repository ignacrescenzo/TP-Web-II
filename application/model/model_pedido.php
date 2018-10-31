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

	function obtenerIdPedido($pedido){
        $conn =BaseDeDatos::conectarBD();
        $sql="select * from pedido where idPedido='$idPedido';";
        $result = mysqli_query($conn,$sql);
        $pedido = mysqli_fetch_assoc($result);
        $idPedido = $pedido['idPedido'];
        return $idPedido;
    }
        
    function cargarPedidoABd(){
    	
    }    

 }