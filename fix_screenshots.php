<?php
/**
 * Script untuk mendiagnosa dan memperbaiki masalah tampilan screenshots
 * 
 * Script ini akan:
 * 1. Memeriksa format data screenshots di database
 * 2. Memastikan URL gambar valid dan dapat diakses
 * 3. Memperbaiki format data jika diperlukan
 */

// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Import model Project
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

// Fungsi untuk memeriksa apakah URL dapat diakses
function isUrlAccessible($url) {
    try {
        // Jika URL adalah path lokal, periksa keberadaan file
        if (strpos($url, 'http') !== 0) {
            // Periksa apakah file ada di storage
            return Storage::disk('public')->exists($url);
        }
        
        // Jika URL eksternal, coba akses dengan HTTP request
        $response = Http::timeout(5)->head($url);
        return $response->successful();
    } catch (\Exception $e) {
        return false;
    }
}

// Fungsi untuk memeriksa dan memperbaiki format screenshots
function checkAndFixScreenshots($projectId) {
    try {
        // Ambil project dari database
        $project = Project::findOrFail($projectId);
        
        echo "Memeriksa project: {$project->title} (ID: {$project->id})\n";
        
        // Periksa apakah kolom screenshots ada dan berformat valid
        if ($project->screenshots === null) {
            echo "- Status: Screenshots NULL\n";
            echo "- Tindakan: Mengatur screenshots ke array kosong\n";
            $project->screenshots = [];
            $project->save();
            echo "- Hasil: Screenshots diatur ke array kosong []\n";
            return;
        }
        
        // Periksa tipe data screenshots
        echo "- Tipe data screenshots: " . gettype($project->screenshots) . "\n";
        
        // Jika screenshots adalah string, coba decode JSON
        if (is_string($project->screenshots)) {
            echo "- Status: Screenshots dalam format string\n";
            echo "- Tindakan: Mengkonversi string JSON ke array\n";
            
            try {
                $screenshots = json_decode($project->screenshots, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception("JSON error: " . json_last_error_msg());
                }
                $project->screenshots = $screenshots;
                $project->save();
                echo "- Hasil: Berhasil mengkonversi string JSON ke array\n";
            } catch (\Exception $e) {
                echo "- Error: " . $e->getMessage() . "\n";
                echo "- Tindakan: Mengatur screenshots ke array kosong\n";
                $project->screenshots = [];
                $project->save();
                echo "- Hasil: Screenshots diatur ke array kosong []\n";
            }
        }
        
        // Periksa apakah screenshots adalah array
        if (!is_array($project->screenshots)) {
            echo "- Status: Screenshots bukan array\n";
            echo "- Tindakan: Mengatur screenshots ke array kosong\n";
            $project->screenshots = [];
            $project->save();
            echo "- Hasil: Screenshots diatur ke array kosong []\n";
            return;
        }
        
        // Periksa setiap URL screenshot
        echo "- Jumlah screenshots: " . count($project->screenshots) . "\n";
        
        $validScreenshots = [];
        $hasChanges = false;
        
        foreach ($project->screenshots as $index => $url) {
            echo "  Screenshot #$index: $url\n";
            
            // Periksa apakah URL valid
            if (empty($url) || !is_string($url)) {
                echo "    - Status: URL tidak valid (kosong atau bukan string)\n";
                $hasChanges = true;
                continue;
            }
            
            // Periksa apakah URL dapat diakses
            $isAccessible = isUrlAccessible($url);
            echo "    - Status: " . ($isAccessible ? "URL dapat diakses" : "URL tidak dapat diakses") . "\n";
            
            if ($isAccessible) {
                $validScreenshots[] = $url;
            } else {
                $hasChanges = true;
            }
        }
        
        // Update project jika ada perubahan
        if ($hasChanges) {
            echo "- Tindakan: Memperbarui screenshots dengan URL yang valid\n";
            $project->screenshots = $validScreenshots;
            $project->save();
            echo "- Hasil: Screenshots diperbarui dengan " . count($validScreenshots) . " URL valid\n";
        } else {
            echo "- Status: Semua screenshots valid\n";
        }
        
        // Periksa apakah screenshot ditampilkan dengan benar di view
        echo "\nDiagnosa tampilan:\n";
        echo "- Pastikan blade template menampilkan screenshots dengan benar\n";
        echo "- Periksa kode di resources/views/pages/project-detail.blade.php\n";
        echo "- Pastikan loop untuk menampilkan screenshots benar\n";
        
        // Tampilkan kode yang benar untuk menampilkan screenshots
        echo "\nContoh kode yang benar untuk menampilkan screenshots:\n";
        echo "@if(!empty(\$project->screenshots) && count(\$project->screenshots) > 0)\n";
        echo "    @foreach(\$project->screenshots as \$screenshot)\n";
        echo "        <div class=\"rounded-lg overflow-hidden border border-gray-200\">\n";
        echo "            <img src=\"{{ \$screenshot }}\" alt=\"Screenshot {{ \$loop->iteration }}\" class=\"w-full h-auto\">\n";
        echo "        </div>\n";
        echo "    @endforeach\n";
        echo "@else\n";
        echo "    <!-- Tampilkan placeholder jika tidak ada screenshots -->\n";
        echo "@endif\n";
        
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Fungsi untuk menampilkan data mentah screenshots dari database
function showRawScreenshotsData($projectId) {
    try {
        // Ambil data langsung dari database
        $rawData = DB::table('projects')->where('id', $projectId)->value('screenshots');
        
        echo "Data mentah screenshots dari database untuk project ID $projectId:\n";
        echo "------------------------------------------------------\n";
        echo $rawData . "\n";
        echo "------------------------------------------------------\n";
        echo "Tipe data: " . gettype($rawData) . "\n";
        echo "Panjang: " . strlen($rawData) . " karakter\n";
        
        // Coba decode JSON
        $decoded = json_decode($rawData, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            echo "JSON valid: Ya\n";
            echo "Jumlah item: " . count($decoded) . "\n";
            echo "Isi array:\n";
            foreach ($decoded as $index => $item) {
                echo "[$index] => $item\n";
            }
        } else {
            echo "JSON valid: Tidak\n";
            echo "JSON error: " . json_last_error_msg() . "\n";
        }
        
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Fungsi untuk memperbaiki format JSON screenshots
function fixJsonFormat($projectId) {
    try {
        // Ambil data mentah
        $rawData = DB::table('projects')->where('id', $projectId)->value('screenshots');
        
        echo "Memperbaiki format JSON untuk project ID $projectId\n";
        
        // Coba perbaiki format JSON
        $fixedData = null;
        
        // Jika data kosong, atur ke array kosong
        if (empty($rawData)) {
            $fixedData = '[]';
        } 
        // Jika data sudah valid JSON, biarkan
        else if (json_decode($rawData) !== null && json_last_error() === JSON_ERROR_NONE) {
            $fixedData = $rawData;
        }
        // Jika data adalah string URL tunggal, konversi ke array
        else if (is_string($rawData) && (strpos($rawData, 'http') === 0 || strpos($rawData, 'projects/') === 0)) {
            $fixedData = json_encode([$rawData]);
        }
        // Jika data adalah string yang mungkin berisi array tapi format salah
        else {
            // Coba bersihkan dan perbaiki format
            $cleaned = preg_replace('/[^a-zA-Z0-9\-\/_.:?&=\[\],\s"]/', '', $rawData);
            $decoded = json_decode($cleaned, true);
            
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $fixedData = json_encode($decoded);
            } else {
                // Jika masih gagal, atur ke array kosong
                $fixedData = '[]';
            }
        }
        
        // Update database dengan data yang diperbaiki
        DB::table('projects')->where('id', $projectId)->update(['screenshots' => $fixedData]);
        
        echo "Format JSON diperbaiki dan disimpan ke database\n";
        
        // Tampilkan hasil
        showRawScreenshotsData($projectId);
        
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

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
echo "=== DIAGNOSA DAN PERBAIKAN SCREENSHOTS PROJECT ===\n\n";

// Periksa apakah ID project diberikan sebagai argumen
$projectId = $argv[1] ?? null;

if (!$projectId) {
    echo "Masukkan ID project yang ingin diperiksa: ";
    $projectId = trim(fgets(STDIN));
}

// Menu pilihan
echo "\nPilih tindakan:\n";
echo "1. Diagnosa dan perbaiki screenshots\n";
echo "2. Tampilkan data mentah screenshots\n";
echo "3. Perbaiki format JSON screenshots\n";
echo "4. Tambahkan screenshot contoh\n";
echo "Pilihan (1-4): ";
$choice = trim(fgets(STDIN));

switch ($choice) {
    case '1':
        checkAndFixScreenshots($projectId);
        break;
    case '2':
        showRawScreenshotsData($projectId);
        break;
    case '3':
        fixJsonFormat($projectId);
        break;
    case '4':
        addSampleScreenshots($projectId);
        break;
    default:
        echo "Pilihan tidak valid\n";
}

echo "\n=== SELESAI ===\n";
