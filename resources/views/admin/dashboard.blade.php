@extends('layouts.admin')
@section('content')
<section class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div
                class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                <div>
                    <h1 class="mb-0 h2 fw-bold">Tableau de bord</h1>
                </div>
                <div class="d-flex gap-3">
                    <div class="input-group">
                        <input class="form-control flatpickr" type="text" placeholder="Select Date"
                            aria-describedby="basic-addon2" />

                        <span class="input-group-text" id="basic-addon2"><i
                                class="fe fe-calendar"></i></span>
                    </div>
                    {{-- <a href="#" class="btn btn-primary">Setting</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4 mb-4">
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card body -->
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between lh-1">
                        <div>
                            <span class="fs-6 text-uppercase fw-semibold ls-md">Videos</span>
                        </div>
                        <div>
                            <span class="fe fe-video fs-3 text-primary"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <h2 class="fw-bold mb-0">{{ $total_videos }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card body -->
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between lh-1">
                        <div>
                            <span class="fs-6 text-uppercase fw-semibold ls-md">Articles</span>
                        </div>
                        <div>
                            <span class="fe fe-book-open fs-3 text-primary"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <h2 class="fw-bold mb-0">{{ $total_articles }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card body -->
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between lh-1">
                        <div>
                            <span class="fs-6 text-uppercase fw-semibold ls-md">Formations</span>
                        </div>
                        <div>
                            <span class="fe fe-music fs-3 text-primary"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <h2 class="fw-bold mb-0">{{ $total_formations }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card body -->
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between lh-1">
                        <div>
                            <span class="fs-6 text-uppercase fw-semibold ls-md">Visiteur</span>
                        </div>
                        <div>
                            <span class="fe fe-users fs-3 text-primary"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <h2 class="fw-bold mb-0">{{ $total_visiteurs }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row gy-4 mb-4">
        <div class="col-xl-8 col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div
                    class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Earnings</h4>
                    </div>
                    <div>
                        <div class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                role="button" id="courseDropdown1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="courseDropdown1">
                                <span class="dropdown-header">Settings</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-external-link dropdown-item-icon"></i>
                                    Export
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-mail dropdown-item-icon"></i>
                                    Email Report
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-download dropdown-item-icon"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- Earning chart -->
                    <div id="earning" class="apex-charts"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div
                    class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Traffic</h4>
                    </div>
                    <div>
                        <div class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                role="button" id="courseDropdown2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="courseDropdown2">
                                <span class="dropdown-header">Settings</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-external-link dropdown-item-icon"></i>
                                    Export
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-mail dropdown-item-icon"></i>
                                    Email Report
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-download dropdown-item-icon"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div id="traffic" class="apex-charts d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
@endsection
