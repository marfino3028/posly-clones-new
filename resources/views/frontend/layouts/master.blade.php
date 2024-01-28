<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikit">
    <meta name="keywords" content="multikit">
    <title>Posly</title>
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="multikit">
    <meta name="msapplication-TileImage" content="{{ asset('assets/asset_frontend/images/favicon/1.svg') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('asset_frontend/images/favicon/2.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/asset_frontend/images/favicon/2.svg') }}" type="image/x-icon">

    <!-- Google font css link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">

    <!-- Bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css"
        href="{{ asset('assets/asset_frontend/css/vendors/bootstrap.css') }}">

    <!-- Loader Normalize css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/asset_frontend/css/normalize.min.css') }}">

    <!-- Swiper css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/asset_frontend/css/vendors/swiper/swiper-bundle.min.css') }}">

    <!-- Remix Icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/asset_frontend/css/remixicon.css') }}">

    <!-- Style css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="{{ asset('assets/asset_frontend/css/style.css') }}">
    @stack('css')



</head>

<body class="ecommerce-color">
    <div id="app">

        @include('frontend.layouts.loader')

        {{-- @include('frontend.layouts.header-nav') --}}
        <header-nav-vue></header-nav-vue>


        @yield('content')
        {{-- <router-view></router-view>
        <router-link to="/foo">Go to Foo</router-link> --}}

        @include('frontend.layouts.footer-section')

        @include('frontend.layouts.sidebar')
    </div>


    <!-- Bootstrap js-->
    <script src="{{ asset('assets/asset_frontend/js/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Loader js -->
    <script src="{{ asset('assets/asset_frontend/js/loader.js') }}"></script>

    <!-- swiper js -->
    <script src="{{ asset('assets/asset_frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/asset_frontend/js/custom_swiper.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ asset('assets/asset_frontend/js/script.js') }}"></script>

    @stack('js')

    <!-- Include Vue.js and your app.js -->
    <script src="{{ mix('js/app.js') }}"></script>


</body>


</html>
