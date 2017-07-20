<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/city.css') }}">
    <script type="text/javascript" src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>   
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
						<li><a href="{{ asset('/home/index') }}"><span>开场首页</span></a></li>

						@if(session('huser'))
      						<li><a href="#"><span id="status">{{ session('huser')->userName }}</span></a></li>
      						<li><a href="{{ url('/home/logout') }}"><span>退出</span></a></li>
						@else
							<li id="register"><a href="#"><span>注册</span></a></li>
							<li id="login"><a href="#"><span>登录</span></a></li>
						@endif			

					</ul>

					<ul class="wrap_ul r">

						<div>
							<a href="{{ asset('/home/personal/index') }}"><span class="first_span">我的开场</span></a>
							<ul>
								<li><a href="{{ asset('/home/order/myOrder') }}">我的订单</a></li>
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
								<li><a href="{{ asset('/home/merchant/register') }}">添加商户</a></li>
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
				<form action=" {{ url('/home/search/general') }} " method="get">
					<ul class="search_ul">
						
						<!-- 城市选择 -->
						<li class="city"><input type="text" placeholder="北 京" id="place" name="city" value=""></li>
						<div id="in_city" style="display: none; position:absolute; top: 64px; left: -292px;"></div>
						
						<!-- 关键字 -->
						<li class="kw"><input class="inp" type="text" name="keywords" placeholder="场地或地标关键字"></li>
						
						<!-- 可容纳人数 -->
						<li class="number">
							<div class="dis_sel" >
								<select name="number">
									<option value="0">人数不限</option>
									<option value="50-100">50-100</option>
									<option value="100-200">100-200</option>
									<option value="200-300">200-300</option>
									<option value="300-400">300-400</option>
								</select>
							</div>
							<div class="mar"><div class="s"></div></div>
						</li>
						<li class="sear"><a href="#"><input type="image" src="{{ asset('/images/search.png') }} "></a></li>
					</ul>
				</form>
			</div>
				
       		<!-- 高级搜索 -->
       		<div id="super_img"><img src="{{ asset('/images/jiantou.png') }}"></div>
			<div id="super_sear"><a onclick="javascript:superSearch();" ><span>高级搜索</span></a></div>

		</div>
		
		
		<!--  高级搜素选择部分开始  -->

			<div class="superSearcher" style="display: none;">

				<form action="{{ asset('/home/search/super') }}" method="get">

					<table>

						<tr class="t_first">
							<td class="title_style" style="padding-right: 8px;">会议规模:</td>
							<td>

								<!-- 城市选择 -->
								<input type="text" placeholder="城市" id="destination" style="width: 80px; height: 25px; margin-right: 14px;" name="city" value="">
								<div id="in_city" style="display: none; position:absolute; top: 64px; left: -292px;"></div>



								<select name="supPerson" id="supPerson" style="width: 80px; height: 25px; margin-right: 14px;">
									<option>人数</option>
									<option>人数不限</option>
									<option>10-50</option>
									<option>50-100</option>
									<option>100-300</option>
									<option>300-500</option>
									<option>500-1000</option>
					
								</select>
								<select name="budget" id="budget" style="width: 80px; height: 25px; margin-right: 14px;">
									<option>预算</option>
									<option>3000以下</option>
									<option>3-5千</option>
									<option>5-8千</option>
									<option>8千-1.2万</option>
									<option>1.2万-1.5万</option>
									<option>1.5万-2万</option>
									<option>2万-3万</option>
									<option>3万-5万</option>
									<option>5万-8万</option>
									<option>8万-12万</option>
									<option>12万-20万</option>
									<option>20万-30万</option>
									<option>30万以上</option>
								</select>
							</td>
						</tr>

						<tr class="t_second">
							<td class="title_style">场地类型:</td>
							<td>
								<label><input id="hotel" type="checkbox" name="type[]" value="酒店">酒店</label>
								<label><input type="checkbox" name="type[]" value="会议中心">会议中心</label>
								<label><input type="checkbox" name="type[]" value="体育馆">体育馆</label>
								<label><input type="checkbox" name="type[]" value="展览馆">展览馆</label>
								<label><input type="checkbox" name="type[]" value="酒吧/餐厅/会所">酒吧/餐厅/会所</label>
								<label><input type="checkbox" name="type[]" value="艺术中心/剧院">艺术中心/剧院</label>
								<label><input type="checkbox" name="type[]" value="咖啡厅/茶室">咖啡厅/茶室</label>
								<span>&nbsp;&nbsp;(可多选)</span>
							</td>
						</tr>

						<tr class="t_three">
							<td class="title_style">会议时长:</td>
							<td>
								<select name="meeting" id="meeting" style="width: 80px; height: 25px; margin-right: 14px;">
									<option>会议时长</option>
									<option>一晚</option>
									<option>半天</option>
									<option>一天</option>
									<option>两天</option>
									<option>3-4天</option>
									<option>5-7天</option>
									<option>7-14天</option>
									<option>14天以上</option>
								</select>
								<select name="starTime" id="starTime" style="width: 80px; height: 25px; margin-right: 14px;">
									<option>开始时间</option>
								</select>
							</td>
						</tr>
						
						<tr class="t_four">
							<td class="title_style" style="color: #ccc;">酒店星级:</td>
							<td>
								<label style="color: #ccc;"><input disabled type="radio" name="star" value="1">三星以下</label>
								<label style="color: #ccc;"><input disabled type="radio" name="star" value="三星级">三星级</label>
								<label style="color: #ccc;"><input disabled type="radio" name="star" value="四星级">四星级</label>
								<label style="color: #ccc;"><input disabled type="radio" name="star" value="五星级">五星级</label>
								<label style="color: #ccc;"><input disabled type="radio" name="star" value="六星级">六星级</label>
								<label style="color: #ccc;"><input disabled type="radio" name="star" value="七星级">七星级</label>
							</td>
						</tr>

					</table>

					<div>
						<input type="image" src="{{ asset('/images/search_super.png') }}">
					</div>

				</form>

			</div>

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
			<div class="login_title"><span>用户登录</span><span class="closer">×</span></div>
			<div class="login_logo"><img src="/images/login.png"></div>
			<div>
				<form action="{{ url ('/home/login') }}" method="post">

					{{ csrf_field() }}

					<input class="log_phon" type="text" name="phone" value="" placeholder="请输入手机号或邮箱"><div style="display: none; position: absolute; top: 160px; left: 84px; color: red; font-wieght: blod;"></div><br/>
					<input class="log_pass" type="password" name="password" value="" placeholder="请输入密码"><div style="display: none; position: absolute; top: 230px; left: 84px; color: red; font-wieght: blod;"></div><br/>
					<input class="log_code" type="text" name="code" value="" placeholder="请输入验证码"><div style="display: none; position: absolute; top: 302px; left: 84px; color: red; font-wieght: blod;"></div><a onclick="javascript:re_captcha_log();" ><img src="{{ URL('/kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="85" height="36" id="checkLogCode" border="0"></a><br/>
					
					<div class="log_reme" ><label><input type="checkbox" name="rememberMe[]" value="1"> <span>记住密码</span></label>
					<a href="#"><span>忘记密码</span></a></div><br/>
					<input class="log_subm" type="image" src="{{ asset('/images/sub.png') }}">
				</form>
			</div>
		</div>
	<!-- 登录div 结束 -->

	<!-- 注册div 隐藏 -->
		<div id="register_box" style="display: none;">
			<div class="register_title"><span>用户注册</span><span class="closer">×</span></div>
			<div class="register_logo"><img src="/images/login.png"></div>
			<div>

				<form action="{{ url ('/home/register') }}" method="post">
					
					{{ csrf_field() }}

					<input class="register_phon" type="text" name="phone" value="" placeholder="请输入手机号或邮箱"><div style="display: none; position: absolute; top: 160px; left: 84px; color: red; font-wieght: blod;"></div><br/>
					<input class="register_pass" type="password" name="password" value="" placeholder="请输入密码"><div style="display: none; position: absolute; top: 230px; left: 84px; color: red; font-wieght: blod;"></div><br/>
					<input class="register_name" type="text" name="userName" value="" placeholder="请输入用户名"><div style="display: none; position: absolute; top: 302px; left: 84px; color: red; font-wieght: blod;"></div><br/>
					<input class="register_code" type="text" name="code" value="" placeholder="请输入验证码"><div style="display: none; position: absolute; top: 372px; left: 84px; color: red; font-wieght: blod;"></div><a onclick="javascript:re_captcha();" ><img src="{{ URL('/kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="85" height="36" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a><br/>
				

					<div class="phco">
						<input class="register_phco" type="text" name="phonecode" value="" placeholder="请输入收到的验证码">
						<div><a href="#"><span>获取验证码</span></a></div>
					</div>

					<div class="register_reme" >
					<span> √ 同意用户<a href="#"><b>服务条例及隐私协议</b></a></span></div><br/>
					<input class="register_subm" type="image" src="{{ asset('/images/reg.png') }}">
				</form>
			</div
		</div>
	<!-- 注册div 结束 -->
	
	<script>
	  // 点击刷新验证码
	   function re_captcha() {
	   		$url = "{{ URL('/kit/captcha') }}";
	        $url = $url + "/" + Math.random(10, 99);
	        $('#c2c98f0de5a04167a9e427d883690ff6').attr('src', $url);
	  }

	   function re_captcha_log() {
	   		$url = "{{ URL('/kit/captcha') }}";
	        $url = $url + "/" + Math.random(10, 99);
	        $('#checkLogCode').attr('src', $url);
	  }
	</script>	
	<script type="text/javascript" src="{{ asset('/js/home.index.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/home.index.ajax.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/home.index.autolog.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/cityTemplate.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/citySelect.js') }}"></script>
	
	

</body>
</html>