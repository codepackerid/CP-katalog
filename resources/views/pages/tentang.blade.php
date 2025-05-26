@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
    
    <!-- Header -->
    <section class="bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <h1 class="text-3xl md:text-4xl font-bold font-heading mb-4">Tentang Codepacker</h1>
            <p class="text-lg text-blue-100">Mengenal lebih dekat platform portfolio dan social networking untuk RPL SMKN 4 Malang</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                <h2 class="text-3xl font-bold font-heading text-gray-900 mb-6">Siapa Kami</h2>
                <p class="text-lg text-gray-700 mb-8">{{ $aboutData['description'] }}</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-16 mb-16">
                    <div>
                        <h3 class="text-2xl font-bold font-heading text-gray-900 mb-4">Visi</h3>
                        <p class="text-lg text-gray-700">{{ $aboutData['visi'] }}</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold font-heading text-gray-900 mb-4">Misi</h3>
                        <ul class="space-y-2">
                            @foreach($aboutData['misi'] as $misi)
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-blue-500 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700">{{ $misi }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <h2 class="text-3xl font-bold font-heading text-gray-900 mb-6">Struktur Tim</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    @foreach($aboutData['team'] as $member)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden text-center">
                            <div class="p-4">
                                <img src="{{ $member['photo'] }}" alt="{{ $member['name'] }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-lg font-bold text-gray-900">{{ $member['name'] }}</h3>
                                <p class="text-sm text-blue-600 font-medium">{{ $member['role'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <h2 class="text-3xl font-bold font-heading text-gray-900 mb-6">Nilai-Nilai Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="inline-flex items-center justify-center p-2 bg-blue-500 rounded-md text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold font-heading text-gray-900 mb-2">Inovasi</h3>
                        <p class="text-gray-700">Kami mendorong kreativitas dan pemikiran out of the box dalam pengembangan solusi digital.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="inline-flex items-center justify-center p-2 bg-blue-500 rounded-md text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold font-heading text-gray-900 mb-2">Kolaborasi</h3>
                        <p class="text-gray-700">Kami percaya kekuatan tim dan kolaborasi dalam menciptakan produk yang luar biasa.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="inline-flex items-center justify-center p-2 bg-blue-500 rounded-md text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold font-heading text-gray-900 mb-2">Kualitas</h3>
                        <p class="text-gray-700">Kami selalu mengedepankan standar kualitas tinggi dalam setiap karya yang dihasilkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold font-heading text-gray-900 mb-4">Tertarik Bergabung?</h2>
            <p class="text-lg text-gray-700 mb-8 max-w-3xl mx-auto">Menjadi bagian dari Codepacker adalah kesempatan untuk mengembangkan skill, memperluas jaringan, dan memamerkan karyamu kepada dunia.</p>
            <x-button href="/forum" size="lg">
                Mulai Diskusi di Forum
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </x-button>
        </div>
    </section>
@endsection
