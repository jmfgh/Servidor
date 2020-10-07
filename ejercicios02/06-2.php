<html>
<head>
<title>Online PHP Script Execution</title>
<style type="text/css">
    body {
        font-family: "courier";
    }
    
    img{
        padding: 0px;
        margin: 0px;
        width: 15px;
        height: 10px;
    }
    
    span{
        padding-left:15px;
        max-width: 15px;
        height: 10px;
    }
    
</style>
</head>
<body>
<?php

    $num = random_int(1,10);

    echo "Numero de almenas: ".$num."<br>";
    
    for ($i = 0; $i < 2; $i++) {
        $cont = 0;
        for ($a = 0; $a < (($num*4)+($num-1)); $a++) {
            $cont++;
            if($cont <= 4){
                echo "<img src='brick.jpg'>";
            }else{
                echo "<span></span>";
                $cont = 0;
            }
        }
        echo "<br>";
    }
    
    for ($a = 0; $a < (($num*4)+($num-1)); $a++) {
        echo "<img src='brick.jpg'>";
    }
?>
</body>
</html>
