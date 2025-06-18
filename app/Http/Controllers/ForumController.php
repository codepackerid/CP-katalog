<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display the forum page.
     */
    public function index()
    {
        $forumThreads = [
            [
                'title' => 'Bagaimana cara membuat API dengan Laravel?',
                'excerpt' => 'Saya ingin membuat REST API dengan Laravel untuk aplikasi mobile. Apa saja yang perlu diperhatikan dan bagaimana langkah-langkahnya?',
                'author' => [
                    'name' => 'Ahmad Reza',
                    'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg'
                ],
                'date' => '3 jam yang lalu',
                'views' => rand(10, 200),
                'replies' => rand(1, 20)
            ],
            [
                'title' => 'Pengalaman magang di tech startup',
                'excerpt' => 'Saya baru saja menyelesaikan magang di sebuah startup teknologi selama 3 bulan. Ingin berbagi pengalaman dan insight yang mungkin berguna untuk teman-teman.',
                'author' => [
                    'name' => 'Rini Sulistiawati',
                    'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg'
                ],
                'date' => '1 hari yang lalu',
                'views' => rand(10, 200),
                'replies' => rand(1, 20)
            ],
            [
                'title' => 'Tips belajar JavaScript untuk pemula',
                'excerpt' => 'Bagi yang baru memulai belajar JavaScript, ini beberapa tips dan sumber belajar yang menurut saya efektif untuk memahami dasar-dasar JavaScript.',
                'author' => [
                    'name' => 'Deni Purnomo',
                    'avatar' => 'https://randomuser.me/api/portraits/men/46.jpg'
                ],
                'date' => '2 hari yang lalu',
                'views' => rand(10, 200),
                'replies' => rand(1, 20)
            ],
            [
                'title' => 'Diskusi: Framework PHP terbaik untuk project skala menengah',
                'excerpt' => 'Ingin mendengar pendapat dan pengalaman teman-teman mengenai framework PHP apa yang paling cocok untuk project skala menengah.',
                'author' => [
                    'name' => 'Fajar Nugraha',
                    'avatar' => 'https://randomuser.me/api/portraits/men/48.jpg'
                ],
                'date' => '3 hari yang lalu',
                'views' => rand(10, 200),
                'replies' => rand(1, 20)
            ],
            [
                'title' => 'Cara deploy aplikasi Laravel ke shared hosting',
                'excerpt' => 'Saya sudah membuat aplikasi dengan Laravel dan ingin mendeploy ke shared hosting. Apa saja yang perlu dipersiapkan dan langkah-langkahnya?',
                'author' => [
                    'name' => 'Dina Anggraini',
                    'avatar' => 'https://randomuser.me/api/portraits/women/48.jpg'
                ],
                'date' => '1 minggu yang lalu',
                'views' => rand(10, 200),
                'replies' => rand(1, 20)
            ]
        ];

        return view('pages.forum', compact('forumThreads'));
    }
} 