<?php
/**
 * Tutorial Upload Gambar Lokal ke Project Menggunakan PHPMyAdmin
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Upload Gambar Lokal via PHPMyAdmin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            color: #333;
        }
        h1, h2, h3, h4 {
            color: #2c3e50;
            margin-top: 1.5em;
        }
        .step {
            background: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 0 5px 5px 0;
        }
        .note {
            background-color: #fffde7;
            padding: 10px 15px;
            border-left: 4px solid #ffd600;
            margin: 15px 0;
        }
        .warning {
            background-color: #fff5f5;
            padding: 10px 15px;
            border-left: 4px solid #e53e3e;
            margin: 15px 0;
        }
        pre, code {
            background: #f5f5f5;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: Consolas, Monaco, 'Andale Mono', monospace;
        }
        pre {
            padding: 15px;
            overflow-x: auto;
        }
        img {
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            margin: 15px 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .image-container {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 15px 0;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .caption {
            text-align: center;
            margin-top: 8px;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Tutorial Upload Gambar Lokal ke Project Menggunakan PHPMyAdmin</h1>
    
    <p>Tutorial ini akan menjelaskan cara mengupload gambar lokal untuk project menggunakan PHPMyAdmin dan menyimpan referensinya di database.</p>
    
    <div class="note">
        <p><strong>Catatan Penting:</strong> PHPMyAdmin tidak menyediakan cara langsung untuk mengupload gambar ke folder storage Laravel. Kita perlu mengupload gambar secara manual ke folder storage terlebih dahulu, kemudian menyimpan path-nya di database melalui PHPMyAdmin.</p>
    </div>
    
    <h2>Langkah 1: Persiapan Struktur Folder Storage</h2>
    
    <div class="step">
        <p>Pertama, pastikan struktur folder storage sudah siap:</p>
        
        <ol>
            <li>Buka folder project Laravel Anda</li>
            <li>Navigasi ke folder <code>storage/app/public/</code></li>
            <li>Buat folder <code>projects</code> jika belum ada</li>
            <li>Pastikan symbolic link sudah dibuat dengan menjalankan:
                <pre>php artisan storage:link</pre>
            </li>
        </ol>
        
        <p>Struktur folder yang benar:</p>
        <pre>
storage/
  app/
    public/
      projects/  <-- Gambar project akan disimpan di sini
</pre>
    </div>
    
    <h2>Langkah 2: Upload Gambar ke Folder Storage</h2>
    
    <div class="step">
        <p>Ada beberapa cara untuk mengupload gambar ke folder storage:</p>
        
        <h3>Cara 1: Upload Manual melalui File Explorer</h3>
        <ol>
            <li>Buka File Explorer</li>
            <li>Navigasi ke folder project Anda: <code>C:\xampp\htdocs\codepacker-net\storage\app\public\projects\</code></li>
            <li>Salin gambar yang ingin diupload ke folder tersebut</li>
            <li>Catat nama file gambar, misalnya: <code>screenshot1.jpg</code></li>
        </ol>
        
        <h3>Cara 2: Upload melalui FTP (jika di server)</h3>
        <ol>
            <li>Hubungkan ke server menggunakan klien FTP (seperti FileZilla)</li>
            <li>Navigasi ke folder <code>storage/app/public/projects/</code></li>
            <li>Upload gambar dari komputer lokal ke server</li>
            <li>Catat nama file gambar</li>
        </ol>
        
        <div class="note">
            <p>Pastikan nama file gambar tidak mengandung spasi atau karakter khusus. Gunakan huruf, angka, tanda hubung, dan garis bawah saja.</p>
        </div>
    </div>
    
    <h2>Langkah 3: Akses PHPMyAdmin</h2>
    
    <div class="step">
        <ol>
            <li>Buka browser dan akses PHPMyAdmin: <code>http://localhost/phpmyadmin</code></li>
            <li>Login jika diminta</li>
            <li>Pilih database aplikasi Laravel Anda (misalnya <code>codepacker_net</code>)</li>
            <li>Pilih tabel <code>projects</code></li>
        </ol>
    </div>
    
    <h2>Langkah 4: Update Data Project dengan Path Gambar</h2>
    
    <div class="step">
        <h3>Untuk Gambar Utama Project (Kolom 'image')</h3>
        <ol>
            <li>Di PHPMyAdmin, cari project yang ingin diupdate</li>
            <li>Klik tombol "Edit" (ikon pensil)</li>
            <li>Cari kolom <code>image</code></li>
            <li>Masukkan path relatif ke gambar yang sudah diupload:
                <pre>projects/screenshot1.jpg</pre>
            </li>
            <li>Klik tombol "Go" untuk menyimpan perubahan</li>
        </ol>
        
        <div class="image-container">
            <div class="caption">Contoh mengisi kolom image di PHPMyAdmin</div>
            <pre>
+-------+---------------------------+
| image | projects/screenshot1.jpg  |
+-------+---------------------------+
</pre>
        </div>
        
        <h3>Untuk Multiple Screenshots (Kolom 'screenshots')</h3>
        <ol>
            <li>Di form edit yang sama, cari kolom <code>screenshots</code></li>
            <li>Masukkan array JSON yang berisi path relatif ke gambar-gambar yang sudah diupload:
                <pre>["projects/screenshot1.jpg", "projects/screenshot2.jpg", "projects/screenshot3.jpg"]</pre>
            </li>
            <li>Klik tombol "Go" untuk menyimpan perubahan</li>
        </ol>
        
        <div class="image-container">
            <div class="caption">Contoh mengisi kolom screenshots di PHPMyAdmin</div>
            <pre>
+-------------+---------------------------------------------------------------------------------+
| screenshots | ["projects/screenshot1.jpg", "projects/screenshot2.jpg", "projects/screenshot3.jpg"] |
+-------------+---------------------------------------------------------------------------------+
</pre>
        </div>
        
        <div class="warning">
            <p><strong>Penting:</strong> Format JSON harus valid. Gunakan tanda kutip ganda untuk string dan kurung siku untuk array.</p>
        </div>
    </div>
    
    <h2>Langkah 5: Verifikasi Hasil</h2>
    
    <div class="step">
        <ol>
            <li>Buka aplikasi Laravel Anda di browser: <code>http://127.0.0.1:8000</code></li>
            <li>Navigasi ke halaman detail project</li>
            <li>Verifikasi bahwa gambar muncul dengan benar</li>
        </ol>
        
        <p>Jika gambar tidak muncul, periksa:</p>
        <ul>
            <li>Path gambar di database sudah benar</li>
            <li>File gambar sudah ada di folder yang benar</li>
            <li>Symbolic link storage sudah dibuat</li>
            <li>Permission folder dan file sudah benar</li>
        </ul>
    </div>
    
    <h2>Contoh Lengkap</h2>
    
    <div class="step">
        <p>Berikut contoh lengkap untuk mengupload dan menyimpan 3 screenshot lokal:</p>
        
        <h3>1. Persiapkan Gambar</h3>
        <ul>
            <li>Siapkan 3 file gambar: <code>screenshot1.jpg</code>, <code>screenshot2.jpg</code>, dan <code>screenshot3.jpg</code></li>
        </ul>
        
        <h3>2. Upload Gambar ke Folder Storage</h3>
        <ul>
            <li>Salin ketiga file gambar ke <code>C:\xampp\htdocs\codepacker-net\storage\app\public\projects\</code></li>
        </ul>
        
        <h3>3. Update Database melalui PHPMyAdmin</h3>
        <ul>
            <li>Buka PHPMyAdmin dan pilih database</li>
            <li>Edit project yang diinginkan</li>
            <li>Pada kolom <code>screenshots</code>, masukkan:
                <pre>["projects/screenshot1.jpg", "projects/screenshot2.jpg", "projects/screenshot3.jpg"]</pre>
            </li>
            <li>Klik "Go" untuk menyimpan</li>
        </ul>
        
        <h3>4. Akses Aplikasi</h3>
        <ul>
            <li>Buka <code>http://127.0.0.1:8000/projects/ID</code> (ganti ID dengan ID project Anda)</li>
            <li>Verifikasi bahwa ketiga screenshot muncul dengan benar</li>
        </ul>
    </div>
    
    <h2>Troubleshooting</h2>
    
    <div class="step">
        <h3>Masalah 1: Gambar Tidak Muncul</h3>
        <p><strong>Solusi:</strong></p>
        <ol>
            <li>Periksa path gambar di database:
                <pre>
SELECT screenshots FROM projects WHERE id = 1;
                </pre>
            </li>
            <li>Pastikan symbolic link storage sudah dibuat:
                <pre>php artisan storage:link</pre>
            </li>
            <li>Periksa permission folder storage:
                <pre>chmod -R 755 storage</pre>
            </li>
            <li>Clear cache Laravel:
                <pre>
php artisan cache:clear
php artisan view:clear
                </pre>
            </li>
        </ol>
        
        <h3>Masalah 2: Format JSON Error</h3>
        <p><strong>Solusi:</strong></p>
        <ol>
            <li>Validasi format JSON menggunakan alat online seperti <a href="https://jsonlint.com/" target="_blank">JSONLint</a></li>
            <li>Pastikan menggunakan tanda kutip ganda untuk string</li>
            <li>Pastikan tidak ada trailing comma di akhir array</li>
        </ol>
    </div>
    
    <h2>Skrip PHP untuk Membantu Upload</h2>
    
    <div class="step">
        <p>Berikut adalah skrip PHP sederhana yang dapat membantu mengupload gambar ke folder storage dan mengupdate database:</p>
        
        <pre>
&lt;?php
// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Import model dan facades
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

// Fungsi untuk mengupload gambar dan mengupdate project
function uploadLocalImage($projectId, $sourceImagePath) {
    try {
        // Cari project
        $project = Project::findOrFail($projectId);
        
        // Periksa apakah file sumber ada
        if (!file_exists($sourceImagePath)) {
            echo "File tidak ditemukan: $sourceImagePath\n";
            return false;
        }
        
        // Buat nama file baru
        $filename = time() . '_' . basename($sourceImagePath);
        $destinationPath = 'projects/' . $filename;
        
        // Salin file ke storage
        Storage::disk('public')->put($destinationPath, file_get_contents($sourceImagePath));
        
        // Update project
        $project->image = $destinationPath;
        $project->save();
        
        echo "Berhasil mengupload gambar ke project '{$project->title}'\n";
        echo "Path gambar: $destinationPath\n";
        return true;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return false;
    }
}

// Fungsi untuk mengupload multiple screenshots
function uploadLocalScreenshots($projectId, $sourceImagePaths) {
    try {
        // Cari project
        $project = Project::findOrFail($projectId);
        
        $screenshots = [];
        
        // Upload setiap gambar
        foreach ($sourceImagePaths as $sourcePath) {
            if (!file_exists($sourcePath)) {
                echo "File tidak ditemukan: $sourcePath\n";
                continue;
            }
            
            // Buat nama file baru
            $filename = time() . '_' . count($screenshots) . '_' . basename($sourcePath);
            $destinationPath = 'projects/' . $filename;
            
            // Salin file ke storage
            Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));
            
            // Tambahkan ke array screenshots
            $screenshots[] = $destinationPath;
        }
        
        // Update project
        $project->screenshots = $screenshots;
        $project->save();
        
        echo "Berhasil mengupload " . count($screenshots) . " screenshots ke project '{$project->title}'\n";
        return true;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return false;
    }
}

// Contoh penggunaan
$projectId = 1; // Ganti dengan ID project Anda
$mainImage = 'C:/path/to/your/image.jpg'; // Ganti dengan path ke gambar utama

$screenshotPaths = [
    'C:/path/to/screenshot1.jpg',
    'C:/path/to/screenshot2.jpg',
    'C:/path/to/screenshot3.jpg'
];

// Upload gambar utama
uploadLocalImage($projectId, $mainImage);

// Upload screenshots
uploadLocalScreenshots($projectId, $screenshotPaths);
</pre>

        <p>Simpan kode di atas sebagai <code>upload_local_images.php</code> dan jalankan dengan perintah:</p>
        <pre>php upload_local_images.php</pre>
        
        <div class="note">
            <p>Sebelum menjalankan skrip, pastikan untuk mengganti path gambar dengan path yang benar di komputer Anda.</p>
        </div>
    </div>
    
    <div class="note">
        <p><strong>Kesimpulan:</strong> PHPMyAdmin tidak dapat mengupload gambar langsung ke folder storage Laravel, tetapi Anda dapat mengupload gambar secara manual ke folder storage terlebih dahulu, kemudian menyimpan path-nya di database melalui PHPMyAdmin.</p>
    </div>
</body>
</html>
