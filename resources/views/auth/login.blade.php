@extends('layouts.login.app')

@section('content')
<form id="sign_in" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="msg">Sign in to start your session</div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">person</i>
        </span>
        <div class="form-line">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">lock</i>
        </span>
        <div class="form-line">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 p-t-5">
            <input class="filled-in chk-col-pink" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-block bg-pink waves-effect">
                {{ __('Login') }}
            </button>
        </div>
    </div>
    <div class="row m-t-15 m-b--20">
{{--        <div class="col-xs-6">--}}
{{--            <a href="sign-up.html">Register Now!</a>--}}
{{--        </div>--}}
{{--        <div class="col-xs-6 align-right">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot Your Password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>
</form>
@endsection
