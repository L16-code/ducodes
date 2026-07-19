@extends('frontend.layouts.app')

@section('title', $service['title'] . ' | DuCodes')
@section('meta_description', $service['meta_description'])

@push('schema')
<script type="application/ld+json">{!! json_encode(array_filter([
    App\Support\Seo::serviceSchema(
        $service['title'],
        $service['meta_description'],
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Services' => route('services.index'),
        $service['title'] => url()->current(),
    ]),
    !empty($service['faqs']) ? App\Support\Seo::faqSchema($service['faqs']) : null,
    !empty($service['quick_answer']) ? App\Support\Seo::speakableWebPageSchema(
        $service['title'],
        url()->current(),
        ['#quick-answer']
    ) : null,
])) !!}</script>
@endpush

@section('content')
    <section class="position-relative">
        <div class="container position-relative pt-6 pt-lg-7">
            <div class="row">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb small">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-body-secondary">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-body-secondary">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $service['title'] }}</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 mb-3">{{ $service['title'] }}</h1>
                    <p class="mb-5 pe-lg-9 lead">{{ $service['tagline'] }}</p>
                    <a href="{{ route('contact', ['subject' => 'Inquiry about ' . $service['title']]) }}" class="btn btn-primary btn-lg hover-lift">Get a free quote</a>
                    @if(!empty($service['hire_developer_slug']))
                        <a href="{{ route('hire.developer', $service['hire_developer_slug']) }}" class="btn btn-outline-primary btn-lg hover-lift ms-2">Hire a developer</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if(!empty($service['quick_answer']))
    <section class="position-relative pt-5 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div id="quick-answer" class="border-start border-4 border-primary bg-primary-subtle bg-opacity-25 rounded-3 p-4 p-lg-5">
                        <p class="text-uppercase small fw-bold text-primary mb-2">In short</p>
                        <p class="mb-0 fs-5">{{ $service['quick_answer'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @foreach($service['intro'] as $paragraph)
                        <p class="lead-sm mb-4">{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if(!empty($service['why_ducodes']))
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row mb-7">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 mb-0">Why work with DuCodes on this</h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach($service['why_ducodes'] as $point)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <h3 class="h5 mb-3">{{ $point['title'] }}</h3>
                            <p class="text-body-secondary mb-0">{{ $point['body'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if(!empty($service['process']))
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row mb-7">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 mb-0">How we work</h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach($service['process'] as $index => $step)
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex gap-3">
                        <div class="flex-shrink-0 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width:2.5rem;height:2.5rem;">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <h3 class="h6 mb-2">{{ $step['title'] }}</h3>
                            <p class="text-body-secondary mb-0 small">{{ $step['body'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if(!empty($service['tech_stack']))
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row mb-6">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 mb-0">Technology we use</h2>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach($service['tech_stack'] as $tech)
                    <span class="badge bg-primary-subtle text-primary p-3">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if(!empty($service['faqs']))
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row mb-7">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 mb-0">Frequently asked questions</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="serviceFaqAccordion">
                        @foreach($service['faqs'] as $index => $faq)
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button @if($index !== 0) collapsed @endif" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-{{ $service['slug'] }}-{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h3>
                            <div id="faq-{{ $service['slug'] }}-{{ $index }}"
                                class="accordion-collapse collapse @if($index === 0) show @endif"
                                data-bs-parent="#serviceFaqAccordion">
                                <div class="accordion-body text-body-secondary">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($relatedServices->count() > 0)
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row mb-6">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 mb-0">Related services</h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach($relatedServices as $related)
                <div class="col-md-4">
                    <a href="{{ route('services.show', $related['slug']) }}" class="text-reset text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">{{ $related['title'] }}</h3>
                                <span class="text-primary small fw-semibold">Learn more <i class="bi bi-arrow-right ms-1"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section>
        <div class="container py-9">
            <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-primary text-white position-relative overflow-hidden">
                <div class="row align-items-end position-relative">
                    <div class="col-lg-7 text-center text-lg-start">
                        <p class="text-white mb-2">Ready to talk about your project?</p>
                        <h2 class="mb-5 mb-lg-0">Let's discuss {{ strtolower($service['title']) }}</h2>
                    </div>
                    <div class="col-lg-5 text-lg-end text-center">
                        <a href="{{ route('contact', ['subject' => 'Inquiry about ' . $service['title']]) }}" class="btn btn-white btn-lg rounded-3">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
