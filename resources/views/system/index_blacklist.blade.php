
@extends('layouts.back')

@section('content')

    <div class="container-fluid mt-2 mb-5 system"  >


        <div class="row mb-3">
            <div class="col-4 offset-4">
                <a href="{{ action('BlacklistController@create') }}" class="btn btn-info w-100 mb-1 theme_button">Add</a>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">


                <table class="table table-striped table-hover text-center w-100">
                    <thead>
                    <tr>
                        <td>
                            <h4>Ref No.</h4>
                        </td>
                        <td>
                            <h4>Name</h4>
                        </td>

                        <td>
                            <h4>Action</h4>
                        </td>
                    </tr>
                    </thead>
                    @foreach($blacklists as $blacklist)
                        <tr>
                            <td><p>{{$blacklist['id']}}</p></td>
                            <td><p>{{$blacklist['name']}}</p></td>
                            <td >
                                <a href="{{ action('BlacklistController@edit',$blacklist['id']) }}" class="btn btn-info theme_button">Edit</a>
                            </td>
                        </tr>

                    @endforeach

                </table>


            </div>




        </div>









    </div>





@endsection
