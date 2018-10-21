<?php
if (!isset($_SESSION)) { session_start(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Menu</title>
    <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../application/resources/css/login.css">
    <script src="../application/resources/js/bootstrap.min.js"></script>
    <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
</head>
<body>

    <div id="fullscreen_bg" class="fullscreen_bg">
        <div class="container">
            <form class="form-signin" method="POST" action="../menu/modificar">
                <h1 class="form-signin-heading text-muted">Cambiar datos del Menu</h1>
                <div class="form-group mb-2">
                    <input type="text" name="descripcion" placeholder="Ingrese Descripcion" class="form-control" value="<?php echo $data['descripcion']; ?>" >
                </div>
                <div class="form-group mb-2">
                      <div class="form-group mb-2">
                    <input type="text" name="foto" placeholder="Ingrese URL de foto" class="form-control" value="<?php echo $data['foto']; ?>" >
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="precio" placeholder="Ingrese Precio" class="form-control" value="<?php echo $data['monto']; ?>" >
                </div>
                <input type="hidden" name="idMenu"  class="form-control" value="<?php echo $data['idMenu']; ?>" >
                </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" >
                    Modificar
                </button>

            </form>
        </div>
    </div>
</body>
</html>