{{-- modal add --}}
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Créer un nouveau type d'abonnement
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{ route('admin.types-subscription.save') }}">
                    @csrf
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="name">
                            Nom
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                            placeholder="Entrez le nom du type abonnement" id="name" name="name" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="price">
                            Prix
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control  @error('price') is-invalid @enderror"
                            placeholder="Entrez le nom du type abonnement" id="price" name="price" />
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal edit --}}
@foreach ($type_subscriptions as $subscriptionType)
<div class="modal fade" id="edit{{ $subscriptionType->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Modifier un  type d'abonnement
                    <span class="text-primary">"{{ old('name', $subscriptionType->name) }}"</span>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{ route('admin.types-subscription.update',$subscriptionType->id ) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="name">
                            Nom
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                            placeholder="Entrez le nom du type abonnement" id="name" name="name" value="{{ old('name', $subscriptionType->name) }}" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="price">
                            Prix
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control  @error('price') is-invalid @enderror"
                            placeholder="Entrez le nom du type abonnement" id="price" name="price" value="{{ old('price', $subscriptionType->price) }}" required />
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
