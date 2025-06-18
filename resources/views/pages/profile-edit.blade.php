@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Profil</h1>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="avatar" class="block text-gray-700 font-medium mb-2">Foto Profil</label>
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 rounded-full overflow-hidden bg-gray-100">
                        @if ($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <input type="file" name="avatar" id="avatar" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>
                @error('avatar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-gray-700 font-medium mb-2">Bio</label>
                <textarea name="bio" id="bio" rows="4" class="border border-gray-300 rounded px-3 py-2 w-full">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-medium mb-2">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ old('location', $user->location) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="website" class="block text-gray-700 font-medium mb-2">Website</label>
                <input type="url" name="website" id="website" value="{{ old('website', $user->website) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('website')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="github" class="block text-gray-700 font-medium mb-2">GitHub</label>
                <input type="text" name="github" id="github" value="{{ old('github', $user->github) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('github')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="instagram" class="block text-gray-700 font-medium mb-2">Instagram</label>
                <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $user->instagram) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('instagram')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="linkedin" class="block text-gray-700 font-medium mb-2">LinkedIn</label>
                <input type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $user->linkedin) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('linkedin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="twitter" class="block text-gray-700 font-medium mb-2">Twitter</label>
                <input type="text" name="twitter" id="twitter" value="{{ old('twitter', $user->twitter) }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('twitter')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                    Simpan Perubahan
                </button>
                <a href="{{ route('profile') }}" class="text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 