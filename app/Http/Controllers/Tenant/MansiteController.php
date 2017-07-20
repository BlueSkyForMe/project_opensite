<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MansiteController extends Controller
{
    // add 添加会场
    public function add()
    {
    	return view('tenant.mansite.index', ['title' => '添加会场']);
    }

    // insert 将会场信息插入数据库
    public function insert(Request $request)
    {
    	// 去除冗余
    	$data = $request->except('_token', 'long', 'width', 'height', 'pillar', 'feast', 'desk');

    	// 定义uid
    	$data['uid'] = $request->uid;

    	// 拼接会场面积字段
    	if($request->pillar == '0')
    	{
    		// 无立柱式
    		$data['meetArea'] = $data['meetArea'].'平方米'.'('.$request->long.'*'.$request->width.'*'.$request->height.')/无立柱';
    	}
    	else
    	{
    		// 有立柱式
    		$data['meetArea'] = $data['meetArea'].'平方米'.'('.$request->long.'*'.$request->width.'*'.$request->height.')/有立柱';
    	}

    	// 拼接容纳人数字段
    	$data['meetPerson'] = $request->feast.'(宴会式)/'.$request->desk.'(课桌式)';

    	// 处理图片
    	if($request->hasFile('meetImg'))
    	{
    		if($request->file('meetImg'))
    		{
    			$ext = $request->file('meetImg')->extension();

    			// 创建唯一的图片名称
    			do{
    				$filename = time().mt_rand(100000,999999).'.'.$ext;
    			}while(file_exists('./uploads/meetimg/'.$filename));

    			// 移动图片
    			$request->file('meetImg')->move('./uploads/meetimg', $filename);
    			
    			$data['meetImg'] = $filename;	
    		}
    	}

    	// 插入数据库
    	$res = \DB::table('meeting')->insert($data);

    	if($res)
    	{
    		return redirect('tenant/mansite/show/'.$request->uid)->with(['info' => '添加成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '添加失败']);
    	}
    	
    }

    // show 查看会场信息
    public function show($uid)
    {
    	// 根据登录的商户查询
    	$data = \DB::table('meeting')->where('uid', $uid)->get();

    	return view('tenant.mansite.show', ['title' => '会场信息', 'data' => $data]);
    }
}
