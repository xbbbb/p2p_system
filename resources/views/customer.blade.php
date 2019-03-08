
@extends('layouts.front_system')

@section('content')

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">

            <div class="col-12 mt-4">
                <div class="card  mb-2" >

                    <div class="card-header theme">
                        Recent Repayments
                    </div>
                    <div class="card-body p-4">

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





                        </tr>
                        </thead>
                        @foreach($repayments as $repayment)
                            <tr>
                                <td><p>{{$repayment['due']}}</p> </td>
                                <td>{{$repayment['amount']}}</td>
                                <td> {{$repayment['paid_amount']}}</td>

                            </tr>


                        @endforeach

                    </table>
                    </div>
                </div>
            </div>















        </div>

    </div>





@endsection
