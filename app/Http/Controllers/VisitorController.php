<?php

namespace App\Http\Controllers;

use App\Application;
use App\Feedback;
use App\Repayment;
use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mail;

class VisitorController extends Controller
{
    public function faq(){
        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| FAQ";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Want to access fast cash loans? Check out our FAQ for more info.";
        return view('faq',compact("title","des"));
    }

    public function main(){
        $title="Fast Cash Loans up to $2,000 Approved
Online | Mycashonline| Australia";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Only 5 minutes to apply for up to $2,000. Apply now and get your
fast loan today.";
        $content=Content::first();
        $feedbacks=Feedback::all();
        return view('main',compact("content","feedbacks","title","des"));
    }

    public function contact(){
        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| Contact";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Want to access fast cash loans? Contact us to start your
application today.";
        return view('contact',compact("title","des"));
    }

    public function policy(){
        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| Policy";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Read our policy to see if a Mycashonline fast cash loan is right for
you.";
        return view('policy',compact("title","des"));
    }
    public function web_policy(){
        $title="Fast Cash Loans up to $2,000 Approved
Online | Mycashonline| Australia";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Only 5 minutes to apply for up to $2,000. Apply now and get your
fast loan today.";
        return view('web_policy',compact("title","des"));
    }
    public function credit_guide(){
        $title="Fast Cash Loans up to $2,000 Approved
Online | Mycashonline| Australia";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Only 5 minutes to apply for up to $2,000. Apply now and get your
fast loan today.";
        return view('credit_guide',compact("title","des"));
    }

    public function resolution(){
        $title="Fast Cash Loans up to $2,000 Approved
Online | Mycashonline| Australia";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Only 5 minutes to apply for up to $2,000. Apply now and get your
fast loan today.";
        return view('resolution',compact("title","des"));
    }

    public function privacy(){
        $title="Fast Cash Loans up to $2,000 Approved
Online | Mycashonline| Australia";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Only 5 minutes to apply for up to $2,000. Apply now and get your
fast loan today.";
        return view('privacy',compact("title","des"));
    }


    public function go_to_app(Request $request){
       $amount= $request->loan_amount;
       $term=  $request->loan_period;
        return view('application.create_with_info', compact("amount","term"));
    }


    public function personal_info(){
        $user=Auth::user();
      //  $applications=Application::where('user_id',$user->id)->get();
       // Log::debug($applications);
        $last_applications=Application::where('user_id',$user->id)->orderBy('created_at', 'desc')->first();
        $repayments=Repayment::where('application_id',$last_applications->id)->orderBy('due', 'asc')->get();
        return view('customer',compact('repayments'));
    }

    public function documents(){
        $user=Auth::user();
        return view('documents',compact('user'));
    }

    public function upload_id(Request $request){
        $user=Auth::user();
        if($request->has('id_img') && $file = $request->file('id_img')){
            if ($file->isValid()) {
                $img_path = $file->store('ID');
                $user->id_img=$img_path;
            }
        }
        if($request->has('car_photo') && $file = $request->file('car_photo')){
            if ($file->isValid()) {
                $img_path = $file->store('car_photo');
                $user->car_photo=$img_path;
            }
        }
        if($request->has('certification') && $file = $request->file('certification')){
            if ($file->isValid()) {
                $img_path = $file->store('certification');
                $user->certification=$img_path;
            }
        }
        if($request->has('doc_with_address') && $file = $request->file('doc_with_address')){
            if ($file->isValid()) {
                $img_path = $file->store('doc_with_address');
                $user->doc_with_address=$img_path;
            }
        }
        $user->save();
        return redirect()->back()->with("success"," Uploaded successfully");

    }





    public function send_info(Request $request){
        $data = array('name'=>$request->name,'email'=>$request->email,'subject'=>$request->subject,'Message'=>$request->message);
        Mail::send('mail.info', $data, function($message) {
            $message->to( 'administration@mypaydayloans.com.au', 'Customer')->subject
            ('Information');
            $message->from('administration@mypaydayloans.com.au','My Cash Online');
        });
        return redirect(action('VisitorController@main'))->with('success',"Successfully sent!");
    }
}
