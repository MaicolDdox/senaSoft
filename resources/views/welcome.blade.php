<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Updated title and meta for CEFA system -->
        <title>CEFA</title>
        <meta name="description" content="Sistema de información para la gestión y seguimiento de grupos de semilleros de investigación del Centro de Formación Agroindustrial CEFA">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700|source-sans-pro:400,500,600" rel="stylesheet" />

        <!-- Added AOS (Animate On Scroll) library for smooth animations -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        
        <!-- Added Tailwind CSS CDN for immediate styling -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/dashboardTailwind.js') }}"></script>

        <!-- Added custom CSS for enhanced animations and effects -->
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    </head>
    <body class="bg-background text-foreground antialiased min-h-screen font-body">
        <!-- Professional header with SENA branding -->
        <header class="bg-background border-b border-border" data-aos="fade-down" data-aos-duration="800">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <!-- Logo and title -->
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center floating-animation">
                            <svg class="w-8 h-8 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-foreground">CEFA</h1>
                            <p class="text-sm text-muted-foreground">Centro de Formación Agroindustrial</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    @if (Route::has('login'))
                        <nav class="flex items-center space-x-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center px-6 py-2.5 bg-primary text-primary-foreground font-medium rounded-lg hover:bg-primary/90 transition-all duration-300 shadow-sm hover:shadow-lg transform hover:scale-105">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="text-foreground hover:text-primary transition-colors duration-200 font-medium">
                                    Iniciar Sesión
                                </a>
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero section for research management system -->
        <main class="flex-1">
            <!-- Hero Section -->
            <section class="bg-gradient-to-br from-background to-accent py-20 overflow-hidden">
                <div class="container mx-auto px-6">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight" data-aos="fade-up" data-aos-duration="1000">
                            Sistema de Gestión de 
                            <span class="gradient-text">Semilleros de Investigación</span>
                        </h1>
                        <p class="text-xl text-muted-foreground mb-8 leading-relaxed max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            Plataforma integral para administrar grupos de semilleros, gestionar proyectos de investigación 
                            y coordinar el calendario institucional del Centro de Formación Agroindustrial CEFA.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center px-8 py-4 bg-primary text-primary-foreground font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 pulse-glow">
                                    Acceder al Sistema
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center px-8 py-4 bg-primary text-primary-foreground font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 pulse-glow">
                                    Iniciar Sesión
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features section highlighting system capabilities -->
            <section class="py-20 bg-background">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="text-3xl font-bold text-foreground mb-4">Funcionalidades del Sistema</h2>
                        <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                            Herramientas especializadas para la gestión integral de semilleros de investigación
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Gestión de Grupos -->
                        <div class="bg-card rounded-xl p-8 shadow-sm border border-border card-hover-effect" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 floating-animation">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-card-foreground mb-3">Gestión de Grupos</h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Administra grupos de semilleros, sus integrantes, roles y responsabilidades de manera centralizada.
                            </p>
                        </div>

                        <!-- Seguimiento de Proyectos -->
                        <div class="bg-card rounded-xl p-8 shadow-sm border border-border card-hover-effect" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 floating-animation" style="animation-delay: 1s;">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-card-foreground mb-3">Seguimiento de Proyectos</h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Monitorea el progreso de proyectos a través de todas sus fases: propuesta, análisis, diseño, desarrollo, prueba e implantación.
                            </p>
                        </div>

                        <!-- Roles y Permisos -->
                        <div class="bg-card rounded-xl p-8 shadow-sm border border-border card-hover-effect" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 floating-animation" style="animation-delay: 2s;">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-card-foreground mb-3">Roles y Permisos</h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Sistema de roles diferenciados con permisos específicos para coordinadores, investigadores y estudiantes.
                            </p>
                        </div>

                        <!-- Calendario Institucional -->
                        <div class="bg-card rounded-xl p-8 shadow-sm border border-border card-hover-effect" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 floating-animation" style="animation-delay: 3s;">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3l8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-card-foreground mb-3">Calendario Institucional</h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Organiza y coordina eventos, reuniones, presentaciones y actividades académicas del centro.
                            </p>
                        </div>

                        <!-- Trazabilidad -->
                        <div class="bg-card rounded-xl p-8 shadow-sm border border-border card-hover-effect" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 floating-animation" style="animation-delay: 4s;">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-card-foreground mb-3">Trazabilidad Completa</h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Garantiza el seguimiento detallado de cada fase del proyecto con historial completo de cambios.
                            </p>
                        </div>

                        <!-- Reportes -->
                        <div class="bg-card rounded-xl p-8 shadow-sm border border-border card-hover-effect" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6 floating-animation" style="animation-delay: 5s;">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-card-foreground mb-3">Reportes y Analytics</h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Genera reportes detallados sobre el progreso de proyectos y desempeño de los semilleros.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA section for getting started -->
            <section class="py-20 bg-muted">
                <div class="container mx-auto px-6 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="text-3xl font-bold text-foreground mb-4">
                        Impulsa la Investigación en tu Centro
                    </h2>
                    <p class="text-lg text-muted-foreground mb-8 max-w-2xl mx-auto">
                        Únete al sistema de gestión que está transformando la manera en que los centros de formación 
                        administran sus semilleros de investigación.
                    </p>
                    @guest
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-8 py-4 bg-primary text-primary-foreground font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            Entrar al sistema
                        </a>
                    @endguest
                </div>
            </section>
        </main>

        <!-- Professional footer with institutional information -->
        <footer class="bg-secondary text-secondary-foreground py-12" data-aos="fade-up" data-aos-duration="800">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">CEFA</h3>
                                <p class="text-sm opacity-80">Centro de Formación Agroindustrial</p>
                            </div>
                        </div>
                        <p class="text-sm opacity-80 leading-relaxed">
                            Sistema de información especializado en la gestión y seguimiento de grupos de semilleros de investigación.
                        </p>
                    </div>
                    
                    <div>
                        <h4 class="font-semibold mb-4">Enlaces Útiles</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Documentación</a></li>
                            <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Soporte Técnico</a></li>
                            <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Términos de Uso</a></li>
                            <li><a href="#" class="opacity-80 hover:opacity-100 transition-opacity">Política de Privacidad</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-semibold mb-4">Contacto</h4>
                        <div class="space-y-2 text-sm opacity-80">
                            <p>Centro de Formación Agroindustrial</p>
                            <p>Email: info@cefa.edu.co</p>
                            <p>Teléfono: +57 (1) 234-5678</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-secondary-foreground/20 mt-8 pt-8 text-center">
                    <p class="text-sm opacity-80">
                        © {{ date('Y') }} Centro de Formación Agroindustrial CEFA. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </footer>

        <!-- Added AOS JavaScript library and custom animations initialization -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            // Initialize AOS (Animate On Scroll)
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });

            // Custom JavaScript animations and interactions
            document.addEventListener('DOMContentLoaded', function() {
                // Add smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });

                // Add interactive hover effects to cards
                const cards = document.querySelectorAll('.card-hover-effect');
                cards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-8px) scale(1.02)';
                        this.style.boxShadow = '0 20px 40px rgba(0, 166, 93, 0.15)';
                    });
                    
                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0) scale(1)';
                        this.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
                    });
                });

                // Add parallax effect to hero section
                window.addEventListener('scroll', function() {
                    const scrolled = window.pageYOffset;
                    const parallax = document.querySelector('.bg-gradient-to-br');
                    if (parallax) {
                        const speed = scrolled * 0.5;
                        parallax.style.transform = `translateY(${speed}px)`;
                    }
                });

                // Add typing effect to main title (optional enhancement)
                const title = document.querySelector('h1 span.gradient-text');
                if (title) {
                    const text = title.textContent;
                    title.textContent = '';
                    title.classList.add('typewriter');
                    
                    let i = 0;
                    const typeWriter = () => {
                        if (i < text.length) {
                            title.textContent += text.charAt(i);
                            i++;
                            setTimeout(typeWriter, 100);
                        } else {
                            title.classList.remove('typewriter');
                        }
                    };
                    
                    setTimeout(typeWriter, 1500);
                }

                // Add counter animation for statistics (if needed in future)
                function animateCounter(element, target, duration = 2000) {
                    let start = 0;
                    const increment = target / (duration / 16);
                    
                    const timer = setInterval(() => {
                        start += increment;
                        element.textContent = Math.floor(start);
                        
                        if (start >= target) {
                            element.textContent = target;
                            clearInterval(timer);
                        }
                    }, 16);
                }
            });
        </script>
    </body>
</html>
