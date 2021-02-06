<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
	Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>
	
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
	
<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>PRECIO</th>
		<th>STOCK</th>
		<th>ACCIONES</th>
	</tr>
	<?php while($pro = $productos->fetch_object()): ?>
		<tr>
			<td><?=$pro->id;?></td>
			<td><?=$pro->nombre;?></td>
			<td><?=$pro->precio;?></td>
			<td><?=$pro->stock;?></td>
			<td>
				<a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>
	<tr>
      <td>Página <?=$_SESSION['pagina']?> de <?=$numPaginas?></td>
      <td></td>
      <!-- Primera -->
      <td>
        <form action="<?=base_url?>producto/gestion" method="post">
          <button type="submit" name="pagina" value="Primera">
            <span class="glyphicon glyphicon-step-backward"></span>
            Primera
          </button>
        </form>
      </td>
      <!-- Anterior -->
      <td>
        <form action="<?=base_url?>producto/gestion" method="post">
          <button type="submit" name="pagina" value="Anterior">
            <span class="glyphicon glyphicon-chevron-left"></span>
            Anterior
          </button>
        </form>
      </td>
      <!-- Siguiente -->
      <td>
        <form action="<?=base_url?>producto/gestion" method="post">
          <button type="submit" name="pagina" value="Siguiente">
            Siguiente
            <span class="glyphicon glyphicon-chevron-right"></span>
          </button>
        </form>
      </td>
      <!-- Última -->
      <td>
        <form action="<?=base_url?>producto/gestion" method="post">
          <button type="submit" name="pagina" value="Ultima">
            Última
            <span class="glyphicon glyphicon-step-forward"></span>
          </button>
        </form>
      </td>
	 </tr>   
</table>
