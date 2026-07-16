<header class="z-fixed site-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid px-xl-9 position-relative">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <span class="navbar-brand-light fw-bold fs-3 text-primary">DuCodes</span>
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
                        <a class="nav-link dropdown-toggle active" href="{{ route('services.index') }}" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-start py-0 pe-lg-0">
                            <div class="overflow-hidden rounded-end">
                                <div class="row mx-0">
                                    <div class="col-lg-5 position-relative">
                                        <div class="py-1 py-lg-3 d-lg-flex flex-column">
                                            <a href="{{ route('services.show', 'custom-software-development') }}" class="dropdown-item">Custom Software Development</a>
                                            <a href="{{ route('services.show', 'laravel-development') }}" class="dropdown-item">Laravel Development</a>
                                            <a href="{{ route('services.show', 'web-development') }}" class="dropdown-item">Web Development</a>
                                            <a href="{{ route('services.show', 'mobile-app-development') }}" class="dropdown-item">Mobile App Development</a>
                                            <a href="{{ route('services.show', 'ai-development') }}" class="dropdown-item">AI &amp; Generative AI</a>
                                            <a href="{{ route('services.show', 'zoho-development') }}" class="dropdown-item">Zoho Development</a>
                                            <a href="{{ route('services.show', 'salesforce-development') }}" class="dropdown-item">Salesforce Development</a>
                                            <a href="{{ route('services.show', 'hubspot-development') }}" class="dropdown-item">HubSpot Development</a>
                                            <a href="{{ route('services.show', 'devops') }}" class="dropdown-item">DevOps Services</a>
                                            <a href="{{ route('services.show', 'crm-erp-integration') }}" class="dropdown-item">CRM &amp; ERP Integration</a>
                                            <a href="{{ route('services.show', 'power-bi-data-solutions') }}" class="dropdown-item">Power BI &amp; Data Solutions</a>
                                            <a href="{{ route('services.show', 'ui-ux-design') }}" class="dropdown-item">UI/UX &amp; Graphic Design</a>
                                            <a href="{{ route('services.index') }}" class="dropdown-item fw-semibold text-primary">View all services <i class="bi bi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                    <!--/.col-->
                                    <div class="col-lg-7 d-none rounded-end overflow-hidden px-0 d-lg-block position-relative bg-no-repeat bg-cover bg-center"
                                        style="background-image: url('{{ asset('assets/img/960x1140/3.jpg') }}')">
                                        <div
                                            class="position-absolute rounded-end w-100 h-100 top-0 start-0 bg-gradient-primary opacity-75">
                                        </div>
                                        <div
                                            class="p-4 d-flex flex-column align-items-center text-center justify-content-center h-100 py-5 position-relative text-white">
                                            <h5 class="fs-1 mb-4">Build stunning website ease</h5>
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
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'zoho') }}">Zoho</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'gen-ai') }}">Gen Ai</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'nodejs') }}">Node.js</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'java') }}">Java</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'laravel') }}">Laravel</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'python') }}">Python</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'graphic-designer') }}">Graphic
                                                    designer</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'mern') }}">MERN</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'salesforce') }}">Salesforce</a>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-3">
                                        <div class="h-100">
                                            <div>

                                                <a class="dropdown-item" href="{{ route('hire.developer', 'react') }}">React
                                                    Js</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'power-bi') }}">Power
                                                    Bi</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'spring-boot') }}">Spring
                                                    Boot</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'angular') }}">Angular Js</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'seo') }}">SEO </a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'ai-ml') }}">AI/ML </a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'asp-net') }}">Asp.net </a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'mean') }}">MEAN</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'hubspot') }}">HubSpot</a>


                                            </div>
                                        </div>
                                    </div>
                                    <!--Dropdown-grid-Col-->
                                    <div class="col-lg-3">
                                        <div class="h-100">
                                            <div>


                                                <a class="dropdown-item" href="{{ route('hire.developer', 'devops') }}">Devops</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'react-native') }}">React
                                                    Native</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'ionic') }}">Ionic</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'flutter') }}">Flutter</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'php') }}">PHP</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'wordpress') }}">Wordpress</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'shopify') }}">Shopify</a>
                                                <a class="dropdown-item" href="{{ route('hire.developer', 'database-engineer') }}">Database
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
                        <a class="nav-link " href="{{ route('blogs') }}" role="button" aria-haspopup="true"
                            aria-expanded="false" data-bs-auto-close="outside">Blog
                        </a>
                    </li>
                    <!--end:blog-->

                    <!--begin:company-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Company
                        </a>
                        <div class="dropdown-menu p-lg-3 dropdown-menu-end dropdown-menu-xs">
                            <a class="dropdown-item" href="{{ route('about') }}">
                                About Us
                            </a>
                            <a class="dropdown-item" href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </div>
                    </li>
                    <!--end:company-->
                    <!--end:Pages-->
                </ul>
                <!--end:Navbar items-->

            </div>
        </div>
    </nav>
</header>
