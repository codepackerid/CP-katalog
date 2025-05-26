@php
// Dummy projects data
$projects = [
    [
        'title' => 'E-Learning RPL',
        'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80',
        'technologies' => ['Laravel', 'Bootstrap', 'MySQL'],
        'author' => [
            'name' => 'Agus Prasetyo',
            'avatar' => 'https://i.pravatar.cc/150?img=1',
        ],
        'description' => 'Platform e-learning untuk memudahkan siswa RPL belajar pemrograman dengan berbagai fitur interaktif.'
    ],
    [
        'title' => 'Inventory SMKN 4',
        'image' => 'https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80',
        'technologies' => ['CodeIgniter', 'jQuery', 'MySQL'],
        'author' => [
            'name' => 'Dian Safitri',
            'avatar' => 'https://i.pravatar.cc/150?img=5',
        ],
        'description' => 'Sistem pengelolaan inventaris sekolah dengan fitur barcode scanning dan laporan detail.'
    ],
    [
        'title' => 'Perpustakaan Digital',
        'image' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1290&q=80',
        'technologies' => ['React', 'Node.js', 'MongoDB'],
        'author' => [
            'name' => 'Budi Santoso',
            'avatar' => 'https://i.pravatar.cc/150?img=3',
        ],
        'description' => 'Aplikasi perpustakaan digital dengan fitur pencarian, peminjaman, dan pembacaan online.'
    ],
    [
        'title' => 'Portfolio Generator',
        'image' => 'https://images.unsplash.com/photo-1542744095-fcf48d80b0fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1076&q=80',
        'technologies' => ['Vue.js', 'Tailwind CSS', 'Firebase'],
        'author' => [
            'name' => 'Citra Rahmawati',
            'avatar' => 'https://i.pravatar.cc/150?img=10',
        ],
        'description' => 'Aplikasi untuk membuat portfolio online dengan template modern dan customizable.'
    ],
    [
        'title' => 'Absensi QR Code',
        'image' => 'https://images.unsplash.com/photo-1511300636408-a63a89df3482?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
        'technologies' => ['Flutter', 'Firebase', 'Google Maps API'],
        'author' => [
            'name' => 'Eko Prasetyo',
            'avatar' => 'https://i.pravatar.cc/150?img=4',
        ],
        'description' => 'Aplikasi absensi dengan QR Code dan geolocation untuk verifikasi kehadiran.'
    ],
    [
        'title' => 'Smart Classroom',
        'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
        'technologies' => ['IoT', 'Arduino', 'React Native'],
        'author' => [
            'name' => 'Fauzi Rahman',
            'avatar' => 'https://i.pravatar.cc/150?img=8',
        ],
        'description' => 'Sistem kelas pintar dengan kontrol perangkat elektronik kelas melalui smartphone.'
    ],
];

// Dummy members data
$members = [
    [
        'name' => 'Agus Prasetyo',
        'photo' => 'https://i.pravatar.cc/150?img=1',
        'angkatan' => '2021',
        'role' => 'Back-end Developer'
    ],
    [
        'name' => 'Budi Santoso',
        'photo' => 'https://i.pravatar.cc/150?img=3',
        'angkatan' => '2022',
        'role' => 'Full-stack Developer'
    ],
    [
        'name' => 'Citra Rahmawati',
        'photo' => 'https://i.pravatar.cc/150?img=10',
        'angkatan' => '2021',
        'role' => 'UI/UX Designer'
    ],
    [
        'name' => 'Dian Safitri',
        'photo' => 'https://i.pravatar.cc/150?img=5',
        'angkatan' => '2022',
        'role' => 'Front-end Developer'
    ],
    [
        'name' => 'Eko Prasetyo',
        'photo' => 'https://i.pravatar.cc/150?img=4',
        'angkatan' => '2023',
        'role' => 'Mobile Developer'
    ],
    [
        'name' => 'Fauzi Rahman',
        'photo' => 'https://i.pravatar.cc/150?img=8',
        'angkatan' => '2023',
        'role' => 'IoT Developer'
    ],
    [
        'name' => 'Gita Purnama',
        'photo' => 'https://i.pravatar.cc/150?img=9',
        'angkatan' => '2021',
        'role' => 'QA Engineer'
    ],
    [
        'name' => 'Hadi Nugroho',
        'photo' => 'https://i.pravatar.cc/150?img=11',
        'angkatan' => '2022',
        'role' => 'DevOps Engineer'
    ],
];

