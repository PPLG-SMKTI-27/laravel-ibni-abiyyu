<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@include('style')
<body>
    <!-- ========== NAVIGASI BARU ========== -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#home" class="logo">
                <span>Ibni</span>Abiyyu
            </a>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="#about" class="nav-link">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="#skills" class="nav-link">Keahlian</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Kontak</a>
                </li>
              </ul>
        </div>
    </nav>
    
    <!-- Space untuk fixed navbar -->
    <div class="navbar-space"></div>
    
    <!-- Tombol Back to Top -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Header dengan Animasi -->
    <header class="header" id="home">
        <!-- Particles -->
        <div class="particles" id="particles"></div>
        
        <div class="container header-content">
            <h1>{{ $name }}</h1>
            <div class="title-animation">
                <span class="typing-text">Software Engineer</span>
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="container">
        @yield('content')
    </main>
    `
    <!-- Footer dengan Wave Animation -->
    <footer class="footer">
        <div class="container footer-content">
            <p>&copy; 2026 {{ $name }} - Software Engineer</p>
        </div>
    </footer>

    <!-- JavaScript untuk Animasi dan Navigasi -->
    <script>
        // Membuat particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 10 + 5;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const delay = Math.random() * 5;
                const duration = Math.random() * 10 + 10;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Scroll animation
        function checkScroll() {
            const elements = document.querySelectorAll('.fade-in');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.classList.add('visible');
                }
            });
            
            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');
            
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
                backToTop.classList.add('show');
            } else {
                navbar.classList.remove('scrolled');
                backToTop.classList.remove('show');
            }
            
            // Update active nav link
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (scrollY >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }
        
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');
        
        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileMenuBtn.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                mobileMenuBtn.querySelector('i').classList.remove('fa-times');
                mobileMenuBtn.querySelector('i').classList.add('fa-bars');
            });
        });
        
        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Initialize particles animation
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            checkScroll();
            
            // Animate skill bars on scroll
            window.addEventListener('scroll', checkScroll);
            
            // Add hover effects to buttons
            const buttons = document.querySelectorAll('.route-button');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', (e) => {
                    const x = e.clientX - e.target.getBoundingClientRect().left;
                    const y = e.clientY - e.target.getBoundingClientRect().top;
                    
                    button.style.setProperty('--x', `${x}px`);
                    button.style.setProperty('--y', `${y}px`);
                });
            });
            
            // Add typing animation reset
            const typingText = document.querySelector('.typing-text');
            if (typingText) {
                setInterval(() => {
                    typingText.style.animation = 'none';
                    setTimeout(() => {
                        typingText.style.animation = 'typing 3.5s steps(40, end), blink .75s step-end infinite';
                    }, 10);
                }, 7000);
            }
        });
        
        // Parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth - e.pageX * 2) / 100;
            const y = (window.innerHeight - e.pageY * 2) / 100;
            
            const header = document.querySelector('.header');
            header.style.backgroundPosition = `${x}px ${y}px`;
        });
    </script>
</body>
</html>