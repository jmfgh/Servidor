<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index($pagina =1) {
        $datoscliente = " MORCILLAS LEONESAS S.A";
       return view('clientes.indice',[ 'clientesinfo' => $datoscliente, 'pagina' => $pagina]);
    }
}
