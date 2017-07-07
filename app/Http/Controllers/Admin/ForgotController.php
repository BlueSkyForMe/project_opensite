<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotController extends Controller
{
    public function forgot()
    {
    	return view('admin.forgot.forgot');
    }

    public function sendEmail(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $res = \DB::table('manage')->where('email',$data['email'])->first();
        // dd($res);

        if(!$res)
        {
            
            return back()->with(['info' => '您的邮箱不存在']);
        }
                
        \Mail::send('mails.test', ['res'=>$res], function($message) use($data){
            $message->to($data['email']);
            $message->subject('这是邮件的标题');
        });

        // 处理邮箱
        $mail = strstr($data['email'], "@");
        ltrim($mail, '@');

        return view('admin.forgot.success', ['mail' => $mail]);
    }

    public function link($token)
    {
        // dd($token);
        $res = \DB::table('manage')->where('rememberToken', $token)->first();

        if($res)
        {
            return redirect('/admin/newpass/'.$res->id);
        }else
        {
            return redirect('/admin/info')->with(['info' => '不是一个合法的来源']);
        }
    }

    public function info()
    {
        return view('admin.forgot.info');
    }


    public function newPass($id)
    {
        // dd($id);
        return view('admin.forgot.newpass', ['id' => $id]);
        // dd($id);
    }


    public function updatePass(Request $request)
    {
        $this->validate($request, [
                'repassword' => 'same:password',
            ], [
                'repassword.same' => '密码不一样',
            ]);

        // dd($request->all());

        $id = $request->input('id');
        $password = encrypt($request->input('password'));
        $res = \DB::table('manage')->where('id', $id)->update(['password' => $password]);
        // dd($res);
        if($res)
        {
            return redirect('/admin/login')->with(['info' => '请登录']);
        }else
        {
            return redirect('/admin/info')->with(['info' => '修改失败']);
        }
    }

    public function test()
    {
        $data = 111;

        $res = encrypt($data);

        dd($res);
    }
}
