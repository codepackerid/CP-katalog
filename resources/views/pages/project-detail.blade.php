@extends('layouts.app')

@section('title', $project['title'])

@section('content')
    <!-- Project Header with Cover Image -->
    <div class="relative">
        <!-- Cover Image with Overlay -->
        <div class="h-[300px] md:h-[400px] w-full overflow-hidden relative">
            <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent"></div>
        </div>
        
        <!-- Project Title & Info (Overlaid on Image) -->
        <div class="absolute bottom-0 left-0 w-full p-6 md:p-10">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-white font-heading mb-3">{{ $project['title'] }}</h1>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project['technologies'] as $tech)
                                <span class="bg-gray-700/90 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="#" class="flex items-center gap-2 bg-white/90 backdrop-blur-sm text-gray-800 rounded-full py-2 px-4 text-sm font-medium hover:bg-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"/><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"/><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"/><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"/><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"/></svg>
                            Lihat Figma
                        </a>
                        <a href="#" class="flex items-center gap-2 bg-gray-900/90 backdrop-blur-sm text-white rounded-full py-2 px-4 text-sm font-medium hover:bg-gray-900 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                            GitHub Repository
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Left Column - Project Content -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-heading font-semibold mb-4">Tentang Project</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-700 mb-4">{{ $project['description'] }}</p>
                        <p class="text-gray-700 mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac enim auctor, accumsan augue id, feugiat nisl. 
                            Cras vestibulum nulla a diam tincidunt, in finibus nisl elementum. Fusce nec tincidunt dui. 
                            Suspendisse potenti. Nullam consequat, nisl at feugiat bibendum, erat purus euismod libero, a convallis urna urna at nisi.
                        </p>
                        <p class="text-gray-700 mb-4">
                            Proin tempus, elit eget pharetra finibus, nunc diam hendrerit sapien, eget vehicula turpis nulla nec mi. 
                            Integer porta nibh elit, ac ultricies augue condimentum eget. Nam feugiat convallis dolor, sit amet elementum nisi aliquam sed.
                        </p>
                    </div>
                </div>
                
                <!-- Features Section -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-heading font-semibold mb-4">Fitur Utama</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="bg-gray-100 text-gray-600 p-1 rounded-full mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">User Authentication</h3>
                                <p class="text-gray-600 text-sm">Login, register, dan management user dengan role-based access control.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-gray-100 text-gray-600 p-1 rounded-full mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Interactive Dashboard</h3>
                                <p class="text-gray-600 text-sm">Dashboard dengan visualisasi data dan metrics yang interaktif.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-gray-100 text-gray-600 p-1 rounded-full mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Real-time Notifications</h3>
                                <p class="text-gray-600 text-sm">Notifikasi real-time untuk aktivitas penting menggunakan WebSockets.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-gray-100 text-gray-600 p-1 rounded-full mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">API Integration</h3>
                                <p class="text-gray-600 text-sm">Terintegrasi dengan beberapa API eksternal untuk memperluas fungsionalitas.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Screenshots Section -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-heading font-semibold mb-4">Screenshots</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="rounded-lg overflow-hidden border border-gray-200">
                            <img src="https://placehold.co/600x400/e2e8f0/475569?text=Screenshot+1" alt="Screenshot 1" class="w-full h-auto">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-gray-200">
                            <img src="https://placehold.co/600x400/e2e8f0/475569?text=Screenshot+2" alt="Screenshot 2" class="w-full h-auto">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-gray-200">
                            <img src="https://placehold.co/600x400/e2e8f0/475569?text=Screenshot+3" alt="Screenshot 3" class="w-full h-auto">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-gray-200">
                            <img src="https://placehold.co/600x400/e2e8f0/475569?text=Screenshot+4" alt="Screenshot 4" class="w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Sidebar -->
            <div class="lg:w-1/3">
                <!-- Project Info Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <h3 class="text-lg font-heading font-semibold mb-4">Project Info</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Developer</span>
                                <span class="text-gray-900 text-sm font-medium">{{ $project['author']['name'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Tanggal Publikasi</span>
                                <span class="text-gray-900 text-sm font-medium">Maret 2023</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">Status</span>
                                <span class="bg-green-100 text-green-800 text-xs py-0.5 px-2 rounded-full">Completed</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 text-sm">License</span>
                                <span class="text-gray-900 text-sm font-medium">MIT</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Developer Profile Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <h3 class="text-lg font-heading font-semibold mb-4">Developer</h3>
                        <div class="flex items-center mb-4">
                            <img class="h-12 w-12 rounded-full border border-gray-200" src="{{ $project['author']['avatar'] }}" alt="{{ $project['author']['name'] }}">
                            <div class="ml-3">
                                <h4 class="text-base font-medium text-gray-900">{{ $project['author']['name'] }}</h4>
                                <p class="text-sm text-gray-600">RPL Angkatan 2022</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mb-4">
                            Developer dengan spesialisasi di web development dan UI/UX design. Memiliki beberapa project yang sudah dikembangkan.
                        </p>
                        <div class="flex gap-2">
                            <a href="#" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Related Projects -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-heading font-semibold mb-4">Project Terkait</h3>
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <img src="https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80" alt="Project" class="h-14 w-20 object-cover rounded-md">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">Inventory SMKN 4</h4>
                                    <p class="text-xs text-gray-600 mb-1">Sistem pengelolaan inventaris sekolah</p>
                                    <a href="{{ route('projects.show', 2) }}" class="text-xs text-gray-600 hover:text-gray-900 hover:underline">Lihat detail</a>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <img src="https://images.unsplash.com/photo-1542744095-fcf48d80b0fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1076&q=80" alt="Project" class="h-14 w-20 object-cover rounded-md">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">Portfolio Generator</h4>
                                    <p class="text-xs text-gray-600 mb-1">Aplikasi untuk membuat portfolio online</p>
                                    <a href="{{ route('projects.show', 4) }}" class="text-xs text-gray-600 hover:text-gray-900 hover:underline">Lihat detail</a>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Project" class="h-14 w-20 object-cover rounded-md">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">Smart Classroom</h4>
                                    <p class="text-xs text-gray-600 mb-1">Sistem kelas pintar dengan IoT</p>
                                    <a href="{{ route('projects.show', 6) }}" class="text-xs text-gray-600 hover:text-gray-900 hover:underline">Lihat detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
