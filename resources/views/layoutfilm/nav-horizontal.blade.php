<div class="navbar-container">
    <div class="container">
        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
            <div class="collapse navbar-collapse">
                <div class="menu-menu_1-container">
                    <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('user.home')}}">Trang Chủ</a></li>


                        <li class="mega dropdown">
                            <a title="Danh mục" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Category <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($list_category as $key => $vcategory)
                                <li><a title="" href="{{route('user.home-category',['id'=>$vcategory->id])}}">{{$vcategory->namecategory}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="mega dropdown">
                            <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Genre <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">

                                @foreach($list_genre as $key => $vgenre)
                                <li><a title="" href="{{route('user.home-genre',['id'=>$vgenre->id])}}">{{$vgenre->namegenre}}</a></li>
                                @endforeach

                            </ul>
                        </li>

                        <li class="mega dropdown">
                            <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Countrie<span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">

                                @foreach($list_countrie as $key => $vcountrie)
                                <li><a title="" href="{{route('user.home-countrie',['id'=>$vcountrie->id])}}">{{$vcountrie->namecountrie}}</a></li>
                                @endforeach



                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Năm Phim" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Year <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">

                                @foreach($list_year as $key => $vyear)
                                <li><a title="" href="{{route('user.home-year',['id'=>$vyear->id])}}">{{$vyear->year}}</a></li>
                                @endforeach

                            </ul>
                        </li>

                        <li class="mega"><a title="" href="{{route('page.post-show')}}">Blog</a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-left" style="background:#000;">
                    <li><a id="locphim" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                </ul>

            </div>


            <div id="film" class="halim_box" style="display: none;">
                <form action="{{route('admin.searchdetail')}}" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="container">
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="form-group">
                                <label class="form-control-label">Genres:</label>
                                <select id="input-username" name="genre_" class="custom-select">
                                    <option value="">--</option>
                                    @foreach($list_genre as $key => $vgenre1)
                                    <option value="{{$vgenre1->id}}">{{$vgenre1->namegenre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </article>

                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="form-group">
                                <label class="form-control-label">Category:</label>
                                <select id="input-username" name="category" class="custom-select">
                                    <option value="">--</option>
                                    @foreach($list_category as $key => $vcategory1)
                                    <option value="{{$vcategory1->id}}">{{$vcategory1->namecategory}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </article>

                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="form-group">
                                <label class="form-control-label">Countrie:</label>
                                <select id="input-username" name="countrie" class="custom-select">
                                    <option value="">--</option>
                                    @foreach($list_countrie as $key => $vcountrie1)
                                    <option value="{{$vcountrie1->id}}">{{$vcountrie1->namecountrie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </article>

                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="form-group">
                                <label class="form-control-label">Year:</label>

                                <select id="input-username" name="year" class="custom-select">
                                    <option value="">--</option>
                                    @foreach($list_year as $key => $vyear1)
                                    <option value="{{$vyear1->id}}">{{$vyear1->year}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </article>
                        <button class="btn btn-primary"> Search </button>
                </form>
            </div>

    </div>



    </nav>

    <div class="collapse navbar-collapse" id="search-form">
        <div id="mobile-search-form" class="halim-search-form"></div>
    </div>
    <div class="collapse navbar-collapse" id="user-info">
        <div id="mobile-user-login"></div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#locphim').on('click', function() {
            $('#film').css('display', 'block');
        });
    })
</script>