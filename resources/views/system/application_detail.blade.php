@extends('layouts.back')

@section('content')
    @include('layouts.feedback')
    <script>
        $(document).ready(function(){


            $('#email-1').click(function () {
                var body="Dear {{$application['first_name']}} , \r\nWe are currently undergoing our verification process and require\r\n) a copy of your last 2 Centrelink statements\r\n) a copy of a photographic identification document and\r\n) a bill or a government issued document with your name and address\r\n A photo of these documents will be sufficient and can be sent to app@mycashonline.com.au\r\n";
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application – Documentation required&body=' + body;

            })

            $('#email-2').click(function () {
                var body="Dear {{$application['first_name']}} , \r\nCongratulations! You have been approved. Please read through the attached documents, \r\ni) Loan contract\r\nii) Loan Terms and Conditions\r\n You will receive a separate email with a link for the direct debit authorisation. Please enter your name in the Loan Contract, complete the direct debit form and return to us. If you are unable to submit the agreement, please confirm your acceptance by replying to this email. \r\nWhen we receive the loan contract and direct debit form, we will transfer the loan amount to your bank account. \r\nIf you have any questions, please contact us on at  admin@mycashonline.com.au. \r\n\nF"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application –  Approval&body=' + body;
            })
            $('#email-3').click(function () {
                var body="Dear {{$application['first_name']}}\r\n We have just transferred $             to your bank account xxxxxx xxxxxxxxxx\r\nPlease allow some time for the funds to show up in your account. \r\nIf the funds do not appear in your account after 24 hours, please contact us on 03 8813 0538\r\nor  admin@mycashonline.com.au. \r\n\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application –  Funds Transfer&body=' + body;

            })

            $('#email-4').click(function () {
                var body="Dear {{$application['first_name']}}, \r\nThank you for your loan application. Unfortunately, based on the information you have provided, we are unable to assist you on this occasion. You are welcome to reapply if your circumstances change. \r\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application –  unable to assist&body=' + body;

            })

            $('#email-5').click(function () {
                var body="Dear {{$application['first_name']}}, \r\nThank you for your loan application. Unfortunately, after conducting our assessment of your application, we advise that we are unable to assist you with a loan. \r\n\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application –  unable to assist&body=' + body;

            })
            $('#email-6').click(function () {
                var body="Dear {{$application['first_name']}}, \r\nThank you for your loan application. Based on the information provided regarding your solvency, we are unable to assist you on this occasion. You are welcome to reapply if your circumstances change\r\n\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application –  unable to assist&body=' + body;

            })
            $('#email-7').click(function () {
                var body="Dear {{$application['first_name']}},\r\nOur attempts to direct debit funds from your bank account for your loan repayments have failed twice.\r\n There will a be charge of $24 being direct debit dishonour fees so if this is a bank error, please contact us as soon as possible so we can rectify this matter.\r\nThank you\r\n\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Direct debit dishonour&body=' + body;

            })
            $('#email-8').click(function () {
                var body="Dear {{$application['first_name']}},\r\nYour loan account is in default. We have not been able to direct debit your required loan repayments and your next payment is due again in a few days. Please contact this office to make arrangements to bring your loan account up to date\r\nA daily default rate of $5 is charged for everyday your loan account is in default.\r\n Thank you\r\n\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Direct debit dishonour&body=' + body;

            })

            $("#complete").change(function(){
                if($("#complete").val()==1){
                    $("#history_info").css("display","block")
                    $("#type").attr("required","required")
                    $("#action_date").css("display","none")
                    $("#date").removeAttr("required")



                }
                else{
                    $("#history_info").css("display","none")
                    $("#type").removeAttr("required")
                    $("#action_date").css("display","block")
                    $("#date").attr("required","required")


                }
            });

            $(".ajax-option").change(function(){
                let id=$("#user_id").val();
                let key=this.id;
                let value=$(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/system/verify/change_user_status",
                    type:"post",
                    dataType:"json",
                    data:{
                        id:id,
                        key:key,
                        value:value
                    },
                    timeout:30000,
                    success:function(data){

                    }
                });
            });


            $('#my-calendar').datetimepicker({
                onDateChange: function() {
                    var   dateValue = this.getText();
                    var dateTemp1=new Date(dateValue)
                    var timez_zone_offset=(new Date()).getTimezoneOffset() * 60000;
                    var dateTemp2=new Date(dateTemp1-timez_zone_offset);
                    var date=dateTemp2.toISOString().slice(0,10);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"/system/get_task_by_date",
                        type:"post",
                        dataType:"json",
                        data:{
                            date:date
                        },
                        timeout:30000,
                        success:function(data){
                            $("#to-do").empty();
                            var count=data.length
                            var i=0;
                            var content='';
                            for(i=0;i<count;i++){
                                content+='                    <div class="row mb-2">' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold"> Content</div>' +
                                    '                                <div>'+data[i].content+'</div>' +
                                    '                            </div>\n' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold">Date</div>' +
                                    '                                <div>'+data[i].date+'</div>' +
                                    '                            </div>' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold">Application ID</div>' +
                                    '                                <div>'+data[i].application_id+'</div>' +
                                    '                            </div>' +
                                    '                        </div>'
                            }

                            $("#to-do").append(content);
                        }
                    });
                }
            });
        })

    </script>
    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-6">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Repayment Details
                    </div>
                    <div class="card-body p-4">

                        <div class="row detail" >
                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12  text-md-left font-weight-bold">Title</label>
                                    <div class="col-md-12 text-md-left">
                                        {{$application['type']}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">First Name</label>
                                    <div class="col-md-12 text-md-left">
                                        {{$application['first_name']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">Middle Name</label>
                                    <div class="col-md-12 text-md-left">
                                        {{$application['middle_name']}}
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">Last Name</label>
                                    <div class="col-md-12 text-md-left">
                                        {{$application['last_name']}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row detail">
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Last Name</label>
                                    <div class="col-md-12">
                                        {{$application['last_name']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Date of Birth</label>
                                    <div class="col-md-12">
                                        {{$application['dob']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Mobile Phone</label>
                                    <div class="col-md-12">
                                        {{$application['mobile']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12   font-weight-bold">Sex</label>
                                    <div class="col-md-12">
                                        {{$application['sex']}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row detail">

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Home Phone</label>
                                    <div class="col-md-12">
                                        {{$application['phone']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Email</label>
                                    <div class="col-md-12">
                                        {{$application['email']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">No of Dependents</label>
                                    <div class="col-md-12">
                                        {{$application['no_of_dependent']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Marital Status</label>
                                    <div class="col-md-12">
                                        {{$application['marital_status']}}
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row detail">
                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12   font-weight-bold">If share expense</label>
                                    <div class="col-md-12">
                                        {{$application['ddl_share_partner']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Partner  Income</label>
                                    <div class="col-md-12">
                                        {{$application['partner_income']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12   font-weight-bold">Contact   name</label>
                                    <div class="col-md-12">
                                        {{$application['em_contact_name']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Contact  number</label>
                                    <div class="col-md-12">
                                        {{$application['em_contact_no']}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row detail">

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">Relationship</label>
                                    <div class="col-md-12">
                                        {{$application['relationship']}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div class="col-6">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Loan Details
                    </div>
                    <div class="card-body p-4">
                        <div class="row detail">
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Purpose of Loan</label>
                                    <div class="col-md-12">
                                        {{$application['loan_purpose']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> More Detail for Loan</label>
                                    <div class="col-md-12">
                                        {{$application['explanation']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Monthly income </label>
                                    <div class="col-md-12">
                                        {{$application['monthly_after_tax']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Benifit</label>
                                    <div class="col-md-12">
                                        {{$application['pension']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Mortgage/ Rent </label>
                                    <div class="col-md-12">
                                        {{$application['mortgage_rent']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold "> Food& Entertainment</label>
                                    <div class="col-md-12">
                                        {{$application['food_entertainment']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Travel expenses </label>
                                    <div class="col-md-12">
                                        {{$application['travel_expense']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Utility Expenses</label>
                                    <div class="col-md-12">
                                        {{$application['home_utility_exp']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Insurance </label>
                                    <div class="col-md-12">
                                        {{$application['insurance']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> personal expenses </label>
                                    <div class="col-md-12">
                                        {{$application['personal_exp']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Credit card limit</label>
                                    <div class="col-md-12">
                                        {{$application['credit_limit']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold"> Loan repayment </label>
                                    <div class="col-md-12">
                                        {{$application['loan_payment']}}
                                    </div>
                                </div>
                            </div>



                            <div class="col-3">
                                <div class="form-group row"><label  class="col-md-12 font-weight-bold ">Total income</label>
                                    <div class="col-md-12">
                                        {{$application['total_income']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row"><label  class="col-md-12  font-weight-bold">Total expense</label>
                                    <div class="col-md-12">
                                        {{$application['total_expense']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12 font-weight-bold ">Amount</label>
                                    <div class="col-md-12">
                                        $ {{$application['loan_amount']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12 font-weight-bold ">Term</label>
                                    <div class="col-md-12">

                                        $ {{$application['loan_period']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12 font-weight-bold ">Installment</label>
                                    <div class="col-md-12">
                                        $ {{$application['loan_amount']*0.2}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







                </div>


            </div>



            <div class="col-6">
                <div class="card mb-2">

                    <div class="card-header theme">
                        ID & Residence
                    </div>
                    <div class="card-body p-4">
                        <div class="row detail">
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12   font-weight-bold">ID & Details</label>
                                    <div class="col-md-12">
                                        {{$application['id_details']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Driver License no</label>
                                    <div class="col-md-12">
                                        {{$application['license_no']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Driver License State</label>
                                    <div class="col-md-12">
                                        {{$application['license_state']}}
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12 font-weight-bold ">Driver License Expiry</label>
                                    <div class="col-md-12">
                                        {{$application['license_expiry']}}
                                    </div>
                                </div>
                            </div>



                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Card No</label>
                                    <div class="col-md-12">
                                        {{$application['card_no']}}
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Place of issue</label>
                                    <div class="col-md-12">
                                        {{$application['place_of_issue']}}
                                    </div>
                                </div>
                            </div>



                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Passport no</label>
                                    <div class="col-md-12">
                                        {{$application['passport_no']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Country of Issue</label>
                                    <div class="col-md-12">
                                        {{$application['issue_country']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row detail">
                            <div class="col-12">
                                <div class="w-100 line"></div>

                            </div>
                        </div>
                        <div class="row detail" >
                            <div class="col-12">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Residential Address</label>
                                    <div class="col-md-12">
                                        {{$application['residential_addr']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row detail">
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Time at  address</label>
                                    <div class="col-md-12">
                                        {{$application['time_at_addr_from']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label class="col-md-12 font-weight-bold ">Residential Status</label>
                                    <div class="col-md-12">
                                        {{$application['residential_status']}}
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">

                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Mortgage Detail</label>
                                    <div class="col-md-12">
                                        {{$application['mortgage_detail']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Agent Name</label>
                                    <div class="col-md-12">
                                        {{$application['agent_name']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Agent Mobile</label>
                                    <div class="col-md-12">
                                        {{$application['agent_mobile']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Rental per Month</label>
                                    <div class="col-md-12">
                                        {{$application['rent_amt']}}
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>





                </div>


            </div>



            <div class="col-6">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Employment Details
                    </div>
                    <div class="card-body p-4">


                        <div class="row detail">
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Employment Status</label>
                                    <div class="col-md-12">
                                        {{$application['emp_status']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Next Pay date</label>
                                    <div class="col-md-12">
                                        {{$application['primary_next_pay_date']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Length of Job</label>
                                    <div class="col-md-12">
                                        {{$application['employ_start_date']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Occupation</label>
                                    <div class="col-md-12">
                                        {{$application['occupation']}}
                                    </div>
                                </div>

                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Company Name</label>
                                    <div class="col-md-12">
                                        {{$application['company_name']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Company Address</label>
                                    <div class="col-md-12">
                                        {{$application['company_addr']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Company Phone</label>
                                    <div class="col-md-12">
                                        {{$application['company_phone']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">Income Frequency</label>
                                    <div class="col-md-12">
                                        {{$application['primary_income_freq']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Benefit Pay date</label>
                                    <div class="col-md-12">
                                        {{$application['unemp_next_pay_date']}}
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row detail">
                            <div class="col-12">
                                <div class="w-100 line"></div>

                            </div>
                        </div>

                        <div class="row detail">

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Have another job</label>
                                    <div class="col-md-12">
                                        {{$application['another_job']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold "> Other Employment </label>
                                    <div class="col-md-12">
                                        {{$application['second_emp_status']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">  Next Pay date (2)</label>
                                    <div class="col-md-12">
                                        {{$application['next_pay_date']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">  Company (2) Name</label>
                                    <div class="col-md-12">
                                        {{$application['another_company_name']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">  Company (2) Address</label>
                                    <div class="col-md-12">
                                        {{$application['another_company_addr']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">  Company (2) Phone</label>
                                    <div class="col-md-12">
                                        {{$application['another_company_phone']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">  Occupation (2)</label>
                                    <div class="col-md-12">
                                        {{$application['second_occupation']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">  Income Frequency (2)</label>
                                    <div class="col-md-12">
                                        {{$application['income_freq']}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  font-weight-bold">  Length of Job (2) </label>
                                    <div class="col-md-12">
                                        {{$application['length_of_employment']}}
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    </div>

                </div>


            <div class="col-6 mt-4">
                <div class="card  mb-2" style="height: 500px; overflow-y: scroll">
                    <div class="card-header theme">
                        <div class="row ">
                            <div class="col-2 vertical-center">Repayments</div>
                            <div class="col-2">&nbsp;</div>
                            <div class="col-4">
                                <a href="{{url('system/create_debit'.'/'.$application['id'])}}" class="btn btn-info  button-yellow w-100"><i class='fa fa-plus'></i> &nbsp;Create Debit </a>
                            </div>
                            <div class="col-4">
                                <a href="{{url('system/add_repayments'.'/'.$application['id'])}}" class="btn btn-info  button-yellow w-100"><i class='fa fa-plus'></i> &nbsp; Add Repayments </a>

                            </div>
                        </div>

                    </div>
                    <div class="card-body pl-4 pr-4 pt-2" >

                        <table class="table table-striped table-hover text-center w-100">
                            <thead>
                            <tr>

                                <td>
                                    <h6>Due Date</h6>
                                </td>
                                <td>
                                    <h6>Amount</h6>
                                </td>
                                <td>
                                    <h6>Paid Amount</h6>
                                </td>
                                <td>
                                    <h6>
                                        Notes
                                    </h6>
                                </td>


                                <td>
                                    <h6>Action</h6>
                                </td>

                            </tr>
                            </thead>
                            @foreach($repayments as $repayment)
                                <tr>
                                    <td><p>{{$repayment['due']}}</p> </td>
                                    <td>{{$repayment['amount']}}</td>
                                    <td> {{$repayment['paid_amount']}}</td>
                                    <td> {{$repayment['note']}}</td>

                                    <td>
                                        <a class="btn btn-info button-blue " href="{{url('system/edit_repayments')."/".$repayment['id']}}" ><i class="fa fa-refresh"></i> &nbsp;Change</a>
                                        <a class="btn btn-info button-red" href="{{url('system/delete_repayments')."/".$repayment['id']}}" > <i class="fa fa-trash-o"></i>&nbsp;Delete</a></td>
                                    </td>

                                </tr>


                            @endforeach

                        </table>
                    </div>

                </div>


            </div>


            <div class="col-6 mt-4">
                <div class="card  mb-2" >
                    <div class="card-header theme">
                        To Do List
                    </div>
                    <div class="card-body p-4">
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4>To Do List</h4>
                            </div>
                            <div class="col-12 card pt-2" style="background-color: white" id="to-do">
                                @foreach($tasks as $task)
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <div class="font-weight-bold"> Content</div>
                                                    <div>
                                                        {{$task['content']}}
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="font-weight-bold">Date</div>
                                                    <div>
                                                        {{$task['date']}}
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="font-weight-bold">Application ID</div>
                                                    <div>
                                                        {{$task['application_id']}}
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="font-weight-bold">Created At</div>
                                                    <div>
                                                        {{$task['created_at']}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <form method="post" action="{{ url('/system/task_save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-6">
                                    <input  type="text" class="form-control w-100" name="Content" placeholder="Content" required>
                                    <input type="hidden" value="{{ $application['id']}}" name="application_id">

                                </div>





                                <div class="col-6 ">
                                    <select class="form-control w-100" name="complete" required id="complete">
                                        <option value="">--If History-- </option>
                                        <option value="0">No </option>
                                        <option value="1">Yes </option>

                                    </select>
                                </div>
                            </div>

                                <div id="action_date" style="display: block;">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <input  type="date" class="form-control w-100" name="date" id="date" required>
                                        </div>
                                    </div>

                                </div>

                                <div id="history_info" style="display: none;" >
                                    <div class="row">
                                        <div class="col-6 mt-2">
                                            <select class="form-control w-100" name="type" id="type">
                                                <option value="">--Select a Type-- </option>
                                                <option value="1">Pending </option>
                                                <option value="2">Collection  </option>
                                                <option value="3">Hardship/Compliant  </option>
                                                <option value="4">Marketing </option>

                                            </select>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <input  type="file" class="form-control w-100" name="attachment_1" >
                                        </div>
                                        <div class="col-6 mt-2">
                                            <input  type="file" class="form-control w-100" name="attachment_2" >
                                        </div>
                                        <div class="col-6 mt-2">
                                            <input  type="file" class="form-control w-100" name="attachment_3" >
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6 mt-2">
                                        <button class="btn btn-info w-100 theme_button" type="submit">Add</button>
                                    </div>
                                </div>




                        </form>

                        <div class="row mt-4 detail">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Status</label>
                                    <div class="col-md-12">
                                        <input id="user_id" type="hidden" value="{{$user['id']}}">
                                        <select id="status" name="status" class="form-control ajax-option">
                                            <option value="">--Select--</option>
                                            <option value="0" {{$user['status']==0 ? 'selected' : ''}}>Active</option>
                                            <option value="1" {{$user['status']==1 ? 'selected' : ''}}>Hold</option>
                                            <option value="2" {{$user['status']==2 ? 'selected' : ''}}>Suspend</option>
                                            <option value="3" {{$user['status']==3 ? 'selected' : ''}}>Cancel</option>
                                            <option value="4" {{$user['status']==3 ? 'selected' : ''}}>Payoff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Condition</label>
                                    <div class="col-md-12">
                                        <select id="condition" name="condition" class="form-control ajax-option">
                                            <option value="">--Select--</option>
                                            <option value="0" {{$user['condition']==0 ? 'selected' : ''}}>Normal</option>
                                            <option value="1" {{$user['condition']==1 ? 'selected' : ''}}>Hardship</option>
                                            <option value="2" {{$user['condition']==2 ? 'selected' : ''}}>Bankrupt</option>
                                            <option value="3" {{$user['condition']==3 ? 'selected' : ''}}>Default</option>
                                            <option value="4" {{$user['condition']==4 ? 'selected' : ''}}>Ovedue</option>
                                            <option value="5" {{$user['condition']==4 ? 'selected' : ''}}>Part 9</option>


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <label  class="col-md-12 font-weight-bold ">Undesirable</label>
                                    <div class="col-md-12">
                                        <select id="undesirable" name="undesirable" class="form-control ajax-option">
                                            <option value="">--Select--</option>
                                            <option value="0" {{$user['undesirable']==0 ? 'selected' : ''}}>No</option>
                                            <option value="1" {{$user['undesirable']==1 ? 'selected' : ''}}>Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                        </div>
                        </div>





                </div>





            </div>






            <div class="col-6 mt-4">
                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Emails
                    </div>
                    <div class="card-body p-4">
                        <div class="row mt-4">

                            <div class="col-12  pt-2 pb-2" >
                                <div class="row">
                                    <div class="col-4 mb-1" ><button id="email-1" class="btn btn-info w-100 theme_button">Doc required</button></div>
                                    <div class="col-4 mb-1" ><button id="email-2" class="btn btn-info w-100 theme_button">Approval</button></div>
                                    <div class="col-4 mb-1" ><button id="email-3" class="btn btn-info w-100 theme_button">Funds Transfer</button></div>
                                    <div class="col-4 mb-1" ><button id="email-4" class="btn btn-info w-100 theme_button">Decline</button></div>
                                    <div class="col-4 mb-1" ><button id="email-5" class="btn btn-info w-100 theme_button">Credit history</button></div>
                                    <div class="col-4 mb-1" ><button id="email-6" class="btn btn-info w-100 theme_button">Decline Bankrupt</button></div>
                                    <div class="col-4 mb-1" ><button id="email-7" class="btn btn-info w-100 theme_button">Debit Dishonour</button></div>
                                    <div class="col-4 mb-1" ><button id="email-8" class="btn btn-info w-100 theme_button">Account  Default</button></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="col-6 mt-4">
                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Fellow up History
                    </div>
                    <div class="card-body p-4">
                        <div class="row mt-4">

                            <div class="col-12  pt-2 pb-2" >

                                @foreach($historys as $task)
                                    <div class="row mb-5">
                                        <div class="col-4">
                                            <div class="font-weight-bold"> Created Date</div>
                                            <div>{{$task["created_at"]}}</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-weight-bold"> Action Date</div>
                                            <div>{{$task["date"]}}</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-weight-bold">Cusomter Name</div>
                                            <div>{{$task["user_name"]}}</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-weight-bold"> Application ID</div>
                                            <div><a href="{{url("/system/application_detail")."/".$task['application_id']}}">{{$task["application_id"]}}</a></div>
                                        </div>
                                        @if($task['attachment_1']!="")
                                            <div class="col-4">
                                                <div class="font-weight-bold"> Attachment 1</div>
                                                <div><a href="{{url("/storage")."/".$task['attachment_1']}}">Attachment-1</a></div>

                                            </div>
                                        @endif

                                        @if($task['attachment_2']!="")
                                            <div class="col-4">
                                                <div class="font-weight-bold"> Attachment 2</div>
                                                <div><a href="{{url("/storage")."/".$task['attachment_2']}}">Attachment-2</a></div>
                                            </div>
                                        @endif

                                        @if($task['attachment_3']!="")
                                            <div class="col-4">
                                                <div class="font-weight-bold"> Attachment 3</div>
                                                <div><a href="{{url("/storage")."/".$task['attachment_3']}}">Attachment-3</a></div>
                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <div class="font-weight-bold"> Content</div>
                                            <div>{{$task["content"]}}</div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>



            <div class="col-6 mt-4">
                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Loan Calculator
                    </div>
                    <div class="card-body p-4">
                        <div class="row mt-4">

                            <div class="col-6  pt-2 pb-2" >
                                Pay Out Past
                            </div>
                            <div class="col-6  pt-2 pb-2" >
                                <input class="form-control w-100" readonly value="$ {{$previous_amount-$paid_amount}}">

                            </div>
                            <div class="col-6  pt-2 pb-2" >
                                Pay Out Future
                            </div>
                            <div class="col-6  pt-2 pb-2" >
                                <input class="form-control w-100" readonly value="$ {{$amount-$paid_amount}}">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>








@endsection
