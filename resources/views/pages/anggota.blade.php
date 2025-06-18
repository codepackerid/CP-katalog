@extends('layouts.app')

@section('title', 'Anggota')

@section('content')
    
    <!-- Simple Hero Section with Natural Light Theme - Match with Projects Page -->
    <section class="relative bg-gradient-to-b from-gray-50 to-gray-100 text-gray-900 overflow-hidden">
        <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMwMDAwMDAiIGZpbGwtb3BhY2l0eT0iMC4yIj48cGF0aCBkPSJNMzYgMzRjMCAxIDEgMiAyIDIgMi0xIDMtMSA1IDAgMSAxIDIgMCAyLTEgMC0yLTEtMy0yLTMtNCAwLTcgMC03IDJ6bS0xNy0xYzAgMSAxIDIgMiAxIDIgMCA1LTIgNy0yLTEtMi00LTItNy0xLTIgMC0yIDEtMiAyeiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+')] w-full h-full bg-center"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold font-heading mb-6 leading-tight">Anggota Codepacker</h1>
                <p class="text-xl text-gray-700 leading-relaxed mb-8 mx-auto max-w-2xl">Siswa/i berbakat dari jurusan RPL SMKN 4 Malang yang kreatif dan inovatif</p>
                
                <!-- Simple Search Form -->
                <form action="{{ route('anggota.index') }}" method="GET" class="mb-8 mx-auto max-w-lg">
                    <div class="flex shadow-sm">
                        <input type="text" name="search" value="{{ isset($searchTerm) && is_string($searchTerm) ? $searchTerm : '' }}" class="flex-grow py-3 px-4 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-gray-200 focus:border-gray-400" placeholder="Cari anggota...">
                        <button type="submit" class="bg-gray-800 text-white px-6 py-3 rounded-r-lg hover:bg-gray-700 transition-colors">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Members Grid Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid Header with counts and filter options -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 text-center md:text-left">
                <div class="mx-auto md:mx-0">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ isset($searchTerm) && !empty($searchTerm) ? 'Hasil Pencarian' : 'Anggota Kami' }}</h2>
                    <p class="text-gray-600">
                        @if(isset($searchTerm) && !empty($searchTerm))
                            Hasil pencarian untuk "{{ $searchTerm }}"
                        @else
                            Menampilkan {{ count($members) }} anggota
                        @endif
                    </p>
                </div>
                <div class="flex items-center gap-2 mx-auto md:mx-0">
                    <span class="text-sm text-gray-500">Filter:</span>
                    <div class="bg-white shadow-sm rounded-xl p-1 inline-flex flex-wrap justify-center border border-gray-200">
                        <a href="/anggota" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all {{ !isset($_GET['angkatan']) ? 'bg-gray-800 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
                            Semua
                        </a>
                        <a href="/anggota?angkatan=2021" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all {{ isset($_GET['angkatan']) && $_GET['angkatan'] == '2021' ? 'bg-gray-800 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
                            2021
                        </a>
                        <a href="/anggota?angkatan=2022" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all {{ isset($_GET['angkatan']) && $_GET['angkatan'] == '2022' ? 'bg-gray-800 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
                            2022
                        </a>
                        <a href="/anggota?angkatan=2023" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all {{ isset($_GET['angkatan']) && $_GET['angkatan'] == '2023' ? 'bg-gray-800 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
                            2023
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Empty state - only show when no members match search -->
            @if(count($members) == 0)
                <div class="bg-white rounded-xl shadow-sm p-12 text-center my-12 max-w-2xl mx-auto border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-gray-400 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada anggota yang ditemukan</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">Tidak ada anggota yang sesuai dengan kriteria pencarian. Coba kata kunci yang berbeda.</p>
                    <a href="/anggota" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 transition-colors">
                        Lihat Semua Anggota
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-8">
                    @foreach($members as $member)
                        <x-member-card 
                            :name="$member->name" 
                            :photo="$member->avatar ? asset('storage/' . $member->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&color=7F9CF5&background=EBF4FF'" 
                            :angkatan="$member->angkatan ?? '-'" 
                            :role="$member->role ?? '-'"
                            :github="$member->github ? 'https://github.com/' . $member->github : '#'"
                        />
                    @endforeach
                </div>
            @endif
            
            <!-- Pagination - Static for MVP -->
            <div class="flex justify-center mt-8">
                <nav class="inline-flex shadow-sm">
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-blue-500 hover:bg-gray-50">
                        &laquo; Prev
                    </a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-blue-600 text-sm font-medium text-white hover:bg-blue-700">
                        1
                    </a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        2
                    </a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        3
                    </a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-blue-500 hover:bg-gray-50">
                        Next &raquo;
                    </a>
                </nav>
            </div>
        </div>
    </section>
@endsection
