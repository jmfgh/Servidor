<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>

<?php if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete'): ?>
	<strong class="alert_green">La categoria se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete'): ?>	
	<strong class="alert_red">La categoria NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>
	
<?php if(isset($_SESSION['CatDelete']) && $_SESSION['CatDelete'] == 'complete'): ?>
	<strong class="alert_green">La categoria se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['CatDelete']) && $_SESSION['CatDelete'] != 'complete'): ?>	
	<strong class="alert_red">La categoria NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('CatDelete'); ?>

<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>TOTAL VENDIDO</th>
		<th>VALOR EN ALMACEN</th>
		<th>ACCIONES</th>
	</tr>
	<?php while($cat = $categorias->fetch_object()): ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>
			<?php 

				$categoria = new Categoria();
				$categoria->setId($cat->id);
				$vendido = $categoria->vendido()? $categoria->vendido() : number_format(0, 2, '.', '');
				$total = $categoria->valorTotal()? $categoria->valorTotal() : number_format(0, 2, '.', '');

			?>
			<td><?=$vendido;?></td>
			<td><?=$total;?></td>
			<td>
				<a href="<?=base_url?>categoria/editar&id=<?=$cat->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>categoria/eliminar&id=<?=$cat->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
