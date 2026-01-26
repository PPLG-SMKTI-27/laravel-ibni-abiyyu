<?php
// app/Http\Controllers\PortfolioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Data akun yang disimpan di controller
    private $users = [
        [
            'username' => 'ibni',
            'password' => 'password123',
            'role' => 'admin' // Tambahkan role admin
        ],
        [
            'username' => 'admin',
            'password' => 'admin123',
            'role' => 'admin' // Tambahkan role admin
        ],
        [
            'username' => 'user',
            'password' => 'user123',
            'role' => 'user' // Role biasa
        ]
    ];

    // Data default portofolio
    private $defaultData = [
        'fotoprofil' => 'https://cdn.discordapp.com/attachments/1256123329505660938/1460886503625592924/Screenshot_2025-06-08_002525.png?ex=6977b554&is=697663d4&hm=1849d437440bfd140731bafc0b76b28212775150627cda7350017a4e44dd351b',
        'name' => 'Ibni Abiyyu',
        'description' => 'Halo, saya Ibni Abiyyu, seorang Software Engineer dengan passion di bidang pengembangan perangkat lunak dan teknologi inovatif.',
        'github_url' => 'https://github.com/PPLG-SMKTI-27/uuk-ganjil-ibni-abiyyu',
        'tiktok_url' => 'https://www.tiktok.com/@meidoragon_',
        'email' => '24_ibni@student.smkti.net',
        'nomortelp' => '+62 851 5666 4819',
        'lokasi' => 'Samarinda, Indonesia',
        'pendidikan' => 'Telkom University',
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

    public function index(Request $request)
    {
        // Ambil data dari session jika ada (untuk edit), jika tidak gunakan default
        $portfolioData = $this->getPortfolioData($request);
        
        $data = array_merge($portfolioData, [
            // Status login dari session
            'isLoggedIn' => $request->session()->get('isLoggedIn', false),
            'isAdmin' => $request->session()->get('isAdmin', false),
            'loggedInUser' => $request->session()->get('loggedInUser', null),
            'loginMessage' => $request->session()->get('loginMessage', ''),
            'editMode' => $request->session()->get('editMode', false)
        ]);
        
        // Hapus pesan setelah ditampilkan
        $request->session()->forget('loginMessage');
        
        return view('portofolio', $data);
    }

    // Method untuk menampilkan halaman login
    public function showLogin()
    {
        // Kirim data name juga ke view login
        $data = [
            'name' => 'Ibni Abiyyu',
            'isLoggedIn' => false
        ];
        
        return view('login', $data);
    }

    // Method untuk proses login
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        // Cari user
        $user = $this->findUser($username, $password);
        
        if ($user) {
            // Simpan status login di session
            $request->session()->put('isLoggedIn', true);
            $request->session()->put('loggedInUser', $user);
            $request->session()->put('isAdmin', ($user['role'] === 'admin'));
            $request->session()->put('loginMessage', 'Login berhasil! Selamat datang ' . $user['username']);
            
            return redirect('/');
        } else {
            // Jika salah, kembali ke halaman login dengan pesan error
            $request->session()->flash('error', 'Username atau password salah!');
            return redirect('/login');
        }
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        // Hapus session login
        $request->session()->forget(['isLoggedIn', 'isAdmin', 'loggedInUser', 'editMode']);
        $request->session()->put('loginMessage', 'Logout berhasil!');
        return redirect('/');
    }

    // Method untuk toggle edit mode (admin only)
    public function toggleEdit(Request $request)
    {
        if (!$request->session()->get('isAdmin', false)) {
            return redirect('/')->with('error', 'Akses ditolak! Hanya admin yang bisa mengedit.');
        }
        
        $editMode = !$request->session()->get('editMode', false);
        $request->session()->put('editMode', $editMode);
        
        $message = $editMode ? 'Mode edit diaktifkan!' : 'Mode edit dinonaktifkan!';
        return redirect('/')->with('success', $message);
    }

    // Method untuk update data portofolio (admin only)
    public function updatePortfolio(Request $request)
    {
        if (!$request->session()->get('isAdmin', false)) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }
        
        // Ambil data dari form
        $updatedData = $request->only([
            'name', 'description', 'email', 'nomortelp', 
            'lokasi', 'pendidikan', 'github_url', 'tiktok_url'
        ]);
        
        // Update skills jika ada
        if ($request->has('skills')) {
            $skills = [];
            $skillNames = $request->input('skills.name', []);
            $skillPercentages = $request->input('skills.percentage', []);
            
            foreach ($skillNames as $index => $name) {
                if (!empty($name)) {
                    $skills[] = [
                        'name' => $name,
                        'icon' => 'fas fa-code', // Default icon
                        'percentage' => intval($skillPercentages[$index] ?? 0),
                        'delay' => ($index + 1) * 0.1
                    ];
                }
            }
            
            $updatedData['skills'] = $skills;
        }
        
        // Simpan ke session
        $portfolioData = $request->session()->get('portfolioData', $this->defaultData);
        $portfolioData = array_merge($portfolioData, $updatedData);
        $request->session()->put('portfolioData', $portfolioData);
        
        return redirect('/')->with('success', 'Data portofolio berhasil diperbarui!');
    }

    // Method untuk reset ke data default
    public function resetPortfolio(Request $request)
    {
        if (!$request->session()->get('isAdmin', false)) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }
        
        $request->session()->forget('portfolioData');
        return redirect('/')->with('success', 'Data berhasil direset ke default!');
    }

    // ========== HELPER METHODS ==========
    
    // Method helper untuk mencari user
    private function findUser($username, $password)
    {
        foreach ($this->users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return $user;
            }
        }
        return false;
    }
    
    // Method helper untuk mendapatkan data portofolio
    private function getPortfolioData(Request $request)
    {
        // Ambil dari session jika ada, jika tidak gunakan default
        return $request->session()->get('portfolioData', $this->defaultData);
    }
}