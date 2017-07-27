<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台首页控制器
class OrderController extends Controller
{
    // 加载前台订单
    public function index()
    {

    	//判断用户是否登录
    	if(session('huser'))
    	{
    		//获取登录用户ID
    		$id = session('huser')['id'];

    		//获取该用户的订单信息
    		$res = \DB::table('indent')->where('indent.uid', '=', $id)->get();

    		// dd($res);

    		//解析前台订单页面模板
    		return view('home.order.myOrder', ['title' => '我的订单', 'data' => $res]);

    	}
    	else
    	{
    		return back()->with(['hErrorInfo' => '请登录后查看我的开场']);
    	}






    }
}