@extends('../page.home')

@section('content')

<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">


    <div class="clearfix"></div>
    <section id="halim-advanced-widget-2">
        @foreach($filmsearch as $key => $film)
        <div class="section-heading">
            <a href="" title="Phim Bộ">
                <span class="h-text"> Tìm kiếm với từ khóa là: {{$film->name}}</span>
            </a>
        </div>


        <div id="halim-advanced-widget-2-ajax-box" class="halim_box">

            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{route('page.film-detail-show', ['id'=>$film->id])}}">
                        <figure><img class="lazy img-responsive" src="{{asset('storage/images/'.$film->imagefilm )}}" alt="error" title=""></figure>
                        <span class="status"> HD </span>
                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                            Phụ đề
                        </span>

                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{$film->name }}</p>
                                <p class="original_title">The Surprise Visit</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>

        </div>
        @endforeach

    </section>


</main>

@endsection