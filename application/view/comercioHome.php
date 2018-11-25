<?php
  if (!isset($_SESSION["login"])) {
      header("location:/login");
  }
  $ruta = "/operadorComercio/index?v=".$_SESSION['idComercio']."&c=".$data2;
  $rutaPedidos = "/operadorComercio/mostrarPedidos?c=".$data2;
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
                    <li><a style="cursor:pointer" href="#" data-nav-section="welcome">Inicio</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='<?php echo $ruta;  ?>'">Volver a Puntos de venta</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='<?php echo $rutaPedidos; ?>'">Pedidos</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='/login/cerrarsesion'">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>

    <section class="probootstrap-section-bg overlay" style="background-image: url(../application/resources/upload/<?php echo $data4; ?>); height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h3 class="secondary-heading" style="color: black;">Mis Menús</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center mb-5">
            <a href="/puntoDeVenta/mostrarformulariomenu?c=<?php echo $data2; ?>">
                <button class="btn btn-primary">Agregar Menu</button>
            </a>
        </div> <br>

        <div class="container">
            <div class="row">
                <?php
        if (mysqli_num_rows($data) >= 1) {
            while ($menues = mysqli_fetch_assoc($data)) {
                echo "        
          	<div class='col-md-4 col-sm-4 probootstrap-animate'>
            	<div class='probootstrap-block-image'>

              <figure> <img src='/application/resources/upload/".$menues['foto']."' width='360px' height='200px'></figure>
              		<div class='text'>
              Menu: <span id ='menuId'>".$menues['idMenu']."</span>
                <p> Descripción: ".$menues['descripcion']." <br>
                Precio: $".$menues['monto']."</p>

               	<a href='/puntoDeVenta/mostrarformulariomodificarmenu?c=".$data2."&d=".$menues['descripcion']."' class='probootstrap-custom-link link-sm'>Modificar</a>
			
				<a href='/menu/eliminar?c=".$data2."&variable=".$menues['descripcion']."' class='probootstrap-custom-link link-sm'>Eliminar</a>

				<a href='/menu/mostrarParaOfertar?c=".$data2."&variable=".$menues['descripcion']."' class='probootstrap-custom-link link-sm'>Ofertar</a>
					</div>
            	</div> 
            </div>";
            }
        }

                        ?>
            </div>
        </div>

        <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
                <h3 class="secondary-heading" style="color: black;">Mis ofertas</h3>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php
                      if (mysqli_num_rows($data3) >= 1) {
                          while ($ofertas = mysqli_fetch_assoc($data3)) {
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
                      } else {
                            echo "<div class='text-center w-50  mt-2 mx-auto'><h3> No hay ofertas disponibles </h3> </div>";
                        }

                        ?>

            </div>
        </div>
        </div>



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
                            <a href="/delivery/registrar"> Quiero ser Delivery</a>
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