@php
    /*
    Descripción: Formulario para editar detalles de un integrante (por ejemplo, cambiar estado de director, marcar como inactivo con left_at).
Compartida entre Roles: Directora y Director pueden editar (Directora para todos, Director para su grupo).
Protección: Envuelta con @can('integrantes.edit').
    */
@endphp
@extends('layouts.dashboard')
@section('content')
   <h1>editar integrantes</h1> 
@endsection