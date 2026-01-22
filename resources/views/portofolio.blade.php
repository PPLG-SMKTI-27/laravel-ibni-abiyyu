@extends('layouts.main')

@section('content')
    <!-- Profil dengan Animasi Floating -->
    <section class="content-box fade-in" id="about">
        <div class="profile-section">
            <div class="profile-image-container">
                <img src="{{ $fotoprofil }}"
                     alt="Foto Profil {{ $name }}" 
                     class="profile-image">
            </div>
            
            <div class="profile-info">
                <h2 class="title">Tentang Saya</h2>
                <div class="text-content">
                    <!-- Menggunakan variable untuk deskripsi -->
                    <p>{{ $description }}</p>
                    
                    <!-- Tombol dengan Animasi Hover -->
                    <div class="button-container">
                        <a href="{{ $github_url }}" 
                           class="route-button" 
                           target="_blank">
                            <i class="fab fa-github"></i>
                            <span>GitHub Project</span>
                        </a>
                        <a href="{{ $tiktok_url }}" 
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
                @foreach($skills as $skill)
                <div class="skill-item">
                    <div class="skill-name">
                        <span><i class="{{ $skill['icon'] }}"></i> {{ $skill['name'] }}</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-level" 
                            style="animation-delay: {{ $skill['delay'] }}s; width: {{ $skill['percentage'] }}%;">
                        </div>
                    </div>
                </div>
                @endforeach
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
                    <strong>Email:</strong> {{ $email }}
                </div>
            </li>
            <li>
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <strong>Telepon:</strong> {{ $nomortelp }}
                </div>
            </li>
            <li>
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <strong>Lokasi:</strong> {{ $lokasi }}
                </div>
            </li>
            <li>
                <div class="contact-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <strong>Pendidikan:</strong> {{ $pendidikan }}
                </div>
            </li>
        </ul>
    </section>
@endsection