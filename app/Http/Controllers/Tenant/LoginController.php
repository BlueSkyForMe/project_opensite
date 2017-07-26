<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // logout 商户退出登录
    public function logout(Request $request)
    {
    	// 清空user 的 session
    	$request->session()->forget('huser');

    	// 清空mer 的 session
    	$request->session()->forget('hmer');

    	// 返回首页
    	return redirect('/home/index');
    }
}
