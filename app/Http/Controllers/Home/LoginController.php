<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台登录控制器
class LoginController extends Controller
{

	//前台登录功能
	public function login(Request $request)
	{
		//接收前台提交的数据,并去除无用信息
    	$data = $request->except('_token', 'x', 'y', 'code');



    	//获取手机号或者邮箱
    	if(array_key_exists('phone', $data))
    	{
    		$res = \DB::table('users')->where('phone', $data['phone'])->first();

    		//"这是手机登录";
    		$oldPassword = decrypt($res->password);

    		if($data['password'] == $oldPassword)
    		{

    			//密码正确,将最后登录时间更新数据库
    			\DB::table('users')->where('phone', $data['phone'])->update(['lastTime' => date('Y-m-d H:i:s')]);

    			//将用户信息存入session
	    		session(['huserName' => $res->userName]);

	    		 // 判断是否记住我
	            if($request->has('rememberMe'))
	            {
	                // 存入cookie；
	                \Cookie::queue('rememberMe', $res->rememberToken, 10*6*24*30);
	            }

	    		//自动跳转到首页
	    		return redirect('/home/index');
    		}
    		else
    		{
    			return back()->with(['hinfo' => '账号或密码不正确']);
    		}

    	}
    	else
    	{
    		if(array_key_exists('email', $data))
	    	{
	    		$res = \DB::table('users')->where('email', $data['email'])->first();

	    		// echo "这是邮箱登录";
	    		$oldPassword = decrypt($res->password);

	    		if($data['password'] == $oldPassword)
	    		{
	    			//密码正确,将最后登录时间更新数据库
	    			\DB::table('users')->where('email', $data['email'])->update(['lastTime' => date('Y-m-d H:i:s')]);

	    			//将用户信息存入session
		    		session(['huserName' => $res->userName]);

		    		//自动跳转到首页
		    		return redirect('/home/index');
	    		}
	    		else
	    		{
	    			return back()->with(['hinfo' => '账号或密码不正确']);
	    		}
	    	}
    	}	
	}

	//前台退出功能
	public function logout(Request $request)
	{
		// 清空session
    	$request->session()->forget('huserName');

    	return redirect('/home/index');
	}
}
