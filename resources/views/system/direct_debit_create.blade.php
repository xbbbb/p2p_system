
@extends('layouts.back')

@section('content')
    @include('layouts.feedback')
    <script src="https://static.ezidebit.com.au/javascriptapi/js/ezidebit_2_0_0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#submit').click(function () {
                if($('#acc_num').val()==''){
                    if($('#card_num').val()==''){
                        alert('please enter information');
                    }
                    else{

                    }
                }
                else{
                    eziDebit.init("53ABF833-B060-4D1A-A9AF-0641B1FFBBFE", {
                        submitAction: "SaveCustomerAccount",
                        submitButton: "submit",
                        submitCallback: function (data) {
                           if(data['ErrorMessage']==null){
                               alert('success')
                           }

                        },
                        submitError: function (data) {
                            alert("Error")
                        },
                        customerReference: "ref",
                        customerReference: "ref",
                        customerLastName: "last_name",
                        customerFirstName: "first_name", // If no first name is provided the customerLastName is assumed to be the Company Name
                        customerAddress1: "address1",
                        customerAddress2: "address2",
                        customerSuburb: "suburb",
                        customerState: "state",
                        customerPostcode: "postcode",
                        customerEmail: "email",
                        customerMobile: "mobile",
                        accountName: "acc_name",
                        accountBSB: "bsb",
                        accountNumber: "acc_num"
                    }, "https://api.ezidebit.com.au/V3-5/public-rest");
                }


            })



        })

    </script>
    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-12">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        User Details
                    </div>

                    <div class="card-body p-4">

                    <div class="row">

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  text-md-left font-weight-bold">First Name</label>
                                <div class="col-md-12 text-md-left">
                                    <input class="form-control w-100" type="hidden" value="{{$application['user_id']}}" id="ref">
                                    <input class="form-control w-100" value="{{$application['first_name']}}" id="first_name">
                                </div>
                            </div>
                        </div>



                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12  text-md-left font-weight-bold">Last Name</label>
                                <div class="col-md-12 text-md-left">
                                    <input class="form-control w-100" value="{{$application['last_name']}}" id="last_name">
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Mobile Phone</label>
                                <div class="col-md-12">
                                    <input class="form-control w-100" value="{{$application['mobile']}}" id="mobile">
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Account Name</label>
                                <div class="col-md-12">
                                    <input class="form-control w-100" id="acc_name">
                                </div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">Account Number</label>
                                <div class="col-md-12">
                                    <input class="form-control w-100" id="acc_num">
                                </div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group row">
                                <label  class="col-md-12   font-weight-bold">BSB</label>
                                <div class="col-md-12">
                                    <input class="form-control w-100" id="bsb">
                                </div>
                            </div>
                        </div>
                        <div class="col-4 offset-4">
                            <button class="btn-info btn w-100 theme_button" id="submit" name="submit">Submit</button>
                        </div>
                    </div>
                    </div>
                </div>


            </div>
        </div>




















@endsection
