
//==========ajax验证注册数据是否合法===================
		var ph = 0;
		var na = 0;
		var cd = 0;
		var lcd = 0;
		var lph = 0;
		var flag = 0;
		var phone = null;
		var email = null;
		var code = null;
		var emailCode = null;
		var pd = 0;
		var fla = 1;
		var phoneFlag = 0;

		//验证码是否正确
		$('.register_code').blur(function(){

			//获取用户输入的内容
			var inputCode = $(this).val();

			//删除原有的错误信息提示
			if(inputCode.length < 5)
			{
				$('.register_code').next().find('.msg').remove();
				fla = 1;
			}


			if(inputCode.length == 5 && fla == 1)
			{
				fla = 0;

				$('.register_code').next().find('.msg').remove();

				// 书写 ajax, 验证手机号或邮箱是否合法,是否可用
	            $.get('/home/register/ajax', {"cod": inputCode}, function(data){

	            	// alert(data);
	              	
	              	//定义全局变量, errorMsg: 错误信息  
	              	var errorMsg;

	 				switch(data)
	 				{
	 					case 8: flag = 0;  errorMsg = '验证码错误, 请点击图片刷新后重试'; break;
	 					case 9: flag = 1;  errorMsg = '验证码正确'; break;
	 					
	 				}

	                //将错误信息追加到页面中
	                $('.register_code').next().css('display', 'block');
	                $('.register_code').next().append("<span class='msg'>" + errorMsg + "</span>");
	                if(flag == 1)
	                {
	                	$('.register_code').next().css('color', 'green');
	                	cd = 1;
	                }
	                if(flag == 0)

	                {
	                	$('.register_code').next().css('color', 'red');
	                }
	             
	            }, 'json');
			}


		}).keyup(function(){

            //triggerHandler 防止事件执行完后，浏览器自动为标签获得焦点
            $(this).triggerHandler("blur");
        });


		//验证手机号或邮箱
		$('.register_phon').blur(function(){

			//获取用户输入的内容
			var content = $(this).val();

			//删除原有的错误信息提示
			$('.register_phon').next().find('.msg').remove();

            // 书写 ajax, 验证手机号或邮箱是否合法,是否可用
            $.get('/home/register/ajax', {"pe": content}, function(data){
              	
              	//定义全局变量, errorMsg: 错误信息  flag: 内容合法
              	var errorMsg;


 				switch(data)
 				{
 					case 0: errorMsg = '输入内容格式不正确'; break;
 					case 1: errorMsg = '该手机已经注册'; break;
 					case 2: flag = 2; phoneFlag = 1; errorMsg = '该手机号可用'; phone = content; break;
 					case 3: errorMsg = '该邮箱已经注册'; break;
 					case 4: flag = 3; phoneFlag = 0; errorMsg = '该邮箱可用';  email = content; break;
 				}

                //将错误信息追加到页面中
                $('.register_phon').next().css('display', 'block');
                $('.register_phon').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag == 2)
                {
                	$('.register_phon').next().css('color', 'green');
                	ph = 1;
                }
                if(flag == 3)
                {
                	$('.register_phon').next().css('color', 'green');
                	$('.register_phon').attr('name', 'email');
                	ph = 1;
                }
             
            }, 'json');
		});
		
		//验证密码
		$('.register_pass').blur(function(){

			//查询密码输入框是否有内容
			var ps = null;
			ps = $('.register_pass').val() ;

			if(ps)
			{
				//删除原有的错误信息提示
				$('.register_pass').next().find('.msg').remove();

				$('.register_pass').next().css('display', 'block');
                $('.register_pass').next().append("<span class='msg'> 密码可用 </span>");
				$('.register_pass').next().css('color', 'green');
			}
			else
			{
				//删除原有的错误信息提示
				$('.register_pass').next().find('.msg').remove();

				$('.register_pass').next().css('display', 'block');
                $('.register_pass').next().append("<span class='msg'> 密码不能为空 </span>");
                return false;
			}

		});
		
		//验证用户名
		$('.register_name').blur(function(){

			//获取用户输入的内容
			var re_name = $(this).val();

			//删除原有的错误信息提示
			$('.register_name').next().find('.msg').remove();

			 // 书写 ajax, 验证手机号或邮箱是否合法,是否可用
            $.get('/home/register/ajax', {"userName": re_name}, function(data){
              	
              	//定义全局变量, errorMsg: 错误信息  flag: 内容合法
              	var errorMsg;
              	var flag;

 				switch(data)
 				{
 					case 5: errorMsg = '该用户名已经注册'; break;
 					case 6: flag = 4; errorMsg = '该用户名可用'; break;
 					case 7: errorMsg = '请输入3 ~ 16位字符, 不能包含特殊字符'; break;
 				}

                //将错误信息追加到页面中
                $('.register_name').next().css('display', 'block');
                $('.register_name').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag == 4)
                {
                	$('.register_name').next().css('color', 'green');
                	na = 1;
                }
             
            }, 'json');
		});

		//获取验证手机验证码 或 邮箱验证码
		$('.getPhone').click(function(){

			// 定义$(this)
			var ts = $(this);

			ts.css('background', '#ccc');

			if(ph == 1 && na == 1 && cd == 1 && phoneFlag == 1)
			{


		    	// 只能点击一次
				var status = status = ts.find("span").attr('status');

				// 判断是否点击过
			    if(status == 1)
			    {
			    	return false;
			    }

				var SMS_ACCOUNT = '15600279967';
				var SMS_PASSWORD = 'sendmsg';

				//随机数函数
				function random(Min,Max)
				{   
				    var Range = Max - Min;   
				    var Rand = Math.random();   
				    return(Min + Math.round(Rand * Range));   
				}

				//调用函数
				getSmsCode();

				//发送手机验证码
				function getSmsCode() 
				{

					//获取随机验证码
					code = random(0000, 9999);

					//请求接口
				    var url = "http://sms.tehir.cn/code/sms/api/v1/send?srcSeqId=123&account="+SMS_ACCOUNT+"&password="+SMS_PASSWORD+"&mobile="+ phone +"&code="+ code +"&time=60s";
				    $.ajax({
				        url: url,
				        type: "get",
				        dataType: "json",
				        success: function (result) {
				            if (result.success == false) {
				                alert(result.info);
				                return;
				            } else {
				                alert("短信验证码已经发送到您的手机！");
				            }
				        },
				        complete: function (XMLHttpRequest, textStatus) {
				        }
				    });
				}

				// 设置已点击
		    	ts.find("span").attr('status', 1);


				//倒计时
				waitting();

			    function waitting()
			    {
			    	num = 60;
			    	$(this).find("span").html(num);

	                var inte = setInterval(function(){
	                    num--;
	                    $('.getPhone').find("span").html(num);
	                    if(num == 0)
	                    {
	                    	// 清除定时器。
			                clearInterval(inte);
			                ts.css('background', '#0066cc');
		    				ts.find("span").attr('status', 0);
			                $('.getPhone').find('span').html("获取验证码");
			                return ;
	                    }

	                 }, 1000);
			    }

			}
			else if(ph == 1 && na == 1 && cd == 1 && phoneFlag == 0)
			{

				// 只能点击一次
				var status = status = ts.find("span").attr('status');

				// 判断是否点击过
			    if(status == 1)
			    {
			    	return false;
			    }

				// ajax 请求
				$.ajax('/home/register/sendEmail',
					{
						type:"GET",
						data:{contact:email},
						success:function(data)
						{
							emailCode = data;
						},
						dataType:"json"
					});
	

				// 设置已点击
		    	ts.find("span").attr('status', 1);

		    	//倒计时
				waitting();

			    function waitting()
			    {
			    	num = 60;
			    	$(this).find("span").html(num);

	                var inte1 = setInterval(function(){
	                    num--;
	                    $('.getPhone').find("span").html(num);
	                    if(num == 0)
	                    {
	                    	// 清除定时器。
			                clearInterval(inte1);
			                ts.css('background', '#0066cc');
			                ts.find("span").attr('status', 0);
			                $('.getPhone').find('span').html("获取验证码");
			                return ;
	                    }

	                 }, 1000);
			    }
		    	
			}

		});

		//获取输入的手机验证码或邮箱验证码
		$('.register_phco').blur(function(){

			val = $(this).val();

			//删除原有的错误信息提示
			$('.getPhone').next().find('.msg').remove();

			if(phoneFlag == 1)
			{

				if(val == code)
				{
					var errorMsg;
					errorMsg = "验证码正确";

					//将错误信息追加到页面中
	                $('.getPhone').next().css('display', 'block');
	                $('.getPhone').next().append("<span class='msg'>" + errorMsg + "</span>");
	                $('.getPhone').next().css('color', 'green');
	                pd = 1;
				}
				else
				{
					var errorMsg;
					errorMsg = "验证码不正确";

					//将错误信息追加到页面中
	                $('.getPhone').next().css('display', 'block');
	                $('.getPhone').next().append("<span class='msg'>" + errorMsg + "</span>");
	                pd = 0;
				}
			}
			if(phoneFlag == 0)
			{

				if(val == emailCode)
				{
					var errorMsg;
					errorMsg = "验证码正确";

					//将错误信息追加到页面中
	                $('.getPhone').next().css('display', 'block');
	                $('.getPhone').next().append("<span class='msg'>" + errorMsg + "</span>");
	                $('.getPhone').next().css('color', 'green');
	                pd = 1;
				}
				else
				{
					var errorMsg;
					errorMsg = "验证码不正确";

					//将错误信息追加到页面中
	                $('.getPhone').next().css('display', 'block');
	                $('.getPhone').next().append("<span class='msg'>" + errorMsg + "</span>");
	                pd = 0;
				}
			}


		});

		//提交验证
		$('.register_subm').on('click', function(){

			//查询密码输入框是否有内容
			var ps = null;
			ps = $('.register_pass').val() ;

			if(ps)
			{
				//删除原有的错误信息提示
				$('.register_pass').next().find('.msg').remove();

				$('.register_pass').next().css('display', 'block');
                $('.register_pass').next().append("<span class='msg'> 密码可用 </span>");
				$('.register_pass').next().css('color', 'green');
			}
			else
			{
				//删除原有的错误信息提示
				$('.register_pass').next().find('.msg').remove();

				$('.register_pass').next().css('display', 'block');
                $('.register_pass').next().append("<span class='msg'> 密码不能为空 </span>");
                return false;
			}

			if(ph == 1 && na == 1 && cd == 1 && ps && pd == 1)
			{
				return true;
			}
			else
			{
				alert('注册信息有误, 请检查修改后重试');
				return false;
			}

		});


