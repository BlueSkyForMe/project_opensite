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
    	$res = \DB::table('sitebase')->where('uid', session('hmer')->id)->get();
        
    	if(!$res->isEmpty())
    	{
    		// 信息已完善
    		return redirect('/tenant/index')->with(['info' => '您的信息已完善。如需修改，请点击修改信息']);
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
        // 判断是否以完善信息
        $res = \DB::table('sitebase')->where('uid', session('hmer')->id)->get();
        
        if($res->isEmpty())
        {
            // 信息已完善
            return redirect('/tenant/index')->with(['info' => '请先完善信息']);
        }

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

    // addImg 上传商户展示图
    public function addImg($uid)
    {   
        // 判断是否已上传过
        $res = \DB::table('merImg')->where('uid', $uid)->get();

        if(!$res->isEmpty())
        {
            // 已上传过
            return redirect('/tenant/index')->with(['info' => '您已上传过展示图，如需更新，请点击更新']);
        }

        return view('tenant.detail.addImg', ['title' => '展示图上传', 'uid' => $uid]);
    }

    // insertImg  执行添加
    public function insertImg(Request $request)
    {
        $file = $request->file('img');

        // 遍历上传
        foreach ($file as $key => $value) 
        {       
           //public 文件夹下面建 /uploads/merimg 文件夹 
           $destinationPath = './uploads/merimg/';   

           // 获取后缀名
           $extension = $value->getClientOriginalExtension();

           // 重命名  
           $fliename = time().mt_rand(100000,999999).'.'.$extension;

           // 移动图片 
           $value->move($destinationPath, $fliename);  

           // 定义字段
           $data['img'] = $fliename;
           $data['uid'] = $request->uid;

           // 插入数据库
           \DB::table('merImg')->insert($data);                        
         }

         return redirect('/tenant/index')->with(['info' => '上传成功']);
    }

    // editImg 更新展示图
    public function editImg($uid)
    {
        // 判断是否已上传过
        $res = \DB::table('merImg')->where('uid', $uid)->get();

        if($res->isEmpty())
        {
            // 没有上传过图片
            return redirect('/tenant/index')->with(['info' => '您还没有上传展示图']);
        }

        return view('tenant.detail.editImg', ['title' => '更新展示图', 'uid' => $uid]);
    }

    // updateImg 执行修改
    public function updateImg(Request $request)
    {
        // 定义uid
        $uid = $request->uid;

        // 根据uid 查出所有的原图
        $oldimg = \DB::table('merImg')->where('uid', $uid)->get();

        // 遍历删除原图
        foreach($oldimg as $key => $value)
        {
            // 判断是否存在于目录中
            if(file_exists('./uploads/merimg/'.$value->img))
            {   
                // 删除原图片
                unlink('./uploads/merimg/'.$value->img);
            } 
        }

        // 删除数据
        \DB::table('merImg')->where('uid', $uid)->delete();
        
        // 定义文件
        $file = $request->file('img');

        // 遍历上传
        foreach ($file as $key => $value) 
        {       
           //public 文件夹下面建 /uploads/merimg 文件夹 
           $destinationPath = './uploads/merimg/';   

           // 获取后缀名
           $extension = $value->getClientOriginalExtension();

           // 重命名  
           $fliename = time().mt_rand(100000,999999).'.'.$extension;

           // 移动图片 
           $value->move($destinationPath, $fliename);  

           // 定义字段
           $data['img'] = $fliename;
           $data['uid'] = $request->uid;

           // 插入数据库
           \DB::table('merImg')->insert($data);                        
         }

        return redirect('/tenant/index')->with(['info' => '更新成功']);        
    }
}
