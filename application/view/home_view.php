<?php
if(!isset($_SESSION)){
		session_start();
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
</head>
<body>
	<div class="container-fluid px-0">
		<div class="header d-flex justify-content-between align-items-center">
			<div class="logo"> ACA VA EL LOGO Y EL NOMBRE</div>
			<div class="bar d-flex">
				<div class="sesion"><a href="/login">Iniciar sesión</a></div>
				<div class="sesion"><a href="/cliente/registrar">Registrarse</a></div>
				<div class="sesion"><a href="/main/listarcomercios">Restaurantes</a></div>
			</div>
		</div>
		<div class="title mt-5 pt-2">
			<h2>¿Qué querés comer?</h2>
		</div>
		<div class="search d-flex justify-content-center mt-4">
			<input type="text">
			<input type="button" value="Buscar">
		</div>
		<div class="ofertas d-flex text-center justify-content-center mt-4 pt-1">
			<div class="item"> Oferta 1</div>
			<div class="item"> Oferta 2</div>
			<div class="item"> Oferta 3</div>
			<div class="item"> Oferta 4</div>
			<div class="item"> Oferta 5</div>
		</div>
		<div class="best mt-5 text-center">
			<h4>Mejores comercios</h4>
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
		<div class="title mt-5 pt-2">
			<h2>¿Qué ser parte de nuestros deliverys??</h2>
			<h3>Unite</h3>
			<div class="sesion"><a href="/delivery/registrar">RegistrarDelivery</a></div>
		</div>
		<div class="footer d-flex justify-content-center mt-4 pt-1">
			INFORMACION SOBRE LA EMPRESA, FOOTER LINKS ETC...
		</div>
	</div>
</body>
</html>