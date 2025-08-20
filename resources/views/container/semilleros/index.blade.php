@php
    /*
Descripción: Muestra una lista de todos los semilleros (para Directora) o el semillero del usuario (para Director/Aprendiz). Incluye una tabla con nombre, descripción y acciones (ver, editar, eliminar).
Compartida entre Roles: Todos los roles pueden ver (Directora ve todos, otros ven el suyo). Las acciones están restringidas:

@can('semilleros.create') para botón "Agregar Semillero" (solo Directora).
@can('semilleros.edit') para botón de editar.
@can('semilleros.delete') para botón de eliminar.


Protección: Envuelta con @can('semilleros.index') para asegurar acceso solo a usuarios autorizados. Las acciones específicas usan @can('semilleros.edit') o @can('semilleros.delete')
    */
@endphp

@extends('layouts.dashboard')
@section('content')
   <h1>Vista de semilleros</h1> 
@endsection
