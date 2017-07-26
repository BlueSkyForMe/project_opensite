<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
<<<<<<< HEAD


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

=======
    //后台评论列表
    public function index(Request $request)
    {
    	$num = $request -> input('num', '10');
    	$keywords = $request -> input('keywords', '');

    	// dd($keywords);

    	$data = \DB::table('comment')
    			->join('users', 'users.id', '=', 'comment.mid')
    			->where('users.userName', 'like', '%'. $keywords .'%')
    			->paginate($num);

    	// dd($data);

    	return view('admin.comment.comment', ['title' => '评论管理', 'data' => $data, 'request' => $request->all()]);
    }
>>>>>>> 3be0f5f16332212b108dc505fadb8fb0799364ec
}
