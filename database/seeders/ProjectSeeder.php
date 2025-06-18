<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure the storage directory for projects exists
        Storage::makeDirectory('public/projects');
        
        // Get existing users to associate projects with
        $users = User::all();
        
        // Technologies arrays for different project types
        $webTechnologies = ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'TailwindCSS', 'Alpine.js'];
        $mobileTechnologies = ['Flutter', 'Dart', 'Firebase', 'Google Maps API'];
        $aiTechnologies = ['Python', 'TensorFlow', 'PyTorch', 'Scikit-learn', 'Pandas'];
        $gameTechnologies = ['Unity', 'C#', 'Blender', 'Photoshop'];
        
        // Create dummy projects
        $projects = [
            [
                'title' => 'E-Learning Platform',
                'description' => 'Platform e-learning untuk mendukung pembelajaran jarak jauh dengan fitur kelas virtual, quiz interaktif, dan dashboard analitik kemajuan siswa.',
                'image_name' => 'elearning-platform.jpg',
                'repository_url' => 'https://github.com/demo/elearning-platform',
                'demo_url' => 'https://elearning-demo.example.com',
                'technologies' => array_slice($webTechnologies, 0, 4),
                'status' => 'published',
            ],
            [
                'title' => 'Marketplace App',
                'description' => 'Aplikasi marketplace yang menghubungkan penjual dan pembeli dengan sistem pembayaran terintegrasi, fitur chat, dan sistem review.',
                'image_name' => 'marketplace-app.jpg',
                'repository_url' => 'https://github.com/demo/marketplace-app',
                'demo_url' => 'https://marketplace-demo.example.com',
                'technologies' => array_merge(array_slice($webTechnologies, 0, 3), ['Vue.js', 'Redis']),
                'status' => 'published',
            ],
            [
                'title' => 'Travel App',
                'description' => 'Aplikasi mobile untuk perencanaan perjalanan dengan fitur booking hotel, tiket pesawat, dan rekomendasi destinasi wisata.',
                'image_name' => 'travel-app.jpg',
                'repository_url' => 'https://github.com/demo/travel-app',
                'demo_url' => 'https://travel-demo.example.com',
                'technologies' => $mobileTechnologies,
                'status' => 'published',
            ],
            [
                'title' => 'Portfolio Website',
                'description' => 'Website portfolio responsif dengan animasi menarik, dark mode, dan contact form terintegrasi.',
                'image_name' => 'portfolio-website.jpg',
                'repository_url' => 'https://github.com/demo/portfolio-website',
                'demo_url' => 'https://portfolio-demo.example.com',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'GSAP', 'Three.js'],
                'status' => 'published',
            ],
            [
                'title' => 'AI Image Generator',
                'description' => 'Web app yang menggunakan AI untuk menghasilkan gambar berdasarkan input teks pengguna dengan berbagai gaya artistik.',
                'image_name' => 'ai-image-generator.jpg',
                'repository_url' => 'https://github.com/demo/ai-image-generator',
                'demo_url' => 'https://ai-image-demo.example.com',
                'technologies' => $aiTechnologies,
                'status' => 'published',
            ],
            [
                'title' => 'Inventory Management System',
                'description' => 'Sistem manajemen inventaris untuk bisnis kecil dan menengah dengan fitur tracking barang, laporan analitik, dan notifikasi stok menipis.',
                'image_name' => 'inventory-system.jpg',
                'repository_url' => 'https://github.com/demo/inventory-system',
                'demo_url' => 'https://inventory-demo.example.com',
                'technologies' => array_merge(array_slice($webTechnologies, 0, 3), ['React', 'Node.js']),
                'status' => 'published',
            ],
            [
                'title' => '2D Platformer Game',
                'description' => 'Game platformer 2D dengan karakter yang dapat diubah, musuh dengan AI, dan level yang menantang.',
                'image_name' => 'platformer-game.jpg',
                'repository_url' => 'https://github.com/demo/platformer-game',
                'demo_url' => 'https://game-demo.example.com',
                'technologies' => $gameTechnologies,
                'status' => 'published',
            ],
            [
                'title' => 'Weather App',
                'description' => 'Aplikasi cuaca yang menampilkan prakiraan cuaca, kualitas udara, dan peringatan cuaca ekstrem untuk lokasi pengguna.',
                'image_name' => 'weather-app.jpg',
                'repository_url' => 'https://github.com/demo/weather-app',
                'demo_url' => 'https://weather-demo.example.com',
                'technologies' => array_merge(['React Native'], array_slice($mobileTechnologies, 1, 3)),
                'status' => 'published',
            ],
        ];
        
        // Create placeholder files and projects
        foreach ($projects as $projectData) {
            // Create a simple placeholder text file
            $content = "Placeholder for {$projectData['title']}";
            Storage::put('public/projects/' . $projectData['image_name'], $content);
            
            // Set the image path
            $imagePath = 'projects/' . $projectData['image_name'];
            
            // Assign to a random user
            $user = $users->random();
            
            // Create the project
            Project::create([
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'image' => $imagePath,
                'repository_url' => $projectData['repository_url'],
                'demo_url' => $projectData['demo_url'],
                'technologies' => $projectData['technologies'],
                'status' => $projectData['status'],
                'user_id' => $user->id,
            ]);
        }
        
        // Create storage symlink if needed
        if (!file_exists(public_path('storage'))) {
            try {
                symlink(storage_path('app/public'), public_path('storage'));
                echo "Created symlink to storage\n";
            } catch (\Exception $e) {
                echo "Could not create symlink: " . $e->getMessage() . "\n";
                echo "Run 'php artisan storage:link' manually\n";
            }
        }
    }
} 