@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Ubah Password</h1>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 font-medium mb-2">Password Saat Ini</label>
                <input type="password" name="current_password" id="current_password" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password Baru</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 rounded px-3 py-2 w-full">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                    Ubah Password
                </button>
                <a href="{{ route('profile') }}" class="text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
