<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    // add 加载添加页面
    public function add()
    {
        // 判断管理员权限
        if(session('master')->auth < 1)
        {
            return back()->with(['info' => '添加管理员需要超级权限']);
        }

    	return view('admin.manage.add', ['title' => '添加管理员']);
    }

    // insert 执行用户添加
    public function insert(Request $request)
    {
    	// 判断管理员权限
        if(session('master')->auth < 1)
        {
            return back()->with(['info' => '添加管理员需要超级权限']);
        }   

    	// 验证表单
    	$this->validate($request, 
    		[
			    'userName' => 'required|unique:manage|min:4|max:12',
			    'email' => 'required|email|unique:manage',
			    'password' => 'required|min:6|max:18',
			    're_password' => 'same:password',
			    'photo' => 'image'
		    ],
		    [
		    	'userName.required' => '用户名不能为空',
		    	'userName.unique' => '用户名已存在',
		    	'userName.min' => '用户名不能少于四个字符',
		    	'userName.max' => '用户名不能超过十二个字符',
		    	'email.required' => '邮箱不能为空',
		    	'email.email' => '请正确输入邮箱',
		    	'email.unique' => '该邮箱已存在',
		    	'password.required' => '密码不能为空',
		    	'password.min' => '密码能少于六个字符',
		    	'password.max' => '密码不能超过十八个字符',
		    	're_password.same' => '两次输入的密码不一致',
		    	'photo.image' => '请正确上传图片'
		    ]);

    	// 清除token 和 确认密码
    	$data = $request->except('_token', 're_password');

    	// 判断是否上传图像
		if($request->hasFile('photo'))
		{
			if($request->file('photo')->isValid())
			{
				// 生成图像名称
				$extension = $request->file('photo')->extension();
				$fliename = time().mt_rand(100000,999999).'.'.$extension;

				// 移动图片
				$request -> file('photo') -> move('./uploads/photo', $fliename);

				$data['photo'] = $fliename;
			}
		}
		
		// 获取创建时间和更新时间并压入数组
		$data['created_at'] = date('Y-m-d H:i:s');

    	// 处理token 生成随机字符串
		$data['rememberToken'] = str_random(50);

    	// 密码加密
    	$data['password'] = encrypt($data['password']);

    	// 添加创建时间
    	$data['created_at'] = date('Y-m-d H:i:s');

    	// 插入数据库
    	$res = \DB::table('manage')->insert($data);

    	if($res)
    	{
    		return redirect('/admin/manage/index')->with(['info' => '添加成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '添加失败']);
    	}
    }

    // index 用户列表
    public function index(Request $request)
    {
    	$num = $request -> input('num', '10');

    	$keywords = $request -> input('keywords', '');

    	// 查询数据库
    	$data = \DB::table('manage')->where('auth', '<', '1')->where('username', 'like', '%'.$keywords.'%')->paginate($num);

    	return view('admin.manage.index', ['title' => '用户列表', 'data' => $data, 'request' => $request->all()]);

    	return view('admin.manage.index', ['title' => '用户列表', 'data' => $data]);
    }

    // edit 修改用户页面
    public function edit(Request $request)
    {
        // 判断管理员权限
        if(session('master')->auth < 1)
        {
            return back()->with(['info' => '很抱歉，您的权限不够']);
        }

    	// 根据id查询相应的数据
    	$data = \DB::table('manage')->where('id', $request->id)->first();

    	// 密码解密
    	$data->password = decrypt($data->password);

    	return view('admin.manage.edit', ['title' => '编辑用户', 'data' => $data]);
    }

    // update 修改
    public function update(Request $request, $id)
    {
        // 判断管理员权限
        if(session('master')->auth < 1)
        {
            return back()->with(['info' => '很抱歉，您的权限不够']);
        }

    	// 根据ID查询数据库
    	$arr = \DB::table('manage')->where('id', $id)->first();

    	// 判断是否修改邮箱
    	if($arr->email == $request->email)
    	{
    		// 验证表单 无需验证邮箱
	    	$this->validate($request, 
	    		[
				    'password' => 'required|min:6|max:18',
				    're_password' => 'same:password',
				    'photo' => 'image'
			    ],
			    [
			    	'password.required' => '密码不能为空',
			    	'password.min' => '密码能少于六个字符',
			    	'password.max' => '密码不能超过十八个字符',
			    	're_password.same' => '两次输入的密码不一致',
			    	'photo.image' => '请正确上传图片'
			    ]);
    	}
    	else
    	{
    		// 验证表单 需要验证表单
	    	$this->validate($request, 
	    		[
				    'email' => 'required|email|unique:manage',
				    'password' => 'required|min:6|max:18',
				    're_password' => 'same:password',
				    'photo' => 'image'
			    ],
			    [
			    	'email.required' => '邮箱不能为空',
			    	'email.email' => '请正确输入邮箱',
			    	'email.unique' => '该邮箱已存在',
			    	'password.required' => '密码不能为空',
			    	'password.min' => '密码能少于六个字符',
			    	'password.max' => '密码不能超过十八个字符',
			    	're_password.same' => '两次输入的密码不一致',
			    	'photo.image' => '请正确上传图片'
			    ]);
    	}

    	// 清除token 和 确认密码
    	$data = $request->except('_token', 're_password');

    	// 密码加密
    	$data['password'] = encrypt($data['password']);

    	// 判断是否上传图像
		if($request->hasFile('photo'))
		{
			if($request->file('photo')->isValid())
			{
				// 生成图像名称
				$extension = $request->file('photo')->extension();
				$fliename = time().mt_rand(100000,999999).'.'.$extension;

				// 移动图片
				$request -> file('photo') -> move('./uploads/photo', $fliename);

				$data['photo'] = $fliename;

				// 获取原图片名称
				$oldphoto = \DB::table('manage')->where('id', $request->id)->first()->photo;

				// 判断
				if(file_exists('./uploads/photo/'.$oldphoto) && $oldphoto != 'default.jpg')
				{	
					// 删除图片
					unlink('./uploads/photo/'.$oldphoto);
				}
			}
		}

		// 执行修改
		$res = \DB::table('manage')->where('id', $id)->update($data);

		if($res)
    	{
    		return redirect('/admin/manage/index')->with(['info' => '更新成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '更新失败']);
    	}	
    		
    }

    // delete 删除
    public function delete(Request $request)
    {
    	// 判断管理员权限
        if(session('master')->auth < 1)
        {
            return back()->with(['info' => '很抱歉，您的权限不够']);
        }

    	// 执行删除
    	$res = \DB::table('manage')->where('id', $request->id)->delete();

    	if($res)
    	{
    		return redirect('/admin/manage/index')->with(['info' => '删除成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '删除失败']);
    	}

    }

    // state 更改状态
    public function state(Request $request)
    {
    	// 判断管理员权限
        if(session('master')->auth < 1)
        {
            return back()->with(['info' => '很抱歉，您的权限不够']);
        }

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
    	$res = \DB::table('manage')->where('id', $request->id)->update($data);

    	if($res)
    	{
    		return redirect('/admin/manage/index')->with(['info' => '操作成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '操作失败']);
    	}

    }
}
