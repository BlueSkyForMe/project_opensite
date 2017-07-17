<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{


    public function index(Request $request)
    {
    	$num = $request->input('num', 10);
    	$keywords = $request->input('keywords', '');
    	// 查询数据库
    	$data = \DB::table('comment')->paginate($num);

    	// 加载页面
    	return view('admin.index.comment', ['request' => $request->all(), 'title'=>'用户列表', 'data'=> $data]);
    }


    // 执行删除页
    public function delete(Request $request)
    {
    	$res = \DB::table('comment')->where('id', $request->id)->delete();

    	if($res)
    	{
    		return redirect('/admin/comment/index')->with(['info' => '删除成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '删除失败']);
    	}
    }

}
