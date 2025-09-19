@extends('layouts.dashboard')

@section('content')
    {{-- Reemplazando diseño básico con diseño SENA profesional --}}
    <div class="max-w-6xl mx-auto">
        {{-- Header mejorado con iconografía específica para detalle de proyecto --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Detalle del Proyecto</h1>
                    <p class="text-muted-foreground">Información completa y seguimiento de fases del proyecto</p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Datos principales rediseñados con tarjetas modernas --}}
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Información General</h3>
                        <p class="text-sm text-muted-foreground">Datos principales del proyecto de investigación</p>
                    </div>
                </div>
            </div>


            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 0 012 2" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Nombre del Proyecto</p>
                                <p class="text-foreground font-semibold">{{ $project->nombre }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Semillero</p>
                                <p class="text-foreground font-semibold">
                                    {{ $project->semillero->titulo ?? 'Sin semillero asignado' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Director</p>
                                <p class="text-foreground font-semibold">
                                    {{ $project->director->name ?? 'Sin director asignado' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Fase Actual</p>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary/10 text-primary border border-primary/20">
                                    {{ ucfirst($project->fase_actual) }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Fecha de Inicio</p>
                                <p class="text-foreground font-semibold">
                                    {{ $project->fecha_inicio ? \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') : 'No definida' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Fecha de Finalización</p>
                                <p class="text-foreground font-semibold">
                                    {{ $project->fecha_fin ? \Carbon\Carbon::parse($project->fecha_fin)->format('d/m/Y') : 'Pendiente' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($project->descripcion)
                    <div class="mt-6 pt-6 border-t border-border">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground mb-2">Descripción</p>
                                <p class="text-foreground leading-relaxed">{{ $project->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- =================== Archivos del proyecto =================== --}}
        {{-- Aplicando diseño SENA consistente con iconografía y colores específicos --}}
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Archivos Del Proyecto</h3>
                        <p class="text-sm text-muted-foreground">Documentos y recursos delproyecto de investigacion</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-6">
                {{-- Tabla de archivos --}}
                @if ($project->files->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-200 bg-gray-50/50">
                                    <th class="px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 0 012 2" />
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Nombre del archivo</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Fecha de creación</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-900">Acciones</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($project->files as $file)
                                    <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-primary" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-medium text-gray-900">{{ $file->nombre_original }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-sm text-gray-600">{{ $file->created_at->format('d/m/Y H:i') }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center space-x-2">
                                                {{-- Botón descargar --}}
                                                <a href="{{ route('projects.files.download', $file->id) }}"
                                                    class="inline-flex items-center space-x-2 px-4 py-2 bg-green-50 hover:bg-green-100 text-green-700 hover:text-green-800 rounded-lg text-sm font-medium transition-all duration-200 border border-green-200 hover:border-green-300"
                                                    title="Descargar archivo">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <!-- Icono: archivo + flecha hacia abajo -->
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 11v6m0 0l-3-3m3 3l3-3M6 8V6a2 2 0 012-2h4l4 4v2" />
                                                    </svg>
                                                    <span></span>
                                                </a>

                                                {{-- Botón eliminar --}}
                                                <form action="{{ route('projects.files.destroy', $file->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('¿Eliminar este archivo?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-all duration-200 hover:scale-110 group"
                                                        title="Eliminar archivo">
                                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Sin archivos adjuntos</h3>
                        <p class="text-sm text-gray-600">No hay archivos cargados para este proyecto.</p>
                    </div>
                @endif
                {{-- Formulario para subir nuevo archivo --}}
                <div class="pt-6 border-t border-gray-200">
                    <form action="{{ route('projects.files.store', $project->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-8 h-8 bg-primary/5 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Agregar nuevo archivo</h4>
                                <p class="text-xs text-gray-600">Sube documentos relacionados con el proyecto</p>
                            </div>
                        </div>

                        {{-- Usando componente de file upload mejorado --}}
                        <x-file-upload-inline name="archivo" accept=".zip,.rar,.7z,.tar,.gz,.pdf,.doc,.docx"
                            :required="true" />

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center space-x-2 px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg text-sm font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <span>Subir Documento</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        {{-- Historial de fases rediseñado con tabla moderna --}}
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Historial de Fases</h3>
                        <p class="text-sm text-muted-foreground">Seguimiento del progreso del proyecto</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                @if ($project->fases->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-border">
                                    <th class="text-left py-3 px-4 font-semibold text-foreground">Fase</th>
                                    <th class="text-left py-3 px-4 font-semibold text-foreground">Fecha Inicio</th>
                                    <th class="text-left py-3 px-4 font-semibold text-foreground">Fecha Fin</th>
                                    <th class="text-left py-3 px-4 font-semibold text-foreground">Estado</th>
                                    <th class="text-left py-3 px-4 font-semibold text-foreground">Acciones</th>
                                    <th class="text-left py-3 px-4 font-semibold text-foreground">Documentos</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                @foreach ($project->fases as $fase)
                                    <tr class="hover:bg-muted/50 transition-colors duration-200">
                                        <td class="py-4 px-4">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-primary" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="font-medium text-foreground">{{ ucfirst($fase->nombre) }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 text-muted-foreground">
                                            {{ \Carbon\Carbon::parse($fase->fecha_inicio)->format('d/m/Y') }}
                                        </td>
                                        <td class="py-4 px-4 text-muted-foreground">
                                            {{ $fase->fecha_fin ? \Carbon\Carbon::parse($fase->fecha_fin)->format('d/m/Y') : 'En curso' }}
                                        </td>
                                        <td class="py-4 px-4">
                                            @if ($fase->fecha_fin)
                                                <span
                                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Completada
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    En progreso
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-center">
                                            <div class="flex justify-center items-center space-x-2">
                                                <a href="{{ route('projects.fases.show', ['project' => $project->id, 'fase' => $fase->id]) }}"
                                                    class="bg-blue-100 hover:bg-blue-200 text-blue-700 p-2 rounded-lg transition-colors duration-200 group"
                                                    title="Ver fase">
                                                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                            </div>

                                        </td>
                                        {{-- Mejorando el diseño del formulario de subida de documentos --}}
                                        <td class="py-4 px-4 text-center">
                                            @if ($fase->documento)
                                                {{-- Enlace para ver o descargar con diseño SENA mejorado --}}
                                                <div class="flex items-center justify-center space-x-2">
                                                    <a href="{{ Storage::url($fase->documento) }}" target="_blank"
                                                        class="inline-flex items-center space-x-2 px-4 py-2 bg-green-50 hover:bg-green-100 text-green-700 hover:text-green-800 rounded-lg text-sm font-medium transition-all duration-200 border border-green-200 hover:border-green-300">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <!-- Icono: archivo + flecha hacia abajo -->
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 11v6m0 0l-3-3m3 3l3-3M6 8V6a2 2 0 012-2h4l4 4v2" />
                                                        </svg>
                                                        <span></span>
                                                    </a>

                                                    {{-- Botón eliminar mejorado --}}
                                                    <form
                                                        action="{{ route('projects.fases.documento.destroy', [$project->id, $fase->id]) }}"
                                                        method="POST" class="inline-block"
                                                        onsubmit="return confirm('¿Eliminar este documento?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-red-50 hover:bg-red-100 text-red-700 hover:text-red-800 rounded-lg text-sm font-medium transition-all duration-200 border border-red-200 hover:border-red-300">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                {{-- Formulario mejorado para subir documento --}}
                                                <form
                                                    action="{{ route('projects.fases.documento.store', [$project->id, $fase->id]) }}"
                                                    method="POST" enctype="multipart/form-data" class="space-y-3">
                                                    @csrf

                                                    {{-- Componente de carga de archivos mejorado --}}
                                                    <x-file-upload-inline name="documento" accept=".pdf,.doc,.docx"
                                                        :required="true" />

                                                    {{-- Botón de subir mejorado --}}
                                                    <button type="submit"
                                                        class="inline-flex items-center space-x-2 px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg text-sm font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                        </svg>
                                                        <span>Subir Documento</span>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-12 h-12 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-foreground mb-2">Sin historial de fases</h3>
                        <p class="text-muted-foreground">Aún no hay registro de fases para este proyecto.</p>
                    </div>
                @endif
            </div>
        </div>
        @can('projects.create')
            {{-- Botón para avanzar fase rediseñado --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('projects.index') }}"
                    class="px-6 py-3 bg-muted hover:bg-muted/80 text-muted-foreground rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 border border-border">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Volver a Proyectos</span>
                </a>

                <button
                    class="px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md"
                    onclick="document.getElementById('faseModal').classList.remove('hidden')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                    <span>Avanzar Fase</span>
                </button>
            </div>
        </div>

        {{-- Modal rediseñado con diseño SENA profesional --}}
        <div id="faseModal"
            class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
            <div
                class="bg-card rounded-lg shadow-xl border border-border w-full max-w-md transform transition-all duration-300">
                <div class="px-6 py-4 border-b border-border">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                            <h2 class="text-lg font-semibold text-foreground">Avanzar Fase</h2>
                        </div>
                        <button type="button"
                            class="text-muted-foreground hover:text-foreground transition-colors duration-200"
                            onclick="document.getElementById('faseModal').classList.add('hidden')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>


                <form action="{{ route('projects.advance', $project->id) }}" method="POST" class="p-6">
                    @csrf
                    <div class="mb-6">
                        <label for="fecha_fin" class="block text-sm font-medium text-foreground mb-2">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Fecha fin de la fase actual</span>
                            </div>
                        </label>
                        <input type="date" id="fecha_fin" name="fecha_fin"
                            class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 bg-background"
                            required>
                        <p class="mt-2 text-sm text-muted-foreground">Selecciona la fecha en que se completó la fase actual
                        </p>
                    </div>
                    <div class="mb-6">
                        <label for="descripcion" class="block text-sm font-medium text-foreground mb-2">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Descripción de la fase actual</span>
                            </div>
                        </label>
                        <textarea id="descripcion" name="descripcion" rows="3"
                            class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 
               focus:border-primary transition-colors duration-200 bg-background resize-none"></textarea>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button"
                            class="px-4 py-2 bg-muted hover:bg-muted/80 text-muted-foreground rounded-lg font-medium transition-all duration-200 border border-border"
                            onclick="document.getElementById('faseModal').classList.add('hidden')">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        @endcan

    </div>
@endsection
