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
        // 获取session信息
        $huser = session('huser');

        // 截取session中的id
        $id = $huser['id'];

        // dd($id);

        // 查询users数据表
        $users = \DB::table('users')->where('id', $id)->first();

        // dd($users);

        return view('home.personal.amend', ['title' => '修改密码', 'users' => $users]);
    }

    // 执行修改密码页
    public function add(Request $request)
    {
        $huser = session('huser');
        $id = $huser['id'];

        $all = $request->all();
        // dd($all);
        $oldpass = $all['oldpassword'];
        $password = $all['password'];
        $repassword = $all['repassword'];
        // dd($oldpass);

        $users = \DB::table('users')->where('id', $id)->first();

        $pass = $users->password;
        
        $res = decrypt($pass);

        // dd($res);


        if ($res == $oldpass) {
            
            if($password == $repassword)
            {
                return view('home.personal.index.',['title' => '基本信息']);
            }else
            {
               echo "<script>alert('你还未登录,请登录后再来');window.location.href='".$_SERVER('HTTP_REFERER')."'</script>";
            }

        }else
        {
            echo "<script>alert('抱歉，修改失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
           
        }

        // dd($request->all());
    }

    // 修改密码的ajax
    //  public function ajax(Request $request)
    // {
    //     $res = $request->input('oldpass');

    //     // dd($res);

    //     $huser = session('huser');

    //     $id = $huser['id'];

    //     // dd($id);
       
    //     $users = \DB::table('users')->where('id',$id)->first();

    //     $pass = $users->password;

    //     $newpass = decrypt($pass);

    //     if($newpass == $res)
    //     {
    //         return json_encode(1);
    //     }else{
    //         return json_encode(2);
    //     }

    // }


    
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


    public function updata()
    {
        // 获取session信息
        $data = session('huser');

        // 截取session中的id
        $id = $data['id'];

        // 查询users数据表

        $users = \DB::table('users')->where('id', $id)->first();

        // dd($users);

        return view('home.personal.insert', ['title' => '完善信息', 'users' => $users]);
    }


    // 加载我的开场中收藏夹
    public function collect()
    {
        // 获取session信息
        $data = session('huser');

        // 取出session中的id
        $id = $data['id'];

        // dd($id);

        // 查询数据
        $res = \DB::table('collect')
                                ->join('merchant','merchant.id', '=', 'collect.mid')
                                ->join('users', 'users.id', '=', 'merchant.uid')
                                ->join('meeting', 'meeting.uid', '=', 'users.id')
                                ->select('collect.*', 'merchant.uid', 'merchant.address','meeting.meetPrice', 'users.userName')
                                ->where('collect.uid', '=', $id)
                                ->get();

        $users = \DB::table('users')->where('id',$id)->first();

        $name = $users->userName;
        // dd($name);

        // 解析前台页面模板
        return view('home.personal.merchant', ['title' => '收藏夹', 'res' => $res, 'name' => $name]);
    }

    
}
