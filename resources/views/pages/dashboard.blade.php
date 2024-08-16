@extends('layouts.app')

@section('title', 'Dashboard ReproEd Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            {{-- <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>News</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="section-header d-flex justify-content-center">
                <div class="row w-100">
                    <div class="col-12">
                        <div class="card card-statistic-1">
                            <div class="d-flex">
                                <div class="card-wrap d-flex flex-column align-items-start" style="flex-grow: 1;">
                                    <div class="d-flex">
                                        <div class="card-icon bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; overflow: hidden; margin-right: 10px;">
                                            <img src="data:image/jpeg;base64,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" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                        </div>
                                        <div class="card-icon bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; overflow: hidden;">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8bFyDFODNr7w8_RNmR06fwS-vEk9OqJL4sg&s" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div style="text-align: left;">
                                            <h2>Selamat Datang Di</h2>
                                            <h1>ReproEd</h1>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div style="text-align: left;">
                                            Aplikasi Reproduksi Edukasi bertujuan untuk meningkatkan pemahaman siswa tentang kesehatan reproduksi. Aplikasi ini menyediakan materi pendidikan yang mencakup aspek sekunder dan primer, serta fitur tes untuk mengukur peningkatan pemahaman siswa. Dengan aplikasi ini, diharapkan dapat meningkatkan pembelajaran yang efektif dan interaktif tentang reproduksi kepada siswa. Melalui pendekatan yang interaktif dan komprehensif, aplikasi ini dirancang untuk memfasilitasi proses belajar siswa dengan cara yang menarik dan mendalam, memastikan mereka mendapatkan pemahaman yang kuat tentang kesehatan reproduksi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#"
                                        class="btn btn-primary">Week</a>
                                    <a href="#"
                                        class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"
                                height="182"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i
                                                class="fas fa-caret-down"></i></span> 23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span>9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 19%</span>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">Now</div>
                                        <div class="media-title">Farhan A Mujib</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-2.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">12m</div>
                                        <div class="media-title">Ujang Maman</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-3.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">17m</div>
                                        <div class="media-title">Rizal Fakhri</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-4.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">21m</div>
                                        <div class="media-title">Alfa Zulkarnain</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="#"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body pt-2 pb-2">
                            <div id="myWeather">Please wait</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Authors</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-6 col-sm-3 col-lg-3 mb-md-0 mb-4">
                                    <div class="avatar-item mb-0">
                                        <img alt="image"
                                            src="{{ asset('img/avatar/avatar-5.png') }}"
                                            class="img-fluid"
                                            data-toggle="tooltip"
                                            title="Alfa Zulkarnain">
                                        <div class="avatar-badge"
                                            title="Editor"
                                            data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3 mb-md-0 mb-4">
                                    <div class="avatar-item mb-0">
                                        <img alt="image"
                                            src="{{ asset('img/avatar/avatar-4.png') }}"
                                            class="img-fluid"
                                            data-toggle="tooltip"
                                            title="Egi Ferdian">
                                        <div class="avatar-badge"
                                            title="Admin"
                                            data-toggle="tooltip"><i class="fas fa-cog"></i></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3 mb-md-0 mb-4">
                                    <div class="avatar-item mb-0">
                                        <img alt="image"
                                            src="{{ asset('img/avatar/avatar-1.png') }}"
                                            class="img-fluid"
                                            data-toggle="tooltip"
                                            title="Jaka Ramadhan">
                                        <div class="avatar-badge"
                                            title="Author"
                                            data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3 col-lg-3 mb-md-0 mb-4">
                                    <div class="avatar-item mb-0">
                                        <img alt="image"
                                            src="{{ asset('img/avatar/avatar-2.png') }}"
                                            class="img-fluid"
                                            data-toggle="tooltip"
                                            title="Ryan">
                                        <div class="avatar-badge"
                                            title="Admin"
                                            data-toggle="tooltip"><i class="fas fa-cog"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Referral URL</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">2,100</div>
                                <div class="font-weight-bold mb-1">Google</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="80%"
                                        aria-valuenow="80"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">1,880</div>
                                <div class="font-weight-bold mb-1">Facebook</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="67%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">1,521</div>
                                <div class="font-weight-bold mb-1">Bing</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="58%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">884</div>
                                <div class="font-weight-bold mb-1">Yahoo</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="36%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">473</div>
                                <div class="font-weight-bold mb-1">Kodinger</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="28%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">418</div>
                                <div class="font-weight-bold mb-1">Multinity</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="20%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Popular Browser</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="browser browser-chrome"></div>
                                    <div class="font-weight-bold mt-2">Chrome</div>
                                    <div class="text-muted text-small"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 48%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-firefox"></div>
                                    <div class="font-weight-bold mt-2">Firefox</div>
                                    <div class="text-muted text-small"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 26%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-safari"></div>
                                    <div class="font-weight-bold mt-2">Safari</div>
                                    <div class="text-muted text-small"><span class="text-danger"><i
                                                class="fas fa-caret-down"></i></span> 14%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-opera"></div>
                                    <div class="font-weight-bold mt-2">Opera</div>
                                    <div class="text-muted text-small">7%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-internet-explorer"></div>
                                    <div class="font-weight-bold mt-2">IE</div>
                                    <div class="text-muted text-small"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 5%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-sm-5 mt-md-0">
                        <div class="card-header">
                            <h4>Visitors</h4>
                        </div>
                        <div class="card-body">
                            <div id="visitorMap"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>This Week Stats</h4>
                            <div class="card-header-action">
                                <div class="dropdown">
                                    <a href="#"
                                        class="dropdown-toggle btn btn-primary"
                                        data-toggle="dropdown">Filter</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#"
                                            class="dropdown-item has-icon"><i class="far fa-circle"></i> Electronic</a>
                                        <a href="#"
                                            class="dropdown-item has-icon"><i class="far fa-circle"></i> T-shirt</a>
                                        <a href="#"
                                            class="dropdown-item has-icon"><i class="far fa-circle"></i> Hat</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#"
                                            class="dropdown-item">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <div class="summary-info">
                                    <h4>$1,053</h4>
                                    <div class="text-muted">Sold 3 items on 2 customers</div>
                                    <div class="d-block mt-2">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                                <div class="summary-item">
                                    <h6>Item List <span class="text-muted">(3 Items)</span></h6>
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded"
                                                    width="50"
                                                    src="{{ asset('img/products/product-1-50.png') }}"
                                                    alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">$405</div>
                                                <div class="media-title"><a href="#">PlayStation 9</a></div>
                                                <div class="text-muted text-small">by <a href="#">Hasan Basri</a>
                                                    <div class="bullet"></div> Sunday
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded"
                                                    width="50"
                                                    src="{{ asset('img/products/product-2-50.png') }}"
                                                    alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">$499</div>
                                                <div class="media-title"><a href="#">RocketZ</a></div>
                                                <div class="text-muted text-small">by <a href="#">Hasan Basri</a>
                                                    <div class="bullet"></div> Sunday
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded"
                                                    width="50"
                                                    src="{{ asset('img/products/product-3-50.png') }}"
                                                    alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">$149</div>
                                                <div class="media-title"><a href="#">Xiaomay Readme 4.0</a></div>
                                                <div class="text-muted text-small">by <a href="#">Kusnaedi</a>
                                                    <div class="bullet"></div> Tuesday
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="d-inline">Tasks</h4>
                            <div class="card-header-action">
                                <a href="#"
                                    class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                            class="custom-control-input"
                                            id="cbx-1">
                                        <label class="custom-control-label"
                                            for="cbx-1"></label>
                                    </div>
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-4.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="badge badge-pill badge-danger float-right mb-1">Not Finished</div>
                                        <h6 class="media-title"><a href="#">Redesign header</a></h6>
                                        <div class="text-small text-muted">Alfa Zulkarnain <div class="bullet"></div>
                                            <span class="text-primary">Now</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                            class="custom-control-input"
                                            id="cbx-2"
                                            checked="">
                                        <label class="custom-control-label"
                                            for="cbx-2"></label>
                                    </div>
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="badge badge-pill badge-primary float-right mb-1">Completed</div>
                                        <h6 class="media-title"><a href="#">Add a new component</a></h6>
                                        <div class="text-small text-muted">Serj Tankian <div class="bullet"></div> 4 Min
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                            class="custom-control-input"
                                            id="cbx-3">
                                        <label class="custom-control-label"
                                            for="cbx-3"></label>
                                    </div>
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-2.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="badge badge-pill badge-warning float-right mb-1">Progress</div>
                                        <h6 class="media-title"><a href="#">Fix modal window</a></h6>
                                        <div class="text-small text-muted">Ujang Maman <div class="bullet"></div> 8 Min
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                            class="custom-control-input"
                                            id="cbx-4">
                                        <label class="custom-control-label"
                                            for="cbx-4"></label>
                                    </div>
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="badge badge-pill badge-danger float-right mb-1">Not Finished</div>
                                        <h6 class="media-title"><a href="#">Remove unwanted classes</a></h6>
                                        <div class="text-small text-muted">Farhan A Mujib <div class="bullet"></div> 21
                                            Min</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                    <form method="post"
                        class="needs-validation"
                        novalidate="">
                        <div class="card">
                            <div class="card-header">
                                <h4>Quick Draft</h4>
                            </div>
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text"
                                        name="title"
                                        class="form-control"
                                        required>
                                    <div class="invalid-feedback">
                                        Please fill in the title
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="summernote-simple"></textarea>
                                </div>
                            </div>
                            <div class="card-footer pt-0">
                                <button class="btn btn-primary">Save Draft</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                            <div class="card-header-action">
                                <a href="#"
                                    class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Introduction Laravel 5
                                                <div class="table-links">
                                                    in <a href="#">Web Development</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">View</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - Installation
                                                <div class="table-links">
                                                    in <a href="#">Web Development</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">View</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - MVC
                                                <div class="table-links">
                                                    in <a href="#">Web Development</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">View</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - Migration
                                                <div class="table-links">
                                                    in <a href="#">Web Development</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">View</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - Deploy
                                                <div class="table-links">
                                                    in <a href="#">Web Development</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">View</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - Closing
                                                <div class="table-links">
                                                    in <a href="#">Web Development</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">View</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="font-weight-600"><img
                                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                                        alt="avatar"
                                                        width="30"
                                                        class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action"
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
