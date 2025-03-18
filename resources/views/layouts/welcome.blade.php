<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mr. Lanimation - Divertissement et Savoir Africain</title>
  <meta name="description" content="Divertis-toi, éduque-toi et connecte-toi avec les esprits créatifs d'Afrique francophone sur Mr. Lanimation !">
  <meta name="keywords" content="podcasts, interviews, musique africaine, formations, culture africaine">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('visiteur/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('visiteur/css/dark-mode.css') }}">
</head>
<body>
  <!-- Header -->
  <header class="border-bottom">
    <div class="container py-3">
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
          <div class="logo-circle">
            <span>ML</span>
          </div>
          <span class="fs-4 fw-bold">Mr. Lanimation</span>
        </div>
        <nav class="d-none d-md-flex align-items-center gap-4">
          <a href="/" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
          <a href="{{ route('interview') }}" class="nav-link {{ request()->routeIs('interview') ? 'active' : '' }}">Interviews</a>
          <a href="{{ route('podcast') }}" class="nav-link {{ request()->routeIs('podcast') ? 'active' : '' }}">Podcasts</a>
          <a href="{{ route('musique') }}" class="nav-link {{ request()->routeIs('musique') ? 'active' : '' }}">Musique</a>
          <a href="{{ route('formation') }}" class="nav-link {{ request()->routeIs('formation') ? 'active' : '' }}">Formations</a>

        </nav>
        <div class="d-flex align-items-center gap-3">
            <button class="theme-toggle" aria-label="Toggle dark mode">
                <i class="bi bi-sun-fill sun-icon"></i>
                <i class="bi bi-moon-fill moon-icon d-none"></i>
            </button>
          <a href="{{ route('visiteur.login') }}" class="btn btn-outline-primary d-none d-md-inline-flex">Se connecter</a>
          <a href="{{ route('visiteur.login') }}?tab=register" class="btn btn-primary">S'abonner</a>
          <button class="btn btn-link d-md-none p-0 text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
            <i class="bi bi-list fs-4"></i>
          </button>

        </div>
      </div>
    </div>

  </header>

  <!-- Mobile Menu Offcanvas -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
      <div class="d-flex align-items-center gap-2">
        <div class="logo-circle">
          <span>ML</span>
        </div>
        <span class="fs-4 fw-bold">Mr. Lanimation</span>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <nav class="d-flex flex-column gap-3 mb-4">
        <a href="/" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
        <a href="{{ route('interview') }}" class="mobile-nav-link {{ request()->routeIs('interview') ? 'active' : '' }}">Interviews</a>
        <a href="{{ route('podcast') }}" class="mobile-nav-link {{ request()->routeIs('podcast') ? 'active' : '' }}">Podcasts</a>
        <a href="{{ route('musique') }}" class="mobile-nav-link {{ request()->routeIs('musique') ? 'active' : '' }}">Musique</a>
        <a href="{{ route('formation') }}" class="mobile-nav-link {{ request()->routeIs('formation') ? 'active' : '' }}">Formations</a>
      </nav>
      <div class="d-flex flex-column gap-2 mt-auto">
        <button class="theme-toggle" aria-label="Toggle dark mode">
            <i class="bi bi-sun-fill sun-icon"></i>
            <i class="bi bi-moon-fill moon-icon d-none"></i>
        </button>
        <a href="{{ route('visiteur.login') }}" class="btn btn-outline-primary w-100">Se connecter</a>
        <a href="{{ route('visiteur.login') }}?tab=register" class="btn btn-primary w-100">S'abonner</a>
      </div>
    </div>
  </div>

  @yield('content')

  <!-- Footer -->
  <footer class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-3">
          <div class="d-flex align-items-center gap-2 mb-3">
            <div class="logo-circle-sm">
              <span>ML</span>
            </div>
            <span class="fs-5 fw-bold">Mr. Lanimation</span>
          </div>
          <p class="text-muted small">Divertis-toi, éduque-toi et connecte-toi avec les esprits créatifs d'Afrique francophone sur Mr. Lanimation !</p>
        </div>
        <div class="col-6 col-lg-3">
          <h5 class="fw-bold mb-3">Contenu</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('interview') }}" class="nav-link text-white p-0 mb-2">Interviews</a></li>
            <li class="nav-item"><a href="{{ route('podcast') }}" class="nav-link text-white p-0 mb-2">Podcasts</a></li>
            <li class="nav-item"><a href="{{ route('musique') }}" class="nav-link text-white p-0 mb-2">Musique</a></li>
            <li class="nav-item"><a href="{{ route('formation') }}" class="nav-link text-white p-0 mb-2">Formations</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-3">
          <h5 class="fw-bold mb-3">Liens utiles</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-white p-0 mb-2">À propos</a></li>
            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-white p-0 mb-2">Contact</a></li>
            <li class="nav-item"><a href="{{ route('faq') }}" class="nav-link text-white p-0 mb-2">FAQ</a></li>
            <li class="nav-item"><a href="{{ route('term') }}" class="nav-link text-white p-0 mb-2">Conditions d'utilisation</a></li>
          </ul>
        </div>
        <div class="col-lg-3">
          <h5 class="fw-bold mb-3">Suivez-nous</h5>
          <div class="d-flex gap-2">
            <a href="#" class="social-icon">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-instagram"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-twitter-x"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-youtube"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="border-top border-secondary mt-4 pt-4 text-center text-white small">
        <p>© <script>document.write(new Date().getFullYear())</script> Mr. Lanimation. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('visiteur/js/dark-mode.js') }}" defer></script>
</body>
</html>

