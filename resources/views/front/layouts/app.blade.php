<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Opus Technology Limited</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('front-assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('front-assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front-assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('front-assets/css/style.css')}}" rel="stylesheet">



    {{-- others CSS--}}

    {{--
    <link href="{{ asset('front-assets/others/asset/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

    <!-- Font Awesome CSS -->
    <link href="{{ asset('front-assets/others/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{ asset('front-assets/others/css/animate.css')}}" rel="stylesheet">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ asset('front-assets/others/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('front-assets/others/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('front-assets/others/css/owl.transitions.css')}}">
    <!-- Custom CSS -->

    <link rel="stylesheet" href="{{ asset('front-assets/css/custom.css')}}">
    {{--
    <link href="{{ asset('front-assets/others/css/style.css')}}" rel="stylesheet"> --}}
    <link href="{{ asset('front-assets/others/css/responsive.css')}}" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Mamba
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@opus-bd.com</a>
                <i class="bi bi-phone-fill phone-icon"></i> +88-02 58316738
                <i class="bi bi-phone-fill phone-icon"></i> +88-01811317129
            </div>
            <div class="social-links d-none d-md-block">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo me-auto">
                <!-- <h1><a href="index.html">OPUS</a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.html"><img src="{{ asset('front-assets/img/opus-logo.png')}}" alt=""
                        class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}"
                            href="{{ route('front.home') }}">Home</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('about-us') ? 'active' : '' }}"
                            href="{{ route('front.about') }}">About</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('products') ? 'active' : '' }}"
                            href="{{ route('front.products') }}">Product</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('fintech') ? 'active' : '' }}"
                            href="{{ route('front.fintech') }}">Fintech</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('clients') ? 'active' : '' }}"
                            href="{{ route('front.clients') }}">Clients</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('services') ? 'active' : '' }}"
                            href="{{ route('front.services') }}">Services</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('blogs') ? 'active' : '' }}"
                            href="{{ route('front.blog') }}">Blogs</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('jobs') ? 'active' : '' }}"  href="{{ route('front.jobs') }}">Jobs</a>
                    </li>
                    <li><a class="nav-link scrollto {{ Request::is('contact-us') ? 'active' : '' }}"
                            href="{{ route('front.contact') }}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->



    <!-- End Hero -->

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="row" style="text-align: center">
                        @if(isset(footer()['contacts']) && footer()['contacts']->isNotEmpty())
                        @foreach(footer()['contacts'] as $contact)
                        <div class="col-lg-4 d-flex" data-aos="fade-up">
                            <div class="info-box">
                                <img src="{{ asset('uploads/first_section/' . $contact->image) }}" alt="Contact Image"
                                    width="150px">
                                <h3>{{ $contact->country_name }}</h3>
                                <h5>{{ $contact->company_name }}</h5>
                                <h6>{{ $contact->office_name }}</h6>
                                <p>{{ $contact->address }}</p>
                                <div class="social-links mt-3">
                                    <a href="{{ $contact->website }}" class="twitter"><i
                                            class="bx bxl-internet-explorer"></i></a>
                                    <a href="{{ $contact->facebook }}" class="facebook"><i
                                            class="bx bxl-facebook"></i></a>
                                    <a href="{{ $contact->youtube }}" class="instagram"><i
                                            class="bx bxl-youtube"></i></a>
                                    <a href="{{ $contact->linkedin }}" class="linkedin"><i
                                            class="bx bxl-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div style="text-align: center">
                    @if(isset(footer()['numbers']) && footer()['numbers']->isNotEmpty())
                    @foreach(footer()['numbers'] as $number)
                    <p>{{ $number->phone }}</p>

                    <p>{{ $number->email }}</p>

                    @endforeach
                    @endif


                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Opus</span></strong>. All Rights Reserved
                Designed by <a href="https://opus-bd.com/">Opus Technology Limited</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front-assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/php-email-form/validate.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('front-assets/js/main.js')}}"></script>




    {{-- others JS--}}

    <!-- jQuery Version 2.1.1 -->
    <script src="{{ asset('front-assets/others/js/jquery-2.1.1.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('front-assets/others/asset/js/bootstrap.min.js')}}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('front-assets/others/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/classie.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/count-to.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/jquery.appear.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/cbpAnimatedHeader.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/jquery.fitvids.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/styleswitcher.js')}}"></script>
    <!-- Contact Form JavaScript -->
    <script src="{{ asset('front-assets/others/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('front-assets/others/js/contact_me.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('front-assets/others/js/script.js')}}"></script>

</body>

</html>
