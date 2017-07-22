<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MansiteController extends Controller
{
    // siteAdd 添加会场
    public function siteAdd()
    {   
        // 判断是否以完善信息
        $res = \DB::table('sitebase')->where('uid', session('hmer')->id)->get();
        
        if($res->isEmpty())
        {
            // 信息未完善
            return redirect('/tenant/index')->with(['info' => '请先完善基本信息']);
        }

        // 加载视图
    	return view('tenant.mansite.siteAdd', ['title' => '添加会场']);
    }

    // siteInsert 将会场信息插入数据库
    public function siteInsert(Request $request)
    {
    	// 去除冗余
    	$data = $request->except('_token', 'long', 'width', 'height', 'pillar', 'feast', 'desk');

    	// 定义uid
    	$data['uid'] = $request->uid;

    	// 拼接会场面积字段
    	if($request->pillar == '0')
    	{
    		// 无立柱式
    		$data['meetArea'] = $data['meetArea'].'平方米'.'('.$request->long.'*'.$request->width.'*'.$request->height.')/无立柱';
    	}
    	else
    	{
    		// 有立柱式
    		$data['meetArea'] = $data['meetArea'].'平方米'.'('.$request->long.'*'.$request->width.'*'.$request->height.')/有立柱';
    	}

    	// 拼接容纳人数字段
    	$data['meetPerson'] = $request->feast.'(宴会式)/'.$request->desk.'(课桌式)';

    	// 处理图片
    	if($request->hasFile('meetImg'))
    	{
    		if($request->file('meetImg'))
    		{
    			$ext = $request->file('meetImg')->extension();

    			// 创建唯一的图片名称
    			do{
    				$filename = time().mt_rand(100000,999999).'.'.$ext;
    			}while(file_exists('./uploads/meetimg/'.$filename));

    			// 移动图片
    			$request->file('meetImg')->move('./uploads/meetimg', $filename);
    			
    			$data['meetImg'] = $filename;	
    		}
    	}

    	// 插入数据库
    	$res = \DB::table('meeting')->insert($data);

    	if($res)
    	{
    		return redirect('tenant/mansite/siteShow/'.$request->uid)->with(['info' => '添加成功']);
    	}
    	else
    	{
    		return back()->with(['info' => '添加失败']);
    	}	
    }

    // siteShow 查看会场信息
    public function siteShow($uid)
    {
    	// 根据登录的商户查询
    	$data = \DB::table('meeting')->where('uid', $uid)->get();

    	return view('tenant.mansite.siteShow', ['title' => '会场信息', 'data' => $data]);
    }

    // siteEdit 编辑会场视图
    public function siteEdit($id)
    {
        // 提取要编辑的会场
        $data = \DB::table('meeting')->where('id', $id)->first();

        // 加载视图并发送数据
        return view('tenant.mansite.siteEdit', ['title' => '编辑会场', 'data' => $data]);
    }

    // siteUpdate 修改会场信息
    public function siteUpdate(Request $request)
    {
        // 定义uid
        $uid = $request->uid;

        // 定义要修改的id
        $id = $request->id;

        // 去除冗余
        $data = $request->except('_token', 'uid');

        // 处理图片
        if($request->hasFile('meetImg'))
        {
            if($request->file('meetImg'))
            {
                $ext = $request->file('meetImg')->extension();

                // 创建唯一的图片名称
                do{
                    $filename = time().mt_rand(100000,999999).'.'.$ext;
                }while(file_exists('./uploads/meetimg/'.$filename));

                // 移动图片
                $request->file('meetImg')->move('./uploads/meetimg', $filename);
                
                $data['meetImg'] = $filename;

                // 获取原图片名称
                $oldname = \DB::table('meeting')->where('id', $id)->first()->meetImg;

                // 判断
                if(file_exists('./uploads/meetimg/'.$oldname))
                {   
                    // 删除原图片
                    unlink('./uploads/meetimg/'.$oldname);
                }   
            }
        }

        // 修改数据
        $res = \DB::table('meeting')->where('id', $id)->update($data);

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/siteShow/'.$uid)->with(['info' => '修改成功']);
        }
        else
        {
            return back()->with(['info' => '修改失败']);
        }  
    }

    // siteDelete 删除场地信息
    public function siteDelete($id)
    {
        // 获取原图片名称
        $oldname = \DB::table('meeting')->where('id', $id)->first()->meetImg;

        // 判断
        if(file_exists('./uploads/meetimg/'.$oldname))
        {   
            // 删除原图片
            unlink('./uploads/meetimg/'.$oldname);
        } 

        // 执行删除
        $res = \DB::table('meeting')->where('id', $id)->delete();

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/siteShow/'.session('hmer')->id)->with(['info' => '删除成功']);
        }
        else
        {
            return back()->with(['info' => '删除失败']);
        } 
    }

    // guestAdd 添加客房
    public function guestAdd()
    {
        // 判断是否以完善信息
        $res = \DB::table('sitebase')->where('uid', session('hmer')->id)->get();
        
        if($res->isEmpty())
        {
            // 信息未完善
            return redirect('/tenant/index')->with(['info' => '请先完善基本信息']);
        }
        
        // 视图
        return view('tenant.mansite.guestAdd', ['title' => '添加客房']);
    }

    // guestInsert 客房信息插入数据库
    public function guestInsert(Request $request)
    {
        // 剔除冗余
        $data = $request->except('_token');

        // 定义uid
        $data['uid'] = $request->uid;

        // 处理图片
        if($request->hasFile('guestImg'))
        {
            if($request->file('guestImg'))
            {
                $ext = $request->file('guestImg')->extension();

                // 创建唯一的图片名称
                do{
                    $filename = time().mt_rand(100000,999999).'.'.$ext;
                }while(file_exists('./uploads/meetimg/'.$filename));

                // 移动图片
                $request->file('guestImg')->move('./uploads/guestimg', $filename);
                
                $data['guestImg'] = $filename;   
            }
        }

        // 插入数据库
        $res = \DB::table('guest')->insert($data);

        // 判断
        if($res)
        {
            return back()->with(['info' => '添加客房成功']);
        }
        else
        {
            return back()->with(['info' => '添加客房失败']);
        }
    }

    // guestShow 查看客房信息
    public function guestShow($uid)
    {
        // 查询相关数据
        $data = \DB::table('guest')->where('uid', $uid)->get();

        // 加载视图
        return view('tenant.mansite.guestShow', ['title' => '客房信息', 'data' => $data]);
    }

    // guestEdit 编辑客房视图
    public function guestEdit($id)
    {
        // 提取要编辑的客房
        $data = \DB::table('guest')->where('id', $id)->first();

        // 加载视图并发送数据
        return view('tenant.mansite.guestEdit', ['title' => '编辑客房', 'data' => $data]);
    }

    // guestUpdate 修改客房信息
    public function guestUpdate(Request $request)
    {
        // 定义uid
        $uid = $request->uid;

        // 定义要修改的id
        $id = $request->id;

        // 去除冗余
        $data = $request->except('_token', 'uid');

        // 处理图片
        if($request->hasFile('guestImg'))
        {
            if($request->file('guestImg'))
            {
                $ext = $request->file('guestImg')->extension();

                // 创建唯一的图片名称
                do{
                    $filename = time().mt_rand(100000,999999).'.'.$ext;
                }while(file_exists('./uploads/guestimg/'.$filename));

                // 移动图片
                $request->file('guestImg')->move('./uploads/guestimg', $filename);
                
                $data['guestImg'] = $filename;

                // 获取原图片名称
                $oldname = \DB::table('guest')->where('id', $id)->first()->guestImg;

                // 判断
                if(file_exists('./uploads/guestimg/'.$oldname))
                {   
                    // 删除原图片
                    unlink('./uploads/guestimg/'.$oldname);
                }   
            }
        }

        // 修改数据
        $res = \DB::table('guest')->where('id', $id)->update($data);

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/guestShow/'.$uid)->with(['info' => '修改成功']);
        }
        else
        {
            return back()->with(['info' => '修改失败']);
        }  
    }

    // guestDelete 删除客房信息
    public function guestDelete($id)
    {
        // 获取原图片名称
        $oldname = \DB::table('guest')->where('id', $id)->first()->guestImg;

        // 判断
        if(file_exists('./uploads/guestimg/'.$oldname))
        {   
            // 删除原图片
            unlink('./uploads/guestimg/'.$oldname);
        }

        // 执行删除
        $res = \DB::table('guest')->where('id', $id)->delete();

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/guestShow/'.session('hmer')->id)->with(['info' => '删除成功']);
        }
        else
        {
            return back()->with(['info' => '删除失败']);
        } 
    }

    // restAdd 添加茶歇
    public function restAdd()
    {
        // 判断是否以完善信息
        $res = \DB::table('sitebase')->where('uid', session('hmer')->id)->get();
        
        if($res->isEmpty())
        {
            // 信息未完善
            return redirect('/tenant/index')->with(['info' => '请先完善基本信息']);
        }
        
        // 加载视图
        return view('tenant.mansite.restAdd', ['title' => '添加茶歇']);
    }

    // restInsert 茶歇信息插入数据库
    public function restInsert(Request $request)
    {
        // 剔除冗余
        $data = $request->except('_token');

        // 定义uid
        $data['uid'] = $request->uid;

        // 处理图片
        if($request->hasFile('restImg'))
        {
            if($request->file('restImg'))
            {
                $ext = $request->file('restImg')->extension();

                // 创建唯一的图片名称
                do{
                    $filename = time().mt_rand(100000,999999).'.'.$ext;
                }while(file_exists('./uploads/restimg/'.$filename));

                // 移动图片
                $request->file('restImg')->move('./uploads/restimg', $filename);
                
                $data['restImg'] = $filename;   
            }
        }

        // 插入数据库
        $res = \DB::table('rest')->insert($data);

        // 判断
        if($res)
        {
            return back()->with(['info' => '添加成功']);
        }
        else
        {
            return back()->with(['info' => '添加失败']);
        }
    }

    // restShow 查看茶歇信息
    public function restShow($uid)
    {
        // 查询相关数据
        $data = \DB::table('rest')->where('uid', $uid)->get();

        // 加载视图
        return view('tenant.mansite.restShow', ['title' => '茶歇信息', 'data' => $data]);
    }

    // guestEdit 编辑茶歇视图
    public function restEdit($id)
    {
        // 提取要编辑的客房
        $data = \DB::table('rest')->where('id', $id)->first();

        // 加载视图并发送数据
        return view('tenant.mansite.restEdit', ['title' => '编辑茶歇', 'data' => $data]);
    }

    // restUpdate 修改茶歇信息
    public function restUpdate(Request $request)
    {
        // 定义uid
        $uid = $request->uid;

        // 定义要修改的id
        $id = $request->id;

        // 去除冗余
        $data = $request->except('_token', 'uid');

        // 处理图片
        if($request->hasFile('restImg'))
        {
            if($request->file('restImg'))
            {
                $ext = $request->file('restImg')->extension();

                // 创建唯一的图片名称
                do{
                    $filename = time().mt_rand(100000,999999).'.'.$ext;
                }while(file_exists('./uploads/restimg/'.$filename));

                // 移动图片
                $request->file('restImg')->move('./uploads/restimg', $filename);
                
                $data['restImg'] = $filename;

                // 获取原图片名称
                $oldname = \DB::table('rest')->where('id', $id)->first()->restImg;

                // 判断
                if(file_exists('./uploads/restimg/'.$oldname))
                {   
                    // 删除原图片
                    unlink('./uploads/restimg/'.$oldname);
                }   
            }
        }

        // 修改数据
        $res = \DB::table('rest')->where('id', $id)->update($data);

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/restShow/'.$uid)->with(['info' => '修改成功']);
        }
        else
        {
            return back()->with(['info' => '修改失败']);
        }  
    }

    // restDelete 删除茶歇信息
    public function restDelete($id)
    {
        // 获取原图片名称
        $oldname = \DB::table('rest')->where('id', $id)->first()->restImg;

        // 判断
        if(file_exists('./uploads/restimg/'.$oldname))
        {   
            // 删除原图片
            unlink('./uploads/restimg/'.$oldname);
        }

        // 执行删除
        $res = \DB::table('rest')->where('id', $id)->delete();

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/restShow/'.session('hmer')->id)->with(['info' => '删除成功']);
        }
        else
        {
            return back()->with(['info' => '删除失败']);
        } 
    }

    // avAdd 添加av设备
    public function avAdd()
    {
        // 判断是否以完善信息
        $res = \DB::table('sitebase')->where('uid', session('hmer')->id)->get();
        
        if($res->isEmpty())
        {
            // 信息未完善
            return redirect('/tenant/index')->with(['info' => '请先完善基本信息']);
        }
        
        // 加载视图
        return view('tenant.mansite.avAdd', ['title' => '添加设备']);
    }

    // avInsert AV设备插入数据库
    public function avInsert(Request $request)
    {
        // 剔除冗余
        $data = $request->except('_token');

        // 定义uid
        $data['uid'] = $request->uid;

        // 插入数据库
        $res = \DB::table('av')->insert($data);

        // 判断
        if($res)
        {
            return back()->with(['info' => '添加成功']);
        }
        else
        {
            return back()->with(['info' => '添加失败']);
        }
    }

    // AVShow 查看AV设备
    public function AVShow($uid)
    {
        // 查询相关数据
        $data = \DB::table('av')->where('uid', $uid)->get();

        // 加载视图
        return view('tenant.mansite.avShow', ['title' => 'AV设备', 'data' => $data]);
    }

    // avEdit 编辑茶歇视图
    public function avEdit($id)
    {
        // 提取要编辑的客房
        $data = \DB::table('av')->where('id', $id)->first();

        // 加载视图并发送数据
        return view('tenant.mansite.avEdit', ['title' => '编辑设备', 'data' => $data]);
    }

    // avUpdate 修改茶歇信息
    public function avUpdate(Request $request)
    {
        // 定义uid
        $uid = $request->uid;

        // 定义要修改的id
        $id = $request->id;

        // 去除冗余
        $data = $request->except('_token', 'uid');

        // 修改数据
        $res = \DB::table('av')->where('id', $id)->update($data);

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/avShow/'.$uid)->with(['info' => '修改成功']);
        }
        else
        {
            return back()->with(['info' => '修改失败']);
        }  
    }

    // avDelete 删除茶歇信息
    public function avDelete($id)
    {
        // 执行删除
        $res = \DB::table('av')->where('id', $id)->delete();

        // 判断
        if($res)
        {
            return redirect('tenant/mansite/avShow/'.session('hmer')->id)->with(['info' => '删除成功']);
        }
        else
        {
            return back()->with(['info' => '删除失败']);
        } 
    }
}
