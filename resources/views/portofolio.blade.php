@extends('layouts.main')

@section('content')
    <!-- Profil dengan Animasi Floating -->
    <section class="content-box fade-in" id="about">
        <div class="profile-section">
            <div class="profile-image-container">
                <img src="https://cdn.discordapp.com/attachments/1256123329505660938/1460886503625592924/Screenshot_2025-06-08_002525.png?ex=69688c14&is=69673a94&hm=f4d1050c3388467efcc87fe90711f5f1bb4f52d32deab20daf888ec3d443ff7b" 
                     alt="Foto Profil {{ $name ?? 'Ibni Abiyyu' }}" 
                     class="profile-image">
            </div>
            
            <div class="profile-info">
                <h2 class="title">Tentang Saya</h2>
                <div class="text-content">
                    <!-- Menggunakan variable untuk deskripsi -->
                    <p>{{ $description ?? 'Halo, saya Ibni Abiyyu, seorang Software Engineer dengan passion di bidang pengembangan perangkat lunak dan teknologi inovatif.' }}</p>
                    
                    <!-- Tombol dengan Animasi Hover -->
                    <div class="button-container">
                        <a href="{{ $github_url ?? 'https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu' }}" 
                           class="route-button" 
                           target="_blank">
                            <i class="fab fa-github"></i>
                            <span>GitHub Project</span>
                        </a>
                        <a href="{{ $tiktok_url ?? 'https://www.tiktok.com/@meidoragon_' }}" 
                           class="route-button" 
                           style="background: linear-gradient(135deg, var(--tiktok) 0%, var(--tiktok-hover) 100%);"
                           target="_blank">
                            <i class="fab fa-tiktok"></i>
                            <span>TikTok Saya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills dengan Progress Bar Animation -->
    <section class="content-box fade-in" id="skills">
        <h2 class="title">Keahlian Teknis</h2>
        <div class="skills-grid">
            <div class="skill-item">
                <div class="skill-name">
                    <span><i class="fas fa-code"></i> Frontend Development</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-level" style="animation-delay: 0.1s; width: 90%;"></div>
                </div>
            </div>
            
            <div class="skill-item">
                <div class="skill-name">
                    <span><i class="fas fa-server"></i> Backend Development</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-level" style="animation-delay: 0.2s; width: 85%;"></div>
                </div>
            </div>
            
            <div class="skill-item">
                <div class="skill-name">
                    <span><i class="fas fa-mobile-alt"></i> Mobile Development</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-level" style="animation-delay: 0.3s; width: 80%;"></div>
                </div>
            </div>
            
            <div class="skill-item">
                <div class="skill-name">
                    <span><i class="fas fa-database"></i> Database Design</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-level" style="animation-delay: 0.4s; width: 88%;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detail Profil -->
    <section class="content-box fade-in">
        <h2 class="title">Detail Profil</h2>
        <div class="text-content">
            <p>Saya memiliki pengalaman dalam pengembangan web dan mobile menggunakan berbagai teknologi seperti JavaScript, PHP, Python, dan framework modern seperti Laravel dan Django.</p>
            
            <p>Pendidikan terakhir saya adalah Sarjana dari Telkom University dengan spesialisasi di bidang Teknik Informatika, di mana saya memperdalam pengetahuan tentang algoritma, struktur data, dan arsitektur perangkat lunak.</p>
            
            <p><strong>Fokus Utama:</strong></p>
            <ul>
                <li>Membangun aplikasi web yang scalable dan maintainable</li>
                <li>Optimasi performa dan keamanan aplikasi</li>
                <li>Implementasi best practices dan clean code</li>
                <li>Cloud computing dan DevOps practices</li>
            </ul>
        </div>
    </section>

    <!-- Kontak dengan Animasi Icons -->
    <section class="content-box fade-in" id="contact">
        <h2 class="title">Kontak & Informasi</h2>
        <ul class="contact-list">
            <li>
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <strong>Email:</strong> 24_ibni@student.smkti.net
                </div>
            </li>
            <li>
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <strong>Telepon:</strong> +62 851 5666 4819
                </div>
            </li>
            <li>
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <strong>Lokasi:</strong> Samarinda, Indonesia
                </div>
            </li>
            <li>
                <div class="contact-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <strong>Pendidikan:</strong> Telkom University
                </div>
            </li>
        </ul>
    </section>
@endsection