<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{
    // order 商户订单
    public function order(Request $request)
    {
    	// 获取酒店名称
    	$name = session('hmer')->userName;

    	// 定义页码 和 会场名称
    	$num = $request->input('num', '2');
    	$keywords = $request->input('keywords', '');

    	// 查询数据库
    	$data = \DB::table('indent')
    			->join('users', 'indent.uid', '=', 'users.id')
    			->select('indent.*', 'users.userName', 'users.phone', 'users.email')
    			->where('indent.userName', $name)
    			->where('meetName', 'like', '%'.$keywords.'%')->paginate($num);	

    	// 加载视图
    	return view('tenant.trade.order', ['title' => '商户订单', 'data' => $data, 'request' => $request->all()]);
    }
}
