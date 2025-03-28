<div id="content" class="app-content">
    <h1 class="page-header">Edit Blog</h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <div id="responseMessage"></div>
                    <form id="editBlogForm" class="form-horizontal" method="POST"
                        action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Blog Title -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="blog_title">Blog Title *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" id="blog_title" name="blog_title"
                                    value="{{ $blog->blog_title }}" placeholder="Enter Blog Title"
                                    data-parsley-required="true" />
                            </div>
                        </div>

                        <!-- Blog Slug -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="blog_slug">Blog Slug *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" id="blog_slug" name="blog_slug"
                                    value="{{ $blog->blog_slug }}" placeholder="Enter Blog Slug"
                                    data-parsley-required="true" />
                            </div>
                        </div>

                        <!-- Blog Type -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="blog_type">Blog Type *:</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="blog_type" name="blog_type"
                                    data-parsley-required="true">
                                    <option value="">Select Type</option>
                                    <option value="news" {{ $blog->blog_type == 'news' ? 'selected' : '' }}>News
                                    </option>
                                    <option value="tutorial" {{ $blog->blog_type == 'tutorial' ? 'selected' : '' }}>
                                        Tutorial</option>
                                    <option value="review" {{ $blog->blog_type == 'review' ? 'selected' : '' }}>Review
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Thumbnail Image -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="thumbnail_img">Thumbnail Image
                                *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="file" id="thumbnail_img" name="thumbnail_img"
                                    accept="image/*" />
                                <img src="/storage/{{ $blog->thumbnail_img }}" alt="Thumbnail"
                                    class="img-thumbnail mt-2" width="100">
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="main_img">Main Image *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="file" id="main_img" name="main_img"
                                    accept="image/*" />
                                <img src="/storage/{{ $blog->main_img }}" alt="Main Image" class="img-thumbnail mt-2"
                                    width="100">
                            </div>
                        </div>

                        <!-- Posted On -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="posted_on">Posted On *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="datetime-local" id="posted_on" name="posted_on"
                                    value="{{ $blog->posted_on }}" data-parsley-required="true" />
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="short_desc">Short Description
                                *:</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" id="short_desc" name="short_desc" rows="3" placeholder="Enter a short description"
                                    data-parsley-required="true">{{ $blog->short_desc }}</textarea>
                            </div>
                        </div>

                        <!-- Main Description -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="main_desc">Main Description
                                *:</label>
                            <div class="col-lg-8">
                                <textarea id="summernote" name="main_desc" class="summernote form-control" data-parsley-required="true">{{ $blog->main_desc }}</textarea>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="tags">Tags *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" id="tags" name="tags"
                                    value="{{ implode(', ', json_decode($blog->tags, true)) }}"
                                    placeholder="Enter tags (comma-separated)" data-parsley-required="true" />
                            </div>
                        </div>

                        <!-- SEO Meta -->
                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="meta_title">Meta Title *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" id="meta_title" name="meta_title"
                                    value="{{ json_decode($blog->seo_meta, true)['meta_title'] }}"
                                    placeholder="Enter Meta Title" data-parsley-required="true" />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="meta_description">Meta Description
                                *:</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="3"
                                    placeholder="Enter Meta Description" data-parsley-required="true">{{ json_decode($blog->seo_meta, true)['meta_description'] }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-lg-4 col-form-label form-label" for="meta_keywords">Meta Keywords
                                *:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" id="meta_keywords" name="meta_keywords"
                                    value="{{ implode(', ', json_decode($blog->seo_meta, true)['meta_keywords']) }}"
                                    placeholder="Enter Keywords (comma-separated)" data-parsley-required="true" />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-label">&nbsp;</label>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
