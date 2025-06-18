@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Aurora Background -->
        <div class="absolute inset-0 z-0">
            <x-ui.aurora-background />
        </div>
        
        <div class="max-w-md w-full space-y-8 bg-white bg-opacity-90 backdrop-blur-sm rounded-xl shadow-xl p-8 z-10">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold font-heading text-gray-900">
                    Daftar Akun Baru
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Atau
                    <a href="{{ url('/login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        masuk jika sudah memiliki akun
                    </a>
                </p>
            </div>
            
            @if ($errors->any())
                <div class="bg-red-50 p-3 rounded-md">
                    <ul class="text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required class="appearance-none rounded-t-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Nama Lengkap">
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email">
                    </div>
                    <div>
                        <label for="angkatan" class="sr-only">Angkatan</label>
                        <select id="angkatan" name="angkatan" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                            <option value="" disabled selected>Pilih Angkatan</option>
                            <option value="2021" {{ old('angkatan') == '2021' ? 'selected' : '' }}>2021</option>
                            <option value="2022" {{ old('angkatan') == '2022' ? 'selected' : '' }}>2022</option>
                            <option value="2023" {{ old('angkatan') == '2023' ? 'selected' : '' }}>2023</option>
                            <option value="2024" {{ old('angkatan') == '2024' ? 'selected' : '' }}>2024</option>
                        </select>
                    </div>
                    <div>
                        <label for="role" class="sr-only">Peran/Keahlian</label>
                        <select id="role" name="role" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                            <option value="" disabled selected>Pilih Peran/Keahlian</option>
                            <option value="Front-end Developer" {{ old('role') == 'Front-end Developer' ? 'selected' : '' }}>Front-end Developer</option>
                            <option value="Back-end Developer" {{ old('role') == 'Back-end Developer' ? 'selected' : '' }}>Back-end Developer</option>
                            <option value="Full-stack Developer" {{ old('role') == 'Full-stack Developer' ? 'selected' : '' }}>Full-stack Developer</option>
                            <option value="UI/UX Designer" {{ old('role') == 'UI/UX Designer' ? 'selected' : '' }}>UI/UX Designer</option>
                            <option value="Mobile Developer" {{ old('role') == 'Mobile Developer' ? 'selected' : '' }}>Mobile Developer</option>
                            <option value="Game Developer" {{ old('role') == 'Game Developer' ? 'selected' : '' }}>Game Developer</option>
                            <option value="QA Engineer" {{ old('role') == 'QA Engineer' ? 'selected' : '' }}>QA Engineer</option>
                            <option value="DevOps Engineer" {{ old('role') == 'DevOps Engineer' ? 'selected' : '' }}>DevOps Engineer</option>
                        </select>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                    <div>
                        <label for="password_confirmation" class="sr-only">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none rounded-b-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Konfirmasi Password">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        Saya menyetujui <a href="#" class="text-blue-600 hover:text-blue-500">syarat dan ketentuan</a>
                    </label>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 