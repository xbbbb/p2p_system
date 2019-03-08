
@extends('layouts.back')

@section('content')

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-12">

                <div class="card  mb-2" >
                    <div class="card-header theme">
                        Add black-list
                    </div>

                    <div class="card-body p-4">

                        <form method="post" action="{{ action('BlacklistController@store')}}" enctype="multipart/form-data">

                            <div class="row">
                                @csrf

                                <div class="col-4 offset-4">
                                    <div class="form-group row">
                                        <label  class="col-md-12  text-md-left font-weight-bold">Name</label>
                                        <div class="col-md-12 text-md-left">
                                            <input class="form-control w-100" type="text" value="" name="name">
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
    </div>





@endsection
