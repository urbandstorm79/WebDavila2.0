<?php
require 'php/conexion.php';
$msj = "";

if (!empty($_POST['userR'])&& !empty($_POST['passR'])&& !empty($_POST['emailR'])
&&!empty($_POST['nameR'])&& !empty($_POST['lastR'])&&!empty($_POST['telR'])){
$query = "INSERT INTO usuarios (Usuario, Pass, Correo, Nombre, Apellido, NomEmpresa, TelPersonal) 
		VALUES (:userR, :passR, :emailR, :nameR, :lastR, :compR, :telR)";
$stmnt = $conn->prepare($query);
$stmnt->bindParam(':userR', $_POST['userR']);
$stmnt->bindParam(':passR', $_POST['passR']);
$stmnt->bindParam(':emailR', $_POST['emailR']);
$stmnt->bindParam(':nameR', $_POST['nameR']);
$stmnt->bindParam(':lastR', $_POST['lastR']);
$stmnt->bindParam(':compR', $_POST['compR']);
$stmnt->bindParam(':telR', $_POST['telR']);

if ($stmnt->execute()){
	$title= 'Usuario creado con exito!!';
	$msj = 'Ahora ya puedes iniciar sesion'; 
	
	
	
}else{
	$title= 'Error';
	$msj = 'Aparecio un error inesperado';	
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Formulario de registro para nuevos usuarios">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de nuevo usuario</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>
<body>
<header class="title">
	<h2><a href="index.php">Carpinteria la Parota</a></h2>
</header>



	<div class="flex">
		<form method="POST" action="registro.php" class="card ">
			<h2>Registro de usuario</h2> 
			
			<input name="userR" type="text" placeholder="*Usuario" class="w50" required>
			<input name="passR" type="password" placeholder="*Contraseña" class="w50" required>
			<input name="emailR" type="email"  placeholder="*Correo electrónico" class="w100" required>
			<input name="nameR" type="text" placeholder="*Nombre" class="w50" required>
			<input name="lastR" type="text" placeholder="*Apellido" class="w50" required>
			<input name="compR" type="text" placeholder="Nombre de la empresa" class="w50">
			<input name="telR" type="tel" placeholder="*Telefono personal" class="w50" required>
			
			<button class="btn btn-principal" type="submit">Registrar</button>
			<p> Si ya posees un cuenta, incia sesion <a href="login.php">aqui</a></p>
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