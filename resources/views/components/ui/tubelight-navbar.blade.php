@props(['active' => 'Beranda'])

<div class="tubelight-navbar fixed sm:top-0 left-1/2 -translate-x-1/2 z-50 sm:pt-6 bottom-0 mb-6">
    <div class="flex items-center gap-3 bg-white/5 border border-gray-200 backdrop-blur-lg py-1 px-1 rounded-full shadow-lg">
        <!-- Home Link -->
        <a href="/" 
            class="navbar-link relative cursor-pointer text-sm font-semibold px-6 py-2 rounded-full transition-colors text-gray-600 hover:text-blue-600 {{ $active === 'Beranda' ? 'active bg-muted text-blue-600' : '' }}">
            <span class="hidden md:inline">Beranda</span>
            <span class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
            </span>
        </a>
        
        <!-- Projects Link -->
        <a href="/projects" 
            class="navbar-link relative cursor-pointer text-sm font-semibold px-6 py-2 rounded-full transition-colors text-gray-600 hover:text-blue-600 {{ $active === 'Projects' ? 'active bg-muted text-blue-600' : '' }}">
            <span class="hidden md:inline">Projects</span>
            <span class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase">
                    <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
            </span>
        </a>
        
        <!-- Anggota Link -->
        <a href="/anggota" 
            class="navbar-link relative cursor-pointer text-sm font-semibold px-6 py-2 rounded-full transition-colors text-gray-600 hover:text-blue-600 {{ $active === 'Anggota' ? 'active bg-muted text-blue-600' : '' }}">
            <span class="hidden md:inline">Anggota</span>
            <span class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </span>
        </a>
        
        <!-- Tentang Link -->
        <a href="/tentang" 
            class="navbar-link relative cursor-pointer text-sm font-semibold px-6 py-2 rounded-full transition-colors text-gray-600 hover:text-blue-600 {{ $active === 'Tentang' ? 'active bg-muted text-blue-600' : '' }}">
            <span class="hidden md:inline">Tentang</span>
            <span class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 16v-4"/>
                    <path d="M12 8h.01"/>
                </svg>
            </span>
        </a>
        
        <!-- Forum Link -->
        <a href="/forum" 
            class="navbar-link relative cursor-pointer text-sm font-semibold px-6 py-2 rounded-full transition-colors text-gray-600 hover:text-blue-600 {{ $active === 'Forum' ? 'active bg-muted text-blue-600' : '' }}">
            <span class="hidden md:inline">Forum</span>
            <span class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                </svg>
            </span>
        </a>
        
        <!-- Animated Indicator -->
        <div class="navbar-indicator absolute inset-0 w-full bg-blue-50 rounded-full -z-10 opacity-0 transition-all duration-300"></div>
        
        <!-- Light Effect -->
        <div class="navbar-light absolute -top-2 w-8 h-1 bg-blue-500 rounded-t-full hidden sm:block">
            <div class="absolute w-12 h-6 bg-blue-300/30 rounded-full blur-md -top-2 -left-2"></div>
            <div class="absolute w-8 h-6 bg-blue-300/30 rounded-full blur-md -top-1"></div>
            <div class="absolute w-4 h-4 bg-blue-300/30 rounded-full blur-sm top-0 left-2"></div>
        </div>
    </div>
</div>

@once
    @push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/tubelight-navbar.js') }}"></script>
    @endpush
@endonce
