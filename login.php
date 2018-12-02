<?php

session_start();

if(isset($_SESSION['user_id'])){
	header('Location: index.php');

}
require 'php/conexion.php';

if(!empty($_POST['user'])&& !empty($_POST['pass'])){
	$consulta = $conn->prepare('SELECT Usuario,Pass,Correo FROM usuarios WHERE Usuario = :userB '); /*AND Pass = :passwrd'*/
	$consulta->bindParam(':userB', $_POST['user']);
	// $consulta->bindParam(':passwrd', $_POST['pass']);
	$consulta->execute();
	$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

	$msj='';

	if(count($resultado)>0 && $_POST['pass']==$resultado['Pass']){
		$_SESSION['user-id']= $resultado['Usuario'];
		echo 'Sesion creada';

		header('Location: index.php');
	}else{
		$title= 'Error';
		$msj = 'Los datos no coinciden';
	}
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Iniciar sesión para hacer pedidos">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Inicio de sesion</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>
<body>
<header class="title"><h2><a href="index.php">Carpinteria la Parota</a></h2></header>
	<div class="flex">
		<form action="login.php" method="POST" class="card">
			<h2>Inicio de sesión</h2>
			<input name="user" type="text" placeholder="Correo Electrónico o Usuario" class="w100" required>
			<input name="pass" type="password" placeholder="Contraseña" class="w100" required>
			<button class="btn btn-principal" type="submit">Ingresar</button>
			<p>Si un no posees una cuenta te puedes registrar <a href="registro.php">aqui</a></p>
		</form>
	</div>


		<?php if(!empty($msj)): ?>
	<div class="modal" id="modA">
		<div class="modal-alert">
			<h2 class="head-modal"><?= $title; ?></h2>
			
			<p class="mensaje"> <?= $msj; ?></p> 
  			
			<button class="btn btn-left"><a href="#">Cerrar</a></button>
		</div>
			
		</div>
		<?php endif; ?>
	</div>

			  

			  	<!-- scripts -->
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous">
			
	</script>
	<script>
		$(document).ready(function () {
			$('.btn-left').click(function () {
				$('.modal').toggleClass('hide');
				//$('.nav-ul, .login').toggleClass('');
				//$('.fas, fa-bars').toggleClass('animated fadeOut');
				
				
			})
		})
	</script>
	
</body>
</html>