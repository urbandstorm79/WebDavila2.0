<?php
include 'conexion.php';

$user = $_POST["user"];
$pass = $_POST["pass"];

$consulta = "SELECT Usuario,Pass FROM usuarios WHERE usuarios.Usuario = '$user' AND usuarios.Pass = '$pass'";
$result = mysqli_query($conn, $consulta);
if($result){
    echo '$consulta';
}
else{
    echo' Error ';
}

mysqli_close($conn);