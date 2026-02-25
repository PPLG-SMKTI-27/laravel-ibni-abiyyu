<?php
// database/seeders/PortfolioSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Portfolio::create([
            'fotoprofil' => 'https://cdn.discordapp.com/attachments/1256123329505660938/1460886503625592924/Screenshot_2025-06-08_002525.png?ex=697ba9d4&is=697a5854&hm=c63531dc298593448e403b8d79c917a634d0aa5e8d43a1fab2faf77068fabc44',
            'name' => 'Ibni Abiyyu',
            'description' => 'Halo, saya Ibni Abiyyu, seorang Software Engineer dengan passion di bidang pengembangan perangkat lunak dan teknologi inovatif.',
            'github_url' => 'https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu',
            'tiktok_url' => 'https://www.tiktok.com/@meidoragon_',
            'email' => '24_ibni@student.smkti.net',
            'nomortelp' => '+62 851 5666 4819',
            'lokasi' => 'Samarinda, Indonesia',
            'pendidikan' => 'Telkom University',
        ]);
    }
}