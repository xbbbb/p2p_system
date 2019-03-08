<?php

namespace App\Http\Controllers;

use App\Application;
use App\Repayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use SoapClient;
use Illuminate\Http\Request;

class RepaymentController extends Controller
{


    public function index(){
        $repayments=Repayment::all();
        return view('system.repayment',compact('repayments'));
    }


    public function create_direct_debit($id){
        $application=Application::find($id);
        return view ('system.direct_debit_create',compact('application'));
    }

    public function create_payments($id){
        $application=Application::find($id);
        return view ('system.add_repayments',compact('application'));


    }

    public function edit_repayment($id){
        $repayment=Repayment::find($id);
        return view ('system.edit_repayments',compact('repayment'));

    }

    public function delete_repayment($id){
        $repayment=Repayment::find($id);
        $application=Application::find($repayment->application_id);
        $schedule_info= array(
            'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
            'px:YourSystemReference'	=> $application->user_id,
            'px:DebitDate'=>$repayment->due,
            'px:PaymentAmountInCents'=>$repayment->amount*100,
            'px:ApplyToAllFuturePayments'=>"NO",
            'px:KeepManualPayments'=>'YES'
        );
        $headers = array(
            "Content-type: text/xml",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: https://px.ezidebit.com.au/INonPCIService/DeletePayment",
            "Content-length: ".strlen($this->array_to_XML($schedule_info,'px:DeletePayment')),
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
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $this->array_to_XML($schedule_info,'px:DeletePayment'));
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
        $content  = curl_exec($soap_do);
        Log::debug($content);
        curl_close($soap_do);
        $doc = new \DOMDocument();
        $doc->loadXML($content);
        try{
            if($doc->getElementsByTagName('Data')->item(0)->nodeValue) {
                 $repayment->delete();
                return redirect()->back() ->with('success',"Deleted");

            }
            else{
                return redirect()->back() ->with('fail',"Something Wrong");

            }
        }
        catch (\Exception $e){
            return redirect()->back() ->with('fail',"Something Wrong");
        }

    }


    public function change_repayment(Request $request){
        $repayment=Repayment::find($request->repayment_id);
        $application=Application::find($repayment->application_id);
        $date=new Carbon($repayment->due);
        $repayment_Date=$date->subDay(1);
        if($request->amount!=null){
            $schedule_info= array(
                'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
                'px:YourSystemReference'	=> $application->user_id,
                'px:ChangeFromDate'=>$repayment_Date->toDateString(),
                'px:NewPaymentAmountInCents'=>$request->amount*100,
                'px:ApplyToAllFuturePayments'=>"NO",
                'px:KeepManualPayments'=>'YES'
            );
            $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: https://px.ezidebit.com.au/INonPCIService/ChangeScheduledAmount",
                "Content-length: ".strlen($this->array_to_XML($schedule_info,'px:ChangeScheduledAmount')),
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
            curl_setopt($soap_do, CURLOPT_POSTFIELDS, $this->array_to_XML($schedule_info,'px:ChangeScheduledAmount'));
            curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
            $content  = curl_exec($soap_do);
            Log::debug($content);
            curl_close($soap_do);

            if($content==false){
                return redirect()->back() ->with('fail',"Something Wrong");
            }
            $doc = new \DOMDocument();
            $doc->loadXML($content);
            try{
                if($doc->getElementsByTagName('Data')->item(0)->nodeValue) {

                }
                else{
                    return redirect()->back() ->with('fail',"Something Wrong");

                }
            }
            catch (\Exception $e){
                return redirect()->back() ->with('fail',"Something Wrong");

            }
            $repayment->amount=$request->amount;
            $repayment->save();

        }
        if($request->debit_date!=null){
            $schedule_info= array(
                'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
                'px:YourSystemReference'	=> $application->user_id,
                'px:ChangeFromDate'=>$repayment->due,
                'px:NewPaymentAmountInCents'=>$request->amount*100,
                'px:ChangeToDate'=>$request->debit_date,
                'px:KeepManualPayments'=>'YES'
            );
            $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: https://px.ezidebit.com.au/INonPCIService/ChangeScheduledDate",
                "Content-length: ".strlen($this->array_to_XML($schedule_info,'px:ChangeScheduledDate')),
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
            curl_setopt($soap_do, CURLOPT_POSTFIELDS, $this->array_to_XML($schedule_info,'px:ChangeScheduledDate'));
            curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
            $content  = curl_exec($soap_do);
            Log::debug($content);
            curl_close($soap_do);

            if($content==false){
                return redirect()->back() ->with('fail',"Something Wrong");
            }
            $doc = new \DOMDocument();
            $doc->loadXML($content);
            try{
                if($doc->getElementsByTagName('Data')->item(0)->nodeValue) {

                }
                else{
                    return redirect()->back() ->with('fail',"Something Wrong");

                }
            }
            catch (\Exception $e){
                return redirect()->back() ->with('fail',"Something Wrong");

            }
            $repayment->due=$request->debit_date;
            $repayment->save();


        }

        return redirect()->back() ->with('success',"Changed!");


    }





    public function get_last_payment($app_id){
        $date=Carbon::now();
        $date_start=$date->toDateString();
        $repayments=Repayment::where("application_id",$app_id)->where("due","<=",$date_start)->orderBy('due', 'desc')->take(1)->get();
        $app=Application::find($app_id);
        $user_id=$app->user_id;
        $info = array(
            'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
            'px:PaymentType'=>'ALL',
            'px:PaymentMethod'=>'ALL',
            'px:PaymentSource'=>'ALL',
            'px:DateFrom'=>$date_start,
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
                      $repayments->note="Waiting";
                  case "P":
                      $repayments->note="Pending";

                  case "S":
                      $repayments->note="successful";
                      $repayments->paid_amount=$repayments->amount;
                  case "F":
                      $repayments->note="Fatal Error";
                  case "D":
                      $repayments->note="dishonoured";
              }
              $repayments->save();

          }
    }


    public function add_payments(Request $request){
        $application=Application::find($request->app_id);
        $schedule_info= array(
            'px:DigitalKey' => 'FC6C5503-65D8-4B5B-F81F-548D2AF074B8',
            'px:YourSystemReference'	=> $application->user_id,
            'px:DebitDate' =>$request->debit_date,
            'px:PaymentAmountInCents'=>$request->amount*100,
        );
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: https://px.ezidebit.com.au/INonPCIService/AddPayment",
            "Content-length: ".strlen($this->array_to_XML($schedule_info,'px:AddPayment')),
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
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $this->array_to_XML($schedule_info,'px:AddPayment'));
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headers);
        $content  = curl_exec($soap_do);
        curl_close($soap_do);
        if($content==false){
            return redirect()->back() ->with('fail',"Something Wrong");
        }
        Log::debug($content);
        $doc = new \DOMDocument();
        $doc->loadXML($content);
            if($doc->getElementsByTagName('Data')->item(0)->nodeValue) {
                $repayment=new Repayment();
                $repayment->application_id=$application->id;
                $repayment->amount=$request->amount;
                $repayment->paid_amount=0;
                $repayment->due=$request->debit_date;
                if($request->has("note")){
                    $repayment->note=$request->note;

                }
                $repayment->save();
                return redirect()->back() ->with('success',"Payment added");
            }
            else{
                return redirect()->back() ->with('fail',"Something Wrong");

            }
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
