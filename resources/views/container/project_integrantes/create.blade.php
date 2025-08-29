@extends('layouts.dashboard')

@section('content')
    <!-- TomSelect CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

    {{-- Reemplazando diseño básico con diseño SENA profesional --}}
    <div class="max-w-4xl mx-auto">
        {{-- Header mejorado con iconografía específica para asociación de integrantes --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Asociar Aprendices</h1>
                    <p class="text-muted-foreground">Vincula aprendices a proyectos de investigación</p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Formulario rediseñado con tarjeta moderna y campos mejorados --}}
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Formulario de Asociación</h3>
                        <p class="text-sm text-muted-foreground">Selecciona el proyecto y los aprendices a vincular</p>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('project_integrantes.store') }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-6">
                    {{-- Campo de selección de proyecto con iconos y mejor UX --}}
                    <div>
                        <label for="project_id" class="block text-sm font-medium text-foreground mb-2">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Proyecto de Investigación</span>
                            </div>
                        </label>
                        
                        <select name="project_id" id="project_id"
                            class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 bg-background"
                            required>
                            <option value="">Seleccione un proyecto</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->nombre }}</option>
                            @endforeach
                        </select>
                        <p class="mt-2 text-sm text-muted-foreground">Elige el proyecto al que deseas asociar los aprendices
                        </p>
                    </div>

                    {{-- Campo de selección múltiple de aprendices mejorado --}}
                    <div>
                        <label for="integrantes" class="block text-sm font-medium text-foreground mb-2">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                </svg>
                                <span>Aprendices</span>
                            </div>
                        </label>
                        

                        <select name="integrantes[]" id="integrantes"
                            class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 bg-background"
                            multiple required size="8">
                            @foreach ($aprendices as $aprendiz)
                                <option value="{{ $aprendiz->id }}" class="py-2">
                                    {{ $aprendiz->name }} - {{ $aprendiz->email }}
                                </option>
                            @endforeach
                        </select>                        
                    </div>
                </div>

                {{-- Botones rediseñados con efectos hover y iconos --}}
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-border">
                    <a href="{{ route('projects.index') }}"
                        class="px-6 py-3 bg-muted hover:bg-muted/80 text-muted-foreground rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 border border-border">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>Asociar Aprendices</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Sección informativa adicional sobre el proceso --}}
        <div class="mt-6 bg-primary/5 border border-primary/20 rounded-lg p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h4 class="font-medium text-primary mb-1">Información sobre la Asociación</h4>
                    <p class="text-sm text-primary/80">
                        Los aprendices asociados podrán participar activamente en el desarrollo del proyecto seleccionado.
                        Esta vinculación les permitirá acceder a los recursos del proyecto y contribuir en las diferentes
                        fases de investigación.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Select para proyectos (solo uno)
            new TomSelect("#project_id", {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "Seleccione un proyecto..."
            });

            // Select para aprendices (pueden ser varios)
            new TomSelect("#integrantes", {
                plugins: ["remove_button"],
                maxItems: null, // permite varios
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "Seleccione integrantes..."
            });
        });
    </script>



    <!-- TomSelect JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

@endsection
