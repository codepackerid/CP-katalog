@props(['title', 'subtitle' => '', 'showFilters' => false, 'categories' => [], 'currentCategory' => null, 'search' => null, 'totalProjects' => 0, 'requestParams' => []])

<!-- Page Header with Natural Light Theme -->
<section class="relative bg-gradient-to-b from-gray-50 to-gray-100 text-gray-900 overflow-hidden">
    <!-- Subtle pattern overlay -->
    <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMwMDAwMDAiIGZpbGwtb3BhY2l0eT0iMC4yIj48cGF0aCBkPSJNMzYgMzRjMCAxIDEgMiAyIDIgMi0xIDMtMSA1IDAgMSAxIDIgMCAyLTEgMC0yLTEtMy0yLTMtNCAwLTcgMC03IDJ6bS0xNy0xYzAgMSAxIDIgMiAxIDIgMCA1LTIgNy0yLTEtMi00LTItNy0xLTIgMC0yIDEtMiAyeiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+')] w-full h-full bg-center"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold font-heading mb-6 leading-tight">{{ $title }}</h1>
            
            @if($subtitle)
                <p class="text-xl text-gray-700 leading-relaxed mb-6 mx-auto max-w-2xl">{{ $subtitle }}</p>
            @endif
            
            <!-- Modern Search Bar -->
            <div class="mb-8 mx-auto max-w-2xl">
                <form action="{{ route('projects.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <!-- Preserve category if set -->
                    @if(!empty($currentCategory) && $currentCategory !== 'all')
                        <input type="hidden" name="category" value="{{ $currentCategory }}">
                    @endif
                    
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" placeholder="Cari proyek..." value="{{ $search }}" class="py-3 pl-10 pr-4 block w-full rounded-lg border border-gray-200 bg-white/90 backdrop-blur-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 text-gray-800">
                    </div>
                    
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white py-3 px-6 rounded-lg text-sm font-medium transition-colors">
                        Cari
                    </button>
                </form>
            </div>
            
            @if($showFilters)
                <!-- Modern Filter Tabs with Indicators -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-2 shadow-sm mb-6 inline-flex flex-wrap justify-center">
                    <a href="{{ route('projects.index', ['search' => $search]) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ empty($currentCategory) ? 'bg-gray-800 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
                        Semua
                        <span class="ml-1 bg-{{ empty($currentCategory) ? 'white/20' : 'gray-200' }} text-{{ empty($currentCategory) ? 'white' : 'gray-800' }} text-xs rounded-full px-2 py-0.5">{{ $totalProjects }}</span>
                    </a>
                    
                    @foreach($categories as $cat)
                    <a href="{{ route('projects.index', ['category' => $cat, 'search' => $search]) }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $currentCategory == $cat ? 'bg-gray-800 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
                        {{ $cat }}
                    </a>
                    @endforeach
                </div>
            @endif
            
            {{ $slot ?? '' }}
        </div>
    </div>
</section>
