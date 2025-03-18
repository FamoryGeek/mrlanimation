@extends('layouts.welcome')
@section('content')
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
            <img src="{{ asset('visiteur/img/image3.jpg') }}" alt="Mr. Lanimation" class="img-fluid">
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
            <form class="d-flex flex-column gap-3" method="POST" action="{{ route('newsletter.subscribe') }}">
                @csrf
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" placeholder="Ton email"  name="email">
              </div>
              <button type="submit" class="btn btn-primary">Rejoindre la communauté</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
