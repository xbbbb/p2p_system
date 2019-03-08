<?php

namespace App\Http\Controllers;

use App\Application;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    public function store(Request $request){
        $task=new Task();
        $task->content=$request->Content;
       // $task->date=$request->date;
        $task->application_id=$request->application_id;
        $task->type=$request->type;
        $task->complete=$request->complete;
        if($request->has('date')){
            $task->date=$request->date;
        }
        if($request->has('type')){
            $task->type=$request->type;
        }


        if($request->has('attachment_1') && $file = $request->file('attachment_1')){
            if ($file->isValid()) {
                $img_path = $file->store('attachment');
                $task->attachment_1=$img_path;
            }
        }

        if($request->has('attachment_2') && $file = $request->file('attachment_2')){
            if ($file->isValid()) {
                $img_path = $file->store('attachment');
                $task->attachment_2=$img_path;
            }
        }

        if($request->has('attachment_3') && $file = $request->file('attachment_3')){
            if ($file->isValid()) {
                $img_path = $file->store('attachment');
                $task->attachment_3=$img_path;
            }
        }

        $task->save();
        return redirect()->back() ->with('success',"Task updated");
    }

    public function task_schedule(){
        $date=new Carbon();
        $start=$date->subDays(7)->toDateString();
        $end=$date->addDays(14)->toDateString();
        $tasks=Task::where('date','>',$start)->where('date','<',$end)->get();
        Log::debug($tasks);
    }




    public function get_task_by_date(){
        $tasks=Task::where('date',$_POST['date'])->get();
        foreach ($tasks as $task){
            $application=Application::find($task['application_id']);
            $task["user_name"]=$application->first_name;
        }
        return response()->json($tasks,200);
    }




}
