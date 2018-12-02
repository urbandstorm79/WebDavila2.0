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
    
    $print = $conn->prepare('SELECT IdPedido, Producto, Material, Alto, Largo, Ancho, Cantidad FROM pedidos 
    WHERE usuarios_Usuario= :user');
    $print->bindParam(':user', $_SESSION['user-id']);
    
    if ($print->execute()){
        $valor = 'todo bien';
    }
    
};

function update()
{
    if(!empty($_POST['alto'])&& !empty($_POST['largo']) && !empty($_POST['ancho'])
&& !empty($_POST['cantidad']) ){
	$query = "UPDATE pedidos 
    SET Producto=:producto, Material=:material, Alto=:alto, Largo=:largo, Ancho=:ancho, Cantidad=:cantidad
	WHERE IdPedidos = $id";
	$insertar = $conn->prepare($query);
	$insertar->bindParam(':producto', $_POST['producto']);
	$insertar->bindParam(':material', $_POST['material']);
	$insertar->bindParam(':alto', $_POST['alto']);
	$insertar->bindParam(':largo', $_POST['largo']);
	$insertar->bindParam(':ancho', $_POST['ancho']);
	$insertar->bindParam(':cantidad', $_POST['cantidad']);
	//$insertar->bindParam(':idPedido', $_SESSION['pedido-id']);

	if($insertar->execute()){
		$ttl= 'Exito!!';
		$msj = 'Tu pedido se ha guardado';
		echo 'todo up';
	}else{
		$ttl='Error';
		$msj ='Algo ocurrio al guardar';
		echo 'todo mal';
	}

}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
	<link rel="shortcut icon" href="IMG/tree.png" type=”image/x-icon”  />
</head>
<body>

    <!-- Menu nav -->
	<?php require 'partials/menu-nav.php' ?>


<div class="contenedor">
    <h1>Historial de pedidos</h1>

    <?php if($valor!=null){?>
    <Table class="table">
    <thead>
	<th>No</th>
    <th>Producto</th>
    <th>Material</th>
    <th>Alto</th>
    <th>Largo</th>
    <th>Ancho</th>
    <th>Cantidad</th>
    </thead>
    <Tbody>
    <?php while ($mostrar= $print->fetch()): ?>
    <tr>
	<td id=""><?=$mostrar['IdPedido']?></td>
    <td> <?=$mostrar['Producto']?> </td>
    <td><?=$mostrar['Material'] ?></td>
    <td><?=$mostrar['Alto'] ?></td>
    <td><?=$mostrar['Largo'] ?></td>
    <td><?=$mostrar['Ancho'] ?></td>
    <td><?=$mostrar['Cantidad'] ?></td>
    <?php echo "<td><a class='btn btn-left btn-blue' href='editar.php?no=".$mostrar['IdPedido']."'>Editar</a></td>"; ?>
	<?php echo "<td><a class='btn btn-left btn-red' href='delete.php?no=".$mostrar['IdPedido']."'>Borrar</a></td>" ;?>
    </tr>
<?php endwhile;?>
    </Tbody>
    </Table>
    <?php } ?>


<?php  ?>


</div>


	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	 crossorigin="anonymous">

	</script>

	<script>
		$(document).ready(function () {
			$('.menu-btn').click(function () {
				$('ul').toggleClass('show');

			})
            $('.btn-principal').click(function () {
				$('.modal').toggleClass('hide');
			
			})
            
		})
	
	</script>
    
</body>
</html>