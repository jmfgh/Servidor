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

<?php //----- Si m�todo GET -> muestra formulario y si es POST -> Valida y procesa el formulario

    $resu = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<div><h1>Formulario con multiples campos</h1></div>
                <form method='POST'>

                Nombre: <input name='nombre' type='text'><br>
                Apellidos: <input name='apellidos' type='text'><br>
                Edad:<select name='anyo' size='2'>
						<option value='17'>Menor de 18</option>
						<option value='54'>Menor de 55</option>
						<option value='56'>Mayor de 55</option>
					 </select>
        		
        		<input type='radio' name='sexo' value='Hombre'> Hombre <br>
        		<input type='radio' name='sexo' value='Mujer'> Mujer <br>	

                Hobbies:
			    <input name='hobbies[]' value='lectura' type='checkbox' >lectura<br> 
			    <input name='hobbies[]' value='ver la tele' type='checkbox'>ver la tele<br>
			    <input name='hobbies[]' value='hacer deporte' type='checkbox'>hacer deporte<br>
                <input name='hobbies[]' value='salir de marcha' type='checkbox'>salir de marcha<br>
	          
                <input type='submit' value='Enviar'>
                </form>";
    }else{     
        
            
            


            echo "<input type='button' value='volver' onClick='history.go(-1);'>";   
    }
?>
</body>
</html>
