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
				<div>
                   <?php 
                    
                        $idComercio=$data2;
                        echo "<a href='/OperadorComercio/crearPuntoDeVenta?idComercio=".$idComercio."'>Crear Punto De Venta</a>";
                                  
                    ?>
                </div>
                <div class="sesion"><a href="/login/cerrarsesion">Cerrar sesión</a></div>           
			</div>
		</div>
        
        <div class="tituloComercio text-center mt-5">
            Bienvenido "Operador" Selecciona un punto de venta para comenzar la gestión!
        </div>
        <div class="row contenido border mt-4">
            
            <div class="col col-9">

                
            <?php
            while($rows=mysqli_fetch_assoc($data)){ 
                    
                    echo "
                    <div class='row comercio'>
                        <div class='col col-8'>
                            <div class='nombreComercio'>".$rows['direccion']."</div>
                            <div class='nombreComercio'>".$rows['telefono']."</div>                         
                            <div class='descripcion'>
                                Texto Punto de venta
                            </div>
                            <div class='d-flex justify-content-end'>
                                <a href='/puntoDeVenta/index?c=".$rows['idPuntoDeVenta']."'>
                                    <input type='button' value='Entrar'>
                                </a>
                                <a href='/OperadorComercio/eliminarPuntoDeVenta?c=".$rows['idPuntoDeVenta']."'>
                                    <input type='button' value='Eliminar'>
                                </a>
                                <a href='/OperadorComercio/modificarPuntoDeVenta?c=".$rows['idPuntoDeVenta']."'>
                                    <input type='button' value='Modificar'>
                                </a>
                            </div>
                        </div>
                    </div>";
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