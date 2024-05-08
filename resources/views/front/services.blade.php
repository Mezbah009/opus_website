@extends('front.layouts.app')

@section('content')


<div class="contact-bg" style="background-image: url('{{ asset("front-assets/img/contact-bg.jpg") }}');">
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

<div class="section-title" style="padding-top: 60px">
    <h2>Custom Software Development</h2>
    <p></p>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service1.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <img src="" class="img-fluid" alt="">
                    <div class="col-lg col-md icon-box" data-aos="fade-up">
                        <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                        <h4 class="title" style="text-align: left"><a href="">
                                Custom Software Development </a></h4>
                        <p class="description">Is the designing of software applications for a specific user or group of
                            users within an organization. Such software is designed to address their needs precisely as
                            opposed to the more traditional and widespread off-the-shelf software</p>
                    </div>
                    <div class="col-lg col-md icon-box" data-aos="fade-up">
                        <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                        <h4 class="title" style="text-align: left"><a href="">Development of Tailored Software</a></h4>
                        <p class="description">In a service that offers the development of a software application that
                            can be since its conceptualization through the operation, such applications can be a new
                            creation or already existing in an organization that desires to provide outsourcing.</p>
                    </div>
                    <div class="col-lg col-md icon-box" data-aos="fade-up">
                        <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
                        <h4 class="title" style="text-align: left"><a href="">
                                Ensure Software </a></h4>
                        <p class="description">Is a quality assurance service for software applications where the
                            purpose is to identify incidents (defects and requirements) that can compromise the
                            performance of the application in operation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =======  Mobile Application ======= -->

<div class="section-title">
    <h2>Mobile Application Development</h2>
    <p></p>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/service2.png') }}" class="img-service" alt="">
            </div>
        </div>

    </div>
</div>

<section id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>Mobile application development is a term used to denote the act or process by which application
                        software is developed for handheld devices, such as personal digital assistants, enterprise
                        digital assistants or mobile phones.Mobile application development is the set of processes and
                        procedures involved in writing software for small, wireless computing devices such as Smartphone
                        or tablets. Mobile application development is similar to Web application development and has its
                        roots in more traditional software development. </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>One critical difference, however, is that mobile applications (apps) are often written
                        specifically to take advantage of the unique features a particular mobile device offers. For
                        instance, a gaming app might be written to take advantage of the iPhone's accelerator. One way
                        to ensure that applications show optimum performance on a given device is to develop the
                        application (app) natively on that device. This means that at a very low level, the code is
                        written specifically for the processor in a particular device. When an app needs to run on
                        multiple operating systems, however, there is little -- if any -- code that can be reused from
                        the initial development. The application must essentially be rewritten for each specific device.
                    </p>
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

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service3.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                <div class="section-title">
                    <p>Web application development is the process and practice of developing web applications.
                        Considering this, along with its unique characteristics, popular frameworks used include the
                        spiral approach and business-oriented approach to application development, among other models
                        that address the requirements for an iterative process.There is a consensus that the processes
                        involved are extensions of standard software engineering processes.</p>
                    <br>
                    <p>Web application development Just as with a traditional desktop application, web applications have
                        varying levels of risk. A personal home page is much less risky than, for example, a stock
                        trading web site. For some projects security, software bugs, etc. are major issues. If time to
                        market, or technical complexity is a concern, documentation, test planning, change control,
                        requirements analysis, architectural description and formal design and construction practices
                        can mitigate risk.</p>
                </div>

            </div>
            <div class="section-title">
                <p>A study conducted involving web engineering practice revealed that web application development has
                    several characteristics that have to be addressed and these include: short development life-cycle
                    times; different business models; multi-disciplinary development teams; small development teams
                    working on similar tasks; business analysis and evaluation with end-users; explicit requirement and
                    rigorous training against requirements; and, maintenance.</p>
            </div>

        </div>


    </div>
</div>

<!-- =======  Business Intelligence ======= -->

