<?php
// app/Http\Controllers/PortfolioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'fotoprofil' => 'https://cdn.discordapp.com/attachments/1256123329505660938/1460886503625592924/Screenshot_2025-06-08_002525.png?ex=69688c14&is=69673a94&hm=f4d1050c3388467efcc87fe90711f5f1bb4f52d32deab20daf888ec3d443ff7b',
            'name' => 'Ibni Abiyyu',
            'description' => 'Halo, saya Ibni Abiyyu, seorang Software Engineer dengan passion di bidang pengembangan perangkat lunak dan teknologi inovatif.',
            'github_url' => 'https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu',
            'tiktok_url' => 'https://www.tiktok.com/@meidoragon_',
            'email' => '24_ibni@student.smkti.net',
            'nomortelp' => '+62 851 5666 4819',
            'lokasi' => 'Samarinda, Indonesia',
            'pendidikan' => 'Telkom University',
            
            // Data Skills
            'skills' => [
                [
                    'name' => 'Frontend Development',
                    'icon' => 'fas fa-code',
                    'percentage' => 30,
                    'delay' => 0.1
                ],
                [
                    'name' => 'Backend Development',
                    'icon' => 'fas fa-server',
                    'percentage' => 75,
                    'delay' => 0.2
                ],
                [
                    'name' => 'Mobile Development',
                    'icon' => 'fas fa-mobile-alt',
                    'percentage' => 40,
                    'delay' => 0.3
                ],
                [
                    'name' => 'Database Design',
                    'icon' => 'fas fa-database',
                    'percentage' => 70,
                    'delay' => 0.4
                ]
            ]
        ];
        
        return view('portofolio', $data);
    }
}