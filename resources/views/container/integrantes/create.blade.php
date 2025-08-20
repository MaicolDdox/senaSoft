@php
    /*
    Descripción: Formulario para agregar un usuario a un semillero (seleccionar usuario, establecer como director o no).
Compartida entre Roles: Directora y Director pueden agregar integrantes a sus respectivos semilleros.
Protección: Envuelta con @can('integrantes.create'). El controlador asegura que el Director solo agregue a su semillero.
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>Crear integrantes</h1> 
@endsection