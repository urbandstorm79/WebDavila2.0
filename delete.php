<?php
require 'php/conexion.php';
$borrar = $conn->prepare('DELETE From pedidos WHERE IdPedido = :id');
$borrar->bindParam(':id', $_GET['no']);
if ($borrar->execute()) {
    header('Location: pedidos.php');
    echo 'todo bien';
}else{
    echo 'todo mal';
}

