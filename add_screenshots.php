<?php
// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Import model Project
use App\Models\Project;

// Fungsi untuk menambahkan screenshot contoh
function addSampleScreenshots($projectId) {
    try {
        $project = Project::findOrFail($projectId);
        
        echo "Menambahkan screenshot contoh ke project: {$project->title} (ID: {$project->id})\n";
        
        // Screenshot contoh dari Unsplash
        $sampleScreenshots = [
            'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=800&h=600&fit=crop',
            'https://images.unsplash.com/photo-1605379399642-870262d3d051?w=800&h=600&fit=crop'
        ];
        
        // Update project
        $project->screenshots = $sampleScreenshots;
        $project->save();
        
        echo "Berhasil menambahkan " . count($sampleScreenshots) . " screenshot contoh\n";
        
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Main script
echo "=== MENAMBAHKAN SCREENSHOTS KE PROJECT ===\n\n";

// Periksa apakah ID project diberikan sebagai argumen
$projectId = $argv[1] ?? null;

if (!$projectId) {
    echo "Masukkan ID project: ";
    $projectId = trim(fgets(STDIN));
}

// Tambahkan screenshot contoh
addSampleScreenshots($projectId);

echo "\n=== SELESAI ===\n";
