<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>开场租赁平台_登录</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    
</head>
<body>
	
	<!-- 页面容器 -->	
	<div class="container_i">
		
		<!-- 头部header -->
		<div class="header">

			<div class="container_wrap">

				<div class="wrap">

					<ul class="wrap_ul l">
						<li><a href="#"><span class="first_span">全国</span></a></li>
						<li><a href="#"><span>开场首页</span></a></li>
						<li id="register"><a href="#"><span>注册</span></a></li>
						<li id="login"><a href="#"><span>登录</span></a></li>
					</ul>

					<ul class="wrap_ul r">

						<div>
							<a href="#"><span class="first_span">我的开场</span></a>
							<ul>
								<li><a href="#">我的订单</a></li>
								<li><a href="#">我的足迹</a></li>
							</ul>
						</div>

						<div><a href="#"><span>购物车</span></a></div>


						<div><a href="#"><span>收藏夹</span></a>
							<ul>
								<li><a href="#">收藏的宝贝</a></li>
								<li><a href="#">收藏的商家</a></li>
							</ul>
						</div>

						<div><a href="#"><span>商家中心</span></a>
							<ul>
								<li><a href="#">添加商户</a></li>
								<li><a href="#">用户中心</a></li>
								<li><a href="#">商户认证</a></li>
								<li><a href="#">我想合作</a></li>
							</ul>
						</div>

						<div><a href="#"><span>客服中心</span></a>
							<ul>
								<li><a href="#">消费者客服</a></li>
								<li><a href="#">商家客服</a></li>
							</ul>
						</div>


						<div><a href="#"><span>网站导航</span></a>
							<ul>
								<li><a href="#">酒店</a></li>
								<li><a href="#">会议中心</a></li>
								<li><a href="#">体育馆</a></li>
								<li><a href="#">展览馆</a></li>
								<li><a href="#">酒吧/餐厅/会所</a></li>
								<li><a href="#">艺术中心/剧院</a></li>
								<li><a href="#">咖啡厅/茶室</a></li>
							</ul>
						</div>


						<div><a href="#"><span>手机开场</span></a>
							<ul>
								<li><img src="/images/code.png"></li>
								<li><a href="#"><p>开场微信服务号</p></a></li>
								<li><img src="/images/code.png"></li>
								<li><a href="#"><p>开场手机端</p></a></li>
							</ul>
						</div>


					</ul>

				</div>
			</div>
		</div>


		<!-- 主体main -->
		<div class="main">

			<!-- logo -->
			<div id="logo"></div>
			
			<div id="search">
				<form action="" method="">
					<ul class="search_ul">
						<li class="city"><span>北  京</span><div class="s"></div></li>
						<li class="kw"><input class="inp" type="text" name="keywords" placeholder="场地或地标关键字"></li>
						<li class="number">
						
							<div class="dis_sel" >
							
								<select name="number">
									<option value="0">人数不限</option>
									<option value="1">50-100</option>
									<option value="2">100-200</option>
									<option value="3">200-300</option>
									<option value="4">300-400</option>
								</select>
							</div>
							<div class="mar"><div class="s"></div></div>
						</li>
						<li class="sear"><a href="#"><img src="/images/search.png "></a></li>
					</ul>
				</form>
			</div>
				
       		<!-- 高级搜索 -->
       		<div id="super_img"><img src="/images/jiantou.png"></div>
			<div id="super_sear"><a href="#"><span>高级搜索</span></a></div>

		</div>
		
		
		<!--  高级搜素选择部分开始  -->
		
		<!--/ 高级搜索选择部分结束  -->

		<!-- 尾部footer -->
		<div class="footer">
			<div class="footer_wrap">
				<!-- <div class="about"> -->
					<ul class="about">
						<li><a href="#"><span id="about_li">关于我们</span></a></li>
						<li><a href="#"><span>联系我们</span></a></li>
						<li><a href="#"><span>联系客服</span></a></li>
						<li><a href="#"><span>商家中心</span></a></li>
						<li><a href="#"><span>手机开场</span></a></li>
						<li><a href="#"><span>友情链接</span></a></li>
						<li><a href="#"><span>隐私政策</span></a></li>
					</ul>
				<!-- </div> -->

				<div class="copy">
					<span> COPYRIGHT &copy; 2017 - 2013 ALL RIGHTS RESERVED 开场网 版权所有</span>
				</div>

				<div class="allow">
					<span>经营许可证编号:京ICP备17034971号</span>
				</div>
			</div>

		</div>
		<!-- 尾部结束 -->

		
	</div>	
	
	<!-- 登录div 隐藏 -->
		<div id="login_box" style="display: none;">
			<div class="login_title"><span>用户登录</span></div>
			<div class="login_logo"><img src="/images/login.png"></div>
			<div>
				<form action="" method="">
					<input class="log_phon" type="text" name="phone" value="" placeholder="请输入手机号或邮箱"><br/>
					<input class="log_pass" type="password" name="password" value="" placeholder="请输入密码"><br/>
					<input class="log_code" type="text" name="code" value="" placeholder="请输入验证码"><br/>
					<div class="log_reme" ><label><input type="checkbox" name="remember[]" value="1"> <span>记住密码</span></label>
					<a href="#"><span>忘记密码</span></a></div><br/>
					<input class="log_subm" type="image" src="/images/sub.png">
				</form>
			</div>
		</div>
	<!-- 登录div 结束 -->

	<!-- 注册div 隐藏 -->
		<div id="register_box" style="display: none;">
			<div class="register_title"><span>用户注册</span></div>
			<div class="register_logo"><img src="/images/login.png"></div>
			<div>

				<form action="{{ url ('/home/register') }}" method="post">
					
					{{ csrf_field() }}

					<input class="register_phon" type="text" name="phone" value="" placeholder="请输入手机号"><div style="display: none; position: absolute; top: 160px; left: 84px; color: red; font-wieght: blod;"></div><br/>

					<input class="register_pass" type="password" name="password" value="" placeholder="请输入密码"><br/>
					<input class="register_name" type="text" name="name" value="" placeholder="请输入用户名"><br/>
					<input class="register_code" type="text" name="code" value="" placeholder="请输入验证码"><a onclick="javascript:re_captcha();" ><img src="{{ URL('/kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="85" height="36" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a><br/>

					<div class="phco">
						<input class="register_phco" type="text" name="phonecode" value="" placeholder="请输入收到的验证码">
						<div><a href="#"><span>获取验证码</span></a></div>
					</div>

					<div class="register_reme" ><label><input type="checkbox" name="remember[]" value="1"> <span>记住密码</span></label>
					<span> √ 同意用户<a href="#"><b>服务条例及隐私协议</b></a></span></div><br/>
					<input class="register_subm" type="image" src="/images/reg.png">
				</form>
			</div
		</div>
	<!-- 注册div 结束 -->
	

	<script type="text/javascript">
		
		//===============登录功能部分=======================
		$("#login").on('click', function(){
		
			$('#login_box').css('display', 'block');

		});

		//===============注册功能部分=======================
		$("#register").on('click', function(){
		
			$('#register_box').css('display', 'block');


		});
	
		//==============隐藏所有的下拉菜单====================
		$(".wrap_ul").find('ul').css('display', 'none');

		//当鼠标悬浮某个一级菜单时,显示其下拉菜单, 离开时,隐藏
		$('.wrap_ul>div').hover(function(){

			$(this).css('background', '#fff');
			$(this).find('ul').css('display', 'block');

		}, function(){

			$(this).css('background', '#ccc');
			$(this).find('ul').css('display', 'none');

		});

	</script>
	




	<!-- ajax验证注册数据是否合法 -->
	<script type="text/javascript">

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
 					case 4: flag = 1; errorMsg = '该邮箱可用'; break;
 				}

                //将错误信息追加到页面中
                $('.register_phon').next().css('display', 'block');
                $('.register_phon').next().append("<span class='msg'>" + errorMsg + "</span>");
                if(flag)
                {
                	$('.register_phon').next().css('color', 'green');
                }
             
            }, 'json');
		});



	

			

		

	</script>
	<!-- /ajax验证结束 -->






	<!-- 验证码 -->
	<script src="{{ asset ('/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset ('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset ('/js/icheck.min.js') }}"></script>
	<script>
		$(function () {
		    $('input').iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%'
		    });
		});

	  // 点击刷新验证码
	   function re_captcha() {
	   		$url = "{{ URL('/kit/captcha') }}";
	        $url = $url + "/" + Math.random();
	        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
	  }

	</script>
	<!-- /验证码结束 -->

</body>
</html>