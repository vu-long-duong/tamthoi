@extends('../page.home')

@section('content')

<nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
    @if (session('errors'))
    <div class="alert alert-danger" role="alert">
        {{ session('errors') }}
    </div>
    @endif
</nav>

@include('layoutfilm.nav-horizontal')
<div class="container">
    @include('layoutfilm.slide')
</div>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">


    <div class="clearfix"> </div>
    <section id="halim-advanced-widget-2">
        @foreach($list_category as $key => $category)
        <form action="{{route('user.home-category',['id'=>$category->id])}}" method="get">
            <div class="section-heading">
                <a href="" title="Phim Bộ">
                    <span class="h-text">{{$category->namecategory}}</span>
                </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                @foreach($category->filmdetail as $key => $cate)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{route('page.film-detail-show', ['id'=>$cate->films->id])}}">
                            <figure><img class="lazy img-responsive" src="{{asset('storage/images/'.$cate->films->imagefilm )}}" alt="error" title=""></figure>
                            <span class="status"> HD </span>
                            @if($cate->films->subtitle != null)
                            <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                Phụ đề
                            </span>
                            @endif
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                                <div class="halim-post-title ">
                                    <p class="entry-title">{{$cate->films->name }}</p>
                                    <p class="original_title">{{$cate->films->viewfilm }} lượt xem</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>


        </form>
        @endforeach
    </section>

</main>
@include('layoutfilm.sidebar')
@endsection