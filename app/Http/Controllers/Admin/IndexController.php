<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //加载后台主页
    public function index()
    {
    	$users = \DB::table('users')->where('type', '0')->count();
    	$mercs = \DB::table('merchant')->count();
    	$orders =  \DB::table('indent')->count();
    	$comments =  \DB::table('comment')->count();

    	return view('admin.index.index', ['title' => '后台首页', 'comments' => $comments, 'orders' => $orders, 'users' => $users, 'mercs' => $mercs]);
    }
}
 