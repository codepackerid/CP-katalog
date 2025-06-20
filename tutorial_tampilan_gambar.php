<?php
/**
 * Tutorial Menampilkan dan Menambahkan Gambar di Halaman Projects via PHPMyAdmin
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Menampilkan dan Menambahkan Gambar di Projects</title>
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
        .code-highlight {
            background-color: #fff3cd;
            padding: 2px;
        }
        .screenshot {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin: 15px 0;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <h1>Tutorial Menampilkan dan Menambahkan Gambar di Halaman Projects</h1>
    
    <p>Tutorial ini akan menjelaskan cara menampilkan dan menambahkan gambar untuk project di halaman projects menggunakan PHPMyAdmin.</p>
    
    <div class="note">
        <p><strong>Catatan:</strong> Berdasarkan tampilan yang Anda tunjukkan, gambar project ditampilkan dalam bentuk kartu project di halaman utama. Berikut adalah cara untuk menambahkan dan menampilkan gambar tersebut.</p>
    </div>
    
    <h2>Struktur Tampilan Project</h2>
    
    <div class="step">
        <p>Pada tampilan halaman projects, setiap project ditampilkan dalam bentuk kartu dengan struktur sebagai berikut:</p>
        <ul>
            <li>Gambar utama project di bagian atas kartu</li>
            <li>Judul project</li>
            <li>Daftar teknologi yang digunakan</li>
            <li>Deskripsi singkat</li>
            <li>Informasi pembuat project</li>
        </ul>
        
        <div class="image-container">
            <div class="caption">Contoh tampilan kartu project</div>
            <img src="https://placehold.co/600x400/e2e8f0/475569?text=Contoh+Kartu+Project" alt="Contoh Kartu Project">
        </div>
    </div>
    
    <h2>Langkah 1: Persiapan Folder Storage</h2>
    
    <div class="step">
        <p>Sebelum menambahkan gambar, pastikan struktur folder storage sudah siap:</p>
        
        <ol>
            <li>Buka folder project Laravel Anda</li>
            <li>Navigasi ke folder <code>storage/app/public/</code></li>
            <li>Buat folder <code>projects</code> jika belum ada</li>
            <li>Pastikan symbolic link sudah dibuat dengan menjalankan:
                <pre>php artisan storage:link</pre>
            </li>
        </ol>
        
        <div class="warning">
            <p><strong>Penting:</strong> Jika symbolic link tidak dibuat, gambar tidak akan muncul di website meskipun path di database sudah benar.</p>
        </div>
    </div>
    
    <h2>Langkah 2: Upload Gambar ke Folder Storage</h2>
    
    <div class="step">
        <h3>Upload Gambar Secara Manual</h3>
        <ol>
            <li>Siapkan gambar yang ingin ditampilkan (disarankan ukuran 600x400 pixel atau rasio 3:2)</li>
            <li>Buka File Explorer</li>
            <li>Navigasi ke folder: <code>C:\xampp\htdocs\codepacker-net\storage\app\public\projects\</code></li>
            <li>Salin gambar yang ingin digunakan ke folder tersebut</li>
            <li>Catat nama file gambar, misalnya: <code>project1.jpg</code></li>
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
    
    <h2>Langkah 4: Menambahkan Gambar ke Project Baru</h2>
    
    <div class="step">
        <h3>Opsi 1: Menambahkan Project Baru dengan Gambar</h3>
        <ol>
            <li>Di PHPMyAdmin, pilih tabel <code>projects</code></li>
            <li>Klik tab "Insert" di bagian atas</li>
            <li>Isi data project seperti title, description, dll</li>
            <li>Untuk kolom <code>image</code>, masukkan path relatif ke gambar:
                <pre>projects/project1.jpg</pre>
            </li>
            <li>Untuk kolom <code>technologies</code>, masukkan array JSON:
                <pre>["Laravel", "PHP", "MySQL", "Vue.js"]</pre>
            </li>
            <li>Isi kolom lainnya sesuai kebutuhan</li>
            <li>Klik tombol "Go" untuk menyimpan project baru</li>
        </ol>
        
        <div class="image-container">
            <div class="caption">Contoh pengisian data project baru di PHPMyAdmin</div>
            <pre>
+-------------+---------------------------+
| title       | Nama Project              |
| description | Deskripsi project...      |
| image       | projects/project1.jpg     |
| technologies| ["Laravel", "PHP", "MySQL"]|
| user_id     | 1                         |
+-------------+---------------------------+
</pre>
        </div>
    </div>
    
    <h2>Langkah 5: Mengubah Gambar Project yang Sudah Ada</h2>
    
    <div class="step">
        <h3>Mengubah Gambar Project Existing</h3>
        <ol>
            <li>Di PHPMyAdmin, pilih tabel <code>projects</code></li>
            <li>Cari project yang ingin diubah gambarnya</li>
            <li>Klik tombol "Edit" (ikon pensil)</li>
            <li>Cari kolom <code>image</code></li>
            <li>Ubah nilai dengan path relatif ke gambar baru:
                <pre>projects/project_baru.jpg</pre>
            </li>
            <li>Klik tombol "Go" untuk menyimpan perubahan</li>
        </ol>
        
        <div class="warning">
            <p><strong>Penting:</strong> Jangan menambahkan <code>storage/</code> di awal path gambar. Sistem akan otomatis menambahkannya saat menampilkan gambar.</p>
        </div>
    </div>
    
    <h2>Langkah 6: Verifikasi Tampilan</h2>
    
    <div class="step">
        <ol>
            <li>Buka aplikasi Laravel Anda di browser: <code>http://127.0.0.1:8000/projects</code></li>
            <li>Periksa apakah gambar project muncul dengan benar</li>
            <li>Jika gambar tidak muncul, periksa:
                <ul>
                    <li>Path gambar di database sudah benar</li>
                    <li>File gambar sudah ada di folder yang benar</li>
                    <li>Symbolic link storage sudah dibuat</li>
                </ul>
            </li>
        </ol>
    </div>
    
    <h2>Contoh Kode yang Menampilkan Gambar</h2>
    
    <div class="step">
        <p>Berikut adalah kode yang digunakan untuk menampilkan gambar project di halaman projects:</p>
        
        <pre>
&lt;div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8"&gt;
    @forelse($projects as $project)
        &lt;x-project-card 
            :title="$project->title" 
            :image="$project->image ? asset('storage/' . $project->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=No+Image'" 
            :technologies="$project->technologies ?? []" 
            :author="['name' => $project->user->name, 'avatar' => $project->user->avatar ? asset('storage/' . $project->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($project->user->name)]"
            :description="$project->description"
            :id="$project->id"
        /&gt;
    @empty
        &lt;!-- Empty state --&gt;
    @endforelse
&lt;/div&gt;
</pre>

        <p>Perhatikan bagian <code class="code-highlight">:image="$project->image ? asset('storage/' . $project->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=No+Image'"</code> yang menampilkan gambar project.</p>
    </div>
    
    <h2>Contoh Lengkap</h2>
    
    <div class="step">
        <p>Berikut contoh lengkap untuk menambahkan 3 project dengan gambar:</p>
        
        <h3>1. Persiapkan Gambar</h3>
        <ul>
            <li>Siapkan 3 file gambar: <code>project1.jpg</code>, <code>project2.jpg</code>, dan <code>project3.jpg</code></li>
            <li>Upload ke folder <code>storage/app/public/projects/</code></li>
        </ul>
        
        <h3>2. Tambahkan Project di PHPMyAdmin</h3>
        <p>Project 1:</p>
        <pre>
title: "SQLearn"
description: "Platform pembelajaran interaktif yang berfokus pada penguasaan SQL"
image: "projects/project1.jpg"
technologies: ["Laravel", "PHP", "MySQL", "JavaScript", "Vue.js", "Redis"]
user_id: 1
</pre>

        <p>Project 2:</p>
        <pre>
title: "Visionary"
description: "Versi premium dari aplikasi marketplace dengan sistem pembayaran yang lebih aman"
image: "projects/project2.jpg"
technologies: ["Laravel", "PHP", "MySQL", "Vue.js", "Redis", "WebSockets"]
user_id: 1
</pre>

        <p>Project 3:</p>
        <pre>
title: "Ruang Cendikia"
description: "Solusi perpustakaan digital yang memungkinkan pengguna untuk mengakses buku"
image: "projects/project3.jpg"
technologies: ["Laravel", "PHP", "MySQL", "JavaScript", "Vue.js", "Redis"]
user_id: 2
</pre>
    </div>
    
    <h2>Troubleshooting</h2>
    
    <div class="step">
        <h3>Masalah 1: Gambar Tidak Muncul</h3>
        <p><strong>Solusi:</strong></p>
        <ol>
            <li>Periksa path gambar di database:
                <pre>SELECT id, title, image FROM projects WHERE id = 1;</pre>
            </li>
            <li>Pastikan symbolic link storage sudah dibuat:
                <pre>php artisan storage:link</pre>
            </li>
            <li>Periksa apakah file gambar benar-benar ada di folder:
                <pre>C:\xampp\htdocs\codepacker-net\storage\app\public\projects\</pre>
            </li>
            <li>Clear cache Laravel:
                <pre>
php artisan cache:clear
php artisan view:clear
                </pre>
            </li>
        </ol>
        
        <h3>Masalah 2: Gambar Terlalu Besar atau Kecil</h3>
        <p><strong>Solusi:</strong></p>
        <p>Gambar project ditampilkan dengan ukuran tetap di kartu project. Untuk hasil terbaik:</p>
        <ul>
            <li>Gunakan gambar dengan rasio 3:2 (misalnya 600x400 pixel)</li>
            <li>Kompres gambar untuk ukuran file yang lebih kecil dan loading lebih cepat</li>
            <li>Pastikan gambar memiliki resolusi yang cukup agar tidak terlihat buram</li>
        </ul>
    </div>
    
    <div class="note">
        <p><strong>Kesimpulan:</strong> Untuk menampilkan gambar di halaman projects, Anda perlu mengupload gambar ke folder storage dan menyimpan path relatifnya di kolom <code>image</code> pada tabel <code>projects</code> di database. Pastikan symbolic link storage sudah dibuat agar gambar dapat diakses melalui web.</p>
    </div>
</body>
</html>
