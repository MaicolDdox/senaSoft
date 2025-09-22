<!-- Dashboard Section -->
<div class="mb-6">
    <h3 class="sidebar-section-title text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">
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
