@extends('front.layouts.app')

@section('content')


<div class="contact-bg">
    {{-- <h3>Get in Touch with Us</h3> --}}
    <h2>Services</h2>
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <p class="text">We provide Amazing Solutions</p>
</div>

<!-- =======  Custom Software ======= -->

<div class="section-title">
    <h2>Custom Software Development</h2>
    <p></p>
</div>

<section id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box" >
                <img src="{{ asset('uploads/first_section/service1.png') }}" class="img-fluid"
                    alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <img src="" class="img-fluid"
                        alt="">
                        <div class="col-lg col-md icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                            <h4 class="title" style="text-align: left"><a href="">
                                Custom Software Development </a></h4>
                            <p class="description">Is the designing of software applications for a specific user or group of users within an organization. Such software is designed to address their needs precisely as opposed to the more traditional and widespread off-the-shelf software</p>
                        </div>
                        <div class="col-lg col-md icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                            <h4 class="title" style="text-align: left"><a href="">Development of Tailored Software</a></h4>
                            <p class="description">In a service that offers the development of a software application that can be since its conceptualization through the operation, such applications can be a new creation or already existing in an organization that desires to provide outsourcing.</p>
                        </div>
                        <div class="col-lg col-md icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                            <h4 class="title" style="text-align: left"><a href="">
                                Ensure Software </a></h4>
                            <p class="description">Is a quality assurance service for software applications where the purpose is to identify incidents (defects and requirements) that can compromise the performance of the application in operation.</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =======  Mobile Application ======= -->

<div class="section-title">
    <h2>Mobile Application Development</h2>
    <p></p>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/service2.png') }}" class="img-service" alt="" >
            </div>
        </div>

    </div>
</div>

<section id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>Mobile application development is a term used to denote the act or process by which application software is developed for handheld devices, such as personal digital assistants, enterprise digital assistants or mobile phones.Mobile application development is the set of processes and procedures involved in writing software for small, wireless computing devices such as Smartphone or tablets. Mobile application development is similar to Web application development and has its roots in more traditional software development. </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>One critical difference, however, is that mobile applications (apps) are often written specifically to take advantage of the unique features a particular mobile device offers. For instance, a gaming app might be written to take advantage of the iPhone's accelerator. One way to ensure that applications show optimum performance on a given device is to develop the application (app) natively on that device. This means that at a very low level, the code is written specifically for the processor in a particular device. When an app needs to run on multiple operating systems, however, there is little -- if any -- code that can be reused from the initial development. The application must essentially be rewritten for each specific device.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- =======  Web Application Development ======= -->

<div class="section-title">
    <h2>Web Application Development</h2>
    <p></p>
</div>

<section id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service3.png') }}" class="img-fluid"
                    alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <p>Web application development is the process and practice of developing web applications. Considering this, along with its unique characteristics, popular frameworks used include the spiral approach and business-oriented approach to application development, among other models that address the requirements for an iterative process.There is a consensus that the processes involved are extensions of standard software engineering processes.</p>
                    <br>
                    <p>Web application development Just as with a traditional desktop application, web applications have varying levels of risk. A personal home page is much less risky than, for example, a stock trading web site. For some projects security, software bugs, etc. are major issues. If time to market, or technical complexity is a concern, documentation, test planning, change control, requirements analysis, architectural description and formal design and construction practices can mitigate risk.</p>
                </div>

            </div>
            <div class="section-title">
                <p>A study conducted involving web engineering practice revealed that web application development has several characteristics that have to be addressed and these include: short development life-cycle times; different business models; multi-disciplinary development teams; small development teams working on similar tasks; business analysis and evaluation with end-users; explicit requirement and rigorous training against requirements; and, maintenance.</p>
            </div>

        </div>


    </div>
</section>

<!-- =======  Business Intelligence ======= -->

<div class="section-title">
    <h2>Business Intelligence</h2>
    <p></p>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/service4.gif') }}" class="img-service" alt="" >
            </div>
        </div>
        <div class="section-title">
            <p>
                Business intelligence (BI) comprises the strategies and technologies used by enterprises for the data analysis of business information. BI technologies provide historical, current and predictive views of business operations. Common functions of business intelligence technologies include reporting, online analytical processing, analytics, data mining, process mining, complex event processing, business performance management, benchmarking, text mining, predictive analytics and prescriptive analytics. BI technologies can handle large amounts of structured and sometimes unstructured data to help identify, develop and otherwise create new strategic business opportunities. They aim to allow for the easy interpretation of these big data. Identifying new opportunities and implementing an effective strategy based on insights can provide businesses with a competitive market advantage and long-term stability.
            </p>
            <br>
            <p>
                It can be used by enterprises to support a wide range of business decisions ranging from operational to strategic. Basic operating decisions include product positioning or pricing. Strategic business decisions involve priorities, goals and directions at the broadest level. In all cases, BI is most effective when it combines data derived from the market in which a company operates (external data) with data from company sources internal to the business such as financial and operations data (internal data). When combined, external and internal data can provide a complete picture which, in effect, creates an "intelligence" that cannot be derived from any singular set of data. Amongst myriad uses, business intelligence tools empower organizations to gain insight into new markets, to assess demand and suitability of products and services for different market segments and to gauge the impact of marketing efforts.
            </p>
        </div>

    </div>
</div>



@endsection
