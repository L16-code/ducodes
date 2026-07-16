@extends('frontend.layouts.app')

@section('title', 'Page Not Found | DuCodes')
@section('meta_description', "The page you're looking for doesn't exist or may have moved. Explore DuCodes's services, blog, or get in touch.")
@section('robots', 'noindex, follow')

@section('content')
    <section class="position-relative py-12 py-lg-15">
        <div class="container text-center">
            <p class="display-1 fw-bold text-primary mb-3">404</p>
            <h1 class="display-5 mb-3">Page not found</h1>
            <p class="lead text-body-secondary mb-6 w-lg-50 mx-auto">
                The page you're looking for doesn't exist or may have been moved. Try one of the links below.
            </p>
            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <a href="{{ route('homepage') }}" class="btn btn-primary btn-lg hover-lift">Go to Homepage</a>
                <a href="{{ route('blogs') }}" class="btn btn-outline-primary btn-lg hover-lift">Read the Blog</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg hover-lift">Contact Us</a>
            </div>
        </div>
    </section>
@endsection
