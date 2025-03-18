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
          <a href="index.html" class="nav-link active">Accueil</a>
          <a href="interviews.html" class="nav-link">Interviews</a>
          <a href="podcasts.html" class="nav-link">Podcasts</a>
          <a href="musique.html" class="nav-link">Musique</a>
          <a href="formations.html" class="nav-link">Formations</a>
        </nav>
        <div class="d-flex align-items-center gap-3">
            <button class="theme-toggle" aria-label="Toggle dark mode">
                <i class="bi bi-sun-fill sun-icon"></i>
                <i class="bi bi-moon-fill moon-icon d-none"></i>
            </button>
          <a href="login.html" class="btn btn-outline-primary d-none d-md-inline-flex">Se connecter</a>
          <a href="login.html?tab=register" class="btn btn-primary">S'abonner</a>
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
        <a href="index.html" class="mobile-nav-link active">Accueil</a>
        <a href="interviews.html" class="mobile-nav-link">Interviews</a>
        <a href="podcasts.html" class="mobile-nav-link">Podcasts</a>
        <a href="musique.html" class="mobile-nav-link">Musique</a>
        <a href="formations.html" class="mobile-nav-link">Formations</a>
      </nav>
      <div class="d-flex flex-column gap-2 mt-auto">
        <button class="theme-toggle" aria-label="Toggle dark mode">
            <i class="bi bi-sun-fill sun-icon"></i>
            <i class="bi bi-moon-fill moon-icon d-none"></i>
        </button>
        <a href="login.html" class="btn btn-outline-primary w-100">Se connecter</a>
        <a href="login.html?tab=register" class="btn btn-primary w-100">S'abonner</a>
      </div>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="py-5 py-md-7 bg-gradient">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-md-6">
          <h1 class="display-5 fw-bold mb-3">Mr. Lanimation – Là où le divertissement et le savoir se rencontrent !</h1>
          <p class="fs-5 mb-4 text-muted">La voix de la jeunesse africaine en vidéo et en musique !</p>
          <div class="d-flex flex-column flex-sm-row gap-3">
            <a href="#features" class="btn btn-primary btn-lg">
              Découvrir maintenant
              <i class="bi bi-chevron-right ms-1"></i>
            </a>
            <a href="about.html" class="btn btn-outline-primary btn-lg">En savoir plus</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="hero-image rounded-4 overflow-hidden">
            <img src="https://placehold.co/600x400" alt="Mr. Lanimation" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-5" id="features">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-6 fw-bold mb-3">Interviews, podcasts, musique et formations – tout ce qu'il te faut au même endroit !</h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">Le carrefour des artistes, penseurs et créateurs africains !</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <a href="interviews.html" class="feature-card">
            <div class="text-primary mb-3">
              <i class="bi bi-camera-video fs-1"></i>
            </div>
            <h3 class="fs-4 fw-semibold mb-2">Interviews</h3>
            <p class="text-muted">Découvre des conversations inspirantes avec les talents africains.</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="podcasts.html" class="feature-card">
            <div class="text-primary mb-3">
              <i class="bi bi-headphones fs-1"></i>
            </div>
            <h3 class="fs-4 fw-semibold mb-2">Podcasts</h3>
            <p class="text-muted">Écoute des discussions enrichissantes sur la culture et l'actualité.</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="musique.html" class="feature-card">
            <div class="text-primary mb-3">
              <i class="bi bi-music-note-beamed fs-1"></i>
            </div>
            <h3 class="fs-4 fw-semibold mb-2">Musique</h3>
            <p class="text-muted">Explore les sons locaux et les artistes émergents d'Afrique.</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="formations.html" class="feature-card">
            <div class="text-primary mb-3">
              <i class="bi bi-book fs-1"></i>
            </div>
            <h3 class="fs-4 fw-semibold mb-2">Formations</h3>
            <p class="text-muted">Développe tes compétences avec nos vidéos de formation inédites.</p>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="display-6 fw-bold mb-3">Ton abonnement, ta porte d'entrée vers l'excellence culturelle et éducative !</h2>
      <p class="mb-4 mx-auto" style="max-width: 700px;">Rejoins la communauté de Mr. Lanimation et explore des interviews inspirantes, du son local et des vidéos de formation inédites !</p>
      <a href="login.html?tab=register" class="btn btn-light btn-lg">
        S'abonner maintenant
        <i class="bi bi-chevron-right ms-1"></i>
      </a>
    </div>
  </section>

  <!-- Community Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-6 fw-bold mb-3">Rejoins notre communauté</h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">Connecte-toi avec d'autres passionnés de culture africaine</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
          <div class="card shadow-sm p-4">
            <div class="d-flex align-items-center gap-2 mb-4">
              <i class="bi bi-people fs-4 text-primary"></i>
              <h3 class="fs-4 fw-semibold mb-0">Deviens membre</h3>
            </div>
            <form class="d-flex flex-column gap-3">
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" placeholder="Ton email">
              </div>
              <button type="submit" class="btn btn-primary">Rejoindre la communauté</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

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
            <li class="nav-item"><a href="interviews.html" class="nav-link text-muted p-0 mb-2">Interviews</a></li>
            <li class="nav-item"><a href="podcasts.html" class="nav-link text-muted p-0 mb-2">Podcasts</a></li>
            <li class="nav-item"><a href="musique.html" class="nav-link text-muted p-0 mb-2">Musique</a></li>
            <li class="nav-item"><a href="formations.html" class="nav-link text-muted p-0 mb-2">Formations</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-3">
          <h5 class="fw-bold mb-3">Liens utiles</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="about.html" class="nav-link text-muted p-0 mb-2">À propos</a></li>
            <li class="nav-item"><a href="contact.html" class="nav-link text-muted p-0 mb-2">Contact</a></li>
            <li class="nav-item"><a href="faq.html" class="nav-link text-muted p-0 mb-2">FAQ</a></li>
            <li class="nav-item"><a href="terms.html" class="nav-link text-muted p-0 mb-2">Conditions d'utilisation</a></li>
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
      <div class="border-top border-secondary mt-4 pt-4 text-center text-muted small">
        <p>© <script>document.write(new Date().getFullYear())</script> Mr. Lanimation. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('visiteur/js/dark-mode.js') }}" defer></script>
</body>
</html>

