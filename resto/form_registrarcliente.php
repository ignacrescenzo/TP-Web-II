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
            <li class="active"><a href="#" data-nav-section="welcome">Bienvenido "Comercio"</a></li>
            <li><a href="#" data-nav-section="specialties">Mis menús</a></li>
            <li><a href="#" data-nav-section="menu">Mis ofertas</a></li>
            <li><a href="#" data-nav-section="events">Estadísticas</a></li>
            <li><a href="#" data-nav-section="contact">Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>


 <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Registrate</h1>
              <h3 class="secondary-heading">para ser parte de Restó </h3>
            </div>
            <p>Amamos la comida tanto como vos y por eso queremos llevarte tu comida favorita directamente desde la cocina de los mejores restaurantes. ¿La mejor parte? ¡Te la llevamos dondE estés! <br> <br> *** <br><br>
            Registrate, ingresá tu dirección, elegí el restaurante, seleccioná tu comida favorita y listo. ¡Pedir delivery de comida nunca había sido tan sencillo, con RESTÓ lo único difícil será decidir qué comer!</p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <form method="POST" action="/Cliente/validarCliente" enctype="application/x-www-form-urlencodes" class="probootstrap-form">
              <div class="form-group">
                <label for="c_name">Nombre de Usuario</label>
                <div class="form-field">
                  <input type="text" class="form-control" name="nombreUsuario">
                </div>
              </div>

              <div class="form-group">
                <label for="c_email">Contraseña</label>
                <div class="form-field">
                  <input type="password" class="form-control" name="clave">
                </div>
              </div>

              <div class="form-group">
                <label for="c_name">Email</label>
                <div class="form-field">
                  <input type="email" class="form-control" name="email">
                </div>
              </div>

              <div class="form-group">
                <label for="c_name">Nombre</label>
                <div class="form-field">
                  <input type="text" class="form-control" name="nombre">
                </div>
              </div>

              <div class="form-group">
                <label for="c_name">Apellido</label>
                <div class="form-field">
                  <input type="text" class="form-control" name="apellido">
                </div>
              </div>

              <div class="form-group">
                <label for="c_name">Teléfono</label>
                <div class="form-field">
                  <input type="number" class="form-control" name="telefono">
                </div>
              </div>

              <div class="form-group">
                <input type="submit" value="Registrarme" class="btn btn-primary btn-lg btn-block">
              </div>
            </form>
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