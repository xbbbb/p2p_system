@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            @include('backend.application_tab')
        </div>
        <form method="post" action="{{ action("ApplicationController@filterApplication") }}" enctype="multipart/form-data" class="mt-3">
            {{ csrf_field() }}
            <div class="form-group row"><label for="start_time" class="col-md-4 col-form-label text-md-right">Start Time</label>
                <div class="col-md-6">
                    <input id="start_time" type="date" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" required >
                </div>
            </div>

            <div class="form-group row"><label for="end_time" class="col-md-4 col-form-label text-md-right">End Time</label>
                <div class="col-md-6">
                    <input id="end_time" type="date" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time"  required>
                </div>
            </div>



            <div class="form-group row"><label for="cate_id" class="col-md-4 col-form-label text-md-right">Result</label>
                <div class="col-md-6">
                    <select id="result" name="result" class="form-control{{ $errors->has('result') ? ' is-invalid' : '' }}" required>
                        <option value="">--Select--</option>
                        <option value="0" >Wait for CS</option>
                        <option value="1" >Decline</option>
                        <option value="2">Pending</option>
                        <option value="3">Approved</option>
                        <option value="4" >Auto Decline</option>
                        <option value="5">All</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        submit
                    </button>
                </div>
            </div>
        </form>
        <hr>
        @include('layouts.feedback')
        <table class="table table-bordered table-hover text-center">
            <thead>
            <tr>
                <td>
                    <h3>Ref No.</h3>
                </td>
                <td>
                    <h3>First Name</h3>
                </td>
                <td>
                    <h3>Last Name</h3>
                </td>
                <td>
                    <h3>Mobile</h3>
                </td>
                <td>
                    <h3>Email</h3>
                </td>
                <td>
                    <h3>Borrowed Amount</h3>
                </td>
                <td>
                    <h3>Period</h3>
                </td>
                <td>
                    <h3>Status</h3>
                </td>
                <td>
                    <h3>Action</h3>
                </td>
            </tr>
            </thead>
            @foreach($applications as $application)
                <tr>
                    <td><h4>{{$application['id']}}</h4></td>
                    <td><h4>{{$application['first_name']}}</h4></td>
                    <td><h4>{{$application['last_name']}}</h4></td>
                    <td><h4>{{$application['phone']}}</h4></td>
                    <td><h4>{{$application['email']}}</h4></td>
                    <td><h4>{{$application['loan_amount']}}</h4></td>
                    <td><h4>{{$application['loan_period']}}</h4></td>
                    <td>
                            @if($application['result']==1)
                            <h4> Decline</h4>
                                @elseif($application['result']==2)
                             <h4>   Pending</h4>
                                @elseif($application['result']==3)
                              <h4>Accept</h4>
                        @elseif($application['result']==4)
                            <h4>Auto Decline</h4>
                                @endif

                        </td>
                    <td>
                        <div class="btn-group-vertical d-flex">
                            <a href="{{ url('/application/detail/')."/".$application['id'] }}" class="btn btn-info">details</a>
                        </div>
                    </td>
                </tr>

            @endforeach

        </table>
    </div>

@endsection
