<?php
  if (!isset($_SESSION["login"])) {
      header("location:/login");
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../application/resources/css/login.css">
    <script src="../application/resources/js/bootstrap.min.js"></script>
    <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div id="fullscreen_bg" class="fullscreen_bg">
    <div class="container">
        <form class="form-signin" method="POST" action="../menu/nuevo" enctype="multipart/form-data">
            <h1 class="form-signin-heading text-muted">Ingresar nuevo menu</h1>
            <div class="form-group mb-2">
                <input type="text" name="descripcion" placeholder="Ingrese Descripcion" class="form-control">
            </div>
            <div class="form-group mb-2">
                <input type="text" name="precio" placeholder="Ingrese Precio" class="form-control">
            </div>
            <div class="form-group mb-2">
                <input type="file" name="file" placeholder="Cargue la imagen del menú" class="form-control">
            </div>
            <div class="form-group mb-2">
                <input type="hidden" name="idPuntoDeVenta" value=<?php echo "$data"; ?>  class="form-control">
            </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Cargar
            </button>
        </form>
    </div>
</div>
</body>
</html>