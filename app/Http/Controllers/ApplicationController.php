<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationExport;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Excel;
use Mail;
use PDF;

class ApplicationController extends Controller
{
    public function create()
    {
        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| Apply now";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Application takes 5 minutes. Apply now and get your fast cash
loan today.";
        return view('application.create',compact("title","des"));

    }

    public function upload_view()
    {
        return view('backend.application_upload');

    }

    public function filterApplication(Request $request){
        Session::put("start_time",$request->start_time);
        Session::put('end_time', $request->end_time);
        Session::put('result', $request->result);
        if($request->result!=5){
            $applications= Application::whereDate('created_at',">=", $request->start_time)->whereDate('created_at',"<=" , $request->end_time)->where("result", $request->result)->get();

        }
        else{
            $applications= Application::whereDate('created_at',">=", $request->start_time)->whereDate('created_at',"<=" , $request->end_time)->get();
        }
        return view('backend.application_index',compact('applications'));

    }

    public function parseImport(Request $request){
        try{
            $path = $request->file('csv_file')->getRealPath();
            $data = array_map('str_getcsv', file($path));
            if (count($data) > 0) {
                $csv_data = array_slice($data, 0, 2);
                Log::info(print_r(config('app.db_fields'), true));
                foreach ($csv_data as $row) {
                    $application = new Application();
                    $i=0;
                    foreach (config('app.db_fields') as $index => $field) {
                        if( $row[$i]==''){
                            $i++;
                            continue;
                        }
                        else{
                            $application->$field = $row[$i];
                            $i++;
                        }


                    }
                    $application->save();
                }
            }
            return redirect(url('/application/all'))->with('success',"Successfully upload");
        }
        catch (\Exception $exception){
            return redirect(url('/application/all'))->with('fail',"Error");
        }




    }

    public function detail($id)
    {
        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| Apply now";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Application takes 5 minutes. Apply now and get your fast cash
loan today.";
       $application=Application::find($id);
       $if_repeat=0;
        $count = Application::where('first_name', $application->first_name)->where('last_name', $application->last_name)->count();
       if($count>1){
           $if_repeat=1;
       }

        return view('backend.application_detail',compact('application',"if_repeat","title","des"));

    }

