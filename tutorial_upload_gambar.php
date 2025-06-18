<?php
/**
 * Tutorial Upload Gambar ke Data Dummy Project
 * 
 * File ini berisi tutorial dan contoh kode untuk menambahkan gambar ke project dummy
 * menggunakan beberapa metode: PHP langsung, PHPMyAdmin, dan Visual Studio Code.
 */

// Ini hanya file tutorial, tidak perlu dijalankan
// Gunakan kode di bawah ini sebagai referensi

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Upload Gambar ke Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3 {
            color: #333;
        }
        .method {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }
        code {
            background: #f5f5f5;
            padding: 2px 5px;
            border-radius: 3px;
        }
        pre {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .note {
            background-color: #fffde7;
            padding: 10px;
            border-left: 4px solid #ffd600;
            margin: 15px 0;
        }
        img {
            max-width: 100%;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Tutorial Upload Gambar ke Data Dummy Project</h1>
    
    <p>Berikut adalah beberapa cara untuk menambahkan gambar ke project dummy di aplikasi CodePacker:</p>
    
    <div class="method">
        <h2>Metode 1: Menggunakan PHP Langsung</h2>
        
        <p>Anda dapat menggunakan kode PHP untuk menambahkan gambar ke project dummy. Berikut langkah-langkahnya:</p>
        
        <h3>1. Buat file PHP baru</h3>
        <p>Buat file PHP baru di root project Anda, misalnya <code>update_project_images.php</code></p>
        
        <h3>2. Tambahkan kode berikut</h3>
        <pre>
&lt;?php

// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Fungsi untuk memperbarui gambar project
function updateProjectImage($projectId, $imageUrl) {
    try {
        // Cari project berdasarkan ID
        $project = \App\Models\Project::find($projectId);
        if (!$project) {
            echo "Project dengan ID $projectId tidak ditemukan.\n";
            return false;
        }
        
        // Download gambar dari URL
        $imageContent = file_get_contents($imageUrl);
        if ($imageContent === false) {
            echo "Gagal mengunduh gambar dari $imageUrl.\n";
            return false;
        }
        
        // Tentukan nama file dan ekstensi
        $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
        if (empty($extension)) {
            $extension = 'jpg'; // Default extension jika tidak terdeteksi
        }
        
        $fileName = time() . '_' . $projectId . '.' . $extension;
        $path = 'projects/' . $fileName;
        
        // Simpan gambar ke storage
        if (\Storage::disk('public')->put($path, $imageContent)) {
            // Hapus gambar lama jika ada
            if ($project->image) {
                \Storage::disk('public')->delete($project->image);
            }
            
            // Update project dengan path gambar baru
            $project->image = $path;
            $project->save();
            
            echo "Berhasil memperbarui gambar untuk project '{$project->title}' (ID: $projectId).\n";
            return true;
        } else {
            echo "Gagal menyimpan gambar untuk project '{$project->title}' (ID: $projectId).\n";
            return false;
        }
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return false;
    }
}

// Daftar project dan URL gambar
$projectImages = [
    1 => 'https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?w=800&h=600&fit=crop',  // Ganti dengan URL gambar Anda
    2 => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?w=800&h=600&fit=crop',
    3 => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&h=600&fit=crop',
    // Tambahkan project lainnya...
];

// Perbarui gambar untuk setiap project
foreach ($projectImages as $projectId => $imageUrl) {
    updateProjectImage($projectId, $imageUrl);
}

echo "Proses selesai!\n";
        </pre>
        
        <h3>3. Jalankan file PHP</h3>
        <p>Jalankan file PHP dari terminal:</p>
        <pre>php update_project_images.php</pre>
        
        <div class="note">
            <p><strong>Catatan:</strong> Pastikan folder <code>storage/app/public/projects</code> sudah ada dan memiliki permission yang tepat.</p>
        </div>
    </div>
    
    <div class="method">
        <h2>Metode 2: Menggunakan PHPMyAdmin</h2>
        
        <p>Anda juga dapat menambahkan atau mengubah gambar project langsung melalui PHPMyAdmin:</p>
        
        <h3>1. Akses PHPMyAdmin</h3>
        <p>Buka PHPMyAdmin melalui browser (biasanya di <code>http://localhost/phpmyadmin</code>)</p>
        
        <h3>2. Pilih database dan tabel</h3>
        <p>Pilih database aplikasi Anda, lalu pilih tabel <code>projects</code></p>
        
        <h3>3. Edit record project</h3>
        <p>Klik tombol "Edit" pada project yang ingin diubah gambarnya</p>
        
        <h3>4. Update kolom image</h3>
        <p>Pada kolom <code>image</code>, masukkan path relatif ke gambar, misalnya:</p>
        <pre>projects/nama_gambar.jpg</pre>
        
        <div class="note">
            <p><strong>Catatan:</strong> Saat menggunakan PHPMyAdmin, Anda perlu memastikan bahwa file gambar sudah ada di folder <code>storage/app/public/projects</code>.</p>
        </div>
    </div>
    
    <div class="method">
        <h2>Metode 3: Menggunakan Script untuk Screenshots</h2>
        
        <p>Untuk menambahkan beberapa screenshot ke project, gunakan file <code>update_screenshots.php</code> yang telah dibuat sebelumnya:</p>
        
        <h3>1. Akses file melalui browser</h3>
        <p>Buka URL <code>http://localhost:8000/update_screenshots.php?project_id=1</code> (ganti angka 1 dengan ID project yang ingin diubah)</p>
        
        <h3>2. Tambahkan URL screenshot</h3>
        <p>Gunakan form yang tersedia untuk menambahkan URL screenshot baru atau mengubah yang sudah ada</p>
        
        <div class="note">
            <p><strong>Catatan:</strong> Screenshot disimpan dalam format JSON di database. Pastikan URL yang dimasukkan valid dan dapat diakses.</p>
        </div>
    </div>
    
    <div class="method">
        <h2>Metode 4: Menggunakan Tinker</h2>
        
        <p>Laravel Tinker adalah cara interaktif untuk memanipulasi data:</p>
        
        <h3>1. Jalankan Tinker</h3>
        <pre>php artisan tinker</pre>
        
        <h3>2. Update gambar project</h3>
        <pre>
$project = App\Models\Project::find(1); // Ganti 1 dengan ID project
$project->image = 'projects/nama_gambar.jpg'; // Path relatif ke gambar
$project->save();
        </pre>
        
        <h3>3. Update screenshots</h3>
        <pre>
$project = App\Models\Project::find(1); // Ganti 1 dengan ID project
$project->screenshots = ['https://example.com/screenshot1.jpg', 'https://example.com/screenshot2.jpg'];
$project->save();
        </pre>
    </div>
    
    <h2>Struktur Penyimpanan Gambar</h2>
    
    <p>Berikut adalah struktur direktori untuk penyimpanan gambar:</p>
    
    <pre>
storage/
  app/
    public/
      projects/  <-- Gambar utama project disimpan di sini
    </pre>
    
    <div class="note">
        <p><strong>Penting:</strong> Jangan lupa untuk menjalankan perintah <code>php artisan storage:link</code> untuk membuat symbolic link dari <code>public/storage</code> ke <code>storage/app/public</code>.</p>
    </div>
    
    <h2>Contoh URL Gambar</h2>
    
    <p>Berikut adalah beberapa URL gambar yang dapat Anda gunakan untuk testing:</p>
    
    <ul>
        <li><code>https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?w=800&h=600&fit=crop</code></li>
        <li><code>https://images.unsplash.com/photo-1556740738-b6a63e27c4df?w=800&h=600&fit=crop</code></li>
        <li><code>https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&h=600&fit=crop</code></li>
        <li><code>https://images.unsplash.com/photo-1522542550221-31fd19575a2d?w=800&h=600&fit=crop</code></li>
        <li><code>https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=800&h=600&fit=crop</code></li>
    </ul>
</body>
</html>
