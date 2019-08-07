<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">As a Candidate</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">As a Company</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <!-- candidate -->
								<form id="login-form" action="{{ route('login') }}" method="post" role="form" style="display: block;">
                                    @csrf
									<div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" id="username" tabindex="1" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="form-check-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Sign In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
                                                    @if (Route::has('password.request'))
                                                        <a class="forgot-password" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
												</div>
											</div>
										</div>
                                    </div>
                                    <center>Or</center>
                                    <center>Sign in with</center>
                                    <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="{{route('redirect')}}" class="fa fa-google"></a>
												</div>
											</div>
										</div>
                                    </div>
                                    <center>Don't have a <strong>Career Doctor</strong> account?</center>
                                    <div class="text-center">
                                        <a href="{{route('register')}}" class="btn btn-custom">Create Account</a>
                                    </div>
								</form>
								<!-- company  -->
                                <form id="register-form" action="" method="post" role="form" style="display: none;">
									@csrf
									<div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" id="username" tabindex="1" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="form-check-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Sign In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													@if (Route::has('password.request'))
                                                        <a class="forgot-password" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
												</div>
											</div>
										</div>
                                    </div>
                                    <center>Or</center>
                                    <center>Sign in with</center>
                                    <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="{{route('redirect')}}" class="fa fa-google"></a>
												</div>
											</div>
										</div>
                                    </div>
                                    <center>Don't have a <strong>Career Doctor</strong> account?</center>
                                    <div class="text-center">
                                        <a href="{{route('registerCompany')}}" class="btn btn-custom">Create Account</a>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

<script>
    $(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
		location.hash = this.getAttribute("href");
	});

	$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
	});

	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
</body>
</html>