@extends('front.layouts.app')

@section('content')

<!-- ======= Our Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
            <h2>Our Clients</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-fin">Fintech</li>
                    <li data-filter=".filter-sig">Signature</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">
            @foreach($clients as $client)
            <div class="col-lg-4 col-md-6 portfolio-item {{$client->category}}">
                <div class="portfolio-wrap">
                    <img src="/uploads/first_section/{{ $client->logo }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$client->title}}</h4>
                        <p style="word-wrap: break-word; padding-right:10px; padding-left:10px;">
                            {{$client->description}}</p>
                        <div class="portfolio-links">
                            <a href="/uploads/first_section/{{ $client->logo }}" data-gallery="portfolioGallery"
                                {{-- class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a> --}}
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
