<?php
  require './config/db.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script>
    		//Inicializa el objeto Ajax
    		function Ajaxobj(){
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {  // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				return xmlhttp;
    		}
    		//Se Solicita la lista de productos, y se reemplaza en el DIV correspondiente.
            function ListarProduc(int) {
            	xmlhttp = Ajaxobj();
				xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
				  	document.getElementById("D1").innerHTML=this.responseText;
					}
				}
				xmlhttp.open("GET","listarprod1.php?id_pd="+int,true);
				xmlhttp.send();
            }
            //Se Solicita las Caracteristicas del producto, y se reemplaza en el DIV correspondiente.
            function Detalle(int){
            	xmlhttp = Ajaxobj();
            	xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
				  	document.getElementById("D1").innerHTML=this.responseText;
					}
				}
				xmlhttp.open("GET","producto.php?id_img="+int,true);
				xmlhttp.send();
    		}
    </script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Vende Todo</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
			<br>
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
							<a href="index.php" class="navbar-brand">Vende Todo</a>
						</div>

						<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
										Categorias <span class="caret"></span>
									</a>
									<!-- Llama al codigo que visualiza los registros de la tabla Categoria -->
									<?php
										include('categorias1.php');
									?>
								</li>

                            <?php
                            if (empty($_SESSION['Usuario']))  //Si el usuario no esta logeado, muestra el login.
                            {
                             echo ("
							<form class=\"navbar-form navbar-right\" method=\"post\" action=\"index.php\" role=\"search\">
  								<div class=\"form-group\">
   									 <input name=\"email\" type=\"text\" class=\"form-control\" placeholder=\"Correo\">
   									 <input name=\"password\" type=\"password\" class=\"form-contro0l\" placeholder=\"Contraseña\">
  								</div>
  								<button type=\"submit\" class=\"btn btn-default\">entrar</button>
							</form>");
                            }
                            else // Si esta logeado. en vez de mostrar el login. Muestra los favoritos , "Mi cuenta" y El Nombre del Usuario.
                            {
                                echo ("<li><a href=\"\">Favoritos</a></li>
								<li><a href=\"\">Mi cuenta</a></li>
                                <li><a href=\"./logout.php\">".$_SESSION['Usuario']."</a></li>"
                                     );
                            }
                            ?>

						</ul>

						</div>
					</div>
				</nav>
			</header>
	</div>
	<?php
        if(!empty($_GET['id_pd']))
        {
            $id_img = $_GET['id_pd'];
            include('conex1.php');
		$consulta = "select i.url,p.nombre from producto p inner join imagen_producto i on(p.id=i.id_producto) where i.id_producto=".intval($id_img);
		//se guardan los registros obtenidos:
		$respuesta = mysqli_query($link,$consulta);
		//en caso de error con las tablas, se Genera Error:
		if(!$respuesta){
			echo "Error!!".mysqli_error($link);
		}
		//Encaso de que no retorne registros:
		if(mysqli_num_rows($respuesta) == 0){
			echo "no hay resultado";
			exit;
		}
		//Seccion que se visualiza en index.php, esta desordenado. La proxima vez sera mas comodo para la vista.
		$row = mysqli_fetch_array($respuesta);
		echo "<div class='container'>";
		echo "<div class='row'>";
		echo "<div class='col-md-4'>";
		//
		//linea 44: se visualiza el nombre del producto.
		//
		echo "<h2>".$row[1]."</h2>";
		//
		//linea 48: se visualiza la imagen del producto.
		//
		echo "<img src='".$row[0]."' class='img-rounded' height='315' width='400'>";
		echo "</div>";
		//
		//Cosas para rellenar, seran modificadas a su debido tiempo.
		//
		echo "<div class='col-md-4'>";
		echo "<h3>Caracteristicas</h3>";
		echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
		echo "<button type='button' class='btn btn-success'>Comprar Ahora</button>";
		echo "</div>";
		echo "<div class='col-md-4'>";
		echo "<h3>Recomendaciones</h3>";
		echo "</div>";
		echo "</div>";
		echo "<div class='row'>";
		echo "<div class='col-md-4'>";
		echo "<table class='table'>";
		echo "<tr>
				<th>Precio</th>
				<th>Transaccion</th>
				<th>Codigo</th>
			</tr>";
		echo "<tr>
				<th>$69.000</th>
				<th>venta/permuta</th>
				<th>123456789</th>
			</tr>";
		echo "</table>";
		echo "</div>";
		echo "<div class='clearfix visible-lg-block'></div>";
		echo "</div>";
		echo "</div>";
        }
		else
        {
            echo "<h1>Falta id del producto para hacer la busqueda.</h1>";
        }

	?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
