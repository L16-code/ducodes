<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    {{-- <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
        <li class="breadcrumb-item active">Extension Combination</li>
    </ol> --}}
    <a href="{{ url('blogs') }}" class="float-xl-end btn btn-primary">
        Add Blogs
    </a>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Blogs </small></h1>
    <!-- END page-header -->
    <!-- BEGIN row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <!-- BEGIN panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Blog Listing</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" id="redo-button"
                            data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    </div>
                </div>
                <!-- END panel-heading -->
                <!-- BEGIN panel-body -->
                <div class="panel-body">
                    <table id="data-table-combine" width="100%"
                        class="table table-striped table-bordered align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th width="1%"></th>
                                <th width="1%" data-orderable="false"></th>
                                <th class="text-nowrap">Title</th>
                                <th class="text-nowrap">Type</th>
                                <th class="text-nowrap">short desc</th>
                                <th class="text-nowrap">posted on </th>
                                <th class="text-nowrap">status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- END panel-body -->
                <!-- BEGIN hljs-wrapper -->
                <div class="hljs-wrapper">
                    <pre><code class="html" data-url="../assets/data/table-manage/extension-combination.json"></code></pre>
                </div>
                <!-- END hljs-wrapper -->
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-10 -->
    </div>
    <!-- END row -->
</div>
