@extends('home.layout')

@section('content')


<div class="bodyer">
		<div class="daohang">
			<h2 >
				&nbsp;&nbsp;&nbsp;&nbsp;开场&nbsp;|&nbsp;<span>修改密码</span></h2>
			<ul class="juli">
				<a href="{{ asset('/home/index') }}"><li class="lly">首页</li></a>
				<a href="{{ asset('/home/personal/index') }}"><li class="lly">账户信息</li></a>
				<a href=""><li class="lly">我的订单</li></a>
				<a href=""><li class="lly">我的足迹</li></a>
				<a href="{{ asset('/home/personal/collect') }}"><li class="lly">收藏夹</li></a>
			</ul>
			
		</div>
		<div class="zhu_body">
			<div class="ge_left">
			@if($users)
				<div class="ge_left_a">
					<img src="{{ asset('/images/1.jpg') }}" class="left_img" alt="">
					<div class="left_name">{{ $users->userName }}</div>
					<div class="left_kong"></div>
					<a href="#" class="left_xinxi">完善信息</a>
				</div>
			@endif
				<div class="ge_left_b">
					<div class="left_jiben">
						<li class="lli"><a href="{{ asset('/home/personal/index') }}">基本信息</a></li>
					</div>
					<div class="left_mima">
						<li class="iil"><a href="#">修改密码</a></li>
					</div>
				</div>
			</div>
			<div class="ge_right">
			<form action="{{ asset('/home/personal/add') }}" method="post">
			{{ csrf_field() }}
				<div class="ge_right_a">
					<div class="ge_right_a_top">
						修改密码
					</div>
					<ul>
						<li class="il">
							<span>旧密码</span>
							<input class="personal_pass" type="password" name="oldpassword" placeholder="请输入">

						</li>
						<!-- <span class='msg'></span>	 -->
						<li class="il">
							<span>新密码</span>
							<input class="new_pass" type="password" name="password" placeholder="请输入">
						</li>
						<li class="il">
							<span>确认密码</span>
							<input class="new_password" type="password" name="repassword" placeholder="请输入">
						</li>
						<li class="il">
							<button class="btn">保存</button>
						</li>
					</ul>
				</div>
				</form>
				<div class="ge_right_b">
					<div class="ge_right_a_bottom">
						
					</div>
				</div>
			</div>
		</div>
	</div>				

<div class="clearer"></div>

@endsection

@section('js')

  <script type="text/javascript">

   //验证手机号或邮箱
		// $('.personal_pass').blur(function(){
			
		// 	//获取用户输入的内容
		// 	var content = $(this).val();

		// 	//console.log(content);
		// 	//删除原有的错误信息提示
		// 	$('.personal_pass').next().find('.msg').remove();

  //           // 书写 ajax, 验证密码是否正确
  //           $.get('/home/personal/ajax', {"password": content}, function(data){
  //             	// console.log(data);
  //             	//定义全局变量, errorMsg: 错误信息  flag: 内容合法
  //             	var errorMsg;
  //             	var flag;

  //             	console.log(data);

 	// 			switch(data)
 	// 			{
 	// 				case 0: errorMsg = '密码不正确'; break;
 	// 				case 1: flag = 1; errorMsg = '√'; break;
 	// 			}

 	// 			 console.log(data);

  //               //将错误信息追加到页面中
  //               // $('.personal_pass').next().css({'display','block';'margin-left:30px'});
  //               $('.personal_pass').next().append("<span class='msg'>" + errorMsg + "</span>");
                
  //               var span = "<span class='msg'>" + errorMsg + "</span>";
  //               //alert(span);
  //                 $('.personal_pass').parents("li").after(span);

  //               if(flag == 1)
  //               {
  //               	$('.personal_pass').next().css('color', 'green');
  //               	lph = 1;
  //               }
             
  //           }, 'json');
		// });

  </script>
@endsection