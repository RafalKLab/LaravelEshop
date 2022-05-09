<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Device E-Shop: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/bootstrap.min.js"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/starter-template.css')}}" rel="stylesheet">
    <script src="{{asset('js/jQuery.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">@lang('main.home')</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('home') }}">@lang('main.all_products')</a></li>
                <li class="active"><a href="{{ route('categories') }}">@lang('main.categories')</a></li>
                <li><a href="{{route('locale', __('main.set_lang'))}}">@lang('main.set_lang')</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('basket')}}">@lang('main.basket')</a></li>
                @guest
                    <li><a href="{{route('login')}}">@lang('main.log_in')</a></li>
                    <li><a href="{{route('register')}}">@lang('main.register')</a></li>
                @endguest
                @auth
                    <li><a href="{{route('adminHome')}}">Admin panel</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
        @yield('content')
    </div>
</div>
</body>
</html>
