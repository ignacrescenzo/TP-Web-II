<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="POST" action="/login/cargarUsuariosDeComercio" enctype="application/x-www-form-urlencodes"">
	
		<h2>Datos de su Usuario</h2>
		<h4>Usuario 2</h4>
		<label>NombreUsuario 2:</label>
		<br>
		<input type="text" required name="NombreUsuario2">
		<br>
		<label>Contraseña 2:</label>
		<br>
		<input required type="password" name="clave2">
		<br>
		<h4>Usuario 3</h4>
		<label>NombreUsuario 3:</label>
		<br>
		<input type="text" required name="NombreUsuario3">
		<br>
		<label>Contraseña 3:</label>
		<br>
		<input required type="password" name="clave3">
		<br>	
		<h4>Usuario 4</h4>
			<label>NombreUsuario 4:</label>
		<br>
		<input type="text" required name="NombreUsuario4">
		<br>
		<label>Contraseña 4:</label>
		<br>
		<input required type="password" name="clave4">
		<br>
		<h4>Usuario 5</h4>
		<label>NombreUsuario 5:</label>
		<br>
		<input  type="text" required name="NombreUsuario5">
		<br>
		<label>Contraseña 5:</label>
		<br>
		<input required type="password" name="clave5">
		<br>
  		<input type="hidden" name="idComercio" value="<?php echo $data2; ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $data; ?>">
		<br>
		<br>
		<br>
		<input type="submit" name="enviar" value="Cargar Usuarios">

	</form>
   
</body>
</html>
