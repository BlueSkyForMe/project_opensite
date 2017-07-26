@extends('home.layout')

@section('content')

		<!-- 主体main -->
		<div class="main">

			<div class="wrap_column">
				<div class="column">
					<span>首页 > 确认订单信息</span>
				</div>
			</div>

			
			<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->
			<!-- <form action="" method="post"> -->

				<!-- 订单 -->
				<div class="order">
					<div class="order_info"><span>订单信息</span></div>

			
						<div class="order_title">
							<ul>
								<li class="li_f">商家会场</li>
								<li class="li_s">类型</li>
								<li class="li_t">价格</li>
								<li class="li_fo">档期</li>
								<li class="li_fi">数量</li>
								<li class="li_si">合计</li>
							</ul>
						</div>



			@if($data)
				@foreach($data as $key => $val)
					
					<!-- 企业名称 -->
						<ul class="order_name">
							<li class="td_f">*{{ $val->userName }}</li>
							<li colspan="4"></li>
						</ul>
					
					<!-- 订单具体内容 -->
						<div class="order_content">
													
							<ul>
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_1.png') }}"></div>
										<div class="con_name ">
											<p>{{ $val->meetName }}</p>
											<div class="con_des"><span>地方方正</span><span>装修精美</span></div>
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>{{ $val->meetName }}</span></li>
								<li class="con_three con_same"><span>{{ $val->money }}</span></li>
								<li class="con_four con_same"><span>{{ $val->time_quantum }}</span></li>
								<li class="con_five con_same"><span>1</span></li>
								<li class="con_six con_same"><span>{{ $val->money }}</span></li>
							</ul>

							@if($val->pay == 1)
								<div class="sm"><a href="#" ><img src="{{ asset('/images/order_ok.png') }}"></a></div>
							@else
								<div class="sm"><a href="#" ><img src="{{ asset('/images/order_no.png') }}"></a></div>
							@endif

						</div>

				@endforeach

			@endif
				
						</div>	

			<!-- </form> -->
			<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->

		</div>
		<!-- /主体结束 -->


@endsection

@section('js')



@endsection