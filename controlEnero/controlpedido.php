
<?php
include_once 'AccesoDatos.php';

// CONTROLADOR

if (isset ($_GET['nombre']) && isset($_GET['clave'])){
    $conexdb = AccesoDatos::initModelo();
    $cliente = $conexdb->obtenerCliente($_GET['nombre'], $_GET['clave']);
    
    if($cliente){
          $pedidos = $conexdb->obtenerListaPedidos($cliente->cod_cliente);
          $conexdb->updateVeces($cliente);

            if ( count($pedidos) == 0){
                $mensaje = "No existen pedidos para ese cliente.";
                unset($pedidos);
            }  
            // Cargo la vista
            include_once 'vistapedidos.php';

    }else{
        $mensaje = "ERROR: No se encuentra ese usuario.";
        echo $mensaje;
        header('refresh:4;url=acceso.html');
    }
    
} else {
    $mensaje = "ERROR: Introduzca un nombre de usuario y contraseña.";
    echo $mensaje;
    header('refresh:4;url=acceso.html');
    exit();
}

?>