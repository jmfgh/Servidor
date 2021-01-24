<h1>Borrar categoria</h1>

<form action="<?=base_url?>categoria/del" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" required/>
	
	<input type="submit" value="Guardar" />
</form>