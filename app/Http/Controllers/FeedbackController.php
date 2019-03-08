<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('backend.feedback_create',compact("content"));
    }
    public function index()
    {
        $feedbacks=Feedback::all();
        return view('backend.feedback_index',compact("feedbacks"));
    }

    public function edit($id)
    {
        $feedback=Feedback::find($id);
        return view('backend.feedback_edit',compact("feedback","id"));
    }

    public function update( Request $request,$id)
    {
        $feedback=Feedback::find($id);
        $feedback->name=$request->name;
        $feedback->content=$request->Content;
        $feedback->save();
        return redirect(action('FeedbackController@index'))->with('success',"Feedback submitted");
    }

    public function store(Request $request)
    {
        $feedback=new Feedback();
        $feedback->name=$request->name;
        $feedback->content=$request->Content;
        $feedback->save();
        return redirect(action('FeedbackController@index'))->with('success',"Feedback submitted");

    }

}
