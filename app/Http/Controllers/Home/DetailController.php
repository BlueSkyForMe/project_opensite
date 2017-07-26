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

       

        $user = \DB::table('users')->where('id',$uid)->first();

        $mer = \DB::table('merchant')->where('uid',$uid)->first();

        $mee = \DB::table('meeting')->where('uid',$uid)->get();

        // dd($mee);

        $merimg = \DB::table('merimg')->where('uid',$uid)->get();

        // dd($sid);
        $comment = \DB::table('comment')->where('uid',$uid)->get();

        // dd($comment);

    	// //查询数据表 ad, 找到友情链接
    	$ad = \DB::table('ad')->get();

    	// //解析详情页模板
    	return view('home.detail.detail',  ['title' => '企业详情', 'comment' => $comment, 'merimg' => $merimg, 'ad' => $ad, 'user' => $user, 'mer' => $mer, 'res' => $res, 'mee' => $mee]);

    }

    public function ajax(Request $request)
    {
        //获取ajax提交的数据
        $restType = $request->value;
        $guestType = $request->guest;
        $avType = $request->av;
        $meeting = $request->meet;

        // dd($meeting);

        if($meeting)
        {
            echo json_encode($meeting);
        }

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


    public function insert(Request $request)
    {

        $qwe = session('huser');
        // dd($qwe);

        // 判断是否登录
        if(!$qwe)
        {
            echo json_encode(0);
        }else
        
        {
            $meetingdata = $request->meeting;
            $meeting = $request->meet;
            $restType = $request->rest;
            $guestType = $request->guest;
            $avType = $request->av;
            $restcount = $request->restcount;
            $guestcount = $request->guestcount;
            $avcount = $request->avcount;

             $time = null;
             // dd($meetingdata);
            // 拼接使用时间

             if (!$meetingdata) {
                 
                 return json_encode(2);   
             }
             
                $lll = explode("-", $meetingdata);
                // dd($lll);

                // 判断是否小于十天
                if($lll[2] < 10)
                {
                    $time = $lll[2] + $meeting;
                    $time = "0".$time;
                }else
                {
                    $time = $lll[2] + $meeting;
                }
                

                $aww = ['0' =>$meetingdata, '1' => $time];
                $arr = implode($aww, '/');
             
           


            $guestPrice = null;
            $avPrice = null;

            // dd($request->all());
            // $id = $request->id;
            $id = $request->id;
            // dd($id);

            // 查询数据表

            $res = \DB::table('sitebase')->where('id', $id)->first();

            $uid = $res->uid;
            // dd($uid);


            // 存入到数据库
          

            // dd($indent);

             $restmoney = null;
             $guestmoney = null;
             $avmoney = null;
             $restPrice = null;
             // restPrice
             // $hallmoney = null;

            

            $meetin = \DB::table('meeting')->where('uid', $uid)->first();

            $hallmoney = $meetin->meetPrice;

            $meetName = $meetin->meetName;

            $users = \DB::table('users')->where('id', $uid)->first();

            $userName = $users->userName;




            if($restType == '类型')
            {
                $restType = null;
                // dd($restType);
            }else
            {
                 // 查询rest(茶歇)数据表
                $rest = \DB::table('rest')->where(['uid'=>$uid, 'restType'=>$restType])->first();

                $restPrice = $rest->restPrice;

                // 判断
                if($restType == null)
                {
                    $restmoney = null;
                }else
                {
                    // 计算茶歇钱数
                    $restmoney = $restPrice * $restcount;

                    // dd($aaa);
                }
                
            }

            

            if($avType == '类型' )
            {
                $avType = null;
            }else
            {
                // 查询av(设备)数据表
                $av = \DB::table('av')->where(['uid'=>$uid, 'avType'=>$avType])->first();

                $avPrice = $av->avPrice;

                // dd($avPrice);

                // 判断
                if($avType == null)
                {
                    $avmoney = null;
                }else
                {
                    // 计算设备钱数
                    $avmoney = $avPrice * $avcount;

                    // dd($avmoney);
                }

            }
            

            if($guestType == '类型')
            {
                $guestType =null;
            }else
            {
                // 查询guest(客房)数据表
                $guest = \DB::table('guest')->where(['uid'=>$uid, 'guestType'=>$guestType])->first();

                $guestPrice = $guest->guestPrice;

                // 判断
                if($guestType == null)
                {
                    $guestmoney =null;
                }else
                {
                    // 计算客房钱数
                    $guestmoney = $guestPrice * $guestcount;

                    // dd($aaa);
                }
            }


            // 判断共花多少钱
            if($restmoney == null && $guestmoney == null && $avmoney == null)
            {
                $money = $hallmoney;
            }
            else if($restmoney == null && $guestmoney == null)
            {
                $money = $hallmoney + $avmoney;
            }
            else if($guestmoney == null && $avmoney == null)
            {
                $money = $hallmoney + $restmoney;
            }
            else if($restmoney == null && $avmoney == null)
            {
                $money = $guestmoney + $hallmoney;
            }
            else if($restmoney == null)
            {
                $money = $hallmoney + $guestmoney + $avmoney;
            }
            else if($guestmoney == null)
            {
                $money = $hallmoney + $restmoney + $avmoney;
            }
            else if($avmoney == null)
            {
                $money = $hallmoney + $restmoney + $guestmoney;
            }
            else if($restmoney != null && $guestmoney != null && $avmoney != null)
            {
                $money = $hallmoney + $restmoney + $guestmoney + $avmoney;
            }

            // dd($money);

           
           
            // dd($arr);



            $data['mid'] = $id;            
            $data['uid'] = $qwe['id'];
            $data['meetName'] = $meetName;
            $data['userName'] = $userName;
            $data['meeting'] = $meeting;
            $data['meetingdata'] = $meetingdata;
            $data['rest_Type'] = $restType;
            $data['guest_Type'] = $guestType;
            $data['av_Type'] = $avType;
            $data['restcount'] = $restcount;
            $data['guestcount'] = $guestcount;
            $data['avcount'] = $avcount;
            $data['restPrice'] = $restPrice;
            $data['guestPrice'] = $guestPrice;
            $data['avPrice'] = $avPrice;
            $data['hallmoney'] = $hallmoney;
            $data['restmoney'] = $restmoney;
            $data['guestmoney'] = $guestmoney;
            $data['avmoney'] = $avmoney;
            $data['money'] = $money;
            $data['time_quantum'] = $arr;

            // dd($data);
            // 添加到数据库
            $stmt = \DB::table('indent')->insert($data);

            // dd($data);
            if ($stmt) 
            {
                echo json_encode(1);
            }else
            {
                echo json_encode(0);
            }

        }

       
    }

}
