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
						<div class="sesion"><a href="deliveryHome.php">Pedidos Disponibles</a></div>
						<div class="sesion"><a href="/pedido/pedidosRealizados">Pedidos Realizados</a></div>
						<div class="sesion"><a href="">Estadisticas</a></div>
						<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
					</div>
			</div>
			<div class="banner d-flex flex-column align-items-center">
				<div><h3>Banner</h3></div>
			</div>
            <div class="text-center">
				<h1>Pedidos En curso</h1>
            </div>
				<div class="container">
					<div class="row">
                        <?php
								echo"<div class='col-md-4'>
								<div class='card'>
									<div class='card-body'>
										<h4 class='card-title'>Pedido Nº "."<span id ='menuId'>".$pedido['id']."</span></h4>
										<p class='card-text'>".$pedido['retiro']."</p>
										<p class='card-text'>".$pedido['entrega']."</p>
										<p class='card-text'>".$pedido['dom']."</p>
										<p class='card-text'>".$pedido['dir']."</p>
										<a href='/pedido/pedidoRetirado?id=".$pedido['id']."' class='btn btn-primary'>Retirar</a>
										<a href='/pedido/pedidoEntregado?id=".$pedido['id']."' class='btn btn-danger text-white'>Entregar</a>
									</div>
									</div> 
								</div>";
                            }
						}
                        ?>
					</div>
				</div>
				<!-- <a href="#" class="btn btn-primary mt-3">Ver Todos</a> -->

				<!-- <div class="text-center mb-3">
				<a href="#" class="btn btn-primary mt-3">Ver Todos</a>
				</div> -->
		</div>
	</body>
</html>
