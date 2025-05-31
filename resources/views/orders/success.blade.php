<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesanan Berhasil - FreshLokal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f7f9fc;
    }
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .card {
      border-radius: 15px;
    }
    .card-body {
      padding: 40px;
    }
    .btn-primary {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      border: none;
      border-radius: 50px;
      padding: 12px 30px;
      font-weight: bold;
      transition: background 0.4s ease;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
    }
    .icon-circle {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      color: #fff;
      width: 100px;
      height: 100px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 3rem;
      margin: 0 auto 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      animation: bounce 1s infinite alternate;
    }
    @keyframes bounce {
      from { transform: translateY(0px); }
      to { transform: translateY(-10px); }
    }
    .section-title {
      color: #2575fc;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .text-muted {
      color: #6c757d !important;
    }
    footer {
      margin-top: 60px;
      text-align: center;
      padding: 20px 0;
      color: #aaa;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
        <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="Logo" class="me-2" style="width: 35px;">
        <span class="fw-bold fs-4 text-primary">FreshLokal</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link fw-bold" href="{{ route('dashboard') }}">
              <i class="fas fa-store me-1"></i> Marketplace
            </a>
          </li>
        </ul>
        <div class="dropdown ms-4">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit me-1"></i> Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-1"></i> Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body text-center">

            <div class="icon-circle mb-4">
              <i class="fas fa-check"></i>
            </div>

            <h2 class="mb-3 fw-bold">Pesanan Berhasil Dibuat!</h2>
            <p class="text-muted mb-4">Terima kasih telah berbelanja di FreshLokal</p>

            <!-- Detail Pesanan -->
            <div class="card border-0 bg-light mb-4">
              <div class="card-body text-start">
                <h5 class="section-title">Detail Pesanan</h5>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <p class="mb-1 fw-bold">Nomor Pesanan:</p>
                    <p class="text-muted">#{{ $order->id }}</p>

                    <p class="mb-1 fw-bold">Status:</p>
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

                    <p class="mb-1 fw-bold">Tanggal Pesanan:</p>
                    <p class="text-muted">{{ $order->created_at->format('d M Y H:i') }}</p>
                  </div>
                  <div class="col-md-6">
                    <p class="mb-1 fw-bold">Produk:</p>
                    <p class="text-muted">{{ $order->product->name }}</p>

                    <p class="mb-1 fw-bold">Jumlah:</p>
                    <p class="text-muted">{{ $order->quantity }} item</p>

                    <p class="mb-1 fw-bold">Total Pembayaran:</p>
                    <p class="text-primary fw-bold">{{ $order->formatted_total_price }}</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Informasi Pembayaran -->
            <div class="card border-0 bg-light mb-4">
              <div class="card-body text-start">
                <h5 class="section-title">Informasi Pembayaran</h5>
                <p class="mb-1 fw-bold">Nomor Rekening:</p>
                <p class="text-muted">{{ $order->no_rekening }}</p>
              </div>
            </div>

            <!-- Informasi Pengiriman -->
            <div class="card border-0 bg-light mb-4">
              <div class="card-body text-start">
                <h5 class="section-title">Informasi Pengiriman</h5>
                <p class="mb-1 fw-bold">Alamat Pengiriman:</p>
                <p class="text-muted">{{ $order->shipping_address }}</p>

                <p class="mb-1 fw-bold">Nomor Telepon:</p>
                <p class="text-muted">{{ $order->phone_number }}</p>

                @if($order->notes)
                <p class="mb-1 fw-bold">Catatan:</p>
                <p class="text-muted">{{ $order->notes }}</p>
                @endif
              </div>
            </div>

            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
              <i class="fas fa-store me-1"></i> Kembali ke Marketplace
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 FreshLokal. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
