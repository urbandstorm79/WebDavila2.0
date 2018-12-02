<?php
require 'php/conexion.php';

$editar = $conn->prepare('UPDATE pedidos SET Producto=:producto, Material=:material, Alto=:alto, Largo=:largo, Ancho=:ancho, Cantidad=:cantidad WHERE IdPedido = :id');
$editar->bindParam(':producto', $_POST['producto']);
$editar->bindParam(':material', $_POST['material']);
$editar->bindParam(':alto', $_POST['alto']);
$editar->bindParam(':largo', $_POST['largo']);
$editar->bindParam(':ancho', $_POST['ancho']);
$editar->bindParam(':cantidad', $_POST['cantidad']);
$editar->bindParam(':id', $_POST['id']);

if ( $editar->execute()) {
   header('Location: pedidos.php');
   echo 'todo bien';
}else{
    echo 'Todo mal';
}
