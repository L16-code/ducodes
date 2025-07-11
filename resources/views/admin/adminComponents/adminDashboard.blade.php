<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Dashboard <small>header small text goes here...</small></h1>
    <!-- END page-header -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL VISITORS</h4>
                    <p>3,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>BOUNCE RATE</h4>
                    <p>20.44%</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>UNIQUE VISITORS</h4>
                    <p>1,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>AVG TIME ON SITE</h4>
                    <p>00:12:23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
    </div>
    <!-- END row -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-8 -->
        <div class="col-xl-8">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body pe-1">
                    <div id="interactive-chart" class="h-300px"></div>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN tabs -->
            <ul class="nav nav-tabs nav-tabs-inverse nav-justified" data-sortable-id="index-2">
                <li class="nav-item"><a href="#latest-post" data-bs-toggle="tab" class="nav-link active"><i
                            class="fa fa-camera fa-lg me-5px"></i> <span class="d-none d-md-inline">Latest
                            Post</span></a></li>
                <li class="nav-item"><a href="#purchase" data-bs-toggle="tab" class="nav-link"><i
                            class="fa fa-archive fa-lg me-5px"></i> <span class="d-none d-md-inline">Purchase</span></a>
                </li>
                <li class="nav-item"><a href="#email" data-bs-toggle="tab" class="nav-link"><i
                            class="fa fa-envelope fa-lg me-5px"></i> <span class="d-none d-md-inline">Email</span></a>
                </li>
            </ul>
            <div class="tab-content panel rounded-0 rounded-bottom mb-20px" data-sortable-id="index-3">
                <div class="tab-pane fade active show" id="latest-post">
                    <div class="h-300px p-3" data-scrollbar="true">
                        <div class="d-sm-flex">
                            <a href="javascript:;" class="w-sm-200px">
                                <img class="mw-100 rounded"
                                    src="{{ asset('admincss/assets/img/gallery/gallery-1.jpg') }}" alt="" />
                            </a>
                            <div class="flex-1 ps-sm-3 pt-3 pt-sm-0">
                                <h5>Aenean viverra arcu nec pellentesque ultrices. In erat purus, adipiscing nec lacinia
                                    at, ornare ac eros.</h5>
                                Nullam at risus metus. Quisque nisl purus, pulvinar ut mauris vel, elementum suscipit
                                eros. Praesent ornare ante massa, egestas pellentesque orci convallis ut. Curabitur
                                consequat convallis est, id luctus mauris lacinia vel. Nullam tristique lobortis mauris,
                                ultricies fermentum lacus bibendum id. Proin non ante tortor. Suspendisse pulvinar
                                ornare tellus nec pulvinar. Nam pellentesque accumsan mi, non pellentesque sem convallis
                                sed. Quisque rutrum erat id auctor gravida.
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-sm-flex">
                            <a href="javascript:;" class="w-sm-200px">
                                <img class="mw-100 rounded"
                                    src="{{ asset('admincss/assets/img/gallery/gallery-10.jpg') }}" alt="" />
                            </a>
                            <div class="flex-1 ps-sm-3 pt-3 pt-sm-0">
                                <h5>Vestibulum vitae diam nec odio dapibus placerat. Ut ut lorem justo.</h5>
                                Fusce bibendum augue nec fermentum tempus. Sed laoreet dictum tempus. Aenean ac sem quis
                                nulla malesuada volutpat. Nunc vitae urna pulvinar velit commodo cursus. Nullam eu felis
                                quis diam adipiscing hendrerit vel ac turpis. Nam mattis fringilla euismod. Donec eu
                                ipsum sit amet mauris iaculis aliquet. Quisque sit amet feugiat odio. Cras convallis
                                lorem at libero lobortis, placerat lobortis sapien lacinia. Duis sit amet elit bibendum
                                sapien dignissim bibendum.
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-sm-flex">
                            <a href="javascript:;" class="w-sm-200px">
                                <img class="mw-100 rounded"
                                    src="{{ asset('admincss/assets/img/gallery/gallery-7.jpg') }}" alt="" />
                            </a>
                            <div class="flex-1 ps-sm-3 pt-3 pt-sm-0">
                                <h5>Maecenas eget turpis luctus, scelerisque arcu id, iaculis urna. Interdum et
                                    malesuada fames ac ante ipsum primis in faucibus.</h5>
                                Morbi placerat est nec pharetra placerat. Ut laoreet nunc accumsan orci aliquam
                                accumsan. Maecenas volutpat dolor vitae sapien ultricies fringilla. Suspendisse vitae
                                orci sed nibh ultrices tristique. Aenean in ante eget urna semper imperdiet.
                                Pellentesque sagittis a nulla at scelerisque. Nam augue nulla, accumsan quis nisi a,
                                facilisis eleifend nulla. Praesent aliquet odio non imperdiet fringilla. Morbi a porta
                                nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                Curae.
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-sm-flex">
                            <a href="javascript:;" class="w-sm-200px">
                                <img class="mw-100 rounded"
                                    src="{{ asset('admincss/assets/img/gallery/gallery-8.jpg') }}" alt="" />
                            </a>
                            <div class="flex-1 ps-sm-3 pt-3 pt-sm-0">
                                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor accumsan
                                    rutrum.</h5>
                                Fusce augue diam, vestibulum a mattis sit amet, vehicula eu ipsum. Vestibulum eu mi nec
                                purus tempor consequat. Vestibulum porta non mi quis cursus. Fusce vulputate cursus
                                magna, tincidunt sodales ipsum lobortis tincidunt. Mauris quis lorem ligula. Morbi
                                placerat est nec pharetra placerat. Ut laoreet nunc accumsan orci aliquam accumsan.
                                Maecenas volutpat dolor vitae sapien ultricies fringilla. Suspendisse vitae orci sed
                                nibh ultrices tristique. Aenean in ante eget urna semper imperdiet. Pellentesque
                                sagittis a nulla at scelerisque.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="purchase">
                    <div class="h-300px" data-scrollbar="true">
                        <table class="table table-panel mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th class="hidden-sm text-center">Product</th>
                                    <th></th>
                                    <th>Amount</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-muted">13/02/2025</td>
                                    <td class="hidden-sm text-center">
                                        <a href="javascript:;">
                                            <img src="{{ asset('admincss/assets/img/product/product-1.png') }}"
                                                alt="" width="32px" />
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <h6><a href="javascript:;" class="text-dark text-decoration-none">Nunc
                                                eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a>
                                        </h6>
                                    </td>
                                    <td class="text-blue fw-bold">$349.00</td>
                                    <td class="text-nowrap"><a href="javascript:;"
                                            class="text-dark text-decoration-none">Derick Wong</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">13/02/2025</td>
                                    <td class="hidden-sm text-center">
                                        <a href="javascript:;">
                                            <img src="{{ asset('admincss/assets/img/product/product-2.png') }}"
                                                alt="" width="32px" />
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <h6><a href="javascript:;" class="text-dark text-decoration-none">Nunc
                                                eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a>
                                        </h6>
                                    </td>
                                    <td class="text-blue fw-bold">$399.00</td>
                                    <td class="text-nowrap"><a href="javascript:;"
                                            class="text-dark text-decoration-none">Derick Wong</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">13/02/2025</td>
                                    <td class="hidden-sm text-center">
                                        <a href="javascript:;">
                                            <img src="{{ asset('admincss/assets/img/product/product-3.png') }}"
                                                alt="" width="32px" />
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <h6><a href="javascript:;" class="text-dark text-decoration-none">Nunc
                                                eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a>
                                        </h6>
                                    </td>
                                    <td class="text-blue fw-bold">$499.00</td>
                                    <td class="text-nowrap"><a href="javascript:;"
                                            class="text-dark text-decoration-none">Derick Wong</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">13/02/2025</td>
                                    <td class="hidden-sm text-center">
                                        <a href="javascript:;">
                                            <img src="{{ asset('admincss/assets/img/product/product-4.png') }}"
                                                alt="" width="32px" />
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <h6><a href="javascript:;" class="text-dark text-decoration-none">Nunc
                                                eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a>
                                        </h6>
                                    </td>
                                    <td class="text-blue fw-bold">$230.00</td>
                                    <td class="text-nowrap"><a href="javascript:;"
                                            class="text-dark text-decoration-none">Derick Wong</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">13/02/2025</td>
                                    <td class="hidden-sm text-center">
                                        <a href="javascript:;">
                                            <img src="{{ asset('admincss/assets/img/product/product-5.png') }}"
                                                alt="" width="32px" />
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <h6><a href="javascript:;" class="text-dark text-decoration-none">Nunc
                                                eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a>
                                        </h6>
                                    </td>
                                    <td class="text-blue fw-bold">$500.00</td>
                                    <td class="text-nowrap"><a href="javascript:;"
                                            class="text-dark text-decoration-none">Derick Wong</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="email">
                    <div class="h-300px p-3" data-scrollbar="true">
                        <div class="d-flex">
                            <a class="w-60px" href="javascript:;">
                                <img src="{{ asset('admincss/assets/img/user/user-1.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <a href="javascript:;" class="text-dark text-decoration-none">
                                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                                </a>
                                <p class="mb-5px">
                                    Aenean mollis arcu sed turpis accumsan dignissim. Etiam vel tortor at risus
                                    tristique convallis. Donec adipiscing euismod arcu id euismod. Suspendisse potenti.
                                    Aliquam lacinia sapien ac urna placerat, eu interdum mauris viverra.
                                </p>
                                <span class="text-muted fs-11px fw-bold">Received on 04/16/2025, 12.39pm</span>
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-flex">
                            <a class="w-60px" href="javascript:;">
                                <img src="{{ asset('admincss/assets/img/user/user-2.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <a href="javascript:;" class="text-dark text-decoration-none">
                                    <h5>Praesent et sem porta leo tempus tincidunt eleifend et arcu.</h5>
                                </a>
                                <p class="mb-5px">
                                    Proin adipiscing dui nulla. Duis pharetra vel sem ac adipiscing. Vestibulum ut porta
                                    leo. Pellentesque orci neque, tempor ornare purus nec, fringilla venenatis elit.
                                    Duis at est non nisl dapibus lacinia.
                                </p>
                                <span class="text-muted fs-11px fw-bold">Received on 04/16/2025, 12.39pm</span>
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-flex">
                            <a class="w-60px" href="javascript:;">
                                <img src="{{ asset('admincss/assets/img/user/user-3.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <a href="javascript:;" class="text-dark text-decoration-none">
                                    <h5>Ut mi eros, varius nec mi vel, consectetur convallis diam.</h5>
                                </a>
                                <p class="mb-5px">
                                    Ut mi eros, varius nec mi vel, consectetur convallis diam. Nullam eget hendrerit
                                    eros. Duis lacinia condimentum justo at ultrices. Phasellus sapien arcu, fringilla
                                    eu pulvinar id, mattis quis mauris.
                                </p>
                                <span class="text-muted fs-11px fw-bold">Received on 04/16/2025, 12.39pm</span>
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-flex">
                            <a class="w-60px" href="javascript:;">
                                <img src="{{ asset('admincss/assets/img/user/user-4.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <a href="javascript:;" class="text-dark text-decoration-none">
                                    <h5>Aliquam nec dolor vel nisl dictum ullamcorper.</h5>
                                </a>
                                <p class="mb-5px">
                                    Aliquam nec dolor vel nisl dictum ullamcorper. Duis vel magna enim. Aenean volutpat
                                    a dui vitae pulvinar. Nullam ligula mauris, dictum eu ullamcorper quis, lacinia nec
                                    mauris.
                                </p>
                                <span class="text-muted fs-11px fw-bold">Received on 04/16/2025, 12.39pm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END tabs -->

            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-4">
                <div class="panel-heading">
                    <h4 class="panel-title">Quick Post</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-toolbar">
                    <div class="btn-group me-5px">
                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-bold"></i></a>
                        <a class="btn btn-white active" href="javascript:;"><i class="fa fa-italic"></i></a>
                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-underline"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-left"></i></a>
                        <a class="btn btn-white active" href="javascript:;"><i class="fa fa-align-center"></i></a>
                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-right"></i></a>
                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-justify"></i></a>
                    </div>
                </div>
                <hr class="m-0" />
                <textarea class="form-control rounded-0 border-0 shadow-none bg-light p-3" rows="14">Enter some comment.</textarea>
                <div class="panel-footer text-end">
                    <a href="javascript:;" class="btn btn-white btn-sm">Cancel</a>
                    <a href="javascript:;" class="btn btn-primary btn-sm ms-5px">Action</a>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-5">
                <div class="panel-heading">
                    <h4 class="panel-title">Message</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body p-0">
                    <div class="h-300px p-3" data-scrollbar="true">
                        <div class="d-flex">
                            <a href="javascript:;" class="w-60px">
                                <img src="{{ asset('admincss/assets/img/user/user-5.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <h5>John Doe</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id nunc non eros
                                    fermentum vestibulum ut id felis. Nunc molestie libero eget urna aliquet, vitae
                                    laoreet felis ultricies. Fusce sit amet massa malesuada, tincidunt augue vitae,
                                    gravida felis.</p>
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-flex">
                            <a href="javascript:;" class="w-60px">
                                <img src="{{ asset('admincss/assets/img/user/user-6.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <h5>Terry Ng</h5>
                                <p>Sed in ante vel ipsum tristique euismod posuere eget nulla. Quisque ante sem,
                                    scelerisque iaculis interdum quis, eleifend id mi. Fusce congue leo nec mauris
                                    malesuada, id scelerisque sapien ultricies.</p>
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-flex">
                            <a href="javascript:;" class="w-60px">
                                <img src="{{ asset('admincss/assets/img/user/user-8.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <h5>Fiona Log</h5>
                                <p>Pellentesque dictum in tortor ac blandit. Nulla rutrum eu leo vulputate ornare. Nulla
                                    a semper mi, ac lacinia sapien. Sed volutpat ornare eros, vel semper sem sagittis
                                    in. Quisque risus ipsum, iaculis quis cursus eu, tristique sed nulla.</p>
                            </div>
                        </div>
                        <hr class="bg-gray-500" />
                        <div class="d-flex">
                            <a href="javascript:;" class="w-60px">
                                <img src="{{ asset('admincss/assets/img/user/user-7.jpg') }}" alt=""
                                    class="mw-100 rounded-pill" />
                            </a>
                            <div class="flex-1 ps-3">
                                <h5>John Doe</h5>
                                <p>Morbi molestie lorem quis accumsan elementum. Morbi condimentum nisl iaculis, laoreet
                                    risus sed, porta neque. Proin mi leo, dapibus at ligula a, aliquam consectetur
                                    metus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light" placeholder="Enter message" />
                            <button class="btn btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-8 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-6">
                <div class="panel-heading">
                    <h4 class="panel-title">Analytics Details</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-panel align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th>Total</th>
                                <th>Trend</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td nowrap><label class="badge bg-danger">Unique Visitor</label></td>
                                <td>13,203 <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                                <td>
                                    <div id="sparkline-unique-visitor"></div>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-warning">Bounce Rate</label></td>
                                <td>28.2%</td>
                                <td>
                                    <div id="sparkline-bounce-rate"></div>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-success">Total Page Views</label></td>
                                <td>1,230,030</td>
                                <td>
                                    <div id="sparkline-total-page-views"></div>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-blue">Avg Time On Site</label></td>
                                <td>00:03:45</td>
                                <td>
                                    <div id="sparkline-avg-time-on-site"></div>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-default text-gray-900">% New Visits</label></td>
                                <td>40.5%</td>
                                <td>
                                    <div id="sparkline-new-visits"></div>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-gray-900">Return Visitors</label></td>
                                <td>73.4%</td>
                                <td>
                                    <div id="sparkline-return-visitors"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-7">
                <div class="panel-heading">
                    <h4 class="panel-title">Visitors User Agent</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="donut-chart" class="h-300px"></div>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-8">
                <div class="panel-heading">
                    <h4 class="panel-title">Todo List</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body p-0">
                    <div class="todolist">
                        <div class="todolist-item active">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist1"
                                        data-change="todolist" checked />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist1">Donec vehicula pretium nisl, id lacinia nisl
                                tincidunt id.</label>
                        </div>
                        <div class="todolist-item">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist2"
                                        data-change="todolist" />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist2">Duis a ullamcorper massa.</label>
                        </div>
                        <div class="todolist-item">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist3"
                                        data-change="todolist" />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist3">Phasellus bibendum, odio nec vestibulum
                                ullamcorper.</label>
                        </div>
                        <div class="todolist-item">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist4"
                                        data-change="todolist" />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist4">Duis pharetra mi sit amet dictum
                                congue.</label>
                        </div>
                        <div class="todolist-item">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist5"
                                        data-change="todolist" />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist5">Duis pharetra mi sit amet dictum
                                congue.</label>
                        </div>
                        <div class="todolist-item">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist6"
                                        data-change="todolist" />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist6">Phasellus bibendum, odio nec vestibulum
                                ullamcorper.</label>
                        </div>
                        <div class="todolist-item">
                            <div class="todolist-input">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="todolist7"
                                        data-change="todolist" />
                                </div>
                            </div>
                            <label class="todolist-label" for="todolist7">Donec vehicula pretium nisl, id lacinia nisl
                                tincidunt id.</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN panel -->
            <div class="panel panel-inverse bg-gray-800" data-sortable-id="index-9">
                <div class="panel-heading">
                    <h4 class="panel-title">World Visitors</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body p-0">
                    <div id="world-map" class="h-300px" data-theme="transparent"></div>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-10">
                <div class="panel-heading">
                    <h4 class="panel-title">Calendar</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning"
                            data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative">
                        <div></div>
                    </div>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>
