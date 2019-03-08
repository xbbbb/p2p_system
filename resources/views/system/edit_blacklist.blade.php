
@extends('layouts.back')

@section('content')

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-12">

                <div class="card p-2 mb-2" style="background-color: #E5E5E5">

                    <div class="card-header theme">
                        Edit black-list
                    </div>
                    <div class="card-body p-4">

                    <form method="post" action="{{ action('BlacklistController@update',$id)}}" enctype="multipart/form-data">

                        <input name="_method" type="hidden" value="PATCH">

                        <div class="row">
                            @csrf
                            <div class="col-4 offset-4">
                                <div class="form-group row">
                                    <label  class="col-md-12  text-md-left font-weight-bold">Name</label>
                                    <div class="col-md-12 text-md-left">
                                        <input class="form-control w-100" type="text"  name="name" value="{{$blacklist["name"]}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 offset-4">
                                <button class="btn-info btn w-100 theme_button" id="submit" name="submit ">Submit</button>
                            </div>

                        </div>
                    </form>
                    </div>

                </div>


            </div>
        </div>
    </div>





@endsection
