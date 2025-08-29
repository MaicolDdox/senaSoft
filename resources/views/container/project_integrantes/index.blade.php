@extends('layouts.dashboard')

@section('content')
    {{-- Reemplazando diseño básico con diseño SENA profesional --}}
    <div class="max-w-6xl mx-auto">
        {{-- Header mejorado con iconografía específica para proyectos con aprendices --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Proyectos con Aprendices</h1>
                    <p class="text-muted-foreground">Visualiza la asociación de aprendices en cada proyecto de investigación
                    </p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Transformando cards básicas en diseño moderno con grid --}}
        <div class="space-y-6">
            @forelse ($projects as $project)
                <div
                    class="bg-card rounded-lg shadow-sm border border-border overflow-hidden hover:shadow-md transition-shadow duration-200">
                    {{-- Header del proyecto con información principal --}}
                    <div class="px-6 py-4 border-b border-border bg-gradient-to-r from-primary/5 to-primary/10">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-foreground">{{ $project->nombre }}</h3>
                                    <div class="flex items-center space-x-4 mt-1">
                                        <span class="text-sm text-muted-foreground flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span>{{ $project->director ? $project->director->name : 'Sin director' }}</span>
                                        </span>
                                        <span class="text-sm text-muted-foreground flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            <span>{{ $project->semillero ? $project->semillero->titulo : 'Sin semillero' }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full">
                                    {{ $project->integrantes->count() }}
                                    {{ $project->integrantes->count() === 1 ? 'Aprendiz' : 'Aprendices' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Contenido del proyecto con lista de aprendices --}}
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-4">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                            <h4 class="text-lg font-semibold text-foreground">Aprendices Asociados</h4>
                        </div>

                        @forelse($project->integrantes as $aprendiz)
                            @if ($loop->first)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @endif

                            <div
                                class="flex items-center justify-between p-3 bg-muted/30 rounded-lg border border-border hover:bg-muted/50 transition-colors duration-200">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-primary font-semibold text-sm">
                                            {{ strtoupper(substr($aprendiz->name, 0, 2)) }}
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-medium text-foreground truncate">{{ $aprendiz->name }}</p>
                                        <p class="text-sm text-muted-foreground truncate">
                                            {{ $aprendiz->email ?? 'Sin email' }}</p>
                                    </div>
                                </div>
                                @can('project_integrantes.create')
                                    {{-- Botón eliminar rediseñado con iconografía SENA --}}
                                    <form action="{{ route('project.aprendices.destroy', [$project->id, $aprendiz->id]) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar a {{ $aprendiz->name }} del proyecto {{ $project->nombre }}? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200 group"
                                            title="Eliminar aprendiz">
                                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                            @if ($loop->last)
                    </div>
            @endif
        @empty
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-muted/50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                    </svg>
                </div>
                <p class="text-muted-foreground font-medium">No hay aprendices asociados</p>
                <p class="text-sm text-muted-foreground mt-1">Este proyecto aún no tiene aprendices vinculados</p>
            </div>
            @endforelse
        </div>
    </div>
@empty
    {{-- Estado vacío cuando no hay proyectos --}}
    <div class="text-center py-12">
        <div class="w-24 h-24 bg-muted/50 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-foreground mb-2">No hay proyectos registrados</h3>
        <p class="text-muted-foreground mb-6">Comienza creando tu primer proyecto de investigación</p>
        @can('projects.create')
            <a href="{{ route('projects.create') }}"
                class="inline-flex items-center space-x-2 px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Crear Proyecto</span>
            </a>
        @endcan
    </div>
    @endforelse
    </div>

    {{-- Sección informativa adicional --}}
    @if ($projects->count() > 0)
        <div class="mt-8 bg-primary/5 border border-primary/20 rounded-lg p-6">
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h4 class="font-semibold text-primary mb-2">Gestión de Equipos de Investigación</h4>
                    <p class="text-primary/80 text-sm leading-relaxed">
                        Esta vista te permite supervisar la composición de los equipos de trabajo en cada proyecto.
                        Los aprendices asociados participan activamente en el desarrollo de las investigaciones,
                        contribuyendo en las diferentes fases del proyecto bajo la supervisión del director asignado.
                        <strong>Puedes eliminar aprendices del proyecto cuando sea necesario, pero esta acción no se puede
                            deshacer.</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif
    </div>
@endsection
