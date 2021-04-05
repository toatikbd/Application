<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>TZ Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admin') }}/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('admin') }}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('admin') }}/plugins/animate-css/animate.css" rel="stylesheet" />
    @stack('css')
    <!-- Custom Css -->
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('admin') }}/css/themes/all-themes.css" rel="stylesheet" />


</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
@include('layouts.partial.topbar')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
@include('layouts.partial.leftsidebar')
<!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
@include('layouts.partial.rightsidebar')
<!-- #END# Right Sidebar -->
</section>

<section class="content">
    @yield('content')
</section>

<!-- Jquery Core Js -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.js"></script>
<!-- Select Plugin Js -->
<script src="{{ asset('admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{ asset('admin') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{ asset('admin') }}/plugins/node-waves/waves.js"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('admin') }}/plugins/jquery-countto/jquery.countTo.js"></script>
<!-- Custom Js -->
<script src="{{ asset('admin') }}/js/admin.js"></script>
<!-- Demo Js -->
<script src="{{ asset('admin') }}/js/demo.js"></script>


@stack('js')
</body>

</html>
