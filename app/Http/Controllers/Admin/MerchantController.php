<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantController extends Controller
{
    // index 商户列表
    public function index(Request $request)
    {
    	$num = $request -> input('num', '10');

    	$keywords = $request -> input('keywords', '');

    	// 查询数据库
    	$data = \DB::table('users')->join('merchant', 'users.id', '=', 'merchant.uid')->select('users.*', 'merchant.check')->where('users.type', '=', '1')->where('userName', 'like', '%'.$keywords.'%')->paginate($num);

    	// 加载视图
    	return view('admin.merchant.index', ['title' => '商户列表', 'data' => $data, 'request' => $request->all()]);
    }

 	//state 更改状态 (禁用/启用)
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
    		return redirect('/admin/merchant/index')->with(['info' => '操作成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '操作失败']);
    	}
    }

    // check 商户审核（待审核商户）
    public function check(Request $request)
    {
    	// 多表查询
    	$data = \DB::table('merchant')->join('users', 'merchant.uid', '=', 'users.id')->select('users.id', 'users.userName', 'users.created_at', 'merchant.address', 'merchant.phone')->where('check', '0')->paginate(10);
    	
    	// 加载视图
    	return view('admin.merchant.check', ['title' => '商户列表', 'data' => $data]);
    }

    // merinfo 商户审核信息
    public function merinfo($id)
    {
    	// 多表查询
    	$data = \DB::table('merchant')->join('users', 'merchant.uid', '=', 'users.id')->select('merchant.*', 'users.userName')->where('merchant.uid', $id)->first();
    	
    	// 加载视图
    	return view('admin.merchant.merinfo', ['title' => '商户信息', 'data' => $data]);
    }

    // noreason 审核不通过
    public function noreason(Request $request)
    {
    	// 剔除冗余字段
    	$data = $request->except('_token');

    	// 定义审核未通过变量
    	$mer['check'] = 2;

    	// 将审核失败原因插入数据库
    	$res = \DB::table('reason')->insert($data);

    	// 判断
    	if($res)
    	{
    		// 修改merchant 的 check字段
    		$chant = \DB::table('merchant')->where('uid', $data['uid'])->update($mer);

    		// 判断
    		if($chant)
    		{
    			return redirect('/admin/merchant/check')->with(['info' => '操作成功']);
    		}
    		else
    		{
    			return back()->with(['info' => '操作失败']);
    		}
    	}
    	else
		{
			return back()->with(['info' => '操作失败']);
		}
    }

    // pass 审核通过
    public function pass($uid)
    {
    	// 定义审核通过变量
    	$mer['check'] = 1;

    	// 修改merchant 的 check字段
		$chant = \DB::table('merchant')->where('uid', $uid)->update($mer);

		// 判断
		if($chant)
		{
			return redirect('/admin/merchant/check')->with(['info' => '操作成功']);
		}
		else
		{
			return back()->with(['info' => '操作失败']);
		}
    }

    // loser 未通过审核的商户
    public function loser()
    {
    	// 多表查询
    	$data = \DB::table('merchant')->join('users', 'merchant.uid', '=', 'users.id')->select('users.id', 'users.userName', 'users.created_at', 'merchant.address', 'merchant.phone')->where('check', '2')->paginate(10);
    	
    	// 加载视图
    	return view('admin.merchant.nocheck', ['title' => '未通过审核商户', 'data' => $data]);
    }

    // lookinfo 未通过审核商户信息
    public function lookinfo($id)
    {
    	// 多表查询
    	$data = \DB::table('merchant')->join('users', 'merchant.uid', '=', 'users.id')->join('reason', 'merchant.uid', '=', 'reason.uid')->select('merchant.*', 'users.userName', 'reason.content')->where('merchant.uid', $id)->first();
    	
    	// 加载视图
    	return view('admin.merchant.lookinfo', ['title' => '商户信息', 'data' => $data]);
    }

    // merdelete 删除未通过审核的用户
    public function merdelete($id)
    {
        // 删除表users
        $user = \DB::table('users')->where('id', $id)->delete();

        // 判断
        if(!$user)
        {
            return back()->with(['info' => '删除失败，请重试']);
        }

        // 删除表merchant
        $mer = \DB::table('merchant')->where('uid', $id)->delete();

        // 判断
        if(!$mer)
        {
           return back()->with(['info' => '删除失败，请重试']); 
        }

        // 删除表reason
        $res = \DB::table('reason')->where('uid', $id)->delete();

        // 判断
        if($res)
        {
           return redirect('/admin/merchant/loser')->with(['info' => '删除成功']);
        }
        else
        {
           return back()->with(['info' => '删除失败，请重试']); 
        }

    }
    
}
