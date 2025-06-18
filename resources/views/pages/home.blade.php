@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    
    <!-- Hero Section with Aurora Background -->
    <x-ui.animated-hero :titles="['inovatif', 'kreatif', 'berkualitas', 'modern', 'canggih']" />

    <!-- Featured Projects -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-gray-900">Project Unggulan</h2>
                <p class="mt-4 text-lg text-gray-600">Karya terbaik dari siswa/i RPL SMKN 4 Malang</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects->take(3) as $project)
                    <x-project-card 
                        :title="$project['title']" 
                        :image="$project['image']" 
                        :technologies="$project['technologies']" 
                        :author="$project['author']"
                    />
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <x-button href="/projects" type="outline">
                    Lihat Semua Project
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-button>
            </div>
        </div>
    </section>

    <!-- Featured Members -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-gray-900">Anggota Unggulan</h2>
                <p class="mt-4 text-lg text-gray-600">Talenta-talenta berbakat dari jurusan RPL SMKN 4 Malang</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($members->take(4) as $member)
                    <x-member-card 
                        :name="$member['name']" 
                        :photo="$member['photo']" 
                        :angkatan="$member['angkatan']" 
                        :role="$member['role']"
                    />
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <x-button href="/anggota" type="outline">
                    Lihat Semua Anggota
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-button>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold font-heading mb-4">Bergabung dengan Komunitas Codepacker</h2>
            <p class="text-lg text-blue-100 mb-8 max-w-3xl mx-auto">Kembangkan skill, perluas jaringan, dan tunjukkan karyamu kepada dunia.</p>
            <x-button href="/tentang" type="outline" class="bg-white">
                Pelajari Lebih Lanjut
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </x-button>
        </div>
    </section>
@endsection
