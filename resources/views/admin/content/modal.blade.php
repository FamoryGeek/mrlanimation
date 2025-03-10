{{-- modal add --}}
{{-- dd(ini_get('post_max_size'), ini_get('upload_max_filesize')) --}}
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Créer un nouveau de contenu
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" enctype="multipart/form-data" action="{{ route('admin.content.save') }}">
                    @csrf
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="name">
                            Titre
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                            placeholder="Entrez le titre du contenu" id="title" name="title" required />
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 mb-2">
                        <label class="form-label" for="name">
                            Description
                            <span class="text-danger">*</span>
                        </label>
                        <textarea type="text" class="form-control  @error('description') is-invalid @enderror"
                            id="description" name="description" placeholder="Une petite description..." required /></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="type_content_id">
                            Type de contenu
                            <span class="text-danger">*</span>
                        </label>

                        <select class="form-select" name="type_content_id" id="type_content_id" required>
                            <option selected value="">Select</option>
                            @foreach ($type_content as $value )
                            <option value="{{ $value->id }}">{{ strtoupper($value->name) }}</option>
                        @endforeach

                        </select>
                        @error('type_content_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="subscription_required">
                            Abonnement requis?
                            <span class="text-danger">*</span>
                        </label>
                        <input type="checkbox" class="form-checkbox" name="subscription_required" id="subscription_required" >

                        @error('subscription_required')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 mb-2">
                        <label class="form-label" for="cover">
                            Image de couverture
                            <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control  @error('cover') is-invalid @enderror"
                             id="title" name="cover" required />
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="cover">
                            Fichier
                            <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control  @error('file_path') is-invalid @enderror"
                             id="file_path" name="file_path" required />
                        @error('file_path')
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
@foreach ($contents as $content)
    <div class="modal fade" id="edit{{ $content->id }}" tabindex="-1" role="dialog" aria-labelledby="edit"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Créer un nouveau de contenu
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" enctype="multipart/form-data" action="{{ route('admin.content.update',$content->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="name">
                                Titre
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                placeholder="Entrez le titre du contenu" id="title" name="title" value="{{ old('name', $content->title) }}" required />
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 mb-2">
                            <label class="form-label" for="name">
                                Description
                                <span class="text-danger">*</span>
                            </label>
                            <textarea type="text" class="form-control  @error('description') is-invalid @enderror"
                                id="description" name="description" placeholder="Une petite description..."  required />{{ old('name', $content->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="type_content_id">
                                Type de contenu
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="type_content_id" id="type_content_id" required>
                                <option selected value="">Select</option>
                                @foreach ($type_content as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $content->type_content_id ? 'selected' : '' }} >{{ strtoupper($value->name) }}</option>
                            @endforeach

                            </select>
                            @error('type_content_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="subscription_required">
                                Abonnement requis?
                                <span class="text-danger">*</span>
                            </label>
                            <input type="checkbox" class="form-checkbox" name="subscription_required" {{ old('name', $content->subscription_required) == 1 ? "checked": "" }} id="subscription_required" >

                            @error('subscription_required')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 mb-2">
                            <label class="form-label" for="cover">
                                Image de couverture
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control  @error('cover') is-invalid @enderror"
                                 id="title" name="cover"  />
                            @error('cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="cover">
                                Fichier
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control  @error('file_path') is-invalid @enderror"
                                 id="file_path" name="file_path"  />
                            @error('file_path')
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
