
@extends('layouts.back')

@section('content')
    <script>
        $(document).ready(function () {





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
        })
    </script>

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-6">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        User Details
                    </div>
                    <div class="card-body p-4">


                    <div class="row detail">
                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-md-12  text-md-left font-weight-bold">Title</label>
                                <div class="col-md-12 text-md-left">
                                    {{$user['type']}}
                                </div>
                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  text-md-left font-weight-bold">First Name</label>
                                <div class="col-md-12 text-md-left">
                                    {{$user['first_name']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  text-md-left font-weight-bold">Middle Name</label>
                                <div class="col-md-12 text-md-left">
                                    {{$user['middle_name']}}
                                </div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  text-md-left font-weight-bold">Last Name</label>
                                <div class="col-md-12 text-md-left">
                                    {{$user['last_name']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
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

                        <div class="col-3">
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

                        <div class="col-3">
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


                    <div class="row detail">
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Last Name</label>
                                <div class="col-md-12">
                                    {{$user['last_name']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Date of Birth</label>
                                <div class="col-md-12">
                                    {{$user['dob']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Mobile Phone</label>
                                <div class="col-md-12">
                                    {{$user['mobile']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-md-12   font-weight-bold">Sex</label>
                                <div class="col-md-12">
                                    {{$user['sex']}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row detail">

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Home Phone</label>
                                <div class="col-md-12">
                                    {{$user['phone']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Email</label>
                                <div class="col-md-12">
                                    {{$user['email']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">No of Dependents</label>
                                <div class="col-md-12">
                                    {{$user['no_of_dependent']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Marital Status</label>
                                <div class="col-md-12">
                                    {{$user['marital_status']}}
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row detail">
                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-md-12   font-weight-bold">If share expense</label>
                                <div class="col-md-12">
                                    {{$user['ddl_share_partner']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Partner  Income</label>
                                <div class="col-md-12">
                                    {{$user['partner_income']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-md-12   font-weight-bold">Contact   name</label>
                                <div class="col-md-12">
                                    {{$user['em_contact_name']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Contact  number</label>
                                <div class="col-md-12">
                                    {{$user['em_contact_no']}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row detail">

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Relationship</label>
                                <div class="col-md-12">
                                    {{$user['relationship']}}
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
                        ID Details
                    </div>
                    <div class="card-body p-4">
                    <div class="row detail">
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">ID & Details</label>
                                <div class="col-md-12">
                                    {{$user['id_details']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Driver License no</label>
                                <div class="col-md-12">
                                    {{$user['license_no']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Driver License State</label>
                                <div class="col-md-12">
                                    {{$user['license_state']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-md-12 font-weight-bold ">Driver License Expiry</label>
                                <div class="col-md-12">
                                    {{$user['license_expiry']}}
                                </div>
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Card No</label>
                                <div class="col-md-12">
                                    {{$user['card_no']}}
                                </div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Place of issue</label>
                                <div class="col-md-12">
                                    {{$user['place_of_issue']}}
                                </div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Passport no</label>
                                <div class="col-md-12">
                                    {{$user['passport_no']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Passport no</label>
                                <div class="col-md-12">
                                    {{$user['passport_no']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Country of Issue</label>
                                <div class="col-md-12">
                                    {{$user['issue_country']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Residential Address</label>
                                <div class="col-md-12">
                                    {{$user['residential_addr']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Time at  address</label>
                                <div class="col-md-12">
                                    {{$user['time_at_addr_from']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label class="col-md-12 font-weight-bold ">Residential Status</label>
                                <div class="col-md-12">
                                    {{$user['residential_status']}}
                                </div>
                            </div>
                        </div>


                        <div class="col-3">

                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Mortgage Detail</label>
                                <div class="col-md-12">
                                    {{$user['mortgage_detail']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Agent Name</label>
                                <div class="col-md-12">
                                    {{$user['agent_name']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Agent Mobile</label>
                                <div class="col-md-12">
                                    {{$user['agent_mobile']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Rental per Month</label>
                                <div class="col-md-12">
                                    {{$user['rent_amt']}}
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>



                </div>


            </div>



            <div class="col-6">

                <div class="card mb-2" >
                    <div class="card-header theme">
                        Employment Details
                    </div>
                    <div class="card-body p-4">

                    <div class="row detail">
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Employment Status</label>
                                <div class="col-md-12">
                                    {{$user['emp_status']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Next Pay date</label>
                                <div class="col-md-12">
                                    {{$user['primary_next_pay_date']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Length of Employment</label>
                                <div class="col-md-12">
                                    {{$user['employ_start_date']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Occupation</label>
                                <div class="col-md-12">
                                    {{$user['occupation']}}
                                </div>
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Company Name</label>
                                <div class="col-md-12">
                                    {{$user['company_name']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Company Address</label>
                                <div class="col-md-12">
                                    {{$user['company_addr']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Company Phone</label>
                                <div class="col-md-12">
                                    {{$user['company_phone']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold">Income Frequency</label>
                                <div class="col-md-12">
                                    {{$user['primary_income_freq']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Benefit Pay date</label>
                                <div class="col-md-12">
                                    {{$user['unemp_next_pay_date']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold ">Do you have another job</label>
                                <div class="col-md-12">
                                    {{$user['another_job']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold "> Other Employment Status</label>
                                <div class="col-md-12">
                                    {{$user['second_emp_status']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold "> Other Next Pay date</label>
                                <div class="col-md-12">
                                    {{$user['next_pay_date']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold"> Other Company Name</label>
                                <div class="col-md-12">
                                    {{$user['another_company_name']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold"> Other Company Address</label>
                                <div class="col-md-12">
                                    {{$user['another_company_addr']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold "> Other Company Phone</label>
                                <div class="col-md-12">
                                    {{$user['another_company_phone']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold "> Other Occupation</label>
                                <div class="col-md-12">
                                    {{$user['second_occupation']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12 font-weight-bold "> Other Income Frequency</label>
                                <div class="col-md-12">
                                    {{$user['income_freq']}}
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  font-weight-bold"> Other Length of Employment</label>
                                <div class="col-md-12">
                                    {{$user['length_of_employment']}}
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
                        Application History
                    </div>
                    <div class="card-body p-4">

                    <table class="table table-striped table-hover text-center w-100">
                        <thead>
                        <thead>
                        <tr>
                            <td>
                                <p>Ref No.</p>
                            </td>
                            <td>
                                <p> Name</p>
                            </td>
                            <td>
                                <p>Mobile</p>
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
                                <p>Action</p>
                            </td>
                        </tr>
                        </thead>
                        @foreach($applications as $application)
                            <tr>
                                <td><p>{{$application['id']}}</p></td>
                                <td><p>{{$application['first_name']}} &nbsp; {{$application['last_name']}}</p></td>
                                <td><p>{{$application['phone']}}</p></td>
                                <td><p>{{$application['loan_amount']}}</p></td>
                                <td><p>{{$application['loan_period']}}</p></td>
                                <td>
                                    @if($application['result']==1)
                                        <p> Decline</p>
                                    @elseif($application['result']==2)
                                        <p>   Pending</p>
                                    @elseif($application['result']==3)
                                        <p>Accept</p>
                                    @elseif($application['result']==4)
                                        <p>Auto Decline</p>
                                    @elseif($application['result']==0)
                                        <p>Undecided</p>
                                    @endif

                                </td>
                                <td >
                                    <a href="{{ url('system/application_detail')."/".$application['id'] }}" class="btn btn-info theme_button mb-1">Details</a>
                                    <a href="{{ url('system/verify_detail')."/".$application['id'] }}" class="btn btn-info theme_button">Verify</a>
                                </td>
                            </tr>

                        @endforeach

                    </table>
                    </div>
                </div>


            </div>















        </div>

    </div>





@endsection
