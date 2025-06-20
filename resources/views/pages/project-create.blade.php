@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Upload Proyek Baru</h1>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Judul Proyek</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="5" class="border border-gray-300 rounded px-3 py-2 w-full" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Gambar Proyek</label>
                <input type="file" name="image" id="image" class="border border-gray-300 rounded px-3 py-2 w-full">
                <p class="text-gray-500 text-sm mt-1">Unggah gambar dengan ukuran maksimal 2MB</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="repository_url" class="block text-gray-700 font-medium mb-2">URL Repository</label>
                <input type="url" name="repository_url" id="repository_url" value="{{ old('repository_url') }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                @error('repository_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="demo_url" class="block text-gray-700 font-medium mb-2">URL Demo Website</label>
                <input type="url" name="demo_url" id="demo_url" value="{{ old('demo_url') }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                <p class="text-gray-500 text-sm mt-1">Tautan ke website demo aplikasi (opsional)</p>
                @error('demo_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="figma_url" class="block text-gray-700 font-medium mb-2">URL Figma</label>
                <input type="url" name="figma_url" id="figma_url" value="{{ old('figma_url') }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                <p class="text-gray-500 text-sm mt-1">Tautan ke desain Figma (opsional)</p>
                @error('figma_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-medium mb-2">URL Video Demo</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                <p class="text-gray-500 text-sm mt-1">Tautan ke video demo di YouTube/Vimeo (opsional)</p>
                @error('video_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Teknologi yang Digunakan</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" id="tech_laravel" value="Laravel" class="mr-2">
                        <label for="tech_laravel">Laravel</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" id="tech_vue" value="Vue.js" class="mr-2">
                        <label for="tech_vue">Vue.js</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" id="tech_react" value="React" class="mr-2">
                        <label for="tech_react">React</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" id="tech_php" value="PHP" class="mr-2">
                        <label for="tech_php">PHP</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" id="tech_javascript" value="JavaScript" class="mr-2">
                        <label for="tech_javascript">JavaScript</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" id="tech_mysql" value="MySQL" class="mr-2">
                        <label for="tech_mysql">MySQL</label>
                    </div>
                </div>
                @error('technologies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Fitur Utama Proyek</label>
                <p class="text-gray-500 text-sm mb-3">Tambahkan fitur-fitur utama dari proyek Anda</p>
                
                <div id="features-container">
                    <div class="feature-item bg-gray-50 p-3 rounded-lg mb-3">
                        <div class="mb-2">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Judul Fitur</label>
                            <input type="text" name="features[0][title]" class="border border-gray-300 rounded px-3 py-2 w-full">
                        </div>
                        <div class="mb-2">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Deskripsi Fitur</label>
                            <textarea name="features[0][description]" rows="2" class="border border-gray-300 rounded px-3 py-2 w-full"></textarea>
                        </div>
                        <button type="button" class="remove-feature text-red-500 text-sm mt-1 hover:text-red-700">Hapus Fitur</button>
                    </div>
                </div>
                
                <button type="button" id="add-feature" class="mt-2 bg-gray-200 hover:bg-gray-300 text-gray-800 py-1 px-3 rounded text-sm">
                    + Tambah Fitur
                </button>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Screenshots Project</label>
                <p class="text-gray-500 text-sm mb-3">Tambahkan screenshot untuk memperlihatkan tampilan proyek Anda</p>
                
                <div id="screenshots-container" class="space-y-4">
                    <div class="screenshot-item bg-gray-50 p-4 rounded-lg">
                        <div class="flex flex-col md:flex-row gap-4 items-start">
                            <div class="flex-1">
                                <div class="mb-2">
                                    <label class="block text-gray-700 text-sm font-medium mb-1">URL Screenshot</label>
                                    <input type="url" name="screenshots[]" class="border border-gray-300 rounded px-3 py-2 w-full screenshot-input" placeholder="https://example.com/screenshot.jpg">
                                    <p class="text-xs text-gray-500 mt-1">Masukkan URL gambar screenshot</p>
                                </div>
                                
                                <div class="flex items-center">
                                    <button type="button" class="remove-screenshot text-red-500 text-xs hover:text-red-700 mr-4">
                                        Hapus Screenshot
                                    </button>
                                    <span class="text-gray-500 text-xs screenshot-number">Screenshot #1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" id="add-screenshot" class="mt-3 bg-gray-200 hover:bg-gray-300 text-gray-800 py-1 px-3 rounded text-sm">
                    + Tambah Screenshot
                </button>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                    Unggah Proyek
                </button>
                <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featuresContainer = document.getElementById('features-container');
        const addFeatureButton = document.getElementById('add-feature');
        
        // Inisialisasi counter untuk ID baru
        let featureCounter = document.querySelectorAll('.feature-item').length;
        
        // Tambah fitur baru
        addFeatureButton.addEventListener('click', function() {
            const newFeature = document.createElement('div');
            newFeature.className = 'feature-item bg-gray-50 p-3 rounded-lg mb-3';
            newFeature.innerHTML = `
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Judul Fitur</label>
                    <input type="text" name="features[${featureCounter}][title]" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Deskripsi Fitur</label>
                    <textarea name="features[${featureCounter}][description]" rows="2" class="border border-gray-300 rounded px-3 py-2 w-full"></textarea>
                </div>
                <button type="button" class="remove-feature text-red-500 text-sm mt-1 hover:text-red-700">Hapus Fitur</button>
            `;
            
            featuresContainer.appendChild(newFeature);
            featureCounter++;
        });
        
        // Hapus fitur
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-feature')) {
                const featureItem = e.target.closest('.feature-item');
                
                // Pastikan selalu ada minimal 1 fitur
                if (document.querySelectorAll('.feature-item').length > 1) {
                    featureItem.remove();
                } else {
                    // Reset form jika ini fitur terakhir
                    const inputs = featureItem.querySelectorAll('input, textarea');
                    inputs.forEach(input => input.value = '');
                }
            }
        });
        
        // Screenshots management
        const screenshotsContainer = document.getElementById('screenshots-container');
        const addScreenshotButton = document.getElementById('add-screenshot');
        
        // Inisialisasi counter untuk ID screenshot baru
        let screenshotCounter = document.querySelectorAll('.screenshot-item').length;
        
        // Add new screenshot
        addScreenshotButton.addEventListener('click', function() {
            const newScreenshot = document.createElement('div');
            newScreenshot.className = 'screenshot-item bg-gray-50 p-4 rounded-lg';
            
            newScreenshot.innerHTML = `
                <div class="flex flex-col md:flex-row gap-4 items-start">
                    <div class="flex-1">
                        <div class="mb-2">
                            <label class="block text-gray-700 text-sm font-medium mb-1">URL Screenshot</label>
                            <input type="url" name="screenshots[]" class="border border-gray-300 rounded px-3 py-2 w-full screenshot-input" placeholder="https://example.com/screenshot.jpg">
                            <p class="text-xs text-gray-500 mt-1">Masukkan URL gambar screenshot</p>
                        </div>
                        
                        <div class="flex items-center">
                            <button type="button" class="remove-screenshot text-red-500 text-xs hover:text-red-700 mr-4">
                                Hapus Screenshot
                            </button>
                            <span class="text-gray-500 text-xs screenshot-number">Screenshot #${screenshotCounter+1}</span>
                        </div>
                    </div>
                </div>
            `;
            
            screenshotsContainer.appendChild(newScreenshot);
            screenshotCounter++;
            updateScreenshotNumbers();
        });
        
        // Remove screenshot
        screenshotsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-screenshot')) {
                const screenshotItem = e.target.closest('.screenshot-item');
                
                // Only allow removal if there's more than one screenshot
                if (document.querySelectorAll('.screenshot-item').length > 1) {
                    screenshotItem.remove();
                    updateScreenshotNumbers();
                } else {
                    // Just clear the input if it's the last one
                    const input = screenshotItem.querySelector('.screenshot-input');
                    if (input) input.value = '';
                    
                    // Remove preview if any
                    const preview = screenshotItem.querySelector('.preview-container');
                    if (preview) preview.remove();
                }
            }
        });

        // Update screenshot numbers after removal
        function updateScreenshotNumbers() {
            const screenshots = document.querySelectorAll('.screenshot-item');
            screenshots.forEach((item, index) => {
                const numberElement = item.querySelector('.screenshot-number');
                if (numberElement) {
                    numberElement.textContent = `Screenshot #${index + 1}`;
                }
            });
        }
        
        // Live preview for screenshot URLs
        screenshotsContainer.addEventListener('input', function(e) {
            if (e.target.classList.contains('screenshot-input')) {
                const screenshotItem = e.target.closest('.screenshot-item');
                const url = e.target.value.trim();
                
                // Find or create preview container
                let previewContainer = screenshotItem.querySelector('.preview-container');
                if (!previewContainer && url) {
                    const flexContainer = screenshotItem.querySelector('.flex');
                    previewContainer = document.createElement('div');
                    previewContainer.className = 'preview-container w-full md:w-32 mb-2';
                    const img = document.createElement('img');
                    img.className = 'w-full h-auto rounded';
                    previewContainer.appendChild(img);
                    flexContainer.insertBefore(previewContainer, flexContainer.firstChild);
                }
                
                // Update or remove preview
                if (previewContainer) {
                    const img = previewContainer.querySelector('img');
                    if (url && img) {
                        img.src = url;
                        img.alt = `Screenshot ${screenshotItem.querySelector('.screenshot-number').textContent.replace('Screenshot #', '')}`;
                    } else if (!url) {
                        previewContainer.remove();
                    }
                }
            }
        });
    });
</script>
@endsection
