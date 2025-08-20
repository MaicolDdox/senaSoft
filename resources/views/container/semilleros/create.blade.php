@php
    /*
    Descripción: Formulario para crear un nuevo semillero (nombre, descripción). Solo accesible por la Directora.
Compartida entre Roles: Exclusiva para Directora.
Protección: Envuelta con @can('semilleros.create') para restringir acceso. El envío del formulario está protegido por el controlador, pero la vista se oculta para roles no autorizados.
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>crear semilleros</h1> 
@endsection