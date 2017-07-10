<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }} | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset ('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/css/registe.css') }}">
    <script type="text/javascript" src="{{ asset ('/js/jquery-3.2.1.min.js') }}"></script>
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
						<li><a href="#"><span>注册</span></a></li>
						<li><a href="#"><span>登录</span></a></li>
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
								<li><img src="{{ asset ('/images/code.png') }}"></li>
								<li><a href="#"><p>开场微信服务号</p></a></li>
								<li><img src="{{ asset ('/images/code.png') }}"></li>
								<li><a href="#"><p>开场手机端</p></a></li>
							</ul>
						</div>


					</ul>

				</div>
			</div>


			<!-- logo 和 search -->
			<div class="logo_search">
				<!-- logo -->
				<div class="logo_sear_img"><img src="{{ asset ('/images/logo-1.png') }}"></div>
				<!-- search -->
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
							<li class="sear"><a href="#"><img src="{{ asset ('/images/search.png') }}"></a></li>
						</ul>
					</form>
				</div>
			</div>
		</div>
		<!-- /头部结束 -->

		<div class="bar"></div>
		
		@yield('content')

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

	<script type="text/javascript">

		//隐藏所有的下拉菜单
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

	@yield('js')
		
	</div>	
</body>
</html>