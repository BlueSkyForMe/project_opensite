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
					<img src="{{ asset('/images/1.jpg') }}" class="left_img" alt="">
					<div class="left_name">小泉日树</div>
					<div class="left_kong"></div>
					<a href="#" class="left_xinxi">完善信息</a>
				</div>
				<div class="ge_left_b">
					<div class="left_jiben">
						<li class="lli"><a href="{{ asset('/home/personal/collect') }}">收藏会场</a></li>
					</div>
					<div class="left_mima">
						<li class="iil"><a href="#">收藏商家</a></li>
					</div>
				</div>
			</div>
			<div class="ge_right">
			<form action="">
				<div class="ge_right_a">
					<div class="ge_right_a_top">
						商家信息
					</div>
					
					<ul>
						<li class="il">
							<div class="huichang" style="height:75px;">
								<div class="huichang_left">
								<!-- <a href=""><p class="shangjiaming">天上人间大酒店</p></a> -->
									<a href=""><span ><img src="{{ asset('/images/1.jpg') }}" class="images"></span>
									<label for="">中国石油化工大酒店</label></a>
									<p>三鹿奶粉就是好,喝的你我有保障</p>
								</div>
								<div class="huichang_right">
									<span class="yuan"><b>￥</b>&nbsp;3504004</span>
								</div>
							</div>

						</li>


						

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