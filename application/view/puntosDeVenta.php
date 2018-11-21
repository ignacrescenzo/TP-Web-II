<?php
  if(!isset($_SESSION["login"])){
    echo "INISIA SESION WACHO";
        echo "<br>";
        echo "<a href='/login'>Iniciar sesion</a>";
        exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restó | Inicio</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">

    <!-- <link rel="stylesheet" href="../application/resources/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../application/resources/css/styles-merged.css">
    <link rel="stylesheet" href="../application/resources/css/style.min.css">

    <!-- <script src="../application/resources/js/jquery-3.3.1.min.js"></script>
    <script src="../application/resources/js/bootstrap.min.js"></script> -->
    <script src="../application/resources/js/scripts.min.js">
    </script>
    <script src="../application/resources/js/custom.min.js">
    </script>


    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/" title="uiCookies:FineOak">FineOak</a>
            </div>
            <?php
            $idComercio=$data2;
            ?>
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-nav-section="welcome">Inicio</a></li>
                    <li><a style="cursor:pointer" onclick="location.href=<?php echo "'/OperadorComercio/crearPuntoDeVenta?idComercio=".$idComercio."'" ?>">Crear
                            punto de venta</a></li>
                    <li><a style="cursor:pointer" onclick="location.href=<?php echo "'/OperadorComercio/estadisticas?idComercio=".$idComercio."'" ?>">Estadisticas</a></li>
                    <li><a style="cursor:pointer" onclick="location.href='/login/cerrarsesion'">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>

    <section class="probootstrap-section-bg overlay" style="background-image: url(/application/resources/upload/<?php echo $data3; ?>); height: 300px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h3 class="secondary-heading" style="color: black; font-size: 30px;">Selecciona un punto de
                            venta para gestionar!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form class="form-signin  w-25" enctype="multipart/form-data" method="POST" action="/operadorComercio/cambiarBanner?v=<?php echo $data2; ?>">
        <div class="form-group mb-2 text-center">
            <div class="form-group mb-2">
                <input type="file" name="file" placeholder="Cargue la imagen" class="form-control" value="">
            </div>
            <button class="btn btn btn-primary mx-auto" type="submit">
                Cargar banner
            </button>
        </div>
    </form>
    <section class="probootstrap-section">
        <div class="container">
            <div class="row">
                <?php 
            while($rows=mysqli_fetch_assoc($data)){ 
                    
                    echo "
                    <div class='col-md-4 col-sm-4 probootstrap-animate'>
                        <div class='probootstrap-block-image'>
                            <div class='text'>
                                <h3>Sucursal: ".$rows['direccion'].",".$rows['descripcionLocalidad']."</h3>
                                <p>Teléfono: ".$rows['telefono']."</p>                         
                                <p>
                                    ***descripción del punto de venta***
                                </p>
                                <a href='/puntoDeVenta/index?c=".$rows['idPuntoDeVenta']."&v=".$data2."' class='probootstrap-custom-link link-sm'> Entrar </a>

                                <a href='/OperadorComercio/eliminarPuntoDeVenta?c=".$rows['idPuntoDeVenta']."&v=".$data2."' class='probootstrap-custom-link link-sm'> Eliminar </a>
                               
                                <a href='/OperadorComercio/modificarPuntoDeVenta?c=".$rows['idPuntoDeVenta']."&v=".$data2."' class='probootstrap-custom-link link-sm'> Modificar </a>
                            </div>
                        </div>
                    </div>";
                }
			    ?>
            </div>
        </div>
    </section>

</body>
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
                            <a href="/operadorComercio/registrarComercio"> Quiero registrar mi Comercio</a>
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

</body>

</html>