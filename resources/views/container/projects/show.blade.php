@extends('layouts.dashboard')

@section('content')

    {{-- Show de los proyectos y fases y carga de documentos --}}
    <div class="max-w-6xl mx-auto">

        {{-- =================== Header =================== --}}
        @include('container.projects.show-container.header')

        {{-- =================== Informacion general =================== --}}
        @include('container.projects.show-container.info-general')

        {{-- =================== Archivos del proyecto =================== --}}
        @include('container.projects.show-container.archivo-proyecto')
        

        {{-- =================== Historial de fases =================== --}}
        @include('container.projects.show-container.historial-fases')


        {{-- =================== Modal (formulario) para avanzar fase =================== --}}
        @include('container.projects.show-container.modal-fases')
       

    </div>
@endsection
