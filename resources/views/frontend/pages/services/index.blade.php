@extends('frontend.layouts.app')

@section('title', 'Software Development Services | DuCodes')
@section('meta_description', 'Laravel, AI, web, mobile, and CRM/ERP integration services from DuCodes — custom software built around how your business actually works.')

@push('schema')
<script type="application/ld+json">{!! json_encode([
    App\Support\Seo::webPageSchema(
        'Software Development Services',
        'Laravel, AI, web, mobile, and CRM/ERP integration services from DuCodes.',
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Services' => url()->current(),
    ]),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
    <section class="position-relative">
        <div class="container position-relative pt-6 pt-lg-7">
            <div class="row">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb small">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-body-secondary">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 mb-3">Services</h1>
                    <p class="mb-0 pe-lg-9 lead">Custom software, AI, web, mobile, and CRM/ERP integration work — built around how your business actually operates, not a generic template.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row g-4">
                @foreach($services as $slug => $service)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('services.show', $slug) }}" class="text-reset text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-5 d-flex flex-column">
                                <h2 class="h5 mb-3">{{ $service['title'] }}</h2>
                                <p class="text-body-secondary mb-4">{{ $service['tagline'] }}</p>
                                <span class="mt-auto text-primary fw-semibold">
                                    Learn more <i class="bi bi-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-9">
            <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-primary text-white position-relative overflow-hidden">
                <div class="row align-items-end position-relative">
                    <div class="col-lg-7 text-center text-lg-start">
                        <p class="text-white mb-2">Not sure which service fits?</p>
                        <h2 class="mb-5 mb-lg-0">Tell us what you're building</h2>
                    </div>
                    <div class="col-lg-5 text-lg-end text-center">
                        <a href="{{ route('contact') }}" class="btn btn-white btn-lg rounded-3">Get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