//==========ajax验证登录数据是否合法===================

		//验证码是否正确
		$('.log_code').blur(function(){

			//获取用户输入的内容
			var inputCode = $(this).val();

			//删除原有的错误信息提示
			if(inputCode.length < 5)
			{
				$('.log_code').next().find('.msg').remove();
				fla = 1;
			}


			if(inputCode.length == 5 && fla == 1)
			{
				fla = 0;

				$('.log_code').next().find('.msg').remove();

				// 书写 ajax, 验证手机号或邮箱是否合法,是否可用
	            $.get('/home/register/ajax', {"cod": inputCode}, function(data){

	            	// alert(data);
	              	
	              	//定义全局变量, errorMsg: 错误信息  
	              	var errorMsg;

	 				switch(data)
	 				{
	 					case 8: flag = 0;  errorMsg = '验证码错误, 请点击图片刷新后重试'; break;
	 					case 9: flag = 1;  errorMsg = '验证码正确'; break;
	 					
	 				}

	                //将错误信息追加到页面中
	                $('.log_code').next().css('display', 'block');
	                $('.log_code').next().append("<span class='msg'>" + errorMsg + "</span>");
	                if(flag == 1)
	                {
	                	$('.log_code').next().css('color', 'green');
	                	lcd = 1;
	                }
	                if(flag == 0)

	                {
	                	$('.log_code').next().css('color', 'red');
	                }
	             
	            }, 'json');
			}


		}).keyup(function(){

            //triggerHandler 防止事件执行完后，浏览器自动为标签获得焦点
            $(this).triggerHandler("blur");
        });
















		//验证手机号或邮箱
		$('.log_phon').blur(function(){

			//获取用户输入的内容
			var content = $(this).val();

			//删除原有的错误信息提示
			$('.log_phon').next().find('.msg').remove();

            // 书写 ajax, 验证手机号或邮箱是否合法,是否可用
            $.get('/home/register/ajax', {"pe": content}, function(data){
              	
              	//定义全局变量, errorMsg: 错误信息  flag: 内容合法
              	var errorMsg;
              	var flag;

 				switch(data)
 				{
 					case 0: errorMsg = '输入内容格式不正确'; break;
 					case 1: flag = 1; errorMsg = '√'; break;
 					case 2: errorMsg = '该手机号未注册'; break;

 					case 3: flag = 2; errorMsg = '√'; break;
 					case 4: errorMsg = '该邮箱未注册'; break;
 				}

                //将错误信息追加到页面中
                $('.log_phon').next().css('display', 'block');
                $('.log_phon').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag == 1)
                {
                	$('.log_phon').next().css('color', 'green');
                	// lph = 1;
                }
                if(flag == 2)
                {
                	$('.log_phon').next().css('color', 'green');
                	$('.log_phon').attr('name', 'email');
                	// lph = 1;
                }
             
            }, 'json');
		});

		//提交验证
		$('.log_subm').on('click', function(){

			//查询密码输入框是否有内容
			var ps = null;
			ps = $('.log_pass').val() ;

			if(!ps)
			{

				//删除原有的错误信息提示
				$('.log_pass').next().find('.msg').remove();

				$('.log_pass').next().css('display', 'block');
                $('.log_pass').next().append("<span class='msg'> 密码不能为空 </span>");
                return false;
			}

			if(lcd == 1 && ps)
			{
				return true;
			}
			else
			{
				alert('信息有误, 请检查修改后重试');
				return false;
			}

		});




		