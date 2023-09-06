        <!-- BOOTSTRAP CSS -->
         <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
         <!-- STYLE CSS -->
         <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
         <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet"/>
         <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
         <!-- SIDE-MENU CSS -->
         <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet" id="sidemenu-theme">
         <!--C3 CHARTS CSS -->
         <link href="{{ asset('assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet"/>
         <!-- P-scroll bar css-->
         <link href="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />
         <!--- FONT-ICONS CSS -->
         <link href="{{ asset('assets/plugins/icons/icons.css') }}" rel="stylesheet"/>
         <!-- SIDEBAR CSS -->
         <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet"/>
         <!-- SINGLE-PAGE CSS -->
         <link href="{{ asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">
         <!-- COLOR SKIN CSS -->
         <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}"/>
         <!-- INTERNAL Switcher css -->
         <link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet"/>
         <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet"/>
        <style>
           .error {
                color: red;
           }
        </style>
        @stack('css')