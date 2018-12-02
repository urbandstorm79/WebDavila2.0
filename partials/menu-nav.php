<nav>
		<div class="menu-btn"><i class="fas fa-bars"></i></div>
		<ul class="nav-ul">
			<li><a href="index.php">Home</a></li>
			<li><a href="productos.php">Productos</a></li>
			<li><a href="cotizacion.php">Cotizacion</a></li>
			<li><a href="acercaDe.php">Acerca de</a></li>

		</ul>
		<ul class="login">
		<?php if(!empty($user)): ?>
		<li class=""> <a href="#"> <?= $user['Usuario'] ?> <i class="fas fa-angle-down"></i> </a></li>
		<ul class="item">
		<a href="pedidos.php">Pedidos</a>
		<a href="conf.php">Datos de Usuario</a>
		<a class="" href="cerrarSesion.php">Cerrar Sesion</a>
		</ul>
<?php else: ?>
			<li><a href="login.php">Iniciar Sesion</a></li>
<?php endif; ?>
		</ul>
	</nav>