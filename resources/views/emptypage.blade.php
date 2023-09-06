@extends('layout2.layout')
@push('css')
@endpush
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                    
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Empty</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Empty</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            @for ($i=1; $i<=20; $i++)
                                <h5>Hello,welcome to spruko. {{ $i }}</h5>
                                <br />    
                            @endfor
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('js')
@endpush