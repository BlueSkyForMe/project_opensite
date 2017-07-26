<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//后台订单管理
class OrderController extends Controller
{
    //后台订单列表
    public function index(Request $request)
    {
    	$num = $request -> input('num', '10');
    	$keywords = $request -> input('keywords', '');

    	// dd($keywords);

    	$data = \DB::table('indent')
    			->join('users', 'users.id', '=', 'indent.uid')
    			->where('indent.userName', 'like', '%'. $keywords .'%')
    			->select('indent.*', 'indent.userName as merchantName', 'users.userName')
    			->paginate($num);

    	// dd($data);

    	return view('admin.order.order', ['title' => '订单管理', 'data' => $data, 'request' => $request->all()]);
    }
}
