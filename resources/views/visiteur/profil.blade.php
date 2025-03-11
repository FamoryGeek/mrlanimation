@extends('layouts.visiteur')
@section('content')
    <section class="pt-5 pb-5">
        <div class="container">

            <!-- Content -->
            <div class="row align-items-center mt-md-4">
                <div class="col-lg-12 col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Détails du profil</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('visiteur.avatar') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        <img src="{{ asset('storage/' . Auth::guard('visiteur')->user()->avatar) }}" id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar" />
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
                            <form class="row gx-3 needs-validation" action="{{ route('visiteur.profil') }}" method="POST">
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
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe"  />
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
