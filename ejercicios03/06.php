<html>
<head>
<meta charset="UTF-8">
<title>Paises y ciudades</title>
</head>
<body>
<?php

    include_once 'infopaises.php';
    
    $max = 0;
    $pais_max = "";
    foreach($paises as $pais => $info){
        if($info['Poblacion']> $max){
            $pais_max = $pais;
            $max = $info['Poblacion'];
        }
    }
    echo "Pa�s con m�s poblaci�n: ".$pais_max." , con ".number_format($max, 0, ',', '.'). " habitantes<br/>";
    
    echo "<table border=1><tr><td> Ciudades: </td>";
    $listaciudades = $ciudades[$pais_max];
    foreach($listaciudades as $ciudad){
        echo "<td> $ciudad </td>";
    }
    echo "</tr></table>";
?>
</body>
</html>