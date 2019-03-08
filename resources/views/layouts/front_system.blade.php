<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Cash Loans up to $2,000 Approved Online | Mycashonline| Australia</title>
    <meta name="description" content="Do you need a same day loan? My Cash online providing online cash loans from $200-$2000, Our online loan application form takes 4 minutes to complete, and our fast approval loans are processed within 60 minutes." />
    <meta name="keywords" content="Fast Loans Online - $200 to $2,000 repaid over 12 months. Apply today">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/application_first.js') }}" defer></script>

    <script src="{{ asset('js/jquery.datetimepicker.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <!-- Styles -->
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/system.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta >
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-image: url({{url("/storage/bg_top.png")}});background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="color: white;font-weight: bolder">
                My Cash <span style="color:#b3913c;">Online</span> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else



                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span style="color: white">{{ Auth::user()->name }} </span> <span class="caret" style="color: white"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main >
        <div class="container-fluid mt-0 mb-5" style=" argin-top: 50px">

            <div class="card">

                <div class=" row">
                    <div class=" col-md-2 pt-4 card pb-5" style="background-image: url({{url("/storage/bg_left.png")}});background-repeat: no-repeat;background-size: cover;">
                        <div class="row">
                            <div class="offset-4 col-4">

                            </div>
                        </div>
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/personal-detail"><i class='far fa-edit'></i>&nbsp; Application</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/documents"><i class='far fa-address-card'></i>&nbsp; Document</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10" style="background-image: url({{url("/storage/bg-system.png")}});background-repeat: no-repeat;background-size: cover;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </main>




































</div>




</body>
</html>
