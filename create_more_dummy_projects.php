<?php
// Script untuk menambahkan 7 proyek dummy baru

// Fungsi untuk menambahkan gambar placeholder ke proyek
function updateProjectImage($projectId, $imageName) {
    try {
        $project = \App\Models\Project::find($projectId);
        if (!$project) {
            echo "Proyek $projectId tidak ditemukan.\n";
            return;
        }

        // Buat gambar placeholder SVG
        $colors = [
            '4F46E5', '10B981', 'F59E0B', 'EC4899', 
            '8B5CF6', '06B6D4', 'EF4444', '3B82F6',
            'DC2626', '059669', '7C3AED', 'D97706',
            'DB2777', '0284C7', '9333EA'
        ];
        $colorIndex = ($projectId - 1) % count($colors);
        
        $svgContent = '<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg">';
        $svgContent .= '<rect width="800" height="600" fill="#' . $colors[$colorIndex] . '"/>';
        $svgContent .= '<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white">' . $project->title . '</text>';
        $svgContent .= '</svg>';

        // Simpan file SVG
        $path = 'projects/' . $imageName;
        \Storage::disk('public')->put($path, $svgContent);

        // Update project dengan path gambar baru
        $project->image = $path;
        $project->save();

        echo "Berhasil memperbarui gambar untuk proyek '$project->title'.\n";
    } catch (\Exception $e) {
        echo "Gagal memperbarui gambar untuk proyek $projectId: " . $e->getMessage() . "\n";
    }
}

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Tambah 7 proyek dummy baru
try {
    // Data untuk 7 proyek baru
    $newProjects = [
        [
            'title' => 'Smart Home Controller',
            'description' => 'Sistem kontrol rumah pintar yang memungkinkan pengguna mengatur perangkat elektronik, pencahayaan, dan keamanan melalui aplikasi mobile atau perintah suara.',
            'image_name' => 'smart-home.jpg',
            'repository_url' => 'https://github.com/demo/smart-home-controller',
            'demo_url' => 'https://smart-home-demo.example.com',
            'technologies' => ['IoT', 'Node.js', 'React Native', 'MQTT', 'Firebase'],
            'status' => 'published',
            'user_id' => 3
        ],
        [
            'title' => 'Augmented Reality Museum Guide',
            'description' => 'Aplikasi pemandu museum berbasis AR yang memberikan informasi interaktif tentang karya seni dan artefak sejarah ketika pengguna mengarahkan kamera ke objek tersebut.',
            'image_name' => 'ar-museum.jpg',
            'repository_url' => 'https://github.com/demo/ar-museum-guide',
            'demo_url' => 'https://ar-museum-demo.example.com',
            'technologies' => ['Unity', 'ARCore', 'ARKit', 'C#', 'Blender'],
            'status' => 'published',
            'user_id' => 1
        ],
        [
            'title' => 'Blockchain Voting System',
            'description' => 'Platform pemungutan suara berbasis blockchain yang aman, transparan, dan tidak dapat dimanipulasi untuk pemilihan umum atau pengambilan keputusan organisasi.',
            'image_name' => 'blockchain-voting.jpg',
            'repository_url' => 'https://github.com/demo/blockchain-voting',
            'demo_url' => 'https://blockchain-voting-demo.example.com',
            'technologies' => ['Solidity', 'Ethereum', 'Web3.js', 'React', 'Node.js'],
            'status' => 'published',
            'user_id' => 2
        ],
        [
            'title' => 'Health Monitoring Dashboard',
            'description' => 'Dashboard untuk monitoring kesehatan yang mengintegrasikan data dari wearable devices dan memberikan analisis tren kesehatan jangka panjang serta rekomendasi kesehatan.',
            'image_name' => 'health-dashboard.jpg',
            'repository_url' => 'https://github.com/demo/health-monitoring',
            'demo_url' => 'https://health-monitoring-demo.example.com',
            'technologies' => ['Python', 'Django', 'Chart.js', 'PostgreSQL', 'Bootstrap'],
            'status' => 'published',
            'user_id' => 3
        ],
        [
            'title' => 'AI Music Composer',
            'description' => 'Aplikasi komposer musik berbasis AI yang dapat menghasilkan komposisi musik berdasarkan genre, mood, atau bahkan meniru gaya komponis terkenal.',
            'image_name' => 'ai-music.jpg',
            'repository_url' => 'https://github.com/demo/ai-music-composer',
            'demo_url' => 'https://ai-music-demo.example.com',
            'technologies' => ['Python', 'TensorFlow', 'LSTM', 'Web Audio API', 'React'],
            'status' => 'published',
            'user_id' => 1
        ],
        [
            'title' => 'Social Learning Platform',
            'description' => 'Platform pembelajaran sosial yang menggabungkan kursus online dengan komunitas belajar, forum diskusi, dan fitur kolaborasi untuk meningkatkan pengalaman belajar.',
            'image_name' => 'social-learning.jpg',
            'repository_url' => 'https://github.com/demo/social-learning',
            'demo_url' => 'https://social-learning-demo.example.com',
            'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'WebSockets', 'AWS'],
            'status' => 'published',
            'user_id' => 2
        ],
        [
            'title' => 'Drone Delivery Management',
            'description' => 'Sistem manajemen pengiriman berbasis drone dengan rute otomatis, tracking real-time, dan antarmuka untuk pelanggan dan operator pengiriman.',
            'image_name' => 'drone-delivery.jpg',
            'repository_url' => 'https://github.com/demo/drone-delivery',
            'demo_url' => 'https://drone-delivery-demo.example.com',
            'technologies' => ['Go', 'React', 'MongoDB', 'Mapbox API', 'RabbitMQ'],
            'status' => 'published',
            'user_id' => 3
        ]
    ];

    // Buat proyek baru
    foreach ($newProjects as $index => $projectData) {
        $project = new \App\Models\Project();
        $project->title = $projectData['title'];
        $project->description = $projectData['description'];
        $project->repository_url = $projectData['repository_url'];
        $project->demo_url = $projectData['demo_url'];
        $project->technologies = $projectData['technologies'];
        $project->status = $projectData['status'];
        $project->user_id = $projectData['user_id'];
        $project->save();
        
        echo "Proyek baru: '{$project->title}' berhasil dibuat dengan ID: {$project->id}\n";
        
        // Update gambar proyek
        updateProjectImage($project->id, $projectData['image_name']);
    }

    echo "Berhasil menambahkan 7 proyek dummy baru!\n";

} catch (\Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage() . "\n";
} 