<div class="section-title">
    <h2>Business Intelligence</h2>
    <p></p>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/service4.gif') }}" class="img-service" alt="">
            </div>
        </div>
        <div class="section-title">
            <p>
                Business intelligence (BI) comprises the strategies and technologies used by enterprises for the data
                analysis of business information. BI technologies provide historical, current and predictive views of
                business operations. Common functions of business intelligence technologies include reporting, online
                analytical processing, analytics, data mining, process mining, complex event processing, business
                performance management, benchmarking, text mining, predictive analytics and prescriptive analytics. BI
                technologies can handle large amounts of structured and sometimes unstructured data to help identify,
                develop and otherwise create new strategic business opportunities. They aim to allow for the easy
                interpretation of these big data. Identifying new opportunities and implementing an effective strategy
                based on insights can provide businesses with a competitive market advantage and long-term stability.
            </p>
            <br>
            <p>
                It can be used by enterprises to support a wide range of business decisions ranging from operational to
                strategic. Basic operating decisions include product positioning or pricing. Strategic business
                decisions involve priorities, goals and directions at the broadest level. In all cases, BI is most
                effective when it combines data derived from the market in which a company operates (external data) with
                data from company sources internal to the business such as financial and operations data (internal
                data). When combined, external and internal data can provide a complete picture which, in effect,
                creates an "intelligence" that cannot be derived from any singular set of data. Amongst myriad uses,
                business intelligence tools empower organizations to gain insight into new markets, to assess demand and
                suitability of products and services for different market segments and to gauge the impact of marketing
                efforts.
            </p>
        </div>

    </div>
</div>

<!-- ======= Artificial Intelligence (AI) ======= -->

