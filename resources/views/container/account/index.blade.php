@extends('layouts.dashboard')
@section('content')
<div class="max-w-4xl mx-auto">
    {{-- Aplicando header estandarizado SENA --}}
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-foreground mb-2">Mis Datos Personales</h1>
                <p class="text-muted-foreground">Completa tu información personal para el sistema CEFA</p>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Aplicando mensaje de éxito estandarizado SENA --}}
    @if (session('success'))
        <div class="mb-6 bg-primary/10 border border-primary/20 text-primary px-4 py-3 rounded-lg flex items-center space-x-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Aplicando diseño de card estandarizado SENA --}}
    <div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden">
        <div class="px-6 py-4 border-b border-border bg-muted/30">
            <h3 class="text-lg font-semibold text-foreground">Información Personal</h3>
            <p class="text-sm text-muted-foreground">Completa todos los campos requeridos</p>
        </div>

        <form action="{{ route('data_users.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Aplicando estilos de input estandarizados SENA --}}
                <div class="space-y-2">
                    <label for="tipo_documento" class="text-sm font-medium text-foreground">
                        Tipo de Documento
                    </label>
                    <select name="tipo_documento" id="tipo_documento"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        @foreach (['Registro Civil', 'Tarjeta de Identidad', 'Cédula de Ciudadanía', 'Cédula de Extranjería', 'Pasaporte', 'DNI'] as $opt)
                            <option value="{{ $opt }}" @selected(optional($dataUser)->tipo_documento === $opt)>
                                {{ $opt }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipo_documento')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="numero_documento" class="text-sm font-medium text-foreground">
                        Número de Documento
                    </label>
                    <input type="text" name="numero_documento" id="numero_documento"
                        value="{{ old('numero_documento', optional($dataUser)->numero_documento) }}"
                        placeholder="Ingresa tu número de documento"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('numero_documento')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="genero" class="text-sm font-medium text-foreground">
                        Género
                    </label>
                    <input type="text" name="genero" id="genero"
                        value="{{ old('genero', optional($dataUser)->genero) }}"
                        placeholder="Masculino, Femenino, Otro"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('genero')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="rh" class="text-sm font-medium text-foreground">
                        Tipo de Sangre (RH)
                    </label>
                    <input type="text" name="rh" id="rh" value="{{ old('rh', optional($dataUser)->rh) }}"
                        placeholder="O+, A+, B+, AB+, O-, A-, B-, AB-"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('rh')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="eps" class="text-sm font-medium text-foreground">
                        EPS
                    </label>
                    <input type="text" name="eps" id="eps" value="{{ old('eps', optional($dataUser)->eps) }}"
                        placeholder="Nombre de tu EPS"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('eps')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="telefono" class="text-sm font-medium text-foreground">
                        Teléfono
                    </label>
                    <input type="text" name="telefono" id="telefono"
                        value="{{ old('telefono', optional($dataUser)->telefono) }}"
                        placeholder="Número de teléfono"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('telefono')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="tipo_programa" class="text-sm font-medium text-foreground">
                        Tipo de Programa
                    </label>
                    <select name="tipo_programa" id="tipo_programa"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        @foreach (['tecnico', 'tecnologo', 'complementaria'] as $opt)
                            <option value="{{ $opt }}" @selected(optional($dataUser)->tipo_programa === $opt)>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipo_programa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="programa_formacion" class="text-sm font-medium text-foreground">
                        Programa de Formación
                    </label>
                    <input type="text" name="programa_formacion" id="programa_formacion"
                        value="{{ old('programa_formacion', optional($dataUser)->programa_formacion) }}"
                        placeholder="Nombre del programa de formación"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('programa_formacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="ficha_programa" class="text-sm font-medium text-foreground">
                        Ficha del Programa
                    </label>
                    <input type="text" name="ficha_programa" id="ficha_programa"
                        value="{{ old('ficha_programa', optional($dataUser)->ficha_programa) }}"
                        placeholder="Número de ficha"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('ficha_programa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="apoyos" class="text-sm font-medium text-foreground">
                        Apoyos
                    </label>
                    <input type="text" name="apoyos" id="apoyos"
                        value="{{ old('apoyos', optional($dataUser)->apoyos) }}"
                        placeholder="Apoyos recibidos"
                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('apoyos')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Aplicando componente de file upload estandarizado SENA --}}
                <div class="space-y-2 md:col-span-2">
                    <label class="text-sm font-medium text-foreground">
                        Formato de Registro (PDF)
                    </label>
                    
                    <div class="relative">
                        <input type="file" 
                               name="formato_registro" 
                               accept=".pdf"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                               onchange="handleFileSelect(this)">
                        
                        <div class="border-2 border-dashed border-border hover:border-primary/50 rounded-lg p-6 bg-muted/30 hover:bg-primary/5 transition-colors duration-200 text-center">
                            <div class="flex flex-col items-center space-y-2">
                                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-foreground">Seleccionar formato de registro</p>
                                    <p class="text-xs text-muted-foreground">Solo archivos PDF</p>
                                </div>
                            </div>
                            
                            <div class="hidden mt-4 p-3 bg-primary/10 border border-primary/20 rounded-lg" data-file-info>
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-primary truncate" data-file-name></p>
                                        <p class="text-xs text-primary/70" data-file-size></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (optional($dataUser)->formato_registro)
                        <div class="mt-3 p-3 bg-secondary border border-border rounded-lg">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <a href="{{ Storage::url($dataUser->formato_registro) }}" target="_blank"
                                   class="text-sm font-medium text-foreground hover:text-primary transition-colors duration-200">
                                    Ver archivo actual
                                </a>
                            </div>
                        </div>
                    @endif

                    @error('formato_registro')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Aplicando botón estandarizado SENA --}}
            <div class="pt-6 border-t border-border flex justify-end">
                <button type="submit"
                    class="bg-primary hover:bg-primary/90 text-primary-foreground px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Guardar Datos Personales</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Script simplificado para manejo de archivos --}}
<script>
function handleFileSelect(input) {
    const container = input.closest('.relative');
    const fileInfo = container.querySelector('[data-file-info]');
    const fileName = container.querySelector('[data-file-name]');
    const fileSize = container.querySelector('[data-file-size]');
    const dropZone = container.querySelector('.border-dashed');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        fileInfo.classList.remove('hidden');
        dropZone.classList.add('border-primary', 'bg-primary/5');
        dropZone.classList.remove('border-border');
    } else {
        fileInfo.classList.add('hidden');
        dropZone.classList.remove('border-primary', 'bg-primary/5');
        dropZone.classList.add('border-border');
    }
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
</script>
@endsection
