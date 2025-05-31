<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Profile - FreshLokal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Particles.js -->
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #1a1a2e;
      color: white;
      min-height: 100vh;
      position: relative;
      overflow-x: hidden;
    }

    #particles-js {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: -1;
      top: 0; left: 0;
      background: #1a1a2e;
    }

    /* Card animation */
    .card {
      border-radius: 1rem;
      opacity: 0;
      transform: translateY(30px);
      animation: slideFadeIn 0.7s forwards;
      box-shadow: 0 4px 15px rgb(0 0 0 / 0.4);
      position: relative;
      padding-top: 3rem; /* space for icon */
    }

    .card:nth-child(1) { animation-delay: 0.2s; }
    .card:nth-child(2) { animation-delay: 0.4s; }
    .card:nth-child(3) { animation-delay: 0.6s; }

    @keyframes slideFadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Icon top-left in card */
    .card-icon {
      position: absolute;
      top: 1rem;
      left: 1.5rem;
      font-size: 1.8rem;
      color: #00aaff;
    }

    /* Header */
    h4 i {
      color: #00aaff;
    }

    h4 {
      font-weight: 600;
    }

    .text-muted {
      color: rgba(255, 255, 255, 0.85);
      margin-top: -0.25rem;
      font-weight: 500;
      text-shadow: none;
    }

    /* Save Button */
    .btn-save {
      background-color: #00aaff;
      border: none;
      font-weight: 600;
      color: white;
      width: 100%;
      padding: 0.65rem;
      border-radius: 0.6rem;
      font-size: 1.1rem;
      transition: background-color 0.3s ease;
      margin-top: 1.5rem;
      display: inline-block;
    }

    .btn-save:hover {
      background-color: #0088cc;
      color: white;
    }

    .container {
      position: relative;
      z-index: 1;
    }

    /* Form groups spacing */
    .form-group {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div id="particles-js"></div>

  @include('layouts.navigation')

  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h4 class="mb-1">
          <i class="fas fa-user-edit me-2"></i> Edit Profile
        </h4>
        <p class="text-muted mb-0">Perbarui informasi profil Anda dengan mudah dan cepat.</p>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">

        <!-- Update Profile Info Card -->
        <div class="card bg-white text-dark mb-4 shadow-sm">
          <i class="fas fa-id-badge card-icon"></i>
          <div class="card-body rounded-4">
            @include('profile.partials.update-profile-information-form')
            <!-- Contoh tombol save (jika perlu custom tombol) -->
            <button type="submit" class="btn-save">Save Profile</button>
          </div>
        </div>

        <!-- Update Password Card -->
        <div class="card bg-white text-dark mb-4 shadow-sm">
          <i class="fas fa-key card-icon"></i>
          <div class="card-body rounded-4">
            @include('profile.partials.update-password-form')
            <button type="submit" class="btn-save">Save Password</button>
          </div>
        </div>

        <!-- Delete User Card -->
        <div class="card bg-white text-dark shadow-sm">
          <i class="fas fa-user-slash card-icon"></i>
          <div class="card-body rounded-4">
            @include('profile.partials.delete-user-form')
            <button type="submit" class="btn-save btn-danger">Delete Account</button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Particles.js config -->
  <script>
    particlesJS("particles-js", {
      particles: {
        number: { value: 60, density: { enable: true, value_area: 800 } },
        color: { value: "#00aaff" },
        shape: { type: "circle" },
        opacity: { value: 0.3, random: true },
        size: { value: 3, random: true },
        line_linked: {
          enable: true,
          distance: 130,
          color: "#00aaff",
          opacity: 0.15,
          width: 1
        },
        move: {
          enable: true,
          speed: 1.5,
          out_mode: "out",
          random: false,
          straight: false
        }
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: { enable: true, mode: "grab" },
          onclick: { enable: true, mode: "push" }
        },
        modes: {
          grab: { distance: 200, line_linked: { opacity: 0.25 } },
          push: { particles_nb: 4 }
        }
      },
      retina_detect: true
    });
  </script>
</body>
</html>
