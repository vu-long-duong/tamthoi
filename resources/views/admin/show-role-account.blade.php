@include('layout.app')

<body class="g-sidenav-show   bg-gray-100">
    <form action="{{route('admin.create-film-category')}}" method="GET">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>
        @include('layout.nav-vertical')
        <main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
            @include('layout.nav-horizontal')
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                @foreach($list_role as $key => $value)

                <div class="col-12">
                    <div class="card mb-6">
                        <div class="card-header pb-0">
                            <h6>Grant Permissions</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">

                                <table class="table align-items-center mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">username</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$value->username}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{$value->email}}</span>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <a name="role" href="{{route('admin.edit-admin-role-account',['id'=>$value->id])}}">
                                                    @if($value->role==0)
                                                    <span value="0" class="badge badge-sm bg-gradient-success">Admin</span>
                                                    @else
                                                    <span value="1" class="badge badge-sm bg-gradient-secondary">User</span>
                                                    @endif
                                                </a>

                                            </td>

                                            <td class="align-middle">
                                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>

                @endforeach
            </div>
            @include('layout.footer')
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
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/argon-dashboard.min.js?v=2.0.2"></script>


    </form>
</body>

</html>