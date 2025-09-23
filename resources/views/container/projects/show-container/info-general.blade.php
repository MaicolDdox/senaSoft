<div class="bg-card rounded-lg shadow-sm border border-border overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-border bg-muted/30">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-foreground">Información General</h3>
                <p class="text-sm text-muted-foreground">Datos principales del proyecto de investigación</p>
            </div>
        </div>
    </div>


    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 0 012 2" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground">Nombre del Proyecto</p>
                        <p class="text-foreground font-semibold">{{ $project->nombre }}</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground">Semillero</p>
                        <p class="text-foreground font-semibold">
                            {{ $project->semillero->titulo ?? 'Sin semillero asignado' }}</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground">Director</p>
                        <p class="text-foreground font-semibold">
                            {{ $project->director->name ?? 'Sin director asignado' }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground">Fase Actual</p>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary/10 text-primary border border-primary/20">
                            {{ ucfirst($project->fase_actual) }}
                        </span>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground">Fecha de Inicio</p>
                        <p class="text-foreground font-semibold">
                            {{ $project->fecha_inicio ? \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') : 'No definida' }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground">Fecha de Finalización</p>
                        <p class="text-foreground font-semibold">
                            {{ $project->fecha_fin ? \Carbon\Carbon::parse($project->fecha_fin)->format('d/m/Y') : 'Pendiente' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if ($project->descripcion)
            <div class="mt-6 pt-6 border-t border-border">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-muted-foreground mb-2">Descripción</p>
                        <p class="text-foreground leading-relaxed">{{ $project->descripcion }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
