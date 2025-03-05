@extends('layouts.admin')
@section('content')
    <section class="pt-5 pb-5">
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
                                    <img src="{{ asset('storage/'. Auth::user()->avatar) }}" class="avatar-xl rounded-circle border border-4 border-white" alt="avatar" />
                                    {{-- {{ dd(asset('storage/app/public/'. Auth::user()->avatar))}} --}}
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">{{ Auth::user()->name }}</h2>
                                    <p class="mb-0 d-block">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary btn-sm d-none d-md-block">Paramètres du compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="row align-items-center mt-md-4">
                <div class="col-lg-12 col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Détails du profil</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.avatar') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar" />
                                        <div class="ms-3">
                                            <h4 class="mb-0">Votre avatar</h4>
                                            <input type="file" id="photo" name="photo" class="form-control" required />
                                            @error('photo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">Mettre à jour</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-5" />
                            <form class="row gx-3 needs-validation" action="{{ route('admin.profil') }}" method="POST">
                                @csrf
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="name">Nom complet</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom complet" value="{{ Auth::user()->name }}" required />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" required />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="password">Mot de passe</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required />
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
