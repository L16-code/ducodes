@extends('frontend.layouts.app')

@section('title', 'Home')

@push('styles')
<link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Banner -->
    @include('frontend.components.banner')
    <!-- End Banner -->

    <!-- About Section -->
    @include('frontend.components.about-section')
    <!-- End About Section -->

    <!-- Services Section -->
    @include('frontend.components.services-section')
    <!-- End Services Section -->

    {{-- Contact Form --}}
    {{-- @include('frontend.components.contact-form') --}}
    {{-- End Contact Form --}}

    {{-- Blog Section --}}
    {{-- @include('frontend.components.blog-section') --}}
    {{-- End Blog Section --}}
@endsection
