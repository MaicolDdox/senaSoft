<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-muted font-body antialiased">
    <div class="flex h-screen overflow-hidden">

        <aside class="w-72 bg-card shadow-xl border-r border-border flex flex-col">
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-border">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 sidebar-logo rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-foreground">CEFA</h1>
                        <p class="text-sm text-muted-foreground">Sistema de Gestión</p>
                    </div>
                </div>
            </div>

            <!-- Redesigned navigation menu with sections and improved UX -->
            <nav class="flex-1 p-4 overflow-y-auto">

                @include('menu.home')

                @include('menu.semilleros')

                @include('menu.directores')

                @include('menu.integrantes')

                @include('menu.proyectos')

                @include('menu.event')

                @include('partials.logout')
            </nav>
        </aside>


        <!-- Enhanced main content area with better header and styling -->
        <main class="flex-1 flex flex-col overflow-hidden">

            @include('partials.header')

            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-y-auto bg-muted">
                @hasSection('content')
                    @yield('content')
                @else
                    <!-- Default dashboard content to prevent black screen on first load -->
                    <div class="max-w-7xl mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <!-- Stats Cards -->
                            <div class="bg-card rounded-lg p-6 shadow-sm border border-border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-muted-foreground">Total Semilleros</p>
                                        <p class="text-2xl font-bold text-foreground">
                                            {{ \App\Models\Semillero::count() ?? 0 }}</p>
                                    </div>
                                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-card rounded-lg p-6 shadow-sm border border-border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-muted-foreground">Usuarios Activos</p>
                                        <p class="text-2xl font-bold text-foreground">
                                            {{ \App\Models\User::count() ?? 0 }}</p>
                                    </div>
                                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-card rounded-lg p-6 shadow-sm border border-border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-muted-foreground">Proyectos</p>
                                        <p class="text-2xl font-bold text-foreground">
                                            {{ \App\Models\Project::count() ?? 0 }}</p>
                                    </div>
                                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-card rounded-lg p-6 shadow-sm border border-border">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-muted-foreground">Eventos</p>
                                        <p class="text-2xl font-bold text-foreground">
                                            {{ \App\Models\Event::count() ?? 0 }}</p>
                                    </div>
                                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Welcome Section -->
                        <div class="bg-card rounded-lg p-8 shadow-sm border border-border">
                            <div class="text-center">
                                <h2 class="text-3xl font-bold text-foreground mb-4">Bienvenido al Sistema CEFA</h2>
                                <p class="text-lg text-muted-foreground mb-6">Sistema de Gestión y Seguimiento de
                                    Grupos de Semilleros de Investigación</p>
                                <div class="flex justify-center space-x-4">
                                    <div class="grid grid-cols-2 gap-6">

                                        <!-- 1. Proyectos por fase -->
                                        <div class="bg-white p-4 rounded shadow">
                                            <h2 class="text-lg font-bold mb-2">Proyectos por Fase</h2>
                                            <div id="chartProyectosFase"></div>
                                        </div>

                                        <!-- 2. Proyectos por mes -->
                                        <div class="bg-white p-4 rounded shadow">
                                            <h2 class="text-lg font-bold mb-2">Proyectos creados por Mes</h2>
                                            <div id="chartProyectosMes"></div>
                                        </div>

                                        <!-- 3. Usuarios por rol -->
                                        <div class="bg-white p-4 rounded shadow">
                                            <h2 class="text-lg font-bold mb-2">Usuarios por Rol</h2>
                                            <div id="chartUsuariosRol"></div>
                                        </div>

                                        <!-- 4. Eventos por mes -->
                                        <div class="bg-white p-4 rounded shadow">
                                            <h2 class="text-lg font-bold mb-2">Eventos por Mes</h2>
                                            <div id="chartEventosMes"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Simplified JavaScript - removed problematic AOS reinitializations and complex animations, JS DE APEXCHART -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="./assets/vendor/lodash/lodash.min.js"></script>

    <script src="{{ asset('js/dashboard/aos.js') }}"></script>


    <script>
        // 1. Proyectos por Fase (donut)
        var optionsFase = {
            chart: {
                type: 'donut'
            },
            series: @json(array_values($proyectosPorFase->toArray())),
            labels: @json(array_keys($proyectosPorFase->toArray())),
        };
        new ApexCharts(document.querySelector("#chartProyectosFase"), optionsFase).render();

        // 2. Proyectos por Mes (línea)
        var optionsMes = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'Proyectos',
                data: @json(array_values($proyectosPorMes->toArray()))
            }],
            xaxis: {
                categories: @json(array_keys($proyectosPorMes->toArray()))
            }
        };
        new ApexCharts(document.querySelector("#chartProyectosMes"), optionsMes).render();

        // 3. Usuarios por Rol (barras horizontales)
        var optionsRoles = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'Usuarios',
                data: @json(array_values($usuariosPorRol->toArray()))
            }],
            xaxis: {
                categories: @json(array_keys($usuariosPorRol->toArray()))
            }
        };
        new ApexCharts(document.querySelector("#chartUsuariosRol"), optionsRoles).render();

        // 4. Eventos por Mes (área)
        var optionsEventos = {
            chart: {
                type: 'area'
            },
            series: [{
                name: 'Eventos',
                data: @json(array_values($eventosPorMes->toArray()))
            }],
            xaxis: {
                categories: @json(array_keys($eventosPorMes->toArray()))
            }
        };
        new ApexCharts(document.querySelector("#chartEventosMes"), optionsEventos).render();
    </script>

</body>


</html>
