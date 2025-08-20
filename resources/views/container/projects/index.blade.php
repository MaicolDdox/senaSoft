@extends('layouts.dashboard')

@section('content')
    @can('projects.index')
        <div class="container mx-auto max-w-4xl px-4 py-8">
            <h1 class="text-2xl font-semibold text-black mb-6">Lista de Proyectos</h1>

            <!-- Success/Error messages -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-sm mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Filter by phase -->
            <div class="mb-6">
                <form action="{{ route('projects.index') }}" method="GET" class="flex items-center space-x-4">
                    <label for="phase" class="text-sm font-medium text-black">Filtrar por fase:</label>
                    <select name="phase" id="phase" class="px-3 py-2 border border-black rounded-sm focus:outline-none focus:ring-2 focus:ring-green-600">
                        <option value="">Todas las fases</option>
                        <option value="propuesta" {{ request('phase') == 'propuesta' ? 'selected' : '' }}>Propuesta</option>
                        <option value="análisis" {{ request('phase') == 'análisis' ? 'selected' : '' }}>Análisis</option>
                        <option value="diseño" {{ request('phase') == 'diseño' ? 'selected' : '' }}>Diseño</option>
                        <option value="desarrollo" {{ request('phase') == 'desarrollo' ? 'selected' : '' }}>Desarrollo</option>
                        <option value="prueba" {{ request('phase') == 'prueba' ? 'selected' : '' }}>Prueba</option>
                        <option value="implantación" {{ request('phase') == 'implantación' ? 'selected' : '' }}>Implantación</option>
                    </select>
                    <button type="submit" class="px-5 py-2 bg-black text-white hover:bg-green-600 rounded-sm text-sm font-semibold transition-all">Filtrar</button>
                </form>
            </div>

            <!-- Create project button -->
            @can('projects.create')
                <div class="mb-6">
                    <a href="{{ route('projects.create') }}" class="inline-block px-5 py-2 bg-black text-white hover:bg-green-600 rounded-sm text-sm font-semibold transition-all">Agregar Proyecto</a>
                </div>
            @endcan

            <!-- Projects table -->
            <div class="overflow-x-auto">
                <table class="w-full border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left text-sm font-medium text-black">Nombre</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-black">Descripción</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-black">Fase Actual</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-black">Semillero</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-black">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr class="border-b border-black">
                                <td class="px-4 py-2 text-sm text-black">{{ $project->name }}</td>
                                <td class="px-4 py-2 text-sm text-black">{{ $project->description ?? '-' }}</td>
                                <td class="px-4 py-2 text-sm text-black">{{ ucfirst($project->current_phase) }}</td>
                                <td class="px-4 py-2 text-sm text-black">{{ $project->semillero->name }}</td>
                                <td class="px-4 py-2 text-sm">
                                    <a href="{{ route('projects.show', $project) }}" class="text-green-600 hover:underline mr-2">Ver</a>
                                    @can('projects.edit')
                                        <a href="{{ route('projects.edit', $project) }}" class="text-green-600 hover:underline mr-2">Editar</a>
                                    @endcan
                                    @can('projects.delete')
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    @endcan
                                    @can('projects.advance')
                                        @if ($project->current_phase !== 'implantación')
                                            <a href="{{ route('projects.advance', $project) }}" class="text-green-600 hover:underline">Avanzar Fase</a>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-sm text-black text-center">No hay proyectos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="container mx-auto max-w-4xl px-4 py-8">
            <p class="text-red-600">No tienes permiso para ver esta página.</p>
        </div>
    @endcan
@endsection