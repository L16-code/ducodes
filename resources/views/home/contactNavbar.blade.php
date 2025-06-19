<header class="z-fixed header-transparent header-absolute-top sticky-reverse">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container position-relative">
            <a class="navbar-brand" href="index.html">
                <img src="assets/img/logo/logo.svg" alt="" class="img-fluid navbar-brand-light">
                <img src="assets/img/logo/logo-white.svg" alt="" class="img-fluid navbar-brand-dark">
            </a>
            <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i></i>
                    </span>
                </button>
                <div class="nav-item me-3 ms-lg-4 me-lg-0">
                    <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="mainNavbarTheme">

                <!--begin:Navbar items-->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item ">
                        <a class="nav-link active" href=" {{route('homepage')}}" role="button">Landings
                        </a>
                    </li>
                    <!--end:landings-->
                    <li class="nav-item">
                        <a class="nav-link" href=" {{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{route('blogs')}}">Blog</a>
                    </li>
                </ul>
                <!--end:Navbar items-->

            </div>
        </div>
    </nav>
</header>