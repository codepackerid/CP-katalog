<?php
/**
 * Script untuk debug dan perbaikan tampilan screenshots di project
 */

// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Import model dan facades
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

echo "=== DEBUG SCREENSHOTS PROJECT ===\n\n";

// Fungsi untuk memeriksa project
function checkProject($projectId) {
    try {
        $project = Project::findOrFail($projectId);
        
        echo "Project ditemukan: {$project->title} (ID: {$project->id})\n";
        echo "------------------------------\n";
        
        // Cek kolom screenshots di database
        $rawProject = DB::table('projects')->where('id', $projectId)->first();
        
        echo "Raw screenshots dari database: " . ($rawProject->screenshots ?? 'NULL') . "\n\n";
        
        // Cek hasil cast oleh model
        $modelScreenshots = $project->screenshots;
        echo "Screenshots setelah di-cast oleh model: \n";
        if (is_array($modelScreenshots)) {
            echo "Tipe data: Array dengan " . count($modelScreenshots) . " item\n";
            foreach ($modelScreenshots as $index => $screenshot) {
                echo "  " . ($index + 1) . ". $screenshot\n";
                
                // Cek apakah file/URL valid
                if (filter_var($screenshot, FILTER_VALIDATE_URL)) {
                    echo "     - Valid URL\n";
                    
                    // Coba akses URL
                    $headers = @get_headers($screenshot);
                    if ($headers && strpos($headers[0], '200') !== false) {
                        echo "     - URL dapat diakses (200 OK)\n";
                    } else {
                        echo "     - URL tidak dapat diakses: " . ($headers[0] ?? 'Unknown error') . "\n";
                    }
                } else if (Storage::disk('public')->exists(str_replace('storage/', '', $screenshot))) {
                    echo "     - File lokal ditemukan\n";
                    echo "     - Path lengkap: " . Storage::disk('public')->path(str_replace('storage/', '', $screenshot)) . "\n";
                } else {
                    echo "     - PERINGATAN: Bukan URL valid dan file tidak ditemukan\n";
                    
                    // Cek apakah perlu ditambahkan storage/
                    if (Storage::disk('public')->exists($screenshot)) {
                        echo "     - File ditemukan di storage/app/public/{$screenshot}\n";
                        echo "     - Seharusnya diakses dengan: " . asset('storage/' . $screenshot) . "\n";
                    }
                }
            }
        } else if (is_string($modelScreenshots)) {
            echo "Tipe data: String\n";
            echo "Nilai: $modelScreenshots\n";
            
            // Coba parse JSON
            $parsed = json_decode($modelScreenshots, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                echo "String dapat di-parse sebagai JSON\n";
                echo "Hasil parse: " . print_r($parsed, true) . "\n";
            } else {
                echo "String bukan JSON valid: " . json_last_error_msg() . "\n";
            }
        } else if (is_null($modelScreenshots)) {
            echo "Tipe data: NULL\n";
        } else {
            echo "Tipe data tidak dikenal: " . gettype($modelScreenshots) . "\n";
            echo "Nilai: " . print_r($modelScreenshots, true) . "\n";
        }
        
        echo "\n";
        
        // Cek implementasi view
        echo "Simulasi render di view:\n";
        echo "------------------------------\n";
        
        if (!empty($project->screenshots) && count($project->screenshots) > 0) {
            foreach ($project->screenshots as $index => $screenshot) {
                echo "Rendering screenshot " . ($index + 1) . ": $screenshot\n";
                
                // Cek apakah perlu menambahkan storage/
                if (!filter_var($screenshot, FILTER_VALIDATE_URL) && !str_starts_with($screenshot, 'storage/') && !str_starts_with($screenshot, '/storage/')) {
                    echo "  - URL yang akan dirender: " . asset('storage/' . $screenshot) . "\n";
                } else {
                    echo "  - URL yang akan dirender: $screenshot\n";
                }
            }
        } else {
            echo "Tidak ada screenshots untuk dirender\n";
        }
        
        return $project;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return null;
    }
}

