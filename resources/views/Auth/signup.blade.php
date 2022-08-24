@include('layout.app')
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

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

			<form action="{{ route('user.store') }}" method="POST">
				@csrf

				<span class="login100-form-title p-b-53">
					Sign Up
				</span>

				<div class="wrap-input100 ">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" value="{{old('username')}}" name="username" placeholder="Type your username">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>


				<div class="wrap-input100 validate-input">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" value="{{old('password')}}" placeholder="Type your password">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>


				<div class="wrap-input100 ">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" value="{{old('email')}}" name="email" placeholder="Type your email">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>



				<div class="container-login100-form-btn m-t-17">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" type='submit' name="signup">
							Signup
						</button>
					</div>
					<a href="{{ route('user.login') }}">I already have an account, sign in</a>
				</div>


			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
<!--===============================================================================================-->