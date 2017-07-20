<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    // complete 完善商户信息
    public function complete()
    {
    	// 判断是否以完善信息
    	$res = \DB::table('sitebase')->where('uid', session('hmer')->id);
    	if($res)
    	{
    		// 信息已完善
    		return back()->with(['info' => '您的信息已完善。如需修改，请点击修改信息']);

    	}

    	return view('tenant.detail.complete', ['title' => '基本信息']);
    }

    // add 添加基本信息
    public function add(Request $request)
    {
    	// 剔除冗余
    	$data = $request->except('_token');

    	// 判断是否选择配套服务
    	if($request->support)
    	{
    		// 将support字段拼成字符串
    		$data['support'] = implode(',', $data['support']);
    	}

    	// 获取uid 
    	$data['uid'] = session('hmer')->id;

    	// 插入数据库
    	$res = \DB::table('sitebase')->insert($data);

    	if($res)
    	{
    		return redirect('/tenant/index')->with(['info' => '完善成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '完善失败，请仔细核对']);
    	}
    }

    // edit 修改信息视图
    public function edit($uid)
    {
    	// 根据uid查询数据库
    	$data = \DB::table('sitebase')->where('uid', $uid)->first();

    	// 将配套服务拆成数组
    	$support = explode(',', $data->support);

    	// 加载视图
    	return view('tenant.detail.edit', ['title' => '修改信息', 'data' => $data, 'support' => $support]);
    }

    // update 执行修改
    public function update(Request $request)
    {
    	// 去除冗余
    	$data = $request->except('_token');

    	// 定义uid
    	$uid = $request->uid;

    	// 判断是否选择配套服务
    	if($request->support)
    	{
    		$data['support'] = implode(',', $data['support']);
    	}
    	
    	// 修改数据库
    	$res = \DB::table('sitebase')->where('uid', $uid)->update($data);

    	// 判断
    	if($res)
    	{
    		return redirect('/tenant/index')->with(['info' => '修改成功']);
    	}
    	else
    	{
    		return redirect('/tenant/index')->with(['info' => '修改失败']);
    	}
    }
}
