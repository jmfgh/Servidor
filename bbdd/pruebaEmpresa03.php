<?php
echo " Conectando a la base de datos <br>";
$conex = new mysqli("localhost", "root", "", "empresa"); // Abre una conexión
if ($conex->connect_errno) {
    // Comprueba conexión
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
$query = "SELECT DESCRIPCION, PRECIO_ACTUAL FROM PRODUCTOS WHERE PRECIO_ACTUAL > (SELECT AVG (PRECIO_ACTUAL) FROM PRODUCTOS)";

if ($result = $conex->query( $query)) {
    
    // Array Asociativo por nombre de campo
    echo "<table border=1><th>DESCRIPCION</th><th>PRECIO</th></tr>";
    while ( $fila = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$fila[DESCRIPCION]</td>";
        echo "<td>$fila[PRECIO_ACTUAL]</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->close();
}
$conex->close();