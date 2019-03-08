@extends('layouts.front')

@section('content')
    @include('layouts.feedback')
    <div class="container">
        <script>
            $(function(){
                $( "#application" ).submit(function( event ) {

                    if(  parseInt($( "#pension" ).val())+ parseInt($( "#monthly_after_tax").val())
                        < parseInt($("#mortgage_rent").val())+ parseInt($( "#travel_expense" ).val())+parseInt( $( "#insurance" ).val())+
                        parseInt($( "#home_utility_exp" ).val())+parseInt($( "#food_entertainment" ).val())+parseInt($( "#personal_exp").val()) +parseInt($("#loan_payment").val())){
                        return confirm( "Your income is less than expense, do you want to continue?");

                       // event.preventDefault();
                    }

                });
                $("#loan_num").change(function(){
                    for( i=0;i<10;i++){
                        $("#com"+i).css("display","none");
                    }
                    for( i=0;i<$("#loan_num").val();i++){
                        $("#com"+i).css("display","block");
                    }

                });
            })




        </script>
        <form action="{{ action('ApplicationController@store') }}"   method="post" enctype="multipart/form-data" id="application">
            @csrf
            <div class="row" style="margin-bottom: 5vh">
                <div class="col-sm-12">
                    <div class="progress-outer">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active1" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                        </div>
                    </div>

                    <div class="conone1" style="">
                        <h1>Loan Particulars</h1>
                        <div class="down_arrow"><img src="../storage/down_arrow.png"></div>
                        <div class="col-sm-12 panel_headline">Loan Info</div>



                                <div class="col-sm-12" style=" margin-top: 5vh">
                                    <div class="search_holder2">
                                        <p>Purpose of Loan</p>
                                        <select id="loan_purpose" name="loan_purpose" required>
                                            <option value="">--Select--</option>
                                            <option value="Bills - Non Utility">Bills - Non Utility</option>
                                            <option value="Dental/Medical Expenses">Dental/Medical Expenses</option>
                                            <option value="Education Expenses">Education Expenses</option>
                                            <option value="Emergency Expense">Emergency Expense</option>
                                            <option value="Entertainment/Leisure">Other</option>
                                            <option value="Family Assistance">Family Assistance</option>
                                            <option value="Household/White Goods">Household/White Goods</option>
                                            <option value="Loan/Debt Consolidation">Loan/Debt Consolidation</option>
                                            <option value="Professional/Business Expenses">Professional/Business Expenses</option>
                                            <option value="Rent/Bond/Moving Costs">Rent/Bond/Moving Costs</option>
                                            <option value="Repairs/Renovations">Repairs/Renovations</option>
                                            <option value="Special Occasion">Special Occasion</option>
                                            <option value="Travel Expenses">Travel Expenses</option>
                                            <option value="Vehicle Expenses">Vehicle Expenses</option>
                                            <option value="Vehicle Purchase">Vehicle Purchase</option>
                                            <option value="Vet Expenses">Vet Expenses</option>
                                            <option value="Work Expenses">Work Expenses</option>
                                        </select>

                                        <div class="clearfix"></div>
                                        <p>More Detail for Loan</p>
                                        <textarea id="explanation" name="explanation" maxlength="500" class="form-control" required></textarea><br>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>


                                <div class="row" >

                                    <div  class="col-sm-12">
                                        <div class="col-sm-12 panel_headline">Income</div>
                                    </div>




                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Monthly income after tax(AUD)-Dollars</p>
                                            <input type="number" id="monthly_after_tax" name="monthly_after_tax" placeholder=""  autocomplete="off" required>
                                            <span id="monthly_after_tax_err" style="color: maroon"></span>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Benifit centrelink/Pension</p>
                                            <input type="number" id="pension" name="pension" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div  class="col-sm-12">
                                        <div class="col-sm-12 panel_headline">Expense</div>
                                    </div>



                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Mortgage/ Rent (Including borading cost, etc)</p>
                                            <input type="number" id="mortgage_rent" name="mortgage_rent" required>
                                            <div class="clearfix"></div>

                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Food&amp; Entertainment（food,entertainment and gambling）</p>
                                            <input type="number" id="food_entertainment" name="food_entertainment" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Home &amp; Utility Expenses ( Gas, Water, Electric, TV &amp; internet…)</p>
                                            <input type="number" id="home_utility_exp" name="home_utility_exp" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>personal expenses (Gymmembership, school fee, child care, medical …)</p>
                                            <input type="number" id="personal_exp" name="personal_exp" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Loan repayment  ( Small, Medium And other loan)</p>
                                            <input type="number" id="loan_payment" name="loan_payment" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Travel expenses ( Bus, Train,petrol vehicle running cost…)</p>
                                            <input type="number" id="travel_expense" name="travel_expense" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Insurance ( healthm housem carm petm other,,,)</p>
                                            <input type="number" id="insurance" name="insurance" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Credit card limit</p>
                                            <input type="number" id="credit_limit" name="credit_limit" required>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div  class="col-sm-12">
                                        <div class="col-sm-12 panel_headline">Other Information</div>
                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Can you make sure you will be able to repay this loan on time?</p>
                                            <input type="radio" name="repay_loan" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="repay_loan" value="0" >No
                                            <!-- <select id="repay_loan" name="repay_loan" required>
                                                 <option value="">--Select--</option>
                                                 <option value="1">Yes</option>
                                                 <option value="0">No</option>
                                             </select>-->
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Can you make sure you have no unpaid credit defaults ?</p>
                                            <input type="radio" name="credit_defaults" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="credit_defaults" value="0" >No
                                            <!-- <select id="credit_defaults" name="credit_defaults" required>
                                                 <option value="">--Select--</option>
                                                 <option value="1">Yes</option>
                                                 <option value="0" selected="">No</option>
                                             </select>-->
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                    <br>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p> I agree that all the information I have given is true and current</p>
                                            <input type="radio" name="given_info" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="given_info" value="0" >No
                                            <!--<select id="given_info" name="given_info" required>
                                                <option value="">--Select--</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>-->
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>



                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Can you cut back on your non-essential spending while you repay this loan?</p>
                                            <input type="radio" name="non_essential_spending" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="non_essential_spending" value="0" >No
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>





                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p> I would like to hear from My Cashonline about loan offers that may interest me </p>
                                            <input type="radio" name="loan_interest" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="loan_interest" value="0" >No
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p> How did you hear about us? </p>
                                            <select id="hear_about_us" name="hear_about_us" required>
                                                <option value="">--Select--</option>
                                                <option value="Google">Google</option>
                                                <option value="Youtube">Youtube</option>
                                                <option value="Others">Others</option>
                                                <option value="Media">Media</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Can you make sure you do not have undischarged bankrupt or on a Part IX Debt Agreement?</p>
                                            <input type="radio" name="undischarged_bankrupt" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="undischarged_bankrupt" value="0" >No
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Which is the most preferred way for us to communicate with you?</p>
                                            <input type="radio" name="communication" value="phone" required>Phone &nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="communication" value="email" >Email &nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="communication" value="letter" >Letter &nbsp; &nbsp; &nbsp;
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p> I have read and understood the <a href=" {{url('credit_guide')}} ">Credit Guide</a>  and understood the  <a href=" {{url('privacy')}} ">Privacy and Credit Reporting Notice</a>
                                                and I accept all terms they set out including identity verification, information
                                                exchange with other creditors and a credit check. I also have read and understood the  <a href=" {{url('policy')}} ">Electronic Communication Consent and
                                                    Authority</a> and make all consents and acknowledgements it contains
                                                including communicating with you electronicaly.</p>
                                            <input type="radio" name="credit_guide" value="1" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="credit_guide" value="0" >No
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>


                                    <div class=" col-sm-6">
                                        <div class="search_holder2">
                                            <p>Do you currently have 2 or more short-term loans with any other lenders?</p>
                                            <input type="radio" name="sortterm_loan" value="1" id="loan_yes" required>Yes &nbsp &nbsp &nbsp
                                            <input type="radio" name="sortterm_loan" value="0"  id="loan_no">No
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div class=" col-sm-6" style="display: none" id="loan_num_div">
                                        <div class="search_holder2">
                                            <p>Number of short-term loans?</p>
                                            <select id="loan_num" name="loan_num" >
                                                <option value="">--Select--</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <div id="com0"  style=" width: 100%; display: none;" >
                                        <div class=" col-md-6" style="float: left;  width: 50%;" >
                                            <div class="search_holder2">
                                                <p>SACC provider name 1</p>
                                                <input type="text" id="com_name0" name="com_name0">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-md-6"  style="float: left;width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount0" name="com_amount0">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com1" style="display: none; width: 100%;">

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 2</p>
                                                <input type="text" id="com_name1" name="com_name1">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount1" name="com_amount1">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com2" style="display: none; width: 100%;">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 3</p>
                                                <input type="text" id="com_name2" name="com_name2" >
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount2" name="com_amount2">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com3" style="display: none; width: 100%;">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 4</p>
                                                <input type="text" id="com_name3" name="com_name3">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount3" name="com_amount3">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com4" style="display: none;width: 100%;">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 5</p>
                                                <input type="text" id="com_name4" name="com_name4" >
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount4" name="com_amount4">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com5" style="display: none; width: 100%">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 6</p>
                                                <input type="text" id="com_name5" name="com_name5">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount5" name="com_amount5">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com6" style="display: none; width: 100%">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 7</p>
                                                <input type="text" id="com_name6" name="com_name6">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount6" name="com_amount6">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com7" style="display: none; width: 100%">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 8</p>
                                                <input type="text" id="com_name7" name="com_name7">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount7" name="com_amount7">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com8" style="display: none; width: 100%">

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 9</p>
                                                <input type="text" id="com_name8" name="com_name8">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount8" name="com_amount8">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="com9" style="display: none; width: 100%">
                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>SACC provider name 10</p>
                                                <input type="text" id="com_name9" name="com_name9">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>

                                        <div class=" col-sm-6" style="float: left;  width: 50%;">
                                            <div class="search_holder2">
                                                <p>Monthly Payment Amount</p>
                                                <input type="text" id="com_amount9" name="com_amount9">
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="clearfix"></div>
                    </div>


                </div>
            </div>
            <div class="col-sm-3 col-xs-offset-5 ">
                <div class="search_holder">
                    <button type="submit" id="next" class="action next btn  hyh" style="display: inline-block;">Next</button>
                    <p>&nbsp;</p>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>




@endsection
