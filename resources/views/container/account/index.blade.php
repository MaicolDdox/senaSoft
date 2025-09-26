@extends('layouts.dashboard')
@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold text-foreground mb-8">
        Mis Datos Personales
    </h1>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="flex items-start p-4 mb-6 rounded-xl border border-green-300 bg-green-50 text-green-800 shadow-sm">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5 mr-3" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <form action="{{ route('data_users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Tipo de documento --}}
            <div class="space-y-2">
                <label for="tipo_documento" class="block text-sm font-medium text-foreground">Tipo de Documento</label>
                <select name="tipo_documento" id="tipo_documento"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
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

            {{-- Número de documento --}}
            <div class="space-y-2">
                <label for="numero_documento" class="block text-sm font-medium text-foreground">Número de
                    Documento</label>
                <input type="text" name="numero_documento" id="numero_documento"
                    value="{{ old('numero_documento', optional($dataUser)->numero_documento) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('numero_documento')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Género --}}
            <div class="space-y-2">
                <label for="genero" class="block text-sm font-medium text-foreground">Género</label>
                <input type="text" name="genero" id="genero"
                    value="{{ old('genero', optional($dataUser)->genero) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('genero')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- RH --}}
            <div class="space-y-2">
                <label for="rh" class="block text-sm font-medium text-foreground">RH</label>
                <input type="text" name="rh" id="rh" value="{{ old('rh', optional($dataUser)->rh) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('rh')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- EPS --}}
            <div class="space-y-2">
                <label for="eps" class="block text-sm font-medium text-foreground">EPS</label>
                <input type="text" name="eps" id="eps" value="{{ old('eps', optional($dataUser)->eps) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('eps')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Teléfono --}}
            <div class="space-y-2">
                <label for="telefono" class="block text-sm font-medium text-foreground">Teléfono</label>
                <input type="text" name="telefono" id="telefono"
                    value="{{ old('telefono', optional($dataUser)->telefono) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('telefono')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tipo de programa --}}
            <div class="space-y-2">
                <label for="tipo_programa" class="block text-sm font-medium text-foreground">Tipo de Programa</label>
                <select name="tipo_programa" id="tipo_programa"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
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

            {{-- Programa de formación --}}
            <div class="space-y-2">
                <label for="programa_formacion" class="block text-sm font-medium text-foreground">Programa de
                    Formación</label>
                <input type="text" name="programa_formacion" id="programa_formacion"
                    value="{{ old('programa_formacion', optional($dataUser)->programa_formacion) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('programa_formacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ficha del programa --}}
            <div class="space-y-2">
                <label for="ficha_programa" class="block text-sm font-medium text-foreground">Ficha del Programa</label>
                <input type="text" name="ficha_programa" id="ficha_programa"
                    value="{{ old('ficha_programa', optional($dataUser)->ficha_programa) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('ficha_programa')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Apoyos --}}
            <div class="space-y-2">
                <label for="apoyos" class="block text-sm font-medium text-foreground">Apoyos</label>
                <input type="text" name="apoyos" id="apoyos"
                    value="{{ old('apoyos', optional($dataUser)->apoyos) }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @error('apoyos')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Formato de registro (PDF) --}}
            <div class="space-y-2 md:col-span-2">
                <label for="formato_registro" class="block text-sm font-medium text-foreground">Formato de Registro
                    (PDF)</label>
                <input type="file" name="formato_registro" id="formato_registro"
                    class="w-full rounded-lg border border-border bg-background text-foreground px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
                @if (optional($dataUser)->formato_registro)
                    <p class="text-sm mt-1">
                        <a href="{{ Storage::url($dataUser->formato_registro) }}" target="_blank"
                            class="text-primary underline">
                            Ver archivo actual
                        </a>
                    </p>
                @endif
                @error('formato_registro')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="pt-6 border-t border-border flex justify-end">
            <button type="submit"
                class="px-6 py-3 rounded-lg bg-primary text-white font-medium shadow hover:bg-primary/90 transition-all duration-200">
                Guardar Datos
            </button>
        </div>
    </form>
</div>
@endsection