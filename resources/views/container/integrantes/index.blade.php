@extends('layouts.dashboard')
@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Reemplazando header básico con diseño SENA profesional --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Lista de Aprendices</h1>
                    <p class="text-muted-foreground">Gestiona y administra los aprendices registrados en el sistema CEFA</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <a href="{{ route('aprendices.create') }}"
                        class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Nuevo Aprendiz</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Convirtiendo mensajes de éxito a diseño SENA --}}
        @if (session('success'))
            <div class="mb-6 bg-primary/10 border border-primary/20 text-primary px-4 py-4 rounded-lg">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Reemplazando tabla básica con diseño SENA moderno --}}
        <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
            <div class="px-6 py-4 border-b border-border bg-muted/30">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Aprendices Registrados</h3>
                        <p class="text-sm text-muted-foreground">{{ count($aprendices) }} aprendices en total</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-muted-foreground">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Gestión de Aprendices</span>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-muted/50 border-b border-border">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-muted-foreground">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-muted-foreground">Aprendiz</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-muted-foreground">Correo Electrónico
                            </th>
                            @can('integrantes.create')
                                <th class="px-6 py-4 text-center text-sm font-medium text-muted-foreground">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse ($aprendices as $index => $aprendiz)
                            <tr class="hover:bg-muted/30 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-muted-foreground">{{ $index + 1 }}</td>
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
                                            <p class="text-sm font-medium text-foreground">{{ $aprendiz->name }}</p>
                                            <p class="text-xs text-muted-foreground">Aprendiz CEFA</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-foreground">{{ $aprendiz->email }}</td>
                                @can('integrantes.create')
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center space-x-2">
                                            {{-- Reemplazando botones básicos con diseño SENA --}}
                                            <a href="{{ route('aprendices.edit', $aprendiz->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center space-x-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <span>Editar</span>
                                            </a>

                                            <form action="{{ route('aprendices.destroy', $aprendiz->id) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('¿Seguro que deseas eliminar este aprendiz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center space-x-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span>Eliminar</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @empty
                            {{-- Mejorando estado vacío con diseño SENA --}}
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-muted rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-muted-foreground" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-lg font-medium text-foreground mb-1">No hay aprendices
                                                registrados</h3>
                                            <p class="text-sm text-muted-foreground mb-4">Comienza registrando el primer
                                                aprendiz en el sistema</p>
                                            <a href="{{ route('aprendices.create') }}"
                                                class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 inline-flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                <span>Registrar Primer Aprendiz</span>
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

        {{-- Agregando información adicional con diseño SENA --}}
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h4 class="font-medium text-blue-800 mb-1">Gestión de Aprendices</h4>
                    <p class="text-sm text-blue-700">Los aprendices pueden acceder al sistema con sus credenciales para
                        participar en grupos de semilleros de investigación y gestionar sus proyectos académicos.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
