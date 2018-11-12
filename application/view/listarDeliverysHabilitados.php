<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3> Deliverys Habilitados </h3>
<h5>
<?php
	if(mysqli_num_rows($data)>0){
    while($rows=mysqli_fetch_assoc($data)) { 	
		echo $rows['nombreUsuario'] . "-" . $rows['email']. "-" . $rows['nombre']. "-" . $rows['apellido']. "-" . $rows['telefono'];
		$idUsuario=$rows['idUsuario'];	
		echo "<a href='/AdministradorDeSistema/deshabilitarDelivery?idUsuario=".$idUsuario."'>Deshabilitar</a>";
		echo "<br><br>";
    }
}
?>
</h5>
</body>
</html>