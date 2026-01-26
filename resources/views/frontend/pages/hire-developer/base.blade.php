@extends('frontend.layouts.app')

@section('title', 'Hire ' . $title . ' Developer - DuCodes')

@section('content')
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden bg-dark text-white">
        <img src="{{ asset('assets/img/backgrounds/bg2.jpg') }}" alt="" class="jarallax-img opacity-50 position-absolute w-100 h-100 top-0 start-0" style="object-fit: cover;">
        
        <svg class="position-absolute start-0 bottom-0" style="color: var(--bs-body-bg);" preserveAspectRatio="none"
            width="100%" height="64" viewBox="0 0 1460 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                fill="currentColor" />
        </svg>

        <div class="container pt-12 pb-12 position-relative z-1">
            <div class="row pt-lg-12 pb-12 pb-lg-15">
                <div class="col-xl-8 col-lg-10 mx-auto text-center text-white">
                    <h1 class="display-3 fw-bolder mb-4">
                        Hire Expert {{ $title }} Developer
                    </h1>
                    <p class="lead mb-5">
                        {{ $description }}
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg hover-lift">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Hire Section -->
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row mb-7">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 mb-4">Why Hire {{ $title }} Developers from DuCodes?</h2>
                    <p class="lead text-body-secondary">We provide highly skilled developers with proven expertise</p>
                </div>
            </div>
            <div class="row">
                @yield('benefits')
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row mb-7">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 mb-4">Core {{ $title }} Skills</h2>
                </div>
            </div>
            <div class="row">
                @yield('skills')
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row mb-7">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 mb-4">Our {{ $title }} Development Services</h2>
                </div>
            </div>
            <div class="row">
                @yield('services')
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="position-relative py-9 py-lg-11 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-5 mb-lg-0">
                    <h2 class="display-6 mb-3">Ready to Hire {{ $title }} Developers?</h2>
                    <p class="lead mb-0">Let's discuss your project requirements and get started today</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-white btn-lg hover-lift">Contact Us Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection
