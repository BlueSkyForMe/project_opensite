<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // login 登录页面
    public function login()
    {   
        // 验证是否记住登录状态
        $rememberMe = \Cookie::get('rememberMe');

        if($rememberMe)
        {
            // 根据记住我的字段查询数据库
            $admin = \DB::table('manage')->where('rememberToken', $rememberMe)->first();

            $admin->password = decrypt($admin->password);

            return view('admin.login.login', ['title' => '后台登录', 'data' => $admin]);
        }

    	return view('admin.login.login', ['title' => '后台登录']);
    }

    // doLogin 执行登录
    public function doLogin(Request $request)
    {
        // 验证是否记住我
        $rememberMe = \Cookie::get('rememberMe');

        if($rememberMe)
        {   

            // 根据记住我的字段查询数据库
            $admin = \DB::table('manage')->where('rememberToken', $rememberMe)->first();

            // 记录每次的登录时间
            $arr['lastTime'] = date('Y-m-d H:i:s');

            // 插入数据库
            $tim = \DB::table('manage')->where('userName', $admin->userName)->update($arr);

            // 存入session
            session(['master' => $admin]);

            // 跳转
            return redirect('/admin/index')->with(['info' => '登录成功']);
        }

    	// 消除token
    	$data = $request->except('_token');

    	// 获取session中的验证码
    	$code = session('code');

    	// 验证验证码
    	if($code != $data['code'])
    	{
    		// 闪存session
    		$request->flash();

    		return back()->with(['info' => '验证码错误']);
    	}

    	// 根据用户名查询数据库
    	$res = \DB::table('manage')->where('userName', $data['userName'])->first();

    	if(!$res)
    	{
    		return back()->with(['info' => '用户名不存在']);
    	}

    	// 密码解密
    	$password = decrypt($res->password);

    	// 验证管理员密码
    	if($data['password'] != $password)
    	{
    		return back()->with(['info' => '用户名或密码错误']);
    	}

        // 判断状态
        if($res->status == 0)
        {
            return back()->with(['info' => '很抱歉！此账号已被禁用，请联系超级管理员']);
        }

        // 记录每次的登录时间
        $arr['lastTime'] = date('Y-m-d H:i:s');

        // 插入数据库
        $tim = \DB::table('manage')->where('userName', $data['userName'])->update($arr);

        if($tim)
        {
            // 将数据存入session
            session(['master' => $res]);

            // 判断是否记住我
            if($request->has('rememberMe'))
            {
                // 存入cookie；
                \Cookie::queue('rememberMe', $res->rememberToken, 10);
            }
            
            // 跳转
            return redirect('/admin/index')->with(['info' => '登录成功']);
        }
        else
        {
            return back()->with(['info' => '登录失败']);
        }
    	
    }

    // logout 退出登录
    public function logout(Request $request)
    {
    	// 清空session
    	$request->session()->forget('master');

    	return redirect('/admin/login')->with(['info' => '退出成功']);
    }
    
}
