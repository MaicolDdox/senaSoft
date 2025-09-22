<!-- Eventos Section -->
@if (auth()->user()->can('events.index') || auth()->user()->can('events.create'))
    <div class="mb-6">
        <h3 class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
            Eventos
        </h3>
        <ul class="space-y-1">
            @can('events.index')
                <li>
                    <a href="{{ route('events.index') }}"
                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('events.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                        </svg>
                        Ver Eventos
                    </a>
                </li>
            @endcan
        </ul>
    </div>
@endif
