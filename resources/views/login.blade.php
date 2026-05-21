@extends('layouts.main')

@section('content')
<div class="container">
    <div class="content-box fade-in" style="max-width: 400px; margin: 50px auto;">
        <h2 class="title" style="text-align: center;">Login</h2>
        
        @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
        @endif
        
        <form method="POST" action="/login">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Username</label>
                <input type="text" name="username" required 
                       style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px;"
                       placeholder="Masukkan username">
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Password</label>
                <input type="password" name="password" required 
                       style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px;"
                       placeholder="Masukkan password">
            </div>
            
            <button type="submit" 
                    style="width: 100%; padding: 14px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); 
                           color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer;
                           transition: all 0.3s ease;">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
            
            <div style="margin-top: 20px; text-align: center; font-size: 14px; color: #666;">
                <p><strong>Akun demo:</strong></p>
                <p>Username: <strong>ibni</strong> | Password: <strong>password123</strong></p>
                <p>Username: <strong>admin</strong> | Password: <strong>admin123</strong></p>
            </div>
        </form>
    </div>
</div>
@endsection