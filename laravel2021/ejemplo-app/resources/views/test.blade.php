<!-- Ejemplo de plantillas blade -->
{{-- INCLUYO LA PLANTILLA PRINCIPAL --}}
@extends('principal')

{{-- ASIGNO UN TITULO --}}
@section('titulo', ' Prueba test')


{{-- ASIGNO UN CONTENIDO A LA PLANTILLA PRINCIPAL --}}
@section('contenido')

<b>RESULTADO </b>: {{$num1}} x {{$num2}} = {{$num1*$num2}} <br>

{{-- COMENTARIO BLADE --}}

<?php
// Comentario PHP
?>

<br>
<?= isset($variable)? $variable:" No existe el valor segun PHP" ?>
<br>
{{-- otras versiones usan or --}}
{{ $variable ?? 'No existe el valor segun BLADE'}}


{{-- Ejemplo de ciclo FOR --}}

<table style="border:5px;" >
@for ($i = 0; $i < 10; $i++)
    <tr><td> {{ $i }} <td></tr>
@endfor
</table>
    
@endsection
