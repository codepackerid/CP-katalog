@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <!-- Simple Hero Section with Natural Light Theme -->
    <section class="relative bg-gradient-to-b from-gray-50 to-gray-100 text-gray-900 overflow-hidden">
        <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMwMDAwMDAiIGZpbGwtb3BhY2l0eT0iMC4yIj48cGF0aCBkPSJNMzYgMzRjMCAxIDEgMiAyIDIgMi0xIDMtMSA1IDAgMSAxIDIgMCAyLTEgMC0yLTEtMy0yLTMtNCAwLTcgMC03IDJ6bS0xNy0xYzAgMSAxIDIgMiAxIDIgMCA1LTIgNy0yLTEtMi00LTItNy0xLTIgMC0yIDEtMiAyeiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+')] w-full h-full bg-center"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold font-heading mb-6 leading-tight">Project Showcase</h1>
                <p class="text-xl text-gray-700 leading-relaxed mb-8 mx-auto max-w-2xl">Karya-karya terbaik dari siswa/i RPL SMKN 4 Malang yang menginspirasi dan inovatif</p>
                
                <!-- Simple Search Form -->
                <form action="{{ route('projects.index') }}" method="GET" class="mb-8 mx-auto max-w-lg">
                    <div class="flex">
                        <input type="text" name="search" value="{{ is_string($searchTerm ?? '') ? ($searchTerm ?? '') : '' }}" class="flex-grow py-3 px-4 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-gray-200 focus:border-gray-400" placeholder="Cari proyek...">
                        <button type="submit" class="bg-gray-800 text-white px-6 py-3 rounded-r-lg hover:bg-gray-700 transition-colors">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Projects Grid Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid Header with counts and search results info -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 text-center md:text-left">
                <div class="mx-auto md:mx-0">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ !empty($searchTerm) && is_string($searchTerm) ? 'Hasil Pencarian' : 'Proyek Terbaru' }}</h2>
                    <p class="text-gray-600">
                        @if(!empty($searchTerm) && is_string($searchTerm))
                            Hasil pencarian untuk "{{ $searchTerm }}"
                        @else
                            Menampilkan {{ count($projects) }} proyek
                        @endif
                    </p>
                </div>
                <div class="flex items-center gap-2 mx-auto md:mx-0">
                    <span class="text-sm text-gray-500">Urutkan:</span>
                    <select class="bg-white border border-gray-300 rounded-md px-3 py-1.5 text-sm text-gray-700 focus:ring-gray-400 focus:border-gray-400">
                        <option>Terbaru</option>
                        <option>Terpopuler</option>
                        <option>A-Z</option>
                    </select>
                </div>
            </div>
            
            <!-- Empty state - only show when no projects -->
            @if(count($projects) == 0)
                <div class="bg-white rounded-xl shadow-sm p-12 text-center my-12 max-w-2xl mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-gray-400 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Belum ada proyek</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">Proyek-proyek baru akan ditambahkan segera.</p>
                </div>
            @endif
            
            <!-- Project Cards Grid using the project-card component -->                      
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse($projects as $project)
                    <x-project-card 
                        :title="$project->title" 
                        :image="$project->image ? asset('storage/' . $project->image) : 'https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?auto=format&fit=crop&w=1176&q=80'" 
                        :technologies="$project->technologies ?? []" 
                        :author="['name' => $project->user->name, 'avatar' => $project->user->avatar ? asset('storage/' . $project->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($project->user->name)]"
                        :description="$project->description"
                        :id="$project->id"
                        :screenshots="$project->screenshots ?? []"
                    />
                @empty
                <!-- Empty state - shown when no projects match search -->
                <div class="col-span-3 bg-white rounded-xl shadow-sm p-12 text-center my-6 max-w-2xl mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-gray-400 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada proyek yang ditemukan</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">Tidak ada proyek yang sesuai dengan kriteria pencarian. Coba kata kunci yang berbeda.</p>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 transition-colors">
                        Lihat Semua Proyek
                    </a>
                </div>
                @endforelse
            </div>
            
            <!-- Simple Pagination -->
            <div class="flex justify-center mt-16">
                <div class="inline-flex rounded-md shadow-sm overflow-hidden">
                    <a href="{{ route('projects.index') }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                        Lihat Semua Proyek
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Call to Action Section -->
    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Punya proyek yang ingin ditampilkan?</h2>
            <p class="text-gray-600 mx-auto mb-10 text-lg leading-relaxed">Ajukan proyek karya kamu untuk ditampilkan di Codepacker dan dapatkan feedback dari komunitas.</p>
            <div class="flex justify-center">
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-900 bg-white hover:bg-gray-100 transition-colors shadow-sm">
                    Ajukan Proyek
                </a>
            </div>
        </div>
    </section>
@endsection
