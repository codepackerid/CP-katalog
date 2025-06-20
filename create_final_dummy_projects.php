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
            'title' => 'Realtime Translation App',
            'description' => 'Aplikasi penerjemah real-time yang dapat menerjemahkan percakapan lisan dan teks dalam berbagai bahasa dengan dukungan untuk mode offline.',
            'image_name' => 'translation-app.jpg',
            'repository_url' => 'https://github.com/demo/realtime-translation',
            'demo_url' => 'https://translation-demo.example.com',
            'technologies' => ['Flutter', 'NLP', 'TensorFlow Lite', 'Firebase ML Kit', 'WebRTC'],
            'status' => 'published',
            'user_id' => 1
        ],
        [
            'title' => 'Virtual Event Platform',
            'description' => 'Platform acara virtual dengan fitur livestreaming, ruang diskusi, networking, dan pameran virtual untuk menyelenggarakan konferensi dan pameran online.',
            'image_name' => 'virtual-event.jpg',
            'repository_url' => 'https://github.com/demo/virtual-event-platform',
            'demo_url' => 'https://virtual-event-demo.example.com',
            'technologies' => ['Node.js', 'WebRTC', 'Socket.io', 'React', 'MongoDB'],
            'status' => 'published',
            'user_id' => 2
        ],
        [
            'title' => 'Predictive Maintenance System',
            'description' => 'Sistem pemeliharaan prediktif untuk mesin industri yang menggunakan IoT dan machine learning untuk memprediksi kegagalan mesin sebelum terjadi.',
            'image_name' => 'predictive-maintenance.jpg',
            'repository_url' => 'https://github.com/demo/predictive-maintenance',
            'demo_url' => 'https://predictive-maintenance-demo.example.com',
            'technologies' => ['Python', 'TensorFlow', 'MQTT', 'InfluxDB', 'Grafana'],
            'status' => 'published',
            'user_id' => 3
        ],
        [
            'title' => 'Sustainable Shopping Assistant',
            'description' => 'Aplikasi asisten belanja yang membantu konsumen membuat pilihan berkelanjutan dengan memberikan informasi tentang dampak lingkungan dan sosial dari produk.',
            'image_name' => 'sustainable-shopping.jpg',
            'repository_url' => 'https://github.com/demo/sustainable-shopping',
            'demo_url' => 'https://sustainable-shopping-demo.example.com',
            'technologies' => ['React Native', 'GraphQL', 'PostgreSQL', 'AWS Lambda', 'Barcode Scanner API'],
            'status' => 'published',
            'user_id' => 1
        ],
        [
            'title' => 'EdTech Assessment Platform',
            'description' => 'Platform penilaian pendidikan yang menggunakan AI untuk memberikan umpan balik instan pada esai dan jawaban siswa dengan analisis komprehensif kemajuan belajar.',
            'image_name' => 'edtech-assessment.jpg',
            'repository_url' => 'https://github.com/demo/edtech-assessment',
            'demo_url' => 'https://edtech-assessment-demo.example.com',
            'technologies' => ['Django', 'React', 'NLP', 'PostgreSQL', 'Redis'],
            'status' => 'published',
            'user_id' => 2
        ],
        [
            'title' => 'Food Waste Reduction App',
            'description' => 'Aplikasi yang menghubungkan restoran dan toko makanan dengan pelanggan untuk menjual makanan berlebih dengan harga diskon, membantu mengurangi pemborosan makanan.',
            'image_name' => 'food-waste.jpg',
            'repository_url' => 'https://github.com/demo/food-waste-reduction',
            'demo_url' => 'https://food-waste-demo.example.com',
            'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Google Maps API', 'Stripe API'],
            'status' => 'published',
            'user_id' => 3
        ],
        [
            'title' => 'Collaborative Design Tool',
            'description' => 'Alat desain kolaboratif berbasis cloud yang memungkinkan tim desain bekerja sama secara real-time pada proyek UI/UX dengan fitur versioning dan prototyping.',
            'image_name' => 'design-tool.jpg',
            'repository_url' => 'https://github.com/demo/collaborative-design',
            'demo_url' => 'https://design-tool-demo.example.com',
            'technologies' => ['WebGL', 'Canvas API', 'TypeScript', 'Node.js', 'MongoDB'],
            'status' => 'published',
            'user_id' => 1
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

    // Hitung total proyek
    $totalProjects = \App\Models\Project::count();
    echo "Berhasil menambahkan 7 proyek dummy terakhir!\n";
    echo "Total proyek saat ini: $totalProjects\n";

} catch (\Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage() . "\n";
} 
