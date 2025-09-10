@extends('layouts.dashboard')

@section('content')
    {{-- Reemplazando diseño básico con diseño SENA profesional --}}
    <div class="max-w-7xl mx-auto">
        {{-- Header mejorado con iconografía específica para proyectos --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Gestión de Proyectos</h1>
                    <p class="text-muted-foreground">Administra y da seguimiento a los proyectos de investigación del CEFA
                    </p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Mejorando mensajes de éxito/error con diseño SENA --}}
        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h4 class="font-medium text-green-800 mb-1">¡Operación exitosa!</h4>
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h4 class="font-medium text-red-800 mb-1">Error en la operación</h4>
                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @can('projects.create')
            {{-- Botón crear proyecto rediseñado con estilo SENA --}}
            <div class="flex justify-end mb-6">
                <a href="{{ route('projects.create') }}"
                    class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Nuevo Proyecto</span>
                </a>
            </div>
        @endcan


        {{-- Tabla rediseñada con diseño profesional SENA --}}
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center space-x-3">
                    
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Lista de Proyectos</h3>


                        {{-- Buscador --}}
                        <form id="searchFormProjects" action="{{ route('projects.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="q" id="search" value="{{ request('q') }}"
                                    placeholder="Buscar aprendiz..."
                                    class="pl-10 pr-4 py-2 rounded-lg border border-border bg-background text-sm focus:ring-2 focus:ring-primary focus:outline-none w-64">
                                <svg class="w-4 h-4 absolute left-3 top-2.5 text-muted-foreground" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                                </svg>
                            </div>
                        </form>



                        <p class="text-sm text-muted-foreground">{{ $projects->total() }} proyectos registrados</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-border">
                    <thead class="bg-muted/50">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                Proyecto</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                Semillero</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                Director</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                Fase Actual</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                Fechas</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="projectsTable" class="bg-card divide-y divide-border">
                        @forelse($projects as $project)
                            <tr class="hover:bg-muted/30 transition-colors duration-150">
                                {{-- Columna proyecto con avatar y información mejorada --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-foreground">{{ $project->nombre }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-foreground">{{ $project->semillero->titulo ?? 'No asignado' }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-foreground">{{ $project->director->name ?? 'N/A' }}</div>
                                </td>

                                {{-- Fase actual con badge colorido --}}
                                <td class="px-6 py-4">
                                    @php
                                        $faseColors = [
                                            'formulacion' => 'bg-blue-100 text-blue-800',
                                            'ejecucion' => 'bg-orange-100 text-orange-800',
                                            'finalizacion y divulgacion' => 'bg-green-100 text-green-800',
                                        ];
                                        $colorClass = $faseColors[$project->fase_actual] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colorClass }}">
                                        {{ ucfirst($project->fase_actual) }}
                                    </span>
                                </td>

                                {{-- Fechas con mejor formato --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm text-foreground">
                                        <div class="flex items-center space-x-1 mb-1">
                                            <svg class="w-3 h-3 text-muted-foreground" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-xs text-muted-foreground">Inicio:</span>
                                            <span
                                                class="text-xs">{{ $project->fecha_inicio ? \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') : '—' }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <svg class="w-3 h-3 text-muted-foreground" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-xs text-muted-foreground">Fin:</span>
                                            <span
                                                class="text-xs">{{ $project->fecha_fin ? \Carbon\Carbon::parse($project->fecha_fin)->format('d/m/Y') : '—' }}</span>
                                        </div>
                                    </div>
                                </td>

                                {{-- Botones de acción rediseñados con iconos SVG --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('projects.show', $project) }}"
                                            class="bg-blue-100 hover:bg-blue-200 text-blue-700 p-2 rounded-lg transition-colors duration-200 group"
                                            title="Ver proyecto">
                                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        @can('projects.edit')
                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 p-2 rounded-lg transition-colors duration-200 group"
                                                title="Editar proyecto">
                                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        @endcan

                                        @can('projects.delete')
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este proyecto?')"
                                                    class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200 group"
                                                    title="Eliminar proyecto">
                                                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- Estado vacío mejorado con call-to-action --}}
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-muted/50 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-muted-foreground" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-foreground mb-1">No hay proyectos
                                                registrados</h3>
                                            <p class="text-muted-foreground mb-4">Comienza creando tu primer proyecto de
                                                investigación</p>
                                            @can('projects.create')
                                                <a href="{{ route('projects.create') }}"
                                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 inline-flex items-center space-x-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                    <span>Crear Proyecto</span>
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($projects->hasPages())
            <div id="paginationProjects" class="mt-6">
                {{ $projects->links() }}
            </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const input = document.getElementById('searchProjects');
                const form = document.getElementById('searchFormProjects');
                const table = document.getElementById('projectsTable');
                const pagination = document.getElementById('paginationProjects');
                let timer = null,
                    controller = null;
                const DEBOUNCE = 150;

                if (!form || !input || !table) {
                    console.warn('AJAX search: faltan IDs en projects (form/input/table)');
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
                            const newTable = doc.getElementById('projectsTable');
                            const newPagination = doc.getElementById('paginationProjects');

                            if (newTable && table) table.innerHTML = newTable.innerHTML;
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
                    document.querySelectorAll('#paginationProjects a').forEach(a => {
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
