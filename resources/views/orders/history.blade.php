<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pesanan - FreshLokal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        /* Enhanced Buttons */
        .btn-primary {
            background: var(--gradient-green);
            border: none;
            padding: 10px 20px;
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

        .btn-outline-primary {
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
            padding: 10px 20px;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
        }

        /* Order Card Enhancement */
        .order-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .order-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(45, 134, 89, 0.2);
        }

        .order-image {
            height: 120px;
            width: 100%;
            object-fit: cover;
            border-radius: 15px;
            transition: all 0.4s ease;
        }

        .order-card:hover .order-image {
            transform: scale(1.05);
        }

        .badge {
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .badge-pending {
            background: #ffc107;
            color: #212529;
        }

        .badge-paid {
            background: #17a2b8;
            color: white;
        }

        .badge-shipped {
            background: var(--primary-green);
            color: white;
        }

        .badge-completed {
            background: #28a745;
            color: white;
        }

        .badge-cancelled {
            background: #dc3545;
            color: white;
        }

        /* Price Text */
        .price-text {
            color: var(--primary-green);
            font-weight: 600;
            font-size: 1.3rem;
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

        /* Modal Enhancement */
        .modal-header {
            background: var(--light-green);
            border-bottom: 1px solid rgba(45, 134, 89, 0.1);
        }

        .modal-title {
            color: var(--primary-green);
            font-weight: 600;
        }

        /* Section Header */
        .section-header {
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(45, 134, 89, 0.1);
            border: 1px solid rgba(45, 134, 89, 0.1);
            padding: 1.5rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .section-header:hover {
            box-shadow: 0 8px 35px rgba(45, 134, 89, 0.15);
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .order-image {
                height: 150px;
            }
            
            .section-header {
                flex-direction: column;
                gap: 1rem;
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
                
                 </li>
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

    <div class="container py-5" style="margin-top: 80px;">
        <div class="section-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1 fw-bold">
                    <i class="fas fa-history me-2 text-success"></i> Riwayat Pesanan
                </h4>
                <p class="text-muted mb-0">Daftar pesanan yang telah Anda buat</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                <i class="fas fa-store me-1"></i> Kembali Berbelanja
            </a>
        </div>

        <div class="row">
            <div class="col-12">
                @forelse($orders as $order)
                <div class="card order-card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 mb-3 mb-md-0">
                                @if($order->product->image)
                                    <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" class="img-fluid rounded order-image">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 120px;">
                                        <i class="fas fa-image fa-2x text-muted"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-7 mb-3 mb-md-0">
                                <div class="d-flex align-items-center mb-2">
                                    <h5 class="mb-0 me-2 fw-bold">{{ $order->product->name }}</h5>
                                    <span class="badge rounded-pill 
                                        @if($order->status === 'pending') badge-pending
                                        @elseif($order->status === 'paid') badge-paid
                                        @elseif($order->status === 'shipped') badge-shipped
                                        @elseif($order->status === 'completed') badge-completed
                                        @elseif($order->status === 'cancelled') badge-cancelled
                                        @else bg-secondary
                                        @endif">
                                        <i class="fas fa-circle me-1" style="font-size: 8px;"></i>{{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <p class="text-muted mb-2">
                                    <i class="fas fa-shopping-basket me-1"></i> {{ $order->quantity }} item
                                </p>
                                <p class="text-muted mb-2">
                                    <i class="fas fa-map-marker-alt me-1"></i> {{ $order->shipping_address }}
                                </p>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar me-1"></i> {{ $order->created_at->format('d M Y H:i') }}
                                </p>
                            </div>

                            <div class="col-md-3 text-md-end">
                                <h5 class="price-text mb-3">{{ $order->formatted_total_price }}</h5>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetail{{ $order->id }}">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="orderDetail{{ $order->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="fas fa-info-circle me-1"></i> Detail Pesanan #{{ $order->id }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-3 fw-bold">Informasi Produk</h6>
                                        <p class="mb-1"><strong>Nama Produk:</strong></p>
                                        <p class="text-muted">{{ $order->product->name }}</p>

                                        <p class="mb-1"><strong>Jumlah:</strong></p>
                                        <p class="text-muted">{{ $order->quantity }} item</p>

                                        <p class="mb-1"><strong>Harga Satuan:</strong></p>
                                        <p class="text-muted">{{ $order->formatted_price }}</p>

                                        <p class="mb-1"><strong>Total Pembayaran:</strong></p>
                                        <p class="price-text fw-bold">{{ $order->formatted_total_price }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="mb-3 fw-bold">Informasi Pengiriman</h6>
                                        <p class="mb-1"><strong>Status:</strong></p>
                                        <p>
                                            <span class="badge rounded-pill 
                                                @if($order->status === 'pending') badge-pending
                                                @elseif($order->status === 'paid') badge-paid
                                                @elseif($order->status === 'shipped') badge-shipped
                                                @elseif($order->status === 'completed') badge-completed
                                                @elseif($order->status === 'cancelled') badge-cancelled
                                                @else bg-secondary
                                                @endif">
                                                <i class="fas fa-circle me-1" style="font-size: 8px;"></i>{{ ucfirst($order->status) }}
                                            </span>
                                        </p>

                                        <p class="mb-1"><strong>Alamat:</strong></p>
                                        <p class="text-muted">{{ $order->shipping_address }}</p>

                                        <p class="mb-1"><strong>Nomor Telepon:</strong></p>
                                        <p class="text-muted">{{ $order->phone_number }}</p>

                                        @if($order->notes)
                                        <p class="mb-1"><strong>Catatan:</strong></p>
                                        <p class="text-muted">{{ $order->notes }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state text-center">
                    <i class="fas fa-shopping-basket fa-4x mb-4"></i>
                    <h4 class="fw-bold mb-3">Belum ada pesanan</h4>
                    <p class="text-muted mb-4">Anda belum membuat pesanan apapun</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-store me-1"></i> Mulai Berbelanja
                    </a>
                </div>
                @endforelse

                <!-- Pagination -->
                @if($orders->count() > 0)
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Enhanced Footer -->
<footer class="main-footer" style="background: linear-gradient(135deg, #1e6b42 0%, #2d8659 100%); color: white;">
    <div class="footer-content py-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Brand & Description -->
                <div class="col-lg-4 col-md-6">
                    <h5><i class="fas fa-leaf me-2"></i>FreshLokal</h5>
                    <p style="color: rgba(255, 255, 255, 0.8); line-height: 1.6;">
                        Marketplace terpercaya untuk produk segar langsung dari petani lokal. Kami berkomitmen menyediakan produk berkualitas tinggi dengan harga terjangkau untuk keluarga Indonesia.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f text-white"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram text-white"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter text-white"></i></a>
                        <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp text-white"></i></a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div class="col-lg-2 col-md-6">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('dashboard') }}" class="text-white-50"><i class="fas fa-home me-1"></i>Beranda</a></li>
                        <li><a href="{{ route('dashboard') }}#products" class="text-white-50"><i class="fas fa-shopping-bag me-1"></i>Produk</a></li>
                        <li><a href="{{ route('dashboard') }}#features" class="text-white-50"><i class="fas fa-star me-1"></i>Fitur</a></li>
                        <li><a href="{{ route('dashboard') }}#about" class="text-white-50"><i class="fas fa-info-circle me-1"></i>Tentang Kami</a></li>
                        <li><a href="{{ route('dashboard') }}#contact" class="text-white-50"><i class="fas fa-envelope me-1"></i>Kontak</a></li>
                    </ul>
                </div>

                <!-- Kategori Produk -->
                <div class="col-lg-3 col-md-6">
                    <h5>Kategori Produk</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50"><i class="fas fa-carrot me-1"></i>Sayuran Segar</a></li>
                        <li><a href="#" class="text-white-50"><i class="fas fa-apple-alt me-1"></i>Buah-buahan</a></li>
                        <li><a href="#" class="text-white-50"><i class="fas fa-seedling me-1"></i>Sayuran Organik</a></li>
                        <li><a href="#" class="text-white-50"><i class="fas fa-pepper-hot me-1"></i>Bumbu & Rempah</a></li>
                        <li><a href="#" class="text-white-50"><i class="fas fa-grain me-1"></i>Beras & Biji-bijian</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-lg-3 col-md-6">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="fas fa-phone me-1"></i><a href="tel:+62812345678" class="text-white-50">+62 812-3456-7890</a></li>
                        <li><i class="fas fa-envelope me-1"></i><a href="mailto:info@freshlokal.id" class="text-white-50">info@freshlokal.id</a></li>
                        <li><i class="fas fa-map-marker-alt me-1"></i>Jl. Raya Segar No. 123, Surabaya</li>
                        <li><i class="fas fa-clock me-1"></i>Senin - Sabtu: 08.00 - 20.00<br>Minggu: 08.00 - 18.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div style="background: rgba(0, 0, 0, 0.1); padding: 1.5rem 0; border-top: 1px solid rgba(255, 255, 255, 0.1);">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
            <p class="mb-0 text-white-50">&copy; {{ date('Y') }} FreshLokal. Semua hak cipta dilindungi.</p>
            <div>
                <a href="#" class="text-white-50 me-3">Kebijakan Privasi</a>
                <a href="#" class="text-white-50 me-3">Syarat & Ketentuan</a>
                <a href="#" class="text-white-50">FAQ</a>
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

    <!-- Bootstrap Bundle JS -->
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