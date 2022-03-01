<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>CASAMAINTENANCE ERP</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="app_creator" name="Elmarzougui Abdelghafour" />
    <meta content="app_version" name="v 1.1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @yield('css')
    <!-- App Css-->
    <link href="{{ asset('css/app.css') }}?ver={{rand(1,250)}}" rel="stylesheet" type="text/css" />

    @livewireStyles

</head>

<body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <div id="layout-wrapper">

        @include('theme.layouts._parts.__header')

        @include('theme.layouts._parts._leftSidebar_commercial')

        <div class="main-content">

            <div class="page-content">

                <div id="overlayy"></div>

                @yield('content')

            </div>
      
            <!-- subscribeModal -->

            {{-- @include('theme.layouts._parts._subscribe') --}}

            <!-- end modal -->

            @include('theme.layouts._parts._footer')

        </div>

        <!-- end main content-->

    </div>


    {{-- @include('theme.layouts._parts._rightSidebar') --}}


    @include('theme.layouts._parts._overly')

    @livewireScripts

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')


</body>

</html>
