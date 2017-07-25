@extends('home.layout')

@section('content')

<!-- 主体main -->
<div class="main">
	<div class="wrap_column">
		<div class="column">
			<span>商家中心 > 添加商户</span>
		</div>
	</div>
	<div class="info">
		<span>申请开场商户完全免费；一个企业只能开设一个账户；申请到正式开通预计需1~3个工作日。了解更多请查看<b><a href="#">《开场商户守则》</a></b></span>
	</div>
	<div class="flow"><img src="{{ asset ('/images/register1.png') }}"></div>
	<div class="show1">
		<div class="shanghu"><span>开场商户版</span></div>
		<div class="shuoming1">
			<form action="{{ url ('/home/merchant/insert') }}" method="POST">
				{{ csrf_field() }}
				<input type="text" id="register_mer_name" class="regist1" name="userName" value="{{ old('userName') }}" placeholder="请输入商户名称（中文名称）">
				<div style="display:none; position: absolute; top: 228px; left: 765px;"></div>
				<input type="text" id="register_mer_contact" class="regist1" name="contact" value="{{ old('contact') }}" placeholder="请输入手机号或邮箱">
				<div style="display:none; position: absolute; top: 270px; left: 765px;"></div>
				<input type="password" id="register_mer_pass" class="regist1" name="password" value="{{ old('password') }}" placeholder="请输入密码(6-18位字母、数字、下划线组成)">
				<div style="display:none; position: absolute; top: 312px; left: 765px;"></div>
				<div id="f_w">
					<input type="text" id="code1" name="code" value="" placeholder="请输入验证码">
					<div id="sendcode"><a id="send-code" href="javascript:"><span>发送验证码</span></a></div>
					<div style="display:none; position: absolute; top: 355px; left: 765px;"></div>
				</div>
				<div class="next">
					<input id="next-inpt" style="margin-left: 110px;" type="image" src="{{ asset ('/images/next.png') }}">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')
	
<script type="text/javascript">
	
	// 设置ajax头信息
