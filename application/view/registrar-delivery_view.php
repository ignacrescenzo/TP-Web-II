

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Registrarme</title>

     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">

    <!-- <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../application/resources/css/styles-merged.css">
    <link rel="stylesheet" href="../application/resources/css/style.min.css">
    
    <!-- <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
    <script src="../application/resources/js/bootstrap.min.js"></script> -->
    <script src="../application/resources/js/scripts.min.js"></script>
    <script src="../application/resources/js/custom.min.js"></script>

  </head>
  <body>
    
 <!-- Fixed navbar -->
    
     <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-nav-section="welcome">Inicio</a></li>
            <li><a onclick="location.href='/main/listarcomercios'" >Comercios</a></li>
            <li><a href="#" >Ofertas del día</a></li>
            <li><a onclick="location.href='/login'"> Iniciar Sesión </a></li>
            <li><a onclick="location.href='/cliente/registrar'" >Registrarme</a></li>
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
    
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <form method="POST" action="/delivery/peticionNewDelivery" enctype="application/x-www-form-urlencodes">
              <div class="form-group">
                <label for="c_name">Nombre Usuario</label>
                <div class="form-field">
                  <input required="" type="text" class="form-control" name="nombreUsuario">
                </div>
              </div>

              <div class="form-group">
                <label for="c_name">Contraseña</label>
                <div class="form-field">
                  <input required="" type="password" class="form-control" name="clave">
                </div>
              </div>

              <div class="form-group">
                <label for="c_name">Email</label>
                <div class="form-field">
                  <input required="" type="email" class="form-control" name="email">
                </div>
              </div>
			  
			  <div class="form-group">
                <label for="c_name">Nombre</label>
                <div class="form-field">
                  <input required="" type="text" class="form-control" name="nombre">
                </div>
              </div>

                <div class="form-group">
                <label for="c_name">Apellido</label>
                <div class="form-field">
                  <input required="" type="text" class="form-control" name="apellido">
                </div>
              </div>

               <div class="form-group">
                <label for="c_name">Telefono</label>
                <div class="form-field">
                  <input required="" type="number" class="form-control" name="telefono">
                </div>
              </div>

			
              <div class="form-group">
                <input type="submit" name="enviar" value="enviar" class="btn btn-primary btn-lg btn-block">
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