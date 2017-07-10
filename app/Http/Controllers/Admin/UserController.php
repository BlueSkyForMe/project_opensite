<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//用于显示前台普通用户的信息
class UserController extends Controller
{
    //显示前台普通用户
    public function index(Request $request)
    {

    	$num = $request -> input('num', '10');

    	$keywords = $request -> input('keywords', '');

    	// 查询数据库
    	$data = \DB::table('users')->where('type', '0')->where('userName', 'like', '%'.$keywords.'%')->paginate($num);

    	// dd($data);

    	return view('admin.user.index', ['title' => '用户列表', 'data' => $data, 'request' => $request->all()]);

    }

    //禁用与启用功能(state 更改状态)
    public function state(Request $request)
    {

    	// 获取状态
    	$data['status'] = $request->status;

    	// 修改状态
    	if($data['status'] == 1)
    	{
    		$data['status'] = 0;
    	}
    	else
    	{
    		$data['status'] = 1;
    	}	

    	// 执行修改
    	$res = \DB::table('users')->where('id', $request->id)->update($data);

    	if($res)
    	{
    		return redirect('/admin/user/index')->with(['userInfo' => '操作成功']);
    	}
    	else
    	{
    		return back()->with(['userInfo' => '操作失败']);
    	}

    }

}