$.ajaxSetup(
	{
	    headers: 
	    {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

// 定义全局变量用作标识
var uname = 0;
var conta = 0;
var pass = 0;
var vcode = 0;

// 匹配公司名称
$("#register_mer_name").on('blur', function()
{	
	// 获取this
	var inp = $(this)	

	// 获取输入的单位名称
	var name = inp.val();

	// ajax验证
	$.ajax('/home/merchant/ajaxrename', 
		{
			type:'POST',
			data:{userName:name},
			success:function(data)
			{
				switch(data)
				{
					case "0" :
						inp.next().html('×请填写单位名称');
						inp.next().css('color','red');
						inp.next().css('display','block');
						uname = 0;
					break;
					case "1" :
						inp.next().html('×请正确填写单位名称');
						inp.next().css('color','red');
						inp.next().css('display','block');
						uname = 0;
					break;
					case "2" :
						inp.next().html('√单位名称正确');
						inp.next().css('color','green');
						inp.next().css('display','block');
						uname = 1;
					break;
					case "3" :
						inp.next().html('×该单位已经注册过了');
						inp.next().css('color','red');
						inp.next().css('display','block');
						uname = 0;
					break;	
				}
			},
			dataType:'json'
		});
	
});

// 获取手机号input框事件
$("#register_mer_contact").on('focus', function()
	{
		// 隐藏验证码错误提示
		$(this).parent().find("#sendcode").next().css("display", "none");

		// 获取单位名称的value值
		var val = $(this).prev().prev().val();

		// 为空给予错误提示
		if(!val)
		{
			$(this).prev().html('×请填写单位名称');
			$(this).prev().css('color','red');
			$(this).prev().css('display','block');
			uname = 0;
		}
	});

// 匹配手机号或邮箱
$("#register_mer_contact").on('blur', function()
{	
	// 获取this
	var inp = $(this)	

	// 获取输入的单位名称
	var name = inp.val();

	// ajax验证
	$.ajax('/home/merchant/ajaxrename', 
		{
			type:'POST',
			async:false,
			data:{contact:name},
			success:function(data)
			{
				switch(data)
				{
					case "0" :
						inp.next().html('×请填写手机号或邮箱');
						inp.next().css('color','red');
						inp.next().css('display','block');
						conta = 0;
					break;
					case "4" :
						inp.next().html('×输入有误');
						inp.next().css('color','red');
						inp.next().css('display','block');
						conta = 0;
					break;
					case "5" :
						inp.next().html('√手机号可用');
						inp.next().css('display','block');
						inp.next().css('color','green');
						conta = 1;
					break;
					case "6" :
						inp.next().html('×手机号已被注册');
						inp.next().css('display','block');
						inp.next().css('color','red');
						conta = 0;
					break;
					case "7" :
						inp.next().html('×该邮箱已被注册');
						inp.next().css('color','red');
						inp.next().css('display','block');
						conta = 0;
					break;
					case "8" :
						inp.next().html('√邮箱可用');
						inp.next().css('display','block');
						inp.next().css('color','green');
						conta = 1;
					break;
					case "9" :
						inp.next().html('×输入有误');
						inp.next().css('display','block');
						inp.next().css('color','red');
						conta = 0;
					break;	
				}
			},
			dataType:'json'
		});
	
});

// 获取密码input框事件
$("#register_mer_pass").on('focus', function()
	{
		// 获取单位名称和联系方式的value值
		var userval = $(this).parent().find("#register_mer_name").val();
		var contval = $(this).parent().find("#register_mer_contact").val();

		// 为空给予错误提示
		if(!userval && !contval)
		{	
			// 提示填写单位名称
			$(this).parent().find("#register_mer_name").next().html('×请填写单位名称');
			$(this).parent().find("#register_mer_name").next().css('color','red');
			$(this).parent().find("#register_mer_name").next().css('display','block');

			// 提示填写联系方式
			$(this).parent().find("#register_mer_contact").next().html('×请填写手机号或邮箱');
			$(this).parent().find("#register_mer_contact").next().css('color','red');
			$(this).parent().find("#register_mer_contact").next().css('display','block');

			// 标识错误
			pass = 0;
		}
		else if(!contval)
		{
			// 提示填写联系方式
			$(this).parent().find("#register_mer_contact").next().html('×请填写手机号或邮箱');
			$(this).parent().find("#register_mer_contact").next().css('color','red');
			$(this).parent().find("#register_mer_contact").next().css('display','block');

			// 标识错误
			conta = 0;
		}

	});

// 密码input框失去焦点事件
$("#register_mer_pass").on('blur', function()
	{
		// 获取密码
		var str = $(this).val();

		// 密码不能为空
		if(!str)
		{
			$(this).next().html('×请输入密码');
			$(this).next().css('color','red');
			$(this).next().css('display','block');

			// 标识错误
			pass = 0;
		}
		else
		{
			// 正则模式
			var reg = /^[a-zA-Z0-9]\w{5,17}$/;

			// 匹配密码 6-18位字母、数字、下划线组成
			var res = reg.test(str);

			// 判断
			if(res)
			{
				$(this).next().html('√输入正确');
				$(this).next().css('color','green');
				$(this).next().css('display','block');
				pass = 1;
			}
			else
			{
				$(this).next().html('×密码由6-18位字母数字下划线组成');
				$(this).next().css('color','red');
				$(this).next().css('display','block');

				// 标识错误
				pass = 0;
			}
		}

	});

// 点击发送验证码事件
$("#send-code").on("click", function()
	{
		// 定义$(this)
		var scode = $(this);

		// 获取联系方式的值
		var contval = scode.parents("form").find("#register_mer_contact").val();

		// 只能点击一次
		var status = status = scode.find("span").attr('status');

		// 判断是否为空
		if(!contval || conta != 1)
		{
			// 提示填写联系方式
			scode.parent().next().html('×请正确填写手机号或邮箱');
			scode.parent().next().css('color','red');
			scode.parent().next().css('display','block');

			return;
		}
		else
		{
			// 判断是否点击过
	    	if(status == 1)
	    	{
	    		return false;
	    	}

			// ajax 请求
			$.ajax('/home/merchant/ajaxGetCode',
				{
					type:"GET",
					data:{contact:contval},
					success:function(data)
					{
						console.log(data);
					},
					dataType:"json"
				});
		}

		// 设置已点击
    	scode.find("span").attr('status', 1);
    	
    	//倒计时
    	num = 60;
    	scode.find("span").html(num);
        var inte = setInterval(function()
        { 
            num--;
           	scode.find("span").html(num);

            if(num == 0)
            {
            	// 清除定时器。
                clearInterval(inte);
                scode.find('span').html("重新获取验证码");
                scode.find("span").attr('status', 0);
                return ;
            }

         }, 1000);	
	});

// 验证码失去焦点事件
$("#code1").on('blur', function()
	{
		// 定义$(this)
		var inpCode = $(this);

		// 获取输入的值
		var codeVal = inpCode.val();

		// 判断
		if(!codeVal)
		{
			// 提示验证码不能为空
			inpCode.next().next().html('×填写验证码');
			inpCode.next().next().css('color','red');
			inpCode.next().next().css('display','block');

			// 标识错误
			vcode = 0;
		}
		else
		{
			// ajax 验证验证码
			$.ajax('/home/merchant/ajaxverify', 
				{
					type:"GET",
					async:false,
					data:{code:codeVal},
					success:function(data)
					{
						switch(data)
						{
							case "0" : 
								inpCode.next().next().html('×验证码过期');
								inpCode.next().next().css('color','red');
								inpCode.next().next().css('display','block');
								// 标识错误
								vcode = 0;
							break;
							case "1" : 
								inpCode.next().next().html('√验证码正确');
								inpCode.next().next().css('color','green');
								inpCode.next().next().css('display','block');
								// 标识正确
								vcode = 1;
							break;
							case "2" : 
								inpCode.next().next().html('×验证码错误');
								inpCode.next().next().css('color','red');
								inpCode.next().next().css('display','block');
								// 标识错误
								vcode = 0;
							break;	
						}
					},
					dataType:"json"
				})
		}
	});

// 点击下一步
$('#next-inpt').on('click',function()
	{	
		// 定义$(this)
		var sub = $(this);

		// 获取单位名称
		var userval = sub.parents('form').find("#register_mer_name").val();
		
		// 判断
		if(!userval)
		{
			// 定义变量
			var userdiv = sub.parents('form').find("#register_mer_name").next()
			
			// 提示错误信息	
			userdiv.html('×请填写单位名称');
			userdiv.css('color', 'red');
			userdiv.css('display', 'block');

			// 阻止默认行为
			return false;
		}

		// 获取联系方式
		var contval = sub.parents('form').find("#register_mer_contact").val();
		
		// 判断
		if(!contval)
		{
			// 定义变量
			var contval = sub.parents('form').find("#register_mer_contact").next()
			
			// 提示错误信息	
			contval.html('×请填写手机号或邮箱');
			contval.css('color', 'red');
			contval.css('display', 'block');

			// 阻止默认行为
			return false;
		}

		// 获取密码
		var passval = sub.parents('form').find("#register_mer_pass").val();
		
		// 判断
		if(!passval)
		{
			// 定义变量
			var passval = sub.parents('form').find("#register_mer_pass").next()
			
			// 提示错误信息	
			passval.html('×请填写密码');
			passval.css('color', 'red');
			passval.css('display', 'block');

			// 阻止默认行为
			return false;
		}

		// 获取验证码
		var gcodeval = sub.parents('form').find("#code1").val();
		
		// 判断
		if(!gcodeval)
		{
			// 定义变量
			var gcode = sub.parents('form').find("#code1").next().next();
			
			// 提示错误信息	
			gcode.html('×请填写验证码');
			gcode.css('color', 'red');
			gcode.css('display', 'block');

			// 阻止默认行为
			return false;
		}

		// 单位、联系方式、密码、验证码全部输入正确方可提交
		if(uname == 1 && conta == 1 && pass == 1 && vcode == 1)
		{
			return true;
		}
		else
		{
			alert('信息输入有误,请仔细核对');
			return false;
		}
	});

</script>

@endsection
