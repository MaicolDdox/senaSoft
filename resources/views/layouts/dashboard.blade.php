<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - CEFA | Sistema de Gestión de Semilleros</title>
    <meta name="description" content="Panel de control del Sistema de Gestión de Semilleros de Investigación - CEFA">

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Updated fonts to match welcome.blade.php design system -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700|source-sans-pro:400,500,600"
        rel="stylesheet" />

    <!-- Added AOS library for animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- apexcharts script para los estilos -->
    <link rel="stylesheet" href="./assets/vendor/apexcharts/dist/apexcharts.css">



    <!-- Updated to latest Tailwind CSS CDN with SENA color configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // SENA color palette
                        primary: {
                            DEFAULT: '#00A65D',
                            foreground: '#FFFFFF',
                            50: '#F0F9F4',
                            100: '#DCF2E4',
                            500: '#00A65D',
                            600: '#009952',
                            700: '#007A42'
                        },
                        background: '#FFFFFF',
                        foreground: '#000000',
                        muted: {
                            DEFAULT: '#F8F9FA',
                            foreground: '#6B7280'
                        },
                        accent: {
                            DEFAULT: '#F0F9F4',
                            foreground: '#00A65D'
                        },
                        card: {
                            DEFAULT: '#FFFFFF',
                            foreground: '#000000'
                        },
                        border: '#E5E7EB',
                        secondary: {
                            DEFAULT: '#F3F4F6',
                            foreground: '#374151'
                        }
                    },
                    fontFamily: {
                        'sans': ['Instrument Sans', 'system-ui', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif'],
                        'body': ['Source Sans Pro', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <!-- Added enhanced CSS animations and sidebar effects -->
    <style>
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: #00A65D;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar-item:hover::before,
        .sidebar-item.active::before {
            transform: scaleY(1);
        }

        .sidebar-item:hover {
            background: linear-gradient(90deg, #F0F9F4 0%, #FFFFFF 100%);
            transform: translateX(8px);
            box-shadow: 0 4px 12px rgba(0, 166, 93, 0.15);
        }

        .sidebar-item.active {
            background: linear-gradient(90deg, #F0F9F4 0%, #FFFFFF 100%);
            color: #00A65D;
            font-weight: 600;
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(0, 166, 93, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(0, 166, 93, 0.5);
            }
        }

        .sidebar-logo {
            background: linear-gradient(135deg, #00A65D, #00C46A);
        }

        .sidebar-section-title {
            position: relative;
            padding-left: 1rem;
        }

        .sidebar-section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 16px;
            background: #00A65D;
            border-radius: 2px;
        }
    </style>
</head>

<body class="bg-muted font-body antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Completely redesigned sidebar with professional SENA styling -->
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
                <!-- Dashboard Section -->
                <div class="mb-6">
                    <h3
                        class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
                        Home
                    </h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('dashboard') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 5a2 2 0 012-2h2a2 2 0 012 2v6H8V5z" />
                                </svg>
                                Dashboard Principal
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Semilleros Section -->
                @if (auth()->user()->can('semilleros.index') || auth()->user()->can('semilleros.create'))
                    <div class="mb-6">
                        <h3
                            class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
                            Semilleros
                        </h3>
                        <ul class="space-y-1">
                            @can('semilleros.index')
                                <li>
                                    <a href="{{ route('semilleros.index') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('semilleros.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Ver Semilleros
                                    </a>
                                </li>
                            @endcan
                            @can('semilleros.create')
                                <li>
                                    <a href="{{ route('semilleros.create') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('semilleros.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Crear Semillero
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                @endif

                <!-- Directores Section -->
                @if (auth()->user()->can('directores.index') || auth()->user()->can('directores.create'))
                    <div class="mb-6">
                        <h3
                            class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
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

                <!-- Integrantes Section -->
                @if (auth()->user()->can('integrantes.index') || auth()->user()->can('integrantes.create'))
                    <div class="mb-6">
                        <h3
                            class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
                            Integrantes
                        </h3>
                        <ul class="space-y-1">
                            @can('integrantes.index')
                                <li>
                                    <a href="{{ route('aprendices.index') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('integrantes.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Ver Integrantes
                                    </a>
                                </li>
                            @endcan
                            @can('integrantes.create')
                                <li>
                                    <a href="{{ route('aprendices.create') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('integrantes.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Crear Integrante
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                @endif

                <!-- Proyectos Section -->
                @if (auth()->user()->can('projects.index') || auth()->user()->can('projects.create'))
                    <div class="mb-6">
                        <h3
                            class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
                            Proyectos
                        </h3>
                        <ul class="space-y-1">
                            @can('projects.index')
                                <li>
                                    <a href="{{ route('projects.index') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('projects.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Ver Proyectos
                                    </a>
                                </li>
                            @endcan
                            @can('projects.create')
                                <li>
                                    <a href="{{ route('projects.create') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('projects.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Crear Proyecto
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                @endif

                <!-- Integrantes Section -->

                <div class="mb-6">
                    <h3
                        class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
                        Integrantes
                    </h3>
                    <ul class="space-y-1">
                        {{-- Crear asociación de aprendices a proyecto --}}
                        @can('project_integrantes.create')
                            <li>
                                <a href="{{ route('project_integrantes.create') }}"
                                    class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('project_integrantes.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Asociar Aprendices
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="space-y-1">
                        {{-- Crear asociación de aprendices a proyecto --}}

                        <li>
                            <a href="{{ route('project_integrantes.index') }}"
                                class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('project_integrantes.create') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Lista De asociaciones
                            </a>
                        </li>
                    </ul>
                </div>



                <!-- Eventos Section -->
                @if (auth()->user()->can('events.index') || auth()->user()->can('events.create'))
                    <div class="mb-6">
                        <h3
                            class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
                            Eventos
                        </h3>
                        <ul class="space-y-1">
                            @can('events.index')
                                <li>
                                    <a href="{{ route('events.index') }}"
                                        class="sidebar-item flex items-center px-4 py-3 text-sm rounded-lg {{ request()->routeIs('events.index') ? 'active' : 'text-muted-foreground hover:text-foreground' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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



                <!-- Enhanced logout section with better styling -->
                <div class="p-4 border-t border-border">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center px-4 py-3 bg-secondary hover:bg-secondary/80 text-secondary-foreground rounded-lg transition-all duration-200 font-medium group">
                                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Cerrar Sesión
                            </button>
                        </form>
                    @endauth
                </div>
        </aside>


        <!-- Enhanced main content area with better header and styling -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-card border-b border-border px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-foreground">Dashboard</h1>
                        <p class="text-sm text-muted-foreground">Sistema de Gestión de Semilleros de Investigación</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-medium text-foreground">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-muted-foreground">
                                {{ auth()->user()->roles->first()->name ?? 'Sin rol' }}</p>
                        </div>
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

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


    <script>
        // Initialize AOS only once on page load
        AOS.init({
            duration: 400,
            easing: 'ease-in-out',
            once: true,
            offset: 50,
            disable: 'mobile' // Disable on mobile to prevent performance issues
        });

        document.addEventListener('DOMContentLoaded', function() {
            const sidebarItems = document.querySelectorAll('.sidebar-item');

            // Simple active state management without animations
            sidebarItems.forEach(item => {
                const href = item.getAttribute('href');
                if (href && window.location.pathname === href) {
                    item.classList.add('active');
                }
            });
        });
    </script>




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
