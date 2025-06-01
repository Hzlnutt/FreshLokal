<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FreshLokal - Daftar</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-sm-5">
                            <!-- Logo dan Header -->
                            <div class="text-center mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="Logo" class="img-fluid mb-4" style="width: 80px;">
                                <h4 class="fw-bold">Daftar di FreshLokal</h4>
                                <p class="text-muted">Buat akun baru Anda</p>
                            </div>

                            <!-- Form Register -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Nama -->
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0 ps-0" name="name" placeholder="Nama Lengkap" required autofocus>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="email" class="form-control border-start-0 ps-0" name="email" placeholder="Alamat Email" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Password -->
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control border-start-0 ps-0" name="password" placeholder="Password" required>
                                    </div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control border-start-0 ps-0" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100 py-2 mb-4 fw-semibold">Daftar Sekarang</button>
                                
                                <div class="position-relative mb-4">
                                    <hr class="text-muted">
                                    <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                                        <span class="text-muted">atau daftar dengan</span>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-center gap-2 mb-4">
                                    <a href="http://localhost:8000/auth/google" class="btn btn-outline-secondary rounded-circle p-2">
                                        <i class="fab fa-google"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary rounded-circle p-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary rounded-circle p-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                
                                <div class="text-center">
                                    <p class="mb-0">Sudah punya akun? 
                                        <a href="{{ route('login') }}" class="text-decoration-none">Masuk sekarang</a>
                                    </p>
                                </div>
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
