@props(['title', 'image', 'technologies', 'author', 'description' => 'No description available', 'id' => 1, 'screenshots' => []])

<div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100 group">
    <!-- Image Container with overlay for buttons on hover -->
    <div class="relative h-48 overflow-hidden">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-60"></div>
        
        <!-- Screenshots preview (small thumbnails) -->
        @if(!empty($screenshots) && count($screenshots) > 0)
        <div class="absolute top-2 right-2 flex gap-1">
            @foreach(array_slice($screenshots, 0, 3) as $index => $screenshot)
            <div class="w-8 h-8 rounded-md overflow-hidden border border-white/50 shadow-sm">
                <img src="{{ filter_var($screenshot, FILTER_VALIDATE_URL) ? $screenshot : asset('storage/' . $screenshot) }}" 
                     alt="Screenshot {{ $index + 1 }}" 
                     class="w-full h-full object-cover">
            </div>
            @endforeach
            @if(count($screenshots) > 3)
            <div class="w-8 h-8 rounded-md bg-black/50 flex items-center justify-center text-white text-xs font-medium border border-white/50">
                +{{ count($screenshots) - 3 }}
            </div>
            @endif
        </div>
        @endif
        
        <!-- Buttons that appear on hover -->
        <div class="absolute bottom-0 left-0 right-0 p-3 flex justify-between items-center transition-all duration-300 transform translate-y-1 group-hover:translate-y-0">
            <div class="flex gap-2">
                <a href="#" class="flex items-center gap-1 bg-white/90 backdrop-blur-sm text-gray-800 rounded-full py-1 px-3 text-xs font-medium hover:bg-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"/><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"/><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"/><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"/><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"/></svg>
                    Figma
                </a>
                <a href="#" class="flex items-center gap-1 bg-white/90 backdrop-blur-sm text-gray-800 rounded-full py-1 px-3 text-xs font-medium hover:bg-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                    GitHub
                </a>
            </div>
        </div>
    </div>
    
    <!-- Content Section -->
    <div class="p-5">
        <!-- Title and Technologies -->
        <div class="mb-3">
            <h3 class="text-lg font-heading font-semibold text-gray-900 mb-2 line-clamp-1">{{ $title }}</h3>
            <div class="flex flex-wrap gap-1.5 mb-3">
                @foreach($technologies as $tech)
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
        
        <!-- Description -->
        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $description }}</p>
        
        <!-- Bottom Section with Author and Detail Button -->
        <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
            <!-- Author Info -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    @if(is_array($author) && isset($author['avatar']))
                        <img class="h-8 w-8 rounded-full border border-gray-200" src="{{ $author['avatar'] }}" alt="{{ $author['name'] ?? 'Unknown' }}">
                    @else
                        <img class="h-8 w-8 rounded-full border border-gray-200" src="https://randomuser.me/api/portraits/men/{{ rand(1, 60) }}.jpg" alt="{{ is_string($author) ? $author : 'Unknown' }}">
                    @endif
                </div>
                <div class="ml-2">
                    @if(is_array($author) && isset($author['name']))
                        <p class="text-xs font-medium text-gray-900">{{ $author['name'] }}</p>
                    @else
                        <p class="text-xs font-medium text-gray-900">{{ is_string($author) ? $author : 'Unknown' }}</p>
                    @endif
                </div>
            </div>
            
            <!-- View Details Button -->
            <a href="/projects/{{ $id }}" class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</div>
