@extends('front.layouts.app')

@section('content')

{{$sections->title}}

{{-- <style>
    #hero {
        width: 100%;
        height: 100vh;
        /* Adjust height as needed */
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .hero-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .carousel-content {
        text-align: center;
        color: #fff;
    }

    .slider-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .slider-logo {
        max-width: 200px;
        /* Adjust logo size as needed */
        margin-bottom: 20px;
    }

    .btn-get-started {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-get-started:hover {
        background-color: #0056b3;
    }

    .btn-download {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-download:hover {
        background-color: #0056b3;
    }
</style> --}}

<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        @foreach ($product_first_sections as $key => $product_first_section)

        <div class="contact-bg"
            style="background-image: url('{{ asset('uploads/first_section/'.$product_first_section->image) }}');">
            <div class="banner-content">
                <img src="{{ asset('uploads/first_section/'.$product_first_section->logo) }}" alt="Logo">
                <h3>{{ $product_first_section->title }}</h3>

                <div class="line">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                @if($product_first_section->brochure)
                <a href="{{ asset('uploads/first_section/'.$product_first_section->brochure) }}"
                    class="btn-download">Download Brochure</a>
                @endif
            </div>
        </div>



        {{-- <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/' .$product_first_section->image) }}" class="img-fluid"
                    alt="">
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
        </div> --}}
        @endforeach

    </div>
</section><!-- End About Us Section -->

<section id="" class="" ">
    <div class="" data-aos="">
        @foreach ($product_first_sections as $key => $product_first_section)
        <section id=" hero{{$key}}"
    style="background-image: url('{{ asset('uploads/first_section/'.$product_first_section->image) }}'); background-size: cover; background-position: center;"
    style="padding: 170px>
            <div class=" hero-container">
    <div class="carousel-container">
        <div class="carousel-content container">
            <h2>{{ $product_first_section->title }}</h2>
            <!-- Assuming 'logo' is an image field -->
            <img src="{{ asset('uploads/first_section/'.$product_first_section->logo) }}" alt="Logo">
            <!-- Assuming 'brochure' is a link field -->
            @if($product_first_section->brochure)
            <button class="btn-download"
                onclick="downloadBrochure('{{ asset('uploads/first_section/'.$product_first_section->brochure) }}')">Download
                Brochure</button>
            @endif
        </div>
    </div>
    </div>
</section>
@endforeach
</div>
</section>





<script>
    function downloadBrochure(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'blob';

        xhr.onload = function() {
            if (xhr.status === 200) {
                var blob = xhr.response;
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'brochure.pdf';
                link.click();
            }
        };
        xhr.send();
    }
</script>






@endsection