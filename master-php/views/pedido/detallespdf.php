<h1>Detalle del pedido</h1>	

<?php if (isset($pedido)): ?>

		<h3>Dirección de envio</h3>
		Provincia: <?= $pedido->provincia ?><br/>
		Cuidad: <?= $pedido->localidad ?><br/>
		Direccion: <?= $pedido->direccion ?><br/><br/>

		<h3>Datos del pedido:</h3>
		Estado: <?= Utils::showStatus($pedido->estado) ?><br/>
		Número de pedido: <?= $pedido->id ?><br/>
		Total a pagar: <?= $pedido->coste ?> $<br/>
		Productos:

		<table>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
			</tr>
			<?php while ($producto = $productos->fetch_object()): ?>
				<tr>
					<td>
						<?= $producto->nombre ?>
					</td>
					<td>
						<?= $producto->precio ?>
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>
				
<?php endif; ?>