@include('layout.app')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('layout.nav-vertical')

    <main class="main-content position-relative border-radius-lg ps">
        <!-- Navbar -->
        @include('layout.nav-horizontal')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <form action="{{route('admin.profile')}}" method="get">
                <div class="row">
                    <div class="col-md-11 mt-4">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">User Information</h6>
                            </div>
                            @foreach($list_user as $key => $value )
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">{{$value->name}}</h6>
                                            <span class="mb-2 text-xs">Age: <span class="text-dark font-weight-bold ms-sm-2">{{$value->age}}</span></span>
                                            <span class="mb-2 text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">{{$value->account->email}}</span></span>
                                            <span class="mb-2 text-xs">Phone Number: <span class="text-dark ms-sm-2 font-weight-bold">{{$value->account->phonenumber}}</span></span>
                                            <span class="text-xs">Address: <span class="text-dark ms-sm-2 font-weight-bold">{{$value->address}}</span></span>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 order-lg-2">
                                                <div class="card-profile-image">
                                                    <a href="#">
                                                        <img src="{{asset('storage/images/'.$value->images )}}" height="80" width="80" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="ms-auto text-end">
                                            <a name="role" href="">
                                                @if($value->account->role==0)
                                                <span value="0" class="badge badge-sm bg-gradient-success">Admin</span>
                                                @else
                                                <span value="1" class="badge badge-sm bg-gradient-secondary">User</span>
                                                @endif
                                            </a>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="{{route('admin.update-user-role-account',['id'=>$value->id])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Grant permission</a>
                                        </div>


                                    </li>

                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </form>
            @include('layout.footer')

        </div>


    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.2"></script>


</body>