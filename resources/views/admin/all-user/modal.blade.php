{{-- modal add --}}
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Créer un nouveau de administrateur
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{ route('admin.user.save') }}">
                    @csrf
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="signUpName" class="form-label">Nom complet</label>
                        <input type="text" id="signUpName"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" name="name"
                            placeholder="Entrez votre nom complet" required autofocus />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="signUpEmail" class="form-label">Email</label>
                        <input type="email" id="signUpEmail"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" name="email"
                            placeholder="Entrez votre adresse e-mail ici" required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="signUpPassword" class="form-label">Password</label>
                        <input type="password" id="signUpPassword"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="**************" required />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--Confirm Password -->
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirmez le mot de passe</label>
                        <input type="password" id="password-confirm"
                            class="form-control" name="password_confirmation"
                            placeholder="**************" required />
                    </div>
                    <div>
                        <!-- Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                    <hr class="my-4" />

                </form>
            </div>
        </div>
    </div>
</div>


{{-- modal edit --}}
@foreach ($users as $user)
    <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="edit"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Modifier un administrateur
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.user.update',$user->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="signUpName" class="form-label">Nom complet</label>
                            <input type="text" id="signUpName"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name',$user->name) }}" name="name"
                                placeholder="Entrez votre nom complet" required autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="signUpEmail" class="form-label">Email</label>
                            <input type="email" id="signUpEmail"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email',$user->email) }}" name="email"
                                placeholder="Entrez votre adresse e-mail ici" required />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="signUpPassword" class="form-label">Password</label>
                            <input type="password" id="signUpPassword"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="**************"  />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--Confirm Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirmez le mot de passe</label>
                            <input type="password" id="password-confirm"
                                class="form-control" name="password_confirmation"
                                placeholder="**************"  />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="status" id="statusSwitch" value="1" {{ $user->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusSwitch"></label>
                            </div>
                        </div>

                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                        <hr class="my-4" />

                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
