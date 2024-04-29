@extends('front.layouts.app')

@section('content')

{{$sections->title}}

<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        @foreach ($home_first_section as $key => $home_first_sections)

        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/' .$home_first_sections->image) }}" class="img-fluid" alt="">
                <a href="https://youtu.be/eNz-5QvXmog?si=P5S7DF078CSD3xj1" class="venobox play-btn mb-4"
                    data-vbtype="video" data-autoplay="true"></a>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <h2>{{ $home_first_sections->title }}</h2>
                    <p>{!! $home_first_sections->description!!} </p>
                    <a href="{{ $home_first_sections->link }}"
                        class="btn-get-started animate__animated animate__fadeInUp scrollto">{{
                        $home_first_sections->button_name }}</a>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-rocket"></i></div>
                    <h4 class="title"><a href="">Our Mission</a></h4>
                    <p class="description">{{$home_first_sections->mission}}</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-compass"></i></div>
                    <h4 class="title"><a href="">Our Vision</a></h4>
                    <p class="description">{{$home_first_sections->vision}}</p>

                </div>

            </div>
        </div>
        @endforeach

    </div>
</section><!-- End About Us Section -->

@endsection
