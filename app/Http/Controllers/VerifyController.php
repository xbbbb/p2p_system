<?php

namespace App\Http\Controllers;

use App\Application;
use App\Blacklist;
use App\Repayment;
use App\User;
use App\Verification;
use App\VerifiedLoan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Debug\Debug;

class VerifyController extends Controller
{

    public function get_credit_sense($ref){
        $info=[
            "Settings"=>[
                "API_Token"=>"caef5405-7b73-4170-b3a3-a4009210d257"
            ],
            "Payload"=>[
                "App_Ref"=>$ref,
                "Client_Code"=>["AUS03"]
            ]

        ];
        $info_field=json_encode($info);
        $search = curl_init();
        $headers=array(
            "Content-Type: application/json"
        );

        curl_setopt($search, CURLOPT_URL, "https://api.creditsense.com.au/v2/732c8b8e-8d3e-4385-859e-b3b524971ac9/app/search" );
        curl_setopt($search, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($search, CURLOPT_TIMEOUT,        10);
        curl_setopt($search, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($search, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($search, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($search, CURLOPT_POST,true);
        curl_setopt($search, CURLOPT_POSTFIELDS, $info_field);
        curl_setopt($search, CURLOPT_HTTPHEADER, $headers);
        $content  = curl_exec($search);
        if($content==false){
            return null;

        }
        $app_info=json_decode($content,true);
        Log::debug($content);

        if($app_info["Success"]&&count($app_info["Response"]["Applications"])>0){
            if($app_info["Response"]["Applications"][0]["Status"]=="Complete"){
                if($id=$app_info["Response"]["Applications"]!=null){
                    $id=$app_info["Response"]["Applications"][0]["App_ID"];
                    $reference=[
                        "Settings"=>[
                            "API_Token"=>"caef5405-7b73-4170-b3a3-a4009210d257"
                        ],
                        "Payload"=>[
                            "App_ID"=>$id,
                            "CS_Report_Formats"=>["json"]
                        ]
                    ];
                    $download = curl_init();
                    curl_setopt($download, CURLOPT_URL, "https://api.creditsense.com.au/v2/732c8b8e-8d3e-4385-859e-b3b524971ac9/report/download" );
                    curl_setopt($download, CURLOPT_CONNECTTIMEOUT, 10);
                    curl_setopt($download, CURLOPT_TIMEOUT,        10);
                    curl_setopt($download, CURLOPT_RETURNTRANSFER, true );
                    curl_setopt($download, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($download, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($download, CURLOPT_POST,true);
                    curl_setopt($download, CURLOPT_POSTFIELDS, json_encode($reference));
                    curl_setopt($download, CURLOPT_HTTPHEADER, $headers);
                    $result  = curl_exec($download);

                    if($result==false){
                        return null;

                    }
                    $result_info=json_decode($result,true);
                    if($result_info["Success"]){
                        $statements= json_decode(base64_decode($result_info["Response"]["attachments"][0]["content"]),true) ;
                        // Log::debug($statements);
                        return $statements;
                    }
                    else{
                        return null;

                    }
                }
                else{
                    return null;
                }
            }
            else{
                return null;
            }




        }
        else{
            return null;
        }

    }



    public function verify_detail($id){
        $application=Application::find($id);
        $user=User::find($application->user_id);
        $apps=Application::where('user_id',$application->user_id)->get();

        if($application->marital_status=='Single'){
            if ($application->emp_status=="unemployed-government benefits"){
                if($application->residential_status=="boarding"){
                    $benchmark=1086.41;


                }
                else{
                    $benchmark=1820.69;

                }
            }
            else{
                if($application->residential_status=="boarding"){
                    $benchmark=1511.12;



                }
                else{
                    $benchmark=2245.36;

                }
            }
        }
        else{
            if ($application->emp_status=="unemployed-government benefits"){
                if($application->residential_status=="boarding"){
                    $benchmark=2578.98;



                }
                else{
                    $benchmark=1771.77;

                }
            }
            else{
                if($application->residential_status=="boarding"){
                    $benchmark=2196.87;



                }
                else{
                    $benchmark=3003.69;
                }
            }
        }
        $statement=$this->get_credit_sense(".".$id.".");
        $verify_array=Verification::where('application_id',$id)->get();
        if(count($verify_array)==0){
            $verify=new Verification();
            $verify->setAttribute("application_id",$id);
           // $verify->application_id=$id;
            $verify->save();
        }
        else{
            $verify=$verify_array[0];
        }
        $verified_loans=VerifiedLoan::where("verification_id",$verify->id)->get();

        $total_verified_loans=0;
        if($application['loan_amount']!=0){
            $monthly_repayment= ceil((($application['loan_amount']*0.04*ceil($application['loan_period']/4.33)+$application['loan_amount']*1.2)/ceil($application['loan_period']/4.33) ));
            $weekly_repayment= ceil((($application['loan_amount']*0.04*ceil($application['loan_period']/4.33)+$application['loan_amount']*1.2)/ceil($application['loan_period']/1) ));

            $fortnightly_repayment= ceil((($application['loan_amount']*0.04*ceil($application['loan_period']/4.33)+$application['loan_amount']*1.2)/ceil($application['loan_period']/2) ));

        }
        else if($application['loan_amount_MACC']<=5000){
            $monthly_repayment=ceil((($application['loan_amount_MACC']*0.04*ceil($application['loan_period_MACC']/4.33)+400)/ceil($application['loan_period_MACC']/4.33)));

            $weekly_repayment=ceil((($application['loan_amount_MACC']*0.04*ceil($application['loan_period_MACC']/4.33)+400)/ceil($application['loan_period_MACC']/1)));
            $fortnightly_repayment=ceil((($application['loan_amount_MACC']*0.04*ceil($application['loan_period_MACC']/4.33)+400)/ceil($application['loan_period_MACC']/2)));

        }
        else{
            $monthly_repayment=ceil((($application['loan_amount_MACC']*0.04*ceil($application['loan_period_MACC']/4.33))/ceil($application['loan_period_MACC']/4.33)));
            $weekly_repayment=ceil((($application['loan_amount_MACC']*0.04*ceil($application['loan_period_MACC']/4.33))/ceil($application['loan_period_MACC']/1)));
            $fortnightly_repayment=ceil((($application['loan_amount_MACC']*0.04*ceil($application['loan_period_MACC']/4.33))/ceil($application['loan_period_MACC']/2)));

        }
        foreach ($verified_loans as $loan){
            $total_verified_loans+=$loan["monthly_amount"];
        }

        $alert=false;
        if($statement){
            $fail=false;
            foreach ($statement["Applications"]["Application"]["Accounts"]["Account"] as $account){
                foreach ($account["Transactions"]["Transaction"] as $transaction){
                    $blacklists=Blacklist::all();
                    foreach ($blacklists as $blacklist){
                        if( strpos((string)$transaction["CleanDesc"],$blacklist->name)!==false ){
                            $alert=true;
                            return view('system.verify',compact('application','benchmark','statement','fail','alert','user','verify','verified_loans','total_verified_loans','monthly_repayment','weekly_repayment','fortnightly_repayment','apps'));

                        }
                        ;
                    }
                }
            }
            return view('system.verify',compact('application','benchmark','statement','fail','alert','user','verify','verified_loans','total_verified_loans','monthly_repayment','weekly_repayment','fortnightly_repayment','apps'));

        }
        else{
            $fail=true;
            return view('system.verify',compact('application','benchmark','statement',"fail",'alert','user','verify','verified_loans','total_verified_loans','monthly_repayment','weekly_repayment','fortnightly_repayment','apps'));

        }



    }

    public function  add_loans(){
        $type=$_POST["type"];
        $monthly_amount=$_POST["monthly_amount"];
        $lender=$_POST["lender"];
        $verification_id=$_POST["verification_id"];
        $loan=new VerifiedLoan();
        $loan->type=$type;
        $loan->monthly_amount=$monthly_amount;
        $loan->lender=$lender;
        $loan->verification_id=$verification_id;
        $loan->save();

        $response=[
            "response"=>"success",
            "loan"=>$loan
        ];
        return json_encode($response);
    }

    public function  remove_loans(){
        $id=$_POST["id"];

        $loan=VerifiedLoan::find($id);
        $monthly_amount=$loan["monthly_amount"];
        $loan->delete();
        $response=[
            "response"=>"success",
            "monthly_amount"=>$monthly_amount
        ];
        return json_encode($response);

    }

    public function change_verify_reference(){
        $key=$_POST["key"];
        $value=$_POST["value"];
        $id=$_POST["id"];
        $verify=Verification::find($id);
        $verify->setAttribute($key,$value);
        $verify->save();
        $response=[
            "response"=>"success"
        ];
        return json_encode($response);


    }


    public function update(Request $request, $id){

        $application=Application::find($id);
        if($application->result==3){
            return;
        }
        if($application->loan_amount!=0){
            $application->loan_amount=$request->amount;
        }
        else{
            $application->loan_amount_MACC=$request->amount;
        }
        if($application->loan_period!=0){
            $application->loan_period=$request->period;
        }
        else{
            $application->loan_period_MACC=$request->period;
        }
        if($request->has("discount")){
            $application->discount=$request->discount;
        }
        $application->save();




        if($request->result==3){

            if($application->emp_status=="unemployed-government benefits"){
                $frequency=2;
                $frequency_input='F';
                if($application->loan_period!=0){
                    $total_repayment_num=round($application->loan_period/$frequency);
                    $repayment_value=round(($application->loan_amount*(1.2+0.04*ceil($application->loan_period/4.33) )-$application->discount)/$total_repayment_num,2) ;
                }
                else{
                    $total_repayment_num=round($application->loan_period_MACC/$frequency);

                    if($application->loan_period<=5000){
                        $repayment_value=round((($application->loan_amount_MACC*(1+0.04*ceil($application->loan_period_MACC/4.33))+400)-$application->discount)/$total_repayment_num,2) ;

                    }
                    else{
                        $repayment_value=round((($application->loan_amount_MACC*(1+0.04*ceil($application->loan_period_MACC/4.33)))-$application->discount)/$total_repayment_num,2) ;

                    }
                }
                $next_pay_day=new Carbon($application->unemp_next_pay_date);
            }
            else{
                if($application->primary_income_freq=='weekly'){
                    $frequency=1;
                    $frequency_input="W";
                }
                else if($application->primary_income_freq=='monthly'){
                    $frequency=4;
                    $frequency_input=4;
                }
                else if($application->primary_income_freq=='fornightly'){
                    $frequency=2;
                    $frequency_input='F';
                }
                if($application->loan_period!=0){
                    $total_repayment_num=round($application->loan_period/$frequency);
                    $repayment_value=round(($application->loan_amount*(1.2+0.04*ceil($application->loan_period/4.33))-$application->discount)/$total_repayment_num,2) ;
                }
                else{
                    $total_repayment_num=round($application->loan_period_MACC/$frequency);
                    if($application->loan_period<=5000){
                        $repayment_value=round((($application->loan_amount_MACC*(1+0.04*ceil($application->loan_period_MACC/4.33))+400)-$application->discount)/$total_repayment_num,2) ;

                    }
                    else{
                        $repayment_value=round((($application->loan_amount_MACC*(1+0.04*ceil($application->loan_period_MACC/4.33))))/$total_repayment_num,2) ;
                    }
                }
                $next_pay_day=new Carbon($application->primary_next_pay_date);
            }
           
            $next_pay_day_input=$next_pay_day->toDateString();

            switch ($next_pay_day->dayOfWeekIso) {
                case 1:
                    $week_day="MON";
                    break;
                case 2:
                    $week_day="TUE";
                    break;
                case 3:
                    $week_day="WED";
                    break;
                case 4:
                    $week_day="THU";
                    break;
                case 5:
                    $week_day="FRI";
                    break;
                case 6:
                    $week_day="MON";
                    break;
                case 7:
                    $week_day="MON";
                    break;
            }
            $schedule_info= array(
                'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
                'px:YourSystemReference'	=> $application->user_id,
                'px:ScheduleStartDate' =>$next_pay_day_input,
                'px:SchedulePeriodType'=>$frequency_input,
                'px:DayOfWeek'=>$week_day,
                'px:DayOfMonth'=>0,
                'px:PaymentAmountInCents'=>$repayment_value*100,
                'px:LimitToNumberOfPayment'=>$total_repayment_num,
                'px:LimitToTotalAmountInCents'=>$application->loan_amount*(1.2+0.01*$application->loan_period)*100,
                'px:KeepManualPayments'=>'Yes'
            );
            $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: https://px.ezidebit.com.au/INonPCIService/CreateSchedule",
                "Content-length: ".strlen($this->array_to_XML($schedule_info,'px:CreateSchedule')),
            );
            $url = "https://api.ezidebit.com.au/v3-5/nonpci";
            $soap_do = curl_init();
            curl_setopt($soap_do, CURLOPT_URL, $url );
            curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($soap_do, CURLOPT_TIMEOUT,        10);
            curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($soap_do, CURLOPT_POST,true);
            curl_setopt($soap_do, CURLOPT_POSTFIELDS, $this->array_to_XML($schedule_info,'px:CreateSchedule'));
            curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
            $content  = curl_exec($soap_do);
            if($content==false){
                return redirect()->back() ->with('fail',"Something Wrong");
            }
            Log::debug($content);


            $doc = new \DOMDocument();
            $doc->loadXML($content);

            if($doc->getElementsByTagName('Data')->item(0)->nodeValue){
                for($i=0;$i<$total_repayment_num;$i++){
                    $repayment=new Repayment();
                    $repayment->application_id=$application->id;
                    $repayment->amount=$repayment_value;
                    $repayment->paid_amount=0;
                    if($i!=0){
                        $repayment->due=$next_pay_day->addDays(7*$frequency);

                    }
                    else{
                        $repayment->due=$next_pay_day;
                    }
                    $repayment->save();

                }
                $application->result=$request->result;
                $application->reject_reason=$request->reject_reason;
                $application->save();
                return redirect()->back() ->with('success',"Task updated");
            }
            else{
                return redirect()->back() ->with('fail',"Something Wrong");
            }
        }
        else{
            $application->result=$request->result;
            $application->reject_reason=$request->reject_reason;
            $application->save();
            return redirect()->back() ->with('success',"Task updated");
        }
        return redirect()->back() ->with('success',"application updated");
    }

    public function array_to_XML($array,$action){
        $xml = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:px='https://px.ezidebit.com.au/'>"."<soapenv:Header />"."<soapenv:Body>".
            "<".$action.">";
        foreach ($array as $key=>$val)
        {
            $xml.="<".$key.">".$val."</".$key.">";
        }
        $xml.="</".$action.">"."</soapenv:Body>"."</soapenv:Envelope>";
        Log::debug($xml);
        return $xml;
    }
}
