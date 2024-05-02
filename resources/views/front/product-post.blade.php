@extends('front.layouts.app')

@section('content')
<style>
    /* CSS Styling */
    .custom-section {
        padding: 100px;
        /* Adjust padding as needed */
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .custom-section::before {
        content: "";
        background-color: rgba(13, 30, 45, 0.4);
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        overflow: hidden;
    }

    .custom-section .container {
        position: relative;
        z-index: 1;
        text-align: left;
        /* Center align content */
    }

    .custom-section img {
        max-height: 100px;
        /* Set max height for the logo */
        margin-bottom: 20px;
        /* Adjust margin as needed */
    }

    .custom-section h2 {
        color: #fff;
        /* Text color */
        font-size: 24px;
        /* Font size */
        margin-bottom: 20px;
        /* Adjust margin as needed */
    }

    .custom-section .btn-download {
        background-color: #fff;
        /* Button background color */
        color: #333;
        /* Button text color */
        padding: 10px 20px;
        /* Adjust padding as needed */
        border: none;
        border-radius: 5px;
        font-size: 16px;
        /* Font size */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-section .btn-download:hover {
        background-color: #eee;
        /* Button hover background color */
    }
</style>
<div class="" data-aos="">
    @foreach ($product_first_sections as $key => $product_first_section)
    <section id="hero{{$key}}" class="custom-section" style="background-image: url('{{ asset('uploads/first_section/'.$product_first_section->image) }}');">
        <div class="container">
            <div class="carousel-content">
                <img src="{{ asset('uploads/first_section/'.$product_first_section->logo) }}" alt="Logo">
                <h2>{{ $product_first_section->title }}</h2>
                @if($product_first_section->brochure)
                <button class="btn-download" onclick="downloadBrochure('{{ asset('uploads/first_section/'.$product_first_section->brochure) }}')">Download Brochure</button>
                @endif
            </div>
        </div>
    </section>
    @endforeach
</div>


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