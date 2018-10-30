<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="POST" action="/Cliente/validarCliente" enctype="application/x-www-form-urlencodes"">
	
		<label>Ingrese Nombre De Usuario:</label>
		<br>
		<input type="text" required name="nombreUsuario">
		<br>
		<br>
		<label>Ingrese su Contraseña:</label>
		<br>
		<input type="password" required name="clave">
		<br>
		<br>
		<label>Introduzca su E-mail:</label>
		<br>
		<input type="email" required name="email">
		<br>
		<br>
		<label>Introduzca su Nombre:</label>
		<br>
		<input type="text" required name="nombre">
		<br>
		<br>
		<label>Introduzca su Apellido:</label>
		<br>
		<input type="text" required name="apellido">
		<br>
		<br>
		
		<label>Introduzca su Direccion:</label>
		<br>
		<input type="text" required name="direccion">
		<br>
		<br>
		<label>Introduzca su Telefono:</label>
		<br>
		<input type="number" required name="telefono">
		<br>
		<br>
		
		<input type="submit" name="enviar" value="enviar">

	</form>
   
</body>
</html>

