@props(['name', 'photo', 'angkatan', 'role', 'github' => '#'])

<div class="group bg-white rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-lg hover:translate-y-[-3px] border border-gray-100">
    <!-- Image Container with overlay and hover effects -->
    <div class="relative h-60 overflow-hidden">
        <img src="{{ $photo }}" alt="{{ $name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
        
        <!-- Modern gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent opacity-70"></div>
        
        <!-- Name overlay at the bottom of image -->
        <div class="absolute bottom-0 left-0 w-full p-4">
            <h3 class="text-lg font-bold text-white mb-2 drop-shadow-md">{{ $name }}</h3>
            <div class="flex flex-wrap gap-2">
                <span class="bg-white/30 backdrop-blur-sm text-white text-xs px-2.5 py-1 rounded-full flex items-center gap-1.5 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                    Angkatan {{ $angkatan }}
                </span>
            </div>
        </div>
        
        <!-- GitHub button on hover -->
        <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <a href="{{ $github }}" target="_blank" class="flex items-center justify-center w-9 h-9 bg-white/90 text-gray-800 rounded-full hover:bg-blue-500 hover:text-white shadow-md transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
            </a>
        </div>
    </div>
    
    <!-- Content Section -->
    <div class="p-5">
        <div class="flex items-center justify-between mb-3">
            <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1.5 rounded-lg flex items-center gap-1.5 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code-2"><path d="m18 16 4-4-4-4"/><path d="m6 8-4 4 4 4"/><path d="m14.5 4-5 16"/></svg>
                {{ $role }}
            </span>
            
            <span class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-md">Bergabung 2023</span>
        </div>
        
        <p class="text-sm text-gray-600 mb-5 line-clamp-2">Siswa/i berbakat dari jurusan RPL SMKN 4 Malang dengan keahlian {{ $role }} yang aktif dalam mengembangkan berbagai proyek.</p>
        
        <!-- Action Buttons -->
        <div class="flex items-center gap-2">
            <a href="#" class="flex-grow flex items-center justify-center gap-1 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors py-2.5 px-4 rounded-lg shadow-sm">
                Lihat Profil
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
            <a href="{{ $github }}" target="_blank" class="flex items-center justify-center gap-1 text-sm font-medium bg-gray-100 hover:bg-gray-200 transition-colors py-2.5 px-4 rounded-lg text-blue-600 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github text-blue-600"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                GitHub
            </a>
        </div>
    </div>
</div>
