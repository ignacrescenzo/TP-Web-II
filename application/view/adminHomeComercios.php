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
	<title>Nombre Pagina</title>
	<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="../resources/css/estilosIndex.css">
	<script src="../resources/js/bootstrap.min.js"></script>
	<script src="../resources/js/jquery-3.3.1.min.js"></script>
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
						<div class="sesion"><a href="">Cerrar sesión</a></div>
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

	</div>

	<br>

<h2>Comercios en espera de aprobacion</h2>

<?php
	if(mysqli_num_rows($data)>0){
    while($rows=mysqli_fetch_assoc($data)) { 		
		echo "<h4>Comercio:</h4> ";
		echo $rows['nombreComercio'] . "<br>" . $rows['emailComercio']. "<br>" . $rows['direccionComercio']. "<br>" . $rows['telefonoComercio'];

		$idComercio=$rows['idComercio'];	
		$idUsuario=$rows['idUsuario'];
		echo "<a href='/AdministradorDeSistema/habilitarComercio?idUsuario=".$idUsuario."'>    Habilitar   </a>";
		echo "<a href='/AdministradorDeSistema/eliminarComercio?idComercio=".$idComercio."'>Eliminar</a>";

		echo "<br><br>";
    }
}
?>

</body>
</html>