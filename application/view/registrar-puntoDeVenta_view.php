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
    <title>Restó | Formulario de registro de Punto De Venta</title>

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
    


 <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Restó</h1>
              <h3 class="secondary-heading">Formulario nuevo Punto de Venta</h3>
            </div>
            <p>Agrega nuevos puntos de venta para expandir tus posibilidades!<br> <br> *** <br><br>
            Una vez agregada tu nueva sucursal RESTÓ hace el resto!</p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <form method="POST" action="/OperadorComercio/registrarPuntoDeVenta" enctype="application/x-www-form-urlencodes" class="probootstrap-form">
			<input type="hidden" name="idComercio" value="<?php echo $data; ?>" readonly="">
			<div class="form-group">
                <label for="c_name">Direcciòn</label>
                <div class="form-field">
                  <input required="" type="text" class="form-control" name="direccion">
                </div>
              </div>


			 <div class="form-group">
			  <label for="c_name">Localidad</label>
			  <div class="form-field">
        <i class="icon icon-chevron-down"></i>
				<select name="idLocalidad" class="form-control">
					<option value="0">Seleccione:</option>
						<?php
						  while ($rows = mysqli_fetch_assoc($data2)) {
						  echo "<option name=".$rows['idLocalidad']." value=".$rows['idLocalidad'].">".$rows['descripcionLocalidad'].", ".$rows['descripcionProvincia']."</option>";
						  }
						?>
				</select>
				</div>
			</div>
			
              <div class="form-group">
                <label for="c_name">Teléfono</label>
                <div class="form-field">
                  <input required="" type="number" class="form-control" name="telefono">
                </div>
              </div>

              <div class="form-group">
                <input type="submit" value="Registrar" class="btn btn-primary btn-lg btn-block">
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