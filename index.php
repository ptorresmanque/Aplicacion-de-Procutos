<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Vende Todo</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css" >

	<!-- Optional theme -->
	<link rel="stylesheet" href="./assets/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="./assets/js/bootstrap.min.js"></script>

  </head>
  <body>
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="./" class="navbar-brand">Vende Todo</a>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Categorias <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="">Computadores y electronica</a></li>
									<li><a href="">Hogar</a></li>
									<li><a href="">Tiempo libre</a></li>
									<li><a href="">Vehiculos</a></li>
								</ul>
							</li>
							<li><a href="">Favoritos</a></li>
						</ul>
            <?php if(isset($_SESSION['id'])){?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                  <?php echo $_SESSION['nombre'];?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="./perfil.php?id=<?php echo $_SESSION['id'];?>">Mi Perfil</a></li>
                  <li><a href="./opciones.php">Opciones</a></li>
                  <li><a href="./logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
						</ul>
            <?php }else{?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="./login.php" class="text-info"> Iniciar Sesión </a></li>
              <li><a href="./signup.php" class="text-info"> Registraté </a></li>
            </ul>
            <?php }?>
					</div>
				</div>
			</nav>
		</header>
    <div class="container">
    	<div class="row">
    		<div class="col-xs-10 col-xs-offset-1">
    			<div id="carrusel-de-nino" class="carousel slide" data-ride="carousel">
    			  <!-- Indicators -->
    			  <ol class="carousel-indicators">
    				<li data-target="#carrusel-de-nino" data-slide-to="0" class="active"></li>
    				<li data-target="#carrusel-de-nino" data-slide-to="1"></li>
    				<li data-target="#carrusel-de-nino" data-slide-to="2"></li>
    			  </ol>

    			  <!-- Wrapper for slides -->
    			  <div class="carousel-inner" role="listbox">
    				<div class="item active">
    				  <img src="./assets/images/celular.jpg" alt="...">
    				  <div class="carousel-caption">
    					<h3>Celular<h3>
    				  </div>
    				</div>
    				<div class="item">
    				  <img src="./assets/images/guitarra.jpg" alt="...">
    				  <div class="carousel-caption">
    					<h3>Guitarras<h3>
    				  </div>
    				</div>
    				<div class="item">
    				  <img src="./assets/images/vehiculo.jpg" alt="...">
    				  <div class="carousel-caption">
    					<h3>Vehiculos<h3>
    				  </div>
    				</div>
    			  </div>

    			  <!-- Controls -->
    			  <a class="left carousel-control" href="#carrusel-de-nino" role="button" data-slide="prev">
    				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    				<span class="sr-only">Previous</span>
    			  </a>
    			  <a class="right carousel-control" href="#carrusel-de-nino" role="button" data-slide="next">
    				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    				<span class="sr-only">Next</span>
    			  </a>
    			</div>
    		</div>
    	</div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>
