<!DOCTYPE html>
<html lang="en">


<head>
    @include('./admin.adminLayouts.adminStyles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('admincss/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admincss/assets/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
    <style>
        /* DataTables' built-in sort indicators rely on a Unicode-character
           CSS `content` trick that isn't rendering reliably in this theme —
           replaced with plain CSS border-triangles that can't fail to
           render regardless of font/glyph support. */
        table.dataTable thead th.dt-orderable-asc,
        table.dataTable thead th.dt-orderable-desc {
            position: relative;
            padding-right: 22px !important;
            cursor: pointer;
        }
        table.dataTable thead th.dt-orderable-asc span.dt-column-order,
        table.dataTable thead th.dt-orderable-desc span.dt-column-order {
            width: 12px;
        }
        table.dataTable thead th.dt-orderable-asc span.dt-column-order:before,
        table.dataTable thead th.dt-orderable-desc span.dt-column-order:before,
        table.dataTable thead th.dt-orderable-asc span.dt-column-order:after,
        table.dataTable thead th.dt-orderable-desc span.dt-column-order:after {
            content: '' !important;
            position: absolute;
            right: 6px;
            left: auto;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            opacity: .3;
        }
        table.dataTable thead th span.dt-column-order:before {
            top: 3px;
            border-bottom: 5px solid currentColor;
        }
        table.dataTable thead th span.dt-column-order:after {
            bottom: 3px;
            border-top: 5px solid currentColor;
        }
        table.dataTable thead th.dt-ordering-asc span.dt-column-order:before {
            opacity: 1;
        }
        table.dataTable thead th.dt-ordering-desc span.dt-column-order:after {
            opacity: 1;
        }
    </style>
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
        @include('admin.adminComponents.adminBlogListing')
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

<!-- Mirrored from seantheme.com/color-admin/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Mar 2025 11:29:17 GMT -->
<script src="{{ asset('admincss/assets/plugins/datatables.net/js/dataTables.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-colreorder-bs5/js/colReorder.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-rowreorder-bs5/js/rowReorder.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('admincss/assets/js/demo/table-manage-combine.demo.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/%40highlightjs/cdn-assets/highlight.min.js') }}"></script>
<script src="{{ asset('admincss/assets/js/demo/render.highlight.js') }}"></script>
<script src="{{ asset('admincss/assets/plugins/switchery/dist/switchery.min.js') }}"></script>


<script>
    $(document).ready(function() {
        function truncateWords(text, limit) {
            if (!text) return '';
            const words = text.trim().split(/\s+/);
            if (words.length <= limit) return text;
            return words.slice(0, limit).join(' ') + '…';
        }

        // Fetch blog data asynchronously
        function fetchBlogs() {
            $.ajax({
                url: "{{ route('admin.blogs.data') }}",
                method: "GET",
                success: function(data) {
                    let tableBody = '';
                    data.forEach((blog, index) => {
                        tableBody += `
                        <tr>
                            <td width="1%" class="fw-bold">${index + 1}</td>
                            <td width="1%"><img src="/storage/${blog.thumbnail_img}" class="rounded h-30px my-n1 mx-n1" /></td>
                            <td>${blog.blog_title}</td>
                            <td>${blog.blog_type}</td>
                            <td title="${blog.short_desc}">${truncateWords(blog.short_desc, 30)}</td>
                            <td>${new Date(blog.posted_on).toLocaleDateString()}</td>
                            <td>
                                <input type="checkbox" class="status-switch" data-id="${blog.id}" ${blog.status == "active" ? 'checked' : ''}>
                            </td>
                            <td>
                                
                                <a href="/admin/blog/edit/${blog.id}" class="btn btn-sm btn-warning" title="Edit Blog"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    `;
                    });

                    // Destroy existing DataTable instance if it exists
                    if ($.fn.DataTable.isDataTable('#data-table-combine')) {
                        $('#data-table-combine').DataTable().destroy();
                    }

                    $('#data-table-combine tbody').html(tableBody);

                    // Reinitialize DataTable
                    const table = $('#data-table-combine').DataTable({
                        dom: '<"d-flex justify-content-between align-items-center mb-3"<"length-menu"l><"buttons"B><"search-box"f>>' +
                            '<"row"<"col-md-12"tr>>' +
                            '<"row"<"col-md-5"i><"col-md-7 text-end mt-2"p>>',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        responsive: true,
                        paging: true,
                        searching: true,
                        ordering: true,
                        lengthChange: true,
                        autoWidth: false,
                        lengthMenu: [
                            [10, 25, 50, 100],
                            [10, 25, 50, 100]
                        ],
                        pageLength: 10
                    });

                    // Reinitialize switchers after table redraw
                    table.on('draw', function() {
                        initializeSwitchers();
                    });

                    // Initialize switchers for the first time
                    initializeSwitchers();
                },
                error: function() {
                    alert('Failed to fetch blog data. Please try again.');
                }
            });
        }

        // Initialize status switchers
        function initializeSwitchers() {
            // Remove existing Switchery elements
            $('.status-switch').each(function() {
                if ($(this).next('.switchery').length) {
                    $(this).next('.switchery').remove(); // Remove the Switchery element
                }
            });

            // Reinitialize Switchery
            $('.status-switch').each(function() {
                new Switchery(this, {
                    color: '#00acac'
                });
            });

            // Attach change event listener
            $('.status-switch').off('change').on('change', function() {
                const blogId = $(this).data('id');
                const status = $(this).is(':checked') ? "active" : "inactive";

                $.ajax({
                    url: "{{ route('admin.blog.status.update') }}",
                    method: "POST",
                    data: {
                        id: blogId,
                        status: status,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log('Response:', response);
                        if (response.success) {
                            $.gritter.add({
                                title: 'Status',
                                text: 'Status updated Successfully',
                                sticky: false,
                                time: 1500,
                                class_name: 'my-sticky-class gritter-light'
                            });
                        } else {
                            $.gritter.add({
                                title: 'Status',
                                text: 'Status is not updated. Please try again later!',
                                sticky: false,
                                time: 1500,
                                class_name: 'my-sticky-class gritter-light'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        alert('An error occurred while updating the status.');
                    }
                });
            });
        }

        // Fetch blogs on page load
        fetchBlogs();
        $(document).on("click", "#redo-button", function() {
            fetchBlogs();
        });
    });
</script>

</html>
