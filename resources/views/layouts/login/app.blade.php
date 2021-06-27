<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TZ') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admin') }}/favicon-ico/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('admin') }}/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('admin') }}/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box" id="app">
    <div class="logo">
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Application') }}
            Admin<b> Application</b>
        </a>
{{--        <small>Admin BootStrap Based - Material Design</small>--}}
    </div>
    <div class="card">
        <div class="body">
            @yield('content')
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{ asset('admin') }}/plugins/node-waves/waves.js"></script>
<!-- Validation Plugin Js -->
<script src="{{ asset('admin') }}/plugins/jquery-validation/jquery.validate.js"></script>
<!-- Custom Js -->
<script src="{{ asset('admin') }}/js/admin.js"></script>
<script src="{{ asset('admin') }}/js/pages/examples/sign-in.js"></script>
</body>
</html>


