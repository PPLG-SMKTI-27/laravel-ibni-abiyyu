<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Menampilkan halaman portofolio
     */
    public function index()
    {
        // Data yang akan dikirim ke view
        $data = [
            'name' => 'Ibni Abiyyu',
            'title' => 'Software Engineer',
            'description' => 'Halo, saya Ibni Abiyyu, seorang Software Engineer dengan passion di bidang pengembangan perangkat lunak dan teknologi inovatif.',
            'github_url' => 'https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu',
            'tiktok_url' => 'https://www.tiktok.com/@meidoragon_',
        ];
        
        // Menggunakan view() bukan include
        return view('portofolio', $data);
        
        // Jika ingin include langsung:
        // extract($data);
        // return view('portofolio', compact('name', 'description', 'github_url', 'tiktok_url'));
    }

    /**
     * Menampilkan semua projects
     */
    public function projects()
    {
        return view('project');
    }
}