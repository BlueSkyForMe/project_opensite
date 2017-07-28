
@extends('home.layout')

@section('content')

<div class="bodyer">
		<div class="daohang">
			<h2 >
				&nbsp;&nbsp;&nbsp;&nbsp;开场&nbsp;|&nbsp;<span>我的开场</span></h2>
			<ul class="juli">
				<a href="{{ asset('/home/index') }}"><li class="lly">首页</li></a>
				<a href=""><li class="lly">账户信息</li></a>
				<a href="{{ asset('/home/order/myOrder') }}"><li class="lly">我的订单</li></a>
				<a href=""><li class="lly">我的足迹</li></a>
				<a href="{{ asset('/home/personal/collect') }}"><li class="lly">收藏夹</li></a>
			</ul>
			
		</div>
		<div class="zhu_body">
		@if($users)
			<div class="ge_left">
				<div class="ge_left_a">
					<img src="{{ asset('/images/1.jpg') }}" class="left_img" alt="">
					<div class="left_name">{{ $users->userName }}</div>
					<div class="left_kong"></div>
					<a href="{{ asset('/home/personal/updata') }}" class="left_xinxi">完善信息</a>
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
			<!-- <form action="{{ url('/home/personal/insert') }}" method="post"> -->
				<div class="ge_right_a">
				
					<div class="ge_right_a_top">
						基本信息
					</div>
					{{ csrf_field() }}
					<ul>
						<li class="il">
						{{ $users->userName  }}
							<span >用户名：</span>
							<!-- <input type="email" style="border:none" name="postcode" value="{{ $users->userName }}"> -->
						</li>

						<li class="il">
						{{ $phone }}
							<span style="">电话号码</span>
							<!-- <input type="tesx" style="border:none" name="postcode"value="
							@if($phone)
							{{ $phone }}
							@endif">
 -->							
						</li>
						<li class="il">
							<span style="width: 80px;float: left;text-align: right;margin-right: 20px;">电子邮箱</span>
							<input type="email" style="border:none" name="postcode" value="
							@if(@users)
							{{ $users->email }}
							@endif">
							
							
							
							</span>
						</li>
						<li class="il">
							
						</li>
					</ul>
					
					<div class="kong"></div>
				</div>
				
				<div class="ge_right_b">
					<div class="ge_right_a_bottom">
						
					</div>
				</div>
			</div>
			@endif
			
		</div>
	</div>			
	<div class="clearer"></div>
@endsection	

@section('js')
	
	<script type="text/javascript">

// ==============点击个人信息保存事件===================

	$('.').on('', function(){


	})

	</script>

@endsection
