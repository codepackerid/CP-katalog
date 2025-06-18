<?php
/**
 * Script untuk mengupload gambar lokal ke project dan menyimpannya di database
 */

// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Import model dan facades
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

// Fungsi untuk menampilkan menu
function showMenu() {
    echo "\n=== UPLOAD GAMBAR LOKAL KE PROJECT ===\n";
    echo "1. Upload gambar utama project\n";
    echo "2. Upload screenshots project\n";
    echo "3. Lihat daftar project\n";
    echo "4. Keluar\n";
    echo "Pilih menu (1-4): ";
    
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    fclose($handle);
    
    return trim($line);
}

// Fungsi untuk memilih project
function selectProject() {
    // Ambil daftar project
    $projects = Project::select('id', 'title')->orderBy('id')->get();
    
    if ($projects->isEmpty()) {
        echo "Tidak ada project yang tersedia.\n";
        return null;
    }
    
    echo "\n=== DAFTAR PROJECT ===\n";
    foreach ($projects as $index => $project) {
        echo ($index + 1) . ". [{$project->id}] {$project->title}\n";
    }
    
    echo "\nPilih project (1-" . count($projects) . "): ";
    
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    fclose($handle);
    
    $choice = (int)trim($line);
    
    if ($choice < 1 || $choice > count($projects)) {
        echo "Pilihan tidak valid.\n";
        return null;
    }
    
    return $projects[$choice - 1];
}

// Fungsi untuk mengupload gambar utama project
function uploadMainImage() {
    $project = selectProject();
    
    if (!$project) {
        return;
    }
    
    echo "\nMasukkan path lengkap file gambar (contoh: C:/folder/gambar.jpg): ";
    
    $handle = fopen("php://stdin", "r");
    $imagePath = trim(fgets($handle));
    fclose($handle);
    
    if (!file_exists($imagePath)) {
        echo "Error: File tidak ditemukan: $imagePath\n";
        return;
    }
    
    try {
        // Buat nama file baru
        $filename = time() . '_' . basename($imagePath);
        $destinationPath = 'projects/' . $filename;
        
        // Salin file ke storage
        Storage::disk('public')->put($destinationPath, file_get_contents($imagePath));
        
        // Update project
        $project->image = $destinationPath;
        $project->save();
        
        echo "\nBerhasil mengupload gambar utama ke project '{$project->title}'!\n";
        echo "Path gambar: $destinationPath\n";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Fungsi untuk mengupload screenshots project
function uploadScreenshots() {
    $project = selectProject();
    
    if (!$project) {
        return;
    }
    
    $screenshots = [];
    $existingScreenshots = $project->screenshots ?? [];
    
    if (is_string($existingScreenshots)) {
        $existingScreenshots = json_decode($existingScreenshots, true) ?? [];
    }
    
    echo "\nScreenshots yang sudah ada: " . count($existingScreenshots) . "\n";
    
    echo "\nPilih opsi:\n";
    echo "1. Tambahkan screenshots baru (mempertahankan yang lama)\n";
    echo "2. Ganti semua screenshots\n";
    echo "Pilihan (1-2): ";
    
    $handle = fopen("php://stdin", "r");
    $option = (int)trim(fgets($handle));
    
    if ($option === 1) {
        $screenshots = $existingScreenshots;
    } else if ($option !== 2) {
        echo "Pilihan tidak valid.\n";
        fclose($handle);
        return;
    }
    
    echo "\nBerapa banyak screenshot yang ingin diupload? ";
    $count = (int)trim(fgets($handle));
    
    if ($count < 1) {
        echo "Jumlah tidak valid.\n";
        fclose($handle);
        return;
    }
    
    for ($i = 0; $i < $count; $i++) {
        echo "\nMasukkan path lengkap file screenshot " . ($i + 1) . " (contoh: C:/folder/screenshot.jpg): ";
        $imagePath = trim(fgets($handle));
        
        if (!file_exists($imagePath)) {
            echo "Error: File tidak ditemukan: $imagePath\n";
            continue;
        }
        
        try {
            // Buat nama file baru
            $filename = time() . '_' . $i . '_' . basename($imagePath);
            $destinationPath = 'projects/' . $filename;
            
            // Salin file ke storage
            Storage::disk('public')->put($destinationPath, file_get_contents($imagePath));
            
            // Tambahkan ke array screenshots
            $screenshots[] = $destinationPath;
            
            echo "Screenshot " . ($i + 1) . " berhasil diupload.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
    
    fclose($handle);
    
    try {
        // Update project
        $project->screenshots = $screenshots;
        $project->save();
        
        echo "\nBerhasil mengupload " . count($screenshots) . " screenshots ke project '{$project->title}'!\n";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Fungsi untuk menampilkan daftar project
function listProjects() {
    $projects = Project::select('id', 'title', 'image', 'screenshots')->orderBy('id')->get();
    
    if ($projects->isEmpty()) {
        echo "\nTidak ada project yang tersedia.\n";
        return;
    }
    
    echo "\n=== DAFTAR PROJECT DAN GAMBAR ===\n";
    
    foreach ($projects as $project) {
        echo "ID: {$project->id}\n";
        echo "Judul: {$project->title}\n";
        echo "Gambar Utama: " . ($project->image ?? 'Tidak ada') . "\n";
        
        $screenshots = $project->screenshots;
        if (is_string($screenshots)) {
            $screenshots = json_decode($screenshots, true) ?? [];
        }
        
        echo "Screenshots: " . count($screenshots) . "\n";
        if (!empty($screenshots)) {
            foreach ($screenshots as $index => $screenshot) {
                echo "  " . ($index + 1) . ". $screenshot\n";
            }
        }
        
        echo "\n";
    }
    
    echo "Tekan Enter untuk kembali ke menu...";
    $handle = fopen("php://stdin", "r");
    fgets($handle);
    fclose($handle);
}

// Fungsi utama
function main() {
    echo "=== UPLOAD GAMBAR LOKAL KE PROJECT ===\n";
    echo "Script ini membantu mengupload gambar lokal ke project.\n\n";
    
    // Periksa apakah symbolic link storage sudah dibuat
    if (!file_exists(public_path('storage'))) {
        echo "Symbolic link storage belum dibuat. Membuat symbolic link...\n";
        try {
            symlink(storage_path('app/public'), public_path('storage'));
            echo "Symbolic link berhasil dibuat.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
            echo "Anda perlu menjalankan 'php artisan storage:link' secara manual.\n";
        }
    }
    
    // Periksa apakah folder projects sudah ada
    if (!Storage::disk('public')->exists('projects')) {
        echo "Folder projects belum ada. Membuat folder...\n";
        Storage::disk('public')->makeDirectory('projects');
        echo "Folder projects berhasil dibuat.\n";
    }
    
    while (true) {
        $choice = showMenu();
        
        switch ($choice) {
            case '1':
                uploadMainImage();
                break;
            case '2':
                uploadScreenshots();
                break;
            case '3':
                listProjects();
                break;
            case '4':
                echo "\nTerima kasih telah menggunakan script ini!\n";
                exit(0);
            default:
                echo "\nPilihan tidak valid. Silakan coba lagi.\n";
        }
    }
}

// Jalankan program
main();
