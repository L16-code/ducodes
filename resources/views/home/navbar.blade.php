<header class="z-fixed pt-lg-4 header-absolute-top header-transparent sticky-reverse ">
    <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
        <div class="container position-relative">
            <!--Logo Brand-->
            <a class="navbar-brand" href="index.html">
                <img src="assets/img/logo/logo-white.svg" alt="" class="img-fluid">
            </a>

            <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i></i>
                    </span>
                </button>
                <!--Navbar Button-->
                <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5">
                    <a href="#" class="btn btn-success btn-sm rounded-pill">Purchase</a>
                </div>
            </div>

            <!--Navbar Collapse-->
            <div class="collapse navbar-collapse" id="mainNavbarTheme">

                <!--begin:Navbar items-->
                <ul class="navbar-nav ms-auto">

                    <!--begin:landings-->
                    <li class="nav-item ">
                        <a class="nav-link active" href=" {{route('homepage')}}" role="button"
                            >Landings
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
                    <!--end:Pages-->
                </ul>
                <!--end:Navbar items-->

            </div>
        </div>
    </nav>
</header>

