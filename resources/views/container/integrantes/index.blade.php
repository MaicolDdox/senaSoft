@php
    /*
    Descripción: Lista los integrantes de un semillero (activos e inactivos). Incluye nombre, rol (director/aprendiz), fechas de ingreso/salida. Acciones: agregar/quitar integrante, ver historial.
Compartida entre Roles: Directora ve los integrantes de todos los semilleros; Director ve los de su grupo; Aprendiz ve los de su grupo (solo lectura).
Protección: Envuelta con @can('integrantes.index'). Acciones restringidas:

@can('integrantes.create') para "Agregar Integrante" (Directora/Director).
@can('integrantes.edit') o @can('integrantes.delete') para editar/eliminar.
@can('integrantes.history') para ver historial de inactivos.
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>index integrantes</h1> 
@endsection