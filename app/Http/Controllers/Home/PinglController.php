<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//企业详情页控制器
class PinglController extends Controller
{
    //加载评论页
    public function index(Request $request)
    {


       // var_dump($_GET);
        //var_dump($request);
      $mid = $request->id;

$qqqq = encrypt(123123);

        dd($qqqq); 

        $data = session('huser');


        

        $id = $request->id;
        // dd($id);
        
        if(!$data)
        {
             echo "<script>alert('你还未登录,请登录后再来');location.href='/home/index'</script>";
        }
        else
        {
            $uid = $data['id'];
            // dd($uid);

            $res = \DB::table('indent')
                            ->join('meeting','meeting.id', '=', 'indent.mid')
                            ->join('users', 'users.id', '=', 'meeting.uid')
                            ->select('indent.mid','meeting.uid','users.userName')
                            ->where('indent.uid', '=', $uid)
                            ->where('indent.pay', '=', 0)
                            ->get();

            // dd($res);
            if(!$res)
            {
                 echo "<script>alert('您还未购买,请购买后再来');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
            }else
            {
                $comment = \DB::table('comment')->where('uid',$mid)->get();

                // dd($comment);
                $ad = \DB::table('ad')->get();

                return view('home.pingl.pingl', ['title' => '添加评论', 'ad' => $ad, 'res' => $res, 'id' => $id, 'comment' => $comment]);
            }
        }
        

        

    	

    }


    // 加载添加评论页
    public function insert(Request $request)
    {

        // 获取session中的数据
        $data = session('huser');
        $id = $data['id'];
        // dd($id);
        
        // 获取传过来的值
        $res = $request->all();

        $uid = $res['id'];

        // dd($uid);
        $baidu = $res['content'];

        // 去除html标记
        $hao = strip_tags($baidu);

        // dd($hao);

        // 查询indent订单表
        $indent = \DB::table('indent')->where('mid', $uid)->first();

        $mid = $indent->mid;

        // dd($mid);

        // 查询meeting会场表
        $meet = \DB::table('meeting')->where('id', $mid)->first();

        // dd($meet);
        $meetName = $meet->meetName;

        // dd($meetName);

        $comm['uid'] = $uid;
        $comm['sid'] = $id;
        $comm['pl_site'] = $meetName;
        $comm['pl_content'] = $hao;

        $comment = \DB::table('comment')->insert($comm);

        // dd($comment);

        echo "<script>alert('恭喜你，吐槽成功！');window.location.href='/home/index'</script>";

     // return view('home.index.index');

    }

}
