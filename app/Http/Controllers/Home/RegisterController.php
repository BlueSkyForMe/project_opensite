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
    	// $data = $request->except('_token', 'x', 'y');
    	
    	//判断验证码是否
    	//正则判断是手机注册还是邮箱注册
    	// $pe = $data['phone']);
		
    }

    //ajax验证
    public function ajax(Request $request)
    {
    	$content = $request->pe;

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

    	echo json_encode($code);
    }
}


