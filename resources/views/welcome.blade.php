<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>FreshLokal - Login</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

            .login-container {
                max-width: 500px;
                margin: 0 auto;
            }

            .login-card {
                border: none;
                border-radius: 20px;
                box-shadow: 0 15px 40px rgba(45, 134, 89, 0.15);
                overflow: hidden;
                transition: all 0.4s ease;
            }

            .login-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 50px rgba(45, 134, 89, 0.25);
            }

            .login-header {
                background: var(--gradient-green);
                color: white;
                padding: 2rem;
                text-align: center;
            }

            .login-header img {
                width: 80px;
                margin-bottom: 1rem;
                filter: drop-shadow(0 2px 5px rgba(0,0,0,0.1));
            }

            .login-body {
                padding: 2.5rem;
                background: white;
            }

            .form-control {
                border-radius: 12px;
                padding: 12px 15px;
                border: 2px solid rgba(45, 134, 89, 0.1);
            }

            .form-control:focus {
                border-color: var(--primary-green);
                box-shadow: 0 0 0 0.2rem rgba(45, 134, 89, 0.25);
            }

            .input-group-text {
                background: transparent;
                border-right: none;
            }

            .btn-primary {
                background: var(--gradient-green);
                border: none;
                padding: 12px;
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

            .btn-google {
                background: white;
                color: #4285F4;
                border: 1px solid #ddd;
                border-radius: 50px;
                padding: 10px;
                font-weight: 500;
                transition: all 0.3s ease;
                width: 100%;
            }

            .btn-google:hover {
                background: #f8f9fa;
                transform: translateY(-2px);
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }

            .divider {
                display: flex;
                align-items: center;
                margin: 1.5rem 0;
            }

            .divider::before, .divider::after {
                content: "";
                flex: 1;
                border-bottom: 1px solid rgba(45, 134, 89, 0.1);
            }

            .divider-text {
                padding: 0 1rem;
                color: var(--muted-text);
                font-size: 0.9rem;
            }

            .alert-success {
                background: var(--light-green);
                border: 1px solid var(--secondary-green);
                color: var(--accent-green);
                border-radius: 15px;
            }

            .alert-danger {
                border-radius: 15px;
            }

            .text-accent {
                color: var(--primary-green);
            }

            .link-accent {
                color: var(--primary-green);
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .link-accent:hover {
                color: var(--accent-green);
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100 d-flex align-items-center">
            <div class="container">
                <div class="login-container">
                    <div class="login-card">
                        <div class="login-header">
                            <img src="https://cdn-icons-png.flaticon.com/512/2553/2553691.png" alt="FreshLokal Logo">
                            <h3 class="fw-bold mb-0">FreshLokal</h3>
                            <p class="mb-0 opacity-75">Marketplace Produk Lokal</p>
                        </div>
                        
                        <div class="login-body">
                            <!-- Session Status -->
                            @if (session('status'))
                                <div class="alert alert-success mb-4" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                                </div>
                            @endif

                            <!-- Validation Errors -->
                            @if ($errors->any()))
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            

                            <!-- Email Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               placeholder="email@contoh.com" 
                                               required 
                                               autofocus>
                                    </div>
                                    @error('email'))
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               placeholder="••••••••" 
                                               required>
                                    </div>
                                    @error('password'))
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Ingat saya</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="link-accent">Lupa password?</a>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                </button>
                            </form>

                            <!-- Google Login Button -->


                            <div class="divider">
                                <span class="divider-text">atau masuk dengan email</span>
                            </div>


                            <div class="text-center mb-4">
                                <a href="{{ url('/auth/google') }}" class="btn btn-google">
                                    <img src="https://img.lovepik.com/png/20231120/google-internet-icon-vector-Google-system-engineer_642910_wh1200.png" alt="Google Logo" width="20" class="me-2">
                                    Masuk dengan Google
                                </a>
                            </div>

                            <div class="text-center mt-4">
                                <p class="mb-0">Belum punya akun? 
                                    <a href="{{ route('register') }}" class="link-accent">Daftar sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

                            

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>