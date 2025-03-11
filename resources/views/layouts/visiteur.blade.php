<!doctype html>
<html lang="en">

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/dashboard-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 17:16:47 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Codescandy" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/logo-mr.png') }}" />

    <!-- darkmode js -->
    <script src="{{ asset('assets/js/vendors/darkMode.js') }}"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="canonical" href="{{ route('visiteur.dashboard') }}">
    <title>Visiteur Dashboard | MR_LANIMATION </title>
</head>

<body>
    @include('layouts.include.visiteur.nav')

    <!-- Page Content -->
    <main>
        <section class="pt-5">
            <div class="container">
                <!-- User info -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="rounded-top" style="background: url(../assets/images/background/profile-bg.jpg) no-repeat; background-size: cover; height: 100px;"></div>
                    <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                    <img src="{{ asset('storage/'. Auth::guard('visiteur')->user()->avatar) }}" class="avatar-xl rounded-circle border border-4 border-white" alt="avatar" />
                                    {{-- {{ dd(asset('storage/app/public/'. Auth::user()->avatar))}} --}}
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">{{ Auth::guard('visiteur')->user()->name }}</h2>
                                    <p class="mb-0 d-block">{{ Auth::guard('visiteur')->user()->email }}</p>
                                </div>
                            </div>
                            <div>
{{--                                 <a href="#" class="btn btn-primary btn-sm d-none d-md-block">Paramètres du compte</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Content -->
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center g-0 border-top py-2">
                <!-- Desc -->
                <div class="col-md-6 col-12 text-center text-md-start">
                    <span>
                        ©
                        <span id="copyright">
                            <script>
                                document.getElementById("copyright").appendChild(document.createTextNode(new Date().getFullYear()));
                            </script>
                        </span>
                        MR_LANIMATION. All Rights Reserved.
                    </span>
                </div>
                <!-- Links -->
                <div class="col-12 col-md-6">
                    <nav class="nav nav-footer justify-content-center justify-content-md-end">
                        <a class="nav-link active ps-0" href="#!">Privacy</a>
                        <a class="nav-link" href="#!">Terms</a>
                        <a class="nav-link" href="#!">Feedback</a>
                        <a class="nav-link" href="#!">Support</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scroll top -->
    <div class="btn-scroll-top">
        <svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
            <path
                d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" />
        </svg>
    </div>

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

</body>

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/dashboard-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 17:16:48 GMT -->

</html>
