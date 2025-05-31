<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pesanan Berhasil - FreshLokal</title>
        
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-check-circle text-primary fa-5x"></i>
                            </div>
                            <h2 class="mb-4">Pesanan Berhasil Dibuat!</h2>
                            <p class="text-muted mb-4">Terima kasih telah berbelanja di FreshLokal</p>
                            
                            <div class="card border-0 bg-light mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-4 text-primary">Detail Pesanan</h5>
                                    <div class="row">
                                        <div class="col-md-6 text-start">
                                            <p class="mb-1"><strong>Nomor Pesanan:</strong></p>
                                            <p class="text-muted">#{{ $order->id }}</p>
                                            
                                            <p class="mb-1"><strong>Status:</strong></p>
                                            <p>
                                                <span class="badge bg-{{ 
                                                    $order->status === 'completed' ? 'success' : 
                                                    ($order->status === 'pending' ? 'warning' : 
                                                    ($order->status === 'shipped' ? 'info' : 
                                                    ($order->status === 'accepted' ? 'primary' : 'secondary')))
                                                }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </p>
                                            
                                            <p class="mb-1"><strong>Tanggal Pesanan:</strong></p>
                                            <p class="text-muted">{{ $order->created_at->format('d M Y H:i') }}</p>
                                        </div>
                                        <div class="col-md-6 text-start">
                                            <p class="mb-1"><strong>Produk:</strong></p>
                                            <p class="text-muted">{{ $order->product->name }}</p>
                                            
                                            <p class="mb-1"><strong>Jumlah:</strong></p>
                                            <p class="text-muted">{{ $order->quantity }} item</p>
                                            
                                            <p class="mb-1"><strong>Total Pembayaran:</strong></p>
                                            <p class="text-primary fw-bold">{{ $order->formatted_total_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 bg-light mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-4 text-primary">Informasi Pembayaran</h5>
                                    <div class="text-start">
                                        <p class="mb-1"><strong>Nomor Rekening:</strong></p>
                                        <p class="text-muted">{{ $order->no_rekening }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 bg-light mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-4 text-primary">Informasi Pengiriman</h5>
                                    <div class="text-start">
                                        <p class="mb-1"><strong>Alamat Pengiriman:</strong></p>
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

                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                <i class="fas fa-store me-1"></i> Kembali ke Marketplace
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 