<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ request()->query('tab') === 'register' ? 'Inscription' : 'Connexion' }}
        - Mr. Lanimation</title>
    <meta name="description" content="Connectez-vous à votre compte Mr. Lanimation ou créez un nouveau compte.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('visiteur/css/style.css') }}">
</head>

<body class="auth-container">
    <div class="container py-5">
        <div class="text-center mb-4">
            <a href="/" class="d-inline-flex align-items-center gap-2 text-decoration-none">
                <div class="logo-circle">
                    <span>ML</span>
                </div>
                <span class="fs-4 fw-bold text-dark">Mr. Lanimation</span>
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card auth-card shadow">
                    <div class="card-body p-4 p-md-5">
                        <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link active w-100" id="login-tab" data-bs-toggle="tab"
                                    data-bs-target="#login" type="button" role="tab">Connexion</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link w-100" id="register-tab" data-bs-toggle="tab"
                                    data-bs-target="#register" type="button" role="tab">Inscription</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="authTabsContent">
                            <!-- Login Tab -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <h2 class="fs-4 fw-bold mb-3">Connexion</h2>
                                <p class="text-muted mb-4">Connectez-vous à votre compte Mr. Lanimation</p>

                                <form method="POST" action="{{ route('visiteur.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="votre@email.com" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label for="password" class="form-label mb-0">Mot de passe</label>
                                            <a href="#" class="text-primary small">Mot de passe oublié?</a>
                                        </div>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="••••••••" required>
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePassword">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="mb-4 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-2">Se connecter</button>
                                </form>

                                <div class="auth-divider my-4">
                                    <span>Ou continuer avec</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-6">
                                        <button class="btn btn-outline-secondary w-100">
                                            <i class="bi bi-facebook me-2"></i> Facebook
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-secondary w-100">
                                            <i class="bi bi-google me-2"></i> Google
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Register Tab -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <h2 class="fs-4 fw-bold mb-3">Créer un compte</h2>
                                <p class="text-muted mb-4">Rejoignez la communauté Mr. Lanimation</p>

                                <form method="POST" action="{{ route('visiteur.register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="register-name" class="form-label">Nom complet</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="register-name"
                                            placeholder="Votre nom" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="register-email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="register-email"
                                            placeholder="votre@email.com" required>
                                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="register-password" class="form-label">Mot de passe</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="register-password"
                                                placeholder="••••••••" required>
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="toggleRegisterPassword">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-text text-info">Le mot de passe doit contenir au moins 8 caractères
                                        </div>
                                        <div class="mb-3">
                                            <label for="password-confirm" class="form-label">Confirmez le mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password-confirm"
                                                    placeholder="••••••••" required>
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="toggleRegisterPassword">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                    </div>
                                    <div class="mb-4 form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                        J'accepte les <a href="{{ route('term') }}" class="text-primary">conditions
                                                d'utilisation</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-2">S'inscrire</button>
                                </form>

                                <div class="auth-divider my-4">
                                    <span>Ou continuer avec</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-6">
                                        <button class="btn btn-outline-secondary w-100">
                                            <i class="bi bi-facebook me-2"></i> Facebook
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-secondary w-100">
                                            <i class="bi bi-google me-2"></i> Google
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="small text-muted">
                                        En vous inscrivant, vous acceptez notre <a href="{{ route('privacy') }}"
                                            class="text-primary">politique de confidentialité</a> et nos <a
                                            href="{{ route('term') }}" class="text-primary">conditions d'utilisation</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <p class="text-muted small">©
                <script>
                    document.write(new Date().getFullYear())
                </script> Mr. Lanimation. Tous droits réservés.
            </p>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS for password toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if URL has tab parameter
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');
            if (tab === 'register') {
                const registerTab = document.getElementById('register-tab');
                if (registerTab) {
                    registerTab.click();
                }
            }

            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });

            // Toggle register password visibility
            const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
            const registerPassword = document.getElementById('register-password');

            toggleRegisterPassword.addEventListener('click', function() {
                const type = registerPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                registerPassword.setAttribute('type', type);
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
        });
    </script>
</body>

</html>
