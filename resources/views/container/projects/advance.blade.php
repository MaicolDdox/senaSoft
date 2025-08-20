@php
    /*
    Descripción: Formulario para avanzar un proyecto a la siguiente fase (por ejemplo, de ‘propuesta’ a ‘análisis’). Permite agregar notas y establecer fechas de inicio/fin.
Compartida entre Roles: Directora y Director (Director para su semillero).
Protección: Envuelta con @can('projects.advance').
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>avances del projecto</h1> 
@endsection