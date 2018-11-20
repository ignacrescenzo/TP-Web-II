<?php
if (!isset($_SESSION)) { session_start(); }
?>
<?php
require_once 'modelo_conexion_base_de_datos.php';


class Model_Estadisticas extends Model{

	public function totalGanancias($desde, $hasta){
		$conn = BaseDeDatos::conectarBD();
		$sql = "select sum(monto) as total from movimiento where fecha between '".$desde."' and '".$hasta."' and tipo = 'Pago a Administrador';";
//	echo $sql;
		$result = mysqli_query($conn,$sql);
        return $result;

	}

	public function entregasMensuales($desde, $hasta){

	$conn = BaseDeDatos::conectarBD();
	$sql = "select max(idPedido) as entregas from pedido where fechaHoraEntrega is not null and fechaHoraGenerado between '".$desde."' and '".$hasta."';";
	$result = mysqli_query($conn,$sql);
    return $result;

		
	}

	public function topRankingComercios($desde, $hasta){

		$conn = BaseDeDatos::conectarBD();
		$sql="select c.nombre as nombre, max(m.monto) from movimiento as m 
inner join comercio as c on c.idComercio = m.comercio_idComercio where tipo = 'venta' and fecha between '".$desde."' and '".$hasta."' 
group by c.idComercio 
order by m.monto desc limit 5;";
	$result = mysqli_query($conn,$sql);
    return $result;

	}

	public function topRankingDeliverys($desde, $hasta){

		$conn = BaseDeDatos::conectarBD();
		$sql="select count(Usuario_idDelivery) as delivery, Usuario_idDelivery,u.nombreUsuario from pedido inner join usuario u on u.idUsuario = pedido.Usuario_idDelivery
where  fechaHoraGenerado between '".$desde."' and '".$hasta."' and fechaHoraEntrega is not null 
group by Usuario_idDelivery;";

	$result = mysqli_query($conn,$sql);
    return $result;
		
	}
}