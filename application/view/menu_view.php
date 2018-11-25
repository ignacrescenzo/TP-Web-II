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
    <script src="../application/resources/js/scripts.min.js">
    </script>
    <script src="../application/resources/js/custom.min.js">
    </script>


    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/" title="uiCookies:FineOak">FineOak</a>
            </div>

            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a style="cursor:pointer" onclick="location.href='/cliente/verComercios'" data-nav-section="welcome">Inicio</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='/cliente/verComercios'">Comercios</a></li>
                    <li><a style="cursor:pointer" onclick="location.href= <?php echo "'/cliente/verCarrito?c=$data2'" ?>">Carrito</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='/cliente/mostrarPedidos'">Pedidos</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='/login/cerrarsesion'">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>


    <section class="flexslider" data-section="welcome">
        <ul class="slides">
            <li style="background-image: url(../application/resources/upload/<?php echo $data4; ?>)" class="overlay"
                data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                <h1 class="primary-heading">Bienvenido</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>

    <!-- OFERTAS DEL DIA -->

    <section class="probootstrap-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading">Ofertas</h2>
                        <h3 class="secondary-heading">del día</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="row">
                    <?php
                      if(mysqli_num_rows($data3) >= 1){ 
                       while($ofertas = mysqli_fetch_assoc($data3)) {
                           echo"

                        <div class='col-md-4 col-sm-4 probootstrap-animate'>
            			<div class='probootstrap-block-image'>
			              <figure> <img src='/application/resources/upload/".$ofertas['foto']."' width='360px' height='200px'></figure>
			              		<div class='text'>
			              Menu: <span id ='menuId'>".$ofertas['idMenu']."</span>
			                <p> Descripción: ".$ofertas['descripcion']." <br>
			                Precio: $".$ofertas['monto']."</p>

			               	<a href='/menu/eliminarOferta?c=".$data2."&variable=".$ofertas['descripcion']."' class='probootstrap-custom-link link-sm'>Eliminar</a>
								</div>
			            	</div> 
			            </div>";
                            }
                          }

                        else{
							  echo "<div class='text-center w-50  mt-2 mx-auto'><h3> No hay ofertas disponibles </h3> </div>";
						  }

                        ?>

                </div>
            </div>
        </div>
    </section>


    <!-- MENÚ -->

    <section class="probootstrap-section probootstrap-bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading"></h2>
                        <h3 style="color: black;" class="secondary-heading">Menús</h3>
                    </div> <br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="menus">
                        <?php
				if(mysqli_num_rows($data) >= 1){
				while($menues = mysqli_fetch_assoc($data)) {
					?>

                        <li>
                            <?php echo '<figure class="image"> <img src="/application/resources/upload/'.$menues['foto'].'" width="100px";/> </figure>'; ?>
                            <div class="text">
                                <span class="price"> $
                                    <?php echo "$menues[monto]"; ?> </span>
                                <h3>
                                    <?php echo "$menues[idMenu]"; ?>
                                </h3>
                                <p>
                                    <?php echo "$menues[descripcion]"; ?>
                                </p>
                                <?php echo" <a class='probootstrap-custom-link link-sm' href='/cliente/agregarAlCarrito?c=".$data2."&d=".$menues['descripcion']."'> AGREGAR AL CARRITO</a> " ?>
                            </div> <br> <br>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php 		echo "<div class='container'>";
					echo "<a class='btn btn-primary btn-lg' href='/cliente/verCarrito?c=".$data2."'>Ir al carrito!</a>";
					echo "</div>"; 
					}
					else{
							echo "<div class='text-center mx-auto'><h2>Este comercio no tiene menús cargados</h2></div>";
						}
					?>
    </section>

    <!--
				<div class="text-center">
					<h1>Menus disponibles</h1>
				</div>
			</div>
					<div class="row">
                        <?php /*
						if(mysqli_num_rows($data) >= 1){
							while($menues = mysqli_fetch_assoc($data)) {
							
								echo "<div class='col-md-4'>
										<div class='card'>
											<img class='card-img-top' src='/application/resources/upload/".$menues['foto']."' alt='Mi Imagen' width='120px' height='120px'>
											<div class='card-body'>
												<h4 class='card-title'>Menu "."<span id ='menuId'>".$menues['idMenu']."</span></h4>
												<p class='card-text'>".$menues['descripcion']."</p>
												<p class='card-text'>".$menues['monto']."</p>
												<a class='btn btn-primary agregarCarrito' href='/cliente/agregarAlCarrito?c=".$menues['idPuntoDeVenta']."&d=".$menues['descripcion']."'>Comprar</a>
											</div>
										</div> 
									</div>";
							}
							echo "<div class='container'>";
							echo "<a class='btn btn-info verCarrito' href='/cliente/verCarrito?c=".$data2."'>Ir al carrito!</a>";
							echo "</div>";
						}
						else{
							echo "<div class='text-center mx-auto'><h2>Este comercio no tiene menús cargados</h2></div>";
						}	 */
                        ?>
					</div> -->



    <script src="/application/resources/js/menu_view.js">
    </script>


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