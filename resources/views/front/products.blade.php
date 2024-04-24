@extends('front.layouts.app')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        line-height: 1.5;
    }

    .contact-bg {
        height: 40vh;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)),
        url('{{ asset('front-assets/img/contact-bg.jpg') }}');
        background-position: 50% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        text-align: center;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }


    .contact-bg h3 {
        font-size: 1.3rem;
        font-weight: 400;
    }

    .contact-bg h2 {
        font-size: 3rem;
        text-transform: uppercase;
        padding: 0.4rem 0;
        letter-spacing: 4px;
    }

    .line div {
        margin: 0 0.2rem;
    }

    .line div:nth-child(1),
    .line div:nth-child(3) {
        height: 3px;
        width: 70px;
        background: #f7327a;
        border-radius: 5px;
    }

    .line {
        display: flex;
        align-items: center;
    }

    .line div:nth-child(2) {
        width: 10px;
        height: 10px;
        background: #f7327a;
        border-radius: 50%;
    }

    .text {
        font-weight: 300;
        opacity: 0.9;
    }



    @media screen and (min-width: 768px) {
        .contact-bg .text {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media screen and (min-width: 992px) {
        .contact-bg .text {
            width: 50%;
        }

        .contact-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            align-items: center;
        }
    }

    @media screen and (min-width: 1200px) {
        .contact-info {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<div class="contact-bg">
    {{-- <h3>Get in Touch with Us</h3> --}}
    <h2>Our Products</h2>
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
    </div>
    {{-- <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda iste facilis quos impedit fuga nobis modi debitis laboriosam velit reiciendis quisquam alias corporis, maxime enim, optio ab dolorum sequi qui.</p> --}}
</div>

<!-- ======= Our Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
            {{-- <h2>Our Products</h2> --}}
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        {{-- <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-fin">Fintech</li>
                    <li data-filter=".filter-sig">Signature</li>
                </ul>
            </div>
        </div> --}}

        <div class="row portfolio-container">
            @foreach($sections as $section)
            <div class="col-lg-4 col-md-6 portfolio-item {{$section->button_name}}">
                <div class="portfolio-wrap">
                    <img src="/uploads/first_section/{{ $section->logo }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$section->title}}</h4>
                        <p style="word-wrap: break-word; padding-right:10px; padding-left:10px;">
                            {{$section->description}}</p>
                        <div class="portfolio-links">
                            <a href="/uploads/first_section/{{ $section->logo }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Portfolio Section -->

@endsection
