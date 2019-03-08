@extends('layouts.front')

@section('content')

    @include('layouts.feedback')
    <script>

    </script>



    <div class="banner_holder">
        <style>
            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
        </style>

        <script>


            $(document).ready(function () {




                $('#borrow_amount_slider').change(function () {
                    var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));

                    $(this).css('background-image',
                        '-webkit-gradient(linear, left top, right top, '
                        + 'color-stop(' + val + ', #074462), '
                        + 'color-stop(' + val + ', #e6e6e6)'
                        + ')'
                    );
                    $("#borrowed_amount").empty();
                    $("#borrowed_amount").append($(this).val().toString())

                });


                $('#borrow_time_slider').change(function () {
                    var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));

                    $(this).css('background-image',
                        '-webkit-gradient(linear, left top, right top, '
                        + 'color-stop(' + val + ', #074462), '
                        + 'color-stop(' + val + ', #e6e6e6)'
                        + ')'
                    );
                    $("#borrowed_time").empty();
                    $("#borrowed_time").append($(this).val().toString())

                });

            });

        </script>

        <div class="banner_holdercontact" style="position: relative; background-image: url('https://storage.googleapis.com/mycashonline/public/banner.jpg')">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-4">
                    <div class="conone  row" style="margin-top: 0px; width: 100%!important; margin-top: 100px; margin-bottom: 100px" >
                        <h1 class="title" style="padding: 6px 0">Loan Calculator</h1>

                        <div class="col-sm-12" style=" margin-top: 1vh">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="search_holder" >

                                        <p style="text-align: center;font-size: 1.5em">How much do you want to borrow?</p>
                                        <h2 style="text-align: center; margin-bottom: 20px;    font-family: 'Open Sans',sans-serif; font-size: 40px; font-weight: bolder">$ <span id="borrowed_amount">300</span></h2>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <p style="text-align: left">
                                                  $ 300
                                                </p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p style="text-align: right">
                                                    $ 2000
                                                </p>
                                            </div>
                                        </div>

                                        <div class="slidecontainer">
                                            <input type="range" min="300" max="2000" value="300" class="slider" id="borrow_amount_slider" step="100" style="height: 0;	background: #e6e6e6;!important;
">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12">
                                    <div class="search_holder" >
                                        <p style="text-align: center;font-size: 1.5em">How long do you want to borrow?</p>
                                        <h2 style="text-align: center; margin-bottom: 20px;font-family: 'Open Sans',sans-serif; font-size: 30px;font-weight: bolder"> <span id="borrowed_time">10</span> Weeks</h2>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <p style="text-align: left">
                                                     9 Weeks
                                                </p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p style="text-align: right">
                                                    52 Weeks
                                                </p>
                                            </div>
                                        </div>
                                        <div class="slidecontainer">
                                            <input type="range" min="9" max="52" value="9" class="slider" id="borrow_time_slider" step="4" style="height: 0;	background: #e6e6e6;!important;
