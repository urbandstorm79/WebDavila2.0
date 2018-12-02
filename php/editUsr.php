<?php
session_start();
require 'conexion.php';
$msj="";

if (isset($_SESSION['user-id'])) {
    $editarUs = $conn->prepare("UPDATE usuarios SET Correo=:correo, Pass=:pass, Nombre=:nom, Apellido=:ape, NomEmpresa=:nomE, TelPersonal=:tel WHERE Usuario=:user");
    $editarUs->bindParam(':user', $_SESSION['user-id']);
    $editarUs->bindParam(':correo', $_POST['emailR']);
    $editarUs->bindParam(':pass', $_POST['passR']);
    $editarUs->bindParam(':nom', $_POST['nameR']);
    $editarUs->bindParam(':ape', $_POST['lastR']);
    $editarUs->bindParam(':nomE', $_POST['compR']);
    $editarUs->bindParam(':tel', $_POST['telR']);
    
    if ( $editarUs->execute()) {
        $title= 'Éxito!!';
    $msj = 'Cambios Guardados'; 
    }else{
        $title= 'Error al guardar';
        $msj = 'Ocurrio un error, intenta mas tarde'; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar datos</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../IMG/tree.png" type=”image/x-icon”  />

</head>
<body>
<?php if(!empty($msj)): ?>
	<div class="modal" id="modA">
		<div class="modal-alert">
			<h2 class="head-modal"><?= $title; ?></h2>
			
			<p class="mensaje"> <?= $msj; ?></p> 
  			
			<button class="btn btn-left"><a href="../conf.php">Cerrar</a></button>
		</div>
			<?php $msj = "";?>
		</div>
		<?php endif; ?>
	</div>
    <script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous">
			
    </script>
    <script>
		$(document).ready(function () {
			$('.btn-left').click(function () {
                //location.reload();
                $('.modal').toggleClass('hide');
                
				
			})
		})
	</script>
</body>
</html>