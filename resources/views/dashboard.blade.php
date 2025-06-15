<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreshLokal - Marketplace Produk Segar</title>

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

        /* Hero Section Enhancement */
        .hero-section {
            background: linear-gradient(135deg, rgba(45, 134, 89, 0.9), rgba(61, 169, 107, 0.8)), 
                        url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            padding: 120px 0;
            margin-top: -24px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1.5rem;
        }

        .hero-section .lead {
            font-weight: 300;
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
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

        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.7);
            padding: 12px 30px;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: white;
            transform: translateY(-2px);
        }

        /* Feature Section Enhancement */
        .feature-section {
            background: white;
            position: relative;
        }

        .feature-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(180deg, var(--light-green) 0%, transparent 100%);
        }

        .feature-card {
            transition: all 0.4s ease;
            padding: 2rem;
            border-radius: 20px;
            background: white;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(45, 134, 89, 0.15);
            background: linear-gradient(135deg, #ffffff 0%, #f8fff8 100%);
        }

        .feature-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: var(--light-green);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-green);
            font-size: 2.2rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-green);
            border-radius: 50%;
            transform: scale(0);
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            color: white;
            transform: scale(1.1);
        }

        .feature-card:hover .feature-icon::before {
            transform: scale(1);
        }

        .feature-card:hover .feature-icon i {
            position: relative;
            z-index: 2;
        }

        /* Product Section Enhancement */
        .products-header {
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(45, 134, 89, 0.1);
            border: 1px solid rgba(45, 134, 89, 0.1);
            transition: all 0.3s ease;
        }

        .products-header:hover {
            box-shadow: 0 8px 35px rgba(45, 134, 89, 0.15);
        }

        .search-input {
            border: 2px solid rgba(45, 134, 89, 0.1);
            border-radius: 50px;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(45, 134, 89, 0.25);
        }

        .search-btn {
            border-radius: 50px;
            padding: 12px 20px;
        }

        /* Card Enhancement */
        .product-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(45, 134, 89, 0.2);
        }

        .product-card .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .product-card .card-body {
            padding: 1.5rem;
        }

        .product-badge {
            background: var(--gradient-green) !important;
            border-radius: 15px;
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .price-text {
            color: var(--primary-green);
            font-weight: 600;
            font-size: 1.3rem;
        }

        /* Alert Enhancement */
        .alert-success {
            background: var(--light-green);
            border: 1px solid var(--secondary-green);
            color: var(--accent-green);
            border-radius: 15px;
        }

        /* Empty State Enhancement */
        .empty-state {
            background: linear-gradient(135deg, #ffffff 0%, #f8fff8 100%);
            border: 2px dashed rgba(45, 134, 89, 0.2);
            border-radius: 20px;
            padding: 4rem 2rem;
        }

        .empty-state i {
            color: var(--secondary-green);
            opacity: 0.7;
        }

        /* Pagination Enhancement */
        .pagination .page-link {
            border: none;
            border-radius: 10px;
            margin: 0 2px;
            color: var(--primary-green);
            font-weight: 500;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: var(--light-green);
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: var(--gradient-green);
            border: none;
            box-shadow: 0 4px 15px rgba(45, 134, 89, 0.3);
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

        .footer-bottom p {
            margin: 0;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
        }

        /* Scroll animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0;
                background-attachment: scroll;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .feature-card {
                padding: 1.5rem;
            }
            
            .products-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .footer-content .row > div {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
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
                        @if($cartCount > 0)
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

    <!-- Hero Section -->
    <section class="hero-section text-center" id="home">
        <div class="container">
            <h1 class="display-4 mb-4 animate_animated animate_fadeInDown">Selamat Datang di FreshLokal</h1>
            <p class="lead mb-5 animate_animated animate_fadeInUp">Temukan produk segar dan berkualitas langsung dari petani lokal untuk meja makan Anda</p>
            <div class="d-flex justify-content-center gap-3 animate_animated animatefadeInUp animate_delay-1s">
                <a href="#products" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-cart me-2"></i>Jelajahi Produk
                </a>
                <a href="#features" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Feature Section -->
    <section class="feature-section py-5" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-success mb-3">Mengapa Memilih FreshLokal?</h2>
                <p class="lead text-muted">Komitmen kami untuk memberikan yang terbaik</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h5 class="fw-bold">Produk Segar</h5>
                        <p class="text-muted">Dipetik langsung dari kebun, dijamin kesegaran dan kualitasnya setiap hari</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="fas fa-truck-fast"></i>
                        </div>
                        <h5 class="fw-bold">Pengiriman Cepat</h5>
                        <p class="text-muted">Layanan pengiriman express untuk menjaga kesegaran produk sampai di tangan Anda</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h5 class="fw-bold">Dukung Petani Lokal</h5>
                        <p class="text-muted">Setiap pembelian membantu meningkatkan kesejahteraan petani lokal di Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Unggulan -->
<div class="container py-5" id="products">
    <div class="bg-white p-4 rounded shadow-sm mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">
                <i class="fas fa-store me-2"></i> Produk Unggulan
            </h4>
            <p class="text-muted mb-0">Pilihan terbaik dari petani lokal</p>
        </div>
        <div class="d-flex gap-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari produk...">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Produk Grid -->
    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 product-card">
                <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/300' }}" 
                    class="card-img-top" 
                    alt="{{ $product->name }}" 
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">{{ $product->name }}</h5>
                        <div>
                            @if($product->status == 'ada')
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif
                            <span class="badge bg-primary ms-1">{{ $product->category ?? 'Tanpa Kategori' }}</span>
                        </div>
                    </div>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <h5 class="mb-0 text-success">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                            <small class="text-muted">Stok: {{ $product->stock }}</small>
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-sm" {{ $product->status == 'habis' ? 'disabled' : '' }}>
                                <i class="fas fa-shopping-cart me-1"></i> Beli
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                <h4>Produk tidak tersedia</h4>
                <p class="text-muted">Silakan coba lagi nanti</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
    @endif
</div>

    <!-- Enhanced Footer -->
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
                                <li><a href="#home"><i class="fas fa-home"></i>Beranda</a></li>
                                <li><a href="#products"><i class="fas fa-shopping-bag"></i>Produk</a></li>
                                <li><a href="#features"><i class="fas fa-star"></i>Fitur</a></li>
                                <li><a href="#about"><i class="fas fa-info-circle"></i>Tentang Kami</a></li>
                                <li><a href="#contact"><i class="fas fa-envelope"></i>Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Kategori Produk</h5>
                            <ul>
                                <li><a href="#"><i class="fas fa-carrot"></i>Sayuran Segar</a></li>
                                <li><a href="#"><i class="fas fa-apple-alt"></i>Buah-buahan</a></li>
                                <li><a href="#"><i class="fas fa-seedling"></i>Sayuran Organik</a></li>
                                <li><a href="#"><i class="fas fa-pepper-hot"></i>Bumbu & Rempah</a></li>
                                <li><a href="#"><i class="fas fa-grain"></i>Beras & Biji-bijian</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Kontak Kami</h5>
                            <ul>
                                <li>
                                    <a href="tel:+62812345678">
                                        <i class="fas fa-phone"></i>+62 812-3456-7890
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@freshlokal.id">
                                        <i class="fas fa-envelope"></i>info@freshlokal.id
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fas fa-map-marker-alt"></i>Jl. Raya Segar No. 123<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surabaya, Jawa Timur 60119
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-clock"></i>Senin - Sabtu: 08:00 - 20:00<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minggu: 08:00 - 18:00
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Newsletter Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="newsletter-section text-center p-4" style="background: rgba(255, 255, 255, 0.1); border-radius: 15px; border: 1px solid rgba(255, 255, 255, 0.2);">
                            <h5 class="mb-3">
                                <i class="fas fa-envelope-open-text me-2"></i>
                                Berlangganan Newsletter
                            </h5>
                            <p class="mb-3" style="color: rgba(255, 255, 255, 0.8);">
                                Dapatkan informasi terbaru tentang produk segar dan penawaran menarik langsung ke email Anda
                            </p>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Masukkan email Anda..." style="border-radius: 25px 0 0 25px; border: none; padding: 12px 20px;">
                                        <button class="btn btn-light" type="button" style="border-radius: 0 25px 25px 0; padding: 12px 20px; font-weight: 500;">
                                            <i class="fas fa-paper-plane me-2"></i>Berlangganan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 text-center text-lg-start">
                        <p>&copy; 2024 FreshLokal. Semua hak cipta dilindungi.</p>
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
    <button class="scroll-to-top-btn" id="scrollToTop" style="
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
    ">
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

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add to cart functionality
        document.querySelectorAll('.btn-primary').forEach(btn => {
            if (btn.innerHTML.includes('Beli Sekarang')) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Show success alert
                    const alert = document.querySelector('.alert-success');
                    alert.classList.remove('d-none');
                    
                    // Add animation
                    this.innerHTML = '<i class="fas fa-check me-1"></i> Ditambahkan!';
                    this.style.background = '#28a745';
                    
                    // Reset after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-shopping-cart me-1"></i> Beli Sekarang';
                        this.style.background = '';
                    }, 2000);
                    
                    // Hide alert after 3 seconds
                    setTimeout(() => {
                        alert.classList.add('d-none');
                    }, 3000);
                });
            }
        });

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');
        
        searchBtn.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach(card => {
                const productName = card.querySelector('.card-title').textContent.toLowerCase();
                const productDesc = card.querySelector('.card-text').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productDesc.includes(searchTerm) || searchTerm === '') {
                    card.parentElement.style.display = 'block';
                } else {
                    card.parentElement.style.display = 'none';
                }
            });
        });

        // Search on Enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });

        // Newsletter subscription
        document.querySelector('.newsletter-section .btn-light').addEventListener('click', function() {
            const emailInput = this.parentElement.querySelector('input[type="email"]');
            const email = emailInput.value;
            
            if (email && email.includes('@')) {
                this.innerHTML = '<i class="fas fa-check me-2"></i>Berhasil!';
                this.style.background = '#28a745';
                this.style.borderColor = '#28a745';
                
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Berlangganan';
                    this.style.background = '';
                    this.style.borderColor = '';
                    emailInput.value = '';
                }, 2000);
            } else {
                emailInput.style.borderColor = '#dc3545';
                setTimeout(() => {
                    emailInput.style.borderColor = '';
                }, 2000);
            }
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

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.product-card, .feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>