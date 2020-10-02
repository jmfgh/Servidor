<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php

    $uno = random_int(1,10);
    $dos = random_int(1,10);

   echo "$uno + $dos = ".($uno+$dos)."<br>";
   echo "$uno - $dos = ".($uno-$dos)."<br>";
   echo "$uno / $dos = ".($uno/$dos)."<br>";
   echo "$uno * $dos = ".($uno*$dos)."<br>";
   echo "$uno % $dos = ".($uno%$dos)."<br>";
   echo "$uno ** $dos = ".($uno**$dos)."<br>";
?>
</body>
</html>