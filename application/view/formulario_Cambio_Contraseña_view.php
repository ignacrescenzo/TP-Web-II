<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambio Contraseña</title>
    <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../application/resources/css/login.css">
    <script src="../application/resources/js/bootstrap.min.js"></script>
    <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
</head>
<body>

<div id="fullscreen_bg" class="fullscreen_bg">
        <div class="container">
            <form class="form-signin" method="POST" action="login/validarContrasena" enctype="application/x-www-form-urlencodes">
                <h1 class="form-signin-heading text-muted">Inserte Nueva contraseña</h1>
                <input type="password" class="form-control" placeholder="Contraseña" name="clave1" required="" autofocus="">
                <input type="password" class="form-control" placeholder="Repita Contraseña" name="clave2" required="">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Cambiar
                </button> 
            </form>
            
        </div>
    </div>

</body>
</html>