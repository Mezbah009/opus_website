@extends('front.layouts.app')

@section('content')

<div class="contact-bg" style="background-image: url('{{ asset("front-assets/img/contact-bg.jpg") }}');">
    <h2>contact us</h2>
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>



<div class="contact-body">
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row">
                @foreach($contacts as $contact)
                <div class="col-lg-4 d-flex" data-aos="fade-up">
                    <div class="info-box">
                        <img src="{{ asset('uploads/first_section/' . $contact->flag) }}" alt="..." width="80px"
                            style="padding: 8px">
                        <h3>{{ $contact->country_name }}</h3>
                        <h5>{{ $contact->company_name }}</h5>
                        <h6>{{ $contact->office_name }}</h6>
                        <p>{{ $contact->address }}</p>
                        <div class="social-links mt-3">
                            <a href="{{ $contact->website }}" class="twitter"><i
                                    class="bx bxl-internet-explorer"></i></a>
                            <a href="{{ $contact->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="{{ $contact->youtube }}" class="instagram"><i class="bx bxl-youtube"></i></a>
                            <a href="{{ $contact->linkedIn }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="row">
                @foreach($numbers as $number)
                <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>{{ $number->email }}</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-box ">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>{{ $number->phone }}</p>
                    </div>
                </div>

                @endforeach
            </div>



            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                            required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"
                            required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
    </section><!-- End Contact Us Section -->

</div>

<div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.334582485276!2d90.40498071455235!3d23.73730378458817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f360385db5%3A0xa115112c746430a9!2sOpus%20Technology%20Limited!5e0!3m2!1sen!2snp!4v1604921178092!5m2!1sen!2snp"
        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe>
</div>
@endsection
