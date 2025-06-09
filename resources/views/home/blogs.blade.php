<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:05 GMT -->

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    @include('home.homecss')
</head>

<body>

    <!-- Preloader -->
    {{-- @include('home.loader') --}}
    <!-- End Preloader -->

    <!-- Navbar -->
    @include('home.navbar')
    <!-- End Navbar -->

    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Our Blogs</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog -->
    <section class="blog-area blog-area-two pt-100">
        <div class="container">
            <div id="blog-container" class="row justify-content-center">
                {{-- Blogs will be dynamically loaded here --}}
            </div>
            <div class="text-center mt-4">
                <button id="load-more-btn"
                    style="background-color: #b69d74 ; border-color: #b69d74; color: white; border-radius: 25px; padding: 10px 20px; font-size: 16px; cursor: pointer; display: inline-block; text-decoration: none;"
                    onclick="loadMoreBlogs()">Load More</button>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->


    <!-- Essential JS -->
    @include('home.homejs')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentPage = 1;

            function loadBlogs(page) {
                fetch(`/api/blogs?page=${page}`)
                    .then(response => response.json())
                    .then(data => {
                        const blogContainer = document.getElementById('blog-container');
                        // Clear "Load More" button if no more data
                        if (!data.next_page_url) {
                            document.getElementById('load-more-btn').style.display = 'none';
                        }

                        // Populate blogs
                        data.data.forEach(blog => {
                            blogContainer.innerHTML += `
                                <div class="col-sm-6 col-lg-4">
                                    <div class="blog-item">
                                        <a href="blog/${blog.blog_slug}">
                                            <img src="/storage/${blog.thumbnail_img}" alt="Blog" height="250px" width="300px">
                                        </a>
                                        <div class="blog-inner">
                                            <span>${blog.blog_type}</span>
                                            <h3>
                                                <a href="blog/${blog.blog_slug}">${blog.blog_title}</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                   ${new Date(blog.posted_on).toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' })}
                                                </li>
                                                <li>
                                                    <i class="icofont-user-alt-7"></i>
                                                    <a href="blog/${blog.blog_slug}">Admin</a>
                                                </li>
                                            </ul>
                                            <p>${blog.short_desc}</p>
                                            <a class="blog-link" href="blog/${blog.blog_slug}">
                                                Read More
                                                <i class="icofont-simple-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    });
            }

            function loadMoreBlogs() {
                currentPage++;
                loadBlogs(currentPage);
            }

            // Initial load
            loadBlogs(currentPage);
            window.loadMoreBlogs = loadMoreBlogs; // Expose function globally
        });
    </script>

</body>

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:48:09 GMT -->

</html>
