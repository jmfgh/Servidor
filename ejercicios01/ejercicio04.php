<html>
<head>
<title>Online PHP Script Execution</title>
<style type="text/css">
body {
  font-family: "courier";
}
</style>
</head>
<body>
<?php

    $num = random_int(1,9);
    
    echo "<p>Numero generado: $num</p>";

    for ($i = 1; $i <= $num; $i++) {
        for ($a = 1; $a <= $num - $i; $a++) {
             echo "<span>&nbsp;</span>";   
        }
        for ($a = 1; $a <= ($i*2) - 1; $a++) {
            echo "<span>*</span>";
        }
        echo "<br>";
    }
?>
</body>
</html>