
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @include('backend.feedback_tab')
    </div>


    <div class="container-fluid mt-2 mb-5" style="background-color: white">

            <div class="card">

                <div class="card-footer">

                    <form method="post" action="{{ action('FeedbackController@update',$id)}}" enctype="multipart/form-data">
                        @csrf


                        <input name="_method" type="hidden" value="PATCH">


                        <div class="form-group row"><label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="  {{$feedback['name']}}">
                            </div>
                        </div>

                        <div class="form-group row"><label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                            <div class="col-md-6">
                                <input id="Content" type="text" class="form-control{{ $errors->has('Content') ? ' is-invalid' : '' }}" name="Content" value="  {{$feedback['content']}}">
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
                </div>
            </div>

    </div>

@endsection
