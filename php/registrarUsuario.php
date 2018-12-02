<?php
include 'conexion.php';

//recibir datos, Metodo POST

$user = $_POST["userR"];
$pass = $_POST["passR"];
$email = $_POST["emailR"];
$name = $_POST["nameR"];
$lastN = $_POST["lastR"];
$company = $_POST["compR"];
$tel = $_POST["telR"];

//Insertar Datos en la BD

$insertar = "INSERT INTO usuarios (Usuario, Pass, Correo, Nombre, Apellido, NomEmpresa, TelPersonal) VALUES ('$user', '$pass', '$email', '$name', '$lastN', '$company', '$tel')";

$query = mysqli_query ($conn, $insertar);
if ($query) {
    echo ' <a>Volver</a>';
} else {
    echo ' error';
}



mysqli_close ($conn);