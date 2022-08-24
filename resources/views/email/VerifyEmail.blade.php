<div>VevifyEmail</div>
<div>welcome {{$data}}</div>

<p>
   Click <a href="{{route('user.verify',['token'=> $token])}}"> to Verify Your Email</a>
</p>