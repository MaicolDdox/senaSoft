<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - CEFA</title>
    <!-- Agrega estilos, por ejemplo, Tailwind o Bootstrap si usas -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Puedes agregar más CSS o JS según necesites -->
</head>

<body class="antialiased">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4">
                <!-- Bienvenido y Rol -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold">Bienvenido, {{ auth()->user()->name }}</h2>
                    <p class="text-sm text-gray-600">Rol: {{ auth()->user()->roles->first()->name ?? 'Sin rol' }}</p>
                </div>

                <!-- Menú de Navegación -->
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Dashboard</a>
                        </li>

                        <!-- Semilleros -->
                        @can('semilleros.index')
                            <li>
                                <a href="{{ route('semilleros.index') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Semilleros</a>
                            </li>
                        @endcan
                        @can('semilleros.create')
                            <li>
                                <a href="{{ route('semilleros.create') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Crear Semillero</a>
                            </li>
                        @endcan

                        <!-- Integrantes -->
                        @can('integrantes.index')
                            <li>
                                <a href="{{ route('integrantes.index') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Integrantes</a>
                            </li>
                        @endcan
                        @can('integrantes.create')
                            <li>
                                <a href="{{ route('integrantes.create') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Agregar Integrante</a>
                            </li>
                        @endcan

                        <!-- Proyectos -->
                        @can('projects.index')
                            <li>
                                <a href="{{ route('projects.index') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Proyectos</a>
                            </li>
                        @endcan
                        @can('projects.create')
                            <li>
                                <a href="{{ route('projects.create') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Crear Proyecto</a>
                            </li>
                        @endcan
                        @can('projects.report')
                            <li>
                                <a href="{{ route('projects.report') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Reportes de Proyectos</a>
                            </li>
                        @endcan

                        <!-- Eventos -->
                        @can('events.index')
                            <li>
                                <a href="{{ route('events.index') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Eventos</a>
                            </li>
                        @endcan
                        @can('events.create')
                            <li>
                                <a href="{{ route('events.create') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Crear Evento</a>
                            </li>
                        @endcan
                    </ul>
                </nav>

                <!-- Cerrar Sesión (abajo) -->
                <div class="mt-auto p-4">
                    @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-logout group flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition-all duration-200 font-dm-sans">
                        Cerrar sesión
                    </button>
                </form>
                @endauth
                </div>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>

</html>
