<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//企业详情页控制器
class DetailController extends Controller
{
    //加载该企业详情页
    public function index(Request $request)
    {
    	//获取企业ID
    	$id = $request->id;

    	//根据企业id, 查询数据表, 遍历到详情页





    	//查询数据表 ad, 找到友情链接
    	$ad = \DB::table('ad')->get();

    	//解析详情页模板
    	return view('home.detail.detail',  ['title' => '企业详情', 'ad' => $ad]);

    }





}