<div class="section-title">
    <h2>Artificial Intelligence (AI)</h2>
    <p></p>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/service5.gif') }}" class="img-service" alt="">
            </div>
        </div>
        <div class="section-title">
            <p>
                Artificial intelligence (AI), sometimes called machine intelligence, is intelligence demonstrated by
                machines, in contrast to the natural intelligence displayed by humans and other animals. In computer
                science AI research is defined as the study of "intelligent agents": any device that perceives its
                environment and takes actions that maximize its chance of successfully achieving its goals.
                Colloquially, the term "artificial intelligence" is applied when a machine mimics "cognitive" functions
                that humans associate with other human minds, such as "learning" and "problem solving".
            </p>
            <br>
            <p>
                The scope of AI is disputed: as machines become increasingly capable, tasks considered as requiring
                "intelligence" are often removed from the definition, a phenomenon known as the AI effect, leading to
                the quip, "AI is whatever hasn't been done yet."For instance, optical character recognition is
                frequently excluded from "artificial intelligence", having become a routine technology.Capabilities
                generally classified as AI as of 2017 include successfully understanding human speech, competing at the
                highest level in strategic game systems (such as chess and Go), autonomous cars, intelligent routing in
                content delivery network and military simulations.
            </p>
            <br>
            <p>
                Artificial intelligence was founded as an academic discipline in 1956, and in the years since has
                experienced several waves of optimism, followed by disappointment and the loss of funding (known as an
                "AI winter"),followed by new approaches, success and renewed funding. For most of its history, AI
                research has been divided into subfields that often fail to communicate with each other.These sub-fields
                are based on technical considerations, such as particular goals (e.g. "robotics" or "machine
                learning"),the use of particular tools ("logic" or artificial neural networks), or deep philosophical
                differences. Subfields have also been based on social factors (particular institutions or the work of
                particular researchers).
            </p>
            <br>
            <p>
                In the twenty-first century, AI techniques have experienced a resurgence following concurrent advances
                in computer power, large amounts of data, and theoretical understanding; and AI techniques have become
                an essential part of the technology industry, helping to solve many challenging problems in computer
                science.
            </p>
        </div>

    </div>
</div>

<!-- =======  Blockchain ======= -->

<div class="section-title">
    <h2>Blockchain</h2>
    <p></p>
</div>
<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service6.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>Blockchain is a system of recording information in a way that makes it difficult or impossible to
                        change, hack, or cheat the system. A blockchain is essentially a digital ledger of transactions
                        that is duplicated and distributed across the entire network of computer systems on the
                        blockchain. Each block in the chain contains a number of transactions, and every time a new
                        transaction occurs on the blockchain, a record of that transaction is added to every
                        participant’s ledger. The decentralised database managed by multiple participants is known as
                        Distributed Ledger Technology (DLT). Blockchain is a type of DLT in which transactions are
                        recorded with an immutable cryptographic signature called a hash</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =======  Internet of Things ======= -->

<div class="section-title" style="padding-top: 30px">
    <h2>Internet of Things</h2>
    <p></p>
</div>
<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>The Internet of things, or IoT, is a system of interrelated computing devices, mechanical and
                        digital machines, objects, animals or people that are provided with unique identifiers (UIDs)
                        and the ability to transfer data over a network without requiring human-to-human or
                        human-to-computer interaction. A thing in the internet of things can be a person with a heart
                        monitor implant, a farm animal with a biochip transponder, an automobile that has built-in
                        sensors to alert the driver when tire pressure is low or any other natural or man-made object
                        that can be assigned an IP address and is able to transfer data over a network.</p>
                    <br>
                    <p>Increasingly, organizations in a variety of industries are using IoT to operate more efficiently,
                        better understand customers to deliver enhanced customer service, improve decision-making and
                        increase the value of the business.</p>
                </div>
            </div>
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service7.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

<!-- =======  Outsourcing ======= -->

<div class="section-title" style="padding-top: 60px">
    <h2>Outsourcing</h2>
    <p></p>
</div>
<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service8.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>Outsourcing is an agreement in which one company contracts its own internal activity to a
                        different company. It involves the contracting out of a business process (e.g. payroll
                        processing, claims processing) and operational, and/or non-core functions (e.g. manufacturing,
                        facility management, call center support) to another party (see also business process
                        outsourcing). The concept "outsourcing" came from the American Glossary 'outside resourcing' and
                        it dates back to at least 1981. Outsourcing sometimes, though not always, involves transferring
                        employees and assets from one firm to another. Outsourcing is also the practice of handing over
                        control of public services to private enterprise.</p>
                    <br>
                    <p>Financial savings from lower international labor rates can provide a major motivation for
                        outsourcing or offshoring. There can be tremendous savings from lower international labor rates
                        when offshoring.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =======  Process Consulting ======= -->

<div class="section-title" style="padding-top: 30px">
    <h2>Process Consulting</h2>
    <p></p>
</div>
<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <p>Process Consultant Part of the field called Human Systems Intervention, process consultation is a
                        philosophy of helping, a general theory and methodology of intervening (Schein, Process
                        Consultations, 1992 revisited).</p>
                    <br>
                    <p>A process consultant is a highly qualified professional that has insights into and understands
                        the psychosocial dynamics of working with various client systems such as whole organizations,
                        groups, and individuals.</p>
                    <br>
                    <p> Given the complex nature of intervening, a process consultant's expertise includes the following
                        (and many other) aspects:</p>
                    <br>
                    <p> &rarr; works concomitantly with groups and individuals (managers/directors) towards a larger
                        change process such as strategic visioning, strategic planning, etc.</p>
                    <br>
                    <p> &rarr; based on the context, selects from a variety of methods, tools and change theories a
                        'facilitative intervention' that will most benefit the client system.</p>
                    <br>
                    <p> &rarr; stays aware of covert organizational processes, group dynamics, and interpersonal issues.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service9.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

<!-- =======  Re-engineering & Migration ======= -->

<div class="section-title" style="padding-top: 60px">
    <h2>Re-engineering & Migration</h2>
    <p></p>
</div>

<section class="about-lists">
    <div class="container">

        <div class="row no-gutters">

            <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up">
                <h4>Re-engineering & Migration</h4>
                <p>In an ever-changing business environment, every technology is likely to become obsolete sooner or
                    later as more advanced technologies become available. Reengineering and migration enable business
                    enterprises to move ahead of old company legacy systems and leverage on the benefits of
                    state-of-the-art technologies.</p>
            </div>
            <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                <h4>Challenges: Transition Inevitable</h4>
                <p>Flexibility in the business world is much more than the implementation of advanced technologies or
                    the integration of applications and databases with a Web interface. The transition from an existing
                    system to a new system is a demanding and challenging process. Not only does it imply the
                    convergence of technologies or streamlining of business functions, but also ensures that the synergy
                    enhances the scope for overall growth and progress.</p>
            </div>
            <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
                <h4> Growth Of Your Business</h4>
                <p>MIND aptly takes advantage of its human assets with a proven track record and experience in
                    cutting-edge software systems. We have never attempted to offer “readymade” solutions to our
                    clients, but have instead altered our offerings to best fit into their value chain. The
                    transformation of legacy and software systems encourages our affiliates to make the most through
                    re-engineering services.</p>
            </div>
            <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
                <h4>Solutions</h4>
                <p>MIND consistently endeavors to help its clients by positioning a new information system as a
                    strategic enabler for the overall growth of an enterprise. We ensure that the migration of
                    technology is not merely a derivative of increasing business needs, but takes place as a measure to
                    enable value addition. The amalgamation of latest technologies and our comprehensive domain
                    knowledge encourages clients to make a difference through superior business performance.</p>
            </div>


        </div>

    </div>
</section>

<div id="about" class="about" style="padding-top: 60px">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">

        <div class="row no-gutters">
            <div class="col-lg-12 video-box">
                <img src="{{ asset('uploads/first_section/service10.png') }}" class="img-service" alt="">
            </div>
        </div>

    </div>
</div>

<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <h5 style="text-align: left"><b>We Re-invent Your Business Solutions</b></h5>
                    <p>&rarr; Evaluation of existing software status </p>
                    <p>&rarr; Identification of technology that best suits your business</p>
                    <p>&rarr; Need-gap analysis and formulation of appropriate strategies</p>
                    <p>&rarr; Deveeloping & Testing</p>
                    <p>&rarr; Deployment of new technology</p>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <h5 style="text-align: left"><b>Benefits Of Our Migration And Re-engineering Services</b></h5>
                    <p>&rarr; Elimination of system bottlenecks associated with business performance</p>
                    <p>&rarr; Increased scalability in tandem with the needs of your enterprise</p>
                    <p>&rarr; Ensuring complete utilization of resources</p>
                    <p>&rarr; Superior integration capabilities and improved access to sophisticated data</p>
                    <p>&rarr; Enhanced user interface enabling improved functionalities and workflow management</p>
                </div>
            </div>

        </div>
</div>


<!-- =======  Audit as a Service ======= -->

<div class="section-title">
    <h2>Audit as a Service</h2>
    <p></p>
</div>
<div id="about" class="about">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service11.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">
                    <h5 style="text-align: left"><b>Is Your Website Working for You?</b></h5>
                    <p>Even the best websites have room for improvement. In order for your website to operate
                        effectively as the hub of your digital marketing efforts, you need a website that is optimized
                        for peak performance and user experience. With a website audit, you’ll discover what about your
                        website is working and where improvements can help you grow. With new technology and strategies
                        for online success developing every day, you need a team to stay on top of the latest trends.
                        Web audits give you the confidence to know that your website is a valuable operational tool for
                        cutting through the noise and conveying your message to your audience.</p>
                    <br>
                    <h5 style="text-align: left"><b>Areas of the website audit</b></h5>
                    <p>Every website is unique so it has specific needs and problems to be fixed. So we start with a
                        quick review of your site in a number of areas. This lets us know which special in-depth audits
                        to recommend to you.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =======  Digital Marketing ======= -->

<div class="section-title">
    <h2>Digital Marketing</h2>
    <p></p>
</div>
<div id="about" class="about" style="padding-bottom: 60px">
    <div class="container" data-aos="fade-up" style="box-shadow: none;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                <div class="section-title">

                    <p>Digital marketing has been in existence since the 1990’s, it gained its popularity in the early
                        2000s and is still a growing field and it has shifted the way businesses use technology for
                        marketing their products.Marketing is about creating a connection with your audience at the
                        right place and time and offering value to your customers and society at large.</p>
                    <br>

                    <details style="text-align: left">
                        <summary><b>So What is Digital Marketing?</b></summary>
                        <div>
                            Digital Marketing is any form of creating awareness or promoting products or services that
                            involve using an electronic device. Digital marketing can be operated in both online and
                            offline. Offline is any media channels that aren’t connected to the internet. These channels
                            include billboards, television ads, telemarketing, radio, print advertising, signs, and
                            pamphlets. In this article, I will be focusing on online marketing because offline marketing
                            is no more functioning as it used to be. Online marketing is the future now. Let’s take a
                            tour and discuss some of the areas of online marketing that will give us a clear overview of
                            the online world.
                        </div>
                    </details>
                    <details style="text-align: left">
                        <summary><b>Does Digital Marketing Work For Business?</b></summary>
                        <div>
                            <p>The answer is yes it does work</p>
                            <br>
                            When you use the right methods and strategies, you will surely take your business to the
                            next level. Many businesses fail because they do not follow the right methods in approaching
                            digital marketing. Digital marketing has its guides and steps that you must follow in order
                            to succeed in the digital world. What are the benefits of digital marketing? Digital
                            marketing has given you an in-depth knowledge on how the online marketing works. Through
                            digital marketing, you will be able to strategize and put proper measures into building your
                            business and reaching a large number of targeted customers.
                    </details>
                </div>
            </div>
            <div class="col-lg-6 video-box">
                <img src="{{ asset('uploads/first_section/service12.png') }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="section-title">
            <p>Digital marketing has now become the new face that is driving the internet world. Many people have heard
                the word internet but they do not fully understand how it works and its benefits, and this has raised
                curiosity in them wanting to know more about digital marketing.</p>
        </div>
    </div>
</div>




@endsection
