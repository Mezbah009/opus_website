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
        <h3>Get in Touch with Us</h3>
        <h2>contact us</h2>
        <div class="line">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda iste facilis quos impedit fuga nobis modi debitis laboriosam velit reiciendis quisquam alias corporis, maxime enim, optio ab dolorum sequi qui.</p>
    </div>


    <div class="contact-body">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-6 d-flex" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Bangladesh Office
                                Khan Tower (2nd Floor & 4th Floor) <br>
                                80/3, VIP Road, Kakrail
                                Dhaka, Bangladesh.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@opus-bd.com<br>support@opus-bd.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box ">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+8801811317129<br>+8801765258599</p>
                        </div>
                    </div>

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
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

            </div>
        </section><!-- End Contact Us Section -->

    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.334582485276!2d90.40498071455235!3d23.73730378458817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f360385db5%3A0xa115112c746430a9!2sOpus%20Technology%20Limited!5e0!3m2!1sen!2snp!4v1604921178092!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
@endsection