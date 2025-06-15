@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center" style="background: linear-gradient(135deg, rgba(45, 134, 89, 0.9), rgba(61, 169, 107, 0.8)); color: white; padding: 100px 0;">
    <div class="container">
        <div class="mb-4">
            <i class="fas fa-check-circle fa-5x text-white"></i>
        </div>
        <h1 class="display-5 mb-3">Pesanan Berhasil Dibuat!</h1>
        <p class="lead mb-4">Terima kasih telah berbelanja di FreshLokal</p>
    </div>
</section>

<!-- Order Success Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <!-- Order Summary -->
                    <div class="card mb-4 border-0 bg-light-green">
                        <div class="card-body">
                            <h5 class="card-title text-success mb-4">
                                <i class="fas fa-receipt me-2"></i> Ringkasan Pesanan
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="d-flex align-items-center mb-3">
                                        @if($order->product->image)
                                            <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                                                <i class="fas fa-image fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-1">{{ $order->product->name }}</h6>
                                            <small class="text-muted">{{ $order->product->category }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="mb-1"><strong>Jumlah:</strong></p>
                                            <p class="text-muted">{{ $order->quantity }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1"><strong>Total:</strong></p>
                                            <p class="text-success fw-bold">{{ $order->formatted_total_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 bg-light-green h-100">
                                <div class="card-body">
                                    <h5 class="card-title text-success mb-4">
                                        <i class="fas fa-info-circle me-2"></i> Detail Pesanan
                                    </h5>
                                    <p class="mb-2"><strong>Nomor Pesanan:</strong></p>
                                    <p class="text-muted mb-3">#{{ $order->id }}</p>
                                    
                                    <p class="mb-2"><strong>Status:</strong></p>
                                    <p class="mb-3">
                                        <span class="badge rounded-pill 
                                            @if($order->status === 'pending') bg-warning text-dark
                                            @elseif($order->status === 'paid') bg-info
                                            @elseif($order->status === 'shipped') bg-primary
                                            @elseif($order->status === 'completed') bg-success
                                            @elseif($order->status === 'cancelled') bg-danger
                                            @else bg-secondary
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </p>
                                    
                                    <p class="mb-2"><strong>Tanggal Pesanan:</strong></p>
                                    <p class="text-muted">{{ $order->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 bg-light-green h-100">
                                <div class="card-body">
                                    <h5 class="card-title text-success mb-4">
                                        <i class="fas fa-truck me-2"></i> Informasi Pengiriman
                                    </h5>
                                    <p class="mb-2"><strong>Alamat:</strong></p>
                                    <p class="text-muted mb-3">{{ $order->shipping_address }}</p>
                                    
                                    <p class="mb-2"><strong>Nomor Telepon:</strong></p>
                                    <p class="text-muted mb-3">{{ $order->phone_number }}</p>
                                    
                                    @if($order->notes)
                                    <p class="mb-2"><strong>Catatan:</strong></p>
                                    <p class="text-muted">{{ $order->notes }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    <div class="card border-0 bg-light-green mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-success mb-4">
                                <i class="fas fa-credit-card me-2"></i> Informasi Pembayaran
                            </h5>
                            <p class="mb-2"><strong>Nomor Rekening:</strong></p>
                            <p class="text-muted mb-3">{{ $order->no_rekening }}</p>
                            
                            <div class="alert alert-info border-0 bg-white mt-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-info-circle fa-2x me-3 text-primary"></i>
                                    <div>
                                        <h6 class="mb-1 fw-bold">Pembayaran</h6>
                                        <p class="mb-0">Silakan transfer ke rekening BCA 1234567890 a.n. FreshLokal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-store me-2"></i> Kembali ke Marketplace
                        </a>
                        <a href="{{ route('orders.history') }}" class="btn btn-outline-success btn-lg">
                            <i class="fas fa-history me-2"></i> Lihat Riwayat Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection