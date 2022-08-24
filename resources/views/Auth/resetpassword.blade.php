@include('layout.app')
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            @if (session('errors'))
            <div class="alert alert-danger" role="alert">
                {{ session('errors') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <span class="login100-form-title p-b-49">
                Reset Password
            </span>
            
            <form action="{{route('user.resetpassword')}}" method="GET">
                @csrf
                <div class="wrap-input100 validate-input m-b-23">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Type your email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-23">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Type your email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type='submit' >
                            Reset
                        </button>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>