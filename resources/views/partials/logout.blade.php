<!-- Enhanced logout section with better styling -->
<div class="p-4 border-t border-border">
    @auth
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center px-4 py-3 bg-secondary hover:bg-secondary/80 text-secondary-foreground rounded-lg transition-all duration-200 font-medium group">
                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Cerrar Sesión
            </button>
        </form>
    @endauth
</div>
