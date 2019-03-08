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

    <title>{{$title}}</title>
    <meta name="description" content="{{$des}}" />
    <meta name="keywords" content="Fast Loans Online - $200 to $2,000 repaid over 12 months. Apply today">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/application_first.js') }}" defer></script>
    <link href="{{ asset('css/review.css') }}" rel="stylesheet">
    <script src="{{ asset('js/review.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
   <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">-->


    <meta name="google-site-verification" content="AfZA9mQSoaAliPB-t8fNTgcIZANeoWGYdncs7aEqIoo" />


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add.css') }}" rel="stylesheet">

    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109764218-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109764218-3');
</script>
</head>
<body>
<div id="app">


    <div style="position:fixed; z-index: 99; width: 150px; right: 40px; bottom: 40px" class="hide-mobile">
        <a href="{{url("/application/create")}}"><img src="https://storage.googleapis.com/mycashonline/public/static_apply.png" style="width: 60%;margin-left: 20%" ></a>
    </div>


    <div class="header_holder">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 pull-right">
                    <div class="phone_holder">
                        @guest
                            <a  href="{{ route('login') }}">{{ __('Member Login') }}</a>

                        @else

                            <a  href="{{ url('/personal-detail') }}">{{ __('Applications') }}

                                <a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        @endguest
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse ">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('main')}}" class="navbar-brand"><img class="" src="../storage/logo.jpg"></a>
            </div>
            <div class="navbar-collapse collapse navbar-right" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li style="font-weight: bolder"><a href="{{url('main')}}"><i class="fa fa-home"></i> Home</a></li>
                    <li style="font-weight: bolder"><a href="{{url('application/create')}}"><i class="fa fa-file-text-o"></i>Application form</a></li>

                    <li style="font-weight: bolder"><a href="{{url('faq')}}"><i class="fa fa-question-circle-o"></i> FAQ</a></li>
                    <li style="font-weight: bolder"><a href="{{url('contact')}}"><i class="fa fa-user"></i> Contact us</a></li>

                    <li style="font-weight: bolder"><a href="{{url('policy')}}"><i class="fa fa-calendar-o"></i> Policy &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>

                    <li class="dropdown hide" style=""><a href="{{url('application/create')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> More <b class="caret"></b></a><ul class="dropdown-menu dropdown-menu-right"></ul></li></ul>
            </div>
        </div>
    </div>



    @yield('content')






    <div class="footer_holder">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo_one">
                        <a href="{{url('main')}}"><img src="../storage/footer_logo.jpg" alt=""></a>
                    </div>
                    <div class="social">
                        <!--<a href="#"><img src="asset/images/icon_1.png"></a>-->
                        <a href="https://www.facebook.com/instantonlinecash/ " target="_blank"><img src="../storage/icon_1.png"></a>
                        <a href="https://twitter.com/MyCashOnline1 "><img src="../storage/icon_2.png"></a>
                        <a href="https://www.instagram.com/mycashonline7/?hl=en "><img src="../storage/icon_3.png"></a>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="footer_heading">
                        <h3>Links</h3>

                        <ul>
                            <li><a href="{{url('main')}}">Home</a></li>
                            <li><a href="{{url('application/create')}}" >Application form</a></li>
                            <li><a href="{{url('faq')}}">FAQ</a></li>
                            <li><a href="{{url('contact')}}">Contact us</a></li>
                            <li><a href="{{url('policy')}}">Form and policy</a></li>
                        </ul>

                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="footer_heading">
                        <h3>Policies</h3>

                        <ul>
                            <li><a href="{{url('policy')}}">Website</a></li>
                            <li><a href="{{url('resolution')}}">Resolutions</a></li>
                            <li><a href="{{url('credit_guide')}}">Credit Guide</a></li>
                            <li><a href="{{url('privacy')}}">Privacy</a></li>

                        </ul>

                    </div>

                </div>

                <div class="modal" id="warningModal" role="dialog" data-keyboard="false" data-backdrop="static" style="background-color: black; ">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                <h4 class="modal-title">WARNING - Do you really need a loan today? *</h4>
                            </div>
                            <div class="modal-body">

                                <p>It can be expensive to borrow small amounts of money and borrowing may not solve your money problems.<br>
                                    <br>


                                    ​

                                    Check your options before you borrow:
                                </p><ul>
                                    <li> For information about other options for managing bills and debts, ring
                                        <b>1800 007 007</b> from anywhere in Australia to talk to a free and independent financial counsellor</li>

                                    <li>Talk to your electricity, gas, phone or water provider to see if you can work out a payment plan</li>

                                    <li>If you are on government benefits, ask if you can receive an advance from Centrelink:<b><a href="http://www.humanservices.gov.au/advancepayments"> www.humanservices.gov.au/advancepayments</a></b></li>
                                </ul><br>




                                The Government's <b><a href="https://www.moneysmart.gov.au/">MoneySmart</a></b> website shows you how small amount loans work and suggests other options that may help you.<br>
                                <br>


                                ​

                                *This statement is an Australian Government requirement under the National Consumer Credit Protection Act 2009<p></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close warning</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="butto">
                        <a href="#" data-toggle="modal" data-target="#warningModal">Warning about Borrowing</a><br>

                    </div>
                    <div style="color: white">
                        <p> © 2017 Owned by Australian Synergy Finance Pty Ltd <br>
                            ABN 54 613 655 646. Australian Credit Licence 490422<br>
                            <br>
                            The information on this webpage is general information only and does not take into account your objectives, financial situation or needs.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>












    <div class="down_footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>Copyright © 2018 MyCashOnline. All Rights Reserved</p>
                </div>



            </div>
        </div>
    </div>

    <div class="bottom_bar" style="margin-left: 0;margin-right: 0">


    </div>
</div>

<nav class=" bottom_bar container-fluid border-top " style="position: fixed; bottom: 0;width: 100%;z-index: 99; background-color: white;     border-top: 1px solid #dee2e6!important;">

    <div class="one-third justify-content-center" style="font-size: 28px">


        <a href="tel:1300 998868" style="margin-top: 10px; padding-top: 0; padding-bottom: 0" class="btn-block btn">
                <i class=" fa fa-phone " style="color: #1a8a34; font-size: 28px"></i>
                <p style="color: #1a8a34; font-size: 12px">Inquiry</p>



        </a>

    </div>
    <div class="one-third" style="font-size: 28px">
        <a href="mailto:admin@mycashonline.com.au" style="margin-top: 10px;padding-top: 0; padding-bottom: 0" class="btn-block btn" >
            <i class="fa fa-envelope-o" style="color: red;font-size: 28px"></i>
            <p style="color: red; font-size: 12px">Email</p>
        </a>
    </div>

    <div class="one-third" style="font-size: 28px">
        <a href="{{url('application/create')}}" style="margin-top: 10px;padding-top: 0; padding-bottom: 0" class="btn-block btn">
                <i class="fa fa-hand-pointer-o" style="color: orange;font-size: 28px"> </i>
            <p style="color: orange; font-size: 12px">Apply</p>
            </a>
    </div>
</nav>


</body>
</html>
