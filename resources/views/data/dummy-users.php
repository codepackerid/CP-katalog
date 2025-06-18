<?php

// Dummy users data for Codepacker.net auth demo

$users = [
    [
        'id' => 1,
        'name' => 'Demo User',
        'email' => 'demo@codepacker.net',
        'password' => 'password123', // In a real app, this would be hashed
        'photo' => 'https://i.pravatar.cc/150?img=3',
        'angkatan' => '2022',
        'role' => 'Full-stack Developer',
        'skills' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'React', 'MySQL'],
        'joined_at' => '2023-01-10',
        'social' => [
            'twitter' => 'demouser',
            'github' => 'demouser',
            'linkedin' => 'demo-user'
        ]
    ],
    [
        'id' => 2,
        'name' => 'Agus Prasetyo',
        'email' => 'agus@codepacker.net',
        'password' => 'password123', // In a real app, this would be hashed
        'photo' => 'https://i.pravatar.cc/150?img=1',
        'angkatan' => '2021',
        'role' => 'Back-end Developer',
        'skills' => ['PHP', 'Laravel', 'CodeIgniter', 'MySQL', 'RESTful API'],
        'joined_at' => '2022-07-15',
        'social' => [
            'twitter' => 'agusprasetyo',
            'github' => 'agusp',
            'linkedin' => 'agus-prasetyo'
        ]
    ],
    [
        'id' => 3,
        'name' => 'Citra Rahmawati',
        'email' => 'citra@codepacker.net',
        'password' => 'password123', // In a real app, this would be hashed
        'photo' => 'https://i.pravatar.cc/150?img=10',
        'angkatan' => '2021',
        'role' => 'UI/UX Designer',
        'skills' => ['Figma', 'Adobe XD', 'Photoshop', 'Illustrator', 'HTML', 'CSS', 'JavaScript'],
        'joined_at' => '2022-08-20',
        'social' => [
            'twitter' => 'citradesign',
            'github' => 'citrarahma',
            'linkedin' => 'citra-rahmawati'
        ]
    ],
    [
        'id' => 4,
        'name' => 'Dian Safitri',
        'email' => 'dian@codepacker.net',
        'password' => 'password123', // In a real app, this would be hashed
        'photo' => 'https://i.pravatar.cc/150?img=5',
        'angkatan' => '2022',
        'role' => 'Front-end Developer',
        'skills' => ['HTML', 'CSS', 'JavaScript', 'React', 'Vue.js', 'Tailwind CSS', 'Bootstrap'],
        'joined_at' => '2023-02-05',
        'social' => [
            'twitter' => 'diansafitri',
            'github' => 'diandev',
            'linkedin' => 'dian-safitri'
        ]
    ],
    [
        'id' => 5,
        'name' => 'Eko Prasetyo',
        'email' => 'eko@codepacker.net',
        'password' => 'password123', // In a real app, this would be hashed
        'photo' => 'https://i.pravatar.cc/150?img=4',
        'angkatan' => '2023',
        'role' => 'Mobile Developer',
        'skills' => ['Flutter', 'Dart', 'Firebase', 'React Native', 'JavaScript', 'REST API'],
        'joined_at' => '2023-03-10',
        'social' => [
            'twitter' => 'ekodev',
            'github' => 'ekodev',
            'linkedin' => 'eko-prasetyo'
        ]
    ]
];

// IMPORTANT: Return all data for external access
return $users; 