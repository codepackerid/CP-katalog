@props([
    'href' => null,
    'type' => 'primary',
    'size' => 'md'
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200';
    
    $sizeClasses = [
        'sm' => 'py-1.5 px-3 text-xs',
        'md' => 'py-2 px-4 text-sm',
        'lg' => 'py-2.5 px-5 text-base',
    ][$size];
    
    $typeClasses = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
        'outline' => 'border border-blue-600 text-blue-600 hover:bg-blue-50 focus:ring-blue-500',
        'ghost' => 'text-blue-600 hover:bg-blue-50 focus:ring-blue-500',
    ][$type];
    
    $classes = $baseClasses . ' ' . $sizeClasses . ' ' . $typeClasses;
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
