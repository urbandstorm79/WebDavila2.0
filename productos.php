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
	<meta name="description" content="Imegenes de nuestros mas recientes trabajos">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Productos</title>

	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>
<body>
<!-- Menu nav -->
	<?php require 'partials/menu-nav.php' ?>

<br><br>
	<div class="galeria">
		<div class="">
			<h1>Nuestros trabajos</h1>
			
		</div>
		
		<li><a href="#mod1"><img src="img/trasteroAzul.jpg" alt="Alacena de parota"></a></li>
		<li><a href="#mod2"><img src="img/base-de-cama-individual-madera-sencilla.jpg" alt="Base de cama individual"></a></li>
		<li><a href="#mod3"><img src="img/beseSencilla2.jpg" alt="Base de cama sencilla"></a></li>
		<li><a href="#mod4"><img src="img/cama1.jpg" alt="Cama matrimonial"></a></li>
		<li><a href="#mod5"><img src="img/mesapequena.jpg" alt="Mesa de te"></a></li>
		<li><a href="#mod6"><img src="img/banco2-min.jpg" alt="Banco pequeno"></a></li>
		<li><a href="#mod7"><img src="img/ropero.jpg" alt="Roero pequeño"></a></li>
		<li><a href="#mod8"><img src="img/mesa.jpg" alt="Mesa robusta para comedor"></a></li>
	
	</div>

	<!--Modals--->
	<div class="modal-img" id="mod1">
		<h3>Trastero Azul</h3>
		<a href="#" class="close"> <i class="fas fa-times" aria-hidden="true"></i></a>
		<div class="imagen">
			
			<a href="#mod6"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
			<a href="#mod2"><img class="" src="img/trasteroAzul.jpg" alt="Trastero de color Azul"></a>
			<a href="#mod2"><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
		</div>
		
	</div>

	<div class="modal-img" id="mod2">
		<h3>Base de cama</h3>
		<a href="#" class="close"><i class="fas fa-times"></i></a>
		<div class="imagen">
			<a href="#mod1"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
			<a href="#mod3"><img src="img/base-de-cama-individual-madera-sencilla.jpg" alt="Base de cama individual"></a>
			<a href="#mod3"><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	</div>
	<div class="modal-img" id="mod3">
		<h3>Base de cama sencilla</h3>
		<a href="#" class="close"><i class="fas fa-times"></i></a>
		<div class="imagen">
			<a href="#mod2"><i class="fas fa-chevron-left"></i></a>
			<a href="#mod4"><img src="img/beseSencilla2.jpg" alt="Cama matrimonial"></a>
			<a href="#mod4"><i class="fas fa-chevron-right"></i></a>
		</div>
	</div>
	<div class="modal-img" id="mod4">
		<h3>Mesa pequeña</h3>
			<a href="#" class="close"><i class="fas fa-times"></i></a>
		<div class="imagen">
			<a href="#mod3"><i class="fas fa-chevron-left"></i></a>
			<a href="#mod5"><img src="img/cama1.jpg" alt="Base de cama pintada"></a>
			<a href="#mod5"><i class="fas fa-chevron-right"></i></a>
		</div>
	</div>
	<div class="modal-img" id="mod5">
		<h3>Mesa de te</h3>
		<a href="#" class="close"><i class="fas fa-times"></i></a>
		<div class="imagen">
			<a href="#mod4"><i class="fas fa-chevron-left"></i></a>
			<a href="#mod6"><img src="img/mesapequena.jpg" alt="Meas de Te"></a>
			<a href="#mod6"><i class="fas fa-chevron-right"></i></a>
		</div>
	</div>
	<div class="modal-img" id="mod6">
		<h3>Banco sencillo</h3>	
		<a href="#" class="close"><i class="fas fa-times"></i></a>
		<div class="imagen">
			<a href="#mod5"><i class="fas fa-chevron-left"></i></a>
			<a href="#mod7"><img src="img/banco2-min.jpg" alt="Banco sencillo"></a>
			<a href="#mod7"><div class="fas fa-chevron-right"></div></a>
		</div>	
	</div>
	<div class="modal-img" id="mod7">
		<h3>Trastero Azul</h3>
		<a href="#" class="close"> <i class="fas fa-times" aria-hidden="true"></i></a>
		<div class="imagen">
			
			<a href="#mod6"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
			<a href="#mod8"><img class="" src="img/ropero.jpg" alt="Trastero de color Azul"></a>
			<a href="#mod8"><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
		</div>
		
	</div>
	<div class="modal-img" id="mod8">
		<h3>Trastero Azul</h3>
		<a href="#" class="close"> <i class="fas fa-times" aria-hidden="true"></i></a>
		<div class="imagen">
			
			<a href="#mod7"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
			<a href="#mod1"><img class="" src="img/mesa.jpg" alt="Trastero de color Azul"></a>
			<a href="#mod1"><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
		</div>
		
	</div>


	<div class="modal-img"></div>

	<!-- Scripts -->
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
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