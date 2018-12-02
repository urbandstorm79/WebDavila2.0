<?php
session_start();

require 'php/conexion.php';

if(isset($_SESSION['user-id'])){
	
	$consulta = $conn->prepare('SELECT Usuario, Pass, Correo FROM usuarios WHERE Usuario = :usuario');
	$consulta->bindParam(':usuario',$_SESSION['user-id']);
	$consulta->execute();
	$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if(count($resultado)>0){
		$user = $resultado;
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Esta es la version 2 de la pagina web">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carpinteria la parota</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>

<body>
	<!-- Menu nav -->

	<?php require 'partials/menu-nav.php' ?>

	<!-- Container -->

	<div class="contenedor">
		<div class="slider">
		<h2>Carpinteria la parota</h2>
			<ul>
				<li><img src="img/banco2-min.jpg" alt="Banco sencillo"></li>
				<li><img src="img/base-de-cama-individual-madera-sencilla.jpg" alt="Cama con cajonera"></li>
				<li><img src="img/ropero.jpg" alt="Ropero de pino"></li>
				<li><img src="img/mesa.jpg" alt="Mesa de cocina"></li>
			</ul>
		</div>

		<div class="productos">
			<h2>Lo nuevo de este mes</h2>
			<div class="box">
				<img src="img/ropero.jpg" alt="Imegen 1">
				<a href="productos.php#mod7" class="btn btn-blue btn-center">Ver mas</a>
			</div>
			<div class="box">
				<img src="img/mesa.jpg" alt="Imagen 2">
				<a href="productos.php#mod8" class="btn btn-blue btn-center">Ver mas</a>
			</div>
			<div class="box">
				<img src="img/banco2-min.jpg" alt="Imagen 3">
				<a href="productos.php#mod6" class="btn btn-blue btn-center">Ver mas</a>
			</div>
		</div>
	</div>

	<footer class="footer">
		<div id="contacto">
			<h4>Donde Encontrarnos</h4>
			<p class="">Pedro Maria Anaya #26</p>
			<p>Ayutla Jalisco, Mexico</p>
			<p>C.P. 48050</p>
		</div>
		<div id="tel">
			<h4>Telefono</h4>
			<p>Casa: 316 3720523</p>
			<p>Celular: 317 1040706</p>
		</div>
		<div id="social">
			<h4>Redes Sociales</h4>
			<a href="https://www.facebook.com/urbano.gonzalezpatino" class="icon"><i class="fab fa-facebook-square"></i></a>
			<a  href="https://twitter.com/" class="icon"><i class="fab fa-twitter-square"></i></a>
			
		</div>

	</footer>

	<!-- scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	 crossorigin="anonymous">

	</script>
	<script>
		$(document).ready(function () {
			$('.menu-btn').click(function () {
				$('ul').toggleClass('show toggle');
				//$('.nav-ul, .login').toggleClass('');
				//$('.fas, fa-bars').toggleClass('animated fadeOut');


			})
		})
	</script>

</body>

</html>