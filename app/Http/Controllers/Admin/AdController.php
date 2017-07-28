<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    //加载友情链接页
    public function index(Request $request)
    {
    	// 查询数据库
    	$data = \DB::table('ad')->get();

    	// dd($data);

    	return view('admin.index.ab', ['title' => '友情链接', 'data' => $data, 'request' => $request->all()]);
    }

    // 加载添加页
    public function add()
    {
    	// dd(111);
    	return view('admin.ad.add', ['title' => '添加友情链接']);
    }

    // 执行添加
    public function insert(Request $request)
    {
    	// dd($request->all());
    	// 验证表单
    	$this->validate($request,
    		[
			    'ad_name' => 'required|unique:ad|max:10',
			    'ad_site' => 'required|unique:ad',
			    'ad_count' => 'required',
			    'ad_area' => 'required',
			    'ad_rencount' => 'required',
			    'ad_phone' => 'required',
			    'ad_url' => 'required',
			    'ad_image' => 'image'
		    ],
		    [
		    	'ad_name.required' => '广告名不能为空',
		    	'ad_name.unique' => '广告名已存在',
		    	'ad_name.max' => '广告名不能超过十个字符',
		    	'ad_site.required' => '公司地址不能为空',
		    	'ad_count.required' => '会场数量不能为空',
		    	'ad_area.required' => '会场面积不能为空',
		    	'ad_rencount.required' => '会场面积不能为空',
		    	'ad_phone.required' => '联系电话不能为空',
		    	'ad_url.required' => '链接地址不能为空不能为空',
		    	'ad_image.image' => '请正确上传图片'
		    ]);
    	$data = $request->except('_token');
    	// dd($data);


    	// 判断是否上传图像
		if($request->hasFile('ad_image'))
		{
			if($request->file('ad_image')->isValid())
			{
				// 生成图像名称
				$extension = $request->file('ad_image')->extension();
				$fliename = time().mt_rand(100000,999999).'.'.$extension;

				// 移动图片
				$request -> file('ad_image') -> move('./uploads/photo', $fliename);

				$data['ad_image'] = $fliename;
			}
		}

		// dd($data);

		// 插入数据库
    	$res = \DB::table('ad')->insert($data);

    	if($res)
    	{
    		return redirect('/admin/ad/index')->with(['info' => '添加成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '添加失败']);
    	}
    }


    // 加载修改页面
    public function edit(Request $request)
    {
    	// dd($request->all());

    	// 根据id查询相应的数据
    	$data = \DB::table('ad')->where('id', $request->id)->first();
    	// dd($data);

    	return view('admin.ad.edit', ['title' => '修改友情链接页', 'data' => $data]);
    }


    // 执行修改页面
    public function update(Request $request, $id)
    {

    	$data = $request->all();

    	// 清除token
    	$data = $request->except('_token');
    	// dd($data);

    	// 验证表单
    	$this->validate($request,
    		[
			    'ad_name' => 'required|max:10',
			    'ad_site' => 'required',
			    'ad_count' => 'required',
			    'ad_area' => 'required',
			    'ad_rencount' => 'required',
			    'ad_phone' => 'required',
			    'ad_url' => 'required',
			    'ad_image' => 'image'
		    ],
		    [
		    	'ad_name.required' => '广告名不能为空',
		    	'ad_name.unique' => '广告名已存在',
		    	'ad_name.max' => '广告名不能超过十个字符',
		    	'ad_site.required' => '公司地址不能为空',
		    	'ad_count.required' => '会场数量不能为空',
		    	'ad_area.required' => '会场面积不能为空',
		    	'ad_rencount.required' => '会场面积不能为空',
		    	'ad_phone.required' => '联系电话不能为空',
		    	'ad_url.required' => '链接地址不能为空不能为空',
		    	'ad_image.image' => '请正确上传图片'
		    ]);

    	


    	// 判断是否上传图像
		if($request->hasFile('ad_image'))
		{
			if($request->file('ad_image')->isValid())
			{
				// 生成图像名称
				$extension = $request->file('ad_image')->extension();
				$fliename = time().mt_rand(100000,999999).'.'.$extension;

				// 移动图片
				$request -> file('ad_image') -> move('./uploads/photo', $fliename);

				$data['ad_image'] = $fliename;



				// 获取原图片名称
				$oldphoto = \DB::table('ad')->where('id', $request->id)->first()->ad_image;

				// 判断
				if(file_exists('./uploads/photo/'.$oldphoto) && $oldphoto != 'default.jpg')
				{	
					// 删除图片
					unlink('./uploads/photo/'.$oldphoto);
				}
			}
		}

		// 执行修改
		$res = \DB::table('ad')->where('id', $id)->update($data);

		if($res)
    	{
    		return redirect('/admin/ad/index')->with(['info' => '更新成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '更新失败']);
    	}	

    }

    // 执行删除页
    public function delete(Request $request)
    {
    	$res = \DB::table('ad')->where('id', $request->id)->delete();

    	if($res)
    	{
    		return redirect('/admin/ad/index')->with(['info' => '删除成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '删除失败']);
    	}
    }

}
