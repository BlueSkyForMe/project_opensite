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

    	// 获取session
    	$data = session('huser');
    	
    	// 判断是否登录
    	if(!$data)
    	{
    		echo "<script>alert('你还未登录,请登录后再来');location.href='/home/index'</script>";
    	}else
    	{

    		$id = $data['id'];

    		$res = \DB::table('indent')->where('uid', $id)->get();
    	
    		// dd($res);/



	    		//解析前台订单页面模板
	    		return view('home.order.myOrder', ['title' => '我的订单', 'res' => $res]);
    		// }





    	}
    }

    public function add(Request $request)
    {
    	dd($request->all());
    }
}