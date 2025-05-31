<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Riwayat Pesanan - FreshLokal</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    </head>
    <body class="bg-light">
        @include('layouts.navigation')

        <!-- Content -->
        <div class="container py-5">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">
                        <i class="fas fa-history me-2"></i> Riwayat Pesanan
                    </h4>
                    <p class="text-muted mb-0">Daftar pesanan yang telah Anda buat</p>
                </div>
            </div>

            <!-- Orders List -->
            <div class="row">
                <div class="col-12">
                    @forelse($orders as $order)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Product Image -->
                                <div class="col-md-2 mb-3 mb-md-0">
                                    @if($order->product->image)
                                        <img src="{{ asset($order->product->image) }}" class="img-fluid rounded" alt="{{ $order->product->name }}" style="height: 100px; width: 100%; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 100px;">
                                            <i class="fas fa-image fa-2x text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Order Details -->
                                <div class="col-md-7 mb-3 mb-md-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <h5 class="mb-0 me-2">{{ $order->product->name }}</h5>
                                        <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'paid' ? 'info' : ($order->status === 'shipped' ? 'primary' : 'success')) }}">
                                            {{ ucfirst($order->status) }}
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
                                
                                <!-- Price and Actions -->
                                <div class="col-md-3 text-md-end">
                                    <h5 class="text-primary mb-3">{{ $order->formatted_total_price }}</h5>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetail{{ $order->id }}">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Detail Modal -->
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
                                            <h6 class="mb-3">Informasi Produk</h6>
                                            <p class="mb-1"><strong>Nama Produk:</strong></p>
                                            <p class="text-muted">{{ $order->product->name }}</p>
                                            
                                            <p class="mb-1"><strong>Jumlah:</strong></p>
                                            <p class="text-muted">{{ $order->quantity }} item</p>
                                            
                                            <p class="mb-1"><strong>Total Pembayaran:</strong></p>
                                            <p class="text-primary fw-bold">{{ $order->formatted_total_price }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="mb-3">Informasi Pengiriman</h6>
                                            <p class="mb-1"><strong>Status:</strong></p>
                                            <p>
                                                <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'paid' ? 'info' : ($order->status === 'shipped' ? 'primary' : 'success')) }}">
                                                    {{ ucfirst($order->status) }}
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
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                            <h5>Belum ada pesanan</h5>
                            <p class="text-muted">Anda belum membuat pesanan apapun</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                <i class="fas fa-store me-1"></i> Mulai Berbelanja
                            </a>
                        </div>
                    </div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 