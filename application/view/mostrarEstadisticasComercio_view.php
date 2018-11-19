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
						<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
			</div>
		</div>
	
		<br>
		<h1>Estadisticas generales:</h1>
<form method="POST" action="/operadorComercio/mostrarEstadisticas?idComercio=<?php echo $data ?>" enctype="application/x-www-form-urlencodes">
		<label>Desde</label>
		<input type="date" name="desde">

		<label>Hasta</label>
		<input type="date" name="hasta">
		<input type="submit" name="buscar" value="buscar">
</form>

<br>
		<h3>Total ganancias:</h3>
		<?php
	if(mysqli_num_rows($data2)>0){
    while($rows=mysqli_fetch_assoc($data2)) { 		
		echo "<h4>$".$rows['total']."</h4>";
    }
}
?>
<br>
		<h3>Cobrado por el sistema:</h3>
		<?php
	if(mysqli_num_rows($data3)>0){
    while($rows=mysqli_fetch_assoc($data3)) { 		
		echo "<h4>$".$rows['total']."</h4>";
    }
}
?>
<br>
		<h3>Pagado a deliverys:</h3>
		<?php
	if(mysqli_num_rows($data4)>0){
    while($rows=mysqli_fetch_assoc($data4)) { 		
		echo "<h4>$".$rows['total']."</h4>";
    }
}
?>


	</div>
</body>
</html>