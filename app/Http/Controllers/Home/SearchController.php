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
                    ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                    ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
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
    public function superSearch(Request $request)
    {
    	//获取用户提交的搜索数据
        $data = $request->except('x', 'y');

        // dd($data);

        //提取搜索选项
        $city = $data['city'];
        $person = $data['supPerson'];
        $budget = $data['budget'];
        $meetTime = $data['meeting'];
        $starTime = $data['starTime'];

        //城市
        if($city != "城市")
        {
        	session(['city' => $city]);
        }

        //人数
        if($person == "人数" || $person == "人数不限")
        {
        	$person = "0";
        }
        else
        {
        	//选最大值
        	$person = explode('-', $person);
        	$person = $person[1];
        	session(['supPerson' => $person]);

        }

        //预算
        if($budget != "预算")
        {
        	session(['budget' => $budget]);
        }

        //类型
        if(array_key_exists('type', $data))
        {
            $type = $data['type'];
            session(['type' => $type]);

            if($type[0]  == "酒店")
            {
                if(array_key_exists('star', $data))
                {

                    $star = $data['star'];
    				session(['star' => $star]);

                    //选了酒店同时选了星级
                    $res = \DB::table('merchant')
                                ->join('users', 'merchant.uid', '=', 'users.id')
                                ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                                ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                                ->where('address', 'like', '%'. $city .'%')
                                ->where('sitebase.maxPerson', '>=', $person)
                                ->where('star', '=', $star)
                                ->get();

                    //没有查到数据,则发送相似的推荐信息
                    if($res->isEmpty())
                    {
                           $res = \DB::table('merchant')
                                ->join('users', 'merchant.uid', '=', 'users.id')
                                ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                                ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                                ->where('address', 'like', '%'. $city .'%')
                                ->get();
                    }

                   //查询数据表 ad, 找到友情链接
                    $ad = \DB::table('ad')->get();

                    //查询数据表 hot, 找到热门广告
                    $hot = \DB::table('hot')->get();

                    return view('home.search.search', ['title' => '搜索结果', 'postData' => $data, 'data' => $res, 'ad' => $ad, 'hot' => $hot]); 
              
                        
                }
                else
                {
                    //选了酒店但是没有选择星级
                    $res = \DB::table('merchant')
                                ->join('users', 'merchant.uid', '=', 'users.id')
                                ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                                ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                                ->where('address', 'like', '%'. $city .'%')
                                ->where('sitebase.maxPerson', '>', $person)
                                ->where('class', '=', $type)
                                ->get();

                    
                    //查询数据表 ad, 找到友情链接
                    $ad = \DB::table('ad')->get();

                    //查询数据表 hot, 找到热门广告
                    $hot = \DB::table('hot')->get();

                    return view('home.search.search', ['title' => '搜索结果', 'postData' => $data, 'data' => $res, 'ad' => $ad, 'hot' => $hot]); 
   

                }
            }
            else
            {

                //没选酒店,但是选了别的场地类型
                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>', $person)
                            ->where('class', '=', $type)
                            ->get();

                // dd($res);

                //查询数据表 ad, 找到友情链接
                $ad = \DB::table('ad')->get();

                //查询数据表 hot, 找到热门广告
                $hot = \DB::table('hot')->get();

                return view('home.search.search', ['title' => '搜索结果', 'postData' => $data, 'data' => $res, 'ad' => $ad, 'hot' => $hot]); 


            }
        }
        else
        {

            //没有选择场地类型
            $res = \DB::table('merchant')
                        ->join('users', 'merchant.uid', '=', 'users.id')
                        ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                        ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                        ->where('address', 'like', '%'. $city .'%')
                        ->where('sitebase.maxPerson', '>', $person)
                        ->get();

            //查询数据表 ad, 找到友情链接
            $ad = \DB::table('ad')->get();

            //查询数据表 hot, 找到热门广告
            $hot = \DB::table('hot')->get();

            return view('home.search.search', ['title' => '搜索结果', 'postData' => $data, 'data' => $res, 'ad' => $ad, 'hot' => $hot]); 

        }

    }

    //搜索页 ajax 获取实时数据
    public function ajax(Request $request)
    {

        $person = $request->value;

        // dd($person);

        //处理高级搜索中的人数选择
        if($person == "人数" || $person == "人数不限")
        {
        	$person = "0";
        }
        else
        {
        	//选最大值
        	$person = explode('-', $person);
        	$person = $person[1];
        }

        if(session('city'))
        {
        	$city = session('city');
        }
        else
        {
        	$city = "";
        }
       	 
       	// dd($city);
       	 
       	 //根据条件进行查询
      	$res = \DB::table('merchant')
                    ->join('users', 'merchant.uid', '=', 'users.id')
                    ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                    ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                    ->where('address', 'like', '%'. $city .'%')
                    ->where('sitebase.maxPerson', '>=', $person)
                    ->get();


        if($res->isEmpty())
        {
        	//没有找到相关信息时
        	$res = false;
        }

   	 	//查询数据表 ad, 找到友情链接
        $ad = \DB::table('ad')->get();

        //查询数据表 hot, 找到热门广告
        $hot = \DB::table('hot')->get();

        return view('home.search.reSearch', ['data' => $res]); 



    }
}
