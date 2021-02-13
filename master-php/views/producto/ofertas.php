<h1>Productos en oferta</h1>

<?php while($product = $productos->fetch_object()): ?>
	<div class="product">
		<a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
			<?php if($product->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
			<?php endif; ?>
			<h2><?=$product->nombre?></h2>
		</a>
		<p><?=$product->precio?></p>
        <?php if($product->oferta == "si") :?>
            <img src="<?=base_url?>assets/img/oferta.png" alt="oferta" class="oferta">
        <?php endif; ?>
        <?php if ($product->stock > 0):?>
		<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
        <?php else: ?>
        <span class="button">NO DISPONIBLE</span>
        <?php endif; ?>
    </div>
<?php endwhile; ?>