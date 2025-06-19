<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:47:05 GMT -->

<head>
    @include('home.homecss')
</head>

<body>

    <!-- Preloader -->
    {{-- @include('home.loader') --}}
    <!-- End Preloader -->

    <!-- Navbar -->
    @include('home.navbar')
    <!-- End Navbar -->
    <main class="main-content" id="main-content">
        <!-- Banner -->
        @include('home.homeComponents.banner')
        <!-- End Banner -->

        <!-- Help -->
        @include('home.homeComponents.homeAbout')
        <!-- End Help -->

        <!-- Practice -->
        @include('home.homeComponents.homeService')
        <!-- End Practice -->

        <!-- Contact Form -->
        {{-- @include('home.homeComponents.contactForm') --}}
        <!-- End Contact Form -->

        <!-- Blog -->
        {{-- @include('home.homeComponents.blog') --}}
        <!-- End Blog -->
        <div class="cursor">
            <div class="cursor__inner"></div>
        </div>
    </main>
    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <!-- Essential JS -->
    @include('home.homejs')
</body>

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:47:40 GMT -->

</html>