<div class="min-h-screen login-gradient font-body antialiased">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Enhanced login card with SENA branding -->
            <div class="login-card rounded-2xl p-8 border border-white/20">
                <!-- SENA Logo and Branding -->
                <div class="text-center mb-8">
                    <div
                        class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mx-auto mb-4 floating-animation">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-foreground mb-2">CEFA</h1>
                    <p class="text-sm text-muted-foreground">Sistema de Gestión de Semilleros</p>
                </div>

                <!-- Enhanced auth header with better styling -->
                <div class="text-center mb-6">
                    <h2 class="text-xl font-semibold text-foreground mb-2">Iniciar Sesión</h2>
                    <p class="text-sm text-muted-foreground">Ingresa tus credenciales para acceder al sistema</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="text-center mb-4" :status="session('status')" />

                <!-- Enhanced login form with improved styling -->
                <form method="POST" wire:submit="login" class="space-y-6">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-foreground mb-2">
                            Correo Electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-muted-foreground" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input wire:model="email" type="email" id="email" required autofocus
                                autocomplete="email" placeholder="correo@ejemplo.com"
                                class="input-focus w-full pl-10 pr-4 py-3 border border-border rounded-lg bg-background text-foreground placeholder-muted-foreground focus:outline-none" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-foreground mb-2">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-muted-foreground" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input wire:model="password" type="password" id="password" required
                                autocomplete="current-password" placeholder="Ingresa tu contraseña"
                                class="input-focus w-full pl-10 pr-4 py-3 border border-border rounded-lg bg-background text-foreground placeholder-muted-foreground focus:outline-none" />
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="remember"
                                class="w-4 h-4 text-primary bg-background border-border rounded focus:ring-primary focus:ring-2">
                            <span class="ml-2 text-sm text-muted-foreground">Recordarme</span>
                        </label>
                    </div>

                    <!-- Enhanced submit button with SENA styling -->
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Iniciar Sesión
                    </button>
                </form>

                <!-- Enhanced footer with SENA branding -->
                <div class="mt-8 pt-6 border-t border-border text-center">
                    <p class="text-xs text-muted-foreground">
                        © {{ date('Y') }} Centro de Formación Agroindustrial CEFA
                    </p>
                    <p class="text-xs text-muted-foreground mt-1">
                        Sistema de Gestión de Semilleros de Investigación
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
