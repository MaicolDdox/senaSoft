@extends('layouts.dashboard')
@section('content')
{{-- Reemplazando diseño básico con diseño SENA profesional --}}
<div class="max-w-4xl mx-auto">
    {{-- Header mejorado con iconografía SENA --}}
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-foreground mb-2">Editar Aprendiz</h1>
                <p class="text-muted-foreground">Actualiza la información del aprendiz en el sistema CEFA</p>
            </div>
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Mejorando mensajes de error con diseño SENA --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h4 class="font-medium text-red-800 mb-2">Se encontraron los siguientes errores:</h4>
                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- Formulario rediseñado con estilo SENA profesional --}}
    <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border bg-muted/30">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-foreground">Información del Aprendiz</h3>
                    <p class="text-sm text-muted-foreground">Actualiza los datos del aprendiz</p>
                </div>
            </div>
        </div>

        <form action="{{ route('aprendices.update', $aprendiz->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Campo nombre con iconografía mejorada --}}
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-foreground">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Nombre Completo</span>
                        </div>
                    </label>
                    <input type="text" id="name" name="name"
                           value="{{ old('name', $aprendiz->name) }}"
                           class="w-full px-3 py-2 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200"
                           placeholder="Ingresa el nombre completo"
                           required>
                </div>

                {{-- Campo email con iconografía mejorada --}}
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-foreground">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                            <span>Correo Electrónico</span>
                        </div>
                    </label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email', $aprendiz->email) }}"
                           class="w-full px-3 py-2 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200"
                           placeholder="ejemplo@correo.com"
                           required>
                </div>
            </div>

            {{-- Botones rediseñados con estilo SENA --}}
            <div class="flex justify-between items-center mt-8 pt-6 border-t border-border">
                <a href="{{ route('aprendices.index') }}"
                   class="bg-muted hover:bg-muted/80 text-muted-foreground px-6 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Cancelar</span>
                </a>
                <button type="submit"
                        class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Actualizar Aprendiz</span>
                </button>
            </div>
        </form>
    </div>

    {{-- Agregando información adicional con diseño SENA --}}
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-start space-x-3">
            <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h4 class="font-medium text-blue-800 mb-1">Actualización de Datos</h4>
                <p class="text-sm text-blue-700">Los cambios realizados se aplicarán inmediatamente. El aprendiz podrá acceder al sistema con la información actualizada.</p>
            </div>
        </div>
    </div>
</div>
@endsection
