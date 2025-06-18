<?php
// Script untuk memperbarui proyek

// Fungsi untuk menambahkan gambar placeholder ke proyek
function updateProjectImage($projectId, $imageName) {
    try {
        $project = \App\Models\Project::find($projectId);
        if (!$project) {
            echo "Proyek $projectId tidak ditemukan.\n";
            return;
        }

        // Buat gambar placeholder SVG jika file tidak ada
        $svgContent = '<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg">';
        $svgContent .= '<rect width="800" height="600" fill="#' . substr(md5($projectId), 0, 6) . '"/>';
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

// Update proyek
try {
    // Proyek 1
    $p1 = \App\Models\Project::find(1);
    if ($p1) {
        $p1->title = 'E-Learning Platform Pro';
        $p1->description = 'Platform e-learning yang telah ditingkatkan dengan fitur kelas virtual yang lebih interaktif, quiz online dengan analisis hasil yang detail, dan dashboard kemajuan siswa yang komprehensif.';
        $p1->technologies = ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'Vue.js', 'Redis'];
        $p1->save();
        echo "Proyek 1 berhasil diperbarui!\n";
    }

    // Proyek 2
    $p2 = \App\Models\Project::find(2);
    if ($p2) {
        $p2->title = 'Marketplace App Premium';
        $p2->description = 'Versi premium dari aplikasi marketplace dengan sistem pembayaran yang lebih aman, fitur chat real-time, sistem review terverifikasi, dan antarmuka pengguna yang lebih intuitif.';
        $p2->technologies = ['Laravel', 'PHP', 'MySQL', 'Vue.js', 'Redis', 'WebSockets'];
        $p2->save();
        echo "Proyek 2 berhasil diperbarui!\n";
    }

    // Proyek 3
    $p3 = \App\Models\Project::find(3);
    if ($p3) {
        $p3->title = 'Travel Explorer App';
        $p3->description = 'Aplikasi travel premium dengan fitur navigasi offline, rekomendasi wisata berbasis AI, integrasi dengan hotel dan maskapai penerbangan, serta fitur AR untuk panduan wisata.';
        $p3->technologies = ['Flutter', 'Dart', 'Firebase', 'Google Maps API', 'AI/ML'];
        $p3->save();
        echo "Proyek 3 berhasil diperbarui!\n";
    }

    // Menambahkan gambar ke proyek
    updateProjectImage(1, 'elearning.jpg');
    updateProjectImage(2, 'marketplace.jpg');
    updateProjectImage(3, 'travel.jpg');
    updateProjectImage(4, 'portfolio.jpg');
    updateProjectImage(5, 'ai-generator.jpg');
    updateProjectImage(6, 'inventory.jpg');
    updateProjectImage(7, 'game.jpg');
    updateProjectImage(8, 'weather.jpg');

    echo "Semua proyek berhasil diperbarui!\n";

} catch (\Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage() . "\n";
} 