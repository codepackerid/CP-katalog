<?php
// Simpan sebagai file teks, lalu salin-tempel ke dalam artisan tinker

// Perbarui proyek 1
$p1 = App\Models\Project::find(1);
$p1->title = 'E-Learning Platform Pro';
$p1->description = 'Platform e-learning yang telah ditingkatkan dengan fitur kelas virtual yang lebih interaktif, quiz online dengan analisis hasil yang detail, dan dashboard kemajuan siswa yang komprehensif.';
$p1->technologies = ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'Vue.js', 'Redis'];
$p1->save();

// Perbarui proyek 2
$p2 = App\Models\Project::find(2);
$p2->title = 'Marketplace App Premium';
$p2->description = 'Versi premium dari aplikasi marketplace dengan sistem pembayaran yang lebih aman, fitur chat real-time, sistem review terverifikasi, dan antarmuka pengguna yang lebih intuitif.';
$p2->technologies = ['Laravel', 'PHP', 'MySQL', 'Vue.js', 'Redis', 'WebSockets'];
$p2->save();

// Perbarui proyek 3
$p3 = App\Models\Project::find(3);
$p3->title = 'Travel Explorer App';
$p3->description = 'Aplikasi travel premium dengan fitur navigasi offline, rekomendasi wisata berbasis AI, integrasi dengan hotel dan maskapai penerbangan, serta fitur AR untuk panduan wisata.';
$p3->technologies = ['Flutter', 'Dart', 'Firebase', 'Google Maps API', 'AI/ML'];
$p3->save();

// Perbarui proyek 4-8 sesuai kebutuhan
// ...

echo "Proyek berhasil diperbarui!"; 