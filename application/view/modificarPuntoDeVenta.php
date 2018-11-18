<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if (isset($data)) {
 	$idPuntoDeVenta=$data;
 } 
 ?>
 <h3>Ingrese los datos que desee modificar Punto De Venta</h3>
 <form method="POST" action="/OperadorComercio/updatePuntoDeVenta?v=<?php echo $data2; ?>" enctype="application/x-www-form-urlencodes">
 	
 	<input type="hidden" name="idPuntoDeVenta" value="<?php echo $data; ?>" readonly>
 	<br><br>
 	<label> Direccion</label>
 	<input type="text" name="direccion">
 	<br><br>
 	<label> Telefono</label>
 	<input type="text" name="telefono">
 	<br><br>
 	<input type="submit" value="Modificar">

 </form>


</body>
</html>