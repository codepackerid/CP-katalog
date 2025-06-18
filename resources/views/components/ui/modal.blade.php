@props([
    'id',
    'title',
    'maxWidth' => 'md',
    'closeButton' => true
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
    '3xl' => 'sm:max-w-3xl',
    '4xl' => 'sm:max-w-4xl',
    '5xl' => 'sm:max-w-5xl',
    '6xl' => 'sm:max-w-6xl',
    '7xl' => 'sm:max-w-7xl',
    'full' => 'sm:max-w-full',
][$maxWidth];
@endphp

<div
    id="{{ $id }}"
    class="modal fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden p-4 md:p-6 bg-gray-900 bg-opacity-75 backdrop-blur-sm hidden"
    role="dialog"
    aria-labelledby="{{ $id }}-title"
    aria-modal="true"
    tabindex="-1">
    
    <div class="modal-backdrop absolute inset-0"></div>
    
    <div class="relative w-full {{ $maxWidth }} mx-auto my-8 transition-all duration-300 ease-in-out transform">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-700 animate-modal">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700">
                <h3 class="text-lg md:text-xl font-bold font-heading text-gray-900 dark:text-white" id="{{ $id }}-title">{{ $title }}</h3>
                
                @if ($closeButton)
                <button 
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 rounded-full p-2 transition-colors duration-200"
                    data-modal-close="{{ $id }}"
                    aria-label="Close">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                @endif
            </div>
            
            <!-- Body -->
            <div class="px-6 py-5 max-h-[calc(100vh-12rem)] overflow-y-auto custom-scrollbar">
                {{ $slot }}
            </div>
            
            <!-- Footer if available -->
            @if (isset($footer))
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-100 dark:border-gray-600 flex justify-end space-x-3">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .animate-modal {
        animation: modalFadeIn 0.3s ease-out forwards;
    }
    
    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(156, 163, 175, 0.5) rgba(243, 244, 246, 0.1);
    }
    
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(243, 244, 246, 0.1);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(156, 163, 175, 0.5);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: rgba(156, 163, 175, 0.8);
    }
    
    /* Focus trap untuk aksesibilitas */
    .modal:focus-visible {
        outline: 2px solid #3b82f6;
        outline-offset: 2px;
    }
</style> 