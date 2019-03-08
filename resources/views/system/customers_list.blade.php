
@extends('layouts.back')

@section('content')

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">
                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Users List
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-striped table-hover text-center w-100">
                            <thead>
                            <tr>
                                <td>
                                    <h6>Customer ID.</h6>
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
                                    <h6>Email</h6>
                                </td>
                                <td>
                                    <h6>Action</h6>
                                </td>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td><p>{{$user['id']}}</p></td>
                                    <td><p>{{$user['first_name']}}</p></td>
                                    <td><p>{{$user['last_name']}}</p></td>
                                    <td><p>{{$user['phone']}}</p></td>
                                    <td><p>{{$user['email']}}</p></td>
                                    <td >
                                        <a href="{{ url('system/customer_detail')."/".$user['id'] }}" class="btn btn-info theme_button">Details</a>
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
