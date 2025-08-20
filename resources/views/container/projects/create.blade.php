@php
    /*
    Descripción: Formulario para crear un proyecto (nombre, descripción, vinculado a un semillero). Se inicializa en la fase ‘propuesta’.
Compartida entre Roles: Directora y Director pueden crear (Director para su semillero).
Protección: Envuelta con @can('projects.create').
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>crear projecto</h1> 
@endsection