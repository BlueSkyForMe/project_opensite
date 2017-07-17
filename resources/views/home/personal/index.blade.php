@extends('home.layout')

@section('content')

<div class="bodyer">
		<div class="daohang">
			<h2 >
				&nbsp;&nbsp;&nbsp;&nbsp;开场&nbsp;|&nbsp;<span>我的开场</span></h2>
			<ul class="juli">
				<a href="{{ asset('/home/index') }}"><li class="lly">首页</li></a>
				<a href=""><li class="lly">账户信息</li></a>
				<a href=""><li class="lly">我的订单</li></a>
				<a href=""><li class="lly">我的足迹</li></a>
				<a href="{{ asset('/home/personal/collect') }}"><li class="lly">收藏夹</li></a>
			</ul>
			
		</div>
		<div class="zhu_body">
			<div class="ge_left">
				<div class="ge_left_a">
					<img src="{{ asset('/images/1.jpg') }}" class="left_img" alt="">
					<div class="left_name">小泉日树</div>
					<div class="left_kong"></div>
					<a href="#" class="left_xinxi">完善信息</a>
				</div>
				<div class="ge_left_b">
					<div class="left_jiben">
						<li class="lli"><a href="#">基本信息</a></li>
					</div>
					<div class="left_mima">
						<li class="iil"><a href="{{ asset('/home/personal/amend') }}">修改密码</a></li>
					</div>
				</div>
			</div>
			<div class="ge_right">
			<form action="{{ url('/home/personal/insert') }}" method="post">
				<div class="ge_right_a">
					<div class="ge_right_a_top">
						个人信息
					</div>
					{{ csrf_field() }}
					<ul>
						<li class="il">
							<span>姓名</span>
							<input type="text" name="name" placeholder="请输入">
						</li>
						<li class="il">
							<span>所属单位</span>
							<input type="text" name="business" placeholder="请输入">
						</li>
						<li class="il">
							<span>单位地址</span>
							<input type="text" name="site" placeholder="请输入">
						</li>
						<li class="il">
							<span>电话号码</span>
							<input type="text" name="phone" placeholder="请输入">
						</li>
						<li class="il">
							<span>邮政编码</span>
							<input type="text" name="postcode" placeholder="请输入">
						</li>
						<li class="il">
							<button class="btn">保存</button>
						</li>
					</ul>
					<div class="kong"></div>
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
