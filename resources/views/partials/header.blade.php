<!-- Top Header -->
<header class="bg-card border-b border-border px-6 py-4">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-foreground">CEFA</h1>
            <p class="text-sm text-muted-foreground">Sistema de Gestión de Semilleros de Investigación</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="text-right">
                <p class="text-sm font-medium text-foreground">{{ auth()->user()->name }}</p>
                <p class="text-xs text-muted-foreground">
                    {{ auth()->user()->roles->first()->name ?? 'Sin rol' }}</p>
            </div>
            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
    </div>
</header>
