<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//用户搜索
class SearchController extends Controller
{
    //普通搜素
    public function search(Request $request)
    {
    	//获取用户提交的搜索数据
    	$data = $request->except('x', 'y');

        // dd($data);

    	//查询的城市, 关键字, 可容纳人数
    	$city = $data['city'];
    	$keywords = $data['keywords'];
    	$number = $data['number'];

    	//查询数据表 merchant 和 users, 找到搜索的城市
    	$res = \DB::table('merchant')
    				->join('users', 'merchant.uid', '=', 'users.id')
                    ->where('address', 'like', '%'. $city .'%')
    				->where('users.userName', 'like', '%'. $keywords .'%')
    				->get();

        // dd($res);

    	//查询数据表 ad, 找到友情链接
    	$ad = \DB::table('ad')->get();

		//查询数据表 hot, 找到热门广告
    	$hot = \DB::table('hot')->get();
    	
    	return view('home.search.search', ['title' => '搜索结果', 'data' => $res, 'ad' => $ad, 'hot' => $hot]);	
    	
    }

    //高级搜索
    public function superSearch()
    {
    	
    }
}
