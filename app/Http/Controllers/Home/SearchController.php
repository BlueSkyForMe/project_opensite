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
                    ->where('merchant.address', 'like', '%'. $city .'%')
    				->where('users.userName', 'like', '%'. $keywords .'%')
                    ->orWhere('merchant.address', 'like', '%'. $keywords .'%')
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


        //会议时长和开始时间
        $meetTime = $data['meeting'];
        $startTime = $data['startTime'];

        session(['meetTime' => $meetTime]);


        //城市
        if($city != "城市")
        {
        	session(['city' => $city]);
        }

        //人数
        if($person == "人数" || $person == "人数不限")
        {
        	$person = "0";
            session(['supPerson' => $person]);
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

        	//将接收的数据进行处理
        	switch($budget)
        	{
        		case "3000以下": 	 $budget = 3000; break;
        		case "3-5千":		 $budget = 5000; break;
        		case "5-8千": 		 $budget = 8000; break;
        		case "8千-1.2万": 	 $budget = 12000; break;
        		case "1.2万-1.5万":  $budget = 15000; break;
        		case "1.5万-2万": 	 $budget = 20000; break;
        		case "2万-3万":		 $budget = 30000; break;
        		case "3万-5万": 	 $budget = 50000; break;
        		case "5万-8万":	     $budget = 80000; break;
        		case "8万-12万": 	 $budget = 120000; break;
        		case "12万-20万": 	 $budget = 200000; break;
        		case "20万-30万": 	 $budget = 300000; break;
        		case "30万以上":     $budget = 300000000; break;
                // default:             $budget = 3000000000;break;
        	}

        	session(['budget' => $budget]);
        }
        else
        {
            $budget = 30000000;
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
                                 ->where('meeting.meetPrice', '<=', $budget)

                                ->where('star', '=', $star)
                                ->get(); ; 

                    //没有查到数据,则发送相似的推荐信息
                    if($res->isEmpty())
                    {
                           $res = \DB::table('merchant')
                                ->join('users', 'merchant.uid', '=', 'users.id')
                                ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                                ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                                ->where('address', 'like', '%'. $city .'%')
                                ->where('meeting.meetPrice', '<=', $budget)
                                ->where('sitebase.maxPerson', '>=', $person)
                                ->get();
                    }

                   //查询数据表 ad, 找到友情链接
                    $ad = \DB::table('ad')->get();

                    //查询数据表 hot, 找到热门广告
                    $hot = \DB::table('hot')->get();

                    // dd();

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
                                 ->where('meeting.meetPrice', '<=', $budget)
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
                             ->where('meeting.meetPrice', '<=', $budget)
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
                         ->where('meeting.meetPrice', '<=', $budget)
                        ->get();

             // dd($res);

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
        //获取ajax提交的数据
        $city = $request->city;
        $person = $request->value;
        $budget = $request->budget;
        $class = $request->class;
        $star = $request->star;

        $sorkPopular = $request->s_popular;
        $sorkPrice = $request->s_price;

        // dd($price);

        //=======================价格排序=================================
        if($sorkPrice != null)
        {
        	//将选择的按人气排序的选择存入session
       	 	session(['sorkPrice' => $sorkPrice]);

       	 	if($sorkPrice == 0)
       	 	{
       	 		$flag = 'asc';
       	 	}
       	 	else
       	 	{
       	 		$flag = 'desc';
       	 	}

       	 	//选择了城市
       	 	if(session('city'))
	        {
	        	$city = session('city');
	        }
	        else
	        {
	        	$city = "";
	        }

       	 	//检查是否选择了人数
            if(session('supPerson') != null)
            {
                $person = session('supPerson');
            }
            else
            {
                $person = 0;

            }

            //检查是否选择了预算
            if(session('budget') != null)
            {
                $budget = session('budget');
            }
            else
            {
                $budget = 300000000;
            }

            //检查是否选择了类型
            if(session('class') != null)
            {
                $class = session('class');

                //根据条件进行查询
                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>=', $person)
                            ->where('meeting.meetPrice', '<=', $budget)
                            ->whereIn('merchant.class', $class)
                            ->orderBy('meeting.meetPrice', $flag)
                            ->get();

                if($res->isEmpty())
                {
                    //没有找到相关信息时
                    $res = false;
                }

                return view('home.search.reSearch', ['data' => $res]); 
                    
            }


            //根据条件进行查询
            $res = \DB::table('merchant')
                        ->join('users', 'merchant.uid', '=', 'users.id')
                        ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                        ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                        ->where('address', 'like', '%'. $city .'%')
                        ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
                        ->orderBy('meeting.meetPrice', $flag)
                        ->get();

            // dd($res);

            if($res->isEmpty())
            {
                //没有找到相关信息时
                $res = false;
            }

            return view('home.search.reSearch', ['data' => $res]); 

        }

        //=======================人气排序=================================
        if($sorkPopular != null)
        {
        	//将选择的按人气排序的选择存入session
       	 	session(['sorkPopular' => $sorkPopular]);

       	 	//选择了城市
       	 	if(session('city'))
	        {
	        	$city = session('city');
	        }
	        else
	        {
	        	$city = "";
	        }

       	 	//检查是否选择了人数
            if(session('supPerson') != null)
            {
                $person = session('supPerson');
            }
            else
            {
                $person = 0;

            }

            //检查是否选择了预算
            if(session('budget') != null)
            {
                $budget = session('budget');
            }
            else
            {
                $budget = 300000000;
            }

            //检查是否选择了类型
            if(session('class') != null)
            {
                $class = session('class');

                //根据条件进行查询
                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>=', $person)
                            ->where('meeting.meetPrice', '<=', $budget)
                            ->whereIn('merchant.class', $class)
                            ->get();

                if($res->isEmpty())
                {
                    //没有找到相关信息时
                    $res = false;
                }

                return view('home.search.reSearch', ['data' => $res]); 
                    
            }


            //根据条件进行查询
            $res = \DB::table('merchant')
                        ->join('users', 'merchant.uid', '=', 'users.id')
                        ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                        ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                        ->where('address', 'like', '%'. $city .'%')
                        ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
                        ->get();

            // dd($res);

            if($res->isEmpty())
            {
                //没有找到相关信息时
                $res = false;
            }

            return view('home.search.reSearch', ['data' => $res]); 

        }

        //====================更换城市时=================================
        if($city != null)
        {

            //更换session中的信息
            session(['city' => $city]);


            //检查是否选择了排序方式
            if(session('sorkPrice') != null)
            {
                $sorkPrice = session('sorkPrice');

                if($sorkPrice == 0)
	       	 	{
	       	 		$flag = 'asc';
	       	 	}
	       	 	else
	       	 	{
	       	 		$flag = 'desc';
	       	 	}

            }
            else
            {
                $flag = 'asc';

            }

            //检查是否选择了人数
            if(session('supPerson') != null)
            {
                $person = session('supPerson');
            }
            else
            {
                $person = 0;

            }

            //检查是否选择了预算
            if(session('budget') != null)
            {
                $budget = session('budget');
            }
            else
            {
                $budget = 300000000;
            }

            //检查是否选择了类型
            if(session('class') != null)
            {
                $class = session('class');

                //根据条件进行查询
                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>=', $person)
                            ->where('meeting.meetPrice', '<=', $budget)
                            ->whereIn('merchant.class', $class)
                            ->orderBy('meeting.meetPrice', $flag)
                            ->get();

                if($res->isEmpty())
                {
                    //没有找到相关信息时
                    $res = false;
                }

                return view('home.search.reSearch', ['data' => $res]); 
                    
            }


            //根据条件进行查询
            $res = \DB::table('merchant')
                        ->join('users', 'merchant.uid', '=', 'users.id')
                        ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                        ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                        ->where('address', 'like', '%'. $city .'%')
                        ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
                        ->orderBy('meeting.meetPrice', $flag)
                        ->get();

            // dd($res);

            if($res->isEmpty())
            {
                //没有找到相关信息时
                $res = false;
            }

            return view('home.search.reSearch', ['data' => $res]); 
        }

        //===================更改人数条件时==============================
        if($person != null)
        {

	        if($person == "人数" || $person == "人数不限")
	        {
	        	$person = "0";
                session(['supPerson' => $person]);

	        }
	        else
	        {
	        	//选最大值
	        	$person = explode('-', $person);
	        	$person = $person[1];
	        	session(['supPerson' => $person]);
	        }

	        if(session('city'))
	        {
	        	$city = session('city');
	        }
	        else
	        {
	        	$city = "";
	        }

            //如果有预算
	        if(session('budget'))
	        {
	        	$budget = session('budget');
	        }
	        else
	        {
	        	$budget = "3000000";
	        }

	        //检查是否选择了排序方式
            if(session('sorkPrice') != null)
            {
                $sorkPrice = session('sorkPrice');

                if($sorkPrice == 0)
	       	 	{
	       	 		$flag = 'asc';
	       	 	}
	       	 	else
	       	 	{
	       	 		$flag = 'desc';
	       	 	}

            }
            else
            {
                $flag = 'asc';

            }

            //如果选择了类型
            if(session('class'))
            {
                $class = session('class');

                //根据条件进行查询
                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>=', $person)
                            ->where('meeting.meetPrice', '<=', $budget)
                            ->whereIn('merchant.class', $class)
                            ->orderBy('meeting.meetPrice', $flag)
                            ->get(); 

                if($res->isEmpty())
                {
                    //没有找到相关信息时
                    $res = false;
                }

                return view('home.search.reSearch', ['data' => $res]); 


            }
       	 
	       	 //根据条件进行查询
	      	$res = \DB::table('merchant')
	                    ->join('users', 'merchant.uid', '=', 'users.id')
	                    ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
	                    ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
	                    ->where('address', 'like', '%'. $city .'%')
	                    ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
                        ->orderBy('meeting.meetPrice', $flag)
	                    ->get();


	        if($res->isEmpty())
	        {
	        	//没有找到相关信息时
	        	$res = false;
	        }

	        return view('home.search.reSearch', ['data' => $res]); 
        }

        //======================更改预算时===============================
        if($budget != null)
        {

        	//将接收的数据进行处理
        	switch($budget)
        	{
        		case "3000以下": 	 $budget = 3000; break;
        		case "3-5千":		 $budget = 5000; break;
        		case "5-8千": 		 $budget = 8000; break;
        		case "8千-1.2万": 	 $budget = 12000; break;
        		case "1.2万-1.5万":  $budget = 15000; break;
        		case "1.5万-2万": 	 $budget = 20000; break;
        		case "2万-3万":		 $budget = 30000; break;
        		case "3万-5万": 	 $budget = 50000; break;
        		case "5万-8万":	     $budget = 80000; break;
        		case "8万-12万": 	 $budget = 120000; break;
        		case "12万-20万": 	 $budget = 200000; break;
        		case "20万-30万": 	 $budget = 300000; break;
        		case "30万": 		 $budget = 300000000; break;
                default:             $budget = 3000000000;break;
        	}
       	 	
       	 	//将选择的预算信息存入session
       	 	session(['budget' => $budget]);

       	 	//检查是否选择了排序方式
            if(session('sorkPrice') != null)
            {
                $sorkPrice = session('sorkPrice');

                if($sorkPrice == 0)
	       	 	{
	       	 		$flag = 'asc';
	       	 	}
	       	 	else
	       	 	{
	       	 		$flag = 'desc';
	       	 	}

            }
            else
            {
                $flag = 'asc';

            }

       	 	//读取session中的城市信息
       	 	if(session('city'))
	        {
	        	$city = session('city');
	        }
	        else
	        {
	        	$city = "";
	        }

             //检查是否选择了人数
            if(session('supPerson') != null)
            {
                $person = session('supPerson');
            }
            else
            {
                $person = 0;
            }

            //检查是否选择了类型
            if(session('class') != null)
            {
                $class = session('class');

                //根据条件进行查询
                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>=', $person)
                            ->where('meeting.meetPrice', '<=', $budget)
                            ->whereIn('merchant.class', $class)
                            ->orderBy('meeting.meetPrice', $flag)
                            ->get();

                if($res->isEmpty())
                {
                    //没有找到相关信息时
                    $res = false;
                }

                return view('home.search.reSearch', ['data' => $res]); 
                    
            }

            //根据城市和预算进行查表
            $res = \DB::table('merchant')
                        ->join('users', 'merchant.uid', '=', 'users.id')
                        ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                        ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                        ->where('address', 'like', '%'. $city .'%')
                        ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
                        ->orderBy('meeting.meetPrice', $flag)
                        ->get();

            if($res->isEmpty())
            {
                //没有找到相关信息时
                $res = false;
            }

            return view('home.search.reSearch', ['data' => $res]); 
      
        }

        //=======================场地类型=================================
        if($class != null)
        {
            //存入session中
        	session(['class' => $class]);

        	//检查是否选择了排序方式
            if(session('sorkPrice') != null)
            {
                $sorkPrice = session('sorkPrice');

                if($sorkPrice == 0)
	       	 	{
	       	 		$flag = 'asc';
	       	 	}
	       	 	else
	       	 	{
	       	 		$flag = 'desc';
	       	 	}

            }
            else
            {
                $flag = 'asc';

            }

            //如果有城市选择
        	if(session('city'))
	        {
	        	$city = session('city');
	        }
	        else
	        {
	        	$city = "";
	        }

            //如果有人口选择
	        if(session('supPerson'))
	        {
	        	$person = session('supPerson');
	        }
	        else
	        {
	        	$person = '0';
	        }

            //如果有预算
            if(session('budget'))
            {
                $budget = session('budget');
            }
            else
            {
                $budget = "3000000";
            }


        	 //根据条件进行查询
	      	$res = \DB::table('merchant')
	                    ->join('users', 'merchant.uid', '=', 'users.id')
	                    ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
	                    ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
	                    ->where('address', 'like', '%'. $city .'%')
	                    ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
	                    ->whereIn('merchant.class', $class)
	                    ->orderBy('meeting.meetPrice', $flag)
	                    ->get();


	        if($res->isEmpty())
	        {
	        	//没有找到相关信息时
	        	$res = false;
	        }

	        return view('home.search.reSearch', ['data' => $res]); 
        }
        else
        {

            //===========酒店-->星级===============
            if($star != null)
            {

                //将星级存入session中
                session(['star' => $star]);

                //如果选择了城市
                if(session('city'))
                {
                    $city = session('city');
                }
                else
                {
                    $city = "";
                }

                //检查是否选择了排序方式
	            if(session('sorkPrice') != null)
	            {
	                $sorkPrice = session('sorkPrice');

	                if($sorkPrice == 0)
		       	 	{
		       	 		$flag = 'asc';
		       	 	}
		       	 	else
		       	 	{
		       	 		$flag = 'desc';
		       	 	}

	            }
	            else
	            {
	                $flag = 'asc';

	            }

                //如果选择了人数
                if(session('supPerson'))
                {
                    $person = session('supPerson');
                }
                else
                {
                    $person = '0';
                }

                //如果选择了预算
                if(session('budget'))
                {
                    $budget = session('budget');
                }
                else
                {
                    $budget = "3000000";
                }

                $class = "酒店";

                $res = \DB::table('merchant')
                            ->join('users', 'merchant.uid', '=', 'users.id')
                            ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                            ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                            ->where('address', 'like', '%'. $city .'%')
                            ->where('sitebase.maxPerson', '>=', $person)
                            ->where('meeting.meetPrice', '<=', $budget)
                            ->where('merchant.class', $class)
                            ->where('merchant.star', $star)
                            ->orderBy('meeting.meetPrice', $flag)
                            ->get();

                if($res->isEmpty())
                {
                    //没有找到相关信息时
                    $res = false;
                }

                return view('home.search.reSearch', ['data' => $res]); 
            }

            //===========没有场地类型时=============
            session(['class' => null]);

            //检查是否选择了排序方式
            if(session('sorkPrice') != null)
            {
                $sorkPrice = session('sorkPrice');

                if($sorkPrice == 0)
	       	 	{
	       	 		$flag = 'asc';
	       	 	}
	       	 	else
	       	 	{
	       	 		$flag = 'desc';
	       	 	}

            }
            else
            {
                $flag = 'asc';

            }

            //如果有城市选择
            if(session('city'))
            {
                $city = session('city');
            }
            else
            {
                $city = "";
            }

            //如果有人口选择
            if(session('supPerson'))
            {
                $person = session('supPerson');
            }
            else
            {
                $person = '0';
            }

            //如果有预算
            if(session('budget'))
            {
                $budget = session('budget');
            }
            else
            {
                $budget = "3000000";
            }

            //根据条件进行查询
            $res = \DB::table('merchant')
                        ->join('users', 'merchant.uid', '=', 'users.id')
                        ->join('sitebase', 'merchant.uid', '=', 'sitebase.uid')
                        ->join('meeting', 'merchant.uid', '=', 'meeting.uid')
                        ->where('address', 'like', '%'. $city .'%')
                        ->where('sitebase.maxPerson', '>=', $person)
                        ->where('meeting.meetPrice', '<=', $budget)
                        ->orderBy('meeting.meetPrice', $flag)
                        ->get();

            if($res->isEmpty())
            {
                //没有找到相关信息时
                $res = false;
            }

            return view('home.search.reSearch', ['data' => $res]); 

        }




    }



    //收藏商家
    public function collect(Request $request)
    {
        $userID = $request->userID;
        $merchantID = $request->merchantID;

        $res = \DB::table('collect')->where([
            ['uid', '=', $userID],
            ['mid', '=', $merchantID],
        ])->first();


        if($res)
        {
            $id = $res->id;

            //删除该数据, 并返回一个状态码 collectCode = 0
            $result = \DB::table('collect')->where('id', $id)->delete();

            $code = 0;
            
            echo json_encode($code);
        }
        else
        {
            //存储该数据, 并返回一个状态吗 collerctCode = 1
            \DB::table('collect')->insert(['uid'=>$userID, 'mid'=>$merchantID]);

            $code = 1;

            echo json_encode($code);
        }
    }
}
