<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $product->name }} - FreshLokal</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    </head>
    <body class="bg-light">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="Logo" class="me-2" style="width: 30px;">
                    <span class="fw-bold">FreshLokal</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-store me-1"></i> Marketplace
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
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

        <!-- Content -->
        <div class="container py-5">
            <div class="row">
                <!-- Product Image -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card border-0 shadow-sm">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 400px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 400px;">
                                <i class="fas fa-image fa-5x text-muted"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Details & Order Form -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title mb-2">{{ $product->name }}</h3>
                            <span class="badge bg-primary mb-3">{{ $product->category }}</span>
                            
                            <h4 class="text-primary mb-3">{{ $product->formatted_price }}</h4>
                            
                            <p class="text-muted mb-4">{{ $product->description }}</p>

                            <form action="{{ route('orders.store', $product) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-shopping-basket me-1"></i> Jumlah
                                    </label>
                                    <input type="number" class="form-control" name="quantity" value="1" min="1" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i> Alamat Pengiriman
                                    </label>
                                    <textarea class="form-control" name="shipping_address" rows="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-phone me-1"></i> Nomor Telepon
                                    </label>
                                    <input type="text" class="form-control" name="phone_number" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-credit-card me-1"></i> Nomor Rekening
                                    </label>
                                    <input type="text" class="form-control" name="no_rekening" placeholder="Masukkan nomor rekening Anda" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-sticky-note me-1"></i> Catatan
                                    </label>
                                    <textarea class="form-control" name="notes" rows="2"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-shopping-cart me-1"></i> Beli Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 