">
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-sm-12" >
                                     <div class="search_holder" >
                                          <p style="text-align: center;font-size: 1.5em">Estimated Payment Amount</p>
                                      </div>
                                 </div>


                            </div>


                                <div class="col-xs-4" >
                                    <div  class="search_holder" >
                                        <p class="calculator-text" style="text-align: center; font-weight: bolder; ">
                                               $ <span id="repayment_weekly">
                                                    10
                                                </span><br>
                                            Weekly
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xs-4" >
                                    <div class="search_holder" >
                                        <p class="calculator-text" style="text-align: center;font-weight: bolder; ">
                                               $ <span id="repayment_fornightly">
                                                    20
                                                </span><br>
                                            Fornightly
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xs-4" >
                                    <div class="search_holder" >
                                        <p class="calculator-text" style="text-align: center;font-weight: bolder;">
                                              $  <span id="repayment_monthly">
                                                    40
                                                </span><br>
                                            Monthly
                                        </p>
                                    </div>
                                </div>


                                <div class="col-xs-12" style="margin-bottom: 20px">
                                    <div class="search_holder" >
                                        <a href="{{url("/application/create")}}"><img src="https://storage.googleapis.com/mycashonline/public/apply12.png" alt="" style="    width: 100%;"></a>
                                    </div>
                                </div>



                            <!--<div class="row" style="text-align: center; margin-bottom: 10px" >
                                <div class="col-xs-5">
                                    <img src="https://storage.googleapis.com/mycashonline/public/cal_1.png" style=" width: 25px">
                                </div>

                                <div class="col-xs-2">
                                    <img src="https://storage.googleapis.com/mycashonline/public/cal_2.png"  style=" width: 25px">

                                </div>

                                <div class="col-xs-5">
                                    <img src="https://storage.googleapis.com/mycashonline/public/cal_3.png"  style=" width: 25px">

                                </div>
                            </div>-->

                            <div class="row" style="text-align: center"><div class="col-xs-12"> <small class="disclaimer tertiary-color mx-lg-4" id="loan-disclaimer" style="display: block;margin-bottom: 20px">
                                        The maximum you will be charged is a flat 20% Establishment Fee and a flat 4% Monthly Fee. The maximum comparison rate on loans between $300 and $2000 is 199.43%. This comparison rate is based on a small amount credit contract of $1,000 repaid over 6 months. <br>
                                        <br> WARNING: This comparison rate is true only for the examples given and may not include all fees and charges. Different terms, fees or other loan amounts might result in a different comparison rate with the lender that finances your loan.</small>
                                </div>
                            </div>







                        </div>



                    </div>
                </div>
            </div>



                <div class="clearfix"></div>

            </div>
        </div>




	

        

    <div class="bg_2" style="padding-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg_cate" style="padding-bottom: 20px; margin-bottom: 0!important;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div >
                                    <h1 class="title">Why Choose us</h1>
                                    <div class="line" style="margin-bottom: 5px"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                               <div class="row">
                                   <div class="col-sm-4">
                                       <div class="box" >
                                           <div class="im">
                                               <img src="https://storage.googleapis.com/mycashonline/public/img_1.png" alt="" >
                                           </div>
                                           <div class="text_two" >
                                               <h3>{{ $content['content1'] }}</h3>
                                               <p>{{ $content['content2'] }}</p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-sm-4">
                                       <div class="box" >
                                           <div class="im">
                                               <img src="https://storage.googleapis.com/mycashonline/public/img_2.png" alt="" >
                                           </div>
                                           <div class="text_two" >
                                               <h3>{{ $content['content3'] }}</h3>
                                               <p>{{ $content['content4'] }}</p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-sm-4">
                                       <div class="box" >
                                           <div class="im">
                                               <img src="https://storage.googleapis.com/mycashonline/public/img_3.png" alt="" >
                                           </div>
                                           <div class="text_two" >
                                               <h3>{{ $content['content5'] }}</h3>
                                               <p>{{ $content['content6'] }}</p>
                                           </div>
                                       </div>
                                   </div>


                                   <div class="col-sm-4">
                                       <div class="box" >
                                           <div class="im">
                                               <img src="https://storage.googleapis.com/mycashonline/public/img_4.png" alt="" >
                                           </div>
                                           <div class="text_two" >
                                               <h3>{{ $content['content7'] }}</h3>
                                               <p>{{ $content['content8'] }}</p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-sm-4">
                                       <div class="box" >
                                           <div class="im">
                                               <img src="https://storage.googleapis.com/mycashonline/public/img_5.png" alt="" >
                                           </div>
                                           <div class="text_two" >
                                               <h3>{{ $content['content9'] }}</h3>
                                               <p>{{ $content['content10'] }}</p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-sm-4">
                                       <div class="box" >
                                           <div class="im">
                                               <img src="https://storage.googleapis.com/mycashonline/public/img_6.png" alt="" >
                                           </div>
                                           <div class="text_two" >
                                               <h3>{{ $content['content11'] }}</h3>
                                               <p>{{ $content['content12'] }}</p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>

            </div>
        </div>

    <div >
        <div class="container">
            <div class="row" style="background-image: url(https://storage.googleapis.com/mycashonline/public/bg_blue.png); background-repeat: no-repeat; background-size: cover; margin-left: 0; margin-right: 0">
                <div class="col-sm-12 text-center">
                    <div >
                        <h1 class="title">Loan Offer</h1>
                        <div class="line"></div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12" style="margin-top: 46px;">
                    <img src="https://storage.googleapis.com/mycashonline/public/2.png" alt="" style="margin:1px 0 0 0; width: 80%; margin-left: 10%; margin-right: 10%; margin-bottom: 30px">
                </div>

                <div class="col-sm-4 col-xs-12" style="margin-top: 46px;">
                    <img src="https://storage.googleapis.com/mycashonline/public/1.png" alt="" style="margin:1px 0 0 0; width: 80%; margin-left: 10%; margin-right: 10%; margin-bottom: 30px">
                </div>

                <div class="col-sm-4 col-xs-12" style="margin-top: 46px;">
                    <img src="https://storage.googleapis.com/mycashonline/public/3.png" alt="" style="margin:1px 0 0 0; width: 80%; margin-left: 10%; margin-right: 10%; margin-bottom: 30px">
                </div>


            </div>
        </div>
    </div>





    <div style="margin-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div>
                        <h1 class="title">How To Apply</h1>
                        <div class="line"></div>
                    </div>
                </div>

                <div class="col-sm-1">

                </div>
                <div class="col-sm-2 col-xs-12" style="margin-top: 40px">
                    <img src="https://storage.googleapis.com/mycashonline/public/p_1.png" class="process" >
                    <h4 class="text-center process-text" style="color: #004164">
                        APPLY
                        <span style="font-weight: bolder">
                            ONLINE
                        </span>
                    </h4>
                </div>
                <div class="col-sm-2 hide-mobile" style="margin-top: 40px">
                    <img src="https://storage.googleapis.com/mycashonline/public/p_4.png" style="width: 70%; margin-left: 15%">
                </div>
                <div class="col-sm-2 col-xs-12" style="margin-top: 40px">
                    <img src="https://storage.googleapis.com/mycashonline/public/p_2.png" class="process">
                    <h4 class="text-center process-text" style="color: #004164">
                        GET
                        <span style="font-weight: bolder">
                            A DECISION
                        </span>
                    </h4>

                </div>
                <div class="col-sm-2 hide-mobile" style="margin-top: 40px">
                    <img src="https://storage.googleapis.com/mycashonline/public/p_4.png" style="width: 70%; margin-left: 15%">
                </div>
                <div class="col-sm-2 col-xs-12" style="margin-top: 40px">
                    <img src="https://storage.googleapis.com/mycashonline/public/p_3.png"  class="process-3">
                    <h4 class="text-center process-text" style="color: #004164">
                        GET
                        <span style="font-weight: bolder">
                            PAID FAST
                        </span>
                    </h4>

                </div>

            </div>
        </div>
    </div>


    <div class="new_bgtwo" style="padding-top: 40px!important;">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="conone1" style="margin-left: 5%; width: 90%">
                        <div class="row" style="margin-top: 30px; margin-bottom: 50px">
                            <div class="col-sm-5" style="padding-top: 60px">
                                <img src="https://storage.googleapis.com/mycashonline/public/images_1.png" style="width: 80%; margin-left: 10%">
                            </div>
                            <div class="col-sm-6" style="margin-top: 50px; margin-bottom: 50px">


                                <div class="row">
                                    <div class="col-xs-12">
                                       <h5 class="who_can_text" style="font-weight:500 ">
                                           BENEFIT OF PARTERING
                                       </h5>
                                        <h3 class="who_can_text" style="font-size: 28px">
                                            WHO<span style="font-weight: bolder"> CAN APPLY </span>
                                        </h3>
                                    </div>

                                </div>

                                <div class="row" style="margin-top: 30px">
                                    <div class="col-xs-3" style="padding-right:0 ">
                                        <img src="https://storage.googleapis.com/mycashonline/public/images_3.png" style="width: 70%; margin-left: 15%" >

                                    </div>
                                    <div class="col-xs-9" style="padding-left: 0px">
                                        <h5 class="description" style="margin-bottom: 5px"><span style="font-weight: normal">YOU ARE</span> OVER 18 YEARS OID</h5>
                                        <p style="font-size: 12px">
                                            You might need to provide us photo ID either your passport, or Australian driver’s licence to apply for loan.
                                        </p>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 30px">
                                    <div class="col-xs-3" style="padding-right:0 ">
                                        <img src="https://storage.googleapis.com/mycashonline/public/images_2.png" style="width: 70%; margin-left: 15%" >

                                    </div>
                                    <div class="col-xs-9" style="padding-left: 0px">
                                        <h5 class="description" style="margin-bottom: 5px"><span style="font-weight: normal">YOU HAVE  </span> AUSTRALIAN BANK ACCOUNT </h5>
                                        <p style="font-size: 12px">
                                            You must have a valid Australian bank account and we’ll need to see your bank statements of last three months.
                                        </p>
                                    </div>
                                </div>


                                <div class="row" style="margin-top: 30px">
                                    <div class="col-xs-3" style="padding-right:0 ">
                                        <img src="https://storage.googleapis.com/mycashonline/public/images_4.png" style="width: 70%; margin-left: 15%" >

                                    </div>
                                    <div class="col-xs-9" style="padding-left: 0px">
                                        <h5 class="description" style="margin-bottom: 5px"><span style="font-weight: normal">YOU HAVE  </span> REGULAR INCOME </h5>
                                        <p style="font-size: 12px">
                                            You’ll need to show us your two most recent payslips or your personal tax return in case of self-employed person.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
           <div class="row  text-white" id="feedback_holder" style=" padding-bottom: 50px; margin-top: 30px">
                <div class="col-sm-12">
                    <div class="">
                        <h1 class="title"> Customers Reviews</h1>
                        <div class="line"></div>
                    </div>
                </div>

            <div class="container" style="padding-bottom: 50px">
                <div class="review-area">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="rbd-core-ui">
                                <div class="rbd-review-slider">
                                    <div class="rbd-review-container">
                                        <div class="rbd-review review1.1 rbd-curr">
                                            <h3 class="rbd-heading">Extremely Professional</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>
                                            <div class="rbd-content"><img class="rbd-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-1.png">Materials are top notch. People are top notch... they knew exactly how to handle my ignorance and turn it to a positive working business…</div>
                                            <div class="rbd-footing">

                                            </div>
                                            <div class="rbd-review-meta">Written by Mark P. on Oct. 21, 2018</div>
                                        </div>
                                        <div class="rbd-review review1.2 rbd-next">
                                            <h3 class="rbd-heading">Such Great Service!</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>
                                            <div class="rbd-content"><img class="rbd-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-3.png">I'm a big fan of this company. They really do the best work around, and their prices just can't be beat! I hear that owner is a pretty cool..</div>
                                            <div class="rbd-footing">

                                            </div>
                                            <div class="rbd-review-meta">Written by Alex D. on Aug. 19, 2018</div>
                                        </div>
                                        <div class="rbd-review review1.3">
                                            <h3 class="rbd-heading">Best one in the field</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>

                                            <div class="rbd-content"><img class="rbd-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-2.png">Assists in meeting your requirement with their knowledge and experience. Im100% recommend them</div>
                                            <div class="rbd-footing">

                                            </div>
                                            <div class="rbd-review-meta">Written by Lisa E. on Feb. 18, 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="rbb-core-ui">
                                <div  class="rbb-review-slider">
                                    <div class="rbb-review-container">
                                        <div class="rbb-review review1.1 rbb-curr">
                                            <h3 class="rbb-heading">Absolutely professional</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>
                                            <div class="rbb-content"><img class="rbb-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-4.png">They are committed and hardworking. Highly recommend.…</div>
                                            <div class="rbb-footing">

                                            </div>
                                            <div class="rbb-review-meta">Written by Peter P. on Jun. 1, 2018</div>
                                        </div>
                                        <div class="rbb-review review1.2 rbb-next">
                                            <h3 class="rbb-heading">Great Jobs!</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>
                                            <div class="rbb-content"><img class="rbb-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-5.png">They explained everything in detail. Helped me through every step of the process and made the whole procedure hassle free and quite easy. Extremely satisfied...</div>
                                            <div class="rbb-footing">
                                            </div>
                                            <div class="rbb-review-meta">Written by Jack W. on Fed. 12, 2018</div>
                                        </div>
                                        <div class="rbb-review review1.3">
                                            <h3 class="rbb-heading">Very Friendly</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>
                                            <div class="rbb-content"><img class="rbb-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-6.png">The staff is very responsive. They understand the customer’s circumstances and they assist with the suitable one. 5 stars to them!</div>
                                            <div class="rbb-footing"></div>
                                            <div class="rbb-review-meta">Written by Mia L. on Feb. 21, 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rdd-core-ui">
                                <div class="rdd-review-slider">
                                    <div class="rdd-review-container">
                                        <div class="rdd-review review1.1 rdd-curr">
                                            <h3 class="rdd-heading">Helpful</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>
                                                <i class="material-icons" style="color: orange">star</i>
                                                <i class="material-icons" style="color: orange">star</i>
                                                <i class="material-icons" style="color: orange">star</i>
                                                <i class="material-icons" style="color: orange">star</i>

                                            </div>
                                            <div class="rdd-content"><img class="rdd-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-7.png">The whole team is amazing. They have knowledge about loans and direct you as per your needs. Professional and polite. We recommend them to my friends and family.…</div>
                                            <div class="rdd-footing">

                                            </div>
                                            <div class="rdd-review-meta">Written by Leo P. on Dec. 12, 2018</div>
                                        </div>
                                        <div class="rdd-review review1.2 rdd-next">
                                            <h3 class="rdd-heading">I really like the work</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>
                                            <div class="rdd-content"><img class="rdd-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-8.png">I like this firm. They really do the best work around, and their prices just can't be beat! I hear that owner is a pretty cool..</div>
                                            <div class="rdd-footing">

                                            </div>
                                            <div class="rdd-review-meta">Written by Ashley J. on Mar. 29, 2018</div>
                                        </div>
                                        <div class="rdd-review review1.3">
                                            <h3 class="rdd-heading">One of the best!</h3>
                                            <div class="stars">
                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                                <i class="material-icons" style="color: orange">star</i>                                            </div>

                                            <div class="rdd-content"><img class="rdd-gravatar" src="http://asm.mycashonline.com.au/images/testimonial/testimonial-author-9.png">I highly recommend them. They understand the customer’s circumstances and are really patient</div>
                                            <div class="rdd-footing">

                                            </div>
                                            <div class="rdd-review-meta">Written by Allen X. on Jan. 9, 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--<div class="" style="width: 100%;float: left; margin-top: 40px">
                    <div class="feedback" style="margin-bottom: 20px">
                        <div class="w-100 text-center" style="background-color: #ff8400; font-weight: bolder;color: white; padding-left: 10px; font-size: 18px; padding-top: 5px; padding-bottom: 5px">
                            Cash loan $2000
                        </div>
                        <div  class="w-100">
                            <img src="https://storage.googleapis.com/mycashonline/public/test0.jpg"; style="width: 100%">
                        </div>
                        <div class="w-100" style="padding:0 15px;">
                            <h3 style="color: black; font-weight: bolder">
                                Jessica
                            </h3>
                            Service has been great tho I had a hiccup with paying one my loans off early but still had payment come out but was impressed with prompt response in resolving the issue.
                            Maybe have a customer log in page so details can be updated, payments etc.. So customers can have access to                        </div>
                        <div class="text-center" style="margin-top: 10px">
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                        </div>
                    </div>

                    <div class="feedback" style="margin-bottom: 20px">
                        <div class="w-100 text-center" style="background-color: #ff8400; font-weight: bolder;color: white; padding-left: 10px; font-size: 18px; padding-top: 5px; padding-bottom: 5px">
                              Holiday Loan $1800
                        </div>
                        <div  class="w-100">
                            <img src="https://storage.googleapis.com/mycashonline/public/test1.jpg"; style="width: 100%">
                        </div>
                        <div class="w-100" style="padding:0 15px;">
                            <h3 style="color: black; font-weight: bolder">
                                Sherrie 35 Years Old
                            </h3>
                            I planned a trip to overseas with family in the last holiday summer vacations. But suddenly I fall short of money. Thanks to My cash online company and whole team.  Because of their quick services we were able to fly to London on the exact we had planned already. Highly recommended!                        </div>
                        <div class="text-center" style="margin-top: 10px">
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                        </div>
                    </div>

                    <div class="feedback" style="margin-bottom: 20px">
                        <div class="w-100 text-center" style="background-color: #ff8400; font-weight: bolder;color: white; padding-left: 10px; font-size: 18px; padding-top: 5px; padding-bottom: 5px">
                            Loan For Training Fee $1000
                        </div>
                        <div  class="w-100" >
                            <img src="https://storage.googleapis.com/mycashonline/public/test2.png"; style="width: 100%">
                        </div>
                        <div class="w-100" style="padding:0 15px; ">
                            <h3 style="color: black; font-weight: bolder">
                                William 21 Years Old
                            </h3>
                            Highly recommended company. I m an IT student have just started my study. My college asked me to bring a laptop during classes, but I was unable to do so. Because I had just paid my fees and was out of money.  My cash online  got my loan approved within short time and then I managed to buy a new Laptop for me.                        </div>
                        <div class="text-center" style="margin-top: 10px">
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                            <i class="material-icons" style="color: orange">star</i>
                        </div>
                    </div>
                </div>-->
            </div>

            </div>

        <div class="container" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <h1 class="title">We Are Here for You</h1>
                        <div class="line" style="margin-bottom: 5px"></div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-6">
                    <div class="im2">
                        <img src="https://storage.googleapis.com/mycashonline/public/img_9.png">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="text_holder">
                        <!--<div class="logo_icon"><img src="https://storage.googleapis.com/mycashonline/public/logo_1.png"></div>-->
                        <div class="logo_icontext">
                            <p>When you need a fast or cash loan for unexpected costs, Due bills or even to plan a holiday, Think My cash online.</p>
                            <p>
                                We offer flexible loans to all Australians who meet our standard and our primary aim is to fulfil your exigency. We provide short term loans ranging from 200-2000 over the period up to 12 months. Our processing turnaround time is short and is all online. Wherever you are, you can easily apply even from your mobile phone.
                            </p>
                            <p>
                                Our existing customers consider us as responsible and secure financier as our core objective is to provide best customer service. We provide both secured and unsecured personal loans and explain all the costs related to them beforehand to eliminate any fuss for our applicants.
                            </p>
                            <p>
                                To reduce your stress, our personal loan calculator on the top of the page can assist you to see the estimated repayment costs.
                            </p>
                            <p>
                                So, if you need or are looking to borrow funds instantly, you are at right place. Just to make sure we give you reminders for your due payment and all the other information related to your loan. You do not need to worry a bit as we keep your record updated and communicate it regularly.
                            </p>
                            <p>
                                Experience the difference today. Apply Now!
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>


        </div>
























</div>@endsection
