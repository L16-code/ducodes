@php
    $pageTitle = trim($__env->yieldContent('title', config('seo.default_title')));
    $pageDescription = trim($__env->yieldContent('meta_description', config('seo.default_description')));
    $pageImage = trim($__env->yieldContent('og_image', asset(config('seo.default_image'))));
    $pageType = trim($__env->yieldContent('og_type', 'website'));
    $canonicalUrl = trim($__env->yieldContent('canonical', url()->current()));
    $robotsContent = trim($__env->yieldContent('robots', 'index, follow'));
@endphp

<title>{!! $pageTitle !!}</title>
<meta name="description" content="{!! $pageDescription !!}">
<meta name="robots" content="{!! $robotsContent !!}">
<link rel="canonical" href="{!! $canonicalUrl !!}">

<!-- Open Graph -->
<meta property="og:type" content="{!! $pageType !!}">
<meta property="og:site_name" content="{{ config('seo.site_name') }}">
<meta property="og:title" content="{!! $pageTitle !!}">
<meta property="og:description" content="{!! $pageDescription !!}">
<meta property="og:url" content="{!! $canonicalUrl !!}">
<meta property="og:image" content="{!! $pageImage !!}">
<meta property="og:locale" content="en_US">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
@if(config('seo.twitter_handle'))
<meta name="twitter:site" content="{{ config('seo.twitter_handle') }}">
@endif
<meta name="twitter:title" content="{!! $pageTitle !!}">
<meta name="twitter:description" content="{!! $pageDescription !!}">
<meta name="twitter:image" content="{!! $pageImage !!}">

<!-- Sitewide structured data -->
<script type="application/ld+json">{!! json_encode(\App\Support\Seo::organizationSchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode(\App\Support\Seo::websiteSchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

@stack('schema')
