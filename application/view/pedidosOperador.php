<?php
	if(!isset($_SESSION["login"])){
		echo "INISIA SESION WACHO";
        echo "<br>";
        echo "<a href='/login'>Iniciar sesion</a>";
        exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nombre Pagina</title>
	<link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="../application/resources/css/estilosIndex.css">
    <link rel="stylesheet" href="../application/resources/css/comercios.css">
	<script src="../application/resources/js/bootstrap.min.js"></script>
	<script src="../application/resources/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<div class="container-fluid px-0">
		<div class="header d-flex justify-content-between align-items-center">
			<div class="logo"> ACA VA EL LOGO Y EL NOMBRE</div>
			<div class="bar d-flex">
				<div class="sesion">Bienvenido "Operador"</div>
				<div class="sesion"><a href="/puntoDeVenta/index?c=<?php echo $data2; ?>">Volver a menus</a></div>
				<div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
			</div>
		</div>
        <div class="tituloComercio text-center mt-5">
            Pedidos Realizados
        </div>
        <div class="container">
            <div class="row">
            <?php

				if(mysqli_num_rows($data) >= 1){
						while($pedido = mysqli_fetch_assoc($data)){
						echo"<div class='col-md-4'>
								<div class='card'>
									<div class='card-body'>
										<h4 class='card-title'>Pedido Nº "."<span id ='menuId'>".$pedido['id']."</span></h4>
										<p class='card-text'>HoraDeGeneracion: ".$pedido['horaG']."</p>
										<p class='card-text'>Hora de retiro:".$pedido['retiro']."</p>
										<p class='card-text'>Hora de Entrega:".$pedido['entrega']."</p>
										<p class='card-text'>Direccion Comercio:".$pedido['dir']."</p>
										<p class='card-text'>Estado: ";
										if ($pedido['idDelivery'] != null) {
										 	echo "Pedido Tomado";
										 } else{
										 	echo "En espera";
										 }
									echo"</p></div>
								</div> 
							</div>";
                    }
				} else{
					echo "No Hay pedidos";
				}
				
			    ?>
            </div>
        </div>
        <div class="footer d-flex justify-content-center mt-4 pt-1">
			INFORMACION SOBRE LA EMPRESA, FOOTER LINKS ETC...
		</div>
	</div>
</body>
</html>