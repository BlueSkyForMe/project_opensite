<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReController extends Controller
{
    //加载后台主页
    public function index(Request $request)
    {
        // 查询数据库
        $data = \DB::table('hot')->get();


        return view('admin.index.re', ['title' => '友情链接', 'data' => $data, 'request' => $request->all()]);
    }

     // 加载添加页
    public function add()
    {
        // dd(111);
        return view('admin.re.add', ['title' => '添加热门场地']);
    }

    // 执行添加
    public function insert(Request $request)
    {
        // 验证表单
        $this->validate($request,
            [
                're_name' => 'required|unique:hot|max:10',
                're_site' => 'required|unique:hot',
                're_type' => 'required',
                're_url' => 'required',
            ],
            [
                're_name.required' => '场地名称不能为空',
                're_name.unique' => '场地名称已存在',
                're_name.max' => '场地名称不能超过十个字符',
                're_site.required' => '公司地址不能为空',
                're_type.required' => '场地类型不能为空',
                're_url.required' => '链接地址不能为空不能为空',
            ]);
        $data = $request->except('_token');
        // dd($data);


        // 判断是否上传图像
        if($request->hasFile('re_image'))
        {
            if($request->file('re_image')->isValid())
            {
                // 生成图像名称
                $extension = $request->file('re_image')->extension();
                $fliename = time().mt_rand(100000,999999).'.'.$extension;

                // 移动图片
                $request -> file('re_image') -> move('./uploads/photo', $fliename);

                $data['re_image'] = $fliename;
            }
        }

        // 插入数据库
        $res = \DB::table('hot')->insert($data);

        if($res)
        {
            return redirect('/admin/re/index')->with(['info' => '添加成功']);
        }
        else
        {
            return back()->with(['info' => '添加失败']);
        }
    }


    // 加载修改页面
    public function edit(Request $request)
    {

        // 根据id查询相应的数据
        $data = \DB::table('hot')->where('id', $request->id)->first();
        // dd($data);

        return view('admin.re.edit', ['title' => '修改热门场地页', 'data' => $data]);
    }


    // 执行修改页面
    public function update(Request $request, $id)
    {

        $data = $request->all();
        // dd($data);
        // 清除token
        $data = $request->except('_token');
    
        // 验证表单
        $this->validate($request,
             [
                're_name' => 'required|max:10',
                're_site' => 'required',
                're_type' => 'required',
                're_url' => 'required',
            ],
            [
                're_name.required' => '场地名称不能为空',
                're_name.unique' => '场地名称已存在',
                're_name.max' => '场地名称不能超过十个字符',
                're_site.required' => '公司地址不能为空',
                're_type.required' => '场地类型不能为空',
                're_url.required' => '链接地址不能为空不能为空',
            ]);

        

        // 判断是否上传图像
        if($request->hasFile('re_image'))
        {
            if($request->file('re_image')->isValid())
            {
                // 生成图像名称
                $extension = $request->file('re_image')->extension();
                $fliename = time().mt_rand(100000,999999).'.'.$extension;

                // 移动图片
                $request -> file('re_image') -> move('./uploads/photo', $fliename);

                $data['re_image'] = $fliename;



                // 获取原图片名称
                $oldphoto = \DB::table('hot')->where('id', $request->id)->first()->re_image;

                // 判断
                if(file_exists('./uploads/photo/'.$oldphoto) && $oldphoto != 'default.jpg')
                {   
                    // 删除图片
                    unlink('./uploads/photo/'.$oldphoto);
                }
            }
        }

        // 执行修改
        $res = \DB::table('hot')->where('id', $id)->update($data);

        if($res)
        {
            return redirect('/admin/re/index')->with(['info' => '更新成功']);
        }
        else
        {
            return back()->with(['info' => '更新失败']);
        }   

    }

    // 执行删除页
    public function delete(Request $request)
    {
        $res = \DB::table('hot')->where('id', $request->id)->delete();

        if($res)
        {
            return redirect('/admin/re/index')->with(['info' => '删除成功']);
        }
        else
        {
            return back()->with(['info' => '删除失败']);
        }
    }
}
