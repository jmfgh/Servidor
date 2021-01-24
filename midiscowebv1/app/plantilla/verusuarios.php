<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
<h2> GESTIÓN DE USUARIOS</h2> 
<div id='info'><b><?= (isset($_GET['msg']))?$_GET['msg']:""; ?></b></div>

<form name='f3'      action='index.php'>
<input type='hidden' name='orden' value='Cerrar'> 
<input type='submit' value='Cerrar Sesión'>
</form>


<table>
<th>ID</th><th>Nombre</th><th>Correo eléctronico</th><th>Plan</th><th>Estado</th>
	<tr>
<?php
$auto = $_SERVER['PHP_SELF'];
// identificador => Nombre, email, plan y Estado
?>
<?php foreach ($usuarios as $clave => $datosusuario) : ?>
<tr>		
<td><?= $datosusuario[0] ?></td>
<td><?= $datosusuario[2] ?></td>  
<td><?= $datosusuario[3] ?></td> 
<td><?= PLANES[$datosusuario[4]] ?></td> 
<td><?= ESTADOS[$datosusuario[5]] ?></td> 
<td><a href="#"
			onclick="confirmarBorrar('<?= $datosusuario[2]."','".$datosusuario[0]."'"?>);">Borrar</a></td>
<td><a href="<?= $auto?>?orden=Modificar&userid=<?= $datosusuario[0] ?>">Modificar</a></td>
<td><a href="<?= $auto?>?orden=Detalles&userid=<?= $datosusuario[0] ?>">Detalles</a></td>
</tr>
<?php endforeach; ?>
</table>
<br>
<form name='f2' action='index.php'>
<input type='hidden' name='orden' value='Alta'> 
<input type='submit' value='Nuevo Usuario' >
</form>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>