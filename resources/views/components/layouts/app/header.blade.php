<div class="container mx-auto px-6 py-4">
    <div class="flex items-center justify-between">
        <!-- Logo and title -->
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-lg flex items-center justify-center floating-animation">
             <img 
                src="{{ asset('img/logoTipo.png') }}" 
                alt="Logotipo" 
                class="w-full h-full object-contain"
                >
        </div>
            <div>
                <h1 class="text-xl font-bold text-foreground">SIA</h1>
                <p class="text-sm text-muted-foreground">Centro de Formación Agroindustrial</p>
            </div>
        </div>

        <!-- Navigation -->
        @if (Route::has('login'))
            <nav class="flex items-center space-x-4" data-aos="fade-left" data-aos-duration="800">
                @auth
                    <!-- Mejorado botón dashboard con icono y mejores efectos -->
                    <a href="{{ url('/dashboard') }}"
                        class="inline-flex items-center space-x-2 px-6 py-3 bg-primary text-primary-foreground font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 pulse-glow group">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                @else
                    <!-- Mejorado enlace de login con icono y efectos -->
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center space-x-2 px-5 py-2.5 text-foreground hover:text-primary transition-all duration-300 font-medium rounded-lg hover:bg-primary/5 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Iniciar Sesión</span>
                    </a>
                    @if (Route::has('register'))
                        <!-- Mejorado enlace de registro con icono y efectos modernos -->
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center space-x-2 px-6 py-2.5 border-2 border-primary/20 text-primary font-semibold rounded-lg hover:border-primary hover:bg-primary hover:text-primary-foreground transition-all duration-300 transform hover:scale-105 shadow-sm hover:shadow-lg group">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span>Registrarse</span>
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</div>
