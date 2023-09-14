
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name="Description" content="Zanex – Bootstrap5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin, dashboard, admin dashboard, admin template, crypto, crypto dashboard, sales dashboard, bootstrap 5 admin template, ecommerce template, ecommerce dashboard, responsive dashboard, admin panel, bootstrap 5 admin dashboard, cryptocurrency dashboard, bootstrap dashboard, multi dashboard, html, responsive, responsive admin, bootstrap admin template, dashboard template, bootstrap">

    <!-- TITLE -->
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/aman_mobile_zone_logo.ico') }}" />

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Vendor css -->
    <link href="{{ asset('assets/iconfonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/iconfonts/remixicon/plugin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/iconfonts/feather/feather.css') }}" rel="stylesheet">

    <!-- Owlcarousel CSS -->
    <link href="{{ asset('assets/plugins/owl-carousel2/owl.carousel.css') }}" rel="stylesheet">
    <!-- Tobli CSS -->
    <link href="{{ asset('assets/plugins/tobli/tobii.min.css') }}" rel="stylesheet">
    <!-- GALLERY CSS -->
    <link href="{{ asset('assets/plugins/simplelightbox/simplelightbox.css') }}" rel="stylesheet">

</head>

<body class="demo-screen index1">

    <div class="landing-top-header overflow-hidden" style="background: linear-gradient(to right, rgb(255 255 255 / 80%) 0%, rgb(236 19 19 / 86%) 100%);">
        <div class="top sticky overflow-hidden">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 justify-content-center">
                        <div class="logo-demo">
                            <a href="index.html"><img alt="" class="logo" src="{{ asset('assets/images/logo/') }}/{{ env('APP_LOGO') }}" style="width: 116px; height: 36px;"></a>
                            <a href="index.html"><img alt="" class="logo-2" src="{{ asset('assets/images/logo/') }}/{{ env('APP_LOGO') }}" style="width: 116px; height: 36px;"></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 d-none d-lg-flex justify-content-center">
                        <ul class="nav navbar-nav nav-pills justify-content-center">
                            <li class="nav-item"><a href="#home" class="active nav-link nav-scroll">Home</a></li>
                            <li class="nav-item"><a href="#main-themes" class="nav-link nav-scroll">Themes</a></li>
                            <li class="nav-item"><a href="#main-screens" class="nav-link nav-scroll">Screenshots</a></li>
                            <li class="nav-item"><a href="#main-video" class="nav-link nav-scroll">Video</a></li>
                            <li class="nav-item"><a href="#faqs" class="nav-link nav-scroll">Highlights</a></li>
                            <li class="nav-item"><a href="#benfits" class="nav-link nav-scroll">Services</a></li>
                            <li class="nav-item"><a href="#features" class="nav-link nav-scroll">Features</a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-12 d-none d-lg-flex justify-content-center">
                        <div class="header-nav-right">
                            <a href="https://rahukushwaha.info" target="_blank"
                                class="btn rounded-pill btn-success pt-2 pb-2"><i class="fe fe-user me-2"></i>Our Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="main-banner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 img-container-main">
                                <img src="{{ asset('demo/img/main.png') }}" class="mx-auto" alt="main-banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> --> 
    </div>

    <!--------------------------------------------------------------------------------->
    @yield('content')

    <div class="demo-screen-skin" id="importance">
        <div class="container text-center text-white">
            <div id="demo" class="row">
                <div class="col-lg-6">
                    <div class="feature-1">
                        <a href="mailto:support@spruko.com"></a>
                        <div class="mb-3">
                            <i class="si si-earphones-alt"></i>
                        </div>
                        <h4>Get Support</h4>
                        <p class="mb-1">Need Help? Don't worry. Please visit our support website. Our dedicated team will help you</p>
                        <h6 class="mb-0">Support : <span class="text-warning">support@spruko.com</span></h6>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-xl-0 mt-lg-0">
                    <div class="feature-1">
                        <a href="mailto:support@spruko.com"></a>
                        <div class="mb-3">
                            <i class="si si-bubbles"></i>
                        </div>
                        <h4>Pre-Sale Questions</h4>
                        <p class="mb-1">Please feel free to ask any questions before making the purchase.</p>
                        <h6 class="mb-0">Ask : <span class="text-warning">support@spruko.com</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="demo-screen-footer" style="background: linear-gradient(to right, rgb(255 255 255 / 80%) 0%, rgb(236 19 19 / 86%) 100%);">
        <div class="container">
            <h1><img alt="" class="logo" src="{{ asset('assets/images/logo/') }}/{{ env('APP_LOGO') }}" style="width: 130px; height: 40px;"></h1>
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center text-white">
                            Copyright © 2023 <a href="#">Aman Mobile Zone</a>. Designed with <br />
                            <span class="fa fa-heart text-danger"></span> by <a href="#"> Rahul Kushwaha </a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- container -->
    </div>
    <!--demo-screen-footer -->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><span class="fe fe-chevrons-up"></span></a>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper.js/js/popper.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- GALLERY JS -->
    <script src="{{ asset('assets/plugins/simplelightbox/simplelightbox.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplelightbox/light-box.js') }}"></script>

    <!--owlcarousel JS -->
    <script src="{{ asset('assets/plugins/owl-carousel2/owl.carousel.js') }}"></script>

    <!-- tobli js -->
    <script src="{{ asset('assets/plugins/tobli/tobii.min.js') }}"></script>

    <!-- counter -->
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>

    <!-- sticky JS -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- custom JS -->
    <script src="{{ asset('assets/demo/custom.js') }}"></script>


</body>

</html>