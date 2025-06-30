<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:47:56 GMT -->

<head>
    {{--
    <meta charset="UTF-8">
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

    <!-- Help -->
    @include('home.homeComponents.about.aboutHelp')
    <!-- End Help -->

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->
    {{-- <div class="cursor">
        <div class="cursor__inner"></div>
    </div> --}}

    <!-- Essential JS -->
    @include('home.homejs')


</body>





</html>