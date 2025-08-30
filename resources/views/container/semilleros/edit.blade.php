@extends('layouts.dashboard')

@section('content')
    {{-- Reemplazando diseño básico con diseño SENA profesional --}}
    <div class="max-w-4xl mx-auto">
        {{-- Header mejorado con iconografía SENA para edición --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">Editar Semillero</h1>
                    <p class="text-muted-foreground">Actualiza la información del semillero de investigación</p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Mejorando mensajes de error con diseño SENA --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-foreground">Actualizar Información</h3>
                        <p class="text-sm text-muted-foreground">Modifica los datos del semillero de investigación</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('semilleros.update', $semillero) }}" method="POST" class="p-6"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    {{-- Campo título con iconografía mejorada --}}
                    <div class="space-y-2">
                        <label for="titulo" class="block text-sm font-medium text-foreground">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span>Título del Semillero</span>
                            </div>
                        </label>
                        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $semillero->titulo) }}"
                            class="w-full px-3 py-2 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200"
                            placeholder="Ingresa el título del semillero" required>
                    </div>

                    {{-- Campo descripción con iconografía mejorada --}}
                    <div class="space-y-2">
                        <label for="descripcion" class="block text-sm font-medium text-foreground">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Descripción</span>
                            </div>
                        </label>
                        <textarea id="descripcion" name="descripcion" rows="4"
                            class="w-full px-3 py-2 border border-border rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors duration-200 resize-none"
                            placeholder="Describe los objetivos y alcance del semillero">{{ old('descripcion', $semillero->descripcion) }}</textarea>
                    </div>

                    {{-- Imagen actual con avatar --}}
                    <div class="flex items-center space-x-6 mb-6">
                        <div class="w-20 h-20 rounded-full overflow-hidden border border-border shadow">
                            @if ($semillero->imagen)
                                <img src="{{ asset('storage/' . $semillero->imagen) }}" alt="Imagen actual del semillero"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-muted text-muted-foreground">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-foreground">Logo actual</h3>
                            <p class="text-xs text-muted-foreground">
                                @if ($semillero->imagen)
                                    Imagen cargada correctamente
                                @else
                                    No hay imagen cargada
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Área de carga mejorada con drag & drop y diseño más grande --}}
                    <div class="relative">
                        <input type="file" id="imagen" name="imagen"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" required
                            onchange="handleFileSelect(this)">

                        <div id="dropZone"
                            class="border-2 border-dashed border-border hover:border-primary/50 rounded-lg p-8 bg-muted/20 hover:bg-muted/30 transition-all duration-300 text-center group">
                            <div class="flex flex-col items-center space-y-4">
                                {{-- Icono más grande y atractivo --}}
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>

                                {{-- Texto mejorado con mejor jerarquía visual --}}
                                <div class="space-y-2">
                                    <h4 class="text-lg font-semibold text-foreground">Seleccionar Nuevo Logo</h4>
                                    <p class="text-sm text-muted-foreground">
                                        Arrastra y suelta tu archivo aquí o
                                        <span class="text-primary font-medium hover:text-primary/80 cursor-pointer">haz
                                            clic
                                            para seleccionar</span>
                                    </p>
                                    <p class="text-xs text-muted-foreground">
                                        Formatos soportados: JPG, PNG, GIF (máx. 2MB)
                                    </p>
                                </div>

                                {{-- Información de archivo seleccionado --}}
                                <div id="fileInfo"
                                    class="hidden bg-primary/10 border border-primary/20 rounded-lg p-3 w-full max-w-sm">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p id="fileName" class="text-sm font-medium text-primary truncate"></p>
                                            <p id="fileSize" class="text-xs text-primary/70"></p>
                                        </div>
                                        <button type="button" onclick="clearFileSelection()"
                                            class="text-muted-foreground hover:text-destructive transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Campo fecha de creación con diseño mejorado --}}
                    <div class="space-y-2">
                        <label for="created_at" class="block text-sm font-medium text-foreground">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Fecha de Creación</span>
                            </div>
                        </label>
                        <input type="text" id="created_at" value="{{ $semillero->created_at->format('Y-m-d H:i') }}"
                            class="w-full px-3 py-2 border border-border rounded-lg bg-muted/50 text-muted-foreground cursor-not-allowed"
                            readonly>
                    </div>
                </div>

                {{-- Botones rediseñados con estilo SENA --}}
                <div class="flex justify-between items-center mt-8 pt-6 border-t border-border">
                    <a href="{{ route('semilleros.index') }}"
                        class="bg-muted hover:bg-muted/80 text-muted-foreground px-6 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg font-medium transition-all duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <span>Actualizar</span>
                    </button>
                </div>
            </form>
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
                    <h4 class="font-medium text-blue-800 mb-1">Actualización de Datos</h4>
                    <p class="text-sm text-blue-700">Los cambios realizados se aplicarán inmediatamente. Asegúrate de que
                        la información sea correcta antes de guardar.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript para mejorar la experiencia de usuario --}}
<script>
    function handleFileSelect(input) {
        const file = input.files[0];
        const fileInfo = document.getElementById('fileInfo');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const dropZone = document.getElementById('dropZone');

        if (file) {
            // Validar tipo de archivo
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Por favor selecciona un archivo de imagen válido (JPG, PNG, GIF)');
                clearFileSelection();
                return;
            }

            // Validar tamaño (2MB máximo)
            const maxSize = 2 * 1024 * 1024; // 2MB en bytes
            if (file.size > maxSize) {
                alert('El archivo es demasiado grande. El tamaño máximo es 2MB');
                clearFileSelection();
                return;
            }

            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            fileInfo.classList.remove('hidden');
            dropZone.classList.add('border-primary', 'bg-primary/5');
            dropZone.classList.remove('border-border');
        } else {
            clearFileSelection();
        }
    }

    function clearFileSelection() {
        const fileInput = document.getElementById('imagen');
        const fileInfo = document.getElementById('fileInfo');
        const dropZone = document.getElementById('dropZone');
        
        fileInput.value = '';
        fileInfo.classList.add('hidden');
        dropZone.classList.remove('border-primary', 'bg-primary/5');
        dropZone.classList.add('border-border');
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Drag and drop functionality
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('imagen');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-primary', 'bg-primary/10');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-primary', 'bg-primary/10');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                fileInput.files = files;
                handleFileSelect(fileInput);
            }
        }
    });
</script>
@endsection
