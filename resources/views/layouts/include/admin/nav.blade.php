<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/images/brand/logo/mr.png') }}" alt="MR_LANIMATION" />
            MR_LANIMATION
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item ">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fe fe-home me-2"></i>
                    Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navCourses" aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-book me-2"></i>
                    Gestion contenus
                </a>
                <div id="navCourses" class="collapse {{ request()->routeIs('admin.types-content','admin.contents') ? 'show' : '' }} " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.types-content') ? 'active' : '' }} " href="{{ route('admin.types-content') }}">Type contenu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.contents') ? 'active' : '' }} " href="{{ route('admin.contents') }}">Contenu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Lives Session</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                    <i class="nav-icon fe fe-user me-2"></i>
                    Gestion utilisateurs
                </a>
                <div id="navProfile" class="collapse {{ request()->routeIs('admin.user','admin.visiteur') ? 'show' : '' }} " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.visiteur') ? 'active' : '' }} " href="{{ route('admin.visiteur') }}">Visiteur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.user') ? 'active' : '' }}  " href="{{ route('admin.user') }}">Admin</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navCMS" aria-expanded="false" aria-controls="navCMS">
                    <i class="nav-icon fe fe-book-open me-2"></i>
                    Gestion interactions
                </a>
                <div id="navCMS" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active " href="#">Like</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Commentaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Partage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Playlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Favorit</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navecommerce" aria-expanded="false" aria-controls="navecommerce">
                    <i class="nav-icon fe fe-shopping-bag me-2"></i>
                    Abonnements
                </a>
                <div id="navecommerce" class="collapse {{ request()->routeIs('admin.types-subscription.show', 'admin.subscriptions') ? 'show' : '' }} " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.types-subscription.show') ? 'active' : '' }} " href="{{ route('admin.types-subscription.show') }}">Type Abonnement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.subscriptions') ? 'active' : '' }} " href="{{ route('admin.subscriptions') }}">Abonnées</a>
                        </li>
                    </ul>
                </div>
            </li>
    </div>
</nav>