    public function intermediate(Request $request){

        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| Apply now";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Application takes 5 minutes. Apply now and get your fast cash
loan today.";

           // try{
            $validator = Validator::make($request->all(), [
                'type' => 'required',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'dob'=>'required|date',
                'mobile'=>'required|string|min:10|max:10',
                'veri_code'=>'required|string|min:4|max:4',
                'sex'=>'required',
                'email' => 'required|string|email|max:255',
                "no_of_dependent"=>'required|numeric|max:5|min:0',
                'marital_status'=>'required',
                'em_contact_name'=>'required|string|max:255',
                'em_contact_no'=>'required|string|max:10',
                'relationship'=>'required',
                'id_details'=>'required',
                'autocomplete'=>'required|string|max:255',
                'time_at_addr_from'=>'required|string:',
                'residential_status'=>'required|string',
                'emp_status'=>'required',
                'another_job'=>'required|numeric|max:1|min:0'
            ]);
            if($validator->fails()){
                $error = $validator->errors()->first();
                Log::debug($error);
                return redirect(action('ApplicationController@create'))->with('fail',"Invalid Info");
            }

            else{
                $user_validator=Validator::make($request->all(), [
                   'mobile'=>'unique:users'
                ]);
                if($user_validator->fails()){
                    $user=User::where('mobile',$request->mobile)->first();
                  //  Log::debug($request->mobile);
                   // Log::debug(User::where('mobile',$request->mobile)->count());
                    Session::put('existing_user_id',$user->id);
                }
                else{
                    Session::put("pre_data",json_encode($request->all()));
                    $user=new User();
                    $data=json_decode(Session::get("pre_data"),true);
                    $user->name=$data['first_name'].'_'.$data['middle_name'].'_'.$data['last_name'];
                    $user->type=$data['type'];
                    $user->first_name=$data['first_name'];
                    $user->middle_name=$data['middle_name']; //nullable
                    $user->last_name=$data['last_name'];
                    $user->dob=$data['dob'];
                    $user->mobile=$data['mobile'];
                    $user->sex=$data['sex'];
                    $user->phone=$data['phone'];
                    $user->email=$data['email'];
                    $user->marital_status=$data['marital_status'];
                    $user->no_of_dependent=$data['no_of_dependent'];
                    $user->ddl_share_partner=$data['ddl_share_partner'];//nullable
                    $user->partner_income=$data['partner_income'];
                    $user->em_contact_name=$data['em_contact_name'];
                    $user->em_contact_no=$data['em_contact_no'];
                    $user->relationship=$data['relationship'];
                    $user->id_details=$data['id_details'];
                    $user->license_no=$data['license_no'];//nullable
                    $user->license_state=$data['license_state']; //nullable
                    $user->license_expiry=$data['license_expiry']; //nullable
                    $user->card_no=$data['card_no'];//nullable
                    $user->place_of_issue=$data['place_of_issue'];//nullable
                    $user->passport_no=$data['passport_no'];//nullable
                    $user->issue_country=$data['issue_country'];//nullable
                    $user->residential_addr=$data['autocomplete'];
                    $user->time_at_addr_from=$data['time_at_addr_from'];
                    $user->residential_status=$data['residential_status'];
                    $user->mortgage_detail=$data['mortgage_detail']; //nullable//////////
                    $user->emp_status=$data['emp_status'];
                    $user->employ_start_date=$data['employ_start_date']; //nullable
                    $user->occupation=$data['occupation']; //nullable
                    $user->company_name=$data['company_name']; //nullable
                    $user->company_addr=$data['company_addr']; //nullable
                    $user->company_phone=$data['company_phone']; //nullable
                    $user->primary_next_pay_date=$data['primary_next_pay_date']; //nullable
                    $user->primary_income_freq=$data['primary_income_freq']; //nullable
                    $user->unemp_next_pay_date=$data['unemp_next_pay_date']; //nullable
                    $user->another_job=$data['another_job']; //nullable
                    $user->second_emp_status=$data['second_emp_status']; //nullable
                    $user->next_pay_date=$data['next_pay_date']; //nullable
                    $user->another_company_name=$data['another_company_name']; //nullable
                    $user->another_company_addr=$data['another_company_addr']; //nullable
                    $user->another_company_phone=$data['another_company_phone']; //nullable
                    $user->second_occupation=$data['second_occupation']; //nullable
                    $user->income_freq=$data['income_freq']; //nullable
                    $user->length_of_employment=$data['length_of_employment']; //nullable
                    $user->agent_name=$data['agent_name'];
                    $user->agent_mobile=$data['agent_mobile'];
                    $user->street_number=$data['street_number'];
                    $user->route=$data['route'];
                    $user->locality=$data['locality'];
                    $user->administrative_area_level_1=$data['administrative_area_level_1'];
                    $user->postal_code=$data['postal_code'];
                    $password=$this->generateRandomString(10);
                    Session::put("password",$password);
                    $user->password=Hash::make($password);
                    try{
                        $user->save();

                    }
                    catch (\Exception $e){
                        return redirect(action('ApplicationController@create'))->with('fail',"Email has been taken");

                    }
                    Session::put('user_id',$user->id);
                }

                if($request->veri_code==Session::get("code")){
                    Session::put("pre_data",json_encode($request->all()));
                    return view('application.detail',compact("title","des"));
                }
                else{
                    return redirect(action('ApplicationController@create'))->with('fail',"Wrong verification code");
                }
            }
        //}
       // catch (\Exception $e){
          //  return  view('application.create')->with('fail','Illegal Action!');
     //   }

    }

    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index(){
        $applications=Application::all();
        Session::forget("start_time");
        Session::forget("end_time");
        Session::forget('result');
        return view('backend.application_index',compact('applications'));
    }

