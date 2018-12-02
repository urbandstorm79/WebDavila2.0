<?php 
session_start();
require 'php/conexion.php';
$msj="";


if (isset($_SESSION['user-id'])) {
    $stmnt= $conn->prepare("SELECT Usuario, Pass, Correo, Nombre, Apellido,NomEmpresa, TelPersonal FROM usuarios WHERE Usuario=:user");
    $stmnt->bindParam(':user', $_SESSION['user-id']);
    $resultado= $stmnt->execute();
    $updtuser= $stmnt->fetch(PDO::FETCH_ASSOC);
    
    $updtd=null;
    if(count($updtuser)>0){
        $updtd= $updtuser;
        
    }

    


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil de usuario</title>
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
		<form method="POST" action="php/editUsr.php" class="card ">
			<h2>Datos del usuario</h2> 
			
			<input name="userR" type="text" placeholder="*Usuario" class="w50" readonly value="<?=$updtd['Usuario']?>">
			<input name="passR" type="password" placeholder="*Contraseña" class="w50" required value="<?=$updtd['Pass']?>">
			<input name="emailR" type="email"  placeholder="*Correo electrónico" class="w100" required value="<?=$updtd['Correo']?>">
			<input name="nameR" type="text" placeholder="*Nombre" class="w50" required value="<?=$updtd['Nombre']?>">
			<input name="lastR" type="text" placeholder="*Apellido" class="w50" required value="<?=$updtd['Apellido']?>">
			<input name="compR" type="text" placeholder="Nombre de la empresa" class="w50" value="<?=$updtd['NomEmpresa']?>">
			<input name="telR" type="tel" placeholder="*Telefono personal" class="w50" required value="<?=$updtd['TelPersonal']?>">
			
			<button class="btn btn-principal" type="submit">Guardar cambios</button>
			<p> </p>
		</form>

			
    </div>
    
</body>
</html>