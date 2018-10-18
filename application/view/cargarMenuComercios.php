<?php
session_start();
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>MenuesComercio</title>
</head>
<body>



<form class="form-signin" method="POST" action="menu/nuevomenu" enctype="application/x-www-form-urlencodes">

	<h2 class="titulo_form">Nuevo Menu</h2>

<div class="contendor_inputs">
	<input type="text" name="descripcion" placeholder="Ingrese Descripcion">
	<input type="text" name="precio" placeholder="Ingrese Precio">
	<input type="text" name="foto" placeholder="Ingrese URL de foto">
	<input type="submit" name="cargar" class="boton" value="Cargar">
</div>

</form>

</body>
</html>