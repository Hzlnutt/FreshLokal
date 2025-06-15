<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - FreshLokal</title>

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

        
        /* Hero Section for Cart */
        .cart-hero {
            background: linear-gradient(135deg, rgba(45, 134, 89, 0.9), rgba(61, 169, 107, 0.8));
            color: white;
            padding: 100px 0 70px; /* Diperbesar sedikit dari sebelumnya */
            margin-top: -24px;
            position: relative;
            overflow: hidden;
        }

        .cart-hero .container {
            position: relative;
            z-index: 2;
        }

        .cart-hero h1 {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1.5rem; /* Ditambah dari 1rem */
            font-size: 2.5rem; /* Ukuran font lebih besar */
        }

        .cart-hero .lead {
            font-weight: 300;
            font-size: 1.25rem; /* Sedikit lebih besar */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            margin-bottom: 0.5rem; /* Tambahkan margin bottom */
            line-height: 1.5; /* Tinggi line lebih nyaman */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .cart-hero {
                padding: 80px 0 50px;
            }
            
            .cart-hero h1 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }
            
            .cart-hero .lead {
                font-size: 1.1rem;
            }
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

        .btn-danger {
            border-radius: 50px;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
        }

        /* Cart Table Styles */
        .cart-table {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(45, 134, 89, 0.1);
        }

        .cart-table thead {
            background-color: var(--light-green);
        }

        .cart-table th {
            font-weight: 600;
            color: var(--accent-green);
        }

        .cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .product-name {
            font-weight: 600;
            color: var(--dark-text);
        }

        .product-category {
            font-size: 0.9rem;
            color: var(--muted-text);
        }

        .price-text {
            color: var(--primary-green);
            font-weight: 600;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--light-green);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 5px;
        }

        /* Empty Cart Styles */
        .empty-cart {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(45, 134, 89, 0.1);
        }

        .empty-cart-icon {
            font-size: 5rem;
            color: var(--secondary-green);
            opacity: 0.7;
            margin-bottom: 20px;
        }

        /* Alert Styles */
        .alert-success {
            background: var(--light-green);
            border: 1px solid var(--secondary-green);
            color: var(--accent-green);
            border-radius: 15px;
        }

        .alert-danger {
            background: #fce8e8;
            border: 1px solid #dc3545;
            color: #dc3545;
            border-radius: 15px;
        }

        /* Footer Styles */
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

        /* Responsive improvements */
        @media (max-width: 768px) {
            .cart-hero {
                padding: 60px 0 40px;
            }
            
            .cart-hero h1 {
                font-size: 2rem;
            }
            
            .cart-table {
                font-size: 0.9rem;
            }
            
            .cart-item-img {
                width: 60px;
                height: 60px;
            }
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
                        <a class="nav-link active" href="{{ route('cart.index') }}">
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

    <!-- Hero Section for Cart -->
    <section class="cart-hero">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-5 mb-4">Keranjang Belanja Anda</h1>
                    <p class="lead mb-0">Lihat dan kelola produk yang akan Anda beli</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Content -->
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($cart) == 0)
            <div class="empty-cart">
                <i class="fas fa-shopping-cart empty-cart-icon"></i>
                <h3 class="mb-3">Keranjang belanja Anda kosong</h3>
                <p class="text-muted mb-4">Mulai berbelanja untuk melihat produk di keranjang Anda</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-store me-2"></i> Belanja Sekarang
                </a>
            </div>
        @else
            <div class="cart-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40%">Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-img me-3">
                                        <div>
                                            <div class="product-name">{{ $item['name'] }}</div>
                                            <div class="product-category">{{ $item['category'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="price-text">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td>
                                    <div class="quantity-control">
                                                <form action="{{ route('cart.decrease', $item['id']) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="quantity-btn">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </form>
                                                
                                                <span class="quantity-input">{{ $item['quantity'] }}</span>
                                                
                                                <form action="{{ route('cart.add', $item['id']) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="quantity-btn">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                </td>
                                <td class="price-text">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Total:</td>
                                <td colspan="2" class="price-text fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Di bagian tombol aksi keranjang -->
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i> Kosongkan Keranjang
                            </button>
                        </form>

                        <div class="d-flex gap-3">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Lanjut Belanja
                            </a>
                            <form action="{{ route('orders.checkout') }}" method="GET" class="d-inline">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-shopping-bag me-2"></i> Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

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
                                <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>Beranda</a></li>
                                <li><a href="{{ route('dashboard') }}#products"><i class="fas fa-shopping-bag"></i>Produk</a></li>
                                <li><a href="{{ route('dashboard') }}#features"><i class="fas fa-star"></i>Fitur</a></li>
                                <li><a href="{{ route('dashboard') }}#about"><i class="fas fa-info-circle"></i>Tentang Kami</a></li>
                                <li><a href="{{ route('dashboard') }}#contact"><i class="fas fa-envelope"></i>Kontak</a></li>
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