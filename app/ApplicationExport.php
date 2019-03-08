<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ApplicationExport implements FromCollection,WithHeadings, WithStrictNullComparison
{
    public function collection()
    {
        if(Session::has('start_time')){
            if(Session::get("result")!=5){
                $applications= Application::whereDate('created_at',">=", Session::get("start_time"))->whereDate('created_at',"<=" , Session::get("end_time"))->where("result","=",Session::get("result"))->get();

            }
            else{
                $applications=Application::whereDate('created_at',">=", Session::get("start_time"))->whereDate('created_at',"<=" , Session::get("end_time"))->get();
            }
            return $applications;
        }
        else{
            return Application::all();
        }

    }

    public function headings(): array
    {
        $result=Application::all();
       $header= array_keys( json_decode(json_encode($result->first()),true));
        return $header;
    }
}
