<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// EJEMPLOS BÁSICOS
Route::get('/saludo', function () {
      echo "<h1> Hola Mundo </h1>";
});

Route::get('/fecha', function () {
    echo "<p> Fecha actual: ";
    echo date("d-m-y");
    echo "<hr>";
});

// LLamando a una vista
Route::get('/fecha1', function () {
    return view('verfecha');
});

// Llamando a una vista con un párametro

Route::get('/fecha2', function () {
    return view('verfecha2',array( 
        'titulo' => ' LA FECHA P'
    )
    );
});

// ROUTAS CON PARÁMETROS

// parámetro obligatorio
Route::get('/suma1/{valor}', function ($valor) {
    return view ('incrementa', array ('num' => $valor));
});

// parámetro opcional, por defecto le asigno el 0
Route::get('/suma2/{valor?}', function ($valor = 0) {
    return view ('incrementa', ['num' => $valor]);
});

// parámetro debe cumplir una condicion
Route::get('/suma3/{valor}', function ($valor) {
    return view ('incrementa', array ('num' => $valor));
})->where ( array (
     'valor' => '[0-9]+'  // Expresión regular valores entre 0 y 9, por lo menos con un valor
));

// Dos parámetros obligatorios que tiene ser númericos
Route::get('/suma4/{valor1}/{valor2}', function ($valor1,$valor2) {
    return view ('sumar', ['num1' => $valor1,'num2' => $valor2]);
})->where ( array (
     'valor1' => '[0-9]+',
     'valor2' => '[0-9]+'
));

// Dos parámetros, otro forma de pasarlos a una vista 
// La clase view tiene distintos métodos.
// la vista está en un subdirectorio (oper) y tiene sintaxis blade (NO PHP)
Route::get('/por/{valor1}/{valor2}', function ($valor1,$valor2) {
    return view ('oper.multi')->with ('num1',$valor1)
                              ->with ('num2',$valor2);
                              

    }
);

// LLAMAR UNA VISTA CON MARCAS DE BLADE
Route::get('/test/{valor1}/{valor2}', function ($valor1,$valor2) {
    return view ('test')->with ('num1',$valor1)
                        ->with ('num2',$valor2);
                              

    }
);

// Indico la ruta a los controladores
use App\Http\Controllers\ClientesController;

// LLAMO A UN MÉTODO DEL CONTROLADOR 
Route::get('/clientes/{pagina?}', [ClientesController::class,'index']);

use App\Http\Controllers\CuentasCtl;

Route::resource('Cuentas',CuentasCtl::class);
