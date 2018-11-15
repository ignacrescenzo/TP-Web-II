<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="POST" action="/operadorComercio/peticionNuevoComercio" enctype="application/x-www-form-urlencodes"">
	
	<h2>Datos del Comercio</h2>
		<label>Ingrese Nombre Del Comercio:</label>
		<br>
		<input type="text" required name="nombre" required="">
		<br>
		<br>
		<label>Introduzca E-mail de referencia:</label>
		<br>
		<input type="email" required name="email" required="">
		<br>
		<br>
		<label>Introduzca Direccion del Comercio:</label>
		<br>
		<input type="text" required name="direccion" required="">
		<br>
		<br>
		<label>Introduzca Ciudad del Comercio:</label>
		<br>
		<input type="text" required name="ciudad" required="">
		<br>
		<br>
		<label>Introduzca Telefono del Comercio:</label>
		<br>
		<input type="number" required name="telefono">
		<br>
		<br>
		<h2>Datos de su Usuario</h2>
		<h4>Usuario 1</h4>
		<label>NombreUsuario 1:</label>
		<br>
		<input type="text" required name="NombreUsuario1">
		<br>
				

		<br>
		<br>
		<br>
		<input type="submit" name="enviar" value="enviar">

	</form>
   
</body>
</html>
