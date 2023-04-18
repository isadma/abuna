<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Giriş | {{ config('app.name', 'Abuna') }}</title>

    <link rel="icon" href="{{asset('images/favicon/logo-dark-150.png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/fonts/font-family/font.css')}}">


    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{asset('assets/css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/header-base.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/header-menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/brand.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/aside.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('assets/images/bg-login.jpg')}});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{asset('images/favicon/logo-dark-150.png')}}" style="height: 40px; width:auto;" alt="">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Abuna</h3>
                        </div>
                        <form class="kt-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ulanyjy adyňyz" required autocomplete="email" autofocus id="email" type="text" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" type="password" placeholder="Gizlin belgiňiz">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox">

                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Meni ýatda saklaý
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary" type="submit">Gir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/plugins.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

</body>
</html>
