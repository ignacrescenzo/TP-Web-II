<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Inicio</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">

  </head>
  <body>
    
  <?php 
$conexion = mysqli_connect("localhost","root","","tpWeb2Db");
$sqlAll = "SELECT * FROM comercio";
$resultAll= mysqli_query($conexion,$sqlAll);
$sql = "SELECT * FROM comercio";
$result= mysqli_query($conexion,$sql);
  ?>
    <!-- Fixed navbar -->
    
    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#" data-nav-section="welcome">Inicio</a></li>
            <li><a href="#" data-nav-section="specialties">Comercios</a></li>
            <li><a href="#" data-nav-section="menu">Ofertas del día</a></li>
            <li><a href="#" data-nav-section="events">Iniciar Sesión</a></li>
            <li><a href="#" data-nav-section="contact">Contacto</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="flexslider" data-section="welcome">
      <ul class="slides">
        <li style="background-image: url(img/hero_bg_1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Bienvenido</h1>
                  <h3 class="secondary-heading">a Restó</h3>
                  <p class="sub-heading">Delivery de comidas rápidas</p>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(img/hero_bg_2.jpg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Cená</h1>
                  <h3 class="secondary-heading">Con nosotros</h3>
                  <p class="sub-heading">Delivery de comidas rápidas</p>
                </div>
              </div>
            </div>
          </div>
          
        </li>
        <li style="background-image: url(img/hero_bg_3.jpg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Disfrutá</h1>
                  <h3 class="secondary-heading">Con nosotros</h3>
                  <p class="sub-heading">Delivery de comidas rápidas</p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>



<!-- NOSOTROS-->
<section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Descubrí</h1>
              <h3 class="secondary-heading">Nuestra Tienda Online</h3>
              <span class="seperator">* * *</span>
            </div>
            <p>RESTÓ te permite pedir comida a domicilio a miles de restaurantes y millones de platos en tu ubicación. ¿Se te antoja una gran pizza? ¿Un delicioso sushi? ¿Una jugosa hamburguesa? ¿Unas ricas empanadas? ¿O una sabrosa comida vegetariana? <br>Con unos simples pasos puedes recibir en tu puerta tu comida favorita.</p>
            <p><a href="#" class="probootstrap-custom-link">Saber más</a></p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <p><img src="img/comida.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>


<!-- OFERTAS DEL DIA -->

<section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_4.jpg);"  data-stellar-background-ratio="0.5" data-section="events">
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
    </section>
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="img/img_square_2.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">June 29, 2017</span>
                <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="img/img_square_3.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">June 29, 2017</span>
                <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="img/img_square_4.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">June 29, 2017</span>
                <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- COMERCIOS -->
    
    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_2.jpg);" data-stellar-background-ratio="0.5" data-section="specialties">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Algunos</h2>
              <h3 class="secondary-heading">Comercios</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- probootstrap-bg-white -->
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="probootstrap-cell-retro">
            <div class="half">

            <?php
            while ($rows = mysqli_fetch_assoc($result)){ 
            ?>
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(<?php echo $rows["logo"]; ?>);"></div>
                <div class="text text-center">
                  <h3><?php echo ($rows["nombre"]); ?> </h3>
                  <p><?php echo ($rows["descripcion"]); ?> </p>
                  <p class="price">$20.99</p>
                </div>
              </div>
            <?php 
            } 
            ?>

                         
            </div>

            <div class="half">
             <?php
            while ($rows = mysqli_fetch_assoc($result)){ 
            ?>
                <div class="probootstrap-cell reverse probootstrap-animate" data-animate-effect="fadeIn">
               <div class="image" style="background-image: url(<?php echo $rows["logo"]; ?>);"></div>
                <div class="text text-center">
                  <h3><?php echo ($rows["nombre"]); ?> </h3>
                  <p><?php echo ($rows["descripcion"]); ?> </p>
                  <p class="price">$20.99</p>
                </div>
              </div>
              <?php 
            } 
            ?>
            </div>
          
          </div>
        </div>
      </div>
    </section>






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
                  <a href="#"> Quiero registrar mi Comercio</a>
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
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>
  </body>
</html>