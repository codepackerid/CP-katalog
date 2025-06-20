<?php
/**
 * Script untuk memperbarui screenshots pada project
 * 
 * Cara penggunaan:
 * 1. Sesuaikan array $projectScreenshots dengan ID project dan URL screenshot
 * 2. Jalankan script dengan: php update_project_screenshots.php
 */

// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Import model Project
use App\Models\Project;

/**
 * Fungsi untuk memperbarui screenshots project
 */
function updateProjectScreenshots($projectId, $screenshotUrls) {
    try {
        // Cari project berdasarkan ID
        $project = Project::find($projectId);
        if (!$project) {
            echo "Project dengan ID $projectId tidak ditemukan.\n";
            return false;
        }
        
        // Update screenshots
        $project->screenshots = $screenshotUrls;
        $project->save();
        
        echo "Berhasil memperbarui screenshots untuk project '{$project->title}' (ID: $projectId).\n";
        return true;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return false;
    }
}

/**
 * Fungsi untuk menampilkan screenshots project
 */
function showProjectScreenshots($projectId) {
    try {
        // Cari project berdasarkan ID
        $project = Project::find($projectId);
        if (!$project) {
            echo "Project dengan ID $projectId tidak ditemukan.\n";
            return false;
        }
        
        echo "Screenshots untuk project '{$project->title}' (ID: $projectId):\n";
        
        if (empty($project->screenshots)) {
            echo "  Tidak ada screenshots.\n";
            return true;
        }
        
        foreach ($project->screenshots as $index => $url) {
            echo "  [$index] $url\n";
        }
        
        return true;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return false;
    }
}

// Daftar project dan URL screenshots
// Sesuaikan dengan kebutuhan Anda
$projectScreenshots = [
    // Project ID 1
    1 => [
        'https://drive.google.com/file/d/1Ek3_QCZiUWvTeCNvjrigMFSwioQmMwQo/view?usp=drive_link',
        'https://drive.google.com/file/d/1EYM-_YGQ0zyOwBCQAoTlr_Tvf1kGW-uH/view?usp=drive_link',
        'https://drive.google.com/file/d/1UC8PefweIEn0dzMWseYR7FpiiZLP6Pkm/view?usp=drive_link',
        'https://drive.google.com/file/d/1Hqfu0RvWQRq-9RIzIgq0pSxtyFGeV0fW/view?usp=drive_link'
    ],
    
    // Project ID 2
    2 => [
        'https://images.unsplash.com/photo-1517292987719-0369a794ec0f?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop'
    ],
    
    // Project ID 3
    3 => [
        'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1500835556837-99ac94a94552?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?w=800&h=600&fit=crop'
    ],
    
    // Tambahkan project lainnya sesuai kebutuhan
];

// Perbarui screenshots untuk setiap project
echo "=== MEMPERBARUI SCREENSHOTS PROJECT ===\n\n";

foreach ($projectScreenshots as $projectId => $screenshots) {
    updateProjectScreenshots($projectId, $screenshots);
    showProjectScreenshots($projectId);
    echo "\n";
}

echo "Proses selesai!\n";