// Dummy forum threads
$forumThreads = [
    [
        'title' => 'Tips belajar Laravel untuk pemula',
        'author' => [
            'name' => 'Agus Prasetyo',
            'avatar' => 'https://i.pravatar.cc/150?img=1',
        ],
        'date' => '3 hari yang lalu',
        'replies' => 15,
        'views' => 230,
        'excerpt' => 'Sharing pengalaman belajar Laravel selama 6 bulan, dari basic hingga advanced...',
        'comments' => [
            [
                'author' => [
                    'name' => 'Budi Santoso',
                    'avatar' => 'https://i.pravatar.cc/150?img=3',
                ],
                'content' => 'Thanks infonya! Saya juga baru mulai belajar Laravel, boleh share resources belajarnya?',
                'date' => '2 hari yang lalu'
            ],
            [
                'author' => [
                    'name' => 'Dian Safitri',
                    'avatar' => 'https://i.pravatar.cc/150?img=5',
                ],
                'content' => 'Laravel emang keren banget untuk project skala menengah. Untuk pemula mungkin bisa mulai dari Laracasts.',
                'date' => '1 hari yang lalu'
            ]
        ]
    ],
    [
        'title' => 'Mencari partner untuk project IoT',
        'author' => [
            'name' => 'Fauzi Rahman',
            'avatar' => 'https://i.pravatar.cc/150?img=8',
        ],
        'date' => '1 minggu yang lalu',
        'replies' => 8,
        'views' => 120,
        'excerpt' => 'Saya sedang mengerjakan project IoT untuk monitoring tanaman. Butuh partner yang paham Arduino dan React...',
        'comments' => [
            [
                'author' => [
                    'name' => 'Eko Prasetyo',
                    'avatar' => 'https://i.pravatar.cc/150?img=4',
                ],
                'content' => 'Saya tertarik nih, bisa kontak saya di WA untuk diskusi lebih lanjut.',
                'date' => '6 hari yang lalu'
            ]
        ]
    ],
    [
        'title' => 'Diskusi tentang peluang kerja di industri IT setelah lulus',
        'author' => [
            'name' => 'Citra Rahmawati',
            'avatar' => 'https://i.pravatar.cc/150?img=10',
        ],
        'date' => '2 minggu yang lalu',
        'replies' => 25,
        'views' => 340,
        'excerpt' => 'Sebagai siswa tingkat akhir, saya ingin tahu peluang kerja apa saja yang tersedia untuk lulusan RPL...',
        'comments' => [
            [
                'author' => [
                    'name' => 'Hadi Nugroho',
                    'avatar' => 'https://i.pravatar.cc/150?img=11',
                ],
                'content' => 'Dari pengalaman kakak tingkat, banyak yang diterima di startup. Yang penting punya portfolio yang bagus.',
                'date' => '13 hari yang lalu'
            ],
            [
                'author' => [
                    'name' => 'Gita Purnama',
                    'avatar' => 'https://i.pravatar.cc/150?img=9',
                ],
                'content' => 'Selain jadi programmer, bisa juga jadi QA atau technical support. Jalurnya banyak kok.',
                'date' => '12 hari yang lalu'
            ]
        ]
    ],
];

// About Codepacker data
$aboutData = [
    'description' => 'CodePacker adalah komunitas dan platform showcase karya siswa/i jurusan Rekayasa Perangkat Lunak (RPL) SMKN 4 Malang. Dibentuk pada tahun 2023, CodePacker bertujuan untuk memfasilitasi siswa dalam mengembangkan dan memamerkan karya digital mereka kepada publik dan industri.',
    'visi' => 'Menjadi hub kreativitas dan inovasi digital terkemuka untuk generasi muda Indonesia.',
    'misi' => [
        'Memfasilitasi siswa RPL untuk mengembangkan portfolio digital yang berkualitas',
        'Menjembatani kesenjangan antara pembelajaran di sekolah dengan kebutuhan industri',
        'Membangun komunitas pembelajar yang kolaboratif dan saling mendukung',
        'Mempromosikan karya siswa RPL SMKN 4 Malang kepada publik dan industri'
    ],
    'team' => [
        [
            'name' => 'Budi Santoso',
            'photo' => 'https://i.pravatar.cc/150?img=3',
            'role' => 'Ketua',
        ],
        [
            'name' => 'Citra Rahmawati',
            'photo' => 'https://i.pravatar.cc/150?img=10',
            'role' => 'Wakil Ketua',
        ],
        [
            'name' => 'Agus Prasetyo',
            'photo' => 'https://i.pravatar.cc/150?img=1',
            'role' => 'Sekretaris',
        ],
        [
            'name' => 'Dian Safitri',
            'photo' => 'https://i.pravatar.cc/150?img=5',
            'role' => 'Bendahara',
        ],
    ]
];
@endphp
