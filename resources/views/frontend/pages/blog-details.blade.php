@extends('frontend.layouts.app')

@php
    $seoMeta = is_array($blog->seo_meta) ? $blog->seo_meta : [];
    $blogTitle = $seoMeta['meta_title'] ?? ($blog->blog_title . ' | DuCodes Blog');
    $blogDescription = $seoMeta['meta_description'] ?? $blog->short_desc;
    $blogImage = $blog->main_img ? asset('storage/' . $blog->main_img) : asset(config('seo.default_image'));
@endphp

@section('title', $blogTitle)
@section('meta_description', $blogDescription)
@section('og_type', 'article')
@section('og_image', $blogImage)

@push('schema')
<script type="application/ld+json">{!! json_encode([
    App\Support\Seo::blogPostingSchema(
        $blog->blog_title,
        $blogDescription,
        url()->current(),
        $blogImage,
        $blog->posted_on
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Blogs' => route('blogs'),
        $blog->blog_title => url()->current(),
    ]),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
    <section class="position-relative">
        <div class="container position-relative pt-6 pt-lg-7">
            <div class="row">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb small">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" class="text-body-secondary">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blogs') }}" class="text-body-secondary">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->blog_title }}</li>
                        </ol>
                    </nav>
                    <span class="badge bg-primary-subtle text-primary mb-3 text-capitalize">{{ $blog->blog_type }}</span>
                    <h1 class="display-5 mb-3">{{ $blog->blog_title }}</h1>
                    <p class="text-body-secondary mb-0">
                        <i class="bi bi-calendar3 me-1"></i>{{ $blog->posted_on->format('M d, Y') }}
                        <span class="mx-2">&middot;</span>
                        <i class="bi bi-person me-1"></i>DuCodes Team
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <img src="{{ asset('storage/' . $blog->main_img) }}" alt="{{ $blog->blog_title }}"
                        class="img-fluid rounded-4 shadow-sm mb-6 w-100" style="max-height:480px;object-fit:cover"
                        loading="eager" fetchpriority="high" decoding="async">

                    <div class="blog-post-body">
                        {!! $blog->main_desc !!}
                    </div>

                    @if(is_array($blog->tags) && count($blog->tags) > 0)
                    <div class="mt-6 d-flex flex-wrap gap-2 align-items-center">
                        <span class="text-body-secondary small me-1">Tags:</span>
                        @foreach($blog->tags as $tag)
                            <span class="badge bg-body-tertiary text-body border">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="mt-6 d-flex align-items-center gap-2">
                        <span class="text-body-secondary small me-1">Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->blog_title) }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" aria-label="Share on LinkedIn" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 offset-lg-1 mt-7 mt-lg-0">
                    @if($recentBlogs->count() > 0)
                    <h5 class="mb-4">Recent posts</h5>
                    <div class="d-flex flex-column gap-3 mb-7">
                        @foreach ($recentBlogs as $recent)
                            <a href="{{ route('blog.details', $recent->blog_slug) }}" class="d-flex gap-3 text-reset text-decoration-none">
                                <img src="{{ asset('storage/' . $recent->thumbnail_img) }}"
                                    alt="{{ $recent->blog_title }}" class="rounded-3 flex-shrink-0"
                                    style="width:72px;height:64px;object-fit:cover" loading="lazy" decoding="async">
                                <div>
                                    <p class="mb-1 small fw-semibold lh-sm">{{ $recent->blog_title }}</p>
                                    <span class="text-body-secondary small">{{ $recent->posted_on->format('M d, Y') }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($relatedBlogs->count() > 0)
    <section class="position-relative py-9 py-lg-11 bg-body-tertiary">
        <div class="container">
            <h2 class="display-6 mb-6">Related articles</h2>
            <div class="row g-4">
                @foreach($relatedBlogs as $related)
                <div class="col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <a href="{{ route('blog.details', $related->blog_slug) }}">
                            <img src="{{ asset('storage/' . $related->thumbnail_img) }}" alt="{{ $related->blog_title }}"
                                class="card-img-top" style="height:220px;object-fit:cover" loading="lazy" decoding="async">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary-subtle text-primary mb-2 align-self-start text-capitalize">{{ $related->blog_type }}</span>
                            <h3 class="h5 mb-2"><a href="{{ route('blog.details', $related->blog_slug) }}" class="text-reset text-decoration-none">{{ $related->blog_title }}</a></h3>
                            <p class="text-body-secondary small mb-3">
                                <i class="bi bi-calendar3 me-1"></i>{{ $related->posted_on->format('M d, Y') }}
                            </p>
                            <p class="mb-4">{{ $related->short_desc }}</p>
                            <a href="{{ route('blog.details', $related->blog_slug) }}" class="btn btn-sm btn-outline-primary mt-auto align-self-start">
                                Read more <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
