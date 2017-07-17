
//==========ajax验证注册数据是否合法===================
		var ph = 0;
		var na = 0;
		var cd = 0;
		var lcd = 0;
		var lph = 0;

		//验证码是否正确
		$('.register_code').blur(function(){

			//获取用户输入的内容
			var inputCode = $(this).val();

			//删除原有的错误信息提示
			$('.register_code').next().find('.msg').remove();

			// 书写 ajax, 验证手机号或邮箱是否合法,是否可用
            $.get('/home/register/ajax', {"cod": inputCode}, function(data){
              	
              	//定义全局变量, errorMsg: 错误信息  flag: 内容合法
              	var errorMsg;
              	var flag;

 				switch(data)
 				{
 					case 8: errorMsg = '验证码错误'; break;
 					case 9: flag = 1;  errorMsg = '验证码正确'; break;
 					
 				}

                //将错误信息追加到页面中
                $('.register_code').next().css('display', 'block');
                $('.register_code').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag)
                {
                	$('.register_code').next().css('color', 'green');
                	cd = 1;
                }
             
            }, 'json');
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
              	var flag;

 				switch(data)
 				{
 					case 0: errorMsg = '输入内容格式不正确'; break;
 					case 1: errorMsg = '该手机已经注册'; break;
 					case 2: flag = 1; errorMsg = '该手机号可用'; break;
 					case 3: errorMsg = '该邮箱已经注册'; break;
 					case 4: flag = 2; errorMsg = '该邮箱可用'; break;
 				}

                //将错误信息追加到页面中
                $('.register_phon').next().css('display', 'block');
                $('.register_phon').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag == 1)
                {
                	$('.register_phon').next().css('color', 'green');
                	ph = 1;
                }
                if(flag == 2)
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
 					case 6: flag = 1; errorMsg = '该用户名可用'; break;
 					case 7: errorMsg = '请输入3 ~ 16位字符, 不能包含特殊字符'; break;
 				}

                //将错误信息追加到页面中
                $('.register_name').next().css('display', 'block');
                $('.register_name').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag)
                {
                	$('.register_name').next().css('color', 'green');
                	na = 1;
                }
             
            }, 'json');
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

			if(ph == 1 && na == 1 && cd == 1 && ps)
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
			$('.log_code').next().find('.msg').remove();

			// 书写 ajax, 验证手机号或邮箱是否合法,是否可用
            $.get('/home/register/ajax', {"cod": inputCode}, function(data){
              	
              	//定义全局变量, errorMsg: 错误信息  flag: 内容合法
              	var errorMsg;
              	var flag;

 				switch(data)
 				{
 					case 8: errorMsg = '验证码错误'; break;
 					case 9: flag = 1;  errorMsg = '验证码正确'; break;
 					
 				}

                //将错误信息追加到页面中
                $('.log_code').next().css('display', 'block');
                $('.log_code').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag)
                {
                	$('.log_code').next().css('color', 'green');
                	lcd = 1;
                }
             
            }, 'json');
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
                	lph = 1;
                }
                if(flag == 2)
                {
                	$('.log_phon').next().css('color', 'green');
                	$('.log_phon').attr('name', 'email');
                	lph = 1;
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

			if(lcd == 1 && lph == 1 && ps)
			{
				return true;
			}
			else
			{
				alert('信息有误, 请检查修改后重试');
				return false;
			}

		});




		