<?php
/**
 * Tutorial Lengkap Upload Gambar ke Project Menggunakan PHPMyAdmin
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Upload Gambar via PHPMyAdmin</title>
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
    </style>
</head>
<body>
    <h1>Tutorial Lengkap Upload Gambar ke Project Menggunakan PHPMyAdmin</h1>
    
    <p>Tutorial ini akan menjelaskan langkah-langkah detail untuk mengupload dan mengelola gambar project menggunakan PHPMyAdmin. Ada dua jenis gambar yang dapat dikelola:</p>
    
    <ol>
        <li><strong>Gambar Utama Project</strong> - Disimpan dalam kolom <code>image</code></li>
        <li><strong>Screenshots Project</strong> - Disimpan dalam kolom <code>screenshots</code> sebagai array JSON</li>
    </ol>
    
    <div class="note">
        <p><strong>Catatan:</strong> Pastikan Anda memiliki akses ke database MySQL dan PHPMyAdmin sebelum memulai.</p>
    </div>
    
    <h2>Persiapan Awal</h2>
    
    <div class="step">
        <h3>Langkah 1: Akses PHPMyAdmin</h3>
        <p>Buka browser dan akses PHPMyAdmin melalui URL:</p>
        <pre>http://localhost/phpmyadmin</pre>
        <p>Jika Anda menggunakan XAMPP, URL-nya biasanya adalah:</p>
        <pre>http://localhost/phpmyadmin</pre>
        <p>Jika diminta login, masukkan username dan password database Anda.</p>
    </div>
    
    <div class="step">
        <h3>Langkah 2: Pilih Database</h3>
        <p>Di panel kiri, klik nama database aplikasi Laravel Anda. Biasanya nama database sesuai dengan yang dikonfigurasi di file <code>.env</code>, misalnya <code>codepacker_net</code>.</p>
    </div>
    
    <div class="step">
        <h3>Langkah 3: Pilih Tabel Projects</h3>
        <p>Setelah memilih database, klik tabel <code>projects</code> dari daftar tabel yang tersedia.</p>
    </div>
    
    <h2>Cara 1: Update Gambar Utama Project (Kolom 'image')</h2>
    
    <div class="step">
        <h3>Langkah 1: Persiapkan File Gambar</h3>
        <p>Sebelum mengupdate database, pastikan file gambar sudah tersedia di server. Ada dua pendekatan:</p>
        
        <h4>A. Menggunakan URL Eksternal</h4>
        <p>Jika gambar berada di server eksternal (misalnya Unsplash, Imgur, dll), Anda cukup menyimpan URL lengkapnya.</p>
        
        <h4>B. Menggunakan File Lokal</h4>
        <p>Jika menggunakan file lokal, ikuti langkah-langkah berikut:</p>
        <ol>
            <li>Upload gambar ke folder <code>storage/app/public/projects</code> di project Laravel Anda</li>
            <li>Jalankan perintah <code>php artisan storage:link</code> jika belum pernah dilakukan sebelumnya</li>
            <li>Catat path relatif gambar, misalnya <code>projects/nama_gambar.jpg</code></li>
        </ol>
    </div>
    
    <div class="step">
        <h3>Langkah 2: Temukan Project yang Akan Diupdate</h3>
        <p>Di PHPMyAdmin, setelah memilih tabel <code>projects</code>, Anda akan melihat daftar semua project. Ada beberapa cara untuk menemukan project yang ingin diupdate:</p>
        
        <h4>A. Browse Data</h4>
        <p>Klik tab "Browse" untuk melihat semua data. Cari project berdasarkan ID atau judul.</p>
        
        <h4>B. Pencarian</h4>
        <p>Gunakan fitur pencarian di PHPMyAdmin:</p>
        <ol>
            <li>Klik tab "Search"</li>
            <li>Pada kolom "id", masukkan ID project yang ingin diubah</li>
            <li>Klik tombol "Go"</li>
        </ol>
    </div>
    
    <div class="step">
        <h3>Langkah 3: Edit Data Project</h3>
        <p>Setelah menemukan project yang ingin diupdate:</p>
        <ol>
            <li>Klik ikon "Edit" (pensil) di baris project tersebut</li>
            <li>Anda akan melihat form dengan semua kolom project</li>
            <li>Cari kolom <code>image</code></li>
            <li>Masukkan nilai sesuai jenis gambar:
                <ul>
                    <li>Untuk URL eksternal: masukkan URL lengkap, misalnya <code>https://images.unsplash.com/photo-1610116306796-6fea9f4fae38</code></li>
                    <li>Untuk file lokal: masukkan path relatif, misalnya <code>projects/nama_gambar.jpg</code></li>
                </ul>
            </li>
            <li>Klik tombol "Go" di bagian bawah form untuk menyimpan perubahan</li>
        </ol>
    </div>
    
    <div class="note">
        <p><strong>Catatan:</strong> Kolom <code>image</code> menyimpan path relatif atau URL lengkap, bukan file gambar itu sendiri.</p>
    </div>
    
    <h2>Cara 2: Update Screenshots Project (Kolom 'screenshots')</h2>
    
    <div class="step">
        <h3>Langkah 1: Persiapkan URL Screenshots</h3>
        <p>Kumpulkan URL semua screenshot yang ingin ditambahkan. URL ini bisa berupa:</p>
        <ul>
            <li>URL eksternal (misalnya dari Unsplash, Imgur, dll)</li>
            <li>URL lokal ke file yang sudah diupload ke <code>storage/app/public/projects</code></li>
        </ul>
    </div>
    
    <div class="step">
        <h3>Langkah 2: Edit Data Project</h3>
        <p>Seperti pada Cara 1, temukan dan edit project yang diinginkan.</p>
    </div>
    
    <div class="step">
        <h3>Langkah 3: Update Kolom 'screenshots'</h3>
        <p>Kolom <code>screenshots</code> menyimpan data dalam format JSON array. Ikuti langkah-langkah berikut:</p>
        <ol>
            <li>Cari kolom <code>screenshots</code> di form edit</li>
            <li>Masukkan array JSON yang berisi URL screenshots, contoh:
                <pre>["https://images.unsplash.com/photo-1587620962725-abab7fe55159", "https://images.unsplash.com/photo-1516116216624-53e697fedbea"]</pre>
            </li>
            <li>Pastikan format JSON valid (gunakan tanda kutip ganda untuk string, kurung siku untuk array)</li>
            <li>Klik tombol "Go" untuk menyimpan perubahan</li>
        </ol>
    </div>
    
    <div class="warning">
        <p><strong>Peringatan:</strong> Format JSON harus valid. Jika tidak valid, Laravel mungkin tidak bisa membaca data dengan benar.</p>
    </div>
    
    <h2>Contoh Lengkap Update Screenshots</h2>
    
    <div class="step">
        <h3>Contoh 1: Menambahkan 3 Screenshots ke Project</h3>
        
        <p>Berikut contoh lengkap untuk menambahkan 3 screenshots ke project dengan ID 1:</p>
        
        <ol>
            <li>Akses PHPMyAdmin dan pilih database</li>
            <li>Pilih tabel <code>projects</code></li>
            <li>Cari project dengan ID 1 (gunakan tab "Search" atau "Browse")</li>
            <li>Klik ikon "Edit" pada project tersebut</li>
            <li>Cari kolom <code>screenshots</code></li>
            <li>Masukkan array JSON berikut:
                <pre>[
    "https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=800&h=600&fit=crop",
    "https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=800&h=600&fit=crop",
    "https://images.unsplash.com/photo-1605379399642-870262d3d051?w=800&h=600&fit=crop"
]</pre>
            </li>
            <li>Klik tombol "Go" untuk menyimpan perubahan</li>
        </ol>
    </div>
    
    <div class="step">
        <h3>Contoh 2: Menggunakan File Lokal untuk Screenshots</h3>
        
        <p>Jika Anda telah mengupload file ke <code>storage/app/public/projects</code>, gunakan format berikut:</p>
        
        <pre>[
    "projects/screenshot1.jpg",
    "projects/screenshot2.jpg",
    "projects/screenshot3.jpg"
]</pre>
        
        <p>Pastikan file-file tersebut sudah ada di folder yang benar.</p>
    </div>
    
    <h2>Tips dan Trik</h2>
    
    <div class="step">
        <h3>Tip 1: Validasi JSON</h3>
        <p>Sebelum menyimpan array JSON, validasi formatnya menggunakan alat online seperti <a href="https://jsonlint.com/" target="_blank">JSONLint</a>.</p>
    </div>
    
    <div class="step">
        <h3>Tip 2: Backup Data</h3>
        <p>Sebelum melakukan perubahan besar, export data tabel <code>projects</code> sebagai backup.</p>
    </div>
    
    <div class="step">
        <h3>Tip 3: Menggunakan SQL Query Langsung</h3>
        <p>Untuk pengguna yang lebih mahir, Anda bisa menggunakan SQL query langsung:</p>
        
        <pre>UPDATE projects 
SET screenshots = '[\"https://images.unsplash.com/photo-1587620962725-abab7fe55159\",\"https://images.unsplash.com/photo-1516116216624-53e697fedbea\"]'
WHERE id = 1;</pre>
        
        <p>Perhatikan bahwa tanda kutip dalam JSON harus di-escape dengan backslash.</p>
    </div>
    
    <div class="step">
        <h3>Tip 4: Memeriksa Hasil</h3>
        <p>Setelah mengupdate data, verifikasi hasilnya dengan:</p>
        <ol>
            <li>Melihat data di PHPMyAdmin</li>
            <li>Mengakses halaman detail project di aplikasi Laravel</li>
        </ol>
    </div>
    
    <h2>Troubleshooting</h2>
    
    <div class="step">
        <h3>Masalah 1: Screenshots Tidak Muncul</h3>
        <p>Jika screenshots tidak muncul di aplikasi:</p>
        <ul>
            <li>Pastikan format JSON valid</li>
            <li>Periksa apakah URL dapat diakses</li>
            <li>Untuk file lokal, pastikan symbolic link storage sudah dibuat</li>
        </ul>
    </div>
    
    <div class="step">
        <h3>Masalah 2: Error JSON</h3>
        <p>Jika terjadi error terkait JSON:</p>
        <ul>
            <li>Pastikan semua string dalam array menggunakan tanda kutip ganda</li>
            <li>Pastikan tidak ada trailing comma di elemen terakhir array</li>
            <li>Validasi JSON menggunakan alat online</li>
        </ul>
    </div>
    
    <h2>Contoh URL Gambar untuk Testing</h2>
    
    <p>Berikut beberapa URL gambar dari Unsplash yang dapat Anda gunakan untuk testing:</p>
    
    <pre>https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=800&h=600&fit=crop
https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=800&h=600&fit=crop
https://images.unsplash.com/photo-1605379399642-870262d3d051?w=800&h=600&fit=crop
https://images.unsplash.com/photo-1517292987719-0369a794ec0f?w=800&h=600&fit=crop
https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=600&fit=crop
https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop</pre>
    
    <div class="note">
        <p><strong>Catatan Akhir:</strong> Pastikan untuk selalu menggunakan gambar dengan ukuran yang sesuai untuk aplikasi Anda. Untuk performa terbaik, kompres gambar sebelum digunakan.</p>
    </div>
</body>
</html>
