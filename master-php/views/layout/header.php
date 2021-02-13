<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
		<link rel="stylesheet" href="<?=base_url?>vendor/css/bootstrap.min.css">
		<script src="<?=base_url?>vendor/js/jquery-3.5.1.min.js"></script>
    	<script src="<?=base_url?>vendor/js/popper.min.js"></script>
    	<script src="<?=base_url?>vendor/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="<?=base_url?>">
						Tienda de camisetas
					</a>
				</div>
			</header>

			<!-- MENU -->
			<?php $categorias = Utils::showCategorias(); ?>

			<nav class="navbar navbar-expand-lg" id="menu">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#enlaces" aria-controls="enlaces" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">Menú</span>
				</button>
			
				<div class="collapse navbar-collapse" id="enlaces">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url?>">Inicio</a>
					</li>
					<?php while($cat = $categorias->fetch_object()): ?>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
						</li>
					<?php endwhile; ?>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url?>producto/ofertas"><img src="<?=base_url?>assets/img/oferta.png" alt="oferta" class="ofertas"></a>
					</li>
				</ul>
				</div>
			</nav>

			<div id="content">