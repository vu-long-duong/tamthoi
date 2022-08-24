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

    <div class="clearfix"></div>
    <section id="halim-advanced-widget-2">
        @foreach($list_category as $key => $category)
        <div class="section-heading">
            <a href="" title="Phim Bộ">
                <span class="h-text">{{$category->namecategory}}</span>
            </a>
        </div>


        <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($category->filmdetail as $key => $category2)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{route('page.film-detail-show', ['id'=>$category2->films->id])}}">
                        <figure><img class="lazy img-responsive" src="{{asset('storage/images/'.$category2->films->imagefilm )}}" alt="error" title=""></figure>
                        <span class="status"> HD </span>
                        @if($category2->films->subtitle != null)
                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                            Phụ đề
                        </span>
                        @endif

                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{$category2->films->name }}</p>
                                <p class="original_title">{{$category2->films->viewfilm }} lượt xem</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        @endforeach


</main>
@include('layoutfilm.sidebar')
@endsection