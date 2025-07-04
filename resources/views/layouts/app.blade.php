<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FreshLokal') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Custom Style -->
    <style>
        :root {
            --primary-green: #2d8659;
            --secondary-green: #3da96b;
            --light-green: #e8f5e8;
            --accent-green: #1e6b42;
            --gradient-green: linear-gradient(135deg, #2d8659 0%, #3da96b 100%);
            --dark-text: #2c3e50;
            --muted-text: #6c757d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #f0f9f4 100%);
            color: var(--dark-text);
            line-height: 1.6;
            padding-top: 70px; /* Untuk navbar fixed */
        }

        /* Navigation Enhancement */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(45, 134, 89, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-green) !important;
            font-size: 1.5rem;
        }

        /* Enhanced Buttons */
        .btn-primary {
            background: var(--gradient-green);
            border: none;
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(45, 134, 89, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45, 134, 89, 0.4);
            background: linear-gradient(135deg, #1e6b42 0%, #2d8659 100%);
        }

        /* Alert Enhancement */
        .alert-success {
            background: var(--light-green);
            border: 1px solid var(--secondary-green);
            color: var(--accent-green);
            border-radius: 15px;
        }

        /* Enhanced Footer */
        .main-footer {
            background: linear-gradient(135deg, #1e6b42 0%, #2d8659 100%);
            color: white;
            margin-top: 4rem;
        }

        .footer-content {
            padding: 3rem 0 2rem;
        }

        .footer-section h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .footer-section h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 30px;
            height: 3px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 2px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 300;
        }

        .footer-section ul li a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-section ul li a i {
            margin-right: 8px;
            width: 16px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            margin-right: 1rem;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .footer-bottom {
            background: rgba(0, 0, 0, 0.1);
            padding: 1.5rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Scroll to Top Button */
        .scroll-to-top-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-green);
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(45, 134, 89, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: scale(0.8);
        }

        /* Navbar transparency on scroll */
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }
        }

        .bg-light-green {
        background-color: rgba(45, 134, 89, 0.05);
        border: 1px solid rgba(45, 134, 89, 0.1);
        border-radius: 15px;
        }
        
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-leaf me-2"></i>FreshLokal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}#products">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('orders.history') ? 'active' : '' }}" href="{{ route('orders.history') }}">
                            <i class="fas fa-history me-1"></i> Riwayat Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart me-1"></i> Keranjang
                            @if(isset($cartCount) && $cartCount > 0)
                                <span class="badge bg-danger rounded-pill">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-edit me-1"></i> Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>
                                <i class="fas fa-leaf me-2"></i>FreshLokal
                            </h5>
                            <p class="mb-4" style="color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
                                Marketplace terpercaya untuk produk segar langsung dari petani lokal. 
                                Kami berkomitmen menyediakan produk berkualitas tinggi dengan harga terjangkau 
                                untuk keluarga Indonesia.
                            </p>
                            <div class="social-links">
                                <a href="#" aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" aria-label="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" aria-label="WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Navigasi</h5>
                            <ul>
                                <li><a href="{{ route('dashboard') }}"><i class="fas fa-home me-1"></i>Beranda</a></li>
                                <li><a href="{{ route('dashboard') }}#products"><i class="fas fa-shopping-bag me-1"></i>Produk</a></li>
                                <li><a href="{{ route('dashboard') }}#features"><i class="fas fa-star me-1"></i>Fitur</a></li>
                                <li><a href="{{ route('dashboard') }}#about"><i class="fas fa-info-circle me-1"></i>Tentang Kami</a></li>
                                <li><a href="{{ route('dashboard') }}#contact"><i class="fas fa-envelope me-1"></i>Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Kategori Produk</h5>
                            <ul>
                                <li><a href="#"><i class="fas fa-carrot me-1"></i>Sayuran Segar</a></li>
                                <li><a href="#"><i class="fas fa-apple-alt me-1"></i>Buah-buahan</a></li>
                                <li><a href="#"><i class="fas fa-seedling me-1"></i>Sayuran Organik</a></li>
                                <li><a href="#"><i class="fas fa-pepper-hot me-1"></i>Bumbu & Rempah</a></li>
                                <li><a href="#"><i class="fas fa-grain me-1"></i>Beras & Biji-bijian</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Kontak Kami</h5>
                            <ul>
                                <li>
                                    <a href="tel:+62812345678">
                                        <i class="fas fa-phone me-1"></i>+62 812-3456-7890
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@freshlokal.id">
                                        <i class="fas fa-envelope me-1"></i>info@freshlokal.id
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fas fa-map-marker-alt me-1"></i>Jl. Raya Segar No. 123<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surabaya, Jawa Timur 60119
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-clock me-1"></i>Senin - Sabtu: 08:00 - 20:00<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minggu: 08:00 - 18:00
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 text-center text-lg-start">
                        <p>&copy; {{ date('Y') }} FreshLokal. Semua hak cipta dilindungi.</p>
                    </div>
                    <div class="col-lg-6 col-md-12 text-center text-lg-end">
                        <p>
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; margin-right: 15px;">
                                Kebijakan Privasi
                            </a>
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; margin-right: 15px;">
                                Syarat & Ketentuan
                            </a>
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">
                                FAQ
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top-btn" id="scrollToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Scroll to Top Button
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.style.opacity = '1';
                scrollToTopBtn.style.visibility = 'visible';
                scrollToTopBtn.style.transform = 'scale(1)';
            } else {
                scrollToTopBtn.style.opacity = '0';
                scrollToTopBtn.style.visibility = 'hidden';
                scrollToTopBtn.style.transform = 'scale(0.8)';
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Hover effect for scroll to top button
        scrollToTopBtn.addEventListener('mouseenter', () => {
            scrollToTopBtn.style.transform = 'scale(1.1)';
            scrollToTopBtn.style.boxShadow = '0 6px 20px rgba(45, 134, 89, 0.4)';
        });

        scrollToTopBtn.addEventListener('mouseleave', () => {
            scrollToTopBtn.style.transform = 'scale(1)';
            scrollToTopBtn.style.boxShadow = '0 4px 15px rgba(45, 134, 89, 0.3)';
        });

        // Navbar transparency on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(45, 134, 89, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 20px rgba(45, 134, 89, 0.1)';
            }
        });
    </script>
</body>
</html>