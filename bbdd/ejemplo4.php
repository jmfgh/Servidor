<?php
echo " Conectando a la base de datos <br>";
$conex = new mysqli("localhost", "root", "", "empresa"); // Abre una conexión
if ($conex->connect_errno) {
    // Comprueba conexión
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
$query = "SELECT DISTINCT VENDEDOR_NO, APELLIDO, COUNT(CLIENTE_NO) as TOTAL FROM CLIENTES, EMPLEADOS WHERE VENDEDOR_NO = EMP_NO GROUP BY VENDEDOR_NO order by 2";

if ($result = $conex->query( $query)) {
    
    // Array Asociativo por nombre de campo
    echo "<table border=1><th>Num Vendedor</th><th>Nombre Vendedor</th><th>Total clientes</th></tr>";
    while ( $fila = $result->fetch_array()) {
        echo "<tr>";
        echo "<td>$fila[0]</td>";
        echo "<td>$fila[1]</td>";
        echo "<td>$fila[2]</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->close();
}
$conex->close();