<html>
<head>
<meta charset="UTF-8">
<title>Paises y ciudades</title>
</head>
<body>
<?php

    include_once 'infopaises.php';
    
    function ordenaPaisPorPoblacion($pais1, $pais2){
        
        return ( $pais1['Poblacion'] - $pais2['Poblacion']);
        
    }
    
    uasort($paises,'ordenaPaisPorPoblacion');
    

    $pais_max = array_key_last( $paises );
    $maximo = $paises[$pais_max]['Poblacion'];

    
    echo "País con más población: ".$pais_max." , con ".number_format($maximo, 0, ',', '.'). " habitantes<br/>";

    
    echo "<table border=1><tr><td> Ciudades: </td>";
    $listaciudades = $ciudades[$pais_max];
    foreach($listaciudades as $ciudad){
        echo "<td> $ciudad </td>";
    }
    echo "</tr></table>";
    ?>

</body>
</html>