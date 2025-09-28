@extends('layouts.dashboard')

@section('content')
    {{-- Reemplazando diseño básico con diseño SENA profesional --}}
    <div class="max-w-6xl mx-auto">
        {{-- Header mejorado con iconografía específica para proyectos con integrantes --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Proyectos con Integrantes</h1>
                    <p class="text-muted-foreground">Visualiza la asociación de aprendices e instructores en cada proyecto de
                        investigación
                    </p>
                    {{-- Buscador en tiempo real --}}
                    <div class="px-6 py-4 border-b border-border bg-muted/30 mb-6">
                        <form id="searchFormIntegrantes" action="{{ route('project_integrantes.index') }}" method="GET"
                            class="flex items-center space-x-2">
                            <input type="text" name="q" id="searchIntegrantes" value="{{ $q ?? '' }}"
                                placeholder="Buscar proyectos, integrantes, semilleros o directores..."
                                class="flex-1 px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                        </form>
                    </div>

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
        <div id="integrantesContainer" class="space-y-6">
            @forelse ($projects as $project)
                <div
                    class="bg-card rounded-lg shadow-sm border border-border overflow-hidden hover:shadow-md transition-shadow duration-200">
                    {{-- Header del proyecto con información principal --}}
                    <div class="px-6 py-4 border-b border-border bg-gradient-to-r ">
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
                                @php
                                    $aprendices = $project->integrantes->filter(
                                        fn($i) => $i->hasRole('aprendiz_integrado'),
                                    );
                                    $instructores = $project->integrantes->filter(
                                        fn($i) => $i->hasRole('instructor_integrado'),
                                    );
                                @endphp

                                @if ($aprendices->count() > 0)
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full flex items-center space-x-1">
                                        <span class="text-xs">Aprendices</span>
                                        <span>{{ $aprendices->count() }}</span>
                                    </span>
                                @endif

                                @if ($instructores->count() > 0)
                                    <span
                                        class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full flex items-center space-x-1">
                                        <span class="text-xs">Instructores</span>
                                        <span>{{ $instructores->count() }}</span>
                                    </span>
                                @endif

                                @if ($project->integrantes->count() === 0)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm font-medium rounded-full">
                                        Sin integrantes
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Contenido del proyecto con lista de integrantes --}}
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-4">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                            <h4 class="text-lg font-semibold text-foreground">Integrantes del Equipo</h4>
                            <div class="flex items-center space-x-2 text-xs">
                                <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-full"> Aprendices</span>
                                <span class="px-2 py-1 bg-green-50 text-green-700 rounded-full"> Instructores</span>
                            </div>
                        </div>

                        @forelse($project->integrantes as $integrante)
                            @if ($loop->first)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @endif

                            @php
                                $isAprendiz = $integrante->hasRole('aprendiz_integrado');
                                $isInstructor = $integrante->hasRole('instructor_integrado');

                                $roleClass = $isAprendiz
                                    ? 'bg-blue-50 border-blue-200'
                                    : 'bg-green-50 border-green-200';
                                $roleText = $isAprendiz ? 'Aprendiz' : 'Instructor';
                                $roleTextColor = $isAprendiz ? 'text-blue-700' : 'text-green-700';
                            @endphp

                            <div
                                class="flex items-center justify-between p-3 {{ $roleClass }} rounded-lg border hover:shadow-sm transition-all duration-200">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">
                                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center space-x-2">
                                            <p class="font-medium text-foreground truncate">{{ $integrante->name }}</p>
                                            <span
                                                class="px-1.5 py-0.5 text-xs {{ $roleTextColor }} bg-white rounded-full font-medium">
                                                {{ $roleText }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-muted-foreground truncate">
                                            {{ $integrante->email ?? 'Sin email' }}
                                        </p>
                                    </div>
                                </div>
                                @can('project_integrantes.create')
                                    {{-- Botón eliminar rediseñado con iconografía SENA --}}
                                    <form action="{{ route('project.aprendices.destroy', [$project->id, $integrante->id]) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar a {{ $integrante->name }} del proyecto {{ $project->nombre }}? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200 group"
                                            title="Eliminar {{ $roleText }}">
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
                <p class="text-muted-foreground font-medium">No hay integrantes asociados</p>
                <p class="text-sm text-muted-foreground mt-1">Este proyecto aún no tiene integrantes vinculados</p>
                @can('project_integrantes.create')
                    <a href="{{ route('project_integrantes.create') }}"
                        class="inline-flex items-center space-x-2 px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg text-sm font-medium transition-colors duration-200 mt-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Asociar Integrantes</span>
                    </a>
                @endcan
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
                        <strong> Los aprendices</strong> participan activamente desarrollando habilidades prácticas y
                        contribuyendo al proyecto.
                        <strong> Los instructores</strong> brindan mentoría técnica y guían el desarrollo del equipo.
                        Ambos tipos de integrantes colaboran bajo la supervisión del director asignado.
                        <strong>Puedes eliminar integrantes del proyecto cuando sea necesario, pero esta acción no se puede
                            deshacer.</strong>
                    </p>
                </div>
            </div>
        </div>
    @endif
    </div>

    @if ($projects->hasPages())
        <div id="paginationIntegrantes" class="mt-6">
            {{ $projects->links() }}
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('searchIntegrantes');
            const form = document.getElementById('searchFormIntegrantes');
            const container = document.getElementById('integrantesContainer');
            const pagination = document.getElementById('paginationIntegrantes');
            let timer = null,
                controller = null;
            const DEBOUNCE = 150;

            if (!form || !input || !container) {
                console.warn('AJAX search: faltan IDs en project_integrantes');
                return;
            }

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                ajaxLoad(buildUrl());
            });

            function ajaxLoad(url) {
                if (controller) controller.abort();
                controller = new AbortController();

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        signal: controller.signal
                    })
                    .then(r => r.text())
                    .then(html => {
                        const doc = new DOMParser().parseFromString(html, 'text/html');
                        const newContainer = doc.getElementById('integrantesContainer');
                        const newPagination = doc.getElementById('paginationIntegrantes');

                        if (newContainer && container) container.innerHTML = newContainer.innerHTML;
                        if (pagination) pagination.innerHTML = newPagination ? newPagination.innerHTML : '';

                        bindPaginationLinks();
                    })
                    .catch(err => {
                        if (err.name !== 'AbortError') console.error('Error en ajaxLoad:', err);
                    });
            }

            function buildUrl() {
                const params = new URLSearchParams(new FormData(form));
                const base = form.action || window.location.pathname;
                return `${base}?${params.toString()}`;
            }

            function bindPaginationLinks() {
                document.querySelectorAll('#paginationIntegrantes a').forEach(a => {
                    a.addEventListener('click', function(e) {
                        e.preventDefault();
                        ajaxLoad(this.href);
                    });
                });
            }

            input.addEventListener('input', () => {
                clearTimeout(timer);
                timer = setTimeout(() => ajaxLoad(buildUrl()), DEBOUNCE);
            });

            bindPaginationLinks();
        });
    </script>

@endsection
