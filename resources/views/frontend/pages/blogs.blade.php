@extends('frontend.layouts.app')

@section('title', 'Blog - Software Development Insights | DuCodes')
@section('meta_description', 'Articles and insights on Laravel, AI, Zoho, Salesforce, HubSpot, and modern web development from the DuCodes engineering team.')

@push('schema')
<script type="application/ld+json">{!! json_encode([
    App\Support\Seo::webPageSchema(
        'DuCodes Blog',
        'Articles and insights on Laravel, AI, Zoho, Salesforce, HubSpot, and modern web development from the DuCodes engineering team.',
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'Blogs' => url()->current(),
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
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 mb-3">Our Blog</h1>
                    <p class="mb-0 pe-lg-9 lead">Insights on Laravel, AI, CRM/ERP integrations, and modern web development from the DuCodes team.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative py-9 py-lg-11">
        <div class="container">
            <div id="blog-container" class="row g-4">
                {{-- Blog cards are loaded here via /api/blogs --}}
            </div>
            <div id="blog-empty-state" class="text-center py-9 d-none">
                <p class="text-body-secondary mb-0">No blog posts published yet — check back soon.</p>
            </div>
            <div class="text-center mt-6">
                <button id="load-more-btn" class="btn btn-outline-primary btn-lg hover-lift d-none" onclick="loadMoreBlogs()">
                    Load more articles
                </button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value ?? '';
        return div.innerHTML;
    }

    function loadBlogs(page) {
        fetch(`/api/blogs?page=${page}`)
            .then(response => response.json())
            .then(data => {
                const blogContainer = document.getElementById('blog-container');
                const loadMoreBtn = document.getElementById('load-more-btn');
                const emptyState = document.getElementById('blog-empty-state');

                if (page === 1 && data.data.length === 0) {
                    emptyState.classList.remove('d-none');
                    loadMoreBtn.classList.add('d-none');
                    return;
                }

                loadMoreBtn.classList.toggle('d-none', !data.next_page_url);

                data.data.forEach(blog => {
                    const title = escapeHtml(blog.blog_title);
                    const type = escapeHtml(blog.blog_type);
                    const desc = escapeHtml(blog.short_desc);
                    const slug = encodeURIComponent(blog.blog_slug);
                    const date = new Date(blog.posted_on).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });

                    blogContainer.insertAdjacentHTML('beforeend', `
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm h-100">
                                <a href="/blog/${slug}">
                                    <img src="/storage/${blog.thumbnail_img}" class="card-img-top" style="height:220px;object-fit:cover" alt="${title}" loading="lazy" decoding="async">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <span class="badge bg-primary-subtle text-primary mb-2 align-self-start text-capitalize">${type}</span>
                                    <h2 class="h5 mb-2"><a href="/blog/${slug}" class="text-reset text-decoration-none">${title}</a></h2>
                                    <p class="text-body-secondary small mb-3">
                                        <i class="bi bi-calendar3 me-1"></i>${date}
                                    </p>
                                    <p class="mb-4">${desc}</p>
                                    <a href="/blog/${slug}" class="btn btn-sm btn-outline-primary mt-auto align-self-start">
                                        Read more <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `);
                });
            });
    }

    function loadMoreBlogs() {
        currentPage++;
        loadBlogs(currentPage);
    }

    loadBlogs(currentPage);
    window.loadMoreBlogs = loadMoreBlogs;
});
</script>
@endpush
