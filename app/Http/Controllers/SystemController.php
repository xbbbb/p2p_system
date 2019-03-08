<?php

namespace App\Http\Controllers;

use App\Application;
use App\Repayment;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PDF;


class SystemController extends Controller
{
    public function dashboard(){
        $apps=Application::all();
        $apps_pending=Application::where("result","0")->orWhere("result","2")->orderBy("updated_at","desc")->get();
        $repayments=[];
        $date=Carbon::now();
        $date_string=$date->toDateString();
        $tasks=Task::where('date',$date_string)->get();
        foreach ($apps as $app){
            $repayment=$this->get_last_payment($app->id);
            if($repayment!=null){
                $repayments[]=$repayment;
            }
        }

        return view('system.dashboard',compact("repayments","apps_pending","tasks"));
    }

    public function customer(){

        return view('system.customer');
    }

    public function application_list(){

        $applications=Application::orderBy("updated_at","desc")->get();
        return view('system.application_list',compact('applications'));
    }

    public function get_application_by_status($status){

        $applications=Application::where("result",$status)->orderBy("created_at","DESC")->get();
        return view('system.application_list',compact('applications'));
    }

    public function application_search(Request $request){
        $applications=Application::where('first_name','LIKE','%'.$request->Content.'%')->orWhere('last_name','LIKE','%'.$request->Content.'%')->orWhere('email','LIKE','%'.$request->Content.'%')->orWhere('mobile','LIKE','%'.$request->Content.'%')->orderBy("created_at","DESC")->get();
        return view('system.application_list',compact('applications'));
    }

    public function application_detail($id){
        $application=Application::find($id);
        $user=User::find($application->user_id);
        $this->get_last_payment($id);
        $repayments=Repayment::where('application_id',$id)->orderBy('due', 'asc')->get();
        $amount=0;
        $paid_amount=0;
        $previous_amount=0;
        foreach ($repayments as $repayment){
            $date=new Carbon();
            $today=$date->toDateString();
            if($repayment->due<$today){
                $previous_amount+=$repayment->amount;
            }
            $amount+=$repayment->amount;
            $paid_amount+=$repayment->paid_amount;
        }
        $tasks=Task::where('application_id',$id)->where('complete',0)->get();
        $historys=Task::where('application_id',$id)->where('complete',1)->get();
        return view('system.application_detail',compact('application','repayments','tasks','historys','user','paid_amount','amount','previous_amount'));
    }





    public function get_last_payment($app_id){
        $date=Carbon::now();
        $date_start=$date->toDateString();
        $repayments=Repayment::where("application_id",$app_id)->where("due","<=",$date_start)->orderBy('due', 'desc')->take(1)->get();

        if(count($repayments)==0){
            return;
        }
        if($repayments[0]["note"]!=""&&(strpos($repayments[0]["note"],"Successful")!==false||strpos($repayments[0]["note"],"Dishonoured")!==false||strpos($repayments[0]["note"],"Fatal Error")!==false)){

            return $repayments[0];
        }

        $app=Application::find($app_id);
        $user_id=$app->user_id;
        $info = array(
            'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
            'px:PaymentType'=>'ALL',
            'px:PaymentMethod'=>'ALL',
            'px:PaymentSource'=>'ALL',
            'px:DateFrom'=>$repayments[0]["due"],
            'px:DateTo'=>$date_start,
            'px:DateField'=>"PAYMENT",
            'px:YourSystemReference'=> $user_id,
        );
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: https://px.ezidebit.com.au/INonPCIService/GetPayments",
            "Content-length: ".strlen($this->array_to_XML($info,'px:GetPayments')),
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
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $this->array_to_XML($info,'px:GetPayments'));
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
        $content  = curl_exec($soap_do);
        Log::debug($content);
        curl_close($soap_do);
        $doc = new \DOMDocument();
        $doc->loadXML($content);
        if($doc->getElementsByTagName('Payment')->count()==1){
            $status=$doc->getElementsByTagName('PaymentStatus')->item(0)->nodeValue;
            switch ($status){
                case "W":
                    $repayments[0]->note="Waiting";
                    $repayments[0]->paid_amount=0;

                    break;

                case "P":
                    $repayments[0]->note="Pending";
                    $repayments[0]->paid_amount=0;

                    break;


                case "S":
                    $repayments[0]->note="Successful";
                    $repayments[0]->paid_amount=$repayments[0]->amount;
                    break;

                case "F":
                    $repayments[0]->note="Fatal Error";
                    $repayments[0]->paid_amount=0;

                    break;

                case "D":
                    $repayments[0]->note="Dishonoured";
                    $repayments[0]->paid_amount=0;

                    break;

            }
            $repayments[0]->save();

        }
        return $repayments[0];

    }


    public function array_to_XML($array,$action){
        $xml = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:px='https://px.ezidebit.com.au/'>"."<soapenv:Header />"."<soapenv:Body>".
            "<".$action.">";
        foreach ($array as $key=>$val)
        {
            $xml.="<".$key.">".$val."</".$key.">";
        }
        $xml.="</".$action.">"."</soapenv:Body>"."</soapenv:Envelope>";
        return $xml;
    }

    public function generate_final_contract($id){
        $application=Application::find($id);
        $date=new Carbon();

        $application["sign_date"]=$date->toDateString();

        $pdf = PDF::loadView('contract_final', $application);
        return $pdf->download('record.pdf');
    }


}
