<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台我的开场控制器
class PersonalController extends Controller
{
    // 加载我的开场
    public function index()
    {
        $data = session('huser');
        // dd($data);
        if(!$data)
        {
            echo "<script>alert('你还未登录,请登录后再来');location.href='/home/index'</script>";
        }else
        {

            $id = $data['id'];

            // dd($id);

            $users = \DB::table('users')->where('id',$id)->first();

            $phone = $users->phone;

            // dd($phone);

            // $haoma="15012345678"; 
            $phone = substr($phone, 0, 3).'****'.substr($phone, 7);


            // dd($phone);


            //解析前台页面模板
            return view('home.personal.index', ['title' => '我的开场', 'users' => $users, 'phone' => $phone]);
        }

    	
    }

    // 加载我的开场修改密码页
    public function amend()
    {
        return view('home.personal.amend', ['title' => '修改密码']);
    }

    
    // 个人信息
    public function insert(Request $request)
    {   

        $xin = session('huser');

        $uid = $xin['id'];
        // 获取信息
        $data = $request->all();

        $data['uid'] = $uid;

        dd($data);

        // 去除token
        $data = $request->except('_token');
        // dd($data);

        // 执行添加
        $res = \DB::table('userInfo')->insert($data);

        if($res)
        {
            return '修改成功';       
        }

        // dd($data);
    }


    public function update()
    {

    }




    // ajax验证
    public function ajax(Request $request)
    {
        $res = $request->input('pass');
       
        $data = \DB::table('users')->where('password',$res)->first();

        if($data){
            return 1;
        }else{
            return 0;
        }

    }



    // 加载我的开场中收藏夹
    public function collect()
    {
        // 解析前台页面模板
        return view('home.personal.collect', ['title' => '收藏夹']);
    }

    // 加载收藏商家页
    public function merchant()
    {
        // 解析前台页面模板
        return view('home.personal.merchant', ['title' => '收藏夹']);
    }
}
