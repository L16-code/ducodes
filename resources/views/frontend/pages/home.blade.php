@extends('frontend.layouts.app')

@section('title', 'DuCodes - Custom Software, AI & Web Development Company')
@section('meta_description', 'DuCodes builds custom software, AI applications, and web platforms for businesses. Laravel, React, Node.js, Zoho, Salesforce & HubSpot development, with a free project quote.')

@push('schema')
<script type="application/ld+json">{!! json_encode(
    App\Support\Seo::webPageSchema(
        'DuCodes - Custom Software, AI & Web Development Company',
        'DuCodes builds custom software, AI applications, and web platforms for businesses. Laravel, React, Node.js, Zoho, Salesforce & HubSpot development, with a free project quote.',
        url()->current()
    ),
JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
    <!-- Banner -->
    @include('frontend.components.banner')
    <!-- End Banner -->

    <!-- About Section -->
    @include('frontend.components.about-section')
    <!-- End About Section -->

    <!-- Services Section -->
    @include('frontend.components.services-section', ['latestBlogs' => $latestBlogs])
    <!-- End Services Section -->

    {{-- Contact Form --}}
    {{-- @include('frontend.components.contact-form') --}}
    {{-- End Contact Form --}}

    {{-- Blog Section --}}
    {{-- @include('frontend.components.blog-section') --}}
    {{-- End Blog Section --}}
@endsection
