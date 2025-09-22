<!-- Directores Section -->
@if (auth()->user()->can('directores.index') || auth()->user()->can('directores.create'))
    <div class="mb-6">
        <h3 class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
            Directores
        </h3>
        <ul class="space-y-1">
            @can('directores.index')
                <li>
                    <a href="{{ route('directores.index') }}"
                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('directores.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Ver Directores
                    </a>
                </li>
            @endcan
            @can('directores.create')
                <li>
                    <a href="{{ route('directores.create') }}"
                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('directores.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Crear Director
                    </a>
                </li>
            @endcan
        </ul>
    </div>
@endif
