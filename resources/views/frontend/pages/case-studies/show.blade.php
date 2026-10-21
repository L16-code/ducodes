@extends('frontend.layouts.app')

@php
    $seoTitle = $caseStudy->seo_title ?: ($caseStudy->title . ' Case Study | DuCodes');
    $seoDescription = $caseStudy->seo_meta_description ?: $caseStudy->short_description;
@endphp

@section('title', $seoTitle)
@section('meta_description', $seoDescription)
@if ($caseStudy->seo_canonical_url)
    @section('canonical', $caseStudy->seo_canonical_url)
@endif
@if ($caseStudy->seo_og_image)
    @section('og_image', $caseStudy->seo_og_image)
@elseif ($caseStudy->hero_image)
    @section('og_image', asset('storage/'.$caseStudy->hero_image))
@endif
@if ($isPreview && $caseStudy->status !== 'published')
    @section('robots', 'noindex, nofollow')
@endif

@push('schema')
<script type="application/ld+json">{!! json_encode(array_filter([
    App\Support\Seo::caseStudySchema(
        $caseStudy->title,
        $seoDescription,
        url()->current(),
        $caseStudy->hero_image ? asset('storage/'.$caseStudy->hero_image) : null,
        $caseStudy->published_at ?? $caseStudy->created_at
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Case Studies' => route('case-studies.index'),
        $caseStudy->title => url()->current(),
    ]),
])) !!}</script>
@endpush

