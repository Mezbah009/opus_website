@extends('front.layouts.app')

@section('content')

<div class="contact-bg" style="background-image: url('{{ asset("front-assets/img/contact-bg.jpg") }}');">
    <h2>About us</h2>
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


<!-- ======= About Us Section ======= -->
{{-- <section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('front-assets/img/about.jpg')}}" class="img-fluid" alt="">
<a href="https://youtu.be/eNz-5QvXmog?si=P5S7DF078CSD3xj1" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
</div>

<div class="col-lg-6 d-flex flex-column justify-content-center about-content">

    <div class="section-title">
        <h2>Who We Are</h2>
        <p>Opus Technology Limited is a company that specializes in creating, designing, maintaining
            software applications, developing custom software, mobile apps, web development,
            artificial intelligence, games, animation and so. Opus Technology Limited started
            operating from 2012 and since then delivering advanced software that empowers,
            innovates, and transforms the office completely and digitally for all our clients.</p>
    </div>

    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
        <div class="icon"><i class="bx bx-rocket"></i></div>
        <h4 class="title"><a href="">Our Mission</a></h4>
        <p class="description">We aim to provide world-class software solutions for all our
            prospective clients from all over the world and build the best innovative software using
            our cutting edge technology and expert software development team.</p>
    </div>

    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
        <div class="icon"><i class="bx bx-compass"></i></div>
        <h4 class="title"><a href="">Our Vision</a></h4>
        <p class="description">We want to serve customers from every corner of the world and provide
            them with the best IT solutions so that we are able to create a worldwide goodwill on
            the IT sector and achieve good worldwide recognition for being one of the best IT
            companies out there.</p>
    </div>

</div>
</div>

</div>
</section><!-- End About Us Section --> --}}


<!-- ======= Second Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        @foreach ($home_second_section as $key => $home_second_sections)

        <div class="row no-gutters">


            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <img src="{{ asset('uploads/first_section/' .$home_second_sections->logo) }}" class="img-fluid" alt="">
                    {{-- <h2>{{ $home_second_sections->title }}</h2> --}}
                    <p>{!! $home_second_sections->description!!} </p>
                    <!-- <a href="{{ $home_second_sections->link }}"
                        class="btn-get-started animate__animated animate__fadeInUp scrollto">{{
                        $home_second_sections->button_name }}</a> -->
                </div>
            </div>
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/' .$home_second_sections->image) }}" class="img-fluid" alt="">
            </div>
        </div>
        @endforeach

    </div>
</section>

<!-- End About Us Section -->


<!-- ======= Counts Section ======= -->
<section class="counts section-bg">
    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                <div class="count-box">
                    <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="360" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Successful Project Implementation</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                    <i class="bi bi-document-folder" style="color: #c042ff;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Customers Worldwide</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="count-box">
                    <i class="bi bi-live-support" style="color: #46d1ff;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Resources</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                <div class="count-box">
                    <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="45" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Technical Resources</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->

{{-- Accreditation section --}}

<div class="section-title" style="padding-top: 60px">
    <h2></h2>
    <h2>Accreditation</h2>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        @foreach ($accreditations as $key => $accreditation)

        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/' .$accreditation->image) }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <h1>{{ $accreditation->title}} </h1>
                    <p>{!! $accreditation->description!!} </p>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>

{{-- Awards section --}}

<div class="section-title">
    <h2></h2>
    <h2>Awards</h2>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        @foreach ($awards as $key => $award)

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/' .$award->image) }}" class="img-fluid" alt="">
            </div>

        </div>
        @endforeach

    </div>
</div>


{{-- quality section --}}

<div class="section-title" style="padding-top: 30px">
    <h2></h2>
    <h2>Quality Management</h2>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        @foreach ($qualities as $key => $quality)

        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <h1>{{ $quality->title}} </h1>
                    <p>{!! $quality->description!!} </p>
                </div>
            </div>
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/' .$quality->image) }}" class="img-fluid" alt="">
            </div>

        </div>
        @endforeach

    </div>
</div>



<!-- ======= management Section ======= -->
<div class="section-title" style="padding-top: 30px">
    <h2>Our Team</h2>
    <h3>Top Management</h3>
</div>

<section id="management" class="management">
    <div class="container" data-aos="fade-up">
        <div class="row">
            @foreach($managements as $management)
            <div class="col-xl-6 col-lg-4 col-md-12" data-aos="fade-up">
                <div class="management_member">
                    <div class="pic">
                        <img src="{{ asset('uploads/first_section/' . $management->image) }}" class="img-fluid" alt="{{ $management->name }}" height="300px" width="350px">
                    </div>


                    <div class="">
                        <h4>{{ $management->name }}</h4>
                        <span>{{ $management->designation }}</span>
                        <p>{{ $management->description }}</p>
                        <div class="social">
                            <button onclick="window.location.href='{{ route('leader.show', ['link' => $management->link ?? 'default']) }}'">Read More</button>
                            @if($management->facebook)
                            <a href="{{ $management->facebook }}"><i class="bi bi-facebook"></i></a>
                            @endif
                            @if($management->linkedin)
                            <a href="{{ $management->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Team Section -->




<!-- ======= Our Team Section ======= -->
<section id="team" class="team">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Core Management Team</h2>
            <p></p>
        </div>

        <div class="row">
            @foreach($teamMembers as $member)
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                <div class="member">
                    <div class="pic">
                        <img src="{{ asset('uploads/users/' . $member->image) }}" class="img-fluid" alt="{{ $member->name }}" height="300px" width="350px">
                    </div>


                    <div class="member-info">
                        <h4>{{ $member->name }}</h4>
                        <span>{{ $member->designation }}</span>
                        <div class="social">
                            @if($member->twitter)
                            <a href="{{ $member->twitter }}"><i class="bi bi-twitter"></i></a>
                            @endif
                            @if($member->facebook)
                            <a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>
                            @endif
                            @if($member->instagram)
                            <a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>
                            @endif
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Team Section -->



@endsection
