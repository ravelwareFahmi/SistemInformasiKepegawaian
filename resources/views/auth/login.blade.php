<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href=" {{ asset ('/template/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href=" {{ asset ('/template/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href=" {{ asset ('/template/assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href=" {{ asset ('/template/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href=" {{ asset ('/template/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href=" {{ asset ('/template/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href=" {{ asset ('/template/assets/img/favicon.png') }}">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="/template/assets/img/ravelware.png" width="50" alt="Klorofil Logo"></div>
                                <p class="lead">Login to your account</p>
                                @if (session('successMsg'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-times-circle"></i> {{ session('successMsg') }}
                                </div>
                                @endif
							</div>
                            <form class="form-auth-small" action="{{ route('login') }}" method="POST">
                                @csrf
								<div class="form-group @error('email') has-error @enderror ">
                                    <label for="email" class="control-label sr-only">{{ __('E-Mail Address') }}</label>
                                    <input type="email" class="form-control" id="signin-email" name ="email" value="{{ old('email') }}" required autocomplate="off" placeholder="Email" autofocus>
                                    @error('email')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

								</div>
								<div class="form-group">
                                    <label for="password" class="control-label sr-only">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                    name="password" required autocomplete="current-password"
                                    placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left" for="remember">
										<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<span>{{ __('Remember Me') }}</span>
									</label>
								</div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
								<div class="bottom">

                                @if (Route::has('password.request'))
                                    <span class="helper-text"><i class="fa fa-lock"></i><a href="{{ route('password.request') }}">{{ __(' Forgot Your Password?') }}</a> |
                                    <a href="{{ route('register') }}">Register New Account</a>
                                    </span>
                                @endif
                                </div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Sistem Informasi Kepegawaian</h1>
							<p>by Training</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

