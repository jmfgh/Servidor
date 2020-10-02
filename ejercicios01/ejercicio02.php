<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php

    $num = random_int(1,9);
    
    echo "<p>Numero generado: $num</p>";

    for ($i = 1; $i <= $num; $i++) {
        for ($a = 1; $a <= $i; $a++) {
            if ($i%2 == 0) {
                echo "<span style='color:red;'>$i</span>";
            }else {
                echo "<span style='color:blue;'>$i</span>";
            }
        }
        echo "<br>";
    }
?>
</body>
</html>