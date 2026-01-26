@extends('layouts.main')

@section('content')
    <!-- Form Edit Mode (Hanya tampil jika admin dan edit mode aktif) -->
    @if(isset($isAdmin) && $isAdmin && isset($editMode) && $editMode)
    <div class="content-box fade-in" style="background: #fff3cd; border-left: 5px solid #ffc107;">
        <h3 style="color: #856404; margin-bottom: 20px;">
            <i class="fas fa-edit"></i> Mode Edit Admin
        </h3>
        
        <form method="POST" action="/update-portfolio" id="editForm">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nama:</label>
                    <input type="text" name="name" value="{{ $name }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email:</label>
                    <input type="email" name="email" value="{{ $email }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            </div>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Deskripsi:</label>
                <textarea name="description" rows="3" 
                          style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ $description }}</textarea>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Telepon:</label>
                    <input type="text" name="nomortelp" value="{{ $nomortelp }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Lokasi:</label>
                    <input type="text" name="lokasi" value="{{ $lokasi }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Pendidikan:</label>
                    <input type="text" name="pendidikan" value="{{ $pendidikan }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">GitHub URL:</label>
                    <input type="url" name="github_url" value="{{ $github_url }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            </div>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">TikTok URL:</label>
                <input type="url" name="tiktok_url" value="{{ $tiktok_url }}" 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            
            <h4 style="margin-bottom: 15px;">Skills:</h4>
            <div id="skills-container">
                @foreach($skills as $index => $skill)
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 10px; margin-bottom: 10px;">
                    <input type="text" name="skills[name][]" value="{{ $skill['name'] }}" 
                           placeholder="Nama Skill" style="padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                    <input type="number" name="skills[percentage][]" value="{{ $skill['percentage'] }}" min="0" max="100"
                           placeholder="%" style="padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                @endforeach
            </div>
            
            <button type="button" onclick="addSkill()" 
                    style="background: #17a2b8; color: white; border: none; padding: 8px 15px; 
                           border-radius: 5px; margin-bottom: 20px; cursor: pointer;">
                <i class="fas fa-plus"></i> Tambah Skill
            </button>
            
            <div style="display: flex; gap: 10px;">
                <button type="submit" 
                        style="background: #28a745; color: white; border: none; padding: 10px 20px; 
                               border-radius: 5px; cursor: pointer; flex: 1;">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                
                <button type="button" onclick="document.getElementById('resetForm').submit()" 
                        style="background: #dc3545; color: white; border: none; padding: 10px 20px; 
                               border-radius: 5px; cursor: pointer;">
                    <i class="fas fa-undo"></i> Reset ke Default
                </button>
            </div>
        </form>
        
        <form method="POST" action="/reset-portfolio" id="resetForm" style="display: none;">
            @csrf
        </form>
    </div>
    @endif

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
                    @if(isset($isAdmin) && $isAdmin && isset($editMode) && $editMode)
                    <span style="color: var(--accent); font-weight: bold;">{{ $skill['percentage'] }}%</span>
                    @endif
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

    <script>
        function addSkill() {
            const container = document.getElementById('skills-container');
            const div = document.createElement('div');
            div.style.cssText = 'display: grid; grid-template-columns: 2fr 1fr; gap: 10px; margin-bottom: 10px;';
            div.innerHTML = `
                <input type="text" name="skills[name][]" placeholder="Nama Skill" 
                       style="padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="number" name="skills[percentage][]" placeholder="%" min="0" max="100"
                       style="padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
            `;
            container.appendChild(div);
        }
    </script>
@endsection