    public function export(){
        return Excel::download(new ApplicationExport(), 'Application.csv');

    }

    public function downloadPDF($id){

        $application=Application::find($id);
        $data = array('application'=>$application);
        $pdf = PDF::loadView('application_record', $data);
        return $pdf->download('record.pdf');

    }

    public function generatePDF(Request $request){

        if(Session::has("contract_ref")){



            $application=json_decode(Session::get("contract_ref"),true);
            $data = array(
                'name'=>$application['first_name'],
                'password'=>Session::get("password")
            );
            $ref=array('id'=>$application['id']);
            $application=Application::find($application['id']);


            $application["sign_date"]=$request->sign_date;
            $application["sign"]=$request->sign;
            $application["ip"]=$request->ip();
	        try{
			$pdf = PDF::loadView('contract', $application);
		            $pdf->save(storage_path(). "/app/public/contract/".$application["id"].".pdf");
		
		            Mail::send('mail.confirm', $data, function($message) {
		                $data_temp=json_decode(Session::get("contract_ref"),true);
		                $message->to( $data_temp['email'], 'Customer')->subject
		                ('Loan Application-proceeding');
		                $message->from('administration@mypaydayloans.com.au','My Cash Online');
		            });
		            Mail::send('mail.notify', $ref, function($message) {
		                $message->to("app@mycashonline.com.au", 'Customer')->subject
		                ('Application notice');
		                $message->from('administration@mypaydayloans.com.au','My Cash Online');
		            });
	        }
	        catch (\Exception $e){
	
	        }
            
            

            $store="aus03";
            $id=$application["id"];
            $url="https://creditsense.com.au/apply/$store/?appRef=.$id.&uniqueAppRef=true";
            return redirect()->to($url);

        }


    }

    public function contract(){
        return view("contract_page");
    }









