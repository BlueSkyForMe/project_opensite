<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // index 商户中心主页
    public function index()
    {
    	    
        // 定义uid
        $uid = session('hmer')->id;

        // 重新定义check
        $data['check'] = 3;

        // 修改check字段
        \DB::table('merchant')->where('uid', $uid)->update($data); 

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
