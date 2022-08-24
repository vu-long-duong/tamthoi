@include('layout.app')

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
<form action="{{route('user.update',['id'=> $user->id])}}" method="POST" enctype='multipart/form-data'>
    @csrf

    <body class="g-sidenav-show g-sidenav-pinned">

        <noscript><iframe src="" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

        <div class="main-content" id="panel">
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center  ml-md-auto ">
                            <li class="nav-item d-xl-none">
                            </li>
                            <li class="nav-item d-sm-none">
                                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                    <i class="ni ni-zoom-split-in"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-ungroup"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>



            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col-xl-5 order-xl-4">
                        <div class="card card-profile">

                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <img src="{{asset('storage/images/'.$user->images )}}" height="100" width="100" class="rounded-circle">
                                        <input type="file" class="form-control-file" name="image" value="{{$user->image}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center">


                                            <div class="col md-2 text-center">
                                                <span class="heading text-center">89</span>
                                                <span class="description text-center">Comments</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <h5 class="h3">
                                        {{$user->name}}<span class="font-weight-light">, {{$user->age}} years old</span>
                                    </h5>

                                    <div class="h5 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>{{$user->address}}
                                    </div>

                                    <div class="h5 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>{{$user->phonenumber}}
                                    </div>

                                    <div>
                                        <i class="ni education_hat mr-2"></i>{{$user->email}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                    <i class="fas fa-landmark opacity-10"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="card-body pt-0 p-3 text-center">
                                                    <h6 class="text-center mb-0">Salary</h6>
                                                    <span class="text-xs">Belong Interactive</span>
                                                    <hr class="horizontal dark my-3">
                                                    <h5 class="mb-0">{{$user->price}} VNĐ</h5>
                                                </div>

                                            </div>

                                            <a class="btn bg-gradient-dark mb-0" href="{{route('user.add-addprice',['id'=>$user->id])}}"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Price</a>


                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-4">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                    <i class="fab fa-paypal opacity-10" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">Bank</h6>
                                            </div>
                                            <a class="btn bg-gradient-dark mb-0" href="{{route('user.create-bank',['id'=>$user->id])}}"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Bank</a>
                                            <a class="btn bg-gradient-dark mb-0" href="{{route('user.update-bank',['id'=>$user->id])}}"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Update Bank</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>


                    <div class="col-xl-7 order-xl-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Edit profile </h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button href="" type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Name</label>
                                                    <input type="text" id="input-username" class="form-control" placeholder="Mame...." name="name" value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email address</label>
                                                    <input type="email" id="input-email" class="form-control" name="email" value="{{$user->account->email}}" placeholder="example@example.com">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="my-4">

                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">PhoneNumber</label>
                                                    <input id="input-address" class="form-control" placeholder="Phone Number" name="phonenumber" value="{{$user->account->phonenumber}}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Age</label>
                                                    <input type="text" id="input-country" class="form-control" placeholder="Age" name="age" value="{{$user->age}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Address</label>
                                                    <input id="input-address" class="form-control" placeholder="Home Address" name="address" value="{{$user->address}}" type="text">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <hr class="my-4">

                                </form>
                            </div>
                        </div>
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


        <style>
            #ofBar {
                background: #fff;
                z-index: 999999999;
                font-size: 16px;
                color: #333;
                padding: 16px 40px;
                font-weight: 400;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: fixed;
                top: 40px;
                width: 80%;
                border-radius: 8px;
                left: 0;
                right: 0;
                margin-left: auto;
                margin-right: auto;
                box-shadow: 0 13px 27px -5px rgba(50, 50, 93, 0.25), 0 8px 16px -8px rgba(0, 0, 0, 0.3), 0 -6px 16px -6px rgba(0, 0, 0, 0.025);
            }

            #ofBar-logo img {
                height: 50px;
            }

            #ofBar-content {
                display: inline;
                padding: 0 15px;
            }

            #ofBar-right {
                display: flex;
                align-items: center;
            }

            #ofBar b {
                font-size: 15px !important;
            }

            #count-down {
                display: initial;
                padding-left: 10px;
                font-weight: bold;
                font-size: 20px;
            }

            #close-bar {
                font-size: 17px;
                opacity: 0.5;
                cursor: pointer;
            }

            #close-bar:hover {
                opacity: 1;
            }

            #btn-bar {
                background-image: linear-gradient(310deg, #141727 0%, #3A416F 100%);
                color: #fff;
                border-radius: 4px;
                padding: 10px 20px;
                font-weight: bold;
                text-transform: uppercase;
                text-align: center;
                font-size: 12px;
                opacity: .95;
                margin-right: 20px;
                box-shadow: 0 5px 10px -3px rgba(0, 0, 0, .23), 0 6px 10px -5px rgba(0, 0, 0, .25);
            }

            #btn-bar,
            #btn-bar:hover,
            #btn-bar:focus,
            #btn-bar:active {
                text-decoration: none !important;
                color: #fff !important;
            }

            #btn-bar:hover {
                opacity: 1;
            }

            #btn-bar span,
            #ofBar-content span {
                color: red;
                font-weight: 700;
            }

            #oldPriceBar {
                text-decoration: line-through;
                font-size: 16px;
                color: #fff;
                font-weight: 400;
                top: 2px;
                position: relative;
            }

            #newPrice {
                color: #fff;
                font-size: 19px;
                font-weight: 700;
                top: 2px;
                position: relative;
                margin-left: 7px;
            }

            #fromText {
                font-size: 15px;
                color: #fff;
                font-weight: 400;
                margin-right: 3px;
                top: 0px;
                position: relative;
            }

            @media(max-width: 991px) {}

            @media (max-width: 768px) {
                #count-down {
                    display: block;
                    margin-top: 15px;
                }

                #ofBar {
                    flex-direction: column;
                    align-items: normal;
                }

                #ofBar-content {
                    margin: 15px 0;
                    text-align: center;
                    font-size: 18px;
                }

                #ofBar-right {
                    justify-content: flex-end;
                }
            }
        </style>

    </body>
</form>