<?php
		if(!isset($_SESSION["login"])){
		echo "INICIA SESION WACHO";
        echo "<br>";
        echo "<a href='/login'>Iniciar sesion</a>";
        exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Home Delivery</title>
		<link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
		<link rel="stylesheet" href="../application/resources/css/estilosIndex.css">
		<link rel="stylesheet" href="../application/resources/css/comercioHome.css">
		<script src="../application/resources/js/bootstrap.min.js"></script>
		<script src="../application/resources/js/jquery-3.3.1.min.js"></script>
        <script src="../application/resources/js/comercioHome.js"></script>
	</head>
	<body>
		<div class="container-fluid px-0">
			<div class="header d-flex justify-content-between align-items-center">
				<div class="logo"> ACA VA EL LOGO Y EL NOMBRE</div>
					<div class="bar d-flex">
						<div class="sesion">Bienvenido "Delivey"</div>
						<div class="sesion"><a href="/delivery/pedidosDisponibles">Pedidos Disponibles</a></div>
						<div class="sesion"><a href="/delivery/pedidosEnCurso">Pedidos en curso</a></div>
						<div class="sesion"><a href="/delivery/pedidosRealizados">Pedidos Realizados</a></div>
						<div class="sesion"><a href="">Estadisticas</a></div>
						<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
					</div>
			</div>
			<div class="banner d-flex flex-column align-items-center">
				<div><h3>Banner</h3></div>
			</div>
            <div class="text-center">
				<h1 id="titulo">Pedidos En curso</h1>
            </div>
				<div class="container">
					<div class="row">
                        <?php
							if(mysqli_num_rows($data) >= 1){ 
                        		while($pedido = mysqli_fetch_assoc($data)){
								echo"<div class='col-md-4'>
								<div class='card'>
									<div class='card-body'>
										<h4 class='card-title'>Pedido Nº "."<span id ='menuId'>".$pedido['id']."</span></h4>
										<p class='card-text'>Horario de retiro: ".$pedido['retiro']."</p>
										<p class='card-text'>Horario de entrega: ".$pedido['entrega']."</p>
										<p class='card-text'>Domicilio del cliente: ".$pedido['dom']."</p>
										<p class='card-text'>Direccion del comercio: ".$pedido['dir']."</p>
										<p class='card-text'>Total:".$pedido['total']."</p>";
										
										if($pedido['retiro'] == null){
										echo "<a href='/delivery/pedidoRetirado?id=".$pedido['id']."' class='btn btn-primary'>Retirado</a>";
										echo "<a href='/delivery/pedidoCancelado?id=".$pedido['id']."' class='btn btn-danger'>Cancelar</a>";
										}
										if($pedido['entrega'] == null && $pedido['retiro'] != null){
										echo "<a href='/delivery/pedidoEntregado?id=".$pedido['id']."&p=".$pedido['idPuntoDeVenta']."&t=".$pedido['total']."' class='btn btn-danger text-white'>Entregado</a>";
										} echo"</div>
									</div> 
								</div>";
								}
							}
                        ?>
					</div>
				</div>
		</div>
	</body>
	<script src="/application/resources/js/deliveryEstadoPedidos.js"></script>
</html>
