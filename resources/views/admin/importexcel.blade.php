@include('layout.app')

<body class="g-sidenav-show g-sidenav-pinned">

    <noscript><iframe src="" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @include('layout.nav-vertical')

    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @include('layout.nav-horizontal')
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </nav>


        <div class="container center ">
            <form action="{{route('admin.importexcel-create')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="col-xl-7 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Import Excel</h3>
                                </div>

                                <div class="col-4 text-right">
                                    <button href="" type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <h6 class="heading-small text-muted mb-4">Import Excel</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Excel</label>
                                        <input type="file" class="form-control-file" name="file" accept=".xlsx" value="{{old('file')}}">


                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
    </div>


    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

    <script src="../assets/js/argon.min.js?v=1.2.0"></script>
    <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>
    <div style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
        <div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div>
    </div>

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>




</body>