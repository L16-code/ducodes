<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $blog->short_desc }}">
    <meta name="keywords" content="{{ is_array($blog->tags) ? implode(',', $blog->tags) : $blog->tags }}">
    <meta name="author" content="Admin">
    <title>{{ $blog->blog_title }}</title>
    @include('home.homecss')
</head>

<body>
    @include('home.navbar')

    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $blog->blog_title }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li> <a href="{{ route('blogs') }}">Blogs</a></li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ $blog->blog_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="blog-details-item">
                        <div class="blog-details-img">
                            <img src="/storage/{{ $blog->main_img }}" alt="{{ $blog->blog_title }}" height="500px"
                                width="100%">
                            <h2>{{ $blog->blog_title }}</h2>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $blog->posted_on->format('M d, Y') }}
                                </li>
                                <li>
                                    <i class="icofont-user-alt-7"></i>
                                    <a href="#">Admin</a>
                                </li>
                            </ul>
                            <div style="visibility: visible; opacity: 1; display: block; word-wrap: break-word;">
                                {!! $blog->main_desc !!}
                            </div>
                        </div>
                        <div class="blog-details-social">
                            <ul>
                                <li><span>Share on:</span></li>
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="blog-details-item">
                        <div class="blog-details-category">
                            <h3>Category</h3>
                            <ul>
                                <li>
                                    <a href="practice-details.html">
                                        Criminal Law
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="practice-details.html">
                                        Civil Law
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="practice-details.html">
                                        Education Law
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="practice-details.html">
                                        Family Law
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="practice-details.html">
                                        Cyber Law
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-details-search">
                            <h3>Recent Blogs</h3>
                            <ul>
                                @foreach ($recentBlogs as $recent)
                                    <li>
                                        <img src="/storage/{{ $recent->thumbnail_img }}"
                                            alt="{{ $recent->blog_title }}-thumbnail" height="100px" width="90px">
                                        <div class="blog-details-recent">
                                            <h4>
                                                <a
                                                    href="{{ route('blog.details', $recent->blog_slug) }}">{{ $recent->blog_title }}</a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <i class="icofont-user-alt-7"></i>
                                                    <a href="#">Admin</a>
                                                </li>
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                    {{ $recent->posted_on->format('M d, Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog-details-tags">
                            <h3>Tags</h3>
                            <ul>
                                <li>
                                    <a href="blog-details.html">Government</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Humanities</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Justice</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Social</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Virtue</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Rape</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Criminal</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Political</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-area blog-area-three">
        <div class="container">
            <div class="section-title text-left">
                <h2>Related Blogs</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($relatedBlogs as $related)
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".3s">
                            <a href="{{ $related->blog_slug }}">
                                <img src="/storage/{{ $related->thumbnail_img }}" alt="{{ $related->blog_title }}"
                                    height="250px" width="300px">
                            </a>
                            <div class="blog-inner">
                                <span>{{ $related->blog_type }}</span>
                                <h3>
                                    <a href="{{ $related->blog_slug }}">{{ $related->blog_title }}</a>
                                </h3>
                                <ul>
                                    <li>
                                        <i class="icofont-calendar"></i>
                                        {{ $related->posted_on->format('M d, Y') }}
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-7"></i>
                                        <a href="{{ $related->blog_slug }}">Admin</a>
                                    </li>
                                </ul>
                                <p>{{ Str::limit($related->short_desc, 100) }}</p>
                                <a class="blog-link" href="{{ $related->blog_slug }}">
                                    Read More
                                    <i class="icofont-simple-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('home.footer')
    @include('home.homejs')
</body>

</html>
