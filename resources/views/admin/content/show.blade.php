@extends('layouts.admin')
@include('admin.content.modal')
@section('content')
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Liste des Contenu</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Conctenu
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- basic table -->
            <div class="col-md-12 col-12">
                <div class="card mb-5">
                    <!-- card header  -->
                    <div class="card-header">
                        {{-- <h4 class="mb-1">button</h4> --}}

                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Nouvel <i
                                class="fe fe-plus"></i></a>
                    </div>
                    <!-- table  -->
                    <div class="card-body">
                        <div class="table-card">
                            <table id="dataTableBasic" class="table table-hover" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Categorie</th>
                                        <th>Publié</th>
                                        <th>Abonnement requis</th>
                                        <th>medias</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $value)
                                        <tr>
                                            <td>{{ strtoupper($value->title) }}</td>
                                            <td>
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $value->description }}">
                                                    {{ Str::limit($value->description, 30) }}
                                                </span>
                                            </td>

                                            <td>{{ strtoupper($value->type_content->name) }}</td>
                                            <td>{{ $value->categorie->name }}</td>
                                            <td>{{ $value->is_published ? 'Oui' : 'Non' }}</td>
                                            <td>
                                                <span class="badge {{ $value->subscription_required == 1 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $value->subscription_required == 1 ? 'oui' : 'non' }}
                                                </span>
                                            </td>
                                            <td><a href="{{ asset('storage/' . $value->file_path) }}" target="_blank">Voir le fichier</a></td>

                                            <td>
                                            <span class="dropdown dropstart">
                                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                    role="button" id="courseDropdown1" data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                    <span class="dropdown-header">Action</span>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $value->id }}">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Modifier
                                                    </a>
                                                    <a class="dropdown-item"
                                                        onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')) document.getElementById('delete-form-{{ $value->id }}').submit();"
                                                        href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Supprimer
                                                    </a>
                                                    <form id="delete-form-{{ $value->id }}"
                                                        action="{{ route('admin.content.delete', $value->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </span>
                                            </span>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
