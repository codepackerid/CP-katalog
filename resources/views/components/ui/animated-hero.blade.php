@props(['titles' => ['inovatif', 'kreatif', 'berkualitas', 'modern', 'canggih']])

<x-ui.aurora-background>
    <div class="relative z-10 pointer-events-auto px-4">
        <div class="flex flex-col gap-4 items-center justify-center animated-content">
            <div data-aos="fade-up" data-aos-delay="100">
                <x-ui.button variant="secondary" size="sm" class="gap-4">
                    Jelajahi Platform Kami 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </x-ui.button>
            </div>
            
            <div class="flex gap-4 flex-col" data-aos="fade-up" data-aos-delay="300">
                <h1 class="text-4xl sm:text-5xl md:text-7xl max-w-2xl tracking-tighter text-center font-regular">
                    <span class="text-blue-500">Project RPL yang</span>
                    <span class="relative flex w-full justify-center overflow-hidden text-center md:pb-4 md:pt-1">
                        &nbsp;
                        @foreach($titles as $index => $title)
                            <span 
                                class="animated-title absolute font-semibold transition-all duration-500"
                                style="opacity: {{ $index === 0 ? '1' : '0' }}; transform: translateY({{ $index === 0 ? '0' : '150px' }});"
                            >
                                {{ $title }}
                            </span>
                        @endforeach
                    </span>
                </h1>

                <p class="text-base sm:text-lg md:text-xl leading-relaxed tracking-tight text-gray-600 dark:text-gray-300 max-w-2xl text-center">
                    Codepacker.net adalah platform portfolio dan social networking untuk siswa/i jurusan RPL SMKN 4 Malang. 
                    Temukan dan pamerkan karya digital terbaik dari para programmer muda berbakat.
                </p>
            </div>
            
            <div class="flex flex-row gap-3" data-aos="fade-up" data-aos-delay="500">
                <x-ui.button size="lg" class="gap-4" variant="outline" href="/projects">
                    Lihat Projects
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </x-ui.button>
                <x-ui.button size="lg" class="gap-4" href="/forum">
                    Bergabung Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </x-ui.button>
            </div>
        </div>
    </div>
</x-ui.aurora-background>

@once
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation for title rotation
        const animatedTitles = document.querySelectorAll('.animated-title');
        if (animatedTitles.length > 0) {
            let currentIndex = 0;
            
            function rotateTitle() {
                // Hide current title
                if (animatedTitles[currentIndex]) {
                    animatedTitles[currentIndex].style.opacity = '0';
                    animatedTitles[currentIndex].style.transform = 'translateY(-150px)';
                }
                
                // Move to next title
                currentIndex = (currentIndex + 1) % animatedTitles.length;
                
                // Show next title
                if (animatedTitles[currentIndex]) {
                    animatedTitles[currentIndex].style.opacity = '1';
                    animatedTitles[currentIndex].style.transform = 'translateY(0)';
                }
                
                // Schedule next rotation
                setTimeout(rotateTitle, 3000);
            }
            
            // Start rotation after initial delay
            setTimeout(rotateTitle, 3000);
        }
    });
    </script>
    @endpush
@endonce
