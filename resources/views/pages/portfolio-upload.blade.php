@extends('layouts.app')

@section('title', 'Upload Portfolio')

@section('content')
    <!-- Page Header with Aurora Background -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <x-ui.aurora-background />
        </div>
        
        <div class="relative z-10 py-16 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold font-heading text-center text-gray-900">Upload Project</h1>
            <p class="mt-4 text-lg text-gray-600 text-center max-w-2xl">Tambahkan project baru ke portfolio Anda</p>
        </div>
    </div>
    
    <!-- Upload Form -->
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="font-bold font-heading text-gray-900">Informasi Project</h3>
            </div>
            
            <form action="#" method="POST" class="p-6 space-y-6">
                @csrf
                
                <!-- Project Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Project</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan judul project" required>
                </div>
                
                <!-- Project Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Project</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Jelaskan tentang project Anda" required></textarea>
                </div>
                
                <!-- Project Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gambar Project</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload gambar</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 10MB</p>
                        </div>
                    </div>
                </div>
                
                <!-- Technologies -->
                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700">Teknologi yang Digunakan</label>
                    <div class="mt-1">
                        <select id="technologies" name="technologies[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="HTML">HTML</option>
                            <option value="CSS">CSS</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="React">React</option>
                            <option value="Vue.js">Vue.js</option>
                            <option value="Angular">Angular</option>
                            <option value="Node.js">Node.js</option>
                            <option value="Express">Express</option>
                            <option value="Bootstrap">Bootstrap</option>
                            <option value="Tailwind CSS">Tailwind CSS</option>
                            <option value="MySQL">MySQL</option>
                            <option value="MongoDB">MongoDB</option>
                            <option value="Firebase">Firebase</option>
                            <option value="Flutter">Flutter</option>
                            <option value="React Native">React Native</option>
                            <option value="Unity">Unity</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Flask">Flask</option>
                            <option value="Java">Java</option>
                            <option value="Spring Boot">Spring Boot</option>
                            <option value="Docker">Docker</option>
                            <option value="AWS">AWS</option>
                            <option value="Kubernetes">Kubernetes</option>
                        </select>
                        <p class="mt-1 text-sm text-gray-500">Tahan tombol Ctrl (Windows) atau Command (Mac) untuk memilih beberapa teknologi</p>
                    </div>
                </div>
                
                <!-- Project URL -->
                <div>
                    <label for="project_url" class="block text-sm font-medium text-gray-700">URL Project</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">https://</span>
                        <input type="text" name="project_url" id="project_url" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" placeholder="www.example.com">
                    </div>
                </div>
                
                <!-- GitHub URL -->
                <div>
                    <label for="github_url" class="block text-sm font-medium text-gray-700">URL GitHub</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">https://github.com/</span>
                        <input type="text" name="github_url" id="github_url" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" placeholder="username/repository">
                    </div>
                </div>
                
                <!-- Project Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Project</label>
                    <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="" disabled selected>Pilih jenis project</option>
                        <option value="web">Web App</option>
                        <option value="mobile">Mobile App</option>
                        <option value="desktop">Desktop App</option>
                        <option value="game">Game</option>
                        <option value="iot">IoT</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
                
                <!-- Submit Button -->
                <div class="pt-4 flex justify-end">
                    <a href="{{ url('/profile') }}" class="mr-4 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                        </svg>
                        Upload Project
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Tips Section -->
        <div class="mt-6 bg-blue-50 rounded-xl p-6">
            <h4 class="text-lg font-bold font-heading text-blue-800">Tips Upload Project</h4>
            <ul class="mt-4 space-y-2 text-sm text-blue-700">
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gunakan gambar dengan resolusi minimal 1280x720 pixel untuk tampilan terbaik</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Berikan deskripsi yang detail dan mencakup fitur-fitur utama project</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Pilih semua teknologi yang digunakan dalam project untuk memudahkan pencarian</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Pastikan URL yang dimasukkan valid dan dapat diakses</span>
                </li>
            </ul>
        </div>
    </div>
@endsection 