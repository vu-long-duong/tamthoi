@include('layout.app')

<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			@foreach($errors ->all() as $error)
			<div class="alert alert-danger" role="alert">
				{{ $error }}
			</div>
			@endforeach
			@if (session('success'))
			<div class="alert alert-success" role="alert">
				{{ session('success') }}
			</div>
			@endif

			<span class="login100-form-title p-b-49">
				Login
			</span>
			<form action="{{ route('user.login-account') }}" method="GET">
				@csrf
				<div class="wrap-input100 validate-input m-b-23">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="username" placeholder="Type your username">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" placeholder="Type your password">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<div class="text-right p-t-8 p-b-31">
					<a href="{{route('user.show-resetpassword')}}">
						Forgot password?
					</a>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" type='submit' name="login">
							Login
						</button>
					</div>
				</div>
				
			</form>

			<div class="txt1 text-center p-t-54 p-b-20">
				<span class="txt1 p-b-17">
					Login associated with?
				</span>
			</div>

			<div class="flex-c-m">
				<a href="{{route('login-facebook')}}" class="login100-social-item bg1">
					<i class="fa fa-facebook"></i>
				</a>


				<a href="{{route('login-google')}}" class="login100-social-item bg3">
					<i class="fa fa-google"></i>
				</a>
			</div>

			<div class="flex-col-c p-t-155">


				<a href="{{route('user.signup')}}" class="txt2">
					Sign Up
				</a>
			</div>


		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>