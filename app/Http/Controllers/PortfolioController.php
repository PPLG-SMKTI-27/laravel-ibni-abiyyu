<?php
// app/Http/Controllers/PortfolioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Ibni Abiyyu',
            'description' => 'Halo, saya Ibni Abiyyu, seorang Software Engineer dengan passion di bidang pengembangan perangkat lunak dan teknologi inovatif.',
            'github_url' => 'https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu',
            'tiktok_url' => 'https://www.tiktok.com/@meidoragon_'
        ];
        
        return view('portofolio', $data);
    }
}