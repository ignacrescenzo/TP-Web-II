<?php
		if(!isset($_SESSION["login"])){
		echo "INISIA SESION WACHO";
        echo "<br>";
        echo "<a href='/login'>Iniciar sesion</a>";
        exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Home Comercios</title>
		<link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
		<link rel="stylesheet" href="../application/resources/css/estilosIndex.css">
		<link rel="stylesheet" href="../application/resources/css/comercioHome.css">
		<script src="../application/resources/js/bootstrap.min.js"></script>
		<script src="../application/resources/js/jquery-3.3.1.min.js"></script>
		<script src="../application/resources/js/comercioHome.js"></script>
		<link rel="stylesheet" href="../application/resources/css/menu_view.css">

		
	</head>
	<body>
		<div class="container-fluid px-0">
			<div class="header d-flex justify-content-between align-items-center">
				<div class="logo"> ACA VA EL LOGO Y EL NOMBRE</div>
					<div class="bar d-flex">
						<div class="sesion">Bienvenido "Usuario"</div>
						<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
						<div class="sesion"><a href="/login/iracomercios">Volver a comercios</a></div>
					</div>
				</div>
				<div class="banner d-flex flex-column align-items-center">
					<div><h3>Banner</h3></div>
				</div>
				<div class="text-center">
					<h1>Menus disponibles</h1>
				</div>
			</div>
					<div class="row">
                        <?php
						if($data != null){
							while($menues = mysqli_fetch_assoc($data)) {
								$idComercio = $menues['Comercio_idComercio'];
								
								echo"<div class='col-md-4'>
										<div class='card'>
											<img class='card-img-top' src='/application/resources/upload/".$menues['foto']."' alt='Mi Imagen' width='120px' height='120px'>
											<div class='card-body'>
												<h4 class='card-title'>Menu "."<span id ='menuId'>".$menues['idMenu']."</span></h4>
												<p class='card-text'>".$menues['descripcion']."</p>
												<p class='card-text'>".$menues['monto']."</p>
												<a class='btn btn-primary agregarCarrito' href='/cliente/agregarAlCarrito?c=".$menues['Comercio_idComercio']."&d=".$menues['descripcion']."'>Comprar</a>
											</div>
										</div> 
									</div>";
							}
							echo "<div class='container'>";
							echo "<a class='btn btn-info verCarrito' href='/cliente/verCarrito?c=".$idComercio."'>Ir al carrito!</a>";
							echo "</div>";
						}
						else{
							echo "<div class='text-center mx-auto'><h2>Este comercio no tiene menús cargados</h2></div>";
						}	
                        ?>
					</div>
				</div>
		
			<div class="title mt-4">
					<h1>Ofertas</h1>
					<div class="container">
						<div class="row">	 
							<div class="col-md-4">
								<div class="card">
									<img class="card-img-top" src=".jpg" alt="Mi Imagen">
									<div class="card-body">
										<h4 class="card-title">Oferta 1</h4>
										<p class="card-text">Descripcion</p>
									</div>
								</div> 
							</div>
						</div>
					</div>
			</div>

		</div>
		
	</body>
	<script src="/application/resources/js/menu_view.js"></script>
</html>