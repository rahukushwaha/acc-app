@extends('frontLayout.layout')
@section('content')
<div class="main-theme-screens" id="main-screens">
    <!-- <div class="demo-screen-skin" id="ltr-screenshorts"> -->
        <div class="container text-center">
            <div id="demo" class="row">
                <div class="col-lg-12">
                    <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 mt-5 gallery">
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/1.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/1.jpg') }}"
                                        alt="banner image" title="Verticalmenu Light theme">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">Verticalmenu
                                        Light theme</h5>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/2.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/2.jpg') }}"
                                        alt="banner image" title="Verticalmenu Dark theme">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">Verticalmenu
                                        Dark theme</h5>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/8.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/8.jpg') }}"
                                        alt="banner image" title="Vertical Light Color menu">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">
                                        Vertical Light Color menu</h5>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/9.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/9.jpg') }}"
                                        alt="banner image" title="Vertical Light Dark menu">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">
                                        Vertical Light Dark menu</h5>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/10.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/10.jpg') }}"
                                        alt="banner image" title="Vertical Light Gradient menu">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">
                                        Vertical Light Gradient menu</h5>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/11.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/11.jpg') }}"
                                        alt="banner image" title="Vertical Light Color Header">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">
                                        Vertical Light Color Header</h5>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mb-2">
                                <a href="{{ asset('demo/img/ltr-screens/12.jpg') }}" class="big">
                                    <img class="img-fluid rounded" src="{{ asset('demo/img/ltr-screens/12.jpg') }}"
                                        alt="banner image" title="Vertical Light Dark Header">
                                    <h5 class="text-dark text-center border p-3 border-top-0 bg-white">
                                        Vertical Light Dark Header</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
    @endsection