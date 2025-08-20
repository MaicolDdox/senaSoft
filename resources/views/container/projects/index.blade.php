@php
    /*
    Descripción: Lista los proyectos de un semillero, mostrando nombre, descripción, fase actual y acciones (ver, editar, eliminar, avanzar fase). Incluye filtros por fase.
Compartida entre Roles: Directora ve todos los proyectos; Director ve los de su semillero; Aprendiz ve los de su grupo (solo lectura).
Protección: Envuelta con @can('projects.index'). Acciones restringidas:

@can('projects.create') para "Agregar Proyecto".
@can('projects.edit') o @can('projects.delete') para editar/eliminar.
@can('projects.advance') para avanzar fases.
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>index del projecto</h1> 
@endsection