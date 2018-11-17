<?php
  if(!isset($_SESSION["login"])){
    echo "INISIA SESION WACHO";
        echo "<br>";
        echo "<a href='/login'>Iniciar sesion</a>";
        exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Inicio</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">

    <!-- <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../application/resources/css/styles-merged.css">
    <link rel="stylesheet" href="../application/resources/css/style.min.css">
    
    <!-- <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
    <script src="../application/resources/js/bootstrap.min.js"></script> -->
    <script src="../application/resources/js/scripts.min.js"></script>
    <script src="../application/resources/js/custom.min.js"></script>
    

    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-nav-section="welcome">Inicio</a></li>
            <li><a onclick="location.href='/login/iracomercios'" >Comercios</a></li>
            <li><a onclick="location.href= <?php echo "'/cliente/verCarrito?c=$data2'" ?>" >Carrito</a></li>
            <li><a onclick="location.href='/cliente/mostrarPedidos'">Pedidos</a></li>
            <li><a onclick="location.href='/login/cerrarsesion'" >Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </head>
  <body>

<section class="probootstrap-section-bg overlay" style="background-image: url(../application/resources/img/aaa1.jpg); height: 250px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h3 class="secondary-heading">Carrito</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
   <section class="probootstrap-section">
      <div class="container">
        <div class="row">
 	
 	<?php if($data)
	{
		$total=0;
		foreach($data as $producto)
		{
			$cantidad=$producto["cantidad"];
			?>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <div class="text">
             	<h3> <?php echo $producto["descripcion"] ?></h3>
             	<span class="date"> Precio unitario: $<?php echo $producto["precio"] ?> </span>
                
				<span class="date">Cantidad: <?php echo"<a  href='/cliente/restarProducto?c=".$data2."&d=".$producto['descripcion']."'>-</a>"; ?> <?php echo $producto["cantidad"]?> <?php echo"<a  href='/cliente/sumarProducto?c=".$data2."&d=".$producto['descripcion']."'>+</a>"; ?> </span>
                <p> TOTAL: <?php echo ($producto["cantidad"]*$producto["precio"]); ?> </p>
                <p> <?php echo"<a href='/cliente/eliminarProducto?c=".$data2."&id=".$producto['id']."' 
                class='probootstrap-custom-link link-sm'>Eliminar</a></p>"; ?> </p>
              </div>
            </div>
          </div>
          <?php 
      		$total+=($producto["cantidad"]*$producto["precio"]);
      			} 
          ?>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
              	<div class="text">
             		<?php echo "<h3>El precio total es $".$total."</h3>" ?> <br>
             		<?php echo "<a class='btn' href='/pedido/nuevoPedido?c=".$data2."'>Confirmar pedido</a>"; ?> 
             		<br><br>
             		<?php echo "<a class='btn' href='/cliente/eliminarCarrito?c=".$data2."'>Vaciar Carrito</a>"; ?>
             		<br><br>
             		<?php echo "<a class='btn' href='/puntoDeVenta/mostrarMenu?c=".$data2."'>Volver a Menu</a>"; ?>
             		
   				</div>
          </div>
            
    
    <?php } else{
		
		echo "<script>alert('El carro esta vacio');</script>";
		echo "<h3>Carro vacio</h3>";
		echo "<a class='btn btn-primary' href='/puntoDeVenta/mostrarMenu?c=".$data2."'>Volver a Menu</a>";
	}
?>
			</div>
       	</div>
    </section>

</body>
<!-- FOOTER -->

        <section class="probootstrap-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3><a href="#">Acerca de Restó® </a></h3>
              <div class="row">
                <div class="col-md-6">
                  <a href="#"> Quiero ser Delivery</a>
                </div>
                <div class="col-md-6">
                  <a href="/operadorComercio/registrarComercio"> Quiero registrar mi Comercio</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Horarios</h3>
              <div class="row">
                <div class="col-md-4">
                  <p>Todos los días <br> ¡las 24hs!</p>
                </div>
                <div class="col-md-4">
                  <a href="#">Ayuda</a>
                </div>
                <div class="col-md-4">
                  <a href="#">Medios de pago</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p class="copyright-text">&copy; 2018 <a href="#">Restó</a>. Todos los derechos reservados.
          </div>
          <div class="col-md-4">
            <ul class="probootstrap-footer-social right">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

  </body>

</html>