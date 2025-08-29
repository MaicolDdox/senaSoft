{{-- Transformando paginación básica en diseño SENA profesional --}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center mt-8">
        <div class="bg-card rounded-lg shadow-sm border border-border p-2">
            <ul class="inline-flex items-center space-x-1">
                {{-- Botón anterior con iconografía SENA --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="inline-flex items-center space-x-2 px-4 py-2 bg-muted/50 text-muted-foreground rounded-md cursor-not-allowed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            <span class="font-medium">Anterior</span>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" 
                           class="inline-flex items-center space-x-2 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 transition-all duration-200 shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            <span class="font-medium">Anterior</span>
                        </a>
                    </li>
                @endif

                {{-- Números de página con diseño mejorado --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li>
                            <span class="px-3 py-2 text-muted-foreground font-medium">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-primary text-white rounded-md font-bold shadow-sm">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" 
                                       class="inline-flex items-center justify-center w-10 h-10 bg-muted/30 text-foreground rounded-md hover:bg-muted/50 transition-all duration-200 font-medium focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Botón siguiente con iconografía SENA --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" 
                           class="inline-flex items-center space-x-2 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 transition-all duration-200 shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <span class="font-medium">Siguiente</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </li>
                @else
                    <li>
                        <span class="inline-flex items-center space-x-2 px-4 py-2 bg-muted/50 text-muted-foreground rounded-md cursor-not-allowed">
                            <span class="font-medium">Siguiente</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </div>

        {{-- Información adicional de paginación --}}
        <div class="ml-4 flex items-center text-sm text-muted-foreground">
            <span class="bg-muted/30 px-3 py-2 rounded-md">
                Mostrando {{ $paginator->firstItem() ?? 0 }} - {{ $paginator->lastItem() ?? 0 }} 
                de {{ $paginator->total() }} resultados
            </span>
        </div>
    </nav>
@endif
