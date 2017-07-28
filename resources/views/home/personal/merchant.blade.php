@extends('home.layout')

@section('content')

<div class="bodyer">
		<div class="daohang">
			<h2 >
				&nbsp;&nbsp;&nbsp;&nbsp;开场&nbsp;|&nbsp;<span>收藏夹</span></h2>
			<ul class="juli">
				<a href="{{ asset('/home/index') }}"><li class="lly">首页</li></a>
				<a href="{{ asset('/home/personal/index') }}"><li class="lly">账户信息</li></a>
				<a href=""><li class="lly">我的订单</li></a>
				<a href=""><li class="lly">我的足迹</li></a>
				<a href=""><li class="lly">收藏夹</li></a>
			</ul>
			
		</div>
		<div class="zhu_body">
			<div class="ge_left">
				<div class="ge_left_a">
				@if($name)
					<img src="{{ asset('/images/1.jpg') }}" class="left_img" alt="">
					<div class="left_name">{{ $name }}</div>
					<div class="left_kong"></div>
					<a href="{{ asset('/home/personal/updata') }}" class="left_xinxi">完善信息</a>
				@endif
				</div>
				
			</div>
			<div class="ge_right">
			<form action="">
				<div class="ge_right_a">
					<div class="ge_right_a_top">
						商家信息
					</div>
					
					<ul>
						@if($res)
						@foreach($res as $key => $val)
						<li class="il">
							<div class="huichang" style="height:75px;">
								<div class="huichang_left">
								<!-- <a href=""><p class="shangjiaming">天上人间大酒店</p></a> -->
									<a href=""><span ><img src="{{ asset('/images/1.jpg') }}" class="images"></span>
									<label for="">{{ $val->userName }}</label></a>
									<p>{{ $val->address }}</p>
								</div>
								<div class="huichang_right">
									<span class="yuan"><b>￥</b>&nbsp;{{ $val->meetPrice }}</span>
								</div>
							</div>

						</li>
						@endforeach
						@endif

						

						<li class="il">
							<nav aria-label="Page navigation" class="a_juli">
							  <ul class="pagination">
							    <li>
							      <a href="#" aria-label="Previous">
							        <span aria-hidden="true" style="width:45px;">&laquo;上一页</span>
							      </a>
							    </li>
							    <li><a href="#">1</a></li>
							    <li><a href="#">2</a></li>
							    <li><a href="#">3</a></li>
							    <li><a href="#">4</a></li> 
							    <li><a href="#">5</a></li>
							    <li><a href="#">6</a></li>
							    <li><a href="#">7</a></li>
							    <li><a href="#">8</a></li>
							    <li><a href="#">9</a></li>
							    <li>
							      <a href="#" aria-label="Next" class="a_juli">
							        <span aria-hidden="true" style="width:45px;">下一页&raquo;</span>
							      </a>
							    </li>
							  </ul>
							</nav>
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