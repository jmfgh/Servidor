<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="assets/css/styles.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="index.php">
						Tienda de camisetas
					</a>
				</div>
			</header>

			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="#">Inicio</a>
					</li>
					<li>
						<a href="#">Categoria 1</a>
					</li>
					<li>
						<a href="#">Categoria 2</a>
					</li>
					<li>
						<a href="#">Categoria 3</a>
					</li>
					<li>
						<a href="#">Categoria 4</a>
					</li>
					<li>
						<a href="#">Categoria 5</a>
					</li>
				</ul>
			</nav>

			<div id="content">

				<!-- BARRA LATERAL -->
				<aside id="lateral">

					<div id="login" class="block_aside">
						<h3>Entrar a la web</h3>
						<form action="#" method="post">
							<label for="email">Email</label>
							<input type="email" name="email" />
							<label for="password">Contraseña</label>
							<input type="password" name="password" />
							<input type="submit" value="Enviar" />
						</form>
						
						<ul>
							<li><a href="#">Mis pedidos</a></li>
							<li><a href="#">Gestionar pedidos</a></li>
							<li><a href="#">Gestionar categorias</a></li>
						</ul>
					</div>

				</aside>

				<!-- CONTENIDO CENTRAL -->
				<div id="central">
					<h1>Productos destacados</h1>
					
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

				</div>
			</div>

			<!-- PIE DE PÁGINA -->
			<footer id="footer">
				<p>Desarrollado por Víctor Robles WEB &copy; <?= date('Y') ?></p>
			</footer>
		</div>
	</body>
</html>