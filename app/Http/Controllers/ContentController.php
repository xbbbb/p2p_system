<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function create()
    {
        $content=Content::first();
        return view('backend.content',compact("content"));
    }

    public function store(Request $request)
    {
        $content=  Content::first();
        $content->content1=$request->content1;
        $content->content2=$request->content2;
        $content->content3=$request->content3;
        $content->content4=$request->content4;
        $content->content5=$request->content5;
        $content->content6=$request->content6;
        $content->content7=$request->content7;
        $content->content8=$request->content8;
        $content->content9=$request->content9;
        $content->content10=$request->content10;
        $content->content11=$request->content11;
        $content->content12=$request->content12;
        $content->save();

    }
}
