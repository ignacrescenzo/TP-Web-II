<?php
	session_start();
	if(!isset($_SESSION["login"])){
		include("error/error404_view.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nombre Pagina</title>
    <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../application/resources/css/estilosIndex.css">
    <script src="../application/resources/js/bootstrap.min.js"></script>
    <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
    <script src="../application/resources/js/comercioHome.js"></script>
</head>
<body>
	<div class="container-fluid px-0">
		<div class="header d-flex justify-content-between align-items-center">
			<div class="logo"> ACA VA EL LOGO Y EL NOMBRE</div>
			<div class="bar d-flex">
						<div class="sesion"><a href="adminHome.php">Bienvenido "Admin"</a></div>
						<div class="sesion"><a href="adminHomeComercios.php">Comercios</a></div>
						<div class="sesion"><a href="adminHomeDeliverys.php">Deliverys</a></div>
						<div class="sesion"><a href="">Estadisticas</a></div>
						<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
			</div>
		</div>
	
		<div class="best mt-5 text-center">
			<h4>Comercios</h4>
			<div class="d-flex mt-3 justify-content-center">
				<div class="itemComercio">
					COMERCIO 1
				</div>
				<div class="itemComercio">
					COMERCIO 2
				</div>
				<div class="itemComercio">
					COMERCIO 3
				</div>
				<div class="itemComercio">
					COMERCIO 4
				</div>
				<div class="itemComercio">
					COMERCIO 5
				</div>
			</div>
		</div>

		<div class="best mt-5 text-center">
			<h4>Deliverys</h4>
			<div class="d-flex mt-3 justify-content-center">
				<div class="itemComercio">
					DELIVERY 1
				</div>
				<div class="itemComercio">
					DELIVERY 2
				</div>
				<div class="itemComercio">
					DELIVERY 3
				</div>
				<div class="itemComercio">
					DELIVERY 4
				</div>
				<div class="itemComercio">
					DELIVERY 5
				</div>
			</div>
		</div>
	</div>
</body>
</html>