    public function store(Request $request){
        $title="Fast Cash Loans up to $2,000 approved
online | Mycashonline| Apply now";
        $des="Fast approval same day cash loans from Australia's #1 payday loan
lender. Application takes 5 minutes. Apply now and get your fast cash
loan today.";
        if(Session::has("pre_data")){
            $data=json_decode(Session::get("pre_data"),true);
            $application=new Application();
            if($data['loan_amount']>2000){
                $application->loan_amount_MACC=$data['loan_amount'];
                $application->loan_period_MACC=$data['loan_period'];
            }
            else{
                $application->loan_amount=$data['loan_amount'];
                $application->loan_period=$data['loan_period'];
            }
            $application->type=$data['type'];
            $application->first_name=$data['first_name'];
            $application->middle_name=$data['middle_name']; //nullable
            $application->last_name=$data['last_name'];
            $application->dob=$data['dob'];
            $application->mobile=$data['mobile'];
            $application->sex=$data['sex'];
            $application->phone=$data['phone'];
            $application->email=$data['email'];
            $application->marital_status=$data['marital_status'];
            $application->no_of_dependent=$data['no_of_dependent'];
            $application->ddl_share_partner=$data['ddl_share_partner'];//nullable
            $application->partner_income=$data['partner_income'];
            $application->em_contact_name=$data['em_contact_name'];
            $application->em_contact_no=$data['em_contact_no'];
            $application->relationship=$data['relationship'];
            $application->id_details=$data['id_details'];
            $application->license_no=$data['license_no'];//nullable
            $application->license_state=$data['license_state']; //nullable
            $application->license_expiry=$data['license_expiry']; //nullable
            $application->card_no=$data['card_no'];//nullable
            $application->place_of_issue=$data['place_of_issue'];//nullable
            $application->passport_no=$data['passport_no'];//nullable
            $application->issue_country=$data['issue_country'];//nullable
            $application->residential_addr=$data['autocomplete'];
            $application->time_at_addr_from=$data['time_at_addr_from'];
            $application->residential_status=$data['residential_status'];
            $application->mortgage_detail=$data['mortgage_detail']; //nullable//////////
            $application->emp_status=$data['emp_status'];
            $application->employ_start_date=$data['employ_start_date']; //nullable
            $application->occupation=$data['occupation']; //nullable
            $application->company_name=$data['company_name']; //nullable
            $application->company_addr=$data['company_addr']; //nullable
            $application->company_phone=$data['company_phone']; //nullable
            $application->primary_next_pay_date=$data['primary_next_pay_date']; //nullable
            $application->primary_income_freq=$data['primary_income_freq']; //nullable
            $application->unemp_next_pay_date=$data['unemp_next_pay_date']; //nullable
            $application->another_job=$data['another_job']; //nullable
            $application->second_emp_status=$data['second_emp_status']; //nullable
            $application->next_pay_date=$data['next_pay_date']; //nullable
            $application->another_company_name=$data['another_company_name']; //nullable
            $application->another_company_addr=$data['another_company_addr']; //nullable
            $application->another_company_phone=$data['another_company_phone']; //nullable
            $application->second_occupation=$data['second_occupation']; //nullable
            $application->income_freq=$data['income_freq']; //nullable
            $application->length_of_employment=$data['length_of_employment']; //nullable
            $application->agent_name=$data['agent_name'];
            $application->agent_mobile=$data['agent_mobile'];
           // $application->rent_amt=$data['rent_amt'];

            $application->street_number=$data['street_number'];
            $application->route=$data['route'];
            $application->locality=$data['locality'];
            $application->administrative_area_level_1=$data['administrative_area_level_1'];
            $application->postal_code=$data['postal_code'];

            if(Session::has("start_time")){
                $application->start_time=Session::get("start_time");
            }
            $application->loan_purpose=$request->loan_purpose; //nullable
            $application->explanation=$request->explanation;
            $application->monthly_after_tax=$request->monthly_after_tax;
            $application->mortgage_rent=$request->mortgage_rent;
            $application->travel_expense=$request->travel_expense;
            $application->insurance=$request->travel_expense;
            $application->credit_limit=$request->credit_limit;
            $application->repay_loan=$request->repay_loan;
            $application->credit_defaults=$request->credit_defaults;
            //$application->no_of_defaults=$request->no_of_defaults;//nullable
          //  $application->total_dollar=$request->total_dollar;//nullable
           // $application->loan_type=$request->loan_type;//nullable
            $application->given_info=$request->given_info;
            $application->credit_guide=$request->credit_guide;
            $application->non_essential_spending=$request->non_essential_spending;
            $application->loan_interest=$request->loan_interest;
            $application->hear_about_us=$request->hear_about_us;
            $application->home_utility_exp=$request->home_utility_exp;
            $application->pension=$request->pension;
            $application->food_entertainment=$request->food_entertainment;
            $application->personal_exp=$request->personal_exp;
            $application->loan_payment=$request->loan_payment;
            $application->undischarged_bankrupt=$request->undischarged_bankrupt;
            $application->sortterm_loan=$request->sortterm_loan;
            $application->loan_num=$request->loan_num;
            $application->total_income=$application->pension+$application->monthly_after_tax;
            $application->total_expense=$application->mortgage_rent+$application->travel_expense+$application->insurance+
                $application->home_utility_exp+$application->food_entertainment+$application->personal_exp +$application->loan_payment;
            $application->communication=$request->communication;
            $request_array=$request->all() ;
            $i=0;
             $info_string="";
            while($i<$request_array["loan_num"]){
                $info_string=$info_string.$request_array["com_name".$i]."/$".$request_array["com_amount".$i]."|";
                $i++;
            }
            $application->loan_info=$info_string;
            $application->result="0";
            if(Session::has('user_id')){
                $application->user_id=Session::get('user_id');
            }
            else{
                $application->user_id=Session::get('existing_user_id');
            }
            $application->save();
            $data = array(
                'name'=>$data['first_name'],
                'password'=>Session::get("password")
            );
            $user=User::find($application->user_id);
            if ($application->pension+$application->monthly_after_tax
                <$application->mortgage_rent+$application->travel_expense+$application->insurance+
                $application->home_utility_exp+$application->food_entertainment+$application->personal_exp +$application->loan_payment ||$application->pension+$application->monthly_after_tax<1250||
                $application->undischarged_bankrupt==0  ||  $application->credit_defaults==0 ||
                $application->given_info==0 || $application->credit_guide==0 ||$application->non_essential_spending==0||$user->undesirable==1)
            {

                try{
                    Mail::send('mail.decline', $data, function($message) {
                        $data_temp=json_decode(Session::get("pre_data"),true);
                        $message->to( $data_temp['email'], 'Customer')->subject
                        ('Loan Application-unable to assist');
                        $message->from('administration@mypaydayloans.com.au','My Cash Online');
                    });
                }
                catch (\Exception $exception){
                    
                }

                $reject_reason="";
                if ($application->pension+$application->monthly_after_tax
                    <$application->mortgage_rent+$application->travel_expense+$application->insurance+$application->home_utility_exp+
                    $application->food_entertainment+$application->personal_exp +$application->loan_payment){
                    $reject_reason="Customer declare negative servicing, ".$reject_reason;
                }
                if( $application->undischarged_bankrupt==1){
                    $reject_reason=" Declared bankrupt," .$reject_reason;
                }
                if( $application->credit_defaults==1){
                    $reject_reason=" Declared outstanding default," .$reject_reason;
                }
                if( $application->given_info==0 || $application->credit_guide==0 ||$application->non_essential_spending==0){
                    $reject_reason=" Fail on Declaration, " .$reject_reason;
                }


                $application->result="4";
                $application->reject_reason=$reject_reason;

                $application->save();
                Session::forget("pre_data");
                Session::forget('user_id');
                return redirect(action('VisitorController@main'))->with('success',"Application submitted");
            }
            else{
               // return redirect(action('ApplicationController@next'));
                Session::forget("pre_data");
                Session::put("contract_ref",json_encode($application));
                return view("contract_page",compact('application',"title","des"));


            }


        }
        else{
            return redirect(action('VisitorController@main'))->with('fail',"Please resubmit");
        }
    }
    
    
     



