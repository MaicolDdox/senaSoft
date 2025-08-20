@php
    /*
    Descripción: Muestra un reporte de avance de proyectos por fase, semillero o estado. Incluye filtros y tablas de resumen.
Compartida entre Roles: Exclusiva para Directora.
Protección: Envuelta con @can('projects.report').
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>reporte del projecto</h1> 
@endsection