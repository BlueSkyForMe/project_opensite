<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }} | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset ('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/css/registe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/css/order.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/city.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/result.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/nav.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/laydate.css') }}">
    <link rel="stylesheet" type="text/css" id="layDateSkin" href="{{ asset('/css/laydate_skin.css') }}">



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
						<li><a href="{{ asset('/home/index') }}"><span>开场首页</span></a></li>
						@if(session('huser'))
      						<li>
      							<a href="#"><span id="status">{{ session('huser')['userName'] }}</span></a>
								<input type="hidden" id="userID" name="userId" value="{{ session('huser')['id'] }}">
      						</li>
      						<li><a href="{{ url('/home/logout') }}"><span>退出</span></a></li>
						@else
							<li id="register"><a href="#"><span>注册</span></a></li>
							<li id="login"><a href="#"><span>登录</span></a></li>
						@endif
					</ul>

					<ul class="wrap_ul r">

						<div>
							<a href="#"><span class="first_span">我的开场</span></a>
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
								<li><a href="{{ url('/tenant/index') }}">商户中心</a></li>
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
					<form action=" {{ url('/home/search/general') }} " method="get">
						<ul class="search_ul">
							
							<!-- 城市选择 -->
							<li class="city"><input type="text" placeholder="北 京" id="place" name="city" value=""></li>
							<div id="in_city" style="display: none; position:absolute; top: 64px; left: -292px;"></div>
							
							<!-- 关键字 -->
							<li class="kw"><input class="inp" type="text" name="keywords" placeholder="场地关键字"></li>
							<li class="number">
							
								<div class="dis_sel" >
								
									<select name="number">
										<option value="人数">人数</option>
										<option value="人数不限">人数不限</option>
										<option value="10-50">10-50</option>
										<option value="50-100">50-100</option>
										<option value="100-300">100-300</option>
										<option value="300-500">300-500</option>
										<option value="500-1000">500-1000</option>
									</select>
								</div>
								<div class="mar"><div class="s"></div></div>
							</li>
							<li class="sear"><a href="#"><input type="image" src="{{ asset ('/images/search.png') }}"></a></li>
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


	<!-- 侧边购物车 -->
		<div class="J-global-toolbar">
		    <div class="toolbar-wrap J-wrap">
		    @if(session('huser'))
		        <div class="toolbar">
			        <?php
				        $uid = session('huser')['id'];
				        $shopcart = \DB::table("indent")
				        			->join('meeting', 'indent.mid', '=', 'meeting.id')
				        			->where('indent.uid', $uid)
				        			->where('indent.pay', 0)
				        			->get();
				        $shopnum = \DB::table("indent")
				        			->join('meeting', 'indent.mid', '=', 'meeting.id')
				        			->where('indent.uid', $uid)
				        			->where('indent.pay', 0)
				        			->count();					

			        ?>
		            <div class="toolbar-panels J-panel">
		                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
		                    <h3 class="tbar-panel-header J-panel-header">
		                        <a href="" class="title"><i></i><em class="title">购物车</em></a>
		                        <span class="close-panel J-close"></span>
		                    </h3>


							@if(!$shopcart->isEmpty())
							@foreach($shopcart as $shopkey => $shopval)
		                    <div class="tbar-panel-main">
		                        <div class="tbar-panel-content J-panel-content">
		                            <div id="J-cart-render">
		                                <div class="tbar-cart-list">
		                                    <div class="tbar-cart-item" >
		                                        <div class="jtc-item-goods">
		                                            <span class="p-img"><a href="#" target="_blank"><img src="{{ asset('/uploads/meetimg') }}/{{ $shopval->meetImg }}" alt="" height="50" width="50" /></a></span>
		                                            <div class="p-name">
		                                                <a href="{{ url('/home/shop') }}" target="_blank">{{ $shopval->userName }} {{ $shopval->meetName }}</a>
		                                            </div>
		                                            <div class="p-price">总价：<strong>{{ $shopval->money }}元</strong></div>
		                                            <a href="#none" class="p-del J-del">删除</a>
		                                        </div>
		                                    </div>  
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    @endforeach
		                    <div class="tbar-panel-footer J-panel-footer">
		                        <div class="tbar-checkout">
		                            <div style="margin-top:13px;margin-left:20px;" class="jtc-number">共 <strong class="J-count">{{ $shopnum }}</strong>个会场 </div>
		                            <a class="jtc-btn J-btn" href="{{ url('/home/shop') }}" target="_blank">去购物车结算</a>
		                        </div>
		                    </div>
							@else
		                    <div class="tbar-panel-footer J-panel-footer">
		                        <div class="tbar-checkout">
		                            <div style="margin-top:13px;margin-left:20px;" class="jtc-number"> 购物车是空的 </div>
		                            <a class="jtc-btn J-btn" href="{{ url('/home/index') }}"> 去预定场地</a>
		                        </div>
		                    </div>
		                    @endif


		                </div>

		                <div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
		                    <h3 class="tbar-panel-header J-panel-header">
		                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
		                        <span class="close-panel J-close"></span>
		                    </h3>
		                    <div class="tbar-panel-main">
		                        <div class="tbar-panel-content J-panel-content">
		                            <div class="tbar-tipbox2">
		                                <div class="tip-inner"> <i class="i-loading"></i> </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="tbar-panel-footer J-panel-footer"></div>
		                </div>
		            </div>
		            
		            <div class="toolbar-header"></div>
		            
		            <div class="toolbar-tabs J-tab">
		                <div class="toolbar-tab tbar-tab-cart">
		                    <i class="tab-ico"></i>
		                    <em class="tab-text ">购物车</em>
		                    <span class="tab-sub J-count ">{{ $shopnum }}</span>
		                </div>
		                <div class=" toolbar-tab tbar-tab-follow">
		                    <i class="tab-ico"></i>
		                    <em class="tab-text">我的关注</em>
		                    <span class="tab-sub J-count hide">0</span> 
		                </div>
		                <div class=" toolbar-tab tbar-tab-history ">
		                    <i class="tab-ico"></i>
		                    <em class="tab-text">我的足迹</em>
		                    <span class="tab-sub J-count hide">0</span>
		                </div>
		            </div>
		            
		            <div class="toolbar-footer">
		                <div class="toolbar-tab tbar-tab-top"> <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
		                <div class=" toolbar-tab tbar-tab-feedback"> <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
		            </div>
		            
		            <div class="toolbar-mini"></div>
		            
		        </div>
		    @else
				<div class="toolbar">
		            <div class="toolbar-panels J-panel">
		                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
		                    <h3 class="tbar-panel-header J-panel-header">
		                        <a href="" class="title"><i></i><em class="title">购物车</em></a>
		                        <span class="close-panel J-close"></span>
		                    </h3>
		                    <div class="tbar-panel-footer J-panel-footer">
		                        <div class="tbar-checkout">
		                            <div style="margin-top:13px;margin-left:20px;" class="jtc-number"> 购物车是空的 </div>
		                            <a class="jtc-btn J-btn" href="{{ url('/home/index') }}"> 去预定场地</a>
		                        </div>
		                    </div>
		                </div>

		                <div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
		                    <h3 class="tbar-panel-header J-panel-header">
		                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
		                        <span class="close-panel J-close"></span>
		                    </h3>
		                    <div class="tbar-panel-main">
		                        <div class="tbar-panel-content J-panel-content">
		                            <div class="tbar-tipbox2">
		                                <div class="tip-inner"> <i class="i-loading"></i> </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="tbar-panel-footer J-panel-footer"></div>
		                </div>
		                
		                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
		                    <h3 class="tbar-panel-header J-panel-header">
		                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
		                        <span class="close-panel J-close"></span>
		                    </h3>
		                    <div class="tbar-panel-footer J-panel-footer"></div>
		                </div>
		            </div>
		            
		            <div class="toolbar-header"></div>
		            
		            <div class="toolbar-tabs J-tab">
		                <div class="toolbar-tab tbar-tab-cart">
		                    <i class="tab-ico"></i>
		                    <em class="tab-text ">购物车</em>
		                    <span class="tab-sub J-count ">0</span>
		                </div>
		                <div class=" toolbar-tab tbar-tab-follow">
		                    <i class="tab-ico"></i>
		                    <em class="tab-text">我的关注</em>
		                    <span class="tab-sub J-count hide">0</span> 
		                </div>
		                <div class=" toolbar-tab tbar-tab-history ">
		                    <i class="tab-ico"></i>
		                    <em class="tab-text">我的足迹</em>
		                    <span class="tab-sub J-count hide">0</span>
		                </div>
		            </div>
		            
		            <div class="toolbar-footer">
		                <div class="toolbar-tab tbar-tab-top"> <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
		                <div class=" toolbar-tab tbar-tab-feedback"> <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
		            </div>
		            
		            <div class="toolbar-mini"></div>
		            
		        </div>
		    @endif    
		        
		        <div id="J-toolbar-load-hook"></div>
		        
		    </div>
		</div>
	<!-- /侧边购物车 -->

	</div>	

	@yield('js')

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
						<div class="getPhone" style="background: #0066cc;"><span style="cursor: pointer;">获取验证码</span></div>
						<span style="display: none; position: absolute; top: 442px; left: 84px; color: red; font-wieght: blod;"></span>
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
	<script type="text/javascript" src="{{ asset('/js/home.search.ajax.js') }}"></script>

	<script type="text/javascript" src="{{ asset('/js/home.index.autolog.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/cityTemplate.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/citySelect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/nav.js') }}"></script>

	<script type="text/javascript" src="{{ asset('/js/laydate.dev.js') }}"></script>
    <script type="text/javascript">

        laydate({

            elem: '#J-xl'

        });

    </script>


</body>
</html>