@extends('layouts.app')

@section('title', 'Forum')

@section('content')
    <!-- Forum Header -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-700 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-white">Forum Diskusi Codepacker</h1>
                <button class="bg-white text-blue-600 px-4 py-2 rounded-md font-semibold hover:bg-blue-50 transition-colors duration-200 hidden sm:block" disabled>
                    Buat Thread Baru
                </button>
            </div>
            <p class="text-blue-100 mt-2">Diskusi, berbagi pengetahuan, dan tanya jawab seputar pemrograman</p>
        </div>
    </header>

    <!-- Main Layout -->
    <main class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Left Sidebar - Categories -->
                <div class="w-full md:w-64 flex-shrink-0">
                    <div class="bg-white rounded-lg shadow-sm p-4 sticky top-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Kategori</h3>
                        <nav class="space-y-1">
                            <a href="#" class="flex items-center px-3 py-2 text-blue-600 bg-blue-50 rounded-md font-medium">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                Semua Topik
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md font-medium">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                Pemrograman
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md font-medium">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                                Project
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md font-medium">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                Desain
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md font-medium">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                                Karir
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md font-medium">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd"></path></svg>
                                Teknologi
                            </a>
                        </nav>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900 mb-3">Stats</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Threads</span>
                                    <span class="font-medium">{{ count($forumThreads) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Anggota</span>
                                    <span class="font-medium">127</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Terakhir aktif</span>
                                    <span class="font-medium">{{ date('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition-colors duration-200" disabled>
                                Buat Thread Baru
                            </button>
                            <p class="mt-2 text-xs text-gray-500 text-center">Login fitur akan tersedia di versi selanjutnya</p>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content - Forum Threads -->
                <div class="flex-1">
                    <!-- Filter & Sort Options -->
                    <div class="bg-white rounded-lg shadow-sm mb-4 p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-600 text-sm font-medium">Sort by:</span>
                            <select class="text-sm bg-gray-50 border border-gray-200 rounded px-2 py-1 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option>Newest</option>
                                <option>Most Popular</option>
                                <option>Most Replies</option>
                            </select>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="Search threads..." class="text-sm px-3 py-1 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 w-full md:w-auto">
                        </div>
                    </div>
                    
                    <!-- Thread List -->
                    <div class="space-y-4">
                        @foreach($forumThreads as $thread)
                        <!-- Individual Thread Card -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200">
                            <div class="p-4">
                                <!-- Thread Header -->
                                <div class="flex items-center mb-3">
                                    <img class="h-10 w-10 rounded-full mr-3" src="{{ $thread['author']['avatar'] }}" alt="{{ $thread['author']['name'] }}">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $thread['author']['name'] }}</h4>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <span>{{ $thread['date'] }}</span>
                                            <span class="mx-1">•</span>
                                            <span>{{ $thread['views'] }} views</span>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-blue-100 text-blue-800">
                                            Pemrograman
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Thread Content -->
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors duration-200">{{ $thread['title'] }}</h3>
                                    <p class="text-gray-700 mb-3">{{ $thread['excerpt'] }}</p>
                                </div>
                                
                                <!-- Thread Footer -->
                                <div class="flex items-center justify-between border-t border-gray-100 pt-3 text-sm">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                            <span>{{ $thread['replies'] }} Replies</span>
                                        </div>
                                        <div class="flex items-center text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                            <span>{{ rand(1, 30) }} Likes</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="text-blue-600 font-medium hover:text-blue-700">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
            
                    <!-- Pagination - Twitter Style -->
                    <div class="flex justify-center py-4 border-t border-gray-200">
                        <button class="text-blue-500 font-semibold hover:text-blue-600 transition-colors">
                            Show more tweets
                        </button>
                    </div>
                </div>
                
                <!-- Right Sidebar - Trending/Discover -->
                <aside class="hidden md:block md:col-span-3 pt-5 px-3">
                    <!-- Search Box -->
                    <div class="mb-6">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                        </div>
                    </div>
                    
                    <!-- Trending Section -->
                    <div class="bg-gray-50 rounded-xl mb-6">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <h2 class="text-xl font-bold">Trending</h2>
                        </div>
                        <div>
                            <!-- Trending Item -->
                            <a href="#" class="block px-4 py-3 hover:bg-gray-100 transition-colors">
                                <div class="flex justify-between">
                                    <span class="text-xs text-gray-500">Programming · Trending</span>
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                    </svg>
                                </div>
                                <p class="font-bold text-gray-900 mt-1">#Laravel</p>
                                <p class="text-xs text-gray-500 mt-1">2,453 posts</p>
                            </a>
                            
                            <!-- Trending Item -->
                            <a href="#" class="block px-4 py-3 hover:bg-gray-100 transition-colors">
                                <div class="flex justify-between">
                                    <span class="text-xs text-gray-500">Technology · Trending</span>
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                    </svg>
                                </div>
                                <p class="font-bold text-gray-900 mt-1">#TailwindCSS</p>
                                <p class="text-xs text-gray-500 mt-1">1,287 posts</p>
                            </a>
                            
                            <!-- Trending Item -->
                            <a href="#" class="block px-4 py-3 hover:bg-gray-100 transition-colors">
                                <div class="flex justify-between">
                                    <span class="text-xs text-gray-500">Career · Trending</span>
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                    </svg>
                                </div>
                                <p class="font-bold text-gray-900 mt-1">#WebDeveloper</p>
                                <p class="text-xs text-gray-500 mt-1">987 posts</p>
                            </a>
                            
                            <!-- Show More Link -->
                            <a href="#" class="block px-4 py-3 text-blue-500 hover:bg-gray-100 transition-colors">
                                Show more
                            </a>
                        </div>
                    </div>
                    
                    <!-- Who to Follow Section -->
                    <div class="bg-gray-50 rounded-xl">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <h2 class="text-xl font-bold">Who to follow</h2>
                        </div>
                        <div>
                            <!-- User to Follow -->
                            <div class="px-4 py-3 flex items-center justify-between hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    <img class="h-12 w-12 rounded-full" src="https://i.pravatar.cc/150?img=11" alt="User Profile">
                                    <div class="ml-3">
                                        <p class="font-bold text-gray-900">RPL Dev Team</p>
                                        <p class="text-sm text-gray-500">@rpldevteam</p>
                                    </div>
                                </div>
                                <button class="px-4 py-1.5 bg-black text-white font-bold rounded-full text-sm hover:bg-gray-800 transition-colors">
                                    Follow
                                </button>
                            </div>
                            
                            <!-- User to Follow -->
                            <div class="px-4 py-3 flex items-center justify-between hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    <img class="h-12 w-12 rounded-full" src="https://i.pravatar.cc/150?img=22" alt="User Profile">
                                    <div class="ml-3">
                                        <p class="font-bold text-gray-900">SMKN 4 Malang</p>
                                        <p class="text-sm text-gray-500">@smkn4malang</p>
                                    </div>
                                </div>
                                <button class="px-4 py-1.5 bg-black text-white font-bold rounded-full text-sm hover:bg-gray-800 transition-colors">
                                    Follow
                                </button>
                            </div>
                            
                            <!-- Show More Link -->
                            <a href="#" class="block px-4 py-3 text-blue-500 hover:bg-gray-100 transition-colors">
                                Show more
                            </a>
                        </div>
                    </div>
                    
                    <!-- Footer Links -->
                    <div class="mt-4 px-4 text-xs text-gray-500">
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="hover:underline">Terms of Service</a>
                            <a href="#" class="hover:underline">Privacy Policy</a>
                            <a href="#" class="hover:underline">Cookie Policy</a>
                            <a href="#" class="hover:underline">Accessibility</a>
                        </div>
                        <p class="mt-2">© 2025 Codepacker. All rights reserved.</p>
                    </div>
                </aside>
            </div>
        </div>
    </main>
@endsection