    public function next(){
        return view('application.detail');
    }

    public function update(Request $request, $id){
        $application=Application::find($id);
        $application->result=$request->result;
        $application->reject_reason=$request->reject_reason;
        $application->save();
        return redirect(url('/application/all'));
    }



    public function set_start_time(){
        $time=Carbon::now();
        Log::debug($time);
        Session::put("start_time",$time);
        return json_encode($time);
    }

    public function send_code()
    {
        $mobile=$_POST['mobile'];


        if(Session::has("last_sent_time")){
            $start_time=Carbon::now();
            $last_time=Session::get("last_sent_time");
            $diff= $start_time->diffInSeconds($last_time);
            if($diff<60){
                echo json_encode("please wait for ".(60-$diff)."s") ;
                return;
            }

        }
        Session::put("code",rand(1000,9999));




        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app.wholesalesms.com.au/api/v2/send-sms.json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "message=Your verification code is ".Session::get("code")."&to=".$mobile,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic YmRjZWJjMTljZGYzYzAzZmE3Zjg1ZTk0N2RjYjg1NTM6YTJjZDIxNzg0NDkwZmQ2ZmNjNWIwYmM1Y2FiYzM1ODU=",
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded",
                "Postman-Token: 3ab8e3d1-824c-4a99-b238-0da77b7e46a1"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $arr=json_decode($response,true);
        Session::put("last_sent_time",Carbon::now());
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($arr["error"]["code"]=="SUCCESS"){
                echo json_encode("Your verification code for your loan application has been sent to your mobile phone!");
            }
            else{
                echo json_encode("Error") ;
            }
        }

        // Log::debug(Session::get("code"));
       // echo json_encode(Session::get("code")) ;
    }
}
