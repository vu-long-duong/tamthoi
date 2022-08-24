<body class="g-sidenav-show g-sidenav-pinned ">

    <noscript><iframe src="" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @include('layout.nav-vertical')

    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @include('layout.nav-horizontal')
                </div>
            </div>
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
        </nav>
        <form action="{{route('admin.store-film-detail')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="container-fluid mt--6">

                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Create Film </h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button href="" type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>

                                <h6 class="heading-small text-muted mb-4">Film information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Film name</label>
                                                <input type="text" id="input-username" class="form-control" placeholder="Nhập tên phim..." name="name" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Summary</label>
                                                <input type="text" class="form-control" name="summary" value="" placeholder="Ngày xửa ngày xưa....">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Tags</label>
                                                <input type="text" id="input-username" class="form-control" placeholder="tags" name="tags" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">EpisodeNumber</label>
                                                <input type="text" id="input-email" class="form-control" name="episodenumber" value="" placeholder="Số tập">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Conuntrie</label>
                                        <select id="input-username" name="countrie" class="custom-select">
                                            @foreach($countrie as $key => $vcountrie)
                                            <option value="{{$vcountrie->id}}">{{$vcountrie->namecountrie}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Year</label>
                                        <select name="year" class="custom-select">
                                            @foreach($year as $key => $vyear)
                                            <option value="{{$vyear->id}}">{{$vyear->year}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Genres</label>
                                        <select id="input-username" name="genre" class="custom-select">
                                            @foreach($genre as $key =>$vgenre)
                                            <option value="{{$vgenre->id}}">{{$vgenre->namegenre}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Categories</label>
                                        <select id="input-username" name="category" class="custom-select">
                                            @foreach($category as $key =>$vcategory)
                                            <option value="{{$vcategory->id}}">{{$vcategory->namecategory}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label">Rank</label>
                                                <select id="input-username" name="rank" class="custom-select">
                                                    @foreach($rank as $key =>$vrank)
                                                    <option value="{{$vrank->id}}">
                                                        {{$vrank->vip}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label">Status</label>
                                                <select id="input-username" name="status" class="custom-select">
                                                    <option value="0"> Active </option>
                                                    <option value="1"> NoActive </option>
                                                </select>
                                            </div>
                                        </div>



                                    </div>



                                    <div class="row">

                                        <div class="col">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                    <script>
                                                        function chooseFile(fileInput) {
                                                            if (fileInput.files && fileInput.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function(e) {
                                                                    $('#image').attr('src', e.target.result)
                                                                }
                                                                reader.readAsDataURL(fileInput.files[0]);
                                                            }
                                                        }
                                                    </script>

                                                    <label class="form-control-label" for="input-address">Image</label>
                                                    <input type="file" class="form-control-file" id="imagefile" name="image" onchange="chooseFile(this)" value="{{old('image')}}">
                                                    <img src="" id="image" height="200" width="150" accept="imagge/jpg, imagge/gif, image/jpeg, image/png">
                                                    </img>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Video</label>
                                                    <input type="file" class="form-control-file" name="video" value="{{old('video')}}">


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Subtitle</label>
                                                    <input type="file" class="form-control-file" name="subtitle" value="{{old('subtitle')}}">
                                                </div>
                                            </div>
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