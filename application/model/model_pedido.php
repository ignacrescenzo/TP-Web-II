<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
require_once 'modelo_conexion_base_de_datos.php';

class Model_Pedido extends Model
{

	private $idPedido;
	private $fechaHoraEntrega;
	private $fechaHoraRetiro;
	private $Usuario_idCliente;
	private $Usuario_idDelivery;
	private $idComercio; //EN Realidad tendria que ser usuario punto de venta pero buen
        
    public function cargarPedidoABd($idComercio,$idCliente){ ///RETORNA ID DEL PEDIDO QUE INGRESASTE
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into pedido (Usuario_idCliente,Comercio_idComercio) values (".$idCliente.",".$idComercio.")";
        $result = mysqli_query($conn,$sql);
        $sql2 = "select max(idPedido) from pedido";
        $result2 = mysqli_query($conn,$sql2);
        $pedido = mysqli_fetch_assoc($result2);
        $idPedido = $pedido['max(idPedido)'];
        $this->idPedido = $idPedido;
        return $idPedido;
    } 
    
    function crearPedido(){

    }

    public function traerDatosParaDelivery($id){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select * from pedido p inner join usuario c on p.Usuario_idCliente = c.idUsuario
        inner join comercio com on com.idComercio = p.Comercio_idComercio";
        $result = mysqli_query($conn,$sql);
        $pedido = mysqli_fetch_assoc($result);
        return $pedido;
    }

 }