
@extends('layouts.front_system')

@section('content')

    <div class="container-fluid mt-2 mb-5 system"  >
        <form method="post" action="{{ action("VisitorController@upload_id") }}" enctype="multipart/form-data">

        @csrf
        <div class="row mb-3">


            <div class="col-sm-12">

                <div class=" p-2 mb-2 text-center" style="">
                    <div class="row">
                        <div class="col-12">
                            <div class="card  mb-2" >
                                <div class="card-header theme">
                                   Documents
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group row">

                                        <div class="col-md-3">
                                            <button onclick=" window.open( '{{ url('storage')."/".$user['id_img'] }}')" class="btn btn-info theme_button w-100"  {{$user['id_img']=="" ? 'disabled' : ''}}>ID Image</button>
                                            <div class="w-100 mb-3 pl-2 pr-2 mt-1 ">
                                                <input id="id_img" type="file" class="form-control{{ $errors->has('id_img') ? ' is-invalid' : '' }}" name="id_img" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button onclick=" window.open( '{{ url('storage')."/".$user['car_photo'] }}')" class="btn btn-info theme_button w-100"  {{$user['car_photo']=="" ? 'disabled' : ''}}>Car photo</button>
                                            <div class="w-100 mb-3 mt-1">
                                                <input id="car_photo" type="file" class="form-control{{ $errors->has('car_photo') ? ' is-invalid' : '' }}" name="car_photo" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <button onclick=" window.open( '{{ url('storage')."/".$user['certification'] }}')" class="btn btn-info theme_button w-100"  {{$user['certification']=="" ? 'disabled' : ''}}>Certification</button>
                                            <div class="w-100 mb-3 mt-1">
                                                <input id="certification" type="file" class="form-control{{ $errors->has('certification') ? ' is-invalid' : '' }}" name="certification" >

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <button onclick=" window.open( '{{ url('storage')."/".$user['doc_with_address'] }}')" class="btn btn-info theme_button w-100"  {{$user['doc_with_address']=="" ? 'disabled' : ''}}>Doc with address</button>

                                            <div class="w-100 mb-3 mt-1">
                                                <input id="doc_with_address" type="file" class="form-control{{ $errors->has('doc_with_address') ? ' is-invalid' : '' }}" name="doc_with_address" >

                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <button onclick=" window.open( '{{ url('storage')."/".$user['plate'] }}')" class="btn btn-info theme_button w-100"  {{$user['plate']=="" ? 'disabled' : ''}}>Plate Photo</button>
                                            <div class="w-100 mb-3 pl-2 pr-2 mt-1 ">
                                                <input id="plate" type="file" class="form-control{{ $errors->has('plate') ? ' is-invalid' : '' }}" name="plate" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button onclick=" window.open( '{{ url('storage')."/".$user['engine'] }}')" class="btn btn-info theme_button w-100"  {{$user['engine']=="" ? 'disabled' : ''}}>Engine Number Photo</button>
                                            <div class="w-100 mb-3 mt-1">
                                                <input id="engine" type="file" class="form-control{{ $errors->has('engine') ? ' is-invalid' : '' }}" name="engine" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <button onclick=" window.open( '{{ url('storage')."/".$user['payslip'] }}')" class="btn btn-info theme_button w-100"  {{$user['payslip']=="" ? 'disabled' : ''}}>Payslip</button>
                                            <div class="w-100 mb-3 mt-1">
                                                <input id="payslip" type="file" class="form-control{{ $errors->has('payslip') ? ' is-invalid' : '' }}" name="payslip" >

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <button onclick=" window.open( '{{ url('storage')."/".$user['insurance'] }}')" class="btn btn-info theme_button w-100"  {{$user['insurance']=="" ? 'disabled' : ''}}>Insurance</button>

                                            <div class="w-100 mb-3 mt-1">
                                                <input id="insurance" type="file" class="form-control{{ $errors->has('insurance') ? ' is-invalid' : '' }}" name="insurance" >

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>






                </div>


            </div>



















        </div>
            <button class="btn theme_button" type="submit">Submit</button>
        </form>

    </div>





@endsection
