@include('layout.app')


<div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
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


    <div class="container center ">

        <form action="{{route('user.add-addprice',['id'=>$price->id])}}" enctype='multipart/form-data' method="POST">
            @csrf

            <div class="col-xl-7 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add price</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button href="" type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <h6 class="heading-small text-muted mb-4">Add price</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="input-username">Price </label>
                                        <input type="text" id="input-username" class="form-control" placeholder="B???n mu???n n???p th??m bao nhi??u ti???n..." name="price" value="{{old('price')}}">
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
        </form>
    </div>
</div>