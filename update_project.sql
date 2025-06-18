-- Update proyek dengan ID 1
UPDATE projects 
SET 
    title = 'E-Learning Platform Pro',
    description = 'Platform e-learning yang telah ditingkatkan dengan fitur kelas virtual yang lebih interaktif, quiz online dengan analisis hasil yang detail, dan dashboard kemajuan siswa yang komprehensif.',
    repository_url = 'https://github.com/yourusername/elearning-platform-pro',
    demo_url = 'https://elearning-pro-demo.example.com',
    technologies = '["Laravel","PHP","MySQL","JavaScript","Vue.js","Redis"]'
WHERE id = 1;

-- Update proyek dengan ID 2
UPDATE projects
SET
    title = 'Marketplace App Premium',
    description = 'Versi premium dari aplikasi marketplace dengan sistem pembayaran yang lebih aman, fitur chat real-time, sistem review terverifikasi, dan antarmuka pengguna yang lebih intuitif.',
    technologies = '["Laravel","PHP","MySQL","Vue.js","Redis","WebSockets"]'
WHERE id = 2;

-- Update proyek lainnya sesuai kebutuhan 