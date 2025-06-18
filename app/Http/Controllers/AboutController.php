<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index()
    {
        $aboutData = [
            'description' => 'Codepacker adalah platform portfolio dan social networking yang dibuat khusus untuk siswa dan alumni jurusan Rekayasa Perangkat Lunak (RPL) SMKN 4 Malang. Platform ini bertujuan untuk memfasilitasi kolaborasi, berbagi pengetahuan, dan memamerkan proyek di antara anggota komunitas RPL.',
            'visi' => 'Menjadi platform terkemuka yang memfasilitasi pengembangan profesional, kolaborasi, dan kesuksesan karir bagi komunitas pengembang perangkat lunak di SMKN 4 Malang dan sekitarnya.',
            'misi' => [
                'Menyediakan platform untuk memamerkan portfolio proyek siswa dan alumni RPL.',
                'Memfasilitasi kolaborasi dan berbagi pengetahuan di antara anggota komunitas.',
                'Menghubungkan siswa dan alumni dengan peluang karir dan industri.',
                'Mendorong pembelajaran berkelanjutan dan pengembangan keterampilan.'
            ],
            'team' => [
                [
                    'name' => 'Ahmad Fauzi',
                    'role' => 'Project Lead',
                    'photo' => 'https://randomuser.me/api/portraits/men/32.jpg'
                ],
                [
                    'name' => 'Siti Aminah',
                    'role' => 'Backend Developer',
                    'photo' => 'https://randomuser.me/api/portraits/women/44.jpg'
                ],
                [
                    'name' => 'Budi Santoso',
                    'role' => 'Frontend Developer',
                    'photo' => 'https://randomuser.me/api/portraits/men/46.jpg'
                ],
                [
                    'name' => 'Diana Putri',
                    'role' => 'UI/UX Designer',
                    'photo' => 'https://randomuser.me/api/portraits/women/48.jpg'
                ]
            ]
        ];

        return view('pages.tentang', compact('aboutData'));
    }
} 