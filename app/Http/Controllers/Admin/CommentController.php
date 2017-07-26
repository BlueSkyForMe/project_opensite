<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
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
}
