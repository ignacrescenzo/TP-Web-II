<?php
  if (!isset($_SESSION["login"])) {
      header("location:/login");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Estadisticas</title>
    
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
            <li><a style="cursor:pointer" onclick="location.href='/administradorDeSistema/index'" data-nav-section="welcome">Inicio</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/administradorDeSistema/peticionDeComercios'" >Comercios</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/administradorDeSistema/peticionDeDeliverys'" >Deliverys</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/administradorDeSistema/estadisticas'" >Estadísticas</a></li>
            <li><a style="cursor:pointer" onclick="location.href='/login/cerrarsesion'" >Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </head>
  <body>

<section class="probootstrap-section-bg overlay" style="background-image: url(../application/resources/img/hero_bg_1.jpg); height: 250px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h3 class="secondary-heading" style="color: black; font-size: 30px;">Estadísticas generales:</h3>
            </div>
          </div>
        </div>
      </div>
     

     <div class="container">
        <div class="row">
       		 <div class='probootstrap-animate'>
				<div class='probootstrap-block-image'>
            		<div class='text'>
		
	<form method="POST" action="/administradorDeSistema/estadisticasDatos" enctype="application/x-www-form-urlencodes">
	
        <div class="col-md-4">
            <div class="form-group">
                <label for="date">Desde <i class="icon icon-calendar"></i></label>
                    <div class="form-field">
                    <input type="date" name="desde" id="date1" class="form-control">
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
        	    <label for="date">Hasta</label> <i class="icon icon-calendar"></i>
                    <div class="form-field">
                    <input type="date" name="hasta" id="date2" class="form-control">
                </div>
            </div>
        </div>
      
        	    <label for="date"> </label>
                    <div class="form-field">
                    <input type="submit" class='btn btn-primary' name="buscar" value="buscar">
                </div>
            
	</form>
<br>
		<p>Total ganancias:</p>

		<p>Entregas mensuales:</p>

		<p>Top rankin comercios que mas vendieron:</p>
		
		<p>Top rankin deliverys que mas entregaron:</p>
				</div>
			</div>
		</div>
	</div>
</div>


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