<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // add 加载添加页面
    public function add()
    {
    	return view('admin.user.add', ['title' => '添加管理员']);
    }

    // insert 执行用户添加
    public function insert(Request $request)
    {
    	// 验证表单
    	$this->validate($request, 
    		[
			    'userName' => 'required|unique:users|min:6|max:18',
			    'phone' => 'required|unique:users|min:11|max:11',
			    'email' => 'required|unique:users|email',
			    'password' => 'required',
			    're_password' => 'same:password',

		    ],
		    [
		    	'userName.required' => '用户名不能为空',
		    	'userName.unique' => '用户名已存在',
		    	'userName.min' => '用户名不能少于六个字符',
		    	'userName.max' => '用户名不能超过十八个字符',
		    	'phone.required' => '手机号不能为空',
		    	'phone.unique' => '该手机号已存在',
		    	'phone.min' => '请正确输入手机号',
		    	'phone.max' => '请正确输入手机号',
		    	'email.required' => '邮箱不能为空',
		    	'email.unique' => '该邮箱已存在',
		    	'email.email' => '请正确输入邮箱',
		    	'password.required' => '密码不能为空',
		    	're_password.same' => '两次输入的密码不一致'
		    ]);

    	// 清除token
    	$data = $request->except('_token', 're_password');

    	// 加管理员权限
    	$data['auth'] = 1;

    	// 密码加密
    	$data['password'] = encrypt($data['password']);

    	// 添加创建时间
    	$data['created_at'] = date('Y-m-d H:i:s');

    	// 插入数据库
    	$res = \DB::table('users')->insert($data);

    	if($res)
    	{
    		return redirect('/admin/user/index')->with(['info' => '添加成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '添加失败']);
    	}
    }

    // index 用户列表
    public function index(Request $request)
    {
    	// 查询数据库
    	$data = \DB::table('users')->get();

    	return view('admin.user.index', ['title' => '用户列表', 'data' => $data]);
    }

    // edit 修改用户页面
    public function edit(Request $request)
    {
    	// 根据id查询相应的数据
    	$data = \DB::table('users')->where('id', $request->id)->first();

    	// 密码解密
    	$data->password = decrypt($data->password);

    	return view('admin.user.edit', ['title' => '编辑用户', 'data' => $data]);
    }

    // update
    public function update(Request $request)
    {
    	$id = $request->id;

    	// 查询数据库
    	$arr = \DB::table('users')->where('id', $id)->first();

    	// 判断是否修改邮箱
    	if($arr->email == $request->email)
    	{
    		// 判断是否修改手机号
    		if($arr->phone == $request->phone)
    		{	
    			// 验证密码
    			$this->validate($request, 
    				[
    					'password' => 'required',
    					're_password'=> 'same:password'
    				], 
    				[
    					'password.required' => '密码不能为空',
    					're_password.same' => '两次输入的密码不一致'
    				]);

    			// 清除token
    			$data = $request->except('_token', 'id', 're_password');

    			// 密码加密
    			$data['password'] = encrypt($data['password']);

    			// 执行修改
    			$res = \DB::table('users')->where('id', $id)->update($data);

    			if($res)
		    	{
		    		return redirect('/admin/user/index')->with(['info' => '更新成功']);
		    	}
		    	else
		    	{
		    		return back()->with(['info' => '更新失败失败']);
		    	}
    		}
    		else
    		{
    			// 验证密码和手机号
    			$this->validate($request, 
    				[
    					'password' => 'required',
    					'phone' => 'required|unique:users',
    					're_password'=> 'same:password'
    				], 
    				[
    					'password.required' => '密码不能为空',
    					'phone.required' => '手机号不能为空',
    					'phone.unique' => '手机号已存在',
    					're_password.same' => '两次输入的密码不一致'
    				]);

    			// 清除token
    			$data = $request->except('_token', 'id', 're_password');

    			// 密码加密
    			$data['password'] = encrypt($data['password']);

    			// 执行修改
    			$res = \DB::table('users')->where('id', $id)->update($data);

    			if($res)
		    	{
		    		return redirect('/admin/user/index')->with(['info' => '更新成功']);
		    	}
		    	else
		    	{
		    		return back()->with(['info' => '更新失败失败']);
		    	}
    		}
    	}
    	else
    	{
    		// // 判断是否修改手机号
    		// if($arr->phone == $request->phone)
    		// {	
    		// 	// 验证密码
    		// 	$this->validate($request, 
    		// 		[
    		// 			'password' => 'required',
    		// 			'email' => 'required|unique:user|email',
    		// 			're_password'=> 'same:password'
    		// 		], 
    		// 		[
    		// 			'password.required' => '密码不能为空',
    		// 			're_password.same' => '两次输入的密码不一致',
    		// 			'email.required' => '邮箱不能为空',
				  //   	'email.unique' => '该邮箱已存在',
				  //   	'email.email' => '请正确输入邮箱'
    		// 		]);

    		// 	// 清除token
    		// 	$data = $request->except('_token', 'id', 're_password');

    		// 	// 密码加密
    		// 	$data['password'] = encrypt($data['password']);

    		// 	// 执行修改
    		// 	$res = \DB::table('users')->where('id', $id)->update($data);

    		// 	if($res)
		    // 	{
		    // 		return redirect('/admin/user/index')->with(['info' => '更新成功']);
		    // 	}
		    // 	else
		    // 	{
		    // 		return back()->with(['info' => '更新失败失败']);
		    // 	}
    		// }
    		// else
    		// {
    			return 222;
    		// }
    }
}