// Fungsi untuk memperbaiki screenshots
function fixScreenshots($projectId) {
    try {
        $project = Project::findOrFail($projectId);
        $screenshots = $project->screenshots;
        
        echo "Mencoba memperbaiki screenshots untuk project: {$project->title}\n";
        echo "------------------------------\n";
        
        // Jika screenshots adalah string, coba parse
        if (is_string($screenshots)) {
            $parsed = json_decode($screenshots, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                echo "Memperbaiki screenshots dari string JSON menjadi array\n";
                $project->screenshots = $parsed;
                $project->save();
                echo "Berhasil menyimpan screenshots sebagai array\n";
            } else {
                echo "Gagal parse JSON: " . json_last_error_msg() . "\n";
            }
        } 
        // Jika screenshots adalah array
        else if (is_array($screenshots)) {
            $fixed = [];
            $changed = false;
            
            foreach ($screenshots as $index => $screenshot) {
                // Jika screenshot adalah URL lengkap, biarkan
                if (filter_var($screenshot, FILTER_VALIDATE_URL)) {
                    $fixed[] = $screenshot;
                } 
                // Jika screenshot adalah path lokal tanpa storage/
                else if (!str_starts_with($screenshot, 'storage/') && !str_starts_with($screenshot, '/storage/')) {
                    echo "Memperbaiki path screenshot " . ($index + 1) . ": $screenshot\n";
                    
                    // Cek apakah file ada
                    if (Storage::disk('public')->exists($screenshot)) {
                        $fixed[] = $screenshot; // Simpan path relatif, view akan menambahkan storage/
                        echo "  - File ditemukan, menyimpan path relatif: $screenshot\n";
                    } else {
                        echo "  - File tidak ditemukan, mencoba cari di lokasi lain\n";
                        
                        // Coba cari di storage/app/public/projects
                        if (Storage::disk('public')->exists('projects/' . basename($screenshot))) {
                            $newPath = 'projects/' . basename($screenshot);
                            $fixed[] = $newPath;
                            $changed = true;
                            echo "  - File ditemukan di lokasi alternatif: $newPath\n";
                        } else {
                            // Tetap simpan path asli
                            $fixed[] = $screenshot;
                            echo "  - File tidak ditemukan, menyimpan path asli\n";
                        }
                    }
                } else {
                    // Path sudah memiliki storage/, hapus prefixnya
                    $cleanPath = str_replace(['storage/', '/storage/'], '', $screenshot);
                    $fixed[] = $cleanPath;
                    $changed = true;
                    echo "Menghapus prefix 'storage/' dari screenshot " . ($index + 1) . "\n";
                }
            }
            
            if ($changed) {
                $project->screenshots = $fixed;
                $project->save();
                echo "Berhasil menyimpan screenshots yang diperbaiki\n";
            } else {
                echo "Tidak ada perubahan yang diperlukan pada screenshots\n";
            }
        } else {
            echo "Screenshots kosong atau format tidak valid\n";
        }
        
        return $project;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return null;
    }
}

// Fungsi untuk menambahkan contoh screenshots
function addSampleScreenshots($projectId) {
    try {
        $project = Project::findOrFail($projectId);
        
        echo "Menambahkan contoh screenshots ke project: {$project->title}\n";
        echo "------------------------------\n";
        
        // Contoh screenshots dari Unsplash
        $sampleScreenshots = [
            'https://images.unsplash.com/photo-1517292987719-0369a794ec0f?q=80&w=1000',
            'https://images.unsplash.com/photo-1573867639040-6dd25fa5f597?q=80&w=1000',
            'https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=1000',
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1000'
        ];
        
        $project->screenshots = $sampleScreenshots;
        $project->save();
        
        echo "Berhasil menambahkan " . count($sampleScreenshots) . " contoh screenshots\n";
        
        return $project;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return null;
    }
}

// Fungsi untuk menambahkan screenshots dari folder lokal
function addLocalScreenshots($projectId) {
    try {
        $project = Project::findOrFail($projectId);
        
        echo "Menambahkan screenshots lokal ke project: {$project->title}\n";
        echo "------------------------------\n";
        
        // Daftar file di folder projects
        $files = Storage::disk('public')->files('projects');
        $imageFiles = array_filter($files, function($file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
        });
        
        // Pilih 4 file gambar secara acak
        shuffle($imageFiles);
        $selectedImages = array_slice($imageFiles, 0, 4);
        
        if (empty($selectedImages)) {
            echo "Tidak ada file gambar yang ditemukan di folder projects\n";
            return null;
        }
        
        echo "File gambar yang ditemukan:\n";
        foreach ($selectedImages as $index => $image) {
            echo "  " . ($index + 1) . ". $image\n";
        }
        
        // Simpan path gambar ke database
        $project->screenshots = $selectedImages;
        $project->save();
        
        echo "Berhasil menambahkan " . count($selectedImages) . " screenshots lokal\n";
        
        return $project;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return null;
    }
}

