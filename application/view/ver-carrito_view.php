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
        <title>Home Comercios</title>
        <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../application/resources/css/estilosIndex.css">
        <link rel="stylesheet" href="../application/resources/css/comercioHome.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="../application/resources/js/bootstrap.min.js"></script>
        <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
        <script src="../application/resources/js/comercioHome.js"></script>
        <link rel="stylesheet" href="../application/resources/css/menu_view.css">      
    </head>
    <body>
        <div class="container-fluid px-0">
            <div class="header d-flex justify-content-between align-items-center">
                <div class="logo"> ACA VA EL LOGO Y EL NOMBRE</div>
                    <div class="bar d-flex">
                        <div class="sesion">Bienvenido "Usuario"</div>
                        <div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>
                        <div class="sesion"><a href="/login/iracomercios">Volver a comercios</a></div>
                    </div>
            </div>
        
				<div class="container">

                <?php
				echo "<div class='d-flex'>";
	if($data)
	{
		$total=0;
		foreach($data as $producto)
		{
			$cantidad=$producto["cantidad"];
			echo"
					<div class='col-md-3'>
						<div class='card'>
							<div class='card-body'>
								<h4 class='card-title'>Descripcion: "."<span id ='menuId'>".$producto["descripcion"]."</span></h4>
								<p class='card-text'>Cantidad:".$producto["cantidad"]."</p>
								<a class='btn btn-danger' href='/cliente/sumarProducto?d=".$producto['descripcion']."'>+</a>
								<a class='btn btn-primary' href='/cliente/restarProducto?d=".$producto['descripcion']."'>-</a>
								<p class='card-text'>Precio: ".$producto["precio"]."</p>
								<p class='card-text'>IdProducto: ".$producto["id"]."</p>
								<p class='card-text'>Total: $".$producto["cantidad"]*$producto["precio"]."</p> 
							</div>
						</div>
						<a class='btn btn-danger' href='/cliente/eliminarProducto?id=".$producto['id']."'>Eliminar</a> 
					</div>";
						$total+=($producto["cantidad"]*$producto["precio"]);
		}
		echo "</div>";

		echo "<br />";
		echo "<h3>El precio total es $".$total."</h3>";
		echo "<br />";
		echo "<br />";
		echo "<a class='btn btn-primary' href='/puntoDeVenta/mostrarMenu'>Volver a Menu</a>"; 
		echo "<a class='btn btn-danger' href='/cliente/eliminarCarrito'>Vaciar Carrito</a>";
		echo "<br />";
		echo "<br />"; 
		echo "<a class='btn btn-danger' href='/pedido/nuevoPedido'>Confirmar pedido</a>"; 
	} else{
		
		echo "<script>alert('El carro esta vacio');</script>";
		echo "<h1>Carro vacio</h1>";
		echo "<a class='btn btn-primary' href='/puntoDeVenta/mostrarMenu'>Volver a Menu</a>";
	}
?>
		</div>    
    </body>
    <script src="/application/resources/js/menu_view.js"></script>
</html>