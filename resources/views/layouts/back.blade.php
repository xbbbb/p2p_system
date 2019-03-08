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


    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/system.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta >
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                My Cash Online
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
                                {{ Auth::user()->name }} <span class="caret"></span>
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
        <div class="container-fluid mt-2 mb-5" style=" margin-top: 50px">

            <div class="card">

                <div class=" row">
                    <div class="  pt-4 card pb-5" style="background-color: #002a3a; flex: 5%">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link  text-center" href="/system/dashboard"><i class='fas fa-desktop' style='font-size:36px'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" href="/system/customer"><i class='fas fa-male' style='font-size:36px'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" href="/system/application_list"><i class='fab fa-wpforms' style='font-size:36px'></i></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-center" href="/blacklist"><i class='fas fa-list-alt	' style='font-size:36px'></i></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-center" href="#"><i class='fas fa-paperclip' style='font-size:36px'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" href="#"><i class='fas fa-tools		' style='font-size:36px'></i></a>
                            </li>

                        </ul>
                    </div>
                    <div class="" style="background-color: #F5F5F5; flex: 95% ">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </main>




































</div>




</body>
</html>
