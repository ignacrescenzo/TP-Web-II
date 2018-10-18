<?php
session_start();
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/login.css">
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div id="fullscreen_bg" class="fullscreen_bg">
    <div class="container">
        <form class="form-signin" method="POST" action="../menu/nuevo" enctype="application/x-www-form-urlencodes">
            <h1 class="form-signin-heading text-muted">Ingresar nuevo menu</h1>
            <input type="text" name="descripcion" placeholder="Ingrese Descripcion">
            <input type="text" name="precio" placeholder="Ingrese Precio">
            <input type="text" name="foto" placeholder="Ingrese URL de foto">
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Ingresar
            </button>
        </form>
    </div>
</div>
</body>
</html>