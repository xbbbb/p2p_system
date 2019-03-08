
@extends('layouts.app')

@section('content')

    @if($if_repeat==1)
        <div class="container-fluid">
            <div class="alert alert-danger text-center">
                Same applicant exists
            </div>
        </div>
    @endif

    @include('backend.application_tab')

    <div class="container-fluid mt-2 mb-5" style="background-color: white">

            <div class="card">

                <div class="card-footer">

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Start time</label>
                        <div class="col-md-6">
                            {{$application['start_time']}}
                        </div>
                    </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                   {{$application['type']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">First Name</label>
                            <div class="col-md-6">
                                {{$application['first_name']}}
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Middle Name</label>
                            <div class="col-md-6">
                                {{$application['middle_name']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">Last Name</label>
                            <div class="col-md-6">
                                {{$application['last_name']}}
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="end_time" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                            <div class="col-md-6">
                                {{$application['dob']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Mobile Phone</label>
                            <div class="col-md-6">
                                {{$application['mobile']}}
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="collection_id" class="col-md-4 col-form-label text-md-right">Sex</label>
                                <div class="col-md-6">
                                    {{$application['sex']}}
                                </div>
                        </div>


                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Home Phone</label>
                                <div class="col-md-6">
                                    {{$application['phone']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    {{$application['email']}}
                                </div>
                        </div>

                         <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">No of Dependents</label>
                                <div class="col-md-6">
                                    {{$application['no_of_dependent']}}
                                </div>
                        </div>

                    <div class="form-group row">
                        <label for="cate_id" class="col-md-4 col-form-label text-md-right">Marital Status</label>
                        <div class="col-md-6">
                            {{$application['marital_status']}}
                        </div>
                    </div>



                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">If share expense</label>
                                <div class="col-md-6">
                                    {{$application['ddl_share_partner']}}
                                </div>
                        </div>

                         <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Partner Monthly Income</label>
                                <div class="col-md-6">
                                    {{$application['partner_income']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Contact person full name</label>
                                <div class="col-md-6">
                                    {{$application['em_contact_name']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Contact person number</label>
                                <div class="col-md-6">
                                    {{$application['em_contact_no']}}
                                </div>
                        </div>


                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Relationship</label>
                                <div class="col-md-6">
                                    {{$application['relationship']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">ID & Details</label>
                                <div class="col-md-6">
                                    {{$application['id_details']}}
                                </div>
                        </div>




                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Driver License no</label>
                                <div class="col-md-6">
                                    {{$application['license_no']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Driver License State</label>
                                <div class="col-md-6">
                                    {{$application['license_state']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Driver License Expiry</label>
                                <div class="col-md-6">
                                    {{$application['license_expiry']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Residential Address</label>
                                <div class="col-md-6">
                                    {{$application['residential_addr']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Time at current address</label>
                                <div class="col-md-6">
                                    {{$application['time_at_addr_from']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Residential Status</label>
                                <div class="col-md-6">
                                    {{$application['residential_status']}}
                                </div>
                        </div>


                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right">Mortgage Detail</label>
                            <div class="col-md-6">
                                {{$application['mortgage_detail']}}
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Agent Name/LandLord Name</label>
                                <div class="col-md-6">
                                    {{$application['agent_name']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Agent/Landlord Mobile</label>
                                <div class="col-md-6">
                                    {{$application['agent_mobile']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Rental per Month</label>
                                <div class="col-md-6">
                                    {{$application['rent_amt']}}
                                </div>
                        </div>



                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Card No</label>
                                <div class="col-md-6">
                                    {{$application['card_no']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Place of issue</label>
                                <div class="col-md-6">
                                    {{$application['place_of_issue']}}
                                </div>
                        </div>


                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Passport no</label>
                                <div class="col-md-6">
                                    {{$application['passport_no']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Country of Issue</label>
                                <div class="col-md-6">
                                    {{$application['issue_country']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Country of Issue</label>
                                <div class="col-md-6">
                                    {{$application['issue_country']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Employment Status</label>
                                <div class="col-md-6">
                                    {{$application['emp_status']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Next Pay date</label>
                                <div class="col-md-6">
                                    {{$application['primary_next_pay_date']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Length of Employment</label>
                                <div class="col-md-6">
                                    {{$application['employ_start_date']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Occupation</label>
                                <div class="col-md-6">
                                    {{$application['occupation']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Company Name</label>
                                <div class="col-md-6">
                                    {{$application['company_name']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Company Address</label>
                                <div class="col-md-6">
                                    {{$application['company_addr']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Company Phone</label>
                                <div class="col-md-6">
                                    {{$application['company_phone']}}
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right">Income Frequency</label>
                            <div class="col-md-6">
                                {{$application['primary_income_freq']}}
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Benefit Pay date</label>
                                <div class="col-md-6">
                                    {{$application['unemp_next_pay_date']}}
                                </div>
                        </div>




                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right">Do you have another job</label>
                                <div class="col-md-6">
                                    {{$application['another_job']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Employment Status</label>
                                <div class="col-md-6">
                                    {{$application['second_emp_status']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Next Pay date</label>
                                <div class="col-md-6">
                                    {{$application['next_pay_date']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Company Name</label>
                                <div class="col-md-6">
                                    {{$application['another_company_name']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Company Address</label>
                                <div class="col-md-6">
                                    {{$application['another_company_addr']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Company Phone</label>
                                <div class="col-md-6">
                                    {{$application['another_company_phone']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Occupation</label>
                                <div class="col-md-6">
                                    {{$application['second_occupation']}}
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Income Frequency</label>
                                <div class="col-md-6">
                                    {{$application['income_freq']}}
                                </div>
                        </div>

                         <div class="form-group row">
                                <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Other Length of Employment</label>
                                <div class="col-md-6">
                                    {{$application['length_of_employment']}}
                                </div>
                        </div>






                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Purpose of Loan</label>
                            <div class="col-md-6">
                                {{$application['loan_purpose']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> More Detail for Loan</label>
                            <div class="col-md-6">
                                {{$application['explanation']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Monthly income after tax(AUD)-Dollars</label>
                            <div class="col-md-6">
                                {{$application['monthly_after_tax']}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Benifit centrelink/Pension</label>
                            <div class="col-md-6">
                                {{$application['pension']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Mortgage/ Rent (Including borading cost, etc)</label>
                            <div class="col-md-6">
                                {{$application['mortgage_rent']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Food& Entertainment（food,entertainment and gambling）</label>
                            <div class="col-md-6">
                                {{$application['food_entertainment']}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Travel expenses ( Bus, Train,petrol vehicle running cost…)</label>
                            <div class="col-md-6">
                                {{$application['travel_expense']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Home & Utility Expenses ( Gas, Water, Electric, TV & internet…)</label>
                            <div class="col-md-6">
                                {{$application['home_utility_exp']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Insurance ( healthm housem carm petm other,,,)</label>
                            <div class="col-md-6">
                                {{$application['insurance']}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> personal expenses (Gymmembership, school fee, child care, medical …)</label>
                            <div class="col-md-6">
                                {{$application['personal_exp']}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Credit card limit</label>
                            <div class="col-md-6">
                                {{$application['credit_limit']}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Loan repayment ( Small, Medium And other loan)</label>
                            <div class="col-md-6">
                                {{$application['loan_payment']}}
                            </div>
                        </div>

                    <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Total income</label>
                        <div class="col-md-6">
                            {{$application['total_income']}}
                        </div>
                    </div>

                    <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Total expense</label>
                        <div class="col-md-6">
                            {{$application['total_expense']}}
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Do you foresee any reason you wont able to repay this loan</label>
                            <div class="col-md-6">
                                @if($application['repay_loan']==1)
                                    yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>


                    <div class="form-group row">
                        <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Do you have undischarged bankruptcy</label>
                        <div class="col-md-6">
                            @if($application['undischarged_bankrupt']==1)
                                yes
                            @else
                                no
                            @endif
                        </div>
                    </div>


                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Do you have any unpaid credit defaults?</label>
                            <div class="col-md-6">
                                @if($application['credit_defaults']==1)
                                    yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Do you currently have 2 or more short-term loans with any other lenders?</label>
                            <div class="col-md-6">
                                @if($application['sortterm_loan']==1)
                                    yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> I agree that all the information I have given is true and current</label>
                            <div class="col-md-6">
                                @if($application['given_info']==1)
                                    yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> I have read and understood all documents</label>
                            <div class="col-md-6">
                                @if($application['credit_guide']==1)
                                    yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cate_id" class="col-md-4 col-form-label text-md-right"> Can you cut back on your non-essential spending while you repay this loan?</label>
                            <div class="col-md-6">
                                @if($application['non_essential_spending']==1)
                                    yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>






                        <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">I would like to hear from My Cashonline about loan offers that may interest me.</label>
                            <div class="col-md-6">
                                @if($application['loan_interest']==1)
                                yes
                                @else
                                    no
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">How did you hear about us?</label>
                            <div class="col-md-6">
                                {{$application['hear_about_us']}}
                            </div>
                        </div>

                    <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Preferred Communication</label>
                        <div class="col-md-6">
                            {{$application['communication']}}
                        </div>
                    </div>


                    <form method="post" action="{{ url('/application/update/')."/".$application['id'] }}" enctype="multipart/form-data">
                        @csrf

                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Result</label>
                            <div class="col-md-6">
                                <select id="result" name="result" class="form-control{{ $errors->has('result') ? ' is-invalid' : '' }}">
                                    <option value="">--Select--</option>
                                    <option value="0" {{$application['result']==0 ? 'selected' : ''}}>Wait for CS</option>
                                    <option value="1" {{$application['result']==1 ? 'selected' : ''}}>Decline</option>
                                    <option value="2" {{$application['result']==2 ? 'selected' : ''}}>Pending</option>
                                    <option value="3" {{$application['result']==3 ? 'selected' : ''}}>Approved</option>
                                    <option value="4" {{$application['result']==4 ? 'selected' : ''}}>Auto Decline</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Reject Reason</label>
                            <div class="col-md-6">
                                <input id="reject_reason" type="text" class="form-control{{ $errors->has('reject_reason') ? ' is-invalid' : '' }}" name="reject_reason" value="{{$application['reject_reason']}}" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    submit
                                </button>
                                <p>&nbsp;</p>
                                <a href="../../storage/contract/{{$application['id']}}.pdf" class="btn btn-info w-100">contract</a>
                                <p>&nbsp;</p>
                                <a href="{{url("download_record")."/".$application['id']}}" class="btn btn-info w-100">record</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>

@endsection
