<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//企业详情页控制器
class PinglController extends Controller
{
    //加载评论页
    public function index()
    {
    	return view('home.pingl.pingl', ['title' => '添加评论']);

    }


    // 加载添加评论页
    public function insert(Request $request)
    {
        
        dd($request->all());

    }

}
