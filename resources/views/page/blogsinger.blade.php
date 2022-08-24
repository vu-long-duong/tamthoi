@include('layoutfilm.app')
<div class="blog">
    <div class="container">
        <div class="blog-top">
            <div class=" grid_3 grid-1">
                <form action="{{route('page.postsinger-show',['id'=>$post->id])}}" method="get">
                    @csrf
                    <h3><a href="blog_single.html">{{$post->title}}</a></h3>
                    <a href="blog_single.html"><img src="images/1.jpg" class="img-responsive" alt="" /></a>

                    <div class="blog-poast-info">
                        <ul>
                            <li><a class="admin" href="#"><i> </i> Admin </a></li>
                            <li><span><i class="date"> </i>12-04-2015</span></li>
                            <li><a class="p-blog" href="#"><i class="comment"> </i>No Comments</a></li>
                        </ul>
                    </div>
                    <p>{{$post->content}}</p>
                </form>
            </div>


            <h3>Comment</h3>
            

        </div>
    </div>
</div>
</div>