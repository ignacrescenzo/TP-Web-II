<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="POST" action="/operadorComercio/validarOperadorComercio" enctype="application/x-www-form-urlencodes">
	
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
		<label>Ingrese el comercio para el que trabaja:</label>
		<br>
		<select name="comercio" >
			<?php
				while($rows = mysqli_fetch_assoc($data)) { 
					echo"<option value='".$rows['idComercio']."'>".$rows['nombre']."</option> <br>";	
				}
			?>
		</select>
		
		<br>
		<br>
		<input type="submit" name="enviar" value="enviar">

	</form>
   
</body>
</html>

