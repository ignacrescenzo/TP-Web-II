<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Comercios | Mis Menús</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">

  </head>
  <body>
    
 <!-- Fixed navbar -->
    
    <nav class="navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.html" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse" >
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-nav-section="welcome">Inicio</a></li>
            <li><a href="#" data-nav-section="comercios">Comercios</a></li>
            <li><a href="#" data-nav-section="ofertas">Ofertas del día</a></li>
            <li><a href="#" data-nav-section="contacto">Contacto</a></li>
            <li><a href="#" data-nav-section="iniciarSesion">Iniciar Sesión</a></li>
            <li><a href="#" data-nav-section="registrar">Registrarme</a></li>
          </ul>
        </div>
      </div>
    </nav>


<section class="probootstrap-section probootstrap-bg-white" data-section=iniciarSesion>
      <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
            <form method="POST" action="login/validarlogin" enctype="application/x-www-form-urlencodes" class="probootstrap-form">
                <div class="col-md-4 col-md-offset-4">               
                  <div class="form-group">
                    <label for="nombreUsuario">Nombre de usuario</label>
                    <div class="form-field">
                      <i class="icon icon-user2"></i>
                      <input type="text" id="name" class="form-control" name="nombreUsuario" required="" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <div class="form-field">
                      <input type="password" id="name" class="form-control" name="clave" required="" placeholder="Contraseña">
                    </div>
                  </div>
                </div>

             
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <input type="submit" name="submit" id="submit" value="Iniciar Sesión" class="btn btn-lg btn-primary btn-block">
                </div>
              </div>
              
            </form>
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