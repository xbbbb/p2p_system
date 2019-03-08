
@extends('layouts.back')

@section('content')
    <script>
        $(document).ready(function () {
            $('#status').change(function () {
                location.replace("{{url("system/application_status")}}"+"/"+$('#status').val())
            })
        })

    </script>

    <div class="container-fluid mt-2 mb-5 system"  >
        <form action="{{action('SystemController@application_search')}}" method="post" accept-charset="utf-8">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12 mb-2">
                    <div class="row">
                        <div class="col-11">
                            <input class="w-100 form-control" name="Content">
                        </div>
                        <div class="col-1">
                            <button type="submit "  class="btn btn-info theme_button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mb-3">


            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Application List
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-striped table-hover text-center w-100">
                            <thead>
                            <tr>
                                <td>
                                    <h6>Ref No.</h6>
                                </td>
                                <td>
                                    <h6>First Name</h6>
                                </td>
                                <td>
                                    <h6>Last Name</h6>
                                </td>
                                <td>
                                    <h6>Mobile</h6>
                                </td>
                                <td>
                                    <h6>Date</h6>
                                </td>
                                <td>
                                    <h6>Borrowed Amount</h6>
                                </td>
                                <td>
                                    <h6>Period</h6>
                                </td>
                                <td>
                                    <h6><select class=" w-100" id="status" >
                                            <option value="">Status</option>
                                            <option value="0" >Wait for CS</option>
                                            <option value="1" >Decline</option>
                                            <option value="2" >Pending</option>
                                            <option value="3" >Approved</option>
                                            <option value="4" >Auto Decline</option>
                                        </select></h6>
                                </td>
                                <td>
                                    <h6>Action</h6>
                                </td>
                            </tr>
                            </thead>
                            @foreach($applications as $application)
                                <tr>
                                    <td><p>{{$application['id']}}</p></td>
                                    <td><p>{{$application['first_name']}}</p></td>
                                    <td><p>{{$application['last_name']}}</p></td>
                                    <td><p>{{$application['mobile']}}</p></td>
                                    <td><p>{{$application['created_at']}}</p></td>
                                    <td><p> @if($application['loan_amount'])
                                                $ {{$application['loan_amount']}}
                                            @else
                                                $ {{$application['loan_amount_MACC']}}
                                            @endif</p></td>
                                    <td><p> @if($application['loan_period'])
                                                {{$application['loan_period']}}
                                            @else
                                                {{$application['loan_period_MACC']}}
                                            @endif</p></td>
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
                                        <a href="{{ url('system/application_detail')."/".$application['id'] }}" class="btn btn-info theme_button">Details</a>
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
