
@extends('layouts.app')

@section('content')



    @include('backend.application_tab')

    <div class="container-fluid mt-2 mb-5" style="background-color: white">

            <div class="card">

                <div class="card-footer">




















                    <form method="post" action="{{ action("ContentController@store") }}" enctype="multipart/form-data">
                        @csrf

                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group row"><label class="col-md-4 col-form-label text-md-right">Content 1</label>
                            <div class="col-md-6">
                                <input id="content1" type="text" class="form-control{{ $errors->has('content1') ? ' is-invalid' : '' }}" name="content1" value="{{ $content->content1 }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 2</label>
                            <div class="col-md-6">
                                <input id="content2" type="text" class="form-control{{ $errors->has('content2') ? ' is-invalid' : '' }}" name="content2" value="{{ $content->content2 }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-md-4 col-form-label text-md-right">Content 3</label>
                            <div class="col-md-6">
                                <input id="content3" type="text" class="form-control{{ $errors->has('content3') ? ' is-invalid' : '' }}" name="content3" value="{{ $content->content3  }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 4</label>
                            <div class="col-md-6">
                                <input id="content4" type="text" class="form-control{{ $errors->has('content4') ? ' is-invalid' : '' }}" name="content4" value="{{ $content->content4  }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 5</label>
                            <div class="col-md-6">
                                <input id="content5" type="text" class="form-control{{ $errors->has('content5') ? ' is-invalid' : '' }}" name="content5" value="{{ $content->content5  }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 6</label>
                            <div class="col-md-6">
                                <input id="content6" type="text" class="form-control{{ $errors->has('content6') ? ' is-invalid' : '' }}" name="content6" value="{{ $content->content6  }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 7</label>
                            <div class="col-md-6">
                                <input id="content7" type="text" class="form-control{{ $errors->has('content7') ? ' is-invalid' : '' }}" name="content7" value="{{ $content->content7 }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 8</label>
                            <div class="col-md-6">
                                <input id="content8" type="text" class="form-control{{ $errors->has('content8') ? ' is-invalid' : '' }}" name="content8" value="{{ $content->content8  }}" >
                            </div>
                        </div>



                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 9</label>
                            <div class="col-md-6">
                                <input id="content9" type="text" class="form-control{{ $errors->has('content9') ? ' is-invalid' : '' }}" name="content9" value="{{ $content->content9  }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 10</label>
                            <div class="col-md-6">
                                <input id="content10" type="text" class="form-control{{ $errors->has('content10') ? ' is-invalid' : '' }}" name="content10" value="{{ $content->content10  }}" >
                            </div>
                        </div>

                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 11</label>
                            <div class="col-md-6">
                                <input id="content11" type="text" class="form-control{{ $errors->has('content11') ? ' is-invalid' : '' }}" name="content11" value="{{ $content->content11  }}" >
                            </div>
                        </div>
                        <div class="form-group row"><label  class="col-md-4 col-form-label text-md-right">Content 12</label>
                            <div class="col-md-6">
                                <input id="content12" type="text" class="form-control{{ $errors->has('content12') ? ' is-invalid' : '' }}" name="content12" value="{{ $content->content12  }}" >
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
