<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreshLokal - Edit Profil</title>

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
            padding-top: 80px;
        }

        .profile-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(45, 134, 89, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .profile-header {
            background: var(--gradient-green);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .profile-header h2 {
            font-weight: 700;
            margin-bottom: 0;
        }

        .profile-body {
            padding: 30px;
        }

        .section-title {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-text);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid rgba(45, 134, 89, 0.1);
        }

        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(45, 134, 89, 0.25);
        }

        .btn-primary {
            background: var(--gradient-green);
            border: none;
            padding: 12px 30px;
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

        .btn-danger {
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 500;
        }

        .alert-success {
            background: var(--light-green);
            border: 1px solid var(--secondary-green);
            color: var(--accent-green);
            border-radius: 15px;
        }

        .text-success {
            color: var(--primary-green) !important;
        }

        /* Footer Styles */
        .main-footer {
            position: relative;
            z-index: 10;
        }

        .footer-content {
            padding: 3rem 0 2rem;
        }

        .footer-section h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .footer-section h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 30px;
            height: 3px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 2px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 300;
        }

        .footer-section ul li a:hover {
            color: white;
            transform: translateX(5px);
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .text-white-50 {
            color: rgba(255, 255, 255, 0.8) !important;
        }
    
    </style>
</head>
<body>
    @include('profile.partials.navbar')

    <!-- Profile Content -->
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <h2><i class="fas fa-user-circle me-2"></i>Edit Profil</h2>
            </div>
            
            <div class="profile-body">
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success alert-dismissible fade show mb-4">
                        <i class="fas fa-check-circle me-2"></i> Profil berhasil diperbarui!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('status') === 'password-updated')
                    <div class="alert alert-success alert-dismissible fade show mb-4">
                        <i class="fas fa-check-circle me-2"></i> Password berhasil diperbarui!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-5">
                            <h4 class="section-title">
                                <i class="fas fa-user-edit"></i> Informasi Profil
                            </h4>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="mb-5">
                            <h4 class="section-title">
                                <i class="fas fa-lock"></i> Update Password
                            </h4>
                            @include('profile.partials.update-password-form')
                        </div>
                        
                        <div>
                            <h4 class="section-title text-danger">
                                <i class="fas fa-trash-alt"></i> Hapus Akun
                            </h4>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('profile.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Animasi untuk form
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach((form, index) => {
                form.style.opacity = '0';
                form.style.transform = 'translateY(20px)';
                form.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    form.style.opacity = '1';
                    form.style.transform = 'translateY(0)';
                }, 200 + (index * 100));
            });
        });
    </script>
</body>
</html>