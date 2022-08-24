<header id="header">
    <div class="container">
        <div class="row" id="headwrap">
            <div class="col-md-3 col-sm-6 ">

                <p class="site-title"><a href="{{route('user.home')}}" title="Phim hay"> <img src="{{asset('../images/logo.jpg')}}"> </img> </p></a>
            </div>

            <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                <div class="header-nav">
                    <div class="col-xs-12">
                        <style type="text/css">
                            ul#result {
                                position: absolute;
                                z-index: 9999;
                                background: #1b2d3c;
                                width: 94%;
                                padding: 10px;
                                margin: 1px;
                            }
                        </style>

                        <div class="form-group form-timkiem">

                            <form action="{{route('admin.search')}}" method="GET" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" id="timkiem" name="search" placeholder="Search ...." aria-label="Search">
                                <button class="btn btn-primary"> Search </button>
                            </form>

                        </div>
                        <ul class="list-group" id="result" style="display: none;"></ul>


                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <a href="{{route('page.show-uprank')}}">
                    <button type="submit" id="get-bookmark"><i></i><span class="count"> Up Rank Vip</span></button>
                </a>
            </div>

            <div class="col-md-2 " style="padding:0px">

                <a href="">
                    <li class="mega dropdown">
                        <a href="#" title="Thể Loại" data-toggle="dropdown" class="dropdown-toggle"><button type="submit" id="get-bookmark"><i></i><span> {{Auth()->user()->username}} <span class="caret"></span></span></button></a>
                        <ul role="menu" class=" dropdown-menu">
                            <li><a title="" href="{{route('user.index',[Auth()->user()->id])}}">Userprofile</a></li>
                            @if(Auth()->user()->password != null)
                            <li><a title="" href="{{route('user.myaccount',[Auth()->user()->id])}}">Account</a></li>
                            @endif
                            <li><a title="" href=" {{route('user.login')}}">Logout</a></li>
                        </ul>
                    </li>
                </a>
            </div>


        </div>
    </div>
</header>

<script type="text/javascript">
    $(document).ready(function() {

        $('#timkiem').keyup(function() {
            $('#result').html('');
            var search = $('#timkiem').val();
            if (search != '') {
                $('#result').css('display', 'inherit');
                var expression = new RegExp(search, "i");
                $.getJSON('/json/movies.json', function(data) {
                    $.each(data, function(key, value) {

                            if (value.name.search(expression) != -1) {
                                $('#result').append('<li class="list-group-item" style="cursor:pointer"><img height="40" width="40" src="storage/images/' + value.imagefilm + '">' + value.name + '<br/> | <span>' + value.filmdetail['sumary'] + '</span></li>');
                            }

                    });
                })
            } else {
                $('#result').css('display', 'none');
            }
        })



        $('#result').on('click', 'li', function() {
            var click_text = $(this).text().split('|');

            $('#timkiem').val($.trim(click_text[0]));

            $("#result").html('');
            $('#result').css('display', 'none');
        });

    })
</script>