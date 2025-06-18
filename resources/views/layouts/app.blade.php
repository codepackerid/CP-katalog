<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Codepacker.net - @yield('title', 'Platform Portfolio RPL SMKN 4 Malang')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- Modal Handler Script -->
    <script src="{{ asset('js/modal.js') }}" defer></script>
    
    <!-- Styles -->
    <!-- Use Tailwind CSS via CDN for development -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'heading': ['Space Grotesk', 'sans-serif'],
                        'sans': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'aurora': 'aurora 60s linear infinite',
                    },
                    keyframes: {
                        aurora: {
                            'from': {
                                backgroundPosition: '50% 50%, 50% 50%',
                            },
                            'to': {
                                backgroundPosition: '350% 50%, 350% 50%',
                            },
                        }
                    },
                }
            }
        }
    </script>
    
    <!-- Aurora CSS -->
    <link rel="stylesheet" href="{{ asset('css/aurora.css') }}">
    <!-- Original Vite styles (commented out until we can build properly) -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    
    <style>
        /* Custom styles */
        :root {
            --white: #ffffff;
            --black: #000000;
            --transparent: transparent;
            --blue-300: #93c5fd;
            --blue-400: #60a5fa;
            --blue-500: #3b82f6;
            --indigo-300: #a5b4fc;
            --violet-200: #ddd6fe;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        /* Aurora animations */
        @keyframes aurora {
            from {
                background-position: 50% 50%, 50% 50%;
            }
            to {
                background-position: 350% 50%, 350% 50%;
            }
        }
        
        .animate-aurora {
            animation: aurora 60s linear infinite;
        }
    </style>
</head>
<body class="min-h-screen bg-white flex flex-col">
    <!-- Navbar -->
    <x-ui.tubelight-navbar :active="request()->is('/') ? 'Beranda' : (request()->is('projects*') ? 'Projects' : (request()->is('anggota*') ? 'Anggota' : (request()->is('tentang*') ? 'Tentang' : (request()->is('forum*') ? 'Forum' : 'Beranda'))))" />
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Scripts -->
    <script>
        // Toggle mobile menu (legacy code kept for reference)
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }
        
        // Add event listener safely
        document.addEventListener('DOMContentLoaded', function() {
            // Prevent errors from non-existent elements
            const safeAddEventListener = function(selector, event, handler) {
                const element = document.querySelector(selector);
                if (element) {
                    element.addEventListener(event, handler);
                }
            };
        });
    </script>
    
    <!-- Stack for component scripts -->
    @stack('scripts')
</body>
</html>
