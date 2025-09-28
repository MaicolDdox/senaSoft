<!-- Proyectos Section -->

    <div class="mb-6">
        <h3 class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
            Proyectos
        </h3>
        <ul class="space-y-1">
            @can('projects.index')
                <li>
                    <a href="{{ route('projects.index') }}"
                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('projects.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Ver Proyectos
                    </a>
                </li>
            @endcan
            <!--
            =============================================================
            MENU PARA PODER AGREGAR UNA SECCION PARA CREAR LOS PROYECTOS
            DESCOMENTAR PARA PODER ACTIVARLO
            =============================================================
            @can('projects.create')
                <li>
                    <a href="{{ route('projects.create') }}"
                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('projects.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Crear Proyecto
                    </a>
                </li>
            @endcan
            -->
        </ul>
    </div>

