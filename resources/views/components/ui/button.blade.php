@props([
    'variant' => 'default',
    'size' => 'default',
    'asChild' => false,
    'href' => null,
    'type' => 'button'
])

@php
    $variants = [
        'default' => 'bg-blue-600 text-white hover:bg-blue-700',
        'destructive' => 'bg-red-600 text-white hover:bg-red-700',
        'outline' => 'border border-gray-300 bg-white hover:bg-gray-100 hover:text-gray-900',
        'secondary' => 'bg-gray-200 text-gray-900 hover:bg-gray-300',
        'ghost' => 'hover:bg-gray-100 hover:text-gray-900',
        'link' => 'text-blue-600 underline-offset-4 hover:underline',
    ];
    
    $sizes = [
        'default' => 'h-10 px-4 py-2',
        'sm' => 'h-9 rounded-md px-3 text-sm',
        'lg' => 'h-11 rounded-md px-8',
        'icon' => 'h-10 w-10',
    ];
    
    $baseClasses = 'inline-flex items-center justify-center whitespace-nowrap rounded-md font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';
    $variantClasses = $variants[$variant] ?? $variants['default'];
    $sizeClasses = $sizes[$size] ?? $sizes['default'];
    
    $classes = $baseClasses . ' ' . $variantClasses . ' ' . $sizeClasses;
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
