<?php

namespace App\Http\Controllers;

use App\Blacklist;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    public function create()
    {
        return view('system.create_blacklist');
    }
    public function index()
    {
        $blacklists=Blacklist::all();
        return view('system.index_blacklist',compact("blacklists"));
    }

    public function edit($id)
    {
        $blacklist= Blacklist::find($id);
        return view('system.edit_blacklist',compact("blacklist","id"));
    }

    public function update( Request $request,$id)
    {
        $blacklist= Blacklist::find($id);
        $blacklist->name=$request->name;
        $blacklist->save();
        return redirect(action('BlacklistController@index'))->with('success',"Blacklist submitted");

    }

    public function store(Request $request)
    {
        $blacklist=new Blacklist();
        $blacklist->name=$request->name;
        $blacklist->save();
        return redirect(action('BlacklistController@index'))->with('success',"Blacklist submitted");

    }
}
