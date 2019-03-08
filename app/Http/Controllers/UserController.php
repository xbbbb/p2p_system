<?php

namespace App\Http\Controllers;

use App\Application;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::where('dob','!=',null)->get();
        return view('system.customers_list',compact('users'));
    }

    public function detail($id){
        $user=User::find($id);
        $applications=Application::where('user_id',$id)->get();
        return view('system.customer',compact('user','applications'));
    }

    public function change_status(){
        $id=$_POST["id"];
        $status=$_POST["status"];
        $user=User::find($id);
        $user->status=$status;
        $response=[
            "response"=>"success",
        ];
        try{
            $user->save();

        }
        catch (\Exception $e){
            $response["response"]="error";
        }
        return json_encode($response);
    }

    public function change_desirable(){
        $id=$_POST["id"];
        $desirable=$_POST["desirable"];
        $user=User::find($id);
        $user->undesirable=$desirable;
        $response=[
            "response"=>"success",
        ];
        try{
            $user->save();

        }
        catch (\Exception $e){
            $response["response"]="error";
        }
        return json_encode($response);
    }

    public function change_user_info(){
        $key=$_POST["key"];
        $value=$_POST["value"];
        $id=$_POST["id"];
        $user=User::find($id);
        $user->setAttribute($key,$value);
        $user->save();
        $response=[
            "response"=>"success"
        ];
        return json_encode($response);


    }

}
