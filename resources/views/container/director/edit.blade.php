@extends('layouts.dashboard')
@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Reemplazando header básico con diseño SENA profesional -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-foreground mb-2">Editar Director</h1>
                <p class="text-muted-foreground">Modifica la información del director en el sistema CEFA</p>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Convirtiendo mensajes de error a diseño SENA -->
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-4 rounded-lg">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h4 class="font-semibold mb-2">Ups! Hubo algunos problemas con los datos ingresados:</h4>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Reemplazando card simple con diseño SENA moderno -->
    <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border bg-muted/30">
            <h3 class="text-lg font-semibold text-foreground">Información del Director</h3>
            <p class="text-sm text-muted-foreground">Actualice los datos del director {{ $directore->name }}</p>
        </div>
        
        <div class="p-6">
            <form action="{{ route('directores.update', $directore) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Convirtiendo campos básicos a diseño SENA con iconos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div class="space-y-2">
                        <label for="name" class="text-sm font-medium text-foreground flex items-center space-x-2">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Nombre del Director</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 bg-background text-foreground placeholder-muted-foreground" 
                               value="{{ old('name', $directore->name) }}" 
                               placeholder="Ingrese el nombre completo"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-foreground flex items-center space-x-2">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Correo Electrónico</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               id="email"
                               class="w-full px-4 py-3 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 bg-background text-foreground placeholder-muted-foreground" 
                               value="{{ old('email', $directore->email) }}" 
                               placeholder="director@cefa.edu.co"
                               required>
                    </div>
                </div>

                <!-- Reemplazando botones básicos con diseño SENA profesional -->
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-border">
                    <a href="{{ route('directores.index') }}" 
                       class="w-full sm:w-auto bg-secondary hover:bg-secondary/80 text-secondary-foreground px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    
                    <button type="submit" 
                            class="w-full sm:w-auto bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Guardar Cambios</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Agregando información adicional con diseño SENA -->
    <div class="mt-6 bg-amber-50 border border-amber-200 rounded-lg p-4">
        <div class="flex items-start space-x-3">
            <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div>
                <h4 class="font-medium text-amber-800 mb-1">Nota importante</h4>
                <p class="text-sm text-amber-700">Los cambios realizados se aplicarán inmediatamente. Si modifica el correo electrónico, el director deberá usar la nueva dirección para acceder al sistema.</p>
            </div>
        </div>
    </div>
</div>
@endsection
