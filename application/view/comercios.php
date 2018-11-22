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
            <a class="navbar-brand" href="/" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a style="cursor:pointer" onclick="location.href='/cliente/verComercios'" data-nav-section="welcome">Inicio</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/cliente/verComercios'" >Comercios</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/cliente/mostrarPedidos'">Pedidos</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/login/cerrarsesion'" >Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </head>
  <body>

	
<section class="flexslider" data-section="welcome">
      <ul class="slides">
        <li style="background-image: url(../application/resources/img/celular.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Bienvenido</h1>
                  <h3 class="secondary-heading">a RESTÓ</h3>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h5 class="secondary-heading" style="color: black;">¿Qué querés comer?</h5>
              <h3>SELECCIONÁ UN COMERCIO PARA COMENZAR TU PEDIDO!</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
        <?php
                while($rows = mysqli_fetch_assoc($data)) { 
                    
        echo "        
          <div class='col-md-4 col-sm-4 probootstrap-animate'>
            <div class='probootstrap-block-image'>

              <figure> <img src='/application/resources/upload/".$rows['imagen']."' width='360px' height='200px'></figure>
              <div class='text'>
                <h3>".$rows['nombre']."</a></h3>
                <p>".$rows['nombre']."</p>";
              if(isset($rows['direccion']) && isset($rows['descripcionLocalidad'])){
                echo "<p>".$rows['direccion']." - ".$rows['descripcionLocalidad']."</p>";
              }
               echo "<p> <a href='/puntoDeVenta/mostrarMenu?c=".$rows['idComercio']."' class='probootstrap-custom-link link-sm'> Ver menú</a></p>
              </div>
            </div>
          </div> 
          ";
          } ?>
        </div>
      </div>
		<div>
		<h3>Filtro por zona:</h3>
			<?php
				while($row = mysqli_fetch_assoc($data2)){
				echo "<p> <a href='/cliente/listarComerciosPorZona?idLocalidad=".$row['idLocalidad']."' class='probootstrap-custom-link link-sm'>".$row['localidad']."</a></p>";
				}
			?> 
		</div>
    </section>
	 
       <!--<div class="row contenido border mt-4">
            <div class="col col-3 filtro">
                Filtrar por: <br> <br>
                <div class="f-flex flex-column zona checkboxes">
                    <div>Zona</div>
                    <div>
                        <input type="checkbox" name="" id="">Zona 1
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Zona 2
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Zona 3
                    </div>
                </div>

                <div class="f-flex flex-column categoria checkboxes mt-5">
                    <div>Categoria</div>
                    <div>
                        <input type="checkbox" name="" id="">Categoria 1
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Categoria 2
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Categoria 3
                    </div>
                </div>
            </div> -->
            <!-- <div class="col col-9">
           
				while($rows = mysqli_fetch_assoc($data)) { 
                    echo "
                    <div class='row comercio'>
                        <div class='col col-4 img'>
                            IMAGEN
                        </div>
                        <div class='col col-8'>
                            <div class='nombreComercio'>".$rows['nombre']."</div>
                            <div class='descripcion'>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo officiis commodi in, exercitationem hic repudiandae modi aut sit a, placeat, sunt tempore. Vel, possimus hic.
                            </div>
                            <div class='d-flex justify-content-end'>
                                <a href='/puntoDeVenta/mostrarMenu?c=".$rows['idComercio']."'>
                                    <input type='button' value='Ver menú'>
                                </a>
                            </div>
                        </div>
                    </div>";
                }
                </div> -->


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