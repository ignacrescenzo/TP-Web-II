<?php
	if(!isset($_SESSION["login"])){
		echo "INISIA SESION WACHO";
        echo "<br>";
        echo "<a href='/login'>Iniciar sesion</a>";
        exit;
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container-fluid px-0">
		<div class="header d-flex justify-content-between align-items-center">
			<div class="logo"> Administrador</div>
			<div class="bar d-flex">

				<br><br>
				<form method="POST" action="/AdministradorDeSistema/listarDeliverys" enctype="application/x-www-form-urlencodes"">
					<select name="estado">
					<option value=0 selected>No Habilitados
					<option value=1>Habilitados
					<option value=2>Esperando Aprobacion
					</select>
					<br><br>
					<input type="submit" value="ver lista">
				</form>						
			</div>
		</div>
	</div>
</body>
</html>