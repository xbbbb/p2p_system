
@extends('layouts.back')

@section('content')
    @include('layouts.feedback')

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-12">

                <div class="card p-2 mb-2" style="background-color: #E5E5E5">
                    <div class="card-header theme">
                        Edit Repayment
                    </div>

                    <div class="card-body p-4">

                    <form method="post" action="{{ url('/system/change_repayment/')}}" enctype="multipart/form-data">

                    <div class="row">

                            @csrf

                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">Original Date
                                    </label>
                                    <div class="col-md-12 text-md-left">
                                        <input type="hidden" name="repayment_id" value="{{$repayment['id']}}">
                                        <input class="form-control w-100" type="text" value="{{$repayment['due']}}" name="original_date" readonly>
                                    </div>
                                </div>
                            </div>




                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">Debit Date
                                    </label>
                                    <div class="col-md-12 text-md-left">
                                        <input class="form-control w-100" type="date" value="" name="debit_date">
                                    </div>
                                </div>
                            </div>



                            <div class="col-3">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">Amount</label>
                                    <div class="col-md-12 text-md-left">
                                        <input class="form-control w-100" type="text" value="" name="amount">
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 offset-4">
                                <button class="btn-info btn w-100 theme_button" id="submit" name="submit">Submit</button>
                            </div>

                    </div>
                    </form>
                    </div>

                </div>


            </div>
        </div>




















@endsection