@section('content')
    @if ($isPreview && $caseStudy->status !== 'published')
        <div class="container pt-4">
            <div class="alert alert-warning mb-0">
                Preview mode — this case study is <strong>{{ $caseStudy->status }}</strong> and is not visible to the public.
            </div>
        </div>
    @endif

    <section class="position-relative">
        <div class="container position-relative pt-6 pt-lg-7">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb small">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-body-secondary">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('case-studies.index') }}" class="text-body-secondary">Case Studies</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $caseStudy->title }}</li>
                        </ol>
                    </nav>
                    @if ($caseStudy->client_logo)
                        <img src="{{ asset('storage/'.$caseStudy->client_logo) }}" alt="{{ $caseStudy->client_name }}" style="max-height:48px" class="mb-3">
                    @endif
                    <h1 class="display-4 mb-3">{{ $caseStudy->title }}</h1>
                    <p class="mb-4 pe-lg-9 lead">{{ $caseStudy->short_description }}</p>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @if ($caseStudy->industry)
                            <span class="badge bg-body-secondary text-body">{{ $caseStudy->industry }}</span>
                        @endif
                        @if ($caseStudy->service)
                            <span class="badge bg-body-secondary text-body">{{ $caseStudy->service }}</span>
                        @endif
                        @if ($caseStudy->project_duration)
                            <span class="badge bg-body-secondary text-body">{{ $caseStudy->project_duration }}</span>
                        @endif
                    </div>
                    <a href="{{ $caseStudy->cta_url ?: route('contact') }}" class="btn btn-primary btn-lg hover-lift">{{ $caseStudy->cta_text ?: 'Talk to our experts' }}</a>
                </div>
            </div>
        </div>
    </section>

    @if ($caseStudy->hero_image)
    <section class="position-relative pt-6">
        <div class="container">
            <img src="{{ asset('storage/'.$caseStudy->hero_image) }}" alt="{{ $caseStudy->hero_image_alt ?: $caseStudy->title }}" class="img-fluid rounded-3 shadow-sm w-100" style="max-height:480px;object-fit:cover">
        </div>
    </section>
    @endif

    <section class="position-relative py-9">
        <div class="container">
            <div class="row g-4 text-center">
                @if ($caseStudy->client_name)
                    <div class="col-6 col-lg-3">
                        <p class="text-uppercase small text-body-secondary mb-1">Client</p>
                        <p class="fw-semibold mb-0">{{ $caseStudy->client_name }}</p>
                    </div>
                @endif
                @if ($caseStudy->industry)
                    <div class="col-6 col-lg-3">
                        <p class="text-uppercase small text-body-secondary mb-1">Industry</p>
                        <p class="fw-semibold mb-0">{{ $caseStudy->industry }}</p>
                    </div>
                @endif
                @if ($caseStudy->service)
                    <div class="col-6 col-lg-3">
                        <p class="text-uppercase small text-body-secondary mb-1">Service</p>
                        <p class="fw-semibold mb-0">{{ $caseStudy->service }}</p>
                    </div>
                @endif
                @if ($caseStudy->project_duration)
                    <div class="col-6 col-lg-3">
                        <p class="text-uppercase small text-body-secondary mb-1">Duration</p>
                        <p class="fw-semibold mb-0">{{ $caseStudy->project_duration }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @foreach ([
        'challenge' => 'The challenge',
        'solution' => 'The solution',
        'implementation' => 'Implementation',
        'results' => 'The results',
        'business_impact' => 'Business impact',
    ] as $field => $label)
        @if (!empty($caseStudy->$field))
        <section class="position-relative py-7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="display-6 mb-4">{{ $label }}</h2>
                        <div class="lead-sm">{!! $caseStudy->$field !!}</div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endforeach

    @if (!empty($caseStudy->key_metrics))
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row g-4 text-center">
                @foreach ($caseStudy->key_metrics as $metric)
                    <div class="col-md-{{ max(3, intdiv(12, max(count($caseStudy->key_metrics), 1))) }}">
                        <p class="display-5 text-primary fw-bold mb-1">{{ $metric['value'] }}</p>
                        <p class="fw-semibold mb-1">{{ $metric['label'] }}</p>
                        @if (!empty($metric['description']))
                            <p class="text-body-secondary small mb-0">{{ $metric['description'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if (!empty($caseStudy->tech_stack))
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row mb-6">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 mb-0">Technology stack</h2>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach ($caseStudy->tech_stack as $tech)
                    <span class="badge bg-primary-subtle text-primary p-3">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($caseStudy->testimonial_quote)
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <p class="display-6 fst-italic mb-4">&ldquo;{{ $caseStudy->testimonial_quote }}&rdquo;</p>
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        @if ($caseStudy->testimonial_person_image)
                            <img src="{{ asset('storage/'.$caseStudy->testimonial_person_image) }}" alt="{{ $caseStudy->testimonial_person_name }}" class="rounded-circle" style="width:56px;height:56px;object-fit:cover">
                        @endif
                        <div class="text-start">
                            @if ($caseStudy->testimonial_person_name)
                                <p class="fw-semibold mb-0">{{ $caseStudy->testimonial_person_name }}</p>
                            @endif
                            @if ($caseStudy->testimonial_designation || $caseStudy->testimonial_company)
                                <p class="small text-body-secondary mb-0">{{ $caseStudy->testimonial_designation }}{{ $caseStudy->testimonial_designation && $caseStudy->testimonial_company ? ', ' : '' }}{{ $caseStudy->testimonial_company }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if (!empty($caseStudy->gallery))
    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row mb-6">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 mb-0">Gallery</h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($caseStudy->gallery as $image)
                    <div class="col-md-6 col-lg-4">
                        <figure class="mb-0">
                            <img src="{{ asset('storage/'.$image['image']) }}" alt="{{ $image['alt'] ?? $caseStudy->title }}" class="img-fluid rounded-3 shadow-sm w-100" style="height:220px;object-fit:cover">
                            @if (!empty($image['caption']))
                                <figcaption class="small text-body-secondary mt-2">{{ $image['caption'] }}</figcaption>
                            @endif
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($relatedCaseStudies->count() > 0)
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <div class="row mb-6">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 mb-0">Related case studies</h2>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($relatedCaseStudies as $related)
                <div class="col-md-4">
                    <a href="{{ route('case-studies.show', $related->slug) }}" class="text-reset text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h3 class="h6 mb-2">{{ $related->title }}</h3>
                                <span class="text-primary small fw-semibold">Read case study <i class="bi bi-arrow-right ms-1"></i></span>
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
                        <p class="text-white mb-2">Have a similar challenge?</p>
                        <h2 class="mb-5 mb-lg-0">Talk to our experts</h2>
                    </div>
                    <div class="col-lg-5 text-lg-end text-center">
                        <a href="{{ route('contact') }}" class="btn btn-white btn-lg rounded-3">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
