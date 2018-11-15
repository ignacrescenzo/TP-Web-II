<?php
if (!isset($_SESSION)) { session_start(); }
?>
<script>
    var monto = <?php echo $data['monto']; ?>;
</script>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ofertar Menu</title>
    <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../application/resources/css/login.css">
    <script src="../application/resources/js/bootstrap.min.js"></script>
    <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
    <script src="../application/resources/js/mostrarPeticionOferta.js"></script>

</head>
<body>

    <div id="fullscreen_bg" class="fullscreen_bg">
        <div class="container">
            <form class="form-signin" enctype="multipart/form-data" method="POST" action="/menu/ofertar">
                <h1 class="form-signin-heading text-muted">Ofertar menu</h1>
                <div class="form-group mb-2">
                    <input type="text" name="descripcion" readonly class="form-control" value="<?php echo $data['descripcion']; ?>" >
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $data['monto']; ?>" >
                </div>
                <input type="hidden" name="idMenu"  class="form-control" value="<?php echo $data['idMenu']; ?>" >
                </div>
                <div>
                <input type="hidden" name="idPuntoDeVenta"  class="form-control" value="<?php echo $data2; ?>" >
                </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" >
                    Ofertar
                    </button>
            </form>
        </div>
    </div>
</body>
</html>