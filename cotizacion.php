<?php 
session_start();

require 'php/conexion.php';

if(isset($_SESSION['user-id'])){
$consulta = $conn->prepare('SELECT Usuario, Pass, Correo FROM usuarios WHERE Usuario = :usuario');
$consulta->bindParam(':usuario', $_SESSION['user-id']);
$consulta->execute();
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

$user=null;

if(count($resultado)>0){
	$user = $resultado;
}

if(!empty($_POST['alto'])&& !empty($_POST['largo']) && !empty($_POST['ancho'])
&& !empty($_POST['cantidad']) ){
	$query = "INSERT INTO pedidos (IdPedido, Producto, Material, Alto, Largo, Ancho, Cantidad, usuarios_Usuario)
	VALUES ('', :producto, :material, :alto, :largo, :ancho, :cantidad, :user)";
	$insertar = $conn->prepare($query);
	$insertar->bindParam(':producto', $_POST['producto']);
	$insertar->bindParam(':material', $_POST['material']);
	$insertar->bindParam(':alto', $_POST['alto']);
	$insertar->bindParam(':largo', $_POST['largo']);
	$insertar->bindParam(':ancho', $_POST['ancho']);
	$insertar->bindParam(':cantidad', $_POST['cantidad']);
	$insertar->bindParam(':user', $_SESSION['user-id']);

	if($insertar->execute()){
		$ttl= 'Exito!!';
		$msj = 'Tu pedido se ha guardado';
	}else{
		$ttl='Error';
		$msj ='Algo ocurrio al guardar';
	}

}


}
else{
echo '	
<div class="modal" id="modA">
	<div class="modal-alert">
		<h2 class="head-modal">Importante</h2>
		<p class="mensaje">Inicia sesion, para poder realizar un pedido</p> 
	</div>
		
	</div>
</div>';
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Formulario para cotizacion de pedidos">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Cotizar un pedido</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>

<body>

	<!-- Menu nav -->
	<?php require 'partials/menu-nav.php' ?>

	<div>
		<form action="cotizacion.php" method="POST" class="card">
			<h2>Información del pedido</h2>
			<select class="select w60" name="producto" id="producto">
				<option value="">--Seleccionar producto--</option>
				<option value="Mesa">Mesa</option>
				<option value="Cama">Cama</option>
				<option value="BaseDeCama">Base de Cama</option>
				<option value="Trastero">Trastero</option>
				<option value="Banco">Banco</option>
			</select>
			<select class="select w60" name="material" id="material">
				<option value="">--Seleccionar Material--</option>
				<option value="pino">Pino</option>
				<option value="encino">Encino</option>
				<option value="parota">Parota</option>
				<option value="cedro">Cedro</option>
			</select>
			<p>Las medidas deben darse en centimetros</p>
			<input class="w50" type="number" placeholder="Alto " name="alto">
			<input class="w50" type="number" placeholder="Largo " name="largo">
			<input class="w50" type="number" placeholder="Ancho " name="ancho">
			<input class="w50" type="number" placeholder="Cantidad" name="cantidad">
			<button class="btn btn-principal">Hacer pedido</button>
		</form>
	</div>

</body>

	<?php if(!empty($msj)): ?>
	<div class="modal" id="modA">
		<div class="modal-alert">
			<h2 class="head-modal"><?= $ttl; ?></h2>
			
			<p class="mensaje"> <?= $msj; ?></p> 
  			
			<button class="btn btn-left"><a href="#">Cerrar</a></button>
		</div>
			
		</div>
		<?php endif; ?>
	</div>

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
		$('.btn-left').click(function () {
				$('.modal').toggleClass('hide');
				//$('.nav-ul, .login').toggleClass('');
				//$('.fas, fa-bars').toggleClass('animated fadeOut');
				
				
			})
	})
</script>

</html>