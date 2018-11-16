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
						<div class="sesion"><a href="/administradorDeSistema/peticionDeDeliverys">Deliverys</a></div>
						<div class="sesion"><a href="">Estadisticas</a></div>
						<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
			</div>
		</div>
	
	<br>
	<h3> Deliverys En Espera de Aprobacion </h3>
<br>
	
<?php
	if(mysqli_num_rows($data)>0){
    while($rows=mysqli_fetch_assoc($data)) { 		
		echo $rows['nombreUsuario'] . "-" . $rows['email']. "-" . $rows['nombre']. "-" . $rows['apellido']. "-" . $rows['telefono'];
		$idUsuario=$rows['idUsuario'];	
		echo "<a href='/AdministradorDeSistema/habilitarDelivery?idUsuario=".$idUsuario."'>    Habilitar   </a>";
		echo "<a href='/AdministradorDeSistema/eliminarDelivery?idUsuario=".$idUsuario."'>Eliminar</a>";

		echo "<br><br>";
    }
}
?>

	
	</div>
</body>
</html>