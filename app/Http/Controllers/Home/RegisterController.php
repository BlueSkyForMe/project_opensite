<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台注册控制器
class RegisterController extends Controller
{
    //检测注册信息是否合格, 合法则存入数据库
    public function insert(Request $request)
    {
    	
    	//接收前台提交的数据,并去除无用信息
    	$data = $request->except('_token', 'x', 'y', 'code', 'phonecode');

    	// dd($data);

    	//密码加密
    	$data['password'] = encrypt($data['password']);

    	//补全字段信息
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['rememberToken'] = str_random(50);
    	$data['lastTime'] = date('Y-m-d H:i:s');

    	//将注册信息存入数据库
    	$res = \DB::table('users')->insert($data);

    	if($res)
    	{
    		
    		// 将用户信息存入session
    		session(['huser' => $data]);

    		//自动跳转到首页
    		return redirect('/home/index');

    	}
    	else
    	{
    		 return back()->with(['hinfo' => '注册失败']);
    	}
		
    }


    //ajax验证
    public function ajax(Request $request)
    {
    	$content = $request->pe;
    	$re_name = $request->userName;
    	$cod = $request->cod;

    	//验证手机号或邮箱
    	if($content)
    	{
    		//验证是手机号或邮箱格式是否正确
	    	$patt = " /^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/";
	    	preg_match($patt,$content,$res);

	    	if($res)
	    	{
	    		//查询数据库检查该手机号是否存在
	    		$result = \DB::table('users')->where('phone', $content)->first();

	    		if($result)
	    		{
	    			//该手机已经注册
	    			$code = 1;
	    		}
	    		else
	    		{
	    			//该手机号可用
	    			$code = 2;
	    		}
	    	}
	    	else
	    	{
	    		$patt1 = "/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/";
	    		preg_match($patt1,$content,$res1);

	    		if($res1)
	    		{
	    			//查询数据库检查该手机号是否存在
		    		$result1 = \DB::table('users')->where('email', $content)->first();

		    		if($result1)
		    		{
		    			//该邮箱已经注册
		    			$code = 3;
		    		}
		    		else
		    		{
		    			//该邮箱可用
		    			$code = 4;
		    		}
	    		}
	    		else
	    		{
	    			//输入内容不合法
	    			$code = 0;
	    		}

	    	}
    	}

    	//验证用户名
    	if($re_name)
    	{
    		//验证用户名(3 ~ 16位, 不能包含@ #)
	    	$patt = "/^[^@#]{3,16}$/";	
	    	preg_match($patt,$re_name,$res);

	    	if($res)
	    	{
	    		//查询数据库检查该手机号是否存在
	    		$result = \DB::table('users')->where('userName', $re_name)->first();

	    		if($result)
	    		{
	    			//该用户名已经注册
	    			$code = 5;
	    		}
	    		else
	    		{
	    			//该用户名可用
	    			$code = 6;
	    		}
	    	}
	    	else
	    	{
	    		//该用户名必须是(3 ~ 16位, 不能包含@ #)
	    		$code = 7;
	    	}
    	}

    	//验证码
    	if($cod)
    	{
    		//判断验证码是否正确
	    	$code = session('code');
	    	if($cod != $code)
	    	{
	    		//验证码错误
	    		$code = 8;
	    	}
	    	else
	    	{
	    		//验证码正确
	    		$code = 9;
	    	}

    	}

    	echo json_encode($code);

    }

}


