@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            @include('backend.feedback_tab')
        </div>
        <hr>
        @include('layouts.feedback')
        <table class="table table-bordered table-hover text-center">
            <thead>
            <tr>
                <td>
                    <h3>ID</h3>
                </td>
                <td>
                    <h3>Name</h3>
                </td>
                <td>
                    <h3>Feedback</h3>
                </td>
                <td>
                    <h3>Action</h3>
                </td>

            </tr>
            </thead>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td><h4>{{$feedback['id']}}</h4></td>
                    <td><h4>{{$feedback['name']}}</h4></td>
                    <td><h4>{{$feedback['content']}}</h4></td>
                    <td>
                        <div class="btn-group-vertical d-flex">

                            <a href="{{action('FeedbackController@edit',$feedback['id'])}}" class="btn btn-info">编辑</a>                        </div>
                    </td>
                </tr>

            @endforeach

        </table>
    </div>

@endsection
