<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台首页控制器
class IndexController extends Controller
{
    // 加载前台首页
    public function index()
    {
    	// // 验证是否记住登录状态
     //    $rememberMe = \Cookie::get('rememberMe');

     //    if($rememberMe)
     //    {
     //        // 根据记住我的字段查询数据库
     //        $res = \DB::table('users')->where('rememberToken', $rememberMe)->first();

     //        //将用户信息存入session
	    // 	session(['huserName' => $res->userName]);

	    // 	//自动跳转到首页
	    // 	return redirect('/home/index');
     //    }

    	//解析前台页面模板
    	return view('home.index.index');
    }
}
