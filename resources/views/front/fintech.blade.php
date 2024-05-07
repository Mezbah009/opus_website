@extends('front.layouts.app')

@section('content')

<div class="contact-bg" style="background-image: url('{{ asset("front-assets/img/contact-bg.jpg") }}');">
    {{-- <h3>Get in Touch with Us</h3> --}}
    <h2>Our Fintech Products</h2>
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
    </div>
    {{-- <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda iste facilis quos impedit
        fuga nobis modi debitis laboriosam velit reiciendis quisquam alias corporis, maxime enim, optio ab dolorum sequi
        qui.</p> --}}
</div>

<!-- ======= Our Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
            {{-- <h2>Our Fintech Products</h2> --}}
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-cb">Conventional Banking</li>
                    <li data-filter=".filter-ib">Islamic Banking</li>
                    <li data-filter=".filter-mf">Micro-Finance</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">
            @foreach($sections as $section)
            <div class="col-lg-4 col-md-6 portfolio-item {{$section->fin_cat}}">
                <div class="portfolio-wrap">
                    <img src="{{ asset('uploads/first_section/' . $section->logo) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$section->title}}</h4>
                        <p style="word-wrap: break-word; padding-right:10px; padding-left:10px;">
                            {{$section->description}}</p>
                        <div class="portfolio-links">
                            <a href="/uploads/first_section/{{ $section->logo }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                            <a href="{{ route('product.show', ['slug' => $section->link]) }}" title="More Details"><i
                                    class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Portfolio Section -->

@endsection