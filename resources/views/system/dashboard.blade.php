
@extends('layouts.back')

@section('content')
    @include('layouts.feedback')
    <script>
        $(document).ready(function () {
            $('#my-calendar').datetimepicker({
                onDateChange: function() {
                    var   dateValue = this.getText();
                    var dateTemp1=new Date(dateValue)
                    var timez_zone_offset=(new Date()).getTimezoneOffset() * 60000;
                    var dateTemp2=new Date(dateTemp1-timez_zone_offset);
                    var date=dateTemp2.toISOString().slice(0,10);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"/system/get_task_by_date",
                        type:"post",
                        dataType:"json",
                        data:{
                            date:date
                        },
                        timeout:30000,
                        success:function(data){
                            $("#to-do").empty();
                            var count=data.length
                            var i=0;
                            var content='';
                            for(i=0;i<count;i++){
                                content+='<div class="row mb-5">' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold"> Created Date</div>' +
                                    '                                <div>'+data[i].created_at+'</div>' +
                                    '                            </div>' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold"> Action Date</div>' +
                                    '                                <div>'+data[i].date+'</div>' +
                                    '                            </div>' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold">Cusomter Name</div>' +
                                    '                                <div>'+data[i].user_name+'</div>' +
                                    '                            </div>' +
                                    '                            <div class="col-4">' +
                                    '                                <div class="font-weight-bold"> Application ID</div>' +
                                    '                                <div><a href="{{url("/system/application_detail")}}'+'/'+data[i].application_id+'">'+data[i].application_id+'</a></div>' +
                                    '                            </div>'
                                    if(data[i].attachment_1!=null){
                                        content+= '                            <div class="col-4">' +
                                            '                                <div class="font-weight-bold"> Attachment-1</div>' +
                                            '                                <div><a href="{{url("/storage")}}'+'/'+data[i].attachment_1+'">'+'Attachment-1'+'</a></div>' +
                                            '                            </div>'
                                    }
                                if(data[i].attachment_2!=null){
                                    content+= '                            <div class="col-4">' +
                                        '                                <div class="font-weight-bold"> Attachment-2</div>' +
                                        '                                <div><a href="{{url("/storage")}}'+'/'+data[i].attachment_2+'">'+'Attachment-2'+'</a></div>' +
                                        '                            </div>'
                                }
                                if(data[i].attachment_3!=null){
                                    content+= '                            <div class="col-4">' +
                                        '                                <div class="font-weight-bold"> Attachment-3</div>' +
                                        '                                <div><a href="{{url("/storage")}}'+'/'+data[i].attachment_3+'">'+'Attachment-3'+'</a></div>' +
                                        '                            </div>'
                                }
                                content+='                            <div class="col-12">' +
                                    '                                <div class="font-weight-bold"> Content</div>' +
                                    '                                <div>'+data[i].content+'</div>' +
                                    '                            </div>'
                                    content+='</div>'

                            }

                            $("#to-do").append(content);
                        }
                    });
                }
            });


        });


    </script>
    <div class="container-fluid mt-2 mb-5 system"  >
      <!--  <div class="row mb-3">
            <div class="col-3">
                <div class="w-100 card p-2">
                    <h4 class="text-center">NEw App</h4>
                    <p class="text-center">$1000000</p>
                </div>

            </div>
            <div class="col-3">
                <div class="w-100 card p-2">
                    <h4 class="text-center">Pending App</h4>
                    <p class="text-center">$1000000</p>

                </div>

            </div>
            <div class="col-3">
                <div class="w-100 card p-2">
                    <h4 class="text-center">Total Loan</h4>
                    <p class="text-center">$1000000</p>


                </div>

            </div>
            <div class="col-3">
                <div class="w-100 card p-2">
                    <h4 class="text-center">Collection</h4>
                    <p class="text-center">$1000000</p>

                </div>

            </div>

        </div>-->

        <div class="row mb-3">


            <div class="col-6">
                <div class="card  mb-2"  >
                    <div class="card-header theme">
                        Recent Applications
                    </div>

                    <div class="card-body p-4 " style="height: 900px; overflow-y: scroll">
                    <table class="table table-striped table-hover text-center w-100">
                        <thead>
                        <tr>
                            <td>
                                <h6>Ref No.</h6>
                            </td>
                            <td>
                                <h6>Name</h6>
                            </td>

                            <td>
                                <h6>Mobile</h6>
                            </td>

                            <td>
                                <h6>Borrowed Amount</h6>
                            </td>
                            <td>
                                <h6>Applied Time</h6>
                            </td>
                            <td>
                                <h6>Status</h6>
                            </td>
                            <td>
                                <h6>Action</h6>
                            </td>
                        </tr>
                        </thead>
                        @foreach($apps_pending as $application)
                            <tr>
                                <td><p>{{$application['id']}}</p></td>
                                <td><p>{{$application['first_name']}}</p></td>
                                <td><p>{{$application['mobile']}}</p></td>
                                <td><p>{{$application['loan_amount']}}</p></td>
                                <td><p>{{$application['created_at']}}</p></td>
                                <td>
                                    @if($application['result']==1)
                                        <p> Decline</p>
                                    @elseif($application['result']==2)
                                        <p>   Pending</p>
                                    @elseif($application['result']==3)
                                        <p>Accept</p>
                                    @elseif($application['result']==4)
                                        <p>Auto Decline</p>
                                    @elseif($application['result']==0)
                                        <p>Undecided</p>
                                    @endif
                                </td>
                                <td >
                                    <a href="{{ url('system/verify_detail')."/".$application['id'] }}" class="btn btn-info theme_button">Verify</a>
                                </td>
                            </tr>

                        @endforeach

                    </table>
                    </div>



                </div>

            </div>
            <div class="col-6">

                <div class="card  mb-2"  >
                    <div class="card-header theme">
                        To Do List
                    </div>
                    <div class="card-body p-4 " >
                        <div class="ml-2 mb-5 mt-4" id="my-calendar">

                        </div>

                    <div id="to-do">


                    @foreach($tasks as $task)
                        <div class="row mb-5">
                            <div class="col-4">
                                <div class="font-weight-bold"> Created Date</div>
                                <div>{{$task["created_at"]}}</div>
                            </div>
                            <div class="col-4">
                                <div class="font-weight-bold"> Action Date</div>
                                <div>{{$task["date"]}}</div>
                            </div>
                            <div class="col-4">
                                <div class="font-weight-bold">Cusomter Name</div>
                                <div>{{$task["user_name"]}}</div>
                            </div>
                            <div class="col-4">
                                <div class="font-weight-bold"> Application ID</div>
                                <div><a href="{{url("/system/application_detail")."/".$task['application_id']}}">{{$task["application_id"]}}</a></div>
                            </div>
                            @if($task['attachment_1']!="")
                            <div class="col-4">
                                <div class="font-weight-bold"> Attachment 1</div>
                                <div><a href="{{url("/storage")."/".$task['attachment_1']}}">Attachment-1</a></div>

                            </div>
                            @endif

                            @if($task['attachment_2']!="")
                            <div class="col-4">
                                <div class="font-weight-bold"> Attachment 2</div>
                                    <div><a href="{{url("/storage")."/".$task['attachment_2']}}">Attachment-2</a></div>
                            </div>
                            @endif

                            @if($task['attachment_3']!="")
                            <div class="col-4">
                                <div class="font-weight-bold"> Attachment 3</div>
                                    <div><a href="{{url("/storage")."/".$task['attachment_3']}}">Attachment-3</a></div>
                            </div>
                            @endif
                            <div class="col-12">
                                <div class="font-weight-bold"> Content</div>
                                <div>{{$task["content"]}}</div>

                            </div>
                            </div>
                    @endforeach
                    </div>


                    </div>


                </div>


            </div>


            <div class="col-6 ">
                <div class="card  mb-2" >
                    <div class="card-header theme" >
                        Recent Repayment
                    </div>
                    <div class="card-body p-4 " style="height: 900px; overflow-y: scroll">
                    <table class="table table-striped table-hover text-center w-100">
                        <thead>
                        <tr>

                            <td>
                                <h6>Due Date</h6>
                            </td>
                            <td>
                                <h6>Application ID</h6>
                            </td>
                            <td>
                                <h6>Amount</h6>
                            </td>
                            <td>
                                <h6>Paid Amount</h6>
                            </td>
                            <td>
                                <h6>
                                    Notes
                                </h6>
                            </td>




                        </tr>
                        </thead>
                        @foreach($repayments as $repayment)
                            <tr>
                                <td><p>{{$repayment['due']}}</p> </td>
                                <td><a href="{{url("/system/application_detail")."/".$repayment['application_id']}}">{{$repayment['application_id']}}</a></td>

                                <td>{{$repayment['amount']}}</td>
                                <td> {{$repayment['paid_amount']}}</td>
                                <td> {{$repayment['note']}}</td>



                            </tr>


                        @endforeach

                    </table>
                    </div>
                </div>


            </div>
        </div>





    </div>





@endsection
