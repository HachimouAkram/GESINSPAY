<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Institut de formation professionnelle offrant des certifications reconnues dans divers domaines d'activité">
    <meta name="keywords" content="formation, certification, éducation, apprentissage, métiers, diplôme">
    <meta name="author" content="Groupe ISI">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="{{ config('app.name') }} - Institut de Formation Professionnelle">
    <meta property="og:description" content="Formez-vous aux métiers de demain avec nos programmes certifiants">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title" content="{{ config('app.name') }} - Institut de Formation Professionnelle">
    <meta property="twitter:description" content="Formez-vous aux métiers de demain avec nos programmes certifiants">
    <meta property="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    <title>{{ config('app.name') }} - Institut de Formation Professionnelle</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="{{ asset('css/main.css') }}" as="style">

    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }

        body {
            padding-top: 80px;   /* espace pour la navbar fixe */
            padding-bottom: 70px; /* espace pour le footer fixe */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 0.8rem 0;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            background-color: rgba(13, 110, 253, 0.95) !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            vertical-align: middle;
        }

        footer.fixed-bottom {
            height: 70px;
            line-height: 70px;
            background-color: var(--dark-color);
            color: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Barre de navigation améliorée -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>
                <span class="d-none d-sm-inline">Groupe ISI</span>
                <span class="d-inline d-sm-none">ISI</span>
            </a>

            <!-- Menu pour mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('formations') }}">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-light me-2">
                        <i class="fas fa-sign-in-alt me-1"></i> Connexion
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">
                        <i class="fas fa-user-plus me-1"></i> Inscription
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Pied de page fixe -->
    <footer class="bg-dark text-white fixed-bottom text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} Groupe ISI. Tous droits réservés.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-links">
                        <a href="#" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white mx-2"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('privacy') }}" class="text-white me-3">Confidentialité</a>
                    <a href="{{ route('terms') }}" class="text-white">Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Effet de réduction de la navbar au scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
