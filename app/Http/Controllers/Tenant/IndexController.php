<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // index 商户中心主页
    public function index()
    {
    	// =================== 模拟session ======================

    	$res = \DB::table('users')->where('id', '11')->first();

    	session(['hmer' => $res]);

    	// ======================================================
        
        // 定义uid
        $uid = session('hmer')->id; 

    	// 查询数据库merchant表
    	$mer = \DB::table('merchant')->where('uid', $uid)->select('class', 'address', 'servers')->first();

        // 查询基本信息数据表sitebase
        $site = \DB::table('sitebase')->where('uid', $uid)->first();

        // 判断
        if($site)
        {
            // 加载页面
            return view('tenant.index.index', ['title' => '商户中心', 'mer' => $mer, 'site' => $site]);
        }
        else
        {
            // 加载页面
            return view('tenant.index.index', ['title' => '商户中心', 'mer' => $mer]);
        }
    
    }
}
