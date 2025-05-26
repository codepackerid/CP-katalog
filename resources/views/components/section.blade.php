@props(['title' => null, 'subtitle' => null, 'bgColor' => 'bg-white', 'padding' => 'py-12'])

<section class="{{ $bgColor }} {{ $padding }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($title)
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-gray-900">{{ $title }}</h2>
                @if($subtitle)
                    <p class="mt-4 text-lg text-gray-600">{{ $subtitle }}</p>
                @endif
            </div>
        @endif
        
        <div>
            {{ $slot }}
        </div>
    </div>
</section>
