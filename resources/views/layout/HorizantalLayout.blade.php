
<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Noa - Laravel Bootstrap 5 Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="laravel admin template, bootstrap admin template, admin dashboard template, admin dashboard, admin template, admin, bootstrap 5, laravel admin, laravel admin dashboard template, laravel ui template, laravel admin panel, admin panel, laravel admin dashboard, laravel template, admin ui dashboard">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

        <!-- TITLE -->
        <title>Noa - Laravel Bootstrap 5 Admin & Dashboard Template</title>

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('assets/plugins/icons/icons.css') }}" rel="stylesheet"/>

        <!-- INTERNAL Switcher css -->
		<link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet" />

	</head>

	<body class="ltr app horizontal landing-page">

        <!-- Switcher -->
        <div class="switcher-wrapper">
			<div class="demo_changer">
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
							<div class="swichermainleft text-center">
								<div class="p-3 d-grid gap-2">
									<a href="https://laravel8.spruko.com/noa" class="btn ripple btn-primary mt-0" target="_blank">View Demo</a>
									<a href="https://themeforest.net/item/noa-laravel-admin-template/38978033"  class="btn ripple btn-secondary" target="_blank">Buy Now</a>
									<a href="https://themeforest.net/user/spruko/portfolio" class="btn ripple btn-pink" target="_blank">Our
										Portfolio</a>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>LTR and RTL VERSIONS</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">LTR Version</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch23" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">RTL Version</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch24" class="onoffswitch2-checkbox">
												<label for="myonoffswitch24" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Light Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Light Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch1" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
									<div class="switch_section">
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Dark Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch2" class="onoffswitch2-checkbox">
												<label for="myonoffswitch2" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Reset All Styles</h4>
								<div class="skin-body">
									<div class="switch_section my-4">
										<button class="btn btn-danger btn-block" onclick="localStorage.clear();
											document.querySelector('html').style = '';
											resetData() ;" type="button">Reset All
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Switcher -->

		<a href="javascript:void(0);" class="buy-now">Buy Now</a>

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

                <!-- app-Header -->
				<div class="hor-header header">
					<div class="container main-container">
						<div class="d-flex">
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
							<!-- sidebar-toggle-->
							<a class="logo-horizontal " href="index.html">
								<img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
								<img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
							</a>
							<!-- LOGO -->

							<div class="d-flex order-lg-2 ms-auto header-right-icons">
								<button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
									data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false"
									aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical"></span>
								</button>
								<div class="navbar navbar-collapse responsive-navbar p-0">
									<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
										<div class="d-flex order-lg-2 m-4 m-lg-0 m-md-1">
											<a href="#" target="_blank" class="btn btn-pill btn-outline-primary btn-w-md py-2 me-1">
												Sign up
											</a>
											<a href="#" target="_blank" class="btn btn-pill btn-primary btn-w-md py-2">
												Get Started
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /app-Header -->

				<!--APP-SIDEBAR-->
				<div class="landing-top-header overflow-hidden">
					<div class="top sticky overflow-hidden">

                        <!--APP-SIDEBAR-->
						<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
						<div class="app-sidebar bg-transparent horizontal-main">
							<div class="container">
								<div class="main-sidemenu navbar px-0">
									<a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
										<img alt="" class="logo-2" src="{{ asset('assets/images/brand/logo-3.png') }}">
										<img alt="" class="dark-landinglogo" src="{{ asset('assets/images/brand/logo.png') }}">
									</a>
									<ul class="side-menu">
										<li class="slide">
											<a class="side-menu__item active" data-bs-toggle="slide" href="#home"><span class="side-menu__label">Home</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="#About"><span class="side-menu__label">About</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="#Clients"><span class="side-menu__label">Clients</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span class="side-menu__label">Features</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="#Faq"><span class="side-menu__label">Faq's</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="#Team"><span class="side-menu__label">Team</span></a>
										</li>
										<li class="slide">
											<a class="side-menu__item" data-bs-toggle="slide" href="#Contact"><span class="side-menu__label">Contact</span></a>
										</li>
									</ul>
									<div class="header-nav-right d-flex">
										<a href="#" target="_blank" class="btn btn-pill btn-primary btn-w-md py-2 me-1 my-auto  d-lg-none d-xl-block d-block">
											Freelancer Login
										</a>
										<a href="#" target="_blank" class="btn btn-pill btn-primary btn-w-md py-2 me-1 my-auto  d-lg-none d-xl-block d-block">
											Client Login
										</a>
                                        <a href="{{ route('userLogin') }}" class="btn btn-pill btn-outline-primary btn-w-md py-2 my-auto d-lg-none d-xl-block d-block">
											Login
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--/APP-SIDEBAR-->

					</div>
                </div>

                @yield('content')
            </div>
            <!-- </Footer> -->
            <div class="demo-footer">
                <div class="container">
                    <div class="card mb-0 px-0">
                        <div class="card-body px-0">
                            <div class="top-footer">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-12">
                                        <h6 class="text-uppercase mb-3 font-weight-semibold">About</h6>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                            architecto beatae vitae dicta sunt
                                            explicabo.
                                        </p>
                                        <p class="mb-5 mb-lg-2">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat .</p>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-md-4">
                                        <h6 class="text-uppercase mb-2 font-weight-semibold">Pages</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="index.html">Dashboard</a></li>
                                            <li><a href="alerts.html">Elements</a></li>
                                            <li><a href="form-elements.html">Forms</a></li>
                                            <li><a href="chat.html">Chat</a></li>
                                            <li><a href="datatable.html">Tables</a></li>
                                            <li><a href="file-attachments.html">Other Pages</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-md-4">
                                        <h6 class="text-uppercase mb-2 font-weight-semibold">Information</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="about.html">Our Team</a></li>
                                            <li><a href="about.html">Contact US</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="terms.html">Terms and Services</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-md-4">
                                        <h6 class="text-uppercase mb-2 font-weight-semibold">Contact</h6>
                                        <p><i class="fa fa-home me-3 mb-2"></i> New York, NY 10012, US</p>
                                        <p><i class="fa fa-envelope me-3 mb-2"></i> info@gmail.com</p>
                                        <p><i class="fa fa-phone me-3 mb-2"></i> + 01 234 567 88</p>
                                        <p><i class="fa fa-print me-3 mb-2"></i> + 01 234 567 89</p>
                                        <hr>
                                        <h6 class="text-uppercase mb-0 font-weight-semibold">Payments</h6>
                                        <ul class="footer-payments">
                                            <li><a href="javascript:void(0);"><i class="fa fa-cc-amex text-muted"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fa fa-cc-visa text-muted"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fa fa-credit-card-alt text-muted"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fa fa-cc-mastercard text-muted"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="fa fa-cc-paypal text-muted"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <footer class="main-footer px-0 pb-0">
                                <div class="row ">
                                    <div class="col-xl-8 col-lg-12 col-md-12 footer1">Copyright © 2022 <a
                                            href="javascript:void(0)">Noa</a>. Designed with <span
                                            class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 col-md-12 ms-auto text-end">
                                        <ul class="footer-social-list ">
                                            <li><a href="https://www.facebook.com/" target="_blank"><i
                                                        class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://www.google.com/" target="_blank"><i class="fa fa-google"></i></a>
                                            </li>
                                            <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="https://www.linkedin.com/" target="_blank"><i
                                                        class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
							<!-- Footer close -->

		</div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Owl carousel JS -->
        <script src="{{ asset('assets/plugins/company-slider/slider.js') }}"></script>
        <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

        <!-- landing JS -->
        <script src="{{ asset('assets/js/landing.js') }}"></script>

	</body>
</html>