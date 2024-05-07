@extends('front.layouts.app')

@section('content')
<style>
    body {
        margin-top: 20px;
    }

    .shadow {
        box-shadow: 0 0 3px rgb(53 64 78 / 20%) !important;
    }

    .rounded {
        border-radius: 5px !important;
    }

    .bg-light {
        background-color: #f7f8fa !important;
    }

    .bg-primary,
    .btn-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active,
    .btn-outline-primary.active,
    .btn-outline-primary.focus,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .badge-primary,
    .nav-pills .nav-link.active,
    .pagination .active a,
    .custom-control-input:checked~.custom-control-label:before,
    #preloader #status .spinner>div,
    .social-icon li a:hover,
    .back-to-top:hover,
    .back-to-home a,
    ::selection,
    #topnav .navbar-toggle.open span:hover,
    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots.clickable .owl-dot:hover span,
    .watch-video a .play-icon-circle,
    .sidebar .widget .tagcloud>a:hover,
    .flatpickr-day.selected,
    .flatpickr-day.selected:hover,
    .tns-nav button.tns-nav-active,
    .form-check-input.form-check-input:checked {
        background-color: #5AB2FF !important;
    }

    .badge {
        padding: 5px 8px;
        border-radius: 3px;
        letter-spacing: 0.5px;
        font-size: 12px;
    }

    .btn-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active,
    .btn-outline-primary.active,
    .btn-outline-primary.focus,
    .btn-outline-primary:not(:disabled):not(.disabled):active {
        box-shadow: 0 3px 7px rgba(155, 201, 255, 0.5) !important;
    }

    .btn-primary,
    .btn-outline-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active,
    .btn-outline-primary.active,
    .btn-outline-primary.focus,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .bg-soft-primary .border,
    .alert-primary,
    .alert-outline-primary,
    .badge-outline-primary,
    .nav-pills .nav-link.active,
    .pagination .active a,
    .form-group .form-control:focus,
    .form-group .form-control.active,
    .custom-control-input:checked~.custom-control-label:before,
    .custom-control-input:focus~.custom-control-label::before,
    .form-control:focus,
    .social-icon li a:hover,
    #topnav .has-submenu.active.active .menu-arrow,
    #topnav.scroll .navigation-menu>li:hover>.menu-arrow,
    #topnav.scroll .navigation-menu>li.active>.menu-arrow,
    #topnav .navigation-menu>li:hover>.menu-arrow,
    .flatpickr-day.selected,
    .flatpickr-day.selected:hover,
    .form-check-input:focus,
    .form-check-input.form-check-input:checked,
    .container-filter li.active,
    .container-filter li:hover {
        border-color: #5AB2FF !important;
    }

    .bg-primary,
    .btn-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active,
    .btn-outline-primary.active,
    .btn-outline-primary.focus,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .badge-primary,
    .nav-pills .nav-link.active,
    .pagination .active a,
    .custom-control-input:checked~.custom-control-label:before,
    #preloader #status .spinner>div,
    .social-icon li a:hover,
    .back-to-top:hover,
    .back-to-home a,
    ::selection,
    #topnav .navbar-toggle.open span:hover,
    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots.clickable .owl-dot:hover span,
    .watch-video a .play-icon-circle,
    .sidebar .widget .tagcloud>a:hover,
    .flatpickr-day.selected,
    .flatpickr-day.selected:hover,
    .tns-nav button.tns-nav-active,
    .form-check-input.form-check-input:checked {
        background-color: #5AB2FF !important;
    }

    .btn {
        padding: 8px 20px;
        outline: none;
        text-decoration: none;
        font-size: 16px;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        font-weight: 600;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #5AB2FF !important;
        border: 1px solid #5AB2FF !important;
        color: #fff !important;
        box-shadow: 0 3px 7px rgba(155, 201, 255, 0.5);
    }

    a {
        text-decoration: none;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

<div class="container mt-5 pt-4">
    <div class="row align-items-end mb-4">
        <div>
            <div class="section-title text-center text-md-start">
                <h4 class="title mb-4">Find the perfect jobs</h4>
                <p class="text-muted mb-0 para-desc">Start work with Leaping. Build responsive, mobile-first projects on the web with the world's most popular front-end component library.</p>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">Full time</span>
                    <h5>Web Designer</h5>
                    <div class="mt-3">
                    <span class="text-muted d-block">Post Date: &nbsp <i class="fa fa-calendar" aria-hidden="true"></i> 6/05/2024 &nbsp&nbsp</span>
                        <span class="text-muted d-block">Last Submission Date: &nbsp<i class="fa fa-calendar" aria-hidden="true"></i> 6/06/2024 &nbsp&nbsp
                        </span>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">Remote</span>
                    <h5>Front-end Developer</h5>
                    <div class="mt-3">
                        <span class="text-muted d-block">Post Date: &nbsp <i class="fa fa-calendar" aria-hidden="true"></i> 6/05/2024 &nbsp&nbsp</span>
                        <span class="text-muted d-block">Last Submission Date: &nbsp<i class="fa fa-calendar" aria-hidden="true"></i> 6/06/2024 &nbsp&nbsp
                        </span>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">Contract</span>
                    <h5>Web Developer</h5>
                    <div class="mt-3">
                    <span class="text-muted d-block">Post Date: &nbsp <i class="fa fa-calendar" aria-hidden="true"></i> 6/05/2024 &nbsp&nbsp</span>
                        <span class="text-muted d-block">Last Submission Date: &nbsp<i class="fa fa-calendar" aria-hidden="true"></i> 6/06/2024 &nbsp&nbsp
                        </span>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">WFH</span>
                    <h5>Back-end Developer</h5>
                    <div class="mt-3">
                    <span class="text-muted d-block">Post Date: &nbsp <i class="fa fa-calendar" aria-hidden="true"></i> 6/05/2024 &nbsp&nbsp</span>
                        <span class="text-muted d-block">Last Submission Date: &nbsp<i class="fa fa-calendar" aria-hidden="true"></i> 6/06/2024 &nbsp&nbsp
                        </span>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">Full time</span>
                    <h5>UX / UI Designer</h5>
                    <div class="mt-3">
                    <span class="text-muted d-block">Post Date: &nbsp <i class="fa fa-calendar" aria-hidden="true"></i> 6/05/2024 &nbsp&nbsp</span>
                        <span class="text-muted d-block">Last Submission Date: &nbsp<i class="fa fa-calendar" aria-hidden="true"></i> 6/06/2024 &nbsp&nbsp
                        </span>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">Remote</span>
                    <h5>Tester</h5>
                    <div class="mt-3">
                    <span class="text-muted d-block">Post Date: &nbsp <i class="fa fa-calendar" aria-hidden="true"></i> 6/05/2024 &nbsp&nbsp</span>
                        <span class="text-muted d-block">Last Submission Date: &nbsp<i class="fa fa-calendar" aria-hidden="true"></i> 6/06/2024 &nbsp&nbsp
                        </span>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-12 mt-4 pt-2 d-block d-md-none text-center">
            <a href="#" class="btn btn-primary">View more Jobs <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></a>
        </div><!--end col-->
    </div><!--end row-->
</div>
<br><br><br>
@endsection