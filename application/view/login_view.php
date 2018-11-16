<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Iniciar Sesión</title>
    
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


    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>


</body>
</html>