@props([
    'mainText' => 'Showcase Karya',
    'rotatingTexts' => ['inovatif', 'kreatif', 'berkualitas', 'modern', 'canggih'],
    'description' => 'Platform portfolio dan social networking untuk siswa/i jurusan RPL SMKN 4 Malang. Temukan dan pamerkan karya digital terbaik dari para programmer muda berbakat.'
])

<section class="w-full h-screen relative overflow-hidden flex items-center justify-center">
    <!-- Floating images container with parallax effect - full viewport -->
    <div class="floating-container relative w-full h-full max-w-6xl mx-auto px-4" data-sensitivity="0.5" data-easing="0.05">
        <!-- Floating RPL project images with improved positioning and rotation -->
        <div class="floating-element absolute top-[25%] left-[10%] will-change-transform" data-depth="0.6">
            <img 
                src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                alt="Coding project" 
                class="w-16 h-14 sm:w-20 sm:h-16 md:w-24 md:h-20 object-cover hover:scale-105 duration-200 cursor-pointer transition-transform -rotate-[12deg] shadow-lg rounded-lg opacity-0 animate-fade-in border-2 border-white" 
                style="animation-delay: 0.5s;"
            >
        </div>

        <div class="floating-element absolute top-[8%] left-[25%] will-change-transform" data-depth="0.8">
            <img 
                src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                alt="Web development" 
                class="w-24 h-20 sm:w-28 sm:h-24 md:w-36 md:h-28 object-cover hover:scale-105 duration-200 cursor-pointer transition-transform rotate-[8deg] shadow-lg rounded-lg opacity-0 animate-fade-in border-2 border-white" 
                style="animation-delay: 0.7s;"
            >
        </div>

        <div class="floating-element absolute bottom-[20%] left-[15%] will-change-transform" data-depth="1.2">
            <img 
                src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                alt="Mobile app development" 
                class="w-28 h-28 sm:w-32 sm:h-32 md:w-40 md:h-40 object-cover rotate-[-15deg] hover:scale-105 duration-200 cursor-pointer transition-transform shadow-lg rounded-lg opacity-0 animate-fade-in border-2 border-white" 
                style="animation-delay: 0.9s;"
            >
        </div>

        <div class="floating-element absolute top-[12%] right-[20%] will-change-transform" data-depth="0.9">
            <img 
                src="https://images.unsplash.com/photo-1547954575-855750c57bd3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                alt="UI/UX Design" 
                class="w-28 h-24 sm:w-32 sm:h-28 md:w-40 md:h-36 object-cover hover:scale-105 duration-200 cursor-pointer transition-transform shadow-lg rotate-[15deg] rounded-lg opacity-0 animate-fade-in border-2 border-white" 
                style="animation-delay: 1.1s;"
            >
        </div>

        <div class="floating-element absolute bottom-[25%] right-[12%] will-change-transform" data-depth="1.1">
            <img 
                src="https://images.unsplash.com/photo-1581092335397-9fa53dd3a3f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                alt="Data visualization" 
                class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 object-cover hover:scale-105 duration-200 cursor-pointer transition-transform shadow-lg rotate-[20deg] rounded-lg opacity-0 animate-fade-in border-2 border-white" 
                style="animation-delay: 1.3s;"
            >
        </div>
        
        <!-- Hero content - fixed positioning to ensure proper alignment -->
        <div class="absolute inset-0 flex flex-col justify-center items-center z-10 pointer-events-none">
            <div class="bg-white/80 backdrop-blur-sm py-6 px-8 rounded-xl shadow-md max-w-2xl mx-auto pointer-events-auto">
                <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl text-center font-heading tracking-tight opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                    <span class="block">{{ $mainText }}</span>
                    <span class="flex items-center justify-center gap-2 mt-2">
                        <span>digital</span>
                        <span class="text-rotate overflow-hidden text-blue-600 inline-block w-[140px] sm:w-[160px] md:w-[200px] h-[40px] sm:h-[50px] md:h-[70px]" 
                            data-texts='{{ json_encode($rotatingTexts) }}'
                            data-interval="3000"
                            data-stagger="0.03"
                            data-stagger-from="last">
                        </span>
                    </span>
                </h1>
                
                <p class="text-sm sm:text-base md:text-lg max-w-md md:max-w-xl lg:max-w-2xl text-center mt-4 md:mt-6 text-gray-600 opacity-0 animate-fade-in" style="animation-delay: 0.5s;">
                    {{ $description }}
                </p>

                <div class="flex flex-row justify-center gap-3 sm:gap-4 items-center mt-6 sm:mt-8 md:mt-10">
                    <a href="/projects" 
                    class="text-xs sm:text-sm md:text-base font-semibold tracking-tight text-white bg-gray-900 px-3 py-1.5 sm:px-4 sm:py-2 md:px-5 md:py-2.5 rounded-full z-20 shadow-md font-heading opacity-0 animate-fade-in hover:scale-105 transition-transform duration-300" 
                    style="animation-delay: 0.7s;">
                        Lihat Projects <span class="font-serif ml-1">→</span>
                    </a>
                    
                    <a href="/forum" 
                    class="text-xs sm:text-sm md:text-base font-semibold tracking-tight text-white bg-blue-600 px-3 py-1.5 sm:px-4 sm:py-2 md:px-5 md:py-2.5 rounded-full z-20 shadow-md font-heading opacity-0 animate-fade-in hover:scale-105 transition-transform duration-300" 
                    style="animation-delay: 0.7s;">
                        Gabung Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.5s ease-out forwards;
}
</style>

@once
    @push('scripts')
    <script src="{{ asset('js/use-mouse-position.js') }}"></script>
    <script src="{{ asset('js/parallax-floating.js') }}"></script>
    <script src="{{ asset('js/text-rotate.js') }}"></script>
    @endpush
@endonce
