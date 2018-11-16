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
    <script src="../application/resources/js/scripts.min.js"></script>
    <script src="../application/resources/js/custom.min.js"></script>
    

    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-nav-section="welcome">Inicio</a></li>
            <li><a onclick="location.href='/main/listarcomercios'" >Comercios</a></li>
            <li><a onclick="location.href='/cliente/mostrarPedidos">Pedidos</a></li>
            <li><a onclick="location.href='/login/cerrarsesion'" >Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </head>
  <body>

	
<section class="flexslider" data-section="welcome">
      <ul class="slides">
        <li style="background-image: url(../application/resources/img/celular.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Bienvenido</h1>
                  <h3 class="secondary-heading">a RESTÓ</h3>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h5 class="secondary-heading">¿Qué querés comer?</h5>
              <h3>Seleccioná un comercio para comenzar tu pedido!</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="img/hamb7.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">June 29, 2017</span>
                <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="img/hamb5.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">June 29, 2017</span>
                <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="img/hamb4.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">June 29, 2017</span>
                <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <div class="title mt-3">
			<h5>¿Qué querés comer?</h5>
		</div>
		<div class="searchComercio d-flex justify-content-center mt-2">
			<input type="text" class="mr-2">
			<input type="button" value="Buscar">
        </div>
        <div class="tituloComercio text-center mt-5">
            Selecciona un comercio para comenzar con tu pedido!
        </div>
        <div class="row contenido border mt-4">
            <div class="col col-3 filtro">
                Filtrar por: <br> <br>
                <div class="f-flex flex-column zona checkboxes">
                    <div>Zona</div>
                    <div>
                        <input type="checkbox" name="" id="">Zona 1
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Zona 2
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Zona 3
                    </div>
                </div>

                <div class="f-flex flex-column categoria checkboxes mt-5">
                    <div>Categoria</div>
                    <div>
                        <input type="checkbox" name="" id="">Categoria 1
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Categoria 2
                    </div>
                    <div>
                        <input type="checkbox" name="" id="">Categoria 3
                    </div>
                </div>
            </div>
            <div class="col col-9">
            <?php
				while($rows = mysqli_fetch_assoc($data)) { 
                    echo "
                    <div class='row comercio'>
                        <div class='col col-4 img'>
                            IMAGEN
                        </div>
                        <div class='col col-8'>
                            <div class='nombreComercio'>".$rows['nombre']."</div>
                            <div class='descripcion'>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo officiis commodi in, exercitationem hic repudiandae modi aut sit a, placeat, sunt tempore. Vel, possimus hic.
                            </div>
                            <div class='d-flex justify-content-end'>
                                <a href='/puntoDeVenta/mostrarMenu?c=".$rows['idComercio']."'>
                                    <input type='button' value='Ver menú'>
                                </a>
                            </div>
                        </div>
                    </div>";
                }
			    ?>
            </div>
        </div>
        <div class="footer d-flex justify-content-center mt-4 pt-1">
			INFORMACION SOBRE LA EMPRESA, FOOTER LINKS ETC...
		</div>
	</div>
</body>
</html>