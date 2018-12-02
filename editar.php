<?php
session_start();
require 'php/conexion.php';
if (isset($_SESSION['user-id'])) {
   $consultarPedido = $conn->prepare('SELECT IdPedido, Producto, Material, Alto, Largo, Ancho, Cantidad FROM pedidos WHERE IdPedido = :idpedido');
   $consultarPedido->bindParam(':idpedido', $_GET['no']);
   $consultarPedido->execute();
   $resultado= $consultarPedido->fetch(PDO::FETCH_ASSOC);
   $pedidos =null;
   if(count($resultado)>0){
	$pedidos = $resultado;
   }


// if (!empty($_POST['alto'])&& !empty($_POST['largo']) && !empty($_POST['ancho'])
// && !empty($_POST['cantidad'])){
// $editar = $conn->prepare('UPDATE pedidos SET Producto=:producto, Material=:material, Alto=:alto, Largo=:largo, Ancho=:ancho, Cantidad=:cantidad WHERE IdPedidos = :id');
// $editar->bindParam(':producto', $_POST['producto']);
// $editar->bindParam(':material', $_POST['material']);
// $editar->bindParam(':alto', $_POST['alto']);
// $editar->bindParam(':largo', $_POST['largo']);
// $editar->bindParam(':ancho', $_POST['ancho']);
// $editar->bindParam(':cantidad', $_POST['cantidad']);
// $editar->bindParam(':id', $_GET['no']);

// if ( $editar->execute()) {
//    header('Location: ../pedidos.php');
//    echo 'todo bien';
// }

// }

}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar pedido</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >

</head>
<body>
<!-- <header class="title"><h2><a href="index.php">Carpinteria la Parota</a></h2></header> -->

	<div>
		<form action="update.php" method="POST" class="card">
			<h2>Editar pedido</h2>
			<label for="id">Numero de pedido</label>
			<input type="text" value="<?=$pedidos['IdPedido'] ?>" name="id" readonly> 
			<select class="select w60" name="producto" id="producto">
				<option value="<?=$pedidos['Producto']?>"><?=$pedidos['Producto']?></option>
				<option value="Mesa">Mesa</option>
				<option value="Cama">Cama</option>
				<option value="BaseDeCama">Base de Cama</option>
				<option value="Trastero">Trastero</option>
				<option value="Banco">Banco</option>
			</select>
			<select class="select w60" name="material" id="material">
				<option value="<?=$pedidos['Material']?>"><?=$pedidos['Material']?></option>
				<option value="pino">Pino</option>
				<option value="encino">Encino</option>
				<option value="parota">Parota</option>
				<option value="cedro">Cedro</option>
			</select>
			<p>Las medidas deben darse en centimetros</p>
			<input class="w50" type="number" placeholder="Alto " name="alto" value="<?=$resultado['Alto']?>">
			<input class="w50" type="number" placeholder="Largo " name="largo" value="<?=$pedidos['Largo']?>">
			<input class="w50" type="number" placeholder="Ancho " name="ancho" value="<?=$pedidos['Ancho']?>">
			<input class="w50" type="number" placeholder="Cantidad" name="cantidad" value="<?=$pedidos['Cantidad']?>">
			<button class="btn btn-principal" type="submit">Editar</button>
		</form>
	</div>

    
</body>
</html>