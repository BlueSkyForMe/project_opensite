<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // index 商户中心主页
    public function index()
    {	 
        // 判断 session
        if(!session('hmer'))
        {
            return "<script>alert('请先登录商户');location.href='/home/index'</script>";
        }

        // 定义uid
        $uid = session('hmer')->id;

        // 查询数据库merchant表
        $mer = \DB::table('merchant')->where('uid', $uid)->select('class', 'address', 'servers', 'check')->first();

        // 判断
        if($mer)
        {
            //判断是否审核通过
            if($mer->check == 0 || $mer->check == 2)
            {
                return "<script>alert('请先通过商户审核');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
            }
        }
        else
        {
            return "<script>alert('请先通过商户审核');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
        }

        // 重新定义check
        $data['check'] = 3;

        // 修改check字段
        \DB::table('merchant')->where('uid', $uid)->update($data); 

        // 查询基本信息数据表sitebase
        $site = \DB::table('sitebase')->where('uid', $uid)->first();

        // 查询轮播图标
        $merimg = \DB::table('merImg')->where('uid', $uid)->get();

        // 判断
        if($site && !$merimg->isEmpty())
        {
            // 加载页面
            return view('tenant.index.index', ['title' => '商户中心', 'mer' => $mer, 'site' => $site, 'merimg' => $merimg]);
        }
        else if($site)
        {
            // 加载页面
            return view('tenant.index.index', ['title' => '商户中心', 'mer' => $mer, 'site' => $site]);
        }
        else if(!$merimg->isEmpty())
        {
            // 加载页面
            return view('tenant.index.index', ['title' => '商户中心', 'mer' => $mer, 'merimg' => $merimg]);
        }
        else
        {
            // 加载页面
            return view('tenant.index.index', ['title' => '商户中心', 'mer' => $mer]);
        }
    
    }
}
