@extends('layouts.dashboard')
@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Gestión de Lideres de Semilleros</h1>
                    <p class="text-muted-foreground">Administra los Lideres de semilleros del sistema CEFA</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>



        <!-- tabla -->
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
            {{-- Header de la tabla con botón de acción mejorado y formulario de búsqueda agregado --}}
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Listado de Semilleros</h3>
                            <form id="searchFormDirector" action="{{ route('directores.index') }}" method="GET"
                                class="mb-6">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-muted-foreground"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <input type="text" name="q" id="searchDirector" value="{{ request('q') }}"
                                            placeholder="Buscar Lider de semillero..."
                                            class="pl-10 pr-4 py-2 border border-border rounded-lg bg-background text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 w-64">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @can('directores.create')
                        <a href="{{ route('container.director.create') }}"
                            class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Nuevo Lider de semillero</span>
                        </a>
                    @endcan
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-muted/50">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                #</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                Lideres</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                Correo Electrónico</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="directoresTable" class="divide-y divide-border">
                        @forelse ($liderSemilleros as $index => $director)
                            <tr class="hover:bg-muted/30 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-muted-foreground">{{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-foreground">{{ $director->name }}</p>
                                            <p class="text-xs text-muted-foreground">Lider de semilleros</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm text-foreground">{{ $director->email }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">

                                        {{-- Botón editar rediseñado con iconografía SENA --}}
                                        <a href="{{ route('directores.edit', $director->id) }}"
                                            class="bg-amber-100 hover:bg-amber-200 text-amber-700 p-2 rounded-lg transition-colors duration-200 group"
                                            title="Editar director">
                                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        {{-- Botón eliminar rediseñado con iconografía SENA --}}
                                        <form action="{{ route('directores.destroy', $director->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar este director?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200 group"
                                                title="Eliminar director">
                                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>


                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- Mejorando estado vacío con diseño SENA -->
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-muted rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-muted-foreground" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-foreground mb-1">No hay directores
                                                registrados</h3>
                                            <p class="text-muted-foreground mb-4">Comienza agregando el primer director al
                                                sistema</p>
                                            <a href="{{ route('directores.create') }}"
                                                class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 inline-flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                <span>Crear Primer Director</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($liderSemilleros->hasPages())
        <div id="paginationDirector" class="mt-6">
            {{ $liderSemilleros->links() }}
        </div>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('searchDirector');
            const form = document.getElementById('searchFormDirector');
            const table = document.getElementById('directoresTable');
            const pagination = document.getElementById('paginationDirector');
            let timer = null,
                controller = null;
            const DEBOUNCE = 150; // ms - ajusta a 100 o 0 si quieres aún más "instantáneo"

            // seguridad: si falta algo, salimos y mostramos error en consola
            if (!form || !input || !table) {
                console.warn(
                    'AJAX search: faltan elementos (form/input/table). Verifica IDs: searchFormDirector, searchDirector, directoresTable'
                );
                return;
            }

            // prevenir submit tradicional (Enter)
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                ajaxLoad(buildUrl());
            });

            function ajaxLoad(url) {
                if (!url) return;
                // abort previo si existe
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

                        // buscamos los nodos en la respuesta
                        const newTable = doc.getElementById('directoresTable');
                        const newPagination = doc.getElementById('paginationDirector');

                        if (newTable && table) table.innerHTML = newTable.innerHTML;
                        if (pagination) pagination.innerHTML = newPagination ? newPagination.innerHTML : '';

                        // volver a enlazar los links de paginación (para AJAX)
                        bindPaginationLinks();
                    })
                    .catch(err => {
                        if (err.name !== 'AbortError') {
                            console.error('Error en ajaxLoad:', err);
                        }
                    });
            }

            function buildUrl() {
                // FormData incluye el campo 'q'
                const params = new URLSearchParams(new FormData(form));
                // si action está vacío, toma location.pathname
                const base = form.action || window.location.pathname;
                return `${base}?${params.toString()}`;
            }

            function bindPaginationLinks() {
                document.querySelectorAll('#paginationDirector a').forEach(a => {
                    a.removeEventListener('click', handlePaginationClick); // evitar duplicados
                    a.addEventListener('click', handlePaginationClick);
                });
            }

            function handlePaginationClick(e) {
                e.preventDefault();
                const href = e.currentTarget.href;
                if (href) ajaxLoad(href);
            }

            // input debounced (en "tiempo real" pero con protección)
            input.addEventListener('input', () => {
                clearTimeout(timer);
                timer = setTimeout(() => ajaxLoad(buildUrl()), DEBOUNCE);
            });

            // enlazar links inicialmente
            bindPaginationLinks();
        });
    </script>
@endsection
