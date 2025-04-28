<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Manajemen Pesanan - FreshLokal Admin</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

        <style>
            body {
                background-color: #1a1a1a;
                color: #ffffff;
                font-family: 'Poppins', sans-serif;
            }
            .navbar {
                background-color: #2d2d2d !important;
            }
            .card {
                background-color: #2d2d2d;
                border: none;
            }
            .text-muted {
                color: #b3b3b3 !important;
            }
            .table {
                color: #ffffff;
            }
            .table td, .table th {
                border-color: #404040;
            }
            .dropdown-menu {
                background-color: #2d2d2d;
                border-color: #404040;
            }
            .dropdown-item {
                color: #ffffff;
            }
            .dropdown-item:hover {
                background-color: #404040;
                color: #ffffff;
            }
            .dropdown-divider {
                border-color: #404040;
            }
            .btn-dark {
                background-color: #404040;
                border-color: #404040;
            }
            .btn-dark:hover {
                background-color: #505050;
                border-color: #505050;
            }
            .modal-content {
                background-color: #2d2d2d;
                border-color: #404040;
            }
            .modal-header {
                border-bottom-color: #404040;
            }
            .modal-footer {
                border-top-color: #404040;
            }
            .form-control, .form-select {
                background-color: #404040;
                border-color: #505050;
                color: #ffffff;
            }
            .form-control:focus, .form-select:focus {
                background-color: #505050;
                border-color: #606060;
                color: #ffffff;
                box-shadow: none;
            }
            .form-control::placeholder {
                color: #b3b3b3;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="Logo" class="me-2" style="width: 30px;">
                    <span class="fw-bold">FreshLokal Admin</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-chart-line me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}" href="{{ route('admin.products') }}">
                                <i class="fas fa-box me-1"></i> Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.orders') ? 'active' : '' }}" href="{{ route('admin.orders') }}">
                                <i class="fas fa-shopping-cart me-1"></i> Pesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}" href="{{ route('admin.users') }}">
                                <i class="fas fa-users me-1"></i> Pengguna
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-shield me-1"></i> {{ Auth::user()->name }}
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
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Orders Table -->
            <div class="card">
                <div class="card-header bg-transparent border-bottom border-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-shopping-cart me-2"></i> Daftar Pesanan
                        </h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pelanggan</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $order->status === 'completed' ? 'success' : 
                                            ($order->status === 'pending' ? 'warning' : 
                                            ($order->status === 'shipped' ? 'info' : 'primary'))
                                        }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateStatusModal{{ $order->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Update Status Modal -->
                                <div class="modal fade" id="updateStatusModal{{ $order->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Status Pesanan #{{ $order->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select" name="status" required>
                                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <i class="fas fa-shopping-cart me-2"></i> Tidak ada pesanan ditemukan
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($orders->hasPages())
                <div class="card-footer bg-transparent border-top border-dark">
                    <div class="d-flex justify-content-end">
                        {{ $orders->links() }}
                    </div>
                </div>
                @endif anu sya iso ditambahno sistem pembayaran ndek admin e a dadi status e gak pending terus , soale ndek admin gaiso koyok accept order status e ke pending kabeh.  lah iyo a/. isok accept ngunu? yaopo cikk. ono sing awakmu update a, gaono blas. cak 100% made in china for real ma.de  made by. iki repo e paling baru tekan aku? iyo gorong tak pull blas delok en dewe gorong tak pull
            </div>
        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> 