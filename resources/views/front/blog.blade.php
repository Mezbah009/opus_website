@extends('front.layouts.app')

@section('content')
<style>
    .card {
        box-shadow: 0px 4px 15px 0px rgba(191, 195, 198, 0.29);
    }

    .card-title {
        color: #5a5a5a;
        text-transform: initial;
    }

    .card-block {
        padding: 4rem;
    }

    .blog-category {
        background-color: #5295CE;
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 10px;
    }

    .btn {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.707em;
        text-transform: uppercase;
        font-weight: 600;
        padding: 12px 40px;
        box-shadow: 0px 4px 10px 0px rgba(91, 91, 91, 0.45);
        line-height: 1;
        transition: all .5s ease;
        letter-spacing: 1px;
    }

    .btn-link {
        padding: 0;
        box-shadow: none;
    }

</style>

<div class="contact-bg" style="background-image: url('{{ asset("front-assets/img/contact-bg.jpg") }}');">
    <h2>Blogs</h2>
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<section id="blog-card" class="padding-top-bottom-90">
    <div class="container">
        <div class="heading-wraper text-center margin-bottom-80">
            <h4>latest published</h4>
            <hr class="heading-devider gradient-orange">
        </div>
        <div class="row">
            @foreach ($blogPosts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top img-responsive max-width-100" src="{{ asset('uploads/blogs/' . $post->image) }}" alt="{{ $post->title }}">
                    <div class="card-block">
                        <p class="card-text"><small class="text-muted blog-category">{{ $post->category }}</small></p>
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text"><small class="text-muted italic">{{ $post->date }}</small></p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="btn btn-link">read more <span><i class="ion-ios-arrow-thin-right"></i></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
