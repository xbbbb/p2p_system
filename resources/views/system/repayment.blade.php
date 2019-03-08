
@extends('layouts.back')

@section('content')
    @include('layouts.feedback')
    <script>
        $(document).ready(function(){
            $(".change").click(function(){
                var   id = $(this).siblings('.repay-id').val();
                var value=$('.repay-value-'+id).val();
                var paid=$('.repay-paid-'+id).val();
                var note=$('.repay-note-'+id).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/system/change_repayments",
                    type:"post",
                    dataType:"json",
                    data:{
                        id: id,
                        value:value,
                        paid:paid,
                        note:note
                    },
                    timeout:30000,
                    success:function(data){

                        alert("Change Successfully");

                    }
                });

            })
        })

    </script>

    <div class="container-fluid mt-2 mb-5 system"  >


            <div class="row mb-3">
                <div class="col-12">
                    <h4> Repayment History</h4>

                    <div class="card p-4 mb-2" style="background-color: #E5E5E5">
                        <table class="table table-striped table-hover text-center w-100">
                            <thead>
                            <tr>

                                <td>
                                    <h4>Due Date</h4>
                                </td>
                                <td>
                                    <h4>Amount</h4>
                                </td>
                                <td>
                                    <h4>Paid Amount</h4>
                                </td>
                                <td>
                                    <h4>Note</h4>
                                </td>

                                <td>
                                    <h4>Action</h4>
                                </td>

                            </tr>
                            </thead>
                            @foreach($repayments as $repayment)
                                <tr>
                                    <td><p>{{$repayment['due']}}</p> </td>
                                    <td><input class="form-control  {{'repay-value-'.$repayment['id']}}" type="text" value="{{$repayment['amount']}}"></td>
                                    <td> <input class="form-control  {{'repay-paid-'.$repayment['id']}}" type="text" value="{{$repayment['paid_amount']}}"></td>
                                    <td><input class="form-control repay-note {{'repay-note-'.$repayment['id']}}" type="text " value="{{$repayment['note']}}"></td>
                                    <td>                                <input type="hidden" value="{{$repayment['id']}}" class="repay-id">
                                        <button class="btn btn-info change">Change</button></td>


                                </tr>


                            @endforeach

                        </table>
                    </div>


                </div>


            </div>






        </div>














@endsection




