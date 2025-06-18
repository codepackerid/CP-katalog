<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Fungsi untuk menyalin gambar dari URL ke storage dan memperbarui project
function updateProjectImageFromUrl($projectId, $imageUrl, $projectTitle) {
    // Mendapatkan project
    $project = \App\Models\Project::find($projectId);
    if (!$project) {
        echo "Project dengan ID $projectId tidak ditemukan.\n";
        return false;
    }
    
    // Download gambar
    $imageContent = file_get_contents($imageUrl);
    if ($imageContent === false) {
        echo "Gagal mengunduh gambar dari $imageUrl.\n";
        return false;
    }
    
    // Menentukan path file
    $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
    if (empty($extension)) {
        $extension = 'jpg'; // Default extension jika tidak dapat dideteksi
    }
    
    $fileName = time() . '_' . $projectId . '.' . $extension;
    $path = 'projects/' . $fileName;
    
    // Simpan file ke storage
    if (\Storage::disk('public')->put($path, $imageContent)) {
        // Hapus gambar lama jika ada
        if ($project->image) {
            \Storage::disk('public')->delete($project->image);
        }
        
        // Update project dengan path gambar baru
        $project->image = $path;
        $project->save();
        
        echo "Berhasil memperbarui gambar untuk project '$project->title' (ID: $projectId).\n";
        return true;
    } else {
        echo "Gagal menyimpan gambar untuk project '$project->title' (ID: $projectId).\n";
        return false;
    }
}

// Update gambar untuk beberapa project
$projectImages = [
    1 => 'https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?w=800&h=600&fit=crop',  // E-Learning
    2 => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?w=800&h=600&fit=crop',     // Marketplace
    3 => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&h=600&fit=crop',  // Travel
    4 => 'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?w=800&h=600&fit=crop',  // Portfolio
    5 => 'https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=800&h=600&fit=crop',  // AI Image
    6 => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop',  // Inventory
    7 => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800&h=600&fit=crop',  // Game
    8 => 'https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?w=800&h=600&fit=crop',  // Weather
];

foreach ($projectImages as $projectId => $imageUrl) {
    updateProjectImageFromUrl($projectId, $imageUrl, "Project $projectId");
}

echo "Proses selesai!\n"; 