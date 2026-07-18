<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminLayouts.adminStyles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
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
        <div id="content" class="app-content">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible mb-4">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible mb-4">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
        <!-- END #content -->

        <!-- BEGIN theme-panel -->
        @include('./admin.adminLayouts.themeSettings')
        <!-- END theme-panel -->
        @include('./admin.adminComponents.adminScrollToTop')
    </div>
    <!-- END #app -->

    @include('./admin.adminLayouts.adminJs')
    @stack('scripts')
</body>

</html>
