@extends('front.layouts.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol class="carousel-indicators" id="hero-carousel-indicators">
                @foreach ($slider as $key => $sliders)
                <li data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">
                @foreach ($slider as $key => $sliders)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                    style="background-image: url('{{ asset('uploads/slider/'.$sliders->image) }}');">
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animate__animated animate__fadeInDown">{{ $sliders->title }}</h2>
                            <p class="animate__animated animate__fadeInUp">{{ $sliders->description }}</p>
                            <a href="{{ $sliders->link }}"
                                class="btn-get-started animate__animated animate__fadeInUp scrollto">{{
                                $sliders->button_name }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section>

<!-- ======= About Us Section ======= -->
{{-- <section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('front-assets/img/about.jpg')}}" class="img-fluid" alt="">
                <a href="https://youtu.be/eNz-5QvXmog?si=P5S7DF078CSD3xj1" class="venobox play-btn mb-4"
                    data-vbtype="video" data-autoplay="true"></a>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <h2>Who We Are</h2>
                    <p>Opus Technology Limited is a company that specializes in creating, designing, maintaining
                        software applications, developing custom software, mobile apps, web development,
                        artificial intelligence, games, animation and so. Opus Technology Limited started
                        operating from 2012 and since then delivering advanced software that empowers,
                        innovates, and transforms the office completely and digitally for all our clients.</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-rocket"></i></div>
                    <h4 class="title"><a href="">Our Mission</a></h4>
                    <p class="description">We aim to provide world-class software solutions for all our
                        prospective clients from all over the world and build the best innovative software using
                        our cutting edge technology and expert software development team.</p>
                </div>

                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-compass"></i></div>
                    <h4 class="title"><a href="">Our Vision</a></h4>
                    <p class="description">We want to serve customers from every corner of the world and provide
                        them with the best IT solutions so that we are able to create a worldwide goodwill on
                        the IT sector and achieve good worldwide recognition for being one of the best IT
                        companies out there.</p>
                </div>

            </div>
        </div>

    </div>
</section><!-- End About Us Section --> --}}

{{-- firts section --}}

<!-- ======= About Us Section ======= -->
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



<!-- ======= About Lists Section ======= -->
<section class="about-lists">
    <div class="container">

        <div class="row no-gutters">

            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
                <span>01</span>
                <h4>First Class Developers</h4>
                <p>When you work with Opus you strengthen your project with top talents. All of our developers
                    have 5+ years of expresiences.</p>
            </div>

            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                <span>02</span>
                <h4>Software Industry Leader</h4>
                <p>United Nation, DB Schenker, Bangladesh Government, BRAC, Bangladesh Police, bKash and
                    hundreds of world-wide use Opus software every day.</p>
            </div>

            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
                <span>03</span>
                <h4> We Build Relationships</h4>
                <p>Our clients trust us to deliver just what they need and we do just that. Always on time, with
                    zero hassle. So they will give us new project most of the time.</p>
            </div>

            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
                <span>04</span>
                <h4>Cost Effective</h4>
                <p>Our costs are determined by one single factor: Your budget. We adapt yo you and stick to the
                    numbers we agree on. From the beginning to the very end.</p>
            </div>

            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
                <span>05</span>
                <h4>Innovative Solutions</h4>
                <p>We specialize in creating innovative solutions tailored to your specific needs. Our team
                    stays updated with the latest technologies to deliver cutting-edge products.</p>
            </div>

            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
                <span>06</span>
                <h4>Customer Support</h4>
                <p>Our commitment doesn't end with project delivery. We provide exceptional customer support,
                    ensuring that your questions and concerns are addressed promptly and professionally.</p>
            </div>


        </div>

    </div>
</section><!-- End About Lists Section -->

<!-- ======= Counts Section ======= -->
<section class="counts section-bg">
    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                <div class="count-box">
                    <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="360" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Successful Project Implementation</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                    <i class="bi bi-document-folder" style="color: #c042ff;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Customers Worldwide</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="count-box">
                    <i class="bi bi-live-support" style="color: #46d1ff;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Resources</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                <div class="count-box">
                    <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
                    <span data-purecounter-start="0" data-purecounter-end="45" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Technical Resources</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Services</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                    excepturi sint occaecati cupiditate non provident</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-bounding-box"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat tarad limino ata</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-globe"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu fugiat nulla pariatur</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-broadcast"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                    praesentium voluptatum deleniti atque</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                <div class="icon"><i class="bi bi-calendar2-week"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                    tempore, cum soluta nobis est eligendi</p>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->

<!-- ======= Our Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
            <h2>Our Portfolio</h2>
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

            <div class="col-lg-4 col-md-6 portfolio-item filter-fin">
                <div class="portfolio-wrap">
                    <img src="{{ asset('front-assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('front-assets/img/portfolio/portfolio-1.jpg')}}"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-sig">
                <div class="portfolio-wrap">
                    <img src="{{ asset('front-assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('front-assets/img/portfolio/portfolio-2.jpg')}}"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-fin">
                <div class="portfolio-wrap">
                    <img src="{{ asset('front-assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('front-assets/img/portfolio/portfolio-3.jpg')}}"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-sig">
                <div class="portfolio-wrap">
                    <img src="{{ asset('front-assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('front-assets/img/portfolio/portfolio-5.jpg')}}"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-fin">
                <div class="portfolio-wrap">
                    <img src="{{ asset('front-assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('front-assets/img/portfolio/portfolio-6.jpg')}}"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 portfolio-item filter-sig">
                <div class="portfolio-wrap">
                    <img src="{{ asset('front-assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('front-assets/img/portfolio/portfolio-9.jpg')}}"
                                data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Our Portfolio Section -->

<!-- ======= Our Team Section ======= -->
<section id="team" class="team">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Our Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
        </div>

        <div class="row">
            @foreach($teamMembers as $member)
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                <div class="member">
                    <div class="pic">
                        <img src="/uploads/users/{{ $member->image }}" class="img-fluid" alt="{{ $member->name }}"
                            height="300px" width="350px">
                    </div>

                    <div class="member-info">
                        <h4>{{ $member->name }}</h4>
                        <span>{{ $member->designation }}</span>
                        <div class="social">
                            @if($member->twitter)
                            <a href="{{ $member->twitter }}"><i class="bi bi-twitter"></i></a>
                            @endif
                            @if($member->facebook)
                            <a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>
                            @endif
                            @if($member->instagram)
                            <a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>
                            @endif
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Team Section -->

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

            <div class="col-lg-6 faq-item" data-aos="fade-up">
                <h4>Non consectetur a erat nam at lectus urna duis?</h4>
                <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                    curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
            </div>

            <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
                <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
                <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                    laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                    Est pellentesque elit ullamcorper dignissim.
                </p>
            </div>

            <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
                <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
                <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                    elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus
                    pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
                </p>
            </div>

            <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
                <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
                <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                    laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                    Est pellentesque elit ullamcorper dignissim.
                </p>
            </div>

            <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
                <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
                <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                    ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
                    bibendum est. Purus gravida quis blandit turpis cursus in
                </p>
            </div>

            <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
                <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?
                </h4>
                <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer
                    malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem
                    dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
            </div>

        </div>

    </div>
</section><!-- End Frequently Asked Questions Section -->

<!-- ======= Contact Us Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact Us</h2>
        </div>

        <div class="row">

            <div class="col-lg-6 d-flex" data-aos="fade-up">
                <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>Bangladesh Office
                        Khan Tower (2nd Floor & 4th Floor)
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

    </div>
</section><!-- End Contact Us Section -->


@endsection
