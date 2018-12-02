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
	<meta name="description" content="Somos una compañia dedicada a la fabricacion de muebles de alta calidad y de forma artesanal">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acerca de nostros</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>
<body>
<!-- Menu nav -->
<?php require 'partials/menu-nav.php' ?>

	<div class="contenedor">
		<h2>Quienes somos??</h2>
		<div class="img">
			<img src="img/RicardoPatino.jpg" alt="Nuestro director y fundador Ricardo Patino" width="300px" height="300px">
		</div>
		<div>
			<p>Carpintería la Parota es una empresa cien por ciento Ayutlense, que se encarga de fabricar una gran cantidad de productos elaborados con la más alta calidad y con las especificaciones del cliente, nuestro catálogo va desde bases y camas, hasta mesas y cortineros, así como otros productos variados. Su dueño y fundador Ricardo Patiño, es un carpintero con más de 30 años de experiencia que se dedica enteramente a su taller cada día con esfuerzo y dedicación.</p>
			<h3>Misión</h3>

			<p>Procesar la madera con los más altos estándares de calidad que nos sean posibles y que la misma experiencia nos permite, con el objetivo de satisfacer las expectativas y las necesidades del cliente, de forma que nuestro producto y nuestro trabajo sean los que nos recomienden.</p>

			<h3>Visión</h3>
			<p>Clientes satisfechos y contentos con nuestros productos, los cuales se desarrollan según los requerimientos que usted mismo nos indica, permitiendo que nuestro trabajo hable por si solo y así poder llegar a lugares cada vez más lejos de nuestra región y estado.</p>

			
		</div>
	</div>

	<footer class="footer">
		<div>
			<h3>Donde encontrarnos</h3>
			<p>Pedro Maria Anaya #26</p>
			<p>Ayutla Jalisco</p>
			<p> C. P. 48050</p>
		</div>
		<div>
			<h3>Telefonos</h3>
			<p>Casa: 316 3720523</p>
			<p>Celular: 317 1040706</p>
		</div>
		<div>
			<h3>Redes Sociales</h3>
			<a href="https://www.facebook.com/urbano.gonzalezpatino" class="icon"><i class="fab fa-facebook-square"></i></a>
			<a  href="https://twitter.com/" class="icon"><i class="fab fa-twitter-square"></i></a>
			
		</div>
	</footer>



	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous">
	</script>
	<script>
		$(document).ready(function () {
			$('.menu-btn').click(function () {
				$('ul').toggleClass('show');
				//$('.nav-ul, .login').toggleClass('');
				//$('.fas, fa-bars').toggleClass('animated fadeOut');
				
				
			})
		})
	</script>

</body>
</html>