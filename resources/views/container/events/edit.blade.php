@php
    /*
    Descripción: Formulario para editar detalles de un evento.
Compartida entre Roles: Exclusiva para Directora.
Protección: Envuelta con @can('events.edit').
    */
@endphp
@extends('layouts.dashboard')
@section('content')
   <h1>Vista de editar evento</h1> 
@endsection