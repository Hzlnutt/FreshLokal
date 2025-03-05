<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FreshLokal - Login</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: #f0f2f5;
            }
            .login-container {
                max-width: 400px;
                margin: 100px auto;
                padding: 20px;
            }
            .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .card-header {
                background: #ffffff;
                border-bottom: none;
                padding: 25px;
                text-align: center;
            }
            .logo {
                width: 80px;
                height: 80px;
                object-fit: cover;
                margin-bottom: 15px;
            }
            .form-control {
                padding: 12px;
                border-radius: 8px;
                border: 1px solid #e1e1e1;
                font-size: 14px;
            }
            .form-control:focus {
                border-color: #80bdff;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }
            .input-group-text {
                background: transparent;
                border-right: none;
                padding-right: 0;
            }
            .input-group .form-control {
                border-left: none;
            }
            .btn-login {
                padding: 12px;
                font-weight: 600;
                font-size: 16px;
                background: #0d6efd;
                border: none;
            }
            .btn-login:hover {
                background: #0b5ed7;
            }
            .divider {
                display: flex;
                align-items: center;
                text-align: center;
                margin: 20px 0;
            }
            .divider::before, .divider::after {
                content: '';
                flex: 1;
                border-bottom: 1px solid #e1e1e1;
            }
            .divider span {
                padding: 0 10px;
                color: #6c757d;
                font-size: 14px;
            }
            .social-buttons .btn {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                padding: 0;
                line-height: 40px;
                margin: 0 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                <div class="card">
                    <div class="card-header">
                        <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="Logo" class="logo">
                        <h4 class="mb-0">Selamat Datang di FreshLokal</h4>
                        <p class="text-muted">Silakan masuk ke akun Anda</p>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Ingat saya</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa password?</a>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-login w-100">Masuk</button>
                            
                            <div class="divider">
                                <span>atau masuk dengan</span>
                            </div>
                            
                            <div class="social-buttons text-center">
                                <a href="#" class="btn btn-light"><i class="fab fa-google"></i></a>
                                <a href="#" class="btn btn-light"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="btn btn-light"><i class="fab fa-twitter"></i></a>
                            </div>
                            
                            <div class="text-center mt-4">
                                <p class="mb-0">Belum punya akun? 
                                    <a href="{{ route('register') }}" class="text-decoration-none">Daftar sekarang</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>


sek ono sing salah oke
lek tailwind emange gak lansung a sya koyok bootstrap