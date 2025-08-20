@extends('layouts.dashboard')

@section('content')
    @can('projects.create')
        <div class="container mx-auto max-w-4xl px-4 py-8">
            <h1 class="text-2xl font-semibold text-black mb-6">Crear Proyecto</h1>

            <!-- Error messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-sm mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-black">Nombre del Proyecto</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full max-w-md px-3 py-2 border border-black rounded-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-black">Descripción (Opcional)</label>
                    <textarea name="description" id="description" class="w-full max-w-md px-3 py-2 border border-black rounded-sm focus:outline-none focus:ring-2 focus:ring-green-600">{{ old('description') }}</textarea>
                </div>
                <div>
                    <label for="semillero_id" class="block text-sm font-medium text-black">Semillero</label>
                    @if (auth()->user()->hasRole('directora'))
                        <select name="semillero_id" id="semillero_id" class="w-full max-w-md px-3 py-2 border border-black rounded-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
                            <option value="">Seleccione un semillero</option>
                            @foreach ($semilleros as $semillero)
                                <option value="{{ $semillero->id }}" {{ old('semillero_id') == $semillero->id ? 'selected' : '' }}>{{ $semillero->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <!-- For Director de Grupo, preselect their semillero -->
                        <select name="semillero_id" id="semillero_id" class="w-full max-w-md px-3 py-2 border border-black rounded-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
                            @foreach ($semilleros as $semillero)
                                <option value="{{ $semillero->id }}" selected>{{ $semillero->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div>
                    <button type="submit" class="px-5 py-2 bg-black text-white hover:bg-green-600 rounded-sm text-sm font-semibold transition-all">Crear Proyecto</button>
                </div>
            </form>
        </div>
    @else
        <div class="container mx-auto max-w-4xl px-4 py-8">
            <p class="text-red-600">No tienes permiso para crear proyectos.</p>
        </div>
    @endcan
@endsection