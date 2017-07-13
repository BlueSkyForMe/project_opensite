<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantController extends Controller
{
    // register 创建商户账号
    public function register()
    {	
    	// 商户注册页面
    	return view('home.merchant.register', ['title' => '创建商家账户']);
    }

    // ajax
    public function ajaxrename(Request $request)
    {	
    	// 定义一个变量存放返回码
    	$data = '0';

    	// 接收单位名称
    	$userName = $request->userName;
    	// 接收联系方式
    	$contact = $request->contact;

    	// 判断单位名称
    	if($userName)
    	{
    		// 定义正则模式
	    	$patt = "/^[\x{4e00}-\x{9fa5}]{3,20}/u";
	    	// 正则匹配
	    	preg_match($patt, $userName, $res);

	    	if($res)
	    	{	
	    		// 单位名称是否被注册过
	    		$arr = \DB::table('users')->where('userName', $userName)->first();

	    		if($arr)
	    		{
	    			$data = '3';
	    		}
	    		else
	    		{
	    			$data = '2';
	    		}
	    	}
	    	else
	    	{
	    		$data = '1';
	    	}
    	}

    	// 判断联系方式
    	if($contact)
    	{
    		// 验证是否是手机号
	    	$patt = "/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/";
	    	// 正则匹配
	    	preg_match($patt, $contact, $res);

	    	// 判断
	    	if($res)
	    	{
	    		// 验证是否已被注册
	    		$arr = \DB::table('users')->where('phone', $contact)->first();

	    		// 判断
	    		if($arr)
	    		{
	    			// 手机号已被注册
	    			$data = '6';
	    		}
	    		else
	    		{
	    			// 手机号可用
	    			$data = '5';
	    		}
	    	}
	    	else
	    	{
	    		// 验证邮箱
	    		$patt = "/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/";
	    		// 正则匹配
	    		preg_match($patt, $contact, $res);

	    		// 判断
	    		if($res)
	    		{
	    			// 判断邮箱是否被注册
	    			$arr = \DB::table('users')->where('email', $contact)->first();

	    			// 判断
	    			if($arr)
	    			{
	    				// 邮箱已被注册
	    				$data = '7';
	    			}
	    			else
	    			{
	    				// 邮箱可用
	    				$data = '8';
	    			}
	    		}
	    		else
	    		{
	    			// 输入格式有误
	    			$data = '9';
	    		}
	    	}
    	}

    	// 以json数组返回
    	return response()->json($data);
    }

    // insert 插入数据库
    public function insert(Request $request)
    {
    	// dd($request->all());

    	// =========== 需要验证验证码 ===============

    	// 剔除冗余
    	$data = $request->only('userName', 'password');
    	
    	// 判断联系方式
    	$str = $request->contact;

    	// 验证是否是手机号
    	$patt = "/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/";

    	// 正则匹配
    	preg_match($patt, $str, $res);
    	
    	// 判断
    	if($res)
    	{	
    		// 是手机号
    		$data['phone'] = $str;
    	}
    	else
    	{
    		// 反之是邮箱
    		$data['email'] = $str;
    	}

    	// 密码加密
    	$data['password'] = encrypt($data['password']);

    	// 记住登录密串
    	$data['rememberToken'] = str_random(50);

    	// 注册类型为商户
    	$data['type'] = 1;

    	// 创建时间和最后登录时间
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['lastTime'] = date('Y-m-d H:i:s');

    	// 执行插入数据库
    	$id = \DB::table('users')->insertGetId($data);

    	if($id)
    	{
    		return redirect('/home/merchant/fill/'.$id);
    	}
    	else
    	{
    		// 闪存session
    		$request->flash();

    		return "<script>alert('创建失败，请核对！');location.href='/home/merchant/register'</script>";
    	}

    }

    // fill 填写商户信息
    public function fill($uid)
    {
        // 查询城市、区县
        $cdata = \DB::table('district')->where('level', '1')->get();

        // 份配视图
    	return view('home.merchant.fill', ['title' => '填写商户信息', 'uid' => $uid, 'cdata' => $cdata]);
    }

    // ajaxcity 城市联动
    public function ajaxcity(Request $request)
    {
        // 获取upid
        $upid = $request->upid;

        // 查询数据库
        $data = \DB::table('district')->where('upid', $upid)->get();

        // 以json返回
        return response()->json($data);
    }

    // add 添加商户信息
    public function add(Request $request)
    {
        // 去除冗余
        $data = $request->except('_token', 'city', 'county', 'x', 'y');

        // 查询省市和城市
        $city = \DB::table('district')->where('id', $request->city)->first();
        $county = \DB::table('district')->where('id', $request->county)->first();

        // 拼接地址
        $data['address'] = $city->name.$county->name.$data['address'];

        // 将包含的服务拼成字符串
        $data['servers'] = implode(',', $data['servers']);

        // 处理图片
        if($request->hasFile('img'))
        {
            if($request->file('img')->isValid())
            {
                // 生成图像名称
                $extension = $request->file('img')->extension();
                $fliename = time().mt_rand(100000,999999).'.'.$extension;

                // 移动图片
                $request -> file('img') -> move('./uploads/img', $fliename);

                $data['img'] = $fliename;
            }
        }

        // 添加至数据库
        $res = \DB::table('merchant')->insert($data);

        if($res)
        {
            return redirect("/home/merchant/attest");
        }
        else
        {
            return "<script>alert('添加失败，请核对！');location.href='/home/merchant/register'</script>";
        }
    }

    // attest 认证中
    public function attest()
    {
        // 加载页面
        return view('home.merchant.attest', ['title' => '信息审核中']);
    }
}
