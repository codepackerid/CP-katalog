@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <!-- Modals -->
    <!-- Upload Portfolio Modal -->
    <x-ui.modal id="upload-portfolio-modal" title="Upload Project Baru" maxWidth="3xl">
        <form id="upload-portfolio-form" class="space-y-6">
            <!-- Project Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Project</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="Masukkan judul project" required>
            </div>
            
            <!-- Project Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Project</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200 resize-none" placeholder="Jelaskan tentang project Anda" required></textarea>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Tuliskan deskripsi yang jelas dan menarik tentang project Anda</p>
            </div>
            
            <!-- Project Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Project</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200 group">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 dark:text-gray-400">
                            <label for="file-upload" class="relative cursor-pointer bg-white dark:bg-transparent rounded-md font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 transition-colors duration-200">
                                <span>Upload gambar</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF hingga 10MB</p>
                    </div>
                </div>
                <div id="image-preview" class="hidden mt-3">
                    <div class="relative rounded-md overflow-hidden">
                        <img id="preview-image" src="#" alt="Preview" class="w-full h-40 object-cover">
                        <button type="button" id="remove-image" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Technologies -->
            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teknologi yang Digunakan</label>
                <div class="mt-1">
                    <select id="technologies" name="technologies[]" multiple class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200">
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
                    </select>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Tahan tombol Ctrl (Windows) atau Command (Mac) untuk memilih beberapa teknologi</p>
                </div>
            </div>
            
            <!-- Project URL -->
            <div>
                <label for="project_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL Project</label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">https://</span>
                    <input type="text" name="project_url" id="project_url" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="www.example.com">
                </div>
            </div>
            
            <!-- GitHub URL -->
            <div>
                <label for="github_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL GitHub</label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">https://github.com/</span>
                    <input type="text" name="github_url" id="github_url" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="username/repository">
                </div>
            </div>
            
            <!-- Project Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Project</label>
                <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 sm:text-sm rounded-md transition-colors duration-200">
                    <option value="" disabled selected>Pilih jenis project</option>
                    <option value="web">Web App</option>
                    <option value="mobile">Mobile App</option>
                    <option value="desktop">Desktop App</option>
                    <option value="game">Game</option>
                    <option value="iot">IoT</option>
                    <option value="other">Lainnya</option>
                </select>
            </div>
        </form>
        
        <x-slot name="footer">
            <button 
                type="button"
                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition-all duration-200"
                data-modal-close="upload-portfolio-modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Batal
            </button>
            <button 
                type="button"
                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition-all duration-200"
                onclick="handlePortfolioUpload()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                </svg>
                Upload Project
            </button>
        </x-slot>
    </x-ui.modal>
    
    <!-- Edit Profile Modal -->
    <x-ui.modal id="edit-profile-modal" title="Edit Profil" maxWidth="2xl">
        <form id="edit-profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <!-- Profile Photo -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-100 dark:border-blue-900 group">
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=7F9CF5&background=EBF4FF' }}" alt="Profile Photo" class="w-full h-full object-cover" id="profile-photo-preview">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <button type="button" class="absolute bottom-0 right-0 rounded-full bg-blue-600 p-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <input type="file" id="profile-photo" name="avatar" class="hidden" accept="image/*">
                    </div>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Klik ikon kamera untuk mengganti foto</p>
                </div>
                
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" value="{{ $user->name }}" required>
                </div>
                
                <!-- Role/Keahlian -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Peran/Keahlian</label>
                    <select id="role" name="role" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" required>
                        <option value="Front-end Developer" {{ $user->role == 'Front-end Developer' ? 'selected' : '' }}>Front-end Developer</option>
                        <option value="Back-end Developer" {{ $user->role == 'Back-end Developer' ? 'selected' : '' }}>Back-end Developer</option>
                        <option value="Full-stack Developer" {{ $user->role == 'Full-stack Developer' ? 'selected' : '' }}>Full-stack Developer</option>
                        <option value="UI/UX Designer" {{ $user->role == 'UI/UX Designer' ? 'selected' : '' }}>UI/UX Designer</option>
                        <option value="Mobile Developer" {{ $user->role == 'Mobile Developer' ? 'selected' : '' }}>Mobile Developer</option>
                        <option value="Game Developer" {{ $user->role == 'Game Developer' ? 'selected' : '' }}>Game Developer</option>
                        <option value="QA Engineer" {{ $user->role == 'QA Engineer' ? 'selected' : '' }}>QA Engineer</option>
                        <option value="DevOps Engineer" {{ $user->role == 'DevOps Engineer' ? 'selected' : '' }}>DevOps Engineer</option>
                    </select>
                </div>
                
                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                    <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200">{{ $user->bio }}</textarea>
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" value="{{ $user->email }}" required>
                </div>
                
                <!-- Social Media -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Social Media</label>
                    
                    <div class="space-y-3">
                        <!-- Instagram -->
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">instagram.com/</span>
                            <input type="text" name="instagram" id="instagram" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="username" value="{{ $user->instagram }}">
                        </div>
                        
                        <!-- LinkedIn -->
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">linkedin.com/in/</span>
                            <input type="text" name="linkedin" id="linkedin" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="username" value="{{ $user->linkedin }}">
                        </div>
                        
                        <!-- Twitter -->
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">twitter.com/</span>
                            <input type="text" name="twitter" id="twitter" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="username" value="{{ $user->twitter }}">
                        </div>
                        
                        <!-- GitHub -->
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">github.com/</span>
                            <input type="text" name="github" id="github" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="username" value="{{ $user->github }}">
                        </div>
                        
                        <!-- Website -->
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">https://</span>
                            <input type="text" name="website" id="website" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200" placeholder="example.com" value="{{ $user->website }}">
                        </div>
                    </div>
                </div>
                
                <!-- Skills -->
                <div>
                    <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keahlian</label>
                    <div class="mt-1">
                        <select id="skills" name="skills[]" multiple class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors duration-200">
                            <option value="HTML" selected>HTML</option>
                            <option value="CSS" selected>CSS</option>
                            <option value="JavaScript" selected>JavaScript</option>
                            <option value="PHP" selected>PHP</option>
                            <option value="Laravel" selected>Laravel</option>
                            <option value="React" selected>React</option>
                            <option value="Vue.js">Vue.js</option>
                            <option value="Angular">Angular</option>
                            <option value="Node.js">Node.js</option>
                            <option value="Express">Express</option>
                            <option value="Bootstrap">Bootstrap</option>
                            <option value="Tailwind CSS">Tailwind CSS</option>
                            <option value="MySQL" selected>MySQL</option>
                            <option value="MongoDB">MongoDB</option>
                            <option value="Firebase">Firebase</option>
                            <option value="Git" selected>Git</option>
                        </select>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Tahan tombol Ctrl (Windows) atau Command (Mac) untuk memilih beberapa keahlian</p>
                    </div>
                </div>
            </div>
        
        <x-slot name="footer">
            <button 
                type="button"
                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition-all duration-200"
                data-modal-close="edit-profile-modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Batal
            </button>
            <button 
                type="submit"
                form="edit-profile-form"
                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Perubahan
            </button>
        </x-slot>
        </form>
    </x-ui.modal>
    
    <!-- Page Header with Aurora Background -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <x-ui.aurora-background />
        </div>
        
        <div class="relative z-10 py-16 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold font-heading text-center text-gray-900">Profil Saya</h1>
            <p class="mt-4 text-lg text-gray-600 text-center max-w-2xl">Kelola informasi dan portfolio Anda di Codepacker</p>
        </div>
    </div>
    
    <!-- Profile Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Sidebar - Profile Summary -->
            <div class="col-span-1">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 text-center">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-blue-100">
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=7F9CF5&background=EBF4FF' }}" alt="Profile Photo" class="w-full h-full object-cover">
                        </div>
                        
                        <h2 class="mt-4 text-xl font-bold font-heading text-gray-900">{{ $user->name }}</h2>
                        <p class="text-blue-600 font-medium">{{ $user->role ?? 'Developer' }}</p>
                        <p class="text-gray-500 text-sm mt-1">{{ $user->bio }}</p>
                        
                        <div class="mt-6 flex justify-center space-x-4">
                            @if($user->instagram)
                            <a href="https://instagram.com/{{ $user->instagram }}" class="text-gray-500 hover:text-blue-600" target="_blank">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772a4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @endif
                            @if($user->linkedin)
                            <a href="https://linkedin.com/in/{{ $user->linkedin }}" class="text-gray-500 hover:text-blue-600" target="_blank">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                                </svg>
                            </a>
                            @endif
                            @if($user->twitter)
                            <a href="https://twitter.com/{{ $user->twitter }}" class="text-gray-500 hover:text-blue-600" target="_blank">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            @endif
                            @if($user->github)
                            <a href="https://github.com/{{ $user->github }}" class="text-gray-500 hover:text-blue-600" target="_blank">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @endif
                            @if($user->website)
                            <a href="{{ $user->website }}" class="text-gray-500 hover:text-blue-600" target="_blank">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-6 py-4">
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-500">Email</span>
                            <span class="text-gray-900 font-medium">{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-500">Project</span>
                            <span class="text-gray-900 font-medium">{{ count($projects) }} Project</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-500">Bergabung</span>
                            <span class="text-gray-900 font-medium">{{ $user->created_at->format('d F Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4">
                        <button 
                            type="button" 
                            class="block w-full py-2 px-3 text-center text-sm font-medium rounded-md text-blue-700 bg-blue-50 hover:bg-blue-100 transition duration-150 ease-in-out"
                            data-modal-trigger="edit-profile-modal">
                            Edit Profil
                        </button>
                    </div>
                </div>
                
                <!-- Skills Section -->
                <div class="mt-6 bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="font-bold font-heading text-gray-900">Keahlian</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $user->skills ?? 'HTML,CSS,JavaScript') as $skill)
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Content - Portfolio -->
            <div class="col-span-1 lg:col-span-2">
                <!-- Portfolio Section -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold font-heading text-gray-900">Portfolio Saya</h3>
                        <button 
                            type="button"
                            class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            data-modal-trigger="upload-portfolio-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Project
                        </button>
                    </div>
                    
                    <div class="p-6">
                        @if(count($projects) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($projects as $project)
                            <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-200" data-project-id="{{ $project->id }}">
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80' }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                                </div>
                                <div class="p-4">
                                    <h4 class="font-bold text-gray-900">{{ $project->title }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($project->description, 100) }}</p>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        @if(is_array($project->technologies))
                                            @foreach($project->technologies as $tech)
                                            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">{{ $tech }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mt-4 flex justify-end space-x-2">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="text-sm text-blue-600 hover:text-blue-800">Edit</a>
                                        <a href="#" class="text-sm text-red-600 hover:text-red-800" onclick="confirmDeleteProject('{{ $project->id }}')">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada project</h3>
                            <p class="mt-1 text-gray-500">Klik tombol "Tambah Project" untuk mulai menambahkan portfolio Anda</p>
                            <button 
                                type="button"
                                class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                data-modal-trigger="upload-portfolio-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Project Pertama
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Activity Section -->
                <div class="mt-6 bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="font-bold font-heading text-gray-900">Aktivitas Terbaru</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <!-- Activity Item 1 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-900">Anda menambahkan project baru <a href="#" class="font-medium text-blue-600 hover:text-blue-500">E-Learning RPL</a></p>
                                <p class="text-sm text-gray-500 mt-1">2 hari yang lalu</p>
                            </div>
                        </div>
                        
                        <!-- Activity Item 2 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-900">Anda mengupdate informasi profil</p>
                                <p class="text-sm text-gray-500 mt-1">1 minggu yang lalu</p>
                            </div>
                        </div>
                        
                        <!-- Activity Item 3 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-900">Anda memposting di forum <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Tips belajar Laravel untuk pemula</a></p>
                                <p class="text-sm text-gray-500 mt-1">2 minggu yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Handle photo upload in edit profile
    document.addEventListener('DOMContentLoaded', function() {
        // Profile photo button click handler
        const photoButton = document.querySelector('#edit-profile-modal button');
        const photoInput = document.getElementById('profile-photo');
        const photoPreview = document.getElementById('profile-photo-preview');
        
        if (photoButton && photoInput) {
            photoButton.addEventListener('click', function() {
                photoInput.click();
            });
        }
        
        if (photoInput && photoPreview) {
            photoInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
        
        // Handle file upload preview for project image
        const fileUpload = document.getElementById('file-upload');
        const imagePreview = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview-image');
        const removeImage = document.getElementById('remove-image');
        
        if (fileUpload && imagePreview && previewImage) {
            fileUpload.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
            
            if (removeImage) {
                removeImage.addEventListener('click', function() {
                    fileUpload.value = '';
                    imagePreview.classList.add('hidden');
                });
            }
        }
        
        // Handle drag and drop for file upload
        const dropArea = document.querySelector('.border-dashed');
        if (dropArea && fileUpload) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropArea.classList.add('border-blue-500');
                dropArea.classList.add('bg-blue-50');
            }
            
            function unhighlight() {
                dropArea.classList.remove('border-blue-500');
                dropArea.classList.remove('bg-blue-50');
            }
            
            dropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files && files[0]) {
                    fileUpload.files = files;
                    const event = new Event('change', { bubbles: true });
                    fileUpload.dispatchEvent(event);
                }
            }
        }
        
        // Convert all edit links to buttons with click handlers
        document.querySelectorAll('.mt-4.flex.justify-end.space-x-2 a').forEach(link => {
            const isEdit = link.textContent.trim() === 'Edit';
            const isDelete = link.textContent.trim() === 'Hapus';
            
            // Create a new button element
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = link.textContent;
            button.className = link.className;
            
            // Add appropriate event handlers
            if (isEdit) {
                button.classList.add('project-edit-btn');
                button.setAttribute('data-modal-trigger', 'upload-portfolio-modal');
            }
            
            if (isDelete) {
                button.classList.add('project-delete-btn');
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const projectId = this.closest('.border').getAttribute('data-project-id') || '1';
                    confirmDeleteProject(projectId);
                });
            }
            
            // Replace the link with the button
            link.parentNode.replaceChild(button, link);
        });
        
        // Add data-project-id to project cards for identification
        document.querySelectorAll('.border.border-gray-200.rounded-lg').forEach((card, index) => {
            card.setAttribute('data-project-id', index + 1);
        });
    });
    
    // Confirm delete project
    function confirmDeleteProject(projectId) {
        if (confirm('Apakah Anda yakin ingin menghapus project ini?')) {
            alert('Project berhasil dihapus!');
            // In a real app, you would make an API call to delete the project
            // Here we just reload the page
            setTimeout(() => {
                location.reload();
            }, 500);
        }
    }
    
    // Handle upload portfolio form submission
    function handlePortfolioUpload() {
        // Validate form
        const form = document.getElementById('upload-portfolio-form');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // For demo purposes, simulate successful upload
        alert('Project berhasil diupload!');
        
        // Close the modal
        document.getElementById('upload-portfolio-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        
        // In a real app, you would submit the form and handle the response
        // Here we just reload the page
        setTimeout(() => {
            location.reload();
        }, 500);
    }
    
    // Handle profile update form submission
    function handleProfileUpdate() {
        // Validate form
        const form = document.getElementById('edit-profile-form');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // For demo purposes, simulate successful update
        alert('Profil berhasil diperbarui!');
        
        // Close the modal
        document.getElementById('edit-profile-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        
        // In a real app, you would submit the form and handle the response
        // Here we just reload the page
        setTimeout(() => {
            location.reload();
        }, 500);
    }
</script>
@endpush 