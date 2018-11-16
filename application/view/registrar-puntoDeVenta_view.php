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
<h3>Formulario de registro de Punto De Venta</h3>

	<form method="POST" action="/OperadorComercio/registrarPuntoDeVenta" enctype="application/x-www-form-urlencodes">
		<input type="number" name="idComercio" value="<?php echo $data; ?>">
		<br><br>
		<label>Direccion</label>
		<input type="text" name="direccion">
		<br><br>
		<label>Telefono</label>
		<input type="text" name="telefono">
		<br><br>
		<button>Enviar</button>
	</form>

</body>
</html>