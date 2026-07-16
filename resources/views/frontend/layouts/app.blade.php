<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0d1b2a">

    @include('frontend.partials.seo')

    @include('frontend.partials.styles')

    @include('frontend.partials.analytics-head')

    @stack('styles')
</head>
<body>
    @include('frontend.partials.analytics-body')

    <a class="skip-link visually-hidden-focusable" href="#main-content">Skip to main content</a>

    <!-- Preloader -->
    @include('frontend.partials.loader')
    <!-- End Preloader -->

    <!-- Header -->
    @include('frontend.partials.header')
    <!-- End Header -->

    <!-- Main Content -->
    <main class="main-content" id="main-content">
        @yield('content')
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    @include('frontend.partials.footer')
    <!-- End Footer -->

    @include('frontend.partials.scripts')

    @stack('scripts')
</body>
</html>
