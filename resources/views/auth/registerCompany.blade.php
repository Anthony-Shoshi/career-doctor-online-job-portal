<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration </title>
	<link rel="shortcut icon" href="{{asset('user/assets/images/favicon.ico')}}" type="images/x-icon">
    <link rel="icon" href="{{asset('user/assets/images/favicon.ico')}}" type="images/x-icon">
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
								<a class="active" id="register-form-link">As a Company</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <!-- company -->
								<form id="login-form" action="{{ route('register') }}" method="post" role="form" style="display: block;">
								<input type="hidden" name="user_type" value="company">
								@csrf
									<div class="form-group">
										<input type="text" name="name" id="username" tabindex="1" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Username" value="{{old('name')}}" autocomplete="name" autofocus>
										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="2" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" autocomplete="email" value="{{old('email')}}">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" autocomplete="new-password">
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" name="password_confirmation" id="password" tabindex="2" class="form-control" placeholder="Enter Password Confirmation" autocomplete="new-password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Sign Up">
											</div>
										</div>
									</div>
                                    <center>Already have a <strong>Career Doctor</strong> account?</center>
                                    <div class="text-center">
                                        <a href="{{route('login')}}" class="btn btn-custom">Sign In Now</a>
                                    </div>
								</form>
								<!-- company  -->
                                <form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Sign Up">
											</div>
										</div>
									</div>
                                    <center>Already have a <strong>Career Doctor</strong> account?</center>
                                    <div class="text-center">
                                        <a href="{{route('login')}}" class="btn btn-custom">Sign In Now</a>
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