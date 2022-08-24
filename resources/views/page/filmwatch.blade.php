@extends('../page.home')

@section('content')

<form action="{{route('page.film-watch',['id'=>$film->id])}}" method="get">
    <div class="halim-panel-filter">

        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a>Phim hay</a> » <span><a>Tuyển chọn</a> » <span class="breadcrumb_last" aria-current="page"> {{$film->name}}</span></span></span></span></div>
                </div>
            </div>
        </div>

        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>

    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        <section id="content" class="test">

            <div class="clearfix"></div>
            <div class="clearfix"></div>


            <div class="title-wrapper-xem full">
                <h2 class="entry-title"><a href="#" title="" class="tl">{{$film->name}} </a></h2>
            </div>

            <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                <article id="post-37976" class="item-content post-37976"></article>
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
                <div id="halim-ajax-list-server"></div>
            </div>
            <div id="halim-list-server">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                        <div class="halim-server">
                            <ul class="halim-list-eps">
                                Tập 1
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="grid">

                <main>
                    <div id="container">
                        <video controls crossorigin playsinline data-poster="{{asset('storage/images/'.$film->imagefilm )}}" id="player">
                            <!-- Video files -->
                            <source src="{{asset('storage/videos/'.$film->videofilm )}}" type="video/mp4" size="1500" />

                            <!-- Caption files -->
                            <track kind="captions" label="English" srclang="en" src="{{asset('storage/subtitles/'.$film->subtitle )}}" default />
                            <track kind="captions" label="Français" srclang="fr" src="{{asset('storage/subtitles/'.$film->subtitle )}}" />
                            <!-- Fallback for browsers that don't support the <video> element -->
                            <a href="{{asset('storage/videos/'.$film->videofilm )}}" download>Download</a>
                        </video>
                    </div>

                </main>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.7/plyr.min.js" crossorigin="anonymous"></script>



        </section>

    </main>

    <!-- layoutfilm.sidebar-->
</form>


@endsection