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
					</div>
			</div>
			<div class="banner d-flex flex-column align-items-center">
				<div><h3>Banner</h3></div>
			</div>
            <div class="text-center">
				<h1>Menus disponibles</h1>
            </div>
				<div class="container">
				<a class='btn btn-info verCarrito' href='/cliente/verCarrito'>Ir al carrito!</a>
				<div class="text-center">
				<a class='btn btn-danger' href='/cliente/eliminarCarrito'>Vaciar Carrito</a>
				</div>
					<div class="row">
                        <?php
                        $conn = mysqli_connect("localhost","root","","tpweb2db");
                        $sql = "select * from menu m inner join precio p on p.idPrecio = m.Precio_idPrecio";
                        $result = mysqli_query($conn,$sql);
                        while($menues = mysqli_fetch_assoc($result)) {
                            echo"<div class='col-md-4'>
							<div class='card'>
								<img class='card-img-top' src='/application/resources/upload/".$menues['foto']."' alt='Mi Imagen' width='120px' height='120px'>
								<div class='card-body'>
									<h4 class='card-title'>Menu "."<span id ='menuId'>".$menues['idMenu']."</span></h4>
									<p class='card-text'>".$menues['descripcion']."</p>
									<p class='card-text'>".$menues['monto']."</p>
									<a class='btn btn-primary agregarCarrito' href='/cliente/agregarAlCarrito?d=".$menues['descripcion']."'>Comprar</a>
                                </div>
                                </div> 
                            </div>";
                            }
                        ?>
					</div>
				</div>
				<!-- <a href="#" class="btn btn-primary mt-3">Ver Todos</a> -->
		
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
				<!-- <a href="#" class="btn btn-primary mt-3">Ver Todos</a> -->
			</div>
				<!-- <div class="text-center mb-3">
				<a href="#" class="btn btn-primary mt-3">Ver Todos</a>
				</div> -->
		</div>
	</body>
	<script src="/application/resources/js/menu_view.js"></script>
</html>