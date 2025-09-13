<header class="z-fixed pt-lg-2 header-transparent header-absolute-top header-sticky">
    <nav class="navbar shadow-none navbar-expand-lg navbar-light">
        <div class="container-fluid px-xl-9 position-relative">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="assets/img/logo/logo.svg" alt="" class="img-fluid navbar-brand-light">
                <img src="assets/img/logo/logo-white.svg" alt="" class="img-fluid navbar-brand-dark">
            </a>
            <div class=" d-flex align-items-center navbar-no-collapse-items order-lg-last ">
                <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i></i>
                    </span>
                </button>
                <div class="nav-item me-3 me-lg-0 ms-lg-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary hover-lift">
                        Request A Quote</a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="mainNavbarTheme">

                <!--begin:Navbar items-->
                <ul class="navbar-nav ms-auto">

                    <!--begin:landings-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="{{ route('home') }}" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-start py-0 pe-lg-0">
                            <div class="overflow-hidden rounded-end">
                                <div class="row mx-0">
                                    <div class="col-lg-5 position-relative">
                                        <div class="py-1 py-lg-3 d-lg-flex flex-column">
                                            <a href="index.html" class="dropdown-item">Mobile App Development</a>
                                            <a href="index-landing-agency.html" class="dropdown-item">Software
                                                Development</a>
                                            <a href="index-landing-business.html" class="dropdown-item">Zoho
                                                Development</a>
                                            <a href="index-landing-business.html" class="dropdown-item">Salesforce
                                                Development</a>
                                            <a href="index-landing-business.html" class="dropdown-item">HubSpot
                                                Development</a>
                                            <a href="index-landing-startup.html" class="dropdown-item">Gen Ai
                                                Chatbot</a>
                                            <a href="index-landing-startup.html" class="dropdown-item">Power BI
                                                Solutions</a>
                                            <a href="index-landing-startup.html" class="dropdown-item">Payment Gateway
                                                Integrations</a>
                                            <a href="index-landing-startup.html" class="dropdown-item">Digital Marketing
                                                Solutions</a>
                                            <a href="index-landing-classic.html" class="dropdown-item">Web
                                                Development</a>
                                            <a href="index-landing-startup.html" class="dropdown-item">E-commerce
                                                development</a>
                                            <a href="index-landing-creative.html" class="dropdown-item">Graphic
                                                Designing</a>
                                        </div>
                                    </div>
                                    <!--/.col-->
                                    <div class="col-lg-7 d-none rounded-end overflow-hidden px-0 d-lg-block position-relative bg-no-repeat bg-cover bg-center"
                                        style="background-image: url('assets/img/960x1140/3.jpg')">
                                        <div
                                            class="position-absolute rounded-end w-100 h-100 top-0 start-0 bg-gradient-primary opacity-75">
                                        </div>
                                        <div
                                            class="p-4 d-flex flex-column align-items-center text-center justify-content-center h-100 py-5 position-relative text-white">
                                            <h5 class="fs-1 mb-4">Build stunning website ease</h5>
                                            {{-- <p class="mb-5 small">Over 7000+ users & 7+ years of regular updates</p> --}}
                                            <a href="{{ route('contact') }}" class="btn btn-white btn-lg">Contact Us</a>
                                        </div>
                                    </div>
                                    <!--/.col-->
                                </div>
                                <!--/.row-->
                            </div>
                        </div>
                    </li>
                    <!--end:landings-->

                    <!--begin:hire a developer-->
                    <li class="nav-item dropdown position-lg-static">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Hire A Developer
                        </a>
                        <div class="dropdown-menu dropdown-menu-fw px-lg-0">
                            <div class="dropdown-scroll-lg">
                                <div class="row mx-lg-0 justify-content-lg-around">
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-3">
                                        <div class="h-100">
                                            <div>
                                                <img src="{{ asset('assets/img/960x640/1.jpg') }}"
                                                    class="img-fluid rounded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-3">
                                        <div class="h-100">
                                            <div>
                                                <a class="dropdown-item" href="component-clients.html">Zoho</a>
                                                <a class="dropdown-item" href="component-clients.html">Gen Ai</a>
                                                <a class="dropdown-item" href="component-count-down.html">Node.js</a>
                                                <a class="dropdown-item" href="component-clients.html">Java</a>
                                                <a class="dropdown-item" href="component-counteup.html">Laravel</a>
                                                <a class="dropdown-item" href="component-clients.html">Python</a>
                                                <a class="dropdown-item" href="component-clients.html">Graphic
                                                    designer</a>
                                                <a class="dropdown-item" href="component-clients.html">MERN</a>
                                                <a class="dropdown-item" href="component-clients.html">Salesforce</a>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-3">
                                        <div class="h-100">
                                            <div>

                                                <a class="dropdown-item"
                                                    href="component-icons-social-brands.html">React
                                                    Js</a>
                                                <a class="dropdown-item" href="component-isotope-filter.html">Power
                                                    Bi</a>
                                                <a class="dropdown-item" href="component-isotope-filter.html">Spring
                                                    Boot</a>
                                                <a class="dropdown-item" href="component-lightbox.html">Angular Js</a>
                                                <a class="dropdown-item" href="component-lightbox.html">SEO </a>
                                                <a class="dropdown-item" href="component-lightbox.html">AI/ML </a>
                                                <a class="dropdown-item" href="component-lightbox.html">Asp.net </a>
                                                <a class="dropdown-item" href="component-lightbox.html">MEAN</a>
                                                <a class="dropdown-item" href="component-lightbox.html">HubSpot</a>


                                            </div>
                                        </div>
                                    </div>
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-3">
                                        <div class="h-100">
                                            <div>


                                                <a class="dropdown-item"
                                                    href="component-swiper-slider.html">Devops</a>
                                                <a class="dropdown-item" href="component-scroll-spy.html">React
                                                    Native</a>
                                                <a class="dropdown-item" href="component-spinners.html">Ionic</a>
                                                <a class="dropdown-item" href="component-spinners.html">Flutter</a>
                                                <a class="dropdown-item" href="component-spinners.html">PHP</a>
                                                <a class="dropdown-item" href="component-spinners.html">Wordpress</a>
                                                <a class="dropdown-item" href="component-spinners.html">Shopify</a>
                                                <a class="dropdown-item" href="component-spinners.html">Database
                                                    Engineer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--end:hire a developer-->
                    <!--begin:blog-->
                    <li class="nav-item ">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">Blog
                        </a>
                    </li>
                    <!--end:blog-->

                    <!--begin:company-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Company
                        </a>
                        <div class="dropdown-menu p-lg-3 dropdown-menu-end dropdown-menu-xs">
                            <a class="dropdown-item" target="_blank" href="about.html">
                                About Us
                            </a>
                            <a class="dropdown-item" target="_blank" href="contact.html">
                                Contact Us
                            </a>
                            <a class="dropdown-item" target="_blank" href="mission-vision.html">
                                Mission & Vision
                            </a>
                            <a class="dropdown-item" target="_blank" href="internship.html">
                                Internship
                            </a>
                            {{-- <a class="dropdown-item" target="_blank" href="event-landing.html">
                                Event Landing
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" target="_blank" href="demo-rtl.html">
                                RTL Starter
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" target="_blank"
                                href="https://uigator.com/assan/5.4/main-tailwindcss/">
                                Main Tailwindcss <span class="badge text-bg-success ms-1">New</span>
                            </a>
                            <a class="dropdown-item" target="_blank"
                                href="https://uigator.com/assan/5.4/admin-dashboard-tailwindcss/">
                                TailwindCss Dashboard
                            </a>
                            <a class="dropdown-item" target="_blank"
                                href="https://uigator.com/assan/5.4/admin-dashboard/">
                                Admin Dashboard
                            </a>
                            <a class="dropdown-item" target="_blank"
                                href="https://uigator.com/assan/5.4/nft-marketplace/">
                                NFT Marketplace
                            </a>
                            <a class="dropdown-item" target="_blank"
                                href="https://uigator.com/assan/5.4/blog-magazine/index.html">
                                Blog Magazine
                            </a> --}}
                            <!--footer-->
                            {{-- <div class="p-3">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">

                                        <span class="flex-grow-1 small text-body-secondary">Many more demos
                                            coming soon...</span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </li>
                    <!--end:company-->

                    <!--begin:managed services-->
                    <li class="nav-item">
                        <a class="nav-link " href="#">Managed Services
                        </a>
                    </li>
                    <!--end:managed services-->
                    <!--end:Pages-->
                </ul>
                <!--end:Navbar items-->

            </div>
        </div>
    </nav>
</header>
