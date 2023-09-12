
<!doctype html>
<html lang="en" dir="ltr">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Zanex – Laravel Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin, admin dashboard template, bootstrap 5, dashboard, laravel, laravel admin, laravel admin panel, laravel admin template, laravel blade, laravel dashboard, laravel dashboard template, laravel mvc, laravel php, laravel ui template, ui kit">

		<!-- TITLE -->
		<title>{{ env('APP_NAME') }}</title>

        <!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

		@include('layout2.css')
        <style>
        .error-msg {
            color:red
        }
        </style>
	</head>

	<body class="error-bg">
		<div class="login-img">
			<!-- GLOBAL-LOADER -->
			<div id="global-loader">
				<img src="assets/images/loader.svg" class="loader-img" alt="Loader">
			</div>
			<!-- End GLOBAL-LOADER -->
			<!-- PAGE -->
			<div class="page">
				<div class="">
					<!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<!-- <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img" alt=""> -->
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" method="POST" action="{{ route('handleLogin') }}">
									@csrf
									<span class="login100-form-title">
										Login
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Enter user name">
										<input class="input100" type="text" name="username" id="username" placeholder="Email">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Enter Password">
										<input class="input100" type="password" name="password" id="password" placeholder="Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="text-end pt-1">
										<p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
									</div>
									<div class="container-login100-form-btn">
										<button type="submit" class="login100-form-btn btn-primary">
											Login
										</button>
									</div>
									@if($errors->any())
										<div class="text-center pt-3">
										@foreach ($errors->all() as $err)
											<p class="text-danger">{{ $err }}</p>
										@endforeach
										</div>
									@endif
								</form>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->
			@include('layout2.js')
		</div>
	</body>
</html>