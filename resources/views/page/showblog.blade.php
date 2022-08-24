@include('layoutfilm.app')
<div class="blog">

    <div class="container">
        <h1>Blog</h1>

        <div class="header-left">
            <div class="button"><a href="{{route('page.create-post')}}">Viết bài</a></div>
        </div>
    </div>
    <form action="{{route('page.post-show')}}" method=" get">
        <div class="container">
            @foreach($list_post as $key => $value)
            <div class="col-md-6 grid_3">

                <h3><a href="">{{$value->title}}</a></h3>
                <a href=""><img src="{{asset('/images/ff9-fast-furious-9-cgv-poster.jpg')}}" class="img-responsive" height="200" width="250" alt="" /></a>
                <div class="blog-poast-info">
                    <ul>
                        <li>ID:{{$value->id}}</li>
                        <li><a class="admin" href="#"><i> </i> Admin </a></li>
                        <li><span><i class="date"> </i>12-04-2015</span></li>
                        <li><a class="p-blog" href="#"><i class="comment"> </i>No Comments</a></li>
                        <li><a href="p-blog" href="#"> Tag</a></li>
                    </ul>
                </div>
                <p>{{$value->content}}</p>
                <div class="button"><a href="{{route('page.postsinger-show',['id'=> $value->id])}}">Read More</a></div>

            </div>
            @endforeach
        </div>
        <div class="clearfix"> </div>
    </form>
</div>
</div>