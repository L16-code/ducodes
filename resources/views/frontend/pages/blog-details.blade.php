@extends('frontend.layouts.app')

@section('title', $blog->blog_title)

@section('content')
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
                        <div class="blog-details-search">
                            <h3>Recent Blogs</h3>
                            <ul>
                                @foreach ($recentBlogs as $recent)
                                    <li>
                                        <img src="/storage/{{ $recent->thumbnail_img }}"
                                            alt="{{ $recent->blog_title }}-thumbnail" height="100px" width="90px">
                                        <div class="blog-details-recent">
                                            <h4>
                                                <a href="{{ route('blog.details', $recent->blog_slug) }}">{{ $recent->blog_title }}</a>
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
                                @if(is_array($blog->tags))
                                    @foreach($blog->tags as $tag)
                                        <li><a href="#">{{ $tag }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($relatedBlogs->count() > 0)
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Related Blogs</h2>
            </div>
            <div class="row justify-content-center">
                @foreach($relatedBlogs as $related)
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <a href="{{ route('blog.details', $related->blog_slug) }}">
                            <img src="/storage/{{ $related->thumbnail_img }}" alt="Blog" height="250px" width="300px">
                        </a>
                        <div class="blog-inner">
                            <span>{{ $related->blog_type }}</span>
                            <h3>
                                <a href="{{ route('blog.details', $related->blog_slug) }}">{{ $related->blog_title }}</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $related->posted_on->format('M d, Y') }}
                                </li>
                                <li>
                                    <i class="icofont-user-alt-7"></i>
                                    <a href="#">Admin</a>
                                </li>
                            </ul>
                            <p>{{ $related->short_desc }}</p>
                            <a class="blog-link" href="{{ route('blog.details', $related->blog_slug) }}">
                                Read More
                                <i class="icofont-simple-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection
