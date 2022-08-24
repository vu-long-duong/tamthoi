@include('layoutfilm.app')
<div class="container">
    <div class="blog">
        <div class="single-bottom">
            <h3>Tạo bài viết</h3>
            <form action="{{route('page.store-post')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-control-label" for="input-username">Title</label>
                    <input type="text" class="form-control" placeholder="Tiêu đề" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" >Content</label>
                    <textarea  class="form-control" id="noidung" placeholder="Nội dung" rows="5" style="resize: none" name="content" value="{{old('content')}}"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="input-username">Tags:</label>
                    <select id="input-username" name="tags" class="custom-select">
                        @foreach($film as $key => $value)
                        <option value="0">{{$value->tags}}</option>
                        @endforeach
                    </select>
                </div>

                
                <input type="submit" value="Create">

            </form>
        </div>
    </div>
</div>