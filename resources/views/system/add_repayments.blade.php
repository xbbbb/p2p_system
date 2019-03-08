
@extends('layouts.back')

@section('content')
    @include('layouts.feedback')

    <div class="container-fluid mt-2 mb-5 system"  >

        <div class="row mb-3">
            <div class="col-12">

                <div class="card mb-2 pl-0 pr-0" >
                    <form method="post" action="{{ url('/system/repayments_create/')}}" enctype="multipart/form-data">
                     <div class="card-header theme">
                            Repayment Details
                     </div>
                     <div class="card-body p-4">
                         <div class="row">

                             @csrf
                             <div class="col-3">
                                 <div class="form-group row">
                                     <label  class="col-md-12  text-md-left font-weight-bold">Debit Date
                                     </label>
                                     <div class="col-md-12 text-md-left">
                                         <input class="form-control w-100" type="hidden" value="{{$application['id']}}" name="app_id">
                                         <input class="form-control w-100" type="date" value="" name="debit_date">
                                     </div>
                                 </div>
                             </div>



                             <div class="col-3">
                                 <div class="form-group row">
                                     <label  class="col-md-12  text-md-left font-weight-bold">Amount</label>
                                     <div class="col-md-12 text-md-left">
                                         <input class="form-control w-100" type="number" value="" name="amount">
                                     </div>
                                 </div>
                             </div>

                             <div class="col-3">
                                 <div class="form-group row">
                                     <label  class="col-md-12  text-md-left font-weight-bold">Note</label>
                                     <div class="col-md-12 text-md-left">
                                         <input class="form-control w-100" type="text" value="" name="note">
                                     </div>
                                 </div>
                             </div>

                             <div class="col-4 offset-4">
                                 <button class="btn-info btn w-100 theme_button" id="submit" name="submit">Submit</button>
                             </div>

                         </div>
                     </div>

                    </form>

                </div>


            </div>
        </div>
    </div>



















@endsection
