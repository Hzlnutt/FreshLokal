<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreshLokal - Marketplace Produk Segar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-top: -24px;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: #20c997;
            font-size: 2rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: #20c997;
            color: white;
            transform: translateY(-5px);
        }

        h4, h5 {
            font-weight: 600;
        }

        .card {
            transition: all 0.3s ease-in-out;
            border-radius: 1rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #20c997;
            border-color: #20c997;
        }

        .btn-primary:hover {
            background-color: #1ba37f;
            border-color: #1ba37f;
        }

        .badge.bg-primary {
            background-color: #20c997 !important;
        }

        .input-group input {
            border-radius: 0.5rem 0 0 0.5rem;
        }

        .input-group .btn {
            border-radius: 0 0.5rem 0.5rem 0;
        }

        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .pagination .page-link {
            border-radius: 0.5rem;
            color: #20c997;
        }

        .pagination .page-item.active .page-link {
            background-color: #20c997;
            border-color: #20c997;
        }

        footer {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body class="bg-light">
    @include('layouts.navigation')

    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 mb-4 animate__animated animate__fadeInDown">Selamat Datang di FreshLokal</h1>
            <p class="lead mb-5 animate__animated animate__fadeInUp">Temukan produk segar dan berkualitas langsung dari petani lokal untuk meja makan Anda</p>
            <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp">
                <a href="#products" class="btn btn-primary btn-lg">Jelajahi Produk</a>
                <a href="#features" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <section class="py-5" id="features">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center feature-card">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h5>Produk Segar</h5>
                        <p class="text-muted">Dipetik langsung dari kebun, dijamin kesegaran dan kualitasnya</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center feature-card">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h5>Pengiriman Cepat</h5>
                        <p class="text-muted">Layanan pengiriman express untuk menjaga kesegaran produk</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center feature-card">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h5>Dukung Petani Lokal</h5>
                        <p class="text-muted">Setiap pembelian membantu kesejahteraan petani lokal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $product->name }}</h5>
                            <span class="badge bg-primary">{{ $product->category }}</span>
                        </div>
                        <p class="card-text text-muted mb-3">{{ Str::limit($product->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-primary">{{ $product->formatted_price }}</h5>
                            <a href="{{ route('orders.show', $product) }}" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-1"></i> Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5 animate__animated animate__fadeIn">
                        <i class="fas fa-store-slash fa-3x text-muted mb-3"></i>
                        <h5>Belum ada produk</h5>
                        <p class="text-muted">Produk akan segera tersedia</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>

    <footer class="text-center text-muted py-4">
        &copy; {{ date('Y') }} FreshLokal. Semua hak dilindungi.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
