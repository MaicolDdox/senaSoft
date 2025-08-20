@php
    /*
    Descripción: Lista eventos en una vista de calendario (por ejemplo, usando la librería FullCalendar) o tabla, mostrando título, descripción, fechas de inicio/fin.
Compartida entre Roles: Todos los roles pueden ver eventos.
Protección: Envuelta con @can('events.index'). Acciones como “Agregar Evento” usan @can('events.create').
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>Vista del calendario</h1> 
@endsection