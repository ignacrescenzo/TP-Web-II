<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Cambiar contraseña</title>
    
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

    <section class="probootstrap-section probootstrap-bg-white">
      <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading"><br><br><br><br>
              <h3 class="secondary-heading" style="color: black;">Cambio de contraseña</h3>
            </div>
          </div>
            <form method="POST" action="/login/validarContrasena" enctype="application/x-www-form-urlencodes" class="probootstrap-form">
                <div class="col-md-4 col-md-offset-4">               
                  <div class="form-group">
                 
                  <div class="form-group">
                
                    <div class="form-field">
                      <input type="password" id="name" class="form-control" name="claveNueva" required="" placeholder="Contraseña">
                        <input type="hidden" name="idComercio" value="<?php echo $data2; ?>">
                        <input type="hidden" name="idUsuario" value="<?php echo $data; ?>">
                    </div>
                  </div>
                </div>
            </div>
             
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <input type="submit" name="submit" id="submit" value="Cambiar" class="btn btn-lg btn-primary btn-block">
                </div>
              </div>
              
            </form>
          </div>
        </div>
    </section>
    </section>


    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>


</body>
</html>