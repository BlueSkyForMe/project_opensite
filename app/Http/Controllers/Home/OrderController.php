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
    	//解析前台订单页面模板
    	return view('home.order.myOrder', ['title' => '我的订单']);
    }
}