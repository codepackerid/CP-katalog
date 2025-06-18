@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Hasil Pencarian: "{{ $query }}"</h1>

        @if ($projects->count() === 0 && $users->count() === 0)
            <div class="bg-gray-100 rounded-lg p-8 text-center">
                <h2 class="text-xl font-semibold mb-2">Tidak ada hasil yang ditemukan</h2>
                <p class="text-gray-600 mb-4">Coba dengan kata kunci pencarian yang berbeda</p>
                <a href="/" class="text-blue-500 hover:text-blue-700">Kembali ke Beranda</a>
            </div>
        @else
            <!-- Projects Results -->
            @if ($projects->count() > 0)
                <div class="mb-10">
                    <h2 class="text-xl font-semibold mb-4">Proyek ({{ $projects->count() }})</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($projects as $project)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="h-40 overflow-hidden">
                                    @if ($project->image)
                                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold text-lg mb-2">{{ $project->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        @foreach ($project->technologies ?? [] as $tech)
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                    <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Lihat Proyek</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Users Results -->
            @if ($users->count() > 0)
                <div>
                    <h2 class="text-xl font-semibold mb-4">Pengguna ({{ $users->count() }})</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($users as $user)
                            <div class="bg-white rounded-lg shadow-md p-4 flex items-start">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
                                    @if ($user->avatar)
                                        <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">{{ $user->name }}</h3>
                                    @if ($user->location)
                                        <p class="text-gray-600 text-sm mb-2">{{ $user->location }}</p>
                                    @endif
                                    @if ($user->bio)
                                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($user->bio, 100) }}</p>
                                    @endif
                                    <a href="{{ route('anggota.index') }}?user={{ $user->id }}" class="text-blue-500 hover:text-blue-700 font-medium">Lihat Profil</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
