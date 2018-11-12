<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="POST" action="/delivery/peticionNewDelivery" enctype="application/x-www-form-urlencodes"">
	
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
	
		<label>Introduzca su Telefono:</label>
		<br>
		<input type="number" required name="telefono">
		<br>
		<br>
		<label>Veiculo que utilizo para movilizarme:</label>
		<br>
		<select>
			<option></option>
			<option value="1">Bicicleta</option>
			<option value="2">Motocicleta</option>
			<option value="3">Automovil</option>
		</select>
		<br>
		<br>
		
		<input type="submit" name="enviar" value="enviar">

	</form>
   
</body>
</html>