// Fungsi untuk memeriksa dan memperbaiki tampilan
function checkAndFixView() {
    echo "Memeriksa kode view untuk tampilan screenshots...\n";
    
    $projectDetailPath = base_path('resources/views/pages/project-detail.blade.php');
    
    if (!file_exists($projectDetailPath)) {
        echo "File view project-detail.blade.php tidak ditemukan!\n";
        return;
    }
    
    $content = file_get_contents($projectDetailPath);
    
    // Cek apakah ada masalah dengan kode view
    if (strpos($content, '<img src="{{ $screenshot }}') !== false) {
        echo "MASALAH DITEMUKAN: Path gambar tidak menggunakan asset('storage/')\n";
        
        // Perbaiki kode view
        $fixedContent = str_replace(
            '<img src="{{ $screenshot }}"',
            '<img src="{{ filter_var($screenshot, FILTER_VALIDATE_URL) ? $screenshot : asset(\'storage/\' . $screenshot) }}"',
            $content
        );
        
        // Simpan perubahan
        file_put_contents($projectDetailPath . '.fixed', $fixedContent);
        
        echo "Kode view diperbaiki dan disimpan di: " . $projectDetailPath . ".fixed\n";
        echo "Untuk menerapkan perubahan, jalankan perintah:\n";
        echo "mv " . $projectDetailPath . ".fixed " . $projectDetailPath . "\n";
    } else if (strpos($content, "asset('storage/' . \$screenshot)") !== false || 
               strpos($content, 'asset("storage/" . $screenshot)') !== false) {
        echo "Kode view sudah benar, menggunakan asset('storage/')\n";
    } else {
        echo "Tidak dapat menentukan masalah pada kode view. Periksa manual file:\n";
        echo $projectDetailPath . "\n";
    }
}

// Menu utama
function showMenu() {
    echo "\n=== MENU ===\n";
    echo "1. Periksa screenshots project\n";
    echo "2. Perbaiki screenshots project\n";
    echo "3. Tambahkan contoh screenshots (URL)\n";
    echo "4. Tambahkan screenshots dari folder lokal\n";
    echo "5. Periksa dan perbaiki kode view\n";
    echo "6. Keluar\n";
    echo "Pilih menu (1-6): ";
    
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
    
    echo "\nPilih project (1-" . count($projects) . ") atau masukkan ID project: ";
    
    $handle = fopen("php://stdin", "r");
    $line = trim(fgets($handle));
    fclose($handle);
    
    // Cek apakah input adalah ID langsung
    if (is_numeric($line) && $line > count($projects)) {
        try {
            $project = Project::findOrFail($line);
            return $project->id;
        } catch (\Exception $e) {
            echo "Project dengan ID $line tidak ditemukan.\n";
            return null;
        }
    }
    
    $choice = (int)$line;
    
    if ($choice < 1 || $choice > count($projects)) {
        echo "Pilihan tidak valid.\n";
        return null;
    }
    
    return $projects[$choice - 1]->id;
}

// Fungsi utama
function main() {
    while (true) {
        $choice = showMenu();
        
        if ($choice == '6') {
            echo "\nTerima kasih telah menggunakan script ini!\n";
            exit(0);
        }
        
        if ($choice == '5') {
            checkAndFixView();
        } else {
            $projectId = selectProject();
            
            if (!$projectId) {
                continue;
            }
            
            switch ($choice) {
                case '1':
                    checkProject($projectId);
                    break;
                case '2':
                    fixScreenshots($projectId);
                    break;
                case '3':
                    addSampleScreenshots($projectId);
                    break;
                case '4':
                    addLocalScreenshots($projectId);
                    break;
                default:
                    echo "\nPilihan tidak valid. Silakan coba lagi.\n";
            }
        }
        
        echo "\nTekan Enter untuk melanjutkan...";
        $handle = fopen("php://stdin", "r");
        fgets($handle);
        fclose($handle);
    }
}

// Jalankan program
main();
