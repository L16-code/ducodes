<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:05 GMT -->

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    @include('home.homecss')
</head>

<body>

    <!-- Preloader -->
    {{-- @include('home.loader') --}}
    <!-- End Preloader -->

    <!-- Navbar -->
    @include('home.navbar')
    <!-- End Navbar -->

    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Our Blogs</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog -->
    <section class="blog-area blog-area-two  pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".3s">
                        <a href="blog-details.html">
                            <img src="assets/img/home-one/blog/1.jpg" alt="Blog">
                        </a>
                        <div class="blog-inner">
                            <span>Rights Case</span>
                            <h3>
                                <a href="blog-details.html">Justice May For You If You Are Innocent</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    20 Feb 2024
                                </li>
                                <li>
                                    <i class="icofont-user-alt-7"></i>
                                    <a href="#">John Doe</a>
                                </li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor contratc
                                ut labore.</p>
                            <a class="blog-link" href="blog-details.html">
                                Read More
                                <i class="icofont-simple-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".4s">
                        <a href="blog-details.html">
                            <img src="assets/img/home-one/blog/2.jpg" alt="Blog">
                        </a>
                        <div class="blog-inner">
                            <span>Business Case</span>
                            <h3>
                                <a href="blog-details.html">By Whom Your Business Is Being Loss?</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    20 Feb 2024
                                </li>
                                <li>
                                    <i class="icofont-user-alt-7"></i>
                                    <a href="#">John Doe</a>
                                </li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor contratc
                                ut labore.</p>
                            <a class="blog-link" href="blog-details.html">
                                Read More
                                <i class="icofont-simple-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="case-pagination">
                <ul>
                    <li>
                        <a href="blog.html">
                            <i class="icofont-simple-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="blog.html">1</a>
                    </li>
                    <li>
                        <a href="blog.html">2</a>
                    </li>
                    <li>
                        <a href="blog.html">3</a>
                    </li>
                    <li>
                        <a href="blog.html">
                            <i class="icofont-simple-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->


    <!-- Essential JS -->
    @include('home.homejs')

</body>

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:09 GMT -->

</html>
