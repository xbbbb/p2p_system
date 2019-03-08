
@extends('layouts.front')

@section('content')

    @include('layouts.feedback')



    <div class="new_bgtwo">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="conone1" style="margin: 0 0 50px;">
                        <div class="col-sm-8">
                            <div class="contact">
                                <h2>Get In Touch</h2>

                                <form action="{{action('VisitorController@send_info')}}" method="post" accept-charset="utf-8">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="search">
                                                <p>Full Name</p>
                                                <input type="text" id="name" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="search">
                                                <p>Email Address</p>
                                                <input type="text" id="email" name="email"  required="">
                                                <span id="err_email" style="color: maroon"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="search">
                                                <p>Subject</p>
                                                <input type="text" id="subject" name="subject" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="search">
                                                <p>Message</p>
                                                <textarea id="message" name="message" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="search">
                                                <input type="submit" name="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-4" style="padding:0;">
                            <div class="contact_im">
                                <img src="./Contact_files/contact_img.png" alt="">
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

    <div class="upfooter">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="email">
                        <img src="../storage/phone.png" alt="">
                        <h6 style="font-size: 15px">1300 998 868</h6>
                        <div class="clearfix"></div>
                    </div>
                    <div class="email">
                        <img src="../storage/email.png" alt="">
                        <h6 style="font-size: 15px">administration@mypaydayloans.com.au</h6>
                        <div class="clearfix"></div>
                    </div>
                    <div class="home">
                        <img src="../storage/home.png" alt="">
                        <h6 style="font-size: 15px">PO Box 163 Forest Hill VIC 3131</h6>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




















@endsection
