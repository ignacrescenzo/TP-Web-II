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
	private $idPuntoDeVenta; 
        
    public function cargarPedidoABd($idPuntoDeVenta,$idCliente){ ///RETORNA ID DEL PEDIDO QUE INGRESASTE
        $conn =BaseDeDatos::conectarBD();
        $sql = "insert into pedido (Usuario_idCliente,idPuntoDeVenta) values (".$idCliente.",".$idPuntoDeVenta.")";
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
        inner join puntodeventa pdv on pdv.idPuntoDeVenta = pdv.idPuntoDeVenta";
        $result = mysqli_query($conn,$sql);
        $pedido = mysqli_fetch_assoc($result);
        return $pedido;
    }
	
	public function retirarPedido($id){
		$conn = BaseDeDatos::conectarBD();
		$sql = "update Pedido set fechaHoraRetiro=(select now()) where idPedido=".$id.";";
		$result = mysqli_query($conn,$sql);
	}
	public function entregarPedido($id){
		$conn = BaseDeDatos::conectarBD();
		$sql = "update Pedido set fechaHoraEntrega=(select now()) where idPedido=".$id.";";
		$result = mysqli_query($conn,$sql);
	}
		public function aceptarPedido($id,$idDelivery){
		$conn = BaseDeDatos::conectarBD();
		$sql = "update Pedido set Usuario_idDelivery=(".$idDelivery." where idPedido=".$id.";";
		$result = mysqli_query($conn,$sql);
	}
	
	public function listarPedidosEnCurso($id){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select p.idPedido as id, u.domicilio dom, pdv.direccion as dir,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
		from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
		inner join puntodeventa as pdv on pdv.idPuntoDeVenta = p.idPuntoDeVenta
		where p.Usuario_idDelivery = ".$id." and p.fechaHoraEntrega is null;";
	}
	
	public function listarPedidosRealizados($id){
        $conn =BaseDeDatos::conectarBD();
        $sql = "select p.idPedido as id, u.domicilio dom, pdv.direccion as dir,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
		from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
		inner join puntodeventa as pdv on pdv.idPuntoDeVenta = pdv.idPuntoDeVenta
		where p.Usuario_idDelivery = ".$id." and p.fechaHoraEntrega is not null;";
	}
}