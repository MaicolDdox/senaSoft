@php
    /*
Descripción: Formulario para editar detalles de un semillero (nombre, descripción). Solo accesible por la Directora.
Compartida entre Roles: Exclusiva para Directora.
Protección: Envuelta con @can('semilleros.edit'). Solo se muestra para usuarios con permiso.
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>editar semilleros</h1> 
@endsection