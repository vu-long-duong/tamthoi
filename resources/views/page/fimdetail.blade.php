@extends('../page.home')
@section('content')

<nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
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
<div class="container">
   <form action="{{route('page.film-evalue', [ 'id' => $film->id ])}}" method="Post">
      @csrf
      <div class="row container" id="wrapper">
         <div class="halim-panel-filter">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-6">
                     <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('user.home-category',['id'=>$film->filmdetail->filmcategory->id])}}">{{$film->filmdetail->filmcategory->namecategory}}</a> »
                              <span>
                                 <a href="{{route('user.home-countrie',['id'=>$film->filmdetail->filmcountrie->id])}}">{{$film->filmdetail->filmcountrie->namecountrie}}</a> »

                                 <a href="{{route('user.home-year',['id'=> $film->filmdetail->filmyear->id])}}"> {{$film->filmdetail->filmyear->year}}</a> »

                                 <span class="breadcrumb_last" aria-current="page">{{$film->name}}</span>
                              </span>
                           </span></span>
                     </div>
                  </div>
               </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
               <div class="ajax"></div>
            </div>
         </div>

         <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
               <div class="clearfix wrap-content">

                  <div class="halim-movie-wrapper">



                     <div class="movie_info col-xs-12">
                        <div class="movie-poster col-md-3">
                           <img class="movie-thumb" src="{{asset('storage/images/'.$film->imagefilm )}}" alt="">

                           <div class="bwa-content">
                              <div class="loader"></div>
                              <a href="{{route('page.film-watch',['id'=>$film ->id])}}" class="bwac-btn">
                                 <i class="fa fa-play"></i>
                              </a>
                           </div>

                           <a href="{{route('page.film-watch',['id'=>$film ->id])}}" style="display: block;" class="btn btn-primary watch_trailer">Xem Phim</a>

                        </div>
                        <div class="film-poster col-md-9">
                           <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$film->name}}</h1>
                           <h2 class="movie-title title-2" style="font-size: 12px;"> {{$film->viewfilm}} lượt xem</h2>
                           <ul class="list-info-group">
                              <li class="list-info-group-item"><span>Trạng Thái</span> :

                                 </span>
                                 @if($film->subtitle != null)
                                 <span class="episode">
                                    Phụ đề
                                 </span>
                                 @else
                                 <span class="episode">
                                    HD
                                 </span>
                                 @endif

                              </li>

                              <li class="list-info-group-item"><span>Thời lượng</span> :3p25


                              </li>

                              <li class="list-info-group-item"><span>Danh mục </span> :

                                 <a href="{{route('user.home-category',['id'=>$film->filmdetail->filmcategory->id])}}" rel="category tag">{{$film->filmdetail->filmcategory->namecategory}}</a>

                              </li>
                              <li class="list-info-group-item"><span>Năm</span> :
                                 <a href="{{route('user.home-year',['id'=> $film->filmdetail->filmyear->id])}}" rel="category tag"> {{$film->filmdetail->filmyear->year}}</a>
                              </li>
                              <li class="list-info-group-item"><span>Quốc gia</span> :
                                 <a href="{{route('user.home-countrie',['id'=>$film->filmdetail->filmcountrie->id])}}" rel="tag">{{$film->filmdetail->filmcountrie->namecountrie}}</a>
                              </li>
                              <li class="list-info-group-item"><span>Tập số</span> :
                                 <a rel="tag">{{$film->episodenumber}}</a>

                              </li>

                              <li class="list-info-group-item"><span>Đánh giá:
                                    <label for="star1" title="text">{{$avg}} star</label></span>

                                 <button class="list-info-group-item" style="height: 15px; background-color: #141A21; border:none; outline:none;" type="submit">
                                    <div class="rate">
                                       <input type="radio" id="star5" name="rate" value="5" />
                                       <label for="star5" title="text">5 stars</label>
                                       <input type="radio" id="star4" name="rate" value="4" />
                                       <label for="star4" title="text">4 stars</label>
                                       <input type="radio" id="star3" name="rate" value="3" />
                                       <label for="star3" title="text">3 stars</label>
                                       <input type="radio" id="star2" name="rate" value="2" />
                                       <label for="star2" title="text">2 stars</label>
                                       <input type="radio" id="star1" name="rate" value="1" />
                                       <label for="star1" title="text">1 star</label>
                                    </div>
                                 </button>

                              </li>



                           </ul>
                           <div class="movie-trailer hidden"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div id="halim_trailer"></div>
                  <div class="clearfix"></div>
                  <div class="section-bar clearfix">
                     <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                  </div>
                  <div class="entry-content htmlwrap clearfix">
                     <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                           {{$film->filmdetail->summary}}
                        </article>
                     </div>
                  </div>
                  <!--Tags phim-->
                  <div class="section-bar clearfix">
                     <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                  </div>
                  <div class="entry-content htmlwrap clearfix">
                     <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                           Tag
                           <a href="">{{$film->filmdetail->tags}}</a>
                        </article>
                     </div>
                  </div>
                  <!--Comment fb-->
                  <div class="section-bar clearfix">
                     <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                  </div>
                  <div class="entry-content htmlwrap clearfix" style="color:#4aad26;">

                     <div class="video-item halim-entry-box">


                        <article id="post-38424" class="item-content">
                           @php
                           $c_url=Request::url();
                           @endphp
                           <div class="fb-comments" data-href="{{$c_url}}" data-width="100%" data-numposts="5"></div>
                        </article>
                     </div>
                  </div>

               </div>
            </section>

         </main>
      </div>
   </form>
</div>
@endsection