<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>TZ Application</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('website') }}/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/vendor/countdowntime/flipclock.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('website') }}/css/main.css">
    <!--===============================================================================================-->
</head>
<body>


<div class="bg-img1 size1 overlay1 p-t-24" style="background-image: url('{{ asset('website') }}/images/bg01.jpg');">
    <div class="flex-w flex-sb-m p-l-80 p-r-74 respon5">
        <div class="wrappic1 m-r-30 m-t-10 m-b-10">
            <a href="#"><img src="{{ asset('website') }}/images/icons/logo.png" style="max-width: 100px" alt="LOGO"></a>
        </div>
        @if (Route::has('login'))
            <div class="flex-w m-t-10 m-b-10">
                @auth
{{--                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>--}}
                    <a href="{{ url('/home') }}" class="size3 flex-c-m how-social trans-04 m-r-6">
                        <i class="fa fa-dashboard"></i>
                    </a>
                @else
{{--                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>--}}
                    <a href="{{ route('login') }}" class="size3 flex-c-m how-social trans-04 m-r-6">
                        <i class="fa fa-sign-in"></i>
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="size3 flex-c-m how-social trans-04 m-r-6">
                            <i class="fa fa-lock"></i>
                        </a>
                    @endif
                @endauth
            </div>
        @endif

    </div>

    <div class="flex-w flex-sa p-r-200 respon1">
        <div class="p-b-60 respon3">
            <p class="l1-txt1 p-b-10 respon2">
                Our website is
            </p>

            <h3 class="l1-txt2 p-b-45 respon2 respon4">
                Coming Soon
            </h3>

            <div class="cd100"></div>

        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="{{ asset('website') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('website') }}/vendor/bootstrap/js/popper.js"></script>
<script src="{{ asset('website') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('website') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('website') }}/vendor/countdowntime/flipclock.min.js"></script>
<script src="{{ asset('website') }}/vendor/countdowntime/moment.min.js"></script>
<script src="{{ asset('website') }}/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="{{ asset('website') }}/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="{{ asset('website') }}/vendor/countdowntime/countdowntime.js"></script>
<script>
    $('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: 35,
        endtimeHours: 18,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });


</script>
<!--===============================================================================================-->
<script src="{{ asset('website') }}/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{ asset('website') }}/js/main.js"></script>

</body>
</html>


