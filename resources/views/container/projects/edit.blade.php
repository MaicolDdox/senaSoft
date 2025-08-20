@php
    /*
    Descripción: Formulario para editar detalles de un proyecto (nombre, descripción).
Compartida entre Roles: Directora y Director (Director para su semillero).
Protección: Envuelta con @can('projects.edit').
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>editar projecto</h1> 
@endsection