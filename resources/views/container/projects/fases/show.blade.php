@extends('layouts.dashboard')

@section('content')
    <div class="max-w-5xl mx-auto py-8 px-4">
        <!-- Encabezado -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-foreground">
                Proyecto: {{ $project->nombre }}
            </h1>
            <p class="text-muted-foreground">
                Fase: <span class="font-semibold capitalize">{{ $fase->nombre }}</span>
            </p>
        </div>

        <!-- Tarjeta de fase -->
        <div class="bg-card shadow-md rounded-xl border border-border p-6">
            <div class="grid gap-4">
                <!-- Fechas -->
                <div class="flex flex-col sm:flex-row sm:space-x-6">
                    <div>
                        <p class="text-sm text-muted-foreground">Fecha de inicio</p>
                        <p class="font-medium">
                           {{ $fase->fecha_inicio ? \Carbon\Carbon::parse($fase->fecha_inicio)->format('d/m/Y') : 'Sin registrar' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-muted-foreground">Fecha de fin</p>
                        <p class="font-medium">
                            {{ $fase->fecha_fin ? \Carbon\Carbon::parse($fase->fecha_fin)->format('d/m/Y') : 'En curso' }}
                        </p>
                    </div>
                </div>

                <!-- Descripción -->
                <div>
                    <p class="text-sm text-muted-foreground mb-2">Descripción</p>
                    <div class="prose max-w-none text-foreground bg-muted/30 rounded-lg p-4">
                        {!! nl2br(e($fase->descripcion ?? 'Sin descripción')) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de regresar -->
        <div class="mt-6">
            <a href="{{ route('projects.show', $project) }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-primary text-white hover:bg-primary/80 transition">
                ← Volver al proyecto
            </a>
        </div>
    </div>
@endsection
