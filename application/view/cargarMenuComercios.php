<?php
session_start();
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>MenuesComercio</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>



<form action="validacionMenuComercio.php" method="Post" enctype="applicationn/x-www-form-urlencored" class="formulario" >
	
	<h2 class="titulo_form">Nuevo Menu</h2>

<div class="contendor_inputs">
	<input type="text" name="descripcion" placeholder="Ingrese Descripcion" value="descripcion">
	<input type="text" name="precio" placeholder="Ingrese Precio" value="Precio_idPrecio">
	<input type="text" name="foto" placeholder="Ingrese URL de foto" value="foto">
	<input type="submit" name="cargar" class="boton" value="Cargar">
</div>

</form>

</body>
</html>