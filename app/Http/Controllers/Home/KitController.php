<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台验证码控制器
class KitController extends Controller
{
     // kit 验证码
    public function captcha($tmp)
    {

        // echo '程序走到这了';

    	// 清除缓冲区内容
    	ob_get_clean();

        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;

        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容闪存存入session
       	\Session::flash('homeCode', $phrase);

        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}