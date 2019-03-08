@extends('layouts.back')

@section('content')
    @include('layouts.feedback')
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Loans</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label  class="col-md-3 col-form-label text-md-right">Lender</label>
                        <div class="col-md-9">
                            <input id="lender" type="text"
                                   class="form-control"
                                   name="lender"  autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-3 col-form-label text-md-right"> Amount</label>
                        <div class="col-md-9">
                            <input id="monthly_amount" type="text"
                                   class="form-control"
                                   name="monthly_amount"  autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-md-3 col-form-label text-md-right">Type</label>
                        <div class="col-md-9">
                            <select id="type" type="text"
                                   class="form-control"
                                    name="type"  autofocus>

                                <option value="">
                                    Please Select
                                </option>
                                <option value="0">
                                    Small Loan
                                </option>
                                <option value="1">
                                    Other Loan
                                </option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"  id="add_loan">Add</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        var monthly_repayment=parseFloat({{$monthly_repayment}}) ;
        var weekly_repayment=parseFloat({{$weekly_repayment}}) ;
        var fortnightly_repayment=parseFloat({{$fortnightly_repayment}}) ;

        var total_verified_loans=parseFloat({{$total_verified_loans}});
        var verified_income=parseFloat({{$verify['income']}});
        var benchmark=parseFloat({{$benchmark}});


        function update_disposable(){
            $("#total_loan_amount").val(total_verified_loans.toFixed(2))
            $("#disposable").val((verified_income-benchmark-total_verified_loans).toFixed(2));
            $("#disposable-after").val((verified_income-benchmark-total_verified_loans-monthly_repayment).toFixed(2))
        }

        $(document).on('click', '.delete-loans', function() {
            let row=$(this).parent().parent();
            let id=$(this).prev().val()
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/system/remove_loans",
                type:"post",
                dataType:"json",
                data:{
                    id:id,

                },
                timeout:30000,
                success:function(data){
                    row.remove()
                    total_verified_loans-= parseFloat(data["monthly_amount"])
                    update_disposable();
                }

            })
        });
        $(document).ready(function () {

            function init_payment_num(){
                var amount= $("#amount").val();
                var period= $("#period").val();
                var discount=$("#discount").val();
                if(amount<=2000){
                    monthly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1.2-discount)/Math.ceil(period/4.33);
                    weekly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1.2-discount)/period
                    fortnightly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1.2-discount)/Math.ceil(period/2)
                }
                else if(amount<=5000){
                    monthly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1+400-discount)/Math.ceil(period/4.33)
                    weekly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1+400-discount)/period
                    fortnightly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1+400-discount)/Math.ceil(period/2)
                }
                else{
                    monthly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1-discount)/Math.ceil(period/4.33)
                    weekly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1-discount)/period
                    fortnightly_repayment=(amount*0.04*Math.ceil(period/4.33)+amount*1-discount)/Math.ceil(period/2)
                }
                $("#monthly_repayment").val(monthly_repayment.toFixed(2))
                $("#weekly_repayment").val(weekly_repayment.toFixed(2))
                $("#fortnightly_repayment").val(fortnightly_repayment.toFixed(2))



                update_disposable()
            }

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


            $('#email-4').click(function () {
                var body="Dear {{$application['first_name']}}, \r\nThank you for your loan application. Unfortunately, based on the information you have provided, we are unable to assist you on this occasion. You are welcome to reapply if your circumstances change. \r\n"
                body=encodeURIComponent(body);
                window.location.href = 'mailto:{{$application['email']}}?subject=Loan Application –  unable to assist&body=' + body;

            })



            $("#add_loan").click(function(){

                let id=$("#verify_id").val();
                let lender=$("#lender").val();
                let type=$("#type").val();
                let monthly_amount=$("#monthly_amount").val();
                if(id==""||lender==""||type==""||monthly_amount==""){
                    $("#add").modal('toggle');
                    return
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/system/add_loans",
                    type:"post",
                    dataType:"json",
                    data:{
                        verification_id:id,
                        lender:lender,
                        type:type,
                        monthly_amount:monthly_amount

                    },
                    timeout:30000,
                    success:function(data){
                        let type;
                        if(data["loan"]["type"]==0){
                            type="Small Loans"
                        }
                        else{
                            type="Other Loans"
                        }
                        let content="<tr>"+
                                    "<td>"+
                                        data["loan"]["lender"]+
                                    "</td>"+
                                    "<td>"+
                                    data["loan"]["monthly_amount"]+
                                    "</td>"+
                                    "<td>"+
                                    type+
                                    "</td>"+
                                    "<td>"+
                                        "<input type='hidden' value='"+data["loan"]["id"]+"'>"+
                                        "<button class='btn btn-primary btn-block button-blue delete-loans'>"+"Delete"+"</button>"+
                                    "</td>"+
                                "</tr>";
                        $("#loan-table").append(content)
                        total_verified_loans+=parseFloat(data["loan"]["monthly_amount"])
                        update_disposable();

                        $("#add").modal('toggle');



                    }
                });
            })
            $(".ajax-option").change(function(){
                let id=$("#verify_id").val();
                let key=this.id;
                let value=$(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/system/verify/change_verify_reference",
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
            $("#amount").blur(function(){
                init_payment_num()
            })
            $("#discount").blur(function(){
                init_payment_num()
            })


            $("#period").blur(function(){
                init_payment_num()
            })

            $(".ajax-text").blur(function(){
                var if_change_income=false
                if(this.id=="income"){
                    if_change_income=true

                }
                let id=$("#verify_id").val();
                let key=this.id;
                let value=$(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/system/verify/change_verify_reference",
                    type:"post",
                    dataType:"json",
                    data:{
                        id:id,
                        key:key,
                        value:value
                    },
                    timeout:30000,
                    success:function(data){
                        alert("Info note added");
                        if(if_change_income){
                            verified_income=value
                            update_disposable()
                        }
                    }
                });
            });



        });

    </script>
    @if ($fail)
        <div class="container-fluid">
            <div class="alert alert-danger text-center">
                Please wait for Credit Sense
            </div>
        </div>
    @endif

    @if ($alert)
        <div class="container-fluid">
            <div class="alert alert-danger text-center">
                The user has some dangerous behavior
            </div>
        </div>
    @endif

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-6">
                <div class="row ">
                    <div class="col-12 ">

                        <div class=" " >
                            <div class=" white-theme" >

                               <span style="font-size: 20px">User Details</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#user_info"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class="card-body pt-1 collapse show" id="user_info" style="height: 300px;!important; overflow-y: scroll">


                                <div class="row detail" >
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">App ID</span>: {{$application['id']}}
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Date</span>: {{$application['date']}}
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Time</span>: {{$application['time']}}
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Amount</span>:
                                        @if($application['loan_amount'])
                                            $ {{$application['loan_amount']}}
                                        @else
                                            $ {{$application['loan_amount_MACC']}}
                                        @endif
                                    </div>
                                    <div class="col-1 pl-0 pr-0">
                                        <span class="title">Term</span>: @if($application['loan_amount'])
                                            {{$application['loan_period']}}
                                        @else
                                            {{$application['loan_period_MACC']}}
                                        @endif
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Channel</span>:  {{$application['hear_about_us']}}
                                    </div>

                                </div>


                                <div class="row detail" >
                                    <div class="col-12 pl-0 pr-0">
                                        <span class="title">More Detail for Loan </span>: {{$application['explanation']}}
                                    </div>
                                </div>




                                <div class="row detail">

                                    <div class="col-1 pl-0 pr-0">
                                        <span class="title">Title</span>: {{$application['type']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">F-name</span>: {{$application['first_name']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">M-name</span>: {{$application['middle_name']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">L-name</span>: {{$application['last_name']}}
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">DOB</span>: {{$application['dob']}}
                                    </div>

                                </div>



                                <div class="row detail">



                                    <div class="col-6 pl-0 pr-0">
                                        <span class="title">Email</span>: {{$application['email']}}
                                    </div>
                                    <div class="col-6 pl-0 pr-0">
                                        <span class="title">Mobile</span>: {{$application['mobile']}}
                                    </div>

                                </div>

                                <div class="row detail">

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Sex</span>: {{$application['sex']}}
                                    </div>


                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">No of Dpts</span>: {{$application['no_of_dependent']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Marital Status</span>: {{$application['marital_status']}}
                                    </div>

                                </div>







                                <div class="row detail">

                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Share expense</span>: {{$application['ddl_share_partner']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Partner Income</span>: {{$application['partner_income']}}
                                    </div>
                                    <div class="col-4 pl-0 pr-0">
                                        <span class="title">Contact name</span>: {{$application['em_contact_name']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Contact No.</span>: {{$application['em_contact_no']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Relationship</span>: {{$application['relationship']}}
                                    </div>

                                </div>

                                <div class="row detail" >
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">ID </span>: {{$application['id_details']}}
                                    </div>
                                    <div class="col-4 pl-0 pr-0">
                                        <span class="title">Driver License no</span>: {{$application['license_no']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Driver License State</span>: {{$application['license_state']}}
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title"> Expiry</span>:{{$application['license_expiry']}}
                                    </div>
                                </div>

                                <div class="row detail" >
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Card No</span>: {{$application['card_no']}}
                                    </div>
                                    <div class="col-2 pl-0 pr-0">
                                        <span class="title">Place of issue</span>: {{$application['place_of_issue']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Passport no</span>: {{$application['passport_no']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Country of Issue</span>:{{$application['issue_country']}}
                                    </div>
                                </div>

                                <div class="row detail" >
                                    <div class="col-8 pl-0 pr-0">
                                        <span class="title">Residential Address</span>: {{$application['residential_addr']}}
                                    </div>

                                    <div class="col-4 pl-0 pr-0">
                                        <span class="title">Time at  address</span>: {{$application['time_at_addr_from']}}
                                    </div>

                                </div>

                                <div class="row detail" >
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Residential Status</span>: {{$application['residential_status']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Mortgage Detail</span>: {{$application['mortgage_detail']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Agent Name</span>: {{$application['agent_name']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Agent Mobile</span>: {{$application['agent_mobile']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Rental per Month</span>: ${{$application['rent_amt']}}
                                    </div>

                                </div>


                                 <div class="form-group row">

                                    <div class="col-3">
                                        <button onclick=" window.open( '{{ url('storage')."/".$user['id_img'] }}')" class="btn btn-info theme_button w-100"  {{$user['id_img']=="" ? 'disabled' : ''}}>ID</button>

                                    </div>
                                    <div class="col-3">
                                        <button onclick=" window.open( '{{ url('storage')."/".$user['car_photo'] }}')" class="btn btn-info theme_button w-100"  {{$user['car_photo']=="" ? 'disabled' : ''}}>Car photo</button>
                                    </div>

                                     <div class="col-3">
                                         <button onclick=" window.open( '{{ url('storage')."/".$user['certification'] }}')" class="btn btn-info theme_button w-100"  {{$user['certification']=="" ? 'disabled' : ''}}>Cert</button>
                                     </div>

                                     <div class="col-3">
                                         <button onclick=" window.open( '{{ url('storage')."/".$user['doc_with_address'] }}')" class="btn btn-info theme_button w-100"  {{$user['doc_with_address']=="" ? 'disabled' : ''}}>Addr</button>
                                     </div>
                                     <div class="col-3">
                                         <button onclick=" window.open( '{{ url('storage')."/".$user['payslip'] }}')" class="btn btn-info theme_button w-100"  {{$user['certification']=="" ? 'disabled' : ''}}>Payslip</button>
                                     </div>

                                     <div class="col-3">
                                         <button onclick=" window.open( '{{ url('storage')."/".$user['insurance'] }}')" class="btn btn-info theme_button w-100"  {{$user['doc_with_address']=="" ? 'disabled' : ''}}>Insurance</button>
                                     </div>


                                </div>

                            </div>




                        </div>


                    </div>




                    <div class="col-12 ">

                        <div class=" " >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Employment Details</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#employ_info"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class="card-body pt-1 collapse show" id="employ_info" >

                                <div class="row detail" >
                                    <div class="col-6 pl-0 pr-0">
                                        <span class="title">Employment Status </span>: {{$application['emp_status']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Next Pay date</span>: {{$application['primary_next_pay_date']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Length of Job</span>: {{$application['employ_start_date']}}
                                    </div>

                                </div>

                                <div class="row detail" >
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Company Name </span>: {{$application['company_name']}}
                                    </div>
                                    <div class="col-9 pl-0 pr-0">
                                        <span class="title">Company Address</span>: {{$application['company_addr']}}
                                    </div>
                                </div>

                                <div class="row detail" >
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title"> Occupation</span>:{{$application['occupation']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Company Phone </span>: {{$application['company_phone']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Income Frequency</span>: {{$application['primary_income_freq']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Benefit Pay date</span>: {{$application['unemp_next_pay_date']}}
                                    </div>
                                </div>
                                @if($application['another_job']!=0)
                                    <div class="row detail" >
                                        <div class="col-6 pl-0 pr-0">
                                            <span class="title">Other Employment </span>: {{$application['second_emp_status']}}
                                        </div>
                                        <div class="col-3 pl-0 pr-0">
                                            <span class="title">Next Pay date (2)</span>: {{$application['next_pay_date']}}
                                        </div>
                                        <div class="col-3 pl-0 pr-0">
                                            <span class="title">Company (2) Name</span>: {{$application['another_company_name']}}
                                        </div>

                                    </div>

                                    <div class="row detail" >
                                        <div class="col-9 pl-0 pr-0">
                                            <span class="title">Company (2) Address </span>: {{$application['another_company_addr']}}
                                        </div>
                                        <div class="col-3 pl-0 pr-0">
                                            <span class="title">Company (2) Phone </span>: {{$application['another_company_phone']}}
                                        </div>

                                    </div>
                                    <div class="row detail" >
                                        <div class="col-3 pl-0 pr-0">
                                            <span class="title">Occupation (2)</span>: {{$application['second_occupation']}}
                                        </div>
                                        <div class="col-4 pl-0 pr-0">
                                            <span class="title">Income Frequency (2) </span>: {{$application['income_freq']}}
                                        </div>
                                        <div class="col-3 pl-0 pr-0">
                                            <span class="title">Length of Job (2) </span>: {{$application['length_of_employment']}}
                                        </div>

                                    </div>
                                @endif





                            </div>

                        </div>


                    </div>




                    <div class="col-12 ">

                        <div class=" " >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Loan Details</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#loan_info"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class="card-body pt-1 collapse show" id="loan_info">



                                <div class="row detail" >
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Purpose of Loan </span>: {{$application['loan_purpose']}}

                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Monthly income </span>: {{$application['monthly_after_tax']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Benifit </span>: {{$application['pension']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Mortgage/ Rent </span>: {{$application['mortgage_rent']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Food& Entertainment</span>: {{$application['food_entertainment']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Travel expenses</span>: {{$application['travel_expense']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Utility Expenses</span>: {{$application['home_utility_exp']}}
                                    </div>

                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Insurance</span>: {{$application['insurance']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Personal expenses</span>: {{$application['personal_exp']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Credit card limit</span>: {{$application['credit_limit']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Loan repayment</span>: {{$application['loan_payment']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Total income</span>: {{$application['total_income']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Total expense</span>: {{$application['total_expense']}}
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Amount</span>:
                                        @if($application['loan_amount'])
                                            $ {{$application['loan_amount']}}
                                        @else
                                            $ {{$application['loan_amount_MACC']}}
                                        @endif
                                    </div>
                                    <div class="col-3 pl-0 pr-0">
                                        <span class="title">Term</span>:
                                        @if($application['loan_period'])
                                            {{$application['loan_period']}}
                                        @else
                                            {{$application['loan_period_MACC']}}
                                        @endif
                                    </div>

                                </div>

                                <div class="row detail" >
                                    <div class="col-12 pl-0 pr-0">
                                        <span class="title">More Detail for Loan </span>: {{$application['explanation']}}
                                    </div>

                                </div>





                            </div>

                        </div>


                    </div>

                    <div class="col-12 mt-1">
                        <div class=" " >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Application History</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#app_history"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class="card-body p-4 collapse show" id="app_history">

                                <table class="table table-striped table-hover text-center w-100">
                                    <thead>
                                    <thead>
                                    <tr>
                                        <td>
                                            <p>Ref No.</p>
                                        </td>

                                        <td>
                                            <p> Amount</p>
                                        </td>
                                        <td>
                                            <p>Period</p>
                                        </td>
                                        <td>
                                            <p>Status</p>
                                        </td>
                                        <td>
                                            <p>Reject Reason</p>
                                        </td>
                                        <td>
                                            <p>Action</p>
                                        </td>
                                    </tr>
                                    </thead>
                                    @foreach($apps as $app)
                                        <tr>
                                            <td><p>{{$app['id']}}</p></td>
                                            <td><p>{{$app['loan_amount']}}</p></td>
                                            <td><p>{{$app['loan_period']}}</p></td>
                                            <td>
                                                @if($app['result']==1)
                                                    <p> Decline</p>
                                                @elseif($app['result']==2)
                                                    <p>   Pending</p>
                                                @elseif($app['result']==3)
                                                    <p>Accept</p>
                                                @elseif($app['result']==4)
                                                    <p>Auto Decline</p>
                                                @elseif($app['result']==0)
                                                    <p>Undecided</p>
                                                @endif

                                            </td>
                                            <td><p>{{$app['reject_reason']}}</p></td>

                                            <td >
                                                <a href="{{ url('system/application_detail')."/".$app['id'] }}" class="btn btn-info theme_button mb-1">Details</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>


                    </div>




                    <div class="col-12 mt-1">
                        <div class="  mb-2" >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Credit Sense</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#credit_sense"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class="card-body p-4 collapse show" id="credit_sense" style="height: 500px; overflow-y: scroll">

                                @if($statement!=null)
                                    @foreach($statement["Applications"]["Application"]["Accounts"]["Account"] as $account)
                                        <div><h3> {{$account["AccountName"]}} {{$account["AccountNumber"]}}</h3></div>
                                        @if($account["Overviews"]["Overview"]["Income"]["Salary"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Salary </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Income"]["Salary"] as $salary)
                                                    <tr>
                                                        <td>{{$salary['Description']}} </td>
                                                        <td>{{$salary['FrequencyDurationDate']}}</td>
                                                        <td> {{$salary['Count']}}</td>
                                                        <td> {{$salary['FrequencyDescription']}}</td>
                                                        <td> {{$salary['FrequencyWeekday']}}</td>
                                                        <td> {{$salary['TotalAmount']}}</td>
                                                        <td> {{$salary['MonthlyAmount']}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif




                                        @if($account["Overviews"]["Overview"]["Loans"]["Small Amount Loans - Loans"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Small Amount Loans - Loans </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Loans"]["Small Amount Loans - Loans"] as $SL)
                                                    <tr>
                                                        <td>{{$SL['Description']}} </td>
                                                        <td>{{$SL['FrequencyDurationDate']}}</td>
                                                        <td> {{$SL['Count']}}</td>
                                                        <td> {{$SL['FrequencyDescription']}}</td>
                                                        <td> {{$SL['FrequencyWeekday']}}</td>
                                                        <td> {{$SL['TotalAmount']}}</td>
                                                        <td> {{$SL['MonthlyAmount']}}</td>



                                                    </tr>


                                                @endforeach

                                            </table>
                                        @endif



                                        @if($account["Overviews"]["Overview"]["Loans"]["Small Amount Loans - Repayments"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Small Amount Loans - Repayments </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Status
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Loans"]["Small Amount Loans - Repayments"] as $SLRepayment)
                                                    <tr>
                                                        <td>{{$SLRepayment['Description']}}</td>
                                                        <td>{{$SLRepayment['FrequencyDurationDate']}}</td>
                                                        <td> {{$SLRepayment['Count']}}</td>
                                                        <td> {{$SLRepayment['FrequencyDescription']}}</td>
                                                        <td> {{$SLRepayment['FrequencyWeekday']}}</td>
                                                        <td> {{$SLRepayment['TotalAmount']}}</td>
                                                        <td> {{$SLRepayment['MonthlyAmount']}}</td>
                                                        <td> {{$SLRepayment['FrequencyDuration']}}</td>




                                                    </tr>


                                                @endforeach

                                            </table>
                                        @endif



                                        @if($account["Overviews"]["Overview"]["Loans"]["Small Amount Loans - Dishonours"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Small Amount Loans - Dishonours </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Loans"]["Small Amount Loans - Dishonours"] as $SLDishonor)
                                                    <tr>
                                                        <td><p>{{$SLDishonor['Description']}}</p> </td>
                                                        <td>{{$SLDishonor['FrequencyDurationDate']}}</td>
                                                        <td> {{$SLDishonor['Count']}}</td>
                                                        <td> {{$SLDishonor['FrequencyDescription']}}</td>
                                                        <td> {{$SLDishonor['FrequencyWeekday']}}</td>
                                                        <td> {{$SLDishonor['TotalAmount']}}</td>
                                                        <td> {{$SLDishonor['MonthlyAmount']}}</td>



                                                    </tr>


                                                @endforeach

                                            </table>
                                        @endif


                                        @if($account["Overviews"]["Overview"]["Loans"]["Other Dishonours"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Other Dishonours </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Loans"]["Other Dishonours"] as $Dishonor)
                                                    <tr>
                                                        <td><p>{{$Dishonor['Description']}}</p> </td>
                                                        <td>{{$Dishonor['FrequencyDurationDate']}}</td>
                                                        <td> {{$Dishonor['Count']}}</td>
                                                        <td> {{$Dishonor['FrequencyDescription']}}</td>
                                                        <td> {{$Dishonor['FrequencyWeekday']}}</td>
                                                        <td> {{$Dishonor['TotalAmount']}}</td>
                                                        <td> {{$Dishonor['MonthlyAmount']}}</td>



                                                    </tr>


                                                @endforeach

                                            </table>
                                        @endif


                                        @if($account["Overviews"]["Overview"]["Loans"]["Other Loans"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Other Loans </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Loans"]["Other Loans"] as $otherLoan)
                                                    <tr>
                                                        <td><p>{{$otherLoan['Description']}}</p> </td>
                                                        <td>{{$otherLoan['FrequencyDurationDate']}}</td>
                                                        <td> {{$otherLoan['Count']}}</td>
                                                        <td> {{$otherLoan['FrequencyDescription']}}</td>
                                                        <td> {{$otherLoan['FrequencyWeekday']}}</td>
                                                        <td> {{$otherLoan['TotalAmount']}}</td>
                                                        <td> {{$otherLoan['MonthlyAmount']}}</td>
                                                    </tr>
                                                @endforeach

                                            </table>
                                        @endif


                                        @if($account["Overviews"]["Overview"]["Outgoings"]["Other Outgoings"][0]["Description"]!="{NO MATCH}")
                                            <div><h5>Other Outgoings </h5></div>
                                            <table class="table table-striped table-hover text-center w-100" style="font-size: 10px">
                                                <thead>
                                                <tr>

                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Duration</h6>
                                                    </td>
                                                    <td>
                                                        <h6>Counts</h6>
                                                    </td>
                                                    <td>
                                                        <h6>
                                                            Frequency
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Weekday
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Total Amount
                                                        </h6>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            Monthly Amount
                                                        </h6>
                                                    </td>




                                                </tr>
                                                </thead>
                                                @foreach($account["Overviews"]["Overview"]["Outgoings"]["Other Outgoings"] as $out)
                                                    <tr>
                                                        <td><p>{{$out['Description']}}</p> </td>
                                                        <td>{{$out['FrequencyDurationDate']}}</td>
                                                        <td> {{$out['Count']}}</td>
                                                        <td> {{$out['FrequencyDescription']}}</td>
                                                        <td> {{$out['FrequencyWeekday']}}</td>
                                                        <td> {{$out['TotalAmount']}}</td>
                                                        <td> {{$out['MonthlyAmount']}}</td>



                                                    </tr>


                                                @endforeach

                                            </table>
                                        @endif



                                    @endforeach
                                @endif
                            </div>


                        </div>
                    </div>


                </div>

            </div>





            <div class="col-6 ">
                <div class="row">
                    <div class="col-12">
                        <div class=" " >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Basic Verified</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#basic_verify"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class=" collapse show" id="basic_verify" style="height: 300px; overflow-y: scroll">
                                <div class="row detail" >
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">ID Confirm</label>
                                            <div class="col-md-12">
                                                <input type="hidden" id="verify_id" name="verify_id" value="{{$verify['id']}}">
                                                <select id="ID_one" name="ID_one" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="6" {{$verify['ID_one']==6 ? 'selected' : ''}}>Driver License</option>
                                                    <option value="1" {{$verify['ID_one']==1 ? 'selected' : ''}}>Passport</option>
                                                    <option value="2" {{$verify['ID_one']==2 ? 'selected' : ''}}>Proof of Age Card</option>
                                                    <option value="3" {{$verify['ID_one']==3 ? 'selected' : ''}}>Bill</option>
                                                    <option value="4" {{$verify['ID_one']==4 ? 'selected' : ''}}>Letter</option>
                                                    <option value="5" {{$verify['ID_one']==5 ? 'selected' : ''}}>Credit File</option>


                                                </select>

                                                <select id="ID_two" name="ID_two" class="form-control mt-1 ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="6" {{$verify['ID_two']==6 ? 'selected' : ''}}>Driver License</option>
                                                    <option value="1" {{$verify['ID_two']==1 ? 'selected' : ''}}>Passport</option>
                                                    <option value="2" {{$verify['ID_two']==2 ? 'selected' : ''}}>Proof of Age Card</option>
                                                    <option value="3" {{$verify['ID_two']==3 ? 'selected' : ''}}>Bill</option>
                                                    <option value="4" {{$verify['ID_two']==4 ? 'selected' : ''}}>Letter</option>
                                                    <option value="4" {{$verify['ID_two']==5 ? 'selected' : ''}}>Credit File</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Address Confirm</label>
                                            <div class="col-md-12">
                                                <select id="address_one" name="address_one" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['address_one']==1 ? 'selected' : ''}}>Central Link Statement</option>
                                                    <option value="2" {{$verify['address_one']==2 ? 'selected' : ''}}>Letter</option>
                                                    <option value="3" {{$verify['address_one']==3 ? 'selected' : ''}}>Credit File</option>
                                                    <option value="4" {{$verify['address_one']==4 ? 'selected' : ''}}>Driver License</option>


                                                </select>

                                                <select id="address_two" name="address_two" class="form-control mt-1 ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['address_two']==1 ? 'selected' : ''}}>Central Link Statement</option>
                                                    <option value="2" {{$verify['address_two']==2 ? 'selected' : ''}}>Letter</option>
                                                    <option value="3" {{$verify['address_two']==3 ? 'selected' : ''}}>Credit File</option>
                                                    <option value="4" {{$verify['address_two']==4 ? 'selected' : ''}}>Driver License</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">DOB Confirm</label>
                                            <div class="col-md-12">
                                                <select id="DOB_one" name="DOB_one" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['DOB_one']==1 ? 'selected' : ''}}>Passport</option>
                                                    <option value="2" {{$verify['DOB_one']==2 ? 'selected' : ''}}>Proof of Age Card</option>
                                                    <option value="3" {{$verify['DOB_one']==3 ? 'selected' : ''}}>Driver License</option>
                                                    <option value="4" {{$verify['DOB_one']==4 ? 'selected' : ''}}>Credit File</option>


                                                </select>

                                                <select id="DOB_two" name="DOB_two" class="form-control mt-1 ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['DOB_two']==1 ? 'selected' : ''}}>Passport</option>
                                                    <option value="2" {{$verify['DOB_two']==2 ? 'selected' : ''}}>Proof of Age Card</option>
                                                    <option value="3" {{$verify['DOB_two']==3 ? 'selected' : ''}}>Driver License</option>
                                                    <option value="4" {{$verify['DOB_two']==4 ? 'selected' : ''}}>Credit File</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Payslip</label>
                                            <div class="col-md-12">
                                                <select id="payslip" name="payslip" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['payslip']==1 ? 'selected' : ''}}>Payslip</option>
                                                    <option value="2" {{$verify['payslip']==2 ? 'selected' : ''}}>Central Link</option>
                                                    <option value="6" {{$verify['payslip']==3 ? 'selected' : ''}}>None</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Landlord</label>
                                            <div class="col-md-12">
                                                <input type="text" id="landlord" name="landlord" class="form-control ajax-text" value="{{$verify['landlord']}}">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>




                    <div class="col-12">
                        <div class=" " >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Employment & Loan Verified</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#employ_verify"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class=" collapse show" id="employ_verify" >
                                <div class="row detail">
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Employer google</label>
                                            <div class="col-md-12">
                                                <select id="employ_google" name="employ_google" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['employ_google']==1 ? 'selected' : ''}}>Match</option>
                                                    <option value="2" {{$verify['employ_google']==2 ? 'selected' : ''}}>Not Macth</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Employer Name</label>
                                            <div class="col-md-12">
                                                <select id="employ_name" name="employ_name" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['employ_name']==1 ? 'selected' : ''}}>Match</option>
                                                    <option value="2" {{$verify['employ_name']==2 ? 'selected' : ''}}>Not Macth</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Employer Address</label>
                                            <div class="col-md-12">
                                                <select id="employ_address" name="employ_address" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['employ_address']==1 ? 'selected' : ''}}>Match</option>
                                                    <option value="2" {{$verify['employ_address']==2 ? 'selected' : ''}}>Not Macth</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Employer Phone</label>
                                            <div class="col-md-12">
                                                <select id="employ_phone" name="employ_phone" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['employ_phone']==1 ? 'selected' : ''}}>Match</option>
                                                    <option value="2" {{$verify['employ_phone']==2 ? 'selected' : ''}}>Not Macth</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Employment Note</label>
                                            <div class="col-md-12">
                                                <input type="text" id="employ_note" name="employ_note" class="form-control ajax-text" value="{{$verify['employ_note']}}">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-12">
                                        <div class="w-100 line"></div>

                                    </div>
                                </div>

                                <div class="row detail">
                                    <div class="col-3">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Benchmark Expense</label>
                                            <div class="col-md-12">
                                                {{$benchmark}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Declared expense</label>
                                            <div class="col-md-12">
                                                {{$application['total_expense']}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Declared income</label>
                                            <div class="col-md-12">
                                                {{$application['total_income']}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Verified Income</label>
                                            <div class="col-md-12">
                                                <input type="text" id="income" name="income" class="form-control ajax-text" value="{{$verify['income']}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold "> Disposable Income</label>
                                            <div class="col-md-12">
                                                <input type="text" id="disposable" name="disposable" class="form-control" value="{{$verify['income']-$benchmark-$total_verified_loans}}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold "> Disposable Income After Loan</label>
                                            <div class="col-md-12">
                                                <input type="text" id="disposable-after" name="disposable-after" class="form-control " value="{{$verify['income']-$benchmark-$total_verified_loans-$monthly_repayment}}" disabled>
                                            </div>
                                        </div>
                                    </div>






                                </div>

                                <div class="row ">
                                    <div class="col-12">
                                        <div class="w-100 line"></div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Large debit</label>
                                            <div class="col-md-12">
                                                <select id="large_debit" name="large_debit" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['large_debit']==1 ? 'selected' : ''}}>Yes</option>
                                                    <option value="2" {{$verify['large_debit']==2 ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Dishonor</label>
                                            <div class="col-md-12">
                                                <select id="dishonor" name="dishonor" class="form-control ajax-option">
                                                    <option value="">--Select--</option>
                                                    <option value="1" {{$verify['dishonor']==1 ? 'selected' : ''}}>Yes</option>
                                                    <option value="2" {{$verify['dishonor']==2 ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label  class="col-md-12 font-weight-bold ">Equifax</label>
                                            <div class="col-md-12">
                                                <input type="text" id="equifax" name="equifax" class="form-control ajax-text" value="{{$verify['equifax']}}">

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row ">
                                    <div class="col-12">
                                        <div class="w-100 line"></div>

                                    </div>
                                </div>


                                <div class="mt-4 mb-3"><div class="row">
                                        <div class="col-2 vertical-center" style="font-size: 20px;font-weight: bolder">
                                            Loans
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" id="total_loan_amount" readonly>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-primary btn-block button-blue" data-toggle="modal" data-target="#add">
                                                Add Loans
                                            </button>
                                        </div>
                                    </div>
                                </div>






                                <table class="table table-striped table-hover text-center w-100" id="loan-table">

                                    <thead>
                                    <tr>

                                        <td>
                                            <h6>Lender</h6>
                                        </td>
                                        <td>
                                            <h6>Monthly Amount</h6>
                                        </td>
                                        <td>
                                            <h6>Type</h6>
                                        </td>
                                        <td>
                                            <h6>Action</h6>
                                        </td>
                                    </tr>
                                    </thead>
                                    @foreach($verified_loans as $loan)
                                        <tr>
                                            <td>
                                                {{$loan["lender"]}}
                                            </td>
                                            <td>
                                                {{$loan["monthly_amount"]}}

                                            </td>
                                            <td>
                                                @if($loan["type"]==0)
                                                    Small Loans
                                                @else
                                                    Other Loans
                                                @endif


                                            </td>

                                            <td>
                                                <input type="hidden" value="{{$loan["id"]}}">
                                                <button class="btn btn-primary btn-block button-blue delete-loans"> Delete</button>

                                            </td>
                                        </tr>

                                    @endforeach
                                </table>

                            </div>
                        </div>


                    </div>


                    <div class="col-12">
                        <div class=" " >
                            <div class=" white-theme" >

                                <span style="font-size: 20px">Decision</span> <button class=" transparent_button btn" data-toggle="collapse" data-target="#decision"><i class="material-icons" style="font-size: 20px">arrow_drop_down</i>
                                </button>
                            </div>
                            <div class=" collapse show" id="decision" >
                                <form method="post" action="{{ url('/system/update_verify/')."/".$application['id'] }}" enctype="multipart/form-data">
                                    @csrf

                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="form-group row mt-4"><label for="amount" class="col-md-4 col-form-label text-md-right">Loan Amount</label>
                                        <div class="col-md-6">
                                            <input id="amount" type="number" class="form-control" name="amount" required value={{$application['loan_amount']==0 ? $application['loan_amount_MACC']:$application['loan_amount'] }}   >
                                        </div>
                                    </div>

                                    <div class="form-group row"><label for="period" class="col-md-4 col-form-label text-md-right">Loan Period</label>
                                        <div class="col-md-6">
                                            <input id="period" type="number" class="form-control" name="period" required value={{$application['loan_period']==0 ? $application['loan_period_MACC']:$application['loan_period'] }}   >
                                        </div>
                                    </div>

                                    <div class="form-group row"><label for="discount" class="col-md-4 col-form-label text-md-right">Discount</label>
                                        <div class="col-md-6">
                                            <input id="discount" type="number" class="form-control" name="discount" required value={{$application['discount']  }}   >
                                        </div>
                                    </div>


                                    <div class="form-group row"><label for="period" class="col-md-4 col-form-label text-md-right">Monthly Repayment</label>
                                        <div class="col-md-6">
                                            <input id="monthly_repayment" type="text" readonly class="form-control" name="monthly_repayment"     >
                                        </div>
                                    </div>

                                    <div class="form-group row"><label for="period" class="col-md-4 col-form-label text-md-right">Weekly Repayment</label>
                                        <div class="col-md-6">
                                            <input id="weekly_repayment" type="text" readonly class="form-control" name="weekly_repayment"     >
                                        </div>
                                    </div>

                                    <div class="form-group row"><label for="period" class="col-md-4 col-form-label text-md-right">Fortnightly Repayment</label>
                                        <div class="col-md-6">
                                            <input id="fortnightly_repayment" type="text" readonly class="form-control" name="fortnightly_repayment"     >
                                        </div>
                                    </div>




                                    <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Result</label>
                                        <div class="col-md-6">
                                            <select id="result" name="result" class="form-control{{ $errors->has('result') ? ' is-invalid' : '' }}">
                                                <option value="">--Select--</option>
                                                <option value="0" {{$application['result']==0 ? 'selected' : ''}}>Wait for CS</option>
                                                <option value="1" {{$application['result']==1 ? 'selected' : ''}}>Decline</option>
                                                <option value="2" {{$application['result']==2 ? 'selected' : ''}}>Pending</option>
                                                @if (!$fail)
                                                    <option value="3" {{$application['result']==3 ? 'selected' : ''}}>Approved</option>
                                                    <option value="4" {{$application['result']==4 ? 'selected' : ''}}>Auto Decline</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group row"><label for="reject_reason" class="col-md-4 col-form-label text-md-right">Reject Reason</label>
                                        <div class="col-md-6">
                                            <input id="reject_reason" type="text" class="form-control{{ $errors->has('reject_reason') ? ' is-invalid' : '' }}" name="reject_reason" value="{{$application['reject_reason']}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <a href="{{url("system/create_debit")."/".$application['id']}}" class="btn btn-primary btn-block theme_button">
                                                Create direct debit
                                            </a>
                                            <a href="{{url("system/download_contract")."/".$application['id']}}" class="btn btn-primary btn-block theme_button">Final Contract</a>
                                            <a href="{{url("storage/contract")."/".$application['id']}}.pdf" class="btn btn-primary btn-block theme_button">Pre Contract</a>

                                            <button type="submit" class="btn btn-primary btn-block theme_button">
                                                submit
                                            </button>


                                        </div>
                                    </div>
                                </form>

                                <div class="form-group row mt-1">
                                    <div class="col-3 mt-3">
                                        <button id="email-4" class="btn btn-primary btn-block  theme_button w-100"> Decline Email</button>

                                    </div>
                                    <div class="col-3 mt-3">
                                        <button id="email-1" class="btn btn-primary btn-block theme_button w-100"> Doc required </button>

                                    </div>
                                    <div class="col-3 mt-3">
                                        <button id="email-2" class="btn btn-primary btn-block theme_button w-100"> Approval Email</button>

                                    </div>
                                    <div class="col-3 mt-3">
                                        <a href="{{url("download_record")."/".$application['id']}}.pdf" class="btn btn-primary btn-block theme_button">Application Info</a>
                                    </div>


                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </div>





        </div>









    </div>





@endsection




