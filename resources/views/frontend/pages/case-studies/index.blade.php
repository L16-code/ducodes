@extends('frontend.layouts.app')

@section('title', 'Case Studies | DuCodes')
@section('meta_description', 'Real client projects — the challenges, the approach, and the measurable results DuCodes delivered.')

@push('schema')
<script type="application/ld+json">{!! json_encode([
    App\Support\Seo::webPageSchema(
        'Case Studies',
        'Real client projects — the challenges, the approach, and the measurable results DuCodes delivered.',
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Case Studies' => url()->current(),
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
                            <li class="breadcrumb-item active" aria-current="page">Case Studies</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 mb-3">Case Studies</h1>
                    <p class="mb-0 pe-lg-9 lead">How DuCodes helps clients solve real business and technology problems — the challenge, the approach, and the measurable outcome.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative pt-5">
        <div class="container">
            <form method="GET" action="{{ route('case-studies.index') }}" class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small" for="industry">Industry</label>
                    <select name="industry" id="industry" class="form-select" onchange="this.form.submit()">
                        <option value="">All industries</option>
                        @foreach ($industries as $industry)
                            <option value="{{ $industry }}" @selected(request('industry') === $industry)>{{ $industry }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small" for="service">Service</label>
                    <select name="service" id="service" class="form-select" onchange="this.form.submit()">
                        <option value="">All services</option>
                        @foreach ($services as $service)
                            <option value="{{ $service }}" @selected(request('service') === $service)>{{ $service }}</option>
                        @endforeach
                    </select>
                </div>
                @if (request()->anyFilled(['industry', 'service']))
                    <div class="col-md-2">
                        <a href="{{ route('case-studies.index') }}" class="btn btn-outline-secondary">Clear filters</a>
                    </div>
                @endif
            </form>
        </div>
    </section>

    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            @if ($caseStudies->isEmpty())
                <div class="text-center py-9">
                    <p class="lead text-body-secondary mb-0">No case studies published yet — check back soon.</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($caseStudies as $caseStudy)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{ route('case-studies.show', $caseStudy->slug) }}" class="text-reset text-decoration-none">
                                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                                    @if ($caseStudy->hero_image)
                                        <img src="{{ asset('storage/'.$caseStudy->hero_image) }}" alt="{{ $caseStudy->hero_image_alt ?: $caseStudy->title }}" class="card-img-top" style="height:200px;object-fit:cover">
                                    @endif
                                    <div class="card-body p-4 d-flex flex-column">
                                        <div class="d-flex flex-wrap gap-2 mb-2">
                                            @if ($caseStudy->featured)
                                                <span class="badge bg-primary-subtle text-primary">Featured</span>
                                            @endif
                                            @if ($caseStudy->industry)
                                                <span class="badge bg-body-secondary text-body">{{ $caseStudy->industry }}</span>
                                            @endif
                                            @if ($caseStudy->service)
                                                <span class="badge bg-body-secondary text-body">{{ $caseStudy->service }}</span>
                                            @endif
                                        </div>
                                        <h2 class="h5 mb-2">{{ $caseStudy->title }}</h2>
                                        @if ($caseStudy->client_name)
                                            <p class="small text-body-secondary mb-2">{{ $caseStudy->client_name }}</p>
                                        @endif
                                        <p class="text-body-secondary mb-3">{{ \Illuminate\Support\Str::limit($caseStudy->short_description, 120) }}</p>
                                        @if (!empty($caseStudy->key_metrics))
                                            <p class="mb-3 fw-semibold text-primary">
                                                {{ $caseStudy->key_metrics[0]['value'] }} {{ $caseStudy->key_metrics[0]['label'] }}
                                            </p>
                                        @endif
                                        <span class="mt-auto text-primary fw-semibold">
                                            Read case study <i class="bi bi-arrow-right ms-1"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section>
        <div class="container pb-9">
            <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-primary text-white position-relative overflow-hidden">
                <div class="row align-items-end position-relative">
                    <div class="col-lg-7 text-center text-lg-start">
                        <p class="text-white mb-2">Have a similar challenge?</p>
                        <h2 class="mb-5 mb-lg-0">Let's talk about your project</h2>
                    </div>
                    <div class="col-lg-5 text-lg-end text-center">
                        <a href="{{ route('contact') }}" class="btn btn-white btn-lg rounded-3">Talk to our experts</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
