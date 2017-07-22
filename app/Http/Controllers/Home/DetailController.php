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
        // dd($request->all());

    	//根据企业id, 查询数据表, 遍历到详情页
        $res = \DB::table('sitebase')->where('id',$id)->first();

        $uid = $res->uid;

        // dd($uid);

        $user = \DB::table('users')->where('id',$uid)->first();

        $mer = \DB::table('merchant')->where('uid',$uid)->first();

        $mee = \DB::table('meeting')->where('uid',$uid)->first();

        // dd($mee);


    	//查询数据表 ad, 找到友情链接
    	$ad = \DB::table('ad')->get();

    	//解析详情页模板
    	return view('home.detail.detail',  ['title' => '企业详情', 'ad' => $ad, 'user' => $user, 'mer' => $mer, 'res' => $res, 'mee' => $mee]);

    }

    public function ajax(Request $request)
    {
        //获取ajax提交的数据
        $restType = $request->value;
        $guestType = $request->guest;
        $avType = $request->av;

        // dd($restType);

        //===================更改茶歇类型时==============================
       
            if($restType == "1")
            {
                $res = \DB::table('rest')->where('restType', $restType)->first();

                $price = $res->restPrice;
                echo json_encode($price);

            }
            else if($restType == "2")
            {
                $qwe = \DB::table('rest')->where('restType', $restType)->first();

                $price = $qwe->restPrice;
                echo json_encode($price);
            }


        // =================更改客房类型时=============================
         
         if($guestType == "1")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }
         else if($guestType == "2")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }
         else if($guestType == "3")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }
         else if($guestType == "4")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }
         else if($guestType == "5")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }
         else if($guestType == "6")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }
         else if($guestType == "7")
         {
            $res = \DB::table('guest')->where('guestType', $guestType)->first();

            $price = $res->guestPrice;
            echo json_encode($price);
         }


         
         // ================更改设备类型时=====================
         if($avType == "1")
         {
            $res = \DB::table('av')->where('avType', $avType)->first();

            $price = $res->avPrice;
            echo json_encode($price);
         }
         else if($avType == "2")
         {
            $res = \DB::table('av')->where('avType', $avType)->first();

            $price = $res->avPrice;
            echo json_encode($price);
         }
         else if($avType == "3")
         {
            $res = \DB::table('av')->where('avType', $avType)->first();

            $price = $res->avPrice;
            echo json_encode($price);
         }

    }
}










