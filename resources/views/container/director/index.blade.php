@extends('layouts.dashboard')
@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Reemplazando header Bootstrap con diseño SENA profesional -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Gestión de Directores</h1>
                    <p class="text-muted-foreground">Administra los directores del sistema CEFA</p>
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

        <!-- Convirtiendo mensaje de éxito a diseño SENA -->
        @if (session('success'))
            <div
                class="mb-6 bg-primary/10 border border-primary/20 text-primary px-4 py-3 rounded-lg flex items-center space-x-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Reemplazando botón Bootstrap con diseño SENA -->
        <div class="mb-6 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="bg-card rounded-lg px-4 py-2 border border-border">
                    <span class="text-sm text-muted-foreground">Total: </span>
                    <span class="font-semibold text-foreground">{{ $directores->count() }} directores</span>
                </div>
            </div>
            <a href="{{ route('directores.create') }}"
                class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Crear Nuevo Director</span>
            </a>
        </div>

        <!-- Convirtiendo tabla Bootstrap a diseño SENA moderno -->
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <h3 class="text-lg font-semibold text-foreground">Lista de Directores</h3>
                <p class="text-sm text-muted-foreground">Gestiona y administra los directores del sistema</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-muted/50">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                #
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                Director
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                Correo Electrónico
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse ($directores as $index => $director)
                            <tr class="hover:bg-muted/30 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center w-8 h-8 bg-primary/10 rounded-full">
                                        <span class="text-sm font-medium text-primary">{{ $index + 1 }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-foreground">{{ $director->name }}</div>
                                            <div class="text-xs text-muted-foreground">Director</div>
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

    {{-- Paginación con diseño mejorado --}}
    @if ($directores->hasPages())
        <div class="mt-6">
            {{ $directores->links() }}
        </div>
    @endif
    </div>
@endsection
