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
        @include('admin.adminComponents.adminEditBlog')
        <!-- END #content -->

        <!-- BEGIN theme-panel -->
        @include('./admin.adminLayouts.themeSettings')
        <!-- END theme-panel -->
        @include('./admin.adminComponents.adminScrollToTop')
    </div>
    <!-- END #app -->

    @include('./admin.adminLayouts.adminJs')
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"9213e8312ffde195","version":"2025.1.0","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}'
        crossorigin="anonymous"></script>
</body>
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
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
            ]
        });
    });

    document.getElementById('editBlogForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        const form = e.target;
        const formData = new FormData(form);
        const responseMessage = document.getElementById('responseMessage');
        responseMessage.innerHTML = ''; // Clear previous messages

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
                    setTimeout(() => {
                        window.location.href = "{{ url('admin/blog-listing') }}";
                    }, 1000);
                    $.gritter.add({
                        title: 'Success',
                        text: 'Blog Updated Successfully',
                        sticky: false,
                        time: 1500,
                        class_name: 'my-sticky-class gritter-light'
                    });
                } else {
                    responseMessage.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                responseMessage.innerHTML =
                    `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
            });
    });
</script>
<!-- Mirrored from seantheme.com/color-admin/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Mar 2025 11:29:17 GMT -->

</html>
