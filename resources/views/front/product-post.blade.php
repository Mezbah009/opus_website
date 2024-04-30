@extends('front.layouts.app')

@section('content')

{{$sections->title}}

<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        @foreach ($product_first_sections as $key => $product_first_section)

        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/' .$product_first_section->image) }}" class="img-fluid" alt="">
                <a href="https://youtu.be/eNz-5QvXmog?si=P5S7DF078CSD3xj1" class="venobox play-btn mb-4"
                    data-vbtype="video" data-autoplay="true"></a>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <h2>{{ $product_first_section->title }}</h2>
                    <p>{!! $product_first_section->description!!} </p>
                    <a href="{{ $product_first_section->link }}"
                        class="btn-get-started animate__animated animate__fadeInUp scrollto">{{
                        $product_first_section->button_name }}</a>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-rocket"></i></div>
                    <h4 class="title"><a href="">Our Mission</a></h4>
                    <p class="description">{{$product_first_section->mission}}</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-compass"></i></div>
                    <h4 class="title"><a href="">Our Vision</a></h4>
                    <p class="description">{{$product_first_section->vision}}</p>

                </div>

            </div>
        </div>
        @endforeach

    </div>
</section><!-- End About Us Section -->

@endsection
