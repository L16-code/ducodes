<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/color-admin/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Mar 2025 11:28:27 GMT -->

<head>
    @include('./admin.adminLayouts.adminStyles')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed ">
        <!-- BEGIN #header -->
        @include('admin.adminLayouts.header')
        <!-- END #header -->

        <!-- BEGIN #sidebar -->
        @include('admin.adminLayouts.sidebar')
        <!-- END #sidebar -->

        <!-- BEGIN #content -->
        @include('admin.adminComponents.adminAddBlog')
        <!-- END #content -->

        <!-- BEGIN theme-panel -->
        @include('./admin.adminLayouts.themeSettings')
        <!-- END theme-panel -->
        @include('./admin.adminComponents.adminScrollToTop')
    </div>
    <!-- END #app -->

    @include('./admin.adminLayouts.adminJs')
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
</body>
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        console.log("lod")
        $('#summernote').summernote({
            height: 300, // Set the height of the editor
            toolbar: [
                // Customize toolbar options
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function (files) {
                    const data = new FormData();
                    data.append('image', files[0]);
                    data.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                    fetch("{{ route('admin.blog.upload-image') }}", {
                        method: 'POST',
                        body: data
                    })
                        .then(response => response.json())
                        .then(result => {
                            $('#summernote').summernote('insertImage', result.url);
                        })
                        .catch(() => {
                            alert('Image upload failed. Please try again.');
                        });
                }
            }
        });
    });

    document.getElementById('addBlogForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        const form = e.target;
        const formData = new FormData(form);
        // Clear previous messages
        const responseMessage = document.getElementById('responseMessage');
        responseMessage.innerHTML = '';
        fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    responseMessage.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    form.reset(); // Reset the form
                    $('#summernote').summernote('reset'); // Reset Summernote
                    setTimeout(() => {
                        window.location.href = "{{ url('admin/blog-listing') }}";
                        $.gritter.add({
                            title: 'Success',
                            text: 'Blog added Successfully',
                            sticky: false,
                            time: 1500,
                            class_name: 'my-sticky-class gritter-light'
                        });
                    }, 1500);
                } else {
                    responseMessage.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                console.log("error", error);
                responseMessage.innerHTML =
                    `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
                console
                    .error('Error:', error);
            });
    });
</script>
<!-- Mirrored from seantheme.com/color-admin/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Mar 2025 11:29:17 GMT -->

</html>
