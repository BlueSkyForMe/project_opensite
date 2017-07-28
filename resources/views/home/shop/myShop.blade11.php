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
			
				<!-- 基本信息 -->
				

				<!-- 订单 -->
			@if($res)
				@foreach($res as $key => $val)
			<div class="order">
				
					
					<div class="order_info"><span>订单信息</span></div>

			
						<div class="order_title">
							<ul>
								<li class="li_f">商家会场</li>
								<li class="li_s">类型</li>
								<li class="li_t">单价</li>
								<li class="li_fo">档期</li>
								<li class="li_fi">数量</li>
								<li class="li_si">小计</li>
							</ul>
						</div>

					<!-- 企业名称 -->
					
						<ul class="order_name">
							<li class="td_f">*{{ $val->userName }}</li>
							<li class="td_s"><a href="#">客服对话</a></li>
							<li colspan="4"></li>
						</ul>
					
					<!-- 订单具体内容 -->
						<div class="order_content">
							<!-- <input type="hidden" name="id" value="{{ $val->id }}"> -->
							
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
								<li class="con_three con_same"><span>{{ $val->hallmoney }}</span></li>
								
								<li class="con_four con_same"><span>{{ $val->time_quantum }}</span></li>
								
								<li class="con_five con_same"><span>1</span></li>
								<li class="con_six con_same"><span>{{ $val->hallmoney }}</span></li>
								
							</ul>
							
							
							@if(isset($val->rest_Type))
							<ul>
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_2.png') }}"></div>
										<div class="con_name ">
											<p>会议茶歇</p>
											<!-- <div class="con_des"><span>地方方正</span><span>装修精美</span></div> -->
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>
								@if($val->rest_Type == 2)
								
									中式
								@endif

								@if($val->rest_Type == 1)
								
									西式
								@endif
								</span></li>
								<li class="con_three con_same"><span>{{ $val->restPrice }}</span></li>
								<li class="con_four con_same"><span></span></li>
								<li class="con_five con_same"><span>{{ $val->restcount }}</span></li>
								<li class="con_six con_same"><span>{{ $val->restmoney }}</span></li>
							
							</ul>
							@else

							@endif
							
							@if(isset($val->guest_Type))
							<ul>
							
								<li class="con_fiest">
									<div>
										<div class="con_img"><img src="{{ asset('/images/order_2.png') }}"></div>
										<div class="con_name ">
											<p>会议客房</p>
											<!-- <div class="con_des"><span>地方方正</span><span>装修精美</span></div> -->
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>
								@if($val->guest_Type == 1)
								
									单人间
								@endif

								@if($val->guest_Type == 2)
								
									标准间(双床)
								@endif

								@if($val->guest_Type == 3)
									双人间
								@endif

								@if($val->guest_Type == 4)
									套间客房
								@endif

								@if($val->guest_Type == 5)
									公寓式客房
								@endif

								@if($val->guest_Type == 6)
									总统套房
								@endif

								@if($val->guest_Type == 7)
									特色客房	
								@endif

								</span></li>
								<li class="con_three con_same"><span>{{ $val->guestPrice }}</span></li>
								<li class="con_four con_same"><span></span></li>
								<li class="con_five con_same"><span>{{ $val->guestcount }}</span></li>
								<li class="con_six con_same"><span>{{ $val->guestmoney }}</span></li>
							
							</ul>
							@else
								
							@endif
							
							@if(isset($val->av_Type))
							<ul>
							
								<li class="con_fiest">
									<div>
										<!-- <div class="con_img"><img src="{{ asset('/images/order_2.png') }}"></div> -->
										<div class="con_name " >
											<p style="margin-left:30px;margin-top:25px;"><b>AV设备</b></p>
											<!-- <div class="con_des"><span>地方方正</span><span>装修精美</span></div> -->
										</div>
									</div>
								</li>
								<li class="con_second con_same"><span>
								@if($val->av_Type == 1)
								
									音响设备
								@endif

								@if($val->av_Type == 2)
								
									麦克风
								@endif

								@if($val->av_Type == 3)
									投影仪
								@endif

								</span></li>
								<li class="con_three con_same"><span>{{ $val->avPRice }}</span></li>
								<li class="con_four con_same"><span></span></li>
								<li class="con_five con_same"><span>{{ $val->avcount }}</span></li>
								<li class="con_six con_same"><span>{{ $val->avmoney }}</span></li>
							
							</ul><br>
							@else

							@endif

						
						</div>

					<!-- 买家留言  -->
						<ul class="message">
							<li class="mes_first">商家留言 ：</li>
							<li class="mes_second"><input type="text" name="" value=""></li>
							<li class="mes_three"><a href="#">场地租赁条款与须知</a></li>
						</ul>

						
				
				<!-- 清浮动 -->
				<!-- <div class="cle"></div> -->
		
				<!-- 结算 -->
				<div class="count">
					<div class="price"><span>总计 :</span><b> ￥{{ $val->money }} </b></div>
					<div class="id" style="display:none">{{ $val->id }}</div>
					<div class="sm" ><img src="{{ asset('/images/pay.png') }}"></div>
				</div>
			</div>
			

				@endforeach
			@endif
	</div>
		<div style="clear:both"></div>
			
		<!-- /主体结束 -->


@endsection

@section('js')

	<script type="text/javascript">
		
		// $('.qibie').each(function(){



		// 	$(this).click(function(){

		// 		alert('前往支付');
				
		// 		var value = $(this).parents().prev().html();

			

		// 	});
			


		// })

	</script>


@endsection