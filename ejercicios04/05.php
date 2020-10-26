<html>
<head>
<style>
	h1{
		background-color: blue;
		color: white;
		padding: 15px;
	}
	h3, h4{
		color: grey;
	}
	div{
		text-align: center;
	}
</style>
</head>
<body>

<?php //----- Si método GET -> muestra formulario y si es POST -> Valida y procesa el formulario

    $resu = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<div><h1>Formulario con multiples campos</h1></div>
                <form method='POST'>

                Nombre: <input name='nombre' type='text'><br>
                Apellidos: <input name='apellidos' type='text'><br>
                <hr>
        		
        		<input type='radio' name='sexo' value='Hombre'> Hombre <br>
        		<input type='radio' name='sexo' value='Mujer'> Mujer <br>		

	          </form>";
    }else{     
        

            


            echo "<input type='button' value='volver' onClick='history.go(-1);'>";   
    }
?>
</body>
</html>
