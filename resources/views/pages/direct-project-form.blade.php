@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Upload Project Baru</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/direct-project-store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Project</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Project</label>
                <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="repository_url" class="block text-sm font-medium text-gray-700 mb-1">URL Repository (opsional)</label>
                <input type="url" name="repository_url" id="repository_url" value="{{ old('repository_url') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('repository_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="demo_url" class="block text-sm font-medium text-gray-700 mb-1">URL Demo (opsional)</label>
                <input type="url" name="demo_url" id="demo_url" value="{{ old('demo_url') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('demo_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700 mb-1">Teknologi (opsional)</label>
                <select name="technologies[]" id="technologies" multiple class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="PHP">PHP</option>
                    <option value="Laravel">Laravel</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="React">React</option>
                    <option value="Vue">Vue</option>
                    <option value="Angular">Angular</option>
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="Tailwind">Tailwind</option>
                    <option value="Bootstrap">Bootstrap</option>
                    <option value="Python">Python</option>
                    <option value="Django">Django</option>
                    <option value="Node.js">Node.js</option>
                    <option value="Express.js">Express.js</option>
                    <option value="MySQL">MySQL</option>
                    <option value="MongoDB">MongoDB</option>
                    <option value="PostgreSQL">PostgreSQL</option>
                </select>
                <p class="text-xs text-gray-500 mt-1">Tekan tombol CTRL untuk memilih beberapa teknologi</p>
                @error('technologies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Project</label>
                <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="text-xs text-gray-500 mt-1">Format yang didukung: JPG, PNG, GIF. Maks 2MB.</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Upload Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 