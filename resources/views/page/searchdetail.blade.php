@extends('../page.home')

@section('content')

<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">


    <div class="clearfix"></div>
    <section id="halim-advanced-widget-2">

        <div class="section-heading">
            <a href="" title="Phim Bộ">
                <span class="h-text"> Tìm kiếm</span>
            </a>
        </div>


        <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($film as $key => $f)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{route('page.film-detail-show', ['id'=>$f->films->id])}}">
                        <figure><img class="lazy img-responsive" src="{{asset('storage/images/'.$f->films->imagefilm )}}" alt="error" title=""></figure>
                        <span class="status"> HD </span>
                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                            Phụ đề
                        </span>

                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{$f->films->name }}</p>
                                <p class="original_title">The Surprise Visit</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
            @endforeach

        </div>


    </section>


</main>

@endsection