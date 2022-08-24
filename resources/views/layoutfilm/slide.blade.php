<div id="halim_related_movies-2xx" class="wrap-slider">
    <div class="section-bar clearfix">
        <h3 class="section-title"><span>Phim mới nhất</span></h3>
    </div>
    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
        @foreach($slide as $key => $sl)
        <article class="thumb grid-item post-38498">
            <div class="halim-item">
                <a class="halim-thumb" href="{{route('page.film-detail-show', ['id'=>$sl->id])}}" title="">

                    <figure><img class="lazy img-responsive" src="{{asset('storage/images/'.$sl->imagefilm)}}" alt="" title="Đại Thánh Vô Song"></figure>
                    <span class="status">
                        HD
                    </span>
                    @if($sl->subtitle != null)
                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                        Phụ đề
                    </span>
                    @endif

                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                            <p class="entry-title">{{$sl->name}}</p>
                            <p class="original_title">{{$sl->viewfilm}} lượt xem</p>
                        </div>
                    </div>

                </a>
            </div>
        </article>
        @endforeach
    </div>

    <script>
        jQuery(document).ready(function($) {
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({
                loop: true,
                margin: 4,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: true,
                navText: [],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    480: {
                        items: 3
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>
</div>