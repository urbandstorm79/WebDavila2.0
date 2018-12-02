<?php
$serverName = "localhost";
$username = "root";
$pass = "";
$bd = "parotabd";

//Conectar


try{
    $conn =  new PDO("mysql:host=$serverName;dbname=$bd;",$username, $pass);

} catch(PDOException $e){
    die('Conennected failed'.$e->getMessage());
}
