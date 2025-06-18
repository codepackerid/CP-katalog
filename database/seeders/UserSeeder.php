<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Demo user account that appears on login page
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@codepacker.net',
            'password' => Hash::make('password123'),
            'bio' => 'Akun demo untuk keperluan testing aplikasi',
            'location' => 'Malang, Indonesia',
            'website' => 'https://codepacker.net',
            'github' => 'codepacker',
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'bio' => 'Administrator website CodePacker.',
            'location' => 'Jakarta, Indonesia',
            'website' => 'https://codepacker.net',
            'github' => 'codepacker',
            'twitter' => 'codepacker',
        ]);

        // Create some test users
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'bio' => 'Full Stack Developer dengan pengalaman 5 tahun di Laravel dan Vue.js',
            'location' => 'Bandung, Indonesia',
            'github' => 'budisantoso',
        ]);

        User::create([
            'name' => 'Dewi Putri',
            'email' => 'dewi@example.com',
            'password' => Hash::make('password'),
            'bio' => 'UI/UX Designer dan Frontend Developer',
            'location' => 'Surabaya, Indonesia',
            'website' => 'https://dewiputri.com',
        ]);
    }
} 