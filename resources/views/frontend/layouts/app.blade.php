<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Home') - {{ config('app.name', 'DuCodes') }}</title>
    
    @include('frontend.partials.styles')
    
    @stack('styles')
</head>
<body>
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
