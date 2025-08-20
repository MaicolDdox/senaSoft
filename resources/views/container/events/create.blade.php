@php
    /*
    Descripción: Formulario para crear un evento (título, descripción, fechas de inicio/fin).
Compartida entre Roles: Exclusiva para Directora.
Protección: Envuelta con @can('events.create').
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>Vista de crear evento</h1> 
@endsection