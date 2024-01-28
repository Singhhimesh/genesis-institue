<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICON -->
    @if (core()->getSetting('favicon'))
        <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url(core()->getSetting('favicon')) }}" />
    @endif

    <!-- TITLE -->
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('admin/assets/colors/color1.css') }}" />
        @stack('css')
</head>

<body class="app sidebar-mini ltr">
    @include('admin.partials.loader')

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('admin.partials.header')

            @include('admin.partials.sidebar')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    @include('admin.partials.errors')

                    @yield('content')
                </div>
            </div>
            <!--app-content closed-->
        </div>

        @include('admin.partials.sidebar-right')

        @include('admin.partials.modal')

        @include('admin.partials.footer')
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('admin/assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('admin/assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('admin/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
@stack('js')
</body>

</html>
