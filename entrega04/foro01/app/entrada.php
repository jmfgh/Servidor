<form name='entrada' method="POST">
<table>
<tr>
<td>Nombre:</td><td> <input type="text" name="nombre" 
    value="<?=(isset($_REQUEST['nombre']))?$_REQUEST['nombre']:''?>"></td></tr>
<tr>
<td>Contraseña: </td><td><input type="password" name="contra"
    value="<?=(isset($_REQUEST['contra']))?$_REQUEST['contra']:''?>"></td>
</tr>
</table>
<input type="submit" name="orden" value="Entrar">